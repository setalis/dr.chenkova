<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookOrderRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class BookOrderController extends Controller
{
    /**
     * Получить URL API Monobank
     */
    private function getMonobankApiUrl(): string
    {
        return config('monobank.api_url', 'https://api.monobank.ua');
    }

    /**
     * Получить токен Monobank
     */
    private function getMonobankToken(): string
    {
        return config('monobank.token', env('MONOBANK_TOKEN'));
    }

    /**
     * Создать инвойс в Monobank
     */
    private function createInvoice(int $amount, string $redirectUrl, ?string $webhookUrl = null, ?string $productName = null, int $currency = 980): array
    {
        $payload = [
            'amount' => $amount,
            'ccy' => $currency, // ISO 4217 код валюты (980 - UAH, 840 - USD, 978 - EUR)
            'redirectUrl' => $redirectUrl,
        ];

        if ($webhookUrl) {
            $payload['webHookUrl'] = $webhookUrl;
        }

        if ($productName) {
            $payload['merchantPaymInfo'] = [
                'reference' => $productName,
                'destination' => $productName,
            ];
        }

        try {
            $response = Http::withHeaders([
                'X-Token' => $this->getMonobankToken(),
            ])->post("{$this->getMonobankApiUrl()}/api/merchant/invoice/create", $payload);

            if ($response->successful()) {
                return $response->json();
            }

            Log::error('Monobank API error', [
                'status' => $response->status(),
                'body' => $response->body(),
            ]);

            throw new \RuntimeException('Ошибка при создании инвойса в Monobank: '.$response->body());
        } catch (\Exception $e) {
            Log::error('Monobank API exception', [
                'message' => $e->getMessage(),
            ]);

            throw $e;
        }
    }

    /**
     * Получить статус инвойса из Monobank
     */
    private function getInvoiceStatus(string $invoiceId): array
    {
        try {
            $response = Http::withHeaders([
                'X-Token' => $this->getMonobankToken(),
            ])->get("{$this->getMonobankApiUrl()}/api/merchant/invoice/status", [
                'invoiceId' => $invoiceId,
            ]);

            if ($response->successful()) {
                $data = $response->json();

                Log::info('Monobank invoice status', [
                    'invoice_id' => $invoiceId,
                    'status' => $data['status'] ?? 'unknown',
                    'data' => $data,
                ]);

                return $data;
            }

            Log::error('Monobank API error - status check', [
                'invoice_id' => $invoiceId,
                'status' => $response->status(),
                'body' => $response->body(),
            ]);

            throw new \RuntimeException('Ошибка при проверке статуса инвойса в Monobank: '.$response->body());
        } catch (\Exception $e) {
            Log::error('Monobank API exception - status check', [
                'invoice_id' => $invoiceId,
                'message' => $e->getMessage(),
            ]);

            throw $e;
        }
    }

    public function create()
    {
        // ДИАГНОСТИЧЕСКИЙ РЕЖИМ - пошаговое тестирование
        // Раскомментируйте нужный шаг для диагностики на продакшене

        // ШАГ 1: Простейший тест - возвращаем текст
        // Если это работает, значит контроллер и роут работают
        // return response('TEST: BookOrderController работает!', 200);

        // ШАГ 2: Простой view без компонентов (файл test-simple.blade.php уже создан)
        // return view('test-simple');

        // ШАГ 3: Проверка view с компонентом (текущий вариант)
        try {
            Log::info('BookOrderController::create called - START');

            // Проверяем существование view файла
            $viewPath = resource_path('views/book-order/create.blade.php');
            if (! file_exists($viewPath)) {
                Log::error('View file not found', ['path' => $viewPath]);

                return response('Ошибка: файл представления не найден: '.$viewPath, 500);
            }

            Log::info('View file exists', ['path' => $viewPath, 'size' => filesize($viewPath)]);

            // Проверяем существование компонента main
            $componentPath = resource_path('views/components/layouts/main.blade.php');
            if (! file_exists($componentPath)) {
                Log::error('Component file not found', ['path' => $componentPath]);

                return response('Ошибка: компонент main не найден: '.$componentPath, 500);
            }

            Log::info('Component file exists', ['path' => $componentPath]);

            // Пробуем загрузить view с учетом локали
            Log::info('Attempting to create view object', ['locale' => app()->getLocale()]);
            $view = view_locale('book-order.create');
            Log::info('View object created successfully');

            return $view;
        } catch (\Exception $e) {
            Log::error('Error in BookOrderController::create', [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'trace' => $e->getTraceAsString(),
                'previous' => $e->getPrevious() ? [
                    'message' => $e->getPrevious()->getMessage(),
                    'file' => $e->getPrevious()->getFile(),
                    'line' => $e->getPrevious()->getLine(),
                ] : null,
            ]);

            // Возвращаем ошибку в читаемом виде для диагностики
            return response('Ошибка: '.$e->getMessage().' в файле '.$e->getFile().':'.$e->getLine(), 500);
        }
    }

    public function store(StoreBookOrderRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $currency = config('monobank.default_currency', 'UAH');
        $amount = config('monobank.paper_book.price', 50000);
        $productName = config('monobank.paper_book.name', 'Бумажная книга');
        $currencyInfo = config("monobank.currencies.{$currency}");

        if (! $currencyInfo) {
            Log::error('Currency not found in config', [
                'currency' => $currency,
            ]);

            return redirect()
                ->back()
                ->withInput()
                ->withErrors(['payment' => 'Ошибка конфигурации валюты. Пожалуйста, свяжитесь с поддержкой.']);
        }

        $redirectUrl = route_locale('book-order.payment-success');
        $webhookUrl = route('book-order.webhook');

        try {
            $invoice = $this->createInvoice(
                amount: (int) $amount,
                redirectUrl: $redirectUrl,
                webhookUrl: $webhookUrl,
                productName: $productName,
                currency: (int) $currencyInfo['code'],
            );

            // Сохраняем данные заказа в сессию
            session([
                'book_order' => [
                    'type' => 'paper',
                    'name' => $validated['name'],
                    'messenger' => $validated['messenger'],
                    'contact' => $validated['contact'],
                    'country' => $validated['country'],
                    'city' => $validated['city'],
                    'region' => $validated['region'] ?? null,
                    'address_1' => $validated['address_1'],
                    'address_2' => $validated['address_2'] ?? null,
                    'zip' => $validated['zip'],
                    'phone' => $validated['phone'],
                    'invoice_id' => $invoice['invoiceId'] ?? null,
                    'amount' => $amount,
                    'currency' => $currency,
                    'currency_info' => $currencyInfo,
                    'product_name' => $productName,
                ],
            ]);

            return redirect($invoice['pageUrl']);
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors(['payment' => 'Ошибка при создании платежа. Пожалуйста, попробуйте позже.']);
        }
    }

    public function paymentSuccess(Request $request): View
    {
        // Пытаемся получить invoiceId из сессии или из параметров запроса
        $orderData = session('book_order');
        $invoiceId = $orderData['invoice_id'] ?? $request->input('invoiceId') ?? $request->input('invoice_id');

        if (! $invoiceId) {
            Log::warning('Invoice ID not found in session or request', [
                'session_data' => $orderData,
                'request_params' => $request->all(),
            ]);

            return view_locale('book-order.error', [
                'message' => 'Данные заказа не найдены. Если оплата была успешной, мы свяжемся с вами в ближайшее время.',
            ]);
        }

        try {
            // Проверяем статус платежа через API Monobank
            $invoiceStatus = $this->getInvoiceStatus($invoiceId);

            // Логируем полный ответ для отладки
            Log::info('Invoice status response', [
                'invoice_id' => $invoiceId,
                'full_response' => $invoiceStatus,
            ]);

            $status = $invoiceStatus['status'] ?? null;

            // Проверяем статус платежа
            if ($status === 'success') {
                // Если данные заказа есть в сессии, используем их
                // Если нет, создаем минимальный набор данных для отображения
                if ($orderData) {
                    // Отправляем email с данными заказа
                    try {
                        Mail::send('emails.book-order', [
                            'order' => $orderData,
                            'status' => 'success',
                        ], function ($message) {
                            $message->to('mail@dr-chenkova.com')
                                ->subject('Новый заказ бумажной книги');
                        });

                        Log::info('Order email sent successfully', [
                            'invoice_id' => $invoiceId,
                        ]);
                    } catch (\Exception $e) {
                        Log::error('Error sending order email', [
                            'invoice_id' => $invoiceId,
                            'error' => $e->getMessage(),
                        ]);
                    }

                    // Очищаем сессию после успешной обработки
                    session()->forget('book_order');

                    return view_locale('book-order.success', [
                        'order' => $orderData,
                    ]);
                } else {
                    // Восстанавливаем минимальные данные из конфигурации
                    $currency = config('monobank.default_currency', 'UAH');
                    $amount = config('monobank.paper_book.price', 50000);
                    $productName = config('monobank.paper_book.name', 'Бумажная книга');
                    $currencyInfo = config("monobank.currencies.{$currency}");

                    // Очищаем сессию
                    session()->forget('book_order');

                    return view_locale('book-order.success', [
                        'order' => [
                            'invoice_id' => $invoiceId,
                            'amount' => $amount,
                            'currency' => $currency,
                            'currency_info' => $currencyInfo,
                            'product_name' => $productName,
                            'name' => null,
                            'messenger' => null,
                            'contact' => null,
                            'country' => null,
                            'city' => null,
                            'region' => null,
                            'address_1' => null,
                            'address_2' => null,
                            'zip' => null,
                            'phone' => null,
                        ],
                    ]);
                }
            }

            // Очищаем сессию если платеж не успешен
            session()->forget('book_order');

            // Если платеж не успешен, показываем страницу ошибки
            $errorMessage = $this->getErrorMessage($invoiceStatus);

            return view_locale('book-order.error', [
                'message' => $errorMessage,
            ]);
        } catch (\Exception $e) {
            Log::error('Error checking invoice status', [
                'invoice_id' => $invoiceId,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            session()->forget('book_order');

            return view_locale('book-order.error', [
                'message' => 'Не удалось проверить статус платежа. Пожалуйста, свяжитесь с поддержкой.',
            ]);
        }
    }

    private function getErrorMessage(array $invoiceStatus): string
    {
        // Проверяем различные варианты названий полей с кодом ошибки
        $errCode = $invoiceStatus['errCode']
            ?? $invoiceStatus['errorCode']
            ?? $invoiceStatus['error_code']
            ?? $invoiceStatus['code']
            ?? null;

        $status = $invoiceStatus['status'] ?? 'unknown';

        // Логируем для отладки
        Log::info('Parsing error message', [
            'invoice_status' => $invoiceStatus,
            'errCode' => $errCode,
            'status' => $status,
            'errCode_type' => gettype($errCode),
        ]);

        // Преобразуем errCode в число для корректного сравнения
        $errCodeInt = $errCode !== null ? (int) $errCode : null;

        // Коды ошибок согласно официальной документации Monobank
        // https://monobank.ua/api-docs/acquiring/dev/errors/payment
        $errorMessages = [
            6 => 'Операция заблокирована банком-эмитентом.',
            40 => 'Карта потеряна. Расходы ограничены.',
            41 => 'Карта потеряна. Расходы ограничены.',
            50 => 'Расходы по карте ограничены.',
            51 => 'Истек срок действия карты, с которой вы пытаетесь сделать перевод.',
            52 => 'Номер карты указан неверно.',
            54 => 'Произошел технический сбой.',
            55 => 'Ошибка настроек торговой точки.',
            56 => 'Тип карты не поддерживает подобные оплаты.',
            57 => 'Транзакция не поддерживается.',
            58 => 'Расходы по карте ограничены на покупку.',
            59 => 'На карте недостаточно средств для завершения покупки.',
            60 => 'На карте превышен лимит количества расходных операций.',
            61 => 'На карте превышен интернет-лимит.',
            62 => 'Достигнут или превышен лимит на количество неправильных вводов PIN-кода.',
            63 => 'На карте превышен интернет-лимит.',
            67 => 'Ошибка настроек торговой точки.',
            68 => 'Отказ в проведении операции со стороны МПС.',
            71 => 'Операция заблокирована банком-эмитентом.',
            72 => 'Операция заблокирована банком-эмитентом.',
            73 => 'Ошибка маршрутизации.',
            74 => 'Ошибка настроек торговой точки.',
            75 => 'Операция заблокирована банком-эмитентом.',
            80 => 'Неправильный CVV код (3 цифры на обратной стороне карты).',
            1077 => 'Сумма оплаты меньше допустимой суммы (настройки МПС).',
            1080 => 'Срок действия карты указан неверно.',
            1090 => 'Информация о клиенте не найдена.',
            1115 => 'Ошибка настроек торговой точки.',
            1121 => 'Ошибка настроек торговой точки.',
            1145 => 'Минимальная сумма перевода.',
            1165 => 'Операция заблокирована банком-эмитентом.',
            1187 => 'Необходимо указать имя получателя.',
            1193 => 'Операция заблокирована банком-эмитентом.',
            1194 => 'Этот способ пополнения работает только с картами других банков.',
            1200 => 'Обязательно наличие CVV кода (3 цифры на обратной стороне карты).',
            1405 => 'Платежная система ограничила переводы.',
            1406 => 'Карта заблокирована риск-менеджментом.',
            1407 => 'Операция заблокирована риск-менеджментом.',
            1408 => 'Операция заблокирована банком-эмитентом.',
            1411 => 'Этот вид операций с гривневых карт временно ограничен.',
            1413 => 'Операция заблокирована банком-эмитентом.',
            1419 => 'Срок действия карты указан неверно.',
            1420 => 'Похоже, произошла техническая ошибка.',
            1421 => '3-D Secure проверку не пройдено.',
            1422 => 'Возникла ошибка на этапе 3-D Secure.',
            1425 => 'Возникла ошибка на этапе 3-D Secure.',
            1428 => 'Операция заблокирована банком-эмитентом.',
            1429 => '3-D Secure проверку не пройдено.',
            1433 => 'Проверьте имя и фамилию получателя. В случае указания недостоверных данных, банк может отклонить перевод.',
            1436 => 'Данная операция не поддерживается.',
            1439 => 'Недопустимая операция для использования по программе еВідновлення.',
            1458 => 'Операция отклонена на этапе 3DS.',
            8001 => 'Истек срок действия ссылки на оплату.',
            8002 => 'Клиент отменил оплату.',
            8003 => 'Произошел технический сбой.',
            8004 => 'Проблемы с проведением 3-D Secure.',
            8005 => 'Превышены лимиты на прием оплат.',
            8006 => 'Превышены лимиты на прием оплат.',
        ];

        // Проверяем код ошибки
        if ($errCodeInt !== null && isset($errorMessages[$errCodeInt])) {
            return $errorMessages[$errCodeInt];
        }

        // Если есть код ошибки, но он не в списке, показываем общее сообщение
        if ($errCodeInt !== null) {
            Log::warning('Unknown error code', [
                'errCode' => $errCodeInt,
                'invoice_status' => $invoiceStatus,
            ]);

            return 'Оплата не прошла (код ошибки: '.$errCodeInt.'). Пожалуйста, попробуйте еще раз или свяжитесь с поддержкой.';
        }

        // Проверяем статус
        if ($status === 'failure') {
            return 'Оплата не прошла. Пожалуйста, попробуйте еще раз или используйте другую карту.';
        }

        if ($status === 'expired') {
            return 'Время для оплаты истекло. Пожалуйста, создайте новый заказ.';
        }

        if ($status === 'processing') {
            return 'Платеж обрабатывается. Пожалуйста, подождите...';
        }

        // Если статус unknown или другой, логируем и показываем общее сообщение
        Log::warning('Unknown payment status', [
            'status' => $status,
            'invoice_status' => $invoiceStatus,
        ]);

        return 'Оплата не завершена. Пожалуйста, попробуйте еще раз или свяжитесь с поддержкой.';
    }

    public function showEbookForm(): View
    {
        return view_locale('ebook-order.create');
    }

    public function createEbook(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => 'required|email|max:255',
            'privacy_agreement' => 'required|accepted',
        ], [
            'email.required' => app()->getLocale() === 'uk'
                ? 'Email обов\'язковий для заповнення.'
                : 'Email обязателен для заполнения.',
            'email.email' => app()->getLocale() === 'uk'
                ? 'Будь ласка, введіть коректний email адрес.'
                : 'Пожалуйста, введите корректный email адрес.',
            'privacy_agreement.required' => app()->getLocale() === 'uk'
                ? 'Необхідна згода на обробку персональних даних.'
                : (app()->getLocale() === 'ka'
                    ? 'საჭიროა თანხმობა პერსონალური მონაცემების დამუშავებაზე.'
                    : 'Необходимо согласие на обработку персональных данных.'),
            'privacy_agreement.accepted' => app()->getLocale() === 'uk'
                ? 'Необхідна згода на обробку персональних даних.'
                : (app()->getLocale() === 'ka'
                    ? 'საჭიროა თანხმობა პერსონალური მონაცემების დამუშავებაზე.'
                    : 'Необходимо согласие на обработку персональных данных.'),
        ]);

        $currency = config('monobank.default_currency', 'UAH');
        $amount = config('monobank.ebook.price', 30000);
        $productName = config('monobank.ebook.name', 'Электронная книга');
        $currencyInfo = config("monobank.currencies.{$currency}");

        if (! $currencyInfo) {
            Log::error('Currency not found in config', [
                'currency' => $currency,
            ]);

            return redirect()
                ->back()
                ->withInput()
                ->withErrors(['payment' => app()->getLocale() === 'uk'
                    ? 'Помилка конфігурації валюти. Будь ласка, зв\'яжіться з підтримкою.'
                    : 'Ошибка конфигурации валюты. Пожалуйста, свяжитесь с поддержкой.']);
        }

        $redirectUrl = route_locale('ebook-order.payment-success');
        $webhookUrl = route('ebook-order.webhook');

        try {
            $invoice = $this->createInvoice(
                amount: (int) $amount,
                redirectUrl: $redirectUrl,
                webhookUrl: $webhookUrl,
                productName: $productName,
                currency: (int) $currencyInfo['code'],
            );

            // Сохраняем данные заказа в сессию
            session([
                'ebook_order' => [
                    'type' => 'ebook',
                    'email' => $request->email,
                    'invoice_id' => $invoice['invoiceId'] ?? null,
                    'amount' => $amount,
                    'currency' => $currency,
                    'currency_info' => $currencyInfo,
                    'product_name' => $productName,
                ],
            ]);

            return redirect($invoice['pageUrl']);
        } catch (\Exception $e) {
            Log::error('Error creating ebook invoice', [
                'error' => $e->getMessage(),
            ]);

            return redirect()
                ->back()
                ->withInput()
                ->withErrors(['payment' => app()->getLocale() === 'uk'
                    ? 'Помилка при створенні платежу. Будь ласка, спробуйте пізніше.'
                    : 'Ошибка при создании платежа. Пожалуйста, попробуйте позже.']);
        }
    }

    public function ebookPaymentSuccess(Request $request): View
    {
        $orderData = session('ebook_order');

        if (! $orderData || ! isset($orderData['invoice_id'])) {
            return view_locale('book-order.error', [
                'message' => 'Данные заказа не найдены.',
            ]);
        }

        try {
            // Проверяем статус платежа через API Monobank
            $invoiceStatus = $this->getInvoiceStatus($orderData['invoice_id']);

            // Логируем полный ответ для отладки
            Log::info('Ebook invoice status response', [
                'invoice_id' => $orderData['invoice_id'],
                'full_response' => $invoiceStatus,
            ]);

            $status = $invoiceStatus['status'] ?? null;

            // Очищаем сессию независимо от результата
            session()->forget('ebook_order');

            // Проверяем статус платежа
            if ($status === 'success') {
                // Отправляем email с файлами книги
                if (isset($orderData['email'])) {
                    try {
                        $locale = app()->getLocale();
                        $subject = $locale === 'uk'
                            ? 'Ваші файли електронної книги'
                            : 'Ваши файлы электронной книги';

                        // Определяем имя view для email
                        $emailView = 'emails.ebook-files';
                        if ($locale === 'uk' && view()->exists('emails.ebook-files-uk')) {
                            $emailView = 'emails.ebook-files-uk';
                        }

                        Mail::send($emailView, [
                            'order' => $orderData,
                            'locale' => $locale,
                        ], function ($message) use ($orderData, $subject) {
                            $message->to($orderData['email'])
                                ->subject($subject);

                            // Прикрепляем файлы книги в 4 форматах
                            $filesDir = storage_path('app/public/files/');

                            // EPUB
                            $epubFile = config('monobank.ebook.file_name', 'Kozha_na_vsiu_zhizn_Sovriemie_Alina_Valientinovna_Chienkova_1.epub');
                            $epubPath = $filesDir.$epubFile;
                            if (file_exists($epubPath)) {
                                $message->attach($epubPath, ['as' => $epubFile]);
                            }

                            // PDF
                            $pdfFile = config('monobank.ebook.pdf_file_name', 'Kozha_na_vsiu_zhizn_Sovriemie_Alina_Valientinovna_Chienkova_1.pdf');
                            $pdfPath = $filesDir.$pdfFile;
                            if (file_exists($pdfPath)) {
                                $message->attach($pdfPath, ['as' => $pdfFile]);
                            }

                            // MOBI
                            $mobiFile = config('monobank.ebook.mobi_file_name', 'Kozha_na_vsiu_zhizn_Sovriemie_Alina_Valientinovna_Chienkova_1.mobi');
                            $mobiPath = $filesDir.$mobiFile;
                            if (file_exists($mobiPath)) {
                                $message->attach($mobiPath, ['as' => $mobiFile]);
                            }

                            // FB2
                            $fb2File = config('monobank.ebook.fb2_file_name', 'Kozha_na_vsiu_zhizn_Sovriemie_Alina_Valientinovna_Chienkova_1.fb2');
                            $fb2Path = $filesDir.$fb2File;
                            if (file_exists($fb2Path)) {
                                $message->attach($fb2Path, ['as' => $fb2File]);
                            }
                        });

                        Log::info('Ebook files email sent successfully', [
                            'email' => $orderData['email'],
                            'invoice_id' => $orderData['invoice_id'],
                        ]);
                    } catch (\Exception $e) {
                        Log::error('Error sending ebook files email', [
                            'email' => $orderData['email'] ?? null,
                            'invoice_id' => $orderData['invoice_id'],
                            'error' => $e->getMessage(),
                        ]);
                    }
                }

                // Сохраняем данные заказа в сессию для скачивания файла (на случай если email не отправился)
                session(['ebook_order_download' => $orderData]);

                // Показываем страницу успеха с информацией об отправке email
                return view_locale('ebook-order.success', [
                    'order' => $orderData,
                ]);
            }

            // Если платеж не успешен, показываем страницу ошибки
            $errorMessage = $this->getErrorMessage($invoiceStatus);

            return view_locale('book-order.error', [
                'message' => $errorMessage,
            ]);
        } catch (\Exception $e) {
            Log::error('Error checking ebook invoice status', [
                'invoice_id' => $orderData['invoice_id'],
                'error' => $e->getMessage(),
            ]);

            session()->forget('ebook_order');

            return view_locale('book-order.error', [
                'message' => 'Не удалось проверить статус платежа. Пожалуйста, свяжитесь с поддержкой.',
            ]);
        }
    }

    public function ebookWebhook(Request $request): void
    {
        // Обработка webhook от Monobank для электронной книги
        $data = $request->all();

        Log::info('Monobank ebook webhook received', [
            'data' => $data,
            'status' => $data['status'] ?? 'unknown',
            'invoice_id' => $data['invoiceId'] ?? null,
        ]);

        // Здесь можно сохранить статус платежа в БД для дальнейшей обработки
    }

    public function downloadEbook(Request $request)
    {
        $orderData = session('ebook_order_download');

        if (! $orderData || ! isset($orderData['invoice_id'])) {
            return redirect()
                ->route('book')
                ->withErrors(['download' => 'Данные заказа не найдены. Пожалуйста, убедитесь, что оплата была успешной.']);
        }

        // Проверяем статус платежа еще раз для безопасности
        try {
            $invoiceStatus = $this->getInvoiceStatus($orderData['invoice_id']);

            if (($invoiceStatus['status'] ?? null) !== 'success') {
                return redirect()
                    ->route('book')
                    ->withErrors(['download' => 'Платеж не был завершен успешно.']);
            }
        } catch (\Exception $e) {
            Log::error('Error checking invoice status for download', [
                'invoice_id' => $orderData['invoice_id'],
                'error' => $e->getMessage(),
            ]);

            return redirect()
                ->route('book')
                ->withErrors(['download' => 'Не удалось проверить статус платежа.']);
        }

        $fileName = config('monobank.ebook.file_name', 'Kozha_na_vsiu_zhizn_Sovriemie_Alina_Valientinovna_Chienkova_1.epub');
        $filePath = storage_path('app/public/files/'.$fileName);

        if (! file_exists($filePath)) {
            Log::error('Ebook file not found', [
                'path' => $filePath,
            ]);

            return redirect()
                ->route('book')
                ->withErrors(['download' => 'Файл не найден. Пожалуйста, свяжитесь с поддержкой.']);
        }

        // НЕ очищаем сессию, чтобы пользователь мог скачать оба формата (EPUB и PDF)
        return response()->download($filePath, $fileName);
    }

    public function downloadEbookPdf(Request $request)
    {
        $orderData = session('ebook_order_download');

        if (! $orderData || ! isset($orderData['invoice_id'])) {
            return redirect()
                ->route('book')
                ->withErrors(['download' => 'Данные заказа не найдены. Пожалуйста, убедитесь, что оплата была успешной.']);
        }

        // Проверяем статус платежа еще раз для безопасности
        try {
            $invoiceStatus = $this->getInvoiceStatus($orderData['invoice_id']);

            if (($invoiceStatus['status'] ?? null) !== 'success') {
                return redirect()
                    ->route('book')
                    ->withErrors(['download' => 'Платеж не был завершен успешно.']);
            }
        } catch (\Exception $e) {
            Log::error('Error checking invoice status for PDF download', [
                'invoice_id' => $orderData['invoice_id'],
                'error' => $e->getMessage(),
            ]);

            return redirect()
                ->route('book')
                ->withErrors(['download' => 'Не удалось проверить статус платежа.']);
        }

        $fileName = config('monobank.ebook.pdf_file_name', 'Kozha_na_vsiu_zhizn_Sovriemie_Alina_Valientinovna_Chienkova_1.pdf');
        $filePath = storage_path('app/public/files/'.$fileName);

        if (! file_exists($filePath)) {
            Log::error('Ebook PDF file not found', [
                'path' => $filePath,
            ]);

            return redirect()
                ->route('book')
                ->withErrors(['download' => 'PDF файл не найден. Пожалуйста, свяжитесь с поддержкой.']);
        }

        // Проверяем, запрошено ли принудительное скачивание через JavaScript (для Instagram браузера)
        $forceDownload = $request->boolean('force', false);

        if ($forceDownload) {
            // Возвращаем промежуточную страницу с JavaScript для принудительного скачивания
            return view_locale('ebook-order.force-download-pdf', [
                'downloadUrl' => route_locale('ebook-order.download-pdf-file'),
                'fileName' => $fileName,
            ]);
        }

        // Принудительное скачивание для Instagram браузера и других мобильных браузеров
        // Используем явные заголовки для гарантированного скачивания файла
        // Instagram браузер может игнорировать стандартные заголовки, поэтому используем более строгие настройки

        return response()->download(
            $filePath,
            $fileName,
            [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'attachment; filename="'.addslashes($fileName).'"',
                'Content-Transfer-Encoding' => 'binary',
                'Cache-Control' => 'no-cache, no-store, must-revalidate',
                'Pragma' => 'no-cache',
                'Expires' => '0',
                'X-Content-Type-Options' => 'nosniff',
            ]
        );
    }

    /**
     * Прямая отдача PDF файла для JavaScript скачивания
     */
    public function downloadEbookPdfFile(Request $request)
    {
        $orderData = session('ebook_order_download');

        if (! $orderData || ! isset($orderData['invoice_id'])) {
            return response('Данные заказа не найдены', 403);
        }

        // Проверяем статус платежа еще раз для безопасности
        try {
            $invoiceStatus = $this->getInvoiceStatus($orderData['invoice_id']);

            if (($invoiceStatus['status'] ?? null) !== 'success') {
                return response('Платеж не был завершен успешно', 403);
            }
        } catch (\Exception $e) {
            Log::error('Error checking invoice status for PDF file download', [
                'invoice_id' => $orderData['invoice_id'],
                'error' => $e->getMessage(),
            ]);

            return response('Не удалось проверить статус платежа', 500);
        }

        $fileName = config('monobank.ebook.pdf_file_name', 'Kozha_na_vsiu_zhizn_Sovriemie_Alina_Valientinovna_Chienkova_1.pdf');
        $filePath = storage_path('app/public/files/'.$fileName);

        if (! file_exists($filePath)) {
            Log::error('Ebook PDF file not found', [
                'path' => $filePath,
            ]);

            return response('PDF файл не найден', 404);
        }

        // Возвращаем файл с заголовками для прямого доступа через JavaScript fetch
        return response()->file($filePath, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="'.addslashes($fileName).'"',
            'Cache-Control' => 'no-cache, no-store, must-revalidate',
            'Pragma' => 'no-cache',
            'Expires' => '0',
        ]);
    }

    /**
     * Публичный просмотр отрывка из книги (PDF)
     */
    public function viewExcerpt($locale)
    {
        // Сначала проверяем наличие файла отрывка, если его нет - используем полный PDF
        $excerptFileName = config('monobank.ebook.excerpt_file_name', 'excerpt-book.pdf');
        $pdfFileName = config('monobank.ebook.pdf_file_name', 'Kozha_na_vsiu_zhizn_Sovriemie_Alina_Valientinovna_Chienkova_1.pdf');

        // Логируем значения конфига для отладки
        Log::info('viewExcerpt called', [
            'excerpt_file_name' => $excerptFileName,
            'pdf_file_name' => $pdfFileName,
            'locale' => $locale,
        ]);

        // Если указан файл отрывка и он не пустой, проверяем его существование
        if ($excerptFileName && ! empty($excerptFileName) && $excerptFileName !== 'null') {
            $excerptFilePath = storage_path('app/public/files/'.$excerptFileName);

            Log::info('Checking excerpt file', [
                'excerpt_file' => $excerptFileName,
                'excerpt_path' => $excerptFilePath,
                'file_exists' => file_exists($excerptFilePath),
                'is_readable' => is_readable($excerptFilePath),
            ]);

            if (file_exists($excerptFilePath) && is_readable($excerptFilePath)) {
                // Файл отрывка существует и доступен для чтения, используем его
                Log::info('Using excerpt file', [
                    'file' => $excerptFileName,
                    'path' => $excerptFilePath,
                    'size' => filesize($excerptFilePath),
                ]);

                return response()->file($excerptFilePath, [
                    'Content-Type' => 'application/pdf',
                    'Content-Disposition' => 'inline; filename="'.addslashes($excerptFileName).'"',
                    'Cache-Control' => 'public, max-age=3600',
                ]);
            } else {
                // Файл отрывка указан, но не найден или недоступен - используем fallback на полный PDF
                Log::warning('Excerpt file not found or not readable, using full PDF as fallback', [
                    'excerpt_file' => $excerptFileName,
                    'excerpt_path' => $excerptFilePath,
                    'fallback_file' => $pdfFileName,
                ]);
            }
        } else {
            Log::info('No excerpt file specified, using full PDF', [
                'excerpt_file_name' => $excerptFileName,
            ]);
        }

        // Используем полный PDF (fallback)
        $filePath = storage_path('app/public/files/'.$pdfFileName);

        Log::info('Checking full PDF file', [
            'pdf_file' => $pdfFileName,
            'pdf_path' => $filePath,
            'file_exists' => file_exists($filePath),
            'is_readable' => is_readable($filePath),
        ]);

        if (! file_exists($filePath) || ! is_readable($filePath)) {
            Log::error('Book PDF file not found or not readable', [
                'path' => $filePath,
                'excerpt_file' => $excerptFileName,
                'file_exists' => file_exists($filePath),
                'is_readable' => is_readable($filePath),
            ]);

            abort(404, 'Файл книги не найден. Пожалуйста, свяжитесь с администратором.');
        }

        // Возвращаем файл для просмотра в браузере (inline)
        Log::info('Returning full PDF file', [
            'file' => $pdfFileName,
            'path' => $filePath,
            'size' => filesize($filePath),
        ]);

        return response()->file($filePath, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="'.addslashes($pdfFileName).'"',
            'Cache-Control' => 'public, max-age=3600',
        ]);
    }

    public function webhook(Request $request): void
    {
        // Обработка webhook от Monobank
        // Monobank отправляет данные о статусе платежа
        $data = $request->all();

        Log::info('Monobank webhook received', [
            'data' => $data,
            'status' => $data['status'] ?? 'unknown',
            'invoice_id' => $data['invoiceId'] ?? null,
        ]);

        // Здесь можно сохранить статус платежа в БД для дальнейшей обработки
        // Например, если платеж успешен - отправить уведомление клиенту
        // Если платеж не прошел - отправить email с инструкциями
    }
}
