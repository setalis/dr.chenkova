<?php

namespace App\Http\Controllers;

use App\Enums\OrderType;
use App\Http\Requests\StoreBookOrderRequest;
use App\Models\Order;
use App\Services\BookOrderService;
use App\Services\MonobankService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use RuntimeException;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\Response;

class BookOrderController extends Controller
{
    public function __construct(
        private BookOrderService $bookOrders,
        private MonobankService $monobank,
    ) {}

    public function create(): View
    {
        return view_locale('book-order.create');
    }

    public function store(StoreBookOrderRequest $request): RedirectResponse
    {
        return $this->startCheckout(
            OrderType::Paper,
            $request->safe()->except('privacy_agreement'),
            'book-order.payment-success',
            'book-order.webhook',
            'Ошибка при создании платежа. Пожалуйста, попробуйте позже.',
            'Ошибка конфигурации валюты. Пожалуйста, свяжитесь с поддержкой.',
        );
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
        ], $this->ebookValidationMessages());

        return $this->startCheckout(
            OrderType::Ebook,
            ['email' => $request->string('email')->toString()],
            'ebook-order.payment-success',
            'ebook-order.webhook',
            $this->ebookLocalizedMessage(
                'Помилка при створенні платежу. Будь ласка, спробуйте пізніше.',
                'Error creating payment. Please try again later.',
                'Ошибка при создании платежа. Пожалуйста, попробуйте позже.',
                'გადახდის შექმნის შეცდომა. გთხოვთ, სცადოთ მოგვიანებით.',
            ),
            $this->ebookLocalizedMessage(
                'Помилка конфігурації валюти. Будь ласка, зв\'яжіться з підтримкою.',
                'Currency configuration error. Please contact support.',
                'Ошибка конфигурации валюты. Пожалуйста, свяжитесь с поддержкой.',
                'ვალუტის კონფიგურაციის შეცდომა. გთხოვთ, დაუკავშირდეთ მხარდაჭერას.',
            ),
        );
    }

    public function showEbookEnForm(): View
    {
        return view_locale('ebook-en-order.create');
    }

    public function createEbookEn(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => 'required|email|max:255',
            'privacy_agreement' => 'required|accepted',
        ], $this->ebookValidationMessages());

        return $this->startCheckout(
            OrderType::EbookEn,
            ['email' => $request->string('email')->toString()],
            'ebook-en-order.payment-success',
            'ebook-en-order.webhook',
            $this->ebookLocalizedMessage(
                'Помилка при створенні платежу. Будь ласка, спробуйте пізніше.',
                'Error creating payment. Please try again later.',
                'Ошибка при создании платежа. Пожалуйста, попробуйте позже.',
                'გადახდის შექმნის შეცდომა. გთხოვთ, სცადოთ მოგვიანებით.',
            ),
            $this->ebookLocalizedMessage(
                'Помилка конфігурації валюти. Будь ласка, зв\'яжіться з підтримкою.',
                'Currency configuration error. Please contact support.',
                'Ошибка конфигурации валюты. Пожалуйста, свяжитесь с поддержкой.',
                'ვალუტის კონფიგურაციის შეცდომა. გთხოვთ, დაუკავშირდეთ მხარდაჭერას.',
            ),
        );
    }

    public function paymentSuccess(Request $request): View
    {
        return $this->completePayment($request);
    }

    public function ebookPaymentSuccess(Request $request): View
    {
        return $this->completePayment($request);
    }

    public function ebookEnPaymentSuccess(Request $request): View
    {
        return $this->completePayment($request);
    }

    public function webhook(Request $request): Response
    {
        if (! $this->monobank->verifyWebhookSignature($request)) {
            Log::warning('Monobank webhook: invalid signature', ['ip' => $request->ip()]);
            abort(403);
        }

        $invoiceId = $request->input('invoiceId');
        $status = $request->input('status');
        $order = is_string($invoiceId)
            ? Order::query()->where('invoice_id', $invoiceId)->first()
            : null;

        if ($order instanceof Order && $status === 'success') {
            $this->bookOrders->fulfill($order);
        } elseif ($order instanceof Order && in_array($status, ['failure', 'expired', 'reversed'], true)) {
            $this->bookOrders->markFailed($order);
        }

        Log::info('Monobank webhook received', [
            'status' => $status ?? 'unknown',
            'invoice_id' => $invoiceId,
        ]);

        return response('OK', 200);
    }

    public function downloadEbook(Request $request): BinaryFileResponse|RedirectResponse
    {
        $order = $this->paidOrderFromDownloadSession('ebook_order_download');

        if (! $order) {
            return redirect(route_locale('book'))
                ->withErrors(['download' => $this->ebookLocalizedMessage(
                    'Дані замовлення не знайдено. Будь ласка, переконайтеся, що оплата була успішною.',
                    'Order data not found. Please make sure the payment was successful.',
                    'Данные заказа не найдены. Пожалуйста, убедитесь, что оплата была успешной.',
                    'შეკვეთის მონაცემები ვერ მოიძებნა. გთხოვთ, დარწმუნდით, რომ გადახდა წარმატებული იყო.',
                )]);
        }

        $fileName = config('monobank.ebook.file_name', 'Kozha_na_vsiu_zhizn_Sovriemie_Alina_Valientinovna_Chienkova_1.epub');

        return $this->downloadStoredFile($fileName, 'Ebook file not found');
    }

    public function downloadEbookPdf(Request $request): View|BinaryFileResponse|RedirectResponse
    {
        $order = $this->paidOrderFromDownloadSession('ebook_order_download');

        if (! $order) {
            return redirect(route_locale('book'))
                ->withErrors(['download' => $this->ebookLocalizedMessage(
                    'Дані замовлення не знайдено. Будь ласка, переконайтеся, що оплата була успішною.',
                    'Order data not found. Please make sure the payment was successful.',
                    'Данные заказа не найдены. Пожалуйста, убедитесь, что оплата была успешной.',
                    'შეკვეთის მონაცემები ვერ მოიძებნა. გთხოვთ, დარწმუნდით, რომ გადახდა წარმატებული იყო.',
                )]);
        }

        $fileName = config('monobank.ebook.pdf_file_name', 'Kozha_na_vsiu_zhizn_Sovriemie_Alina_Valientinovna_Chienkova_1.pdf');
        $filePath = storage_path('app/public/files/'.$fileName);

        if (! file_exists($filePath)) {
            Log::error('Ebook PDF file not found', [
                'path' => $filePath,
            ]);

            return redirect(route_locale('book'))
                ->withErrors(['download' => $this->ebookLocalizedMessage(
                    'PDF файл не знайдено. Будь ласка, зв\'яжіться з підтримкою.',
                    'PDF file not found. Please contact support.',
                    'PDF файл не найден. Пожалуйста, свяжитесь с поддержкой.',
                    'PDF ფაილი ვერ მოიძებნა. გთხოვთ, დაუკავშირდეთ მხარდაჭერას.',
                )]);
        }

        if ($request->boolean('force', false)) {
            return view_locale('ebook-order.force-download-pdf', [
                'downloadUrl' => route_locale('ebook-order.download-pdf-file'),
                'fileName' => $fileName,
            ]);
        }

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

    public function downloadEbookPdfFile(Request $request): BinaryFileResponse|Response
    {
        $order = $this->paidOrderFromDownloadSession('ebook_order_download');

        if (! $order) {
            return response('Данные заказа не найдены', 403);
        }

        $fileName = config('monobank.ebook.pdf_file_name', 'Kozha_na_vsiu_zhizn_Sovriemie_Alina_Valientinovna_Chienkova_1.pdf');
        $filePath = storage_path('app/public/files/'.$fileName);

        if (! file_exists($filePath)) {
            Log::error('Ebook PDF file not found', [
                'path' => $filePath,
            ]);

            return response('PDF файл не найден', 404);
        }

        return response()->file($filePath, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="'.addslashes($fileName).'"',
            'Cache-Control' => 'no-cache, no-store, must-revalidate',
            'Pragma' => 'no-cache',
            'Expires' => '0',
        ]);
    }

    public function downloadEbookEn(Request $request): BinaryFileResponse|RedirectResponse
    {
        return $this->downloadEbookEnFile(
            config('monobank.ebook_en.epub_file_name', 'Skin_for_Life_Alina_Chenkova.epub'),
            'Ebook English EPUB file not found'
        );
    }

    public function downloadEbookEnKpf(Request $request): BinaryFileResponse|RedirectResponse
    {
        return $this->downloadEbookEnFile(
            config('monobank.ebook_en.kpf_file_name', 'Skin_for_Life_Alina_Chenkova.kpf'),
            'Ebook English KPF file not found'
        );
    }

    public function viewExcerpt($locale)
    {
        $excerptFileName = config('monobank.ebook.excerpt_file_name', 'excerpt-book.pdf');
        $pdfFileName = config('monobank.ebook.pdf_file_name', 'Kozha_na_vsiu_zhizn_Sovriemie_Alina_Valientinovna_Chienkova_1.pdf');

        Log::info('viewExcerpt called', [
            'excerpt_file_name' => $excerptFileName,
            'pdf_file_name' => $pdfFileName,
            'locale' => $locale,
        ]);

        if ($excerptFileName && ! empty($excerptFileName) && $excerptFileName !== 'null') {
            $excerptFilePath = storage_path('app/public/files/'.$excerptFileName);

            Log::info('Checking excerpt file', [
                'excerpt_file' => $excerptFileName,
                'excerpt_path' => $excerptFilePath,
                'file_exists' => file_exists($excerptFilePath),
                'is_readable' => is_readable($excerptFilePath),
            ]);

            if (file_exists($excerptFilePath) && is_readable($excerptFilePath)) {
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
            }

            Log::warning('Excerpt file not found or not readable, using full PDF as fallback', [
                'excerpt_file' => $excerptFileName,
                'excerpt_path' => $excerptFilePath,
                'fallback_file' => $pdfFileName,
            ]);
        } else {
            Log::info('No excerpt file specified, using full PDF', [
                'excerpt_file_name' => $excerptFileName,
            ]);
        }

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

    private function downloadEbookEnFile(string $fileName, string $notFoundLogMessage): BinaryFileResponse|RedirectResponse
    {
        $order = $this->paidOrderFromDownloadSession('ebook_en_order_download');

        if (! $order) {
            return redirect(route_locale('book'))
                ->withErrors(['download' => $this->ebookLocalizedMessage(
                    'Дані замовлення не знайдено. Будь ласка, переконайтеся, що оплата була успішною.',
                    'Order data not found. Please make sure the payment was successful.',
                    'Данные заказа не найдены. Пожалуйста, убедитесь, что оплата была успешной.',
                    'შეკვეთის მონაცემები ვერ მოიძებნა. გთხოვთ, დარწმუნდით, რომ გადახდა წარმატებული იყო.',
                )]);
        }

        return $this->downloadStoredFile($fileName, $notFoundLogMessage);
    }

    private function downloadStoredFile(string $fileName, string $notFoundLogMessage): BinaryFileResponse|RedirectResponse
    {
        $filePath = storage_path('app/public/files/'.$fileName);

        if (! file_exists($filePath)) {
            Log::error($notFoundLogMessage, [
                'path' => $filePath,
            ]);

            return redirect(route_locale('book'))
                ->withErrors(['download' => $this->ebookLocalizedMessage(
                    'Файл не знайдено. Будь ласка, зв\'яжіться з підтримкою.',
                    'File not found. Please contact support.',
                    'Файл не найден. Пожалуйста, свяжитесь с поддержкой.',
                    'ფაილი ვერ მოიძებნა. გთხოვთ, დაუკავშირდეთ მხარდაჭერას.',
                )]);
        }

        return response()->download($filePath, $fileName);
    }

    /**
     * @param  array<string, mixed>  $attributes
     */
    private function startCheckout(
        OrderType $type,
        array $attributes,
        string $redirectRoute,
        string $webhookRoute,
        string $paymentError,
        string $currencyError,
    ): RedirectResponse {
        try {
            $quote = $this->bookOrders->quote($type);
        } catch (RuntimeException $e) {
            Log::error('Failed to quote book order', ['error' => $e->getMessage()]);

            return redirect()
                ->back()
                ->withInput()
                ->withErrors(['payment' => $currencyError]);
        }

        try {
            $invoice = $this->monobank->createInvoice(
                amount: $quote['amount'],
                redirectUrl: route_locale($redirectRoute),
                webhookUrl: route($webhookRoute),
                productName: $quote['product_name'],
                currency: $quote['currency_code'],
            );

            $invoiceId = $invoice['invoiceId'] ?? null;
            $pageUrl = $invoice['pageUrl'] ?? null;

            if (! is_string($invoiceId) || $invoiceId === '' || ! is_string($pageUrl) || $pageUrl === '') {
                throw new RuntimeException('Monobank invoice response is incomplete.');
            }

            $order = $this->bookOrders->createPendingOrder($type, $attributes, $invoiceId);
        } catch (\Exception $e) {
            Log::error('Failed to create Monobank invoice', ['error' => $e->getMessage()]);

            return redirect()
                ->back()
                ->withInput()
                ->withErrors(['payment' => $paymentError]);
        }

        session(['checkout_order_id' => $order->id]);

        return redirect($pageUrl);
    }

    private function completePayment(Request $request): View
    {
        $order = $this->orderFromSession() ?? $this->orderFromRequest($request);

        if (! $order) {
            return view_locale('book-order.error', [
                'message' => $this->ebookLocalizedMessage(
                    'Дані замовлення не знайдено. Якщо оплата була успішною, ми зв\'яжемося з вами найближчим часом.',
                    'Order data not found. If the payment was successful, we will contact you shortly.',
                    'Данные заказа не найдены. Если оплата была успешной, мы свяжемся с вами в ближайшее время.',
                    'შეკვეთის მონაცემები ვერ მოიძებნა. თუ გადახდა წარმატებული იყო, მალე დაგიკავშირდებით.',
                ),
            ]);
        }

        $this->setLocaleFromOrder($order);

        try {
            $invoiceStatus = $this->monobank->getInvoiceStatus($order->invoice_id);
        } catch (\Exception $e) {
            Log::error('Error checking invoice status', [
                'invoice_id' => $order->invoice_id,
                'error' => $e->getMessage(),
            ]);

            return view_locale('book-order.error', [
                'message' => $this->ebookLocalizedMessage(
                    'Не вдалося перевірити статус платежу. Будь ласка, зв\'яжіться з підтримкою.',
                    'Unable to verify payment status. Please contact support.',
                    'Не удалось проверить статус платежа. Пожалуйста, свяжитесь с поддержкой.',
                    'გადახდის სტატუსის შემოწმება ვერ მოხერხდა. გთხოვთ, დაუკავშირდეთ მხარდაჭერას.',
                ),
            ]);
        }

        $status = $invoiceStatus['status'] ?? null;

        if ($status === 'success') {
            $order = $this->bookOrders->fulfill($order);
            $this->storeDownloadSession($order);

            return $this->successView($order);
        }

        if (in_array($status, ['failure', 'expired', 'reversed'], true)) {
            $this->bookOrders->markFailed($order);

            return view_locale('book-order.error', [
                'message' => $this->paymentFailedMessage(),
            ]);
        }

        return view_locale('book-order.error', [
            'message' => $this->ebookLocalizedMessage(
                'Платіж обробляється. Будь ласка, зачекайте або зв\'яжіться з підтримкою.',
                'Payment is still processing. Please wait or contact support.',
                'Платеж обрабатывается. Пожалуйста, подождите или свяжитесь с поддержкой.',
                'გადახდა მუშავდება. გთხოვთ, დაელოდოთ ან დაუკავშირდეთ მხარდაჭერას.',
            ),
        ]);
    }

    private function orderFromSession(): ?Order
    {
        $orderId = session('checkout_order_id');

        if (! $orderId) {
            return null;
        }

        return Order::find($orderId);
    }

    private function orderFromRequest(Request $request): ?Order
    {
        $invoiceId = $request->input('invoiceId') ?? $request->input('invoice_id');

        if (! is_string($invoiceId) || $invoiceId === '') {
            return null;
        }

        return Order::query()->where('invoice_id', $invoiceId)->first();
    }

    private function setLocaleFromOrder(Order $order): void
    {
        $locale = $order->locale ?: 'ru';

        if (! in_array($locale, ['ru', 'uk', 'ka', 'en'], true)) {
            $locale = 'ru';
        }

        app()->setLocale($locale);
        session(['locale' => $locale]);
    }

    private function storeDownloadSession(Order $order): void
    {
        $payload = $order->toOrderArray();

        if ($order->isEbook()) {
            session(['ebook_order_download' => $payload]);
        }

        if ($order->isEnglishEbook()) {
            session(['ebook_en_order_download' => $payload]);
        }
    }

    private function successView(Order $order): View
    {
        $view = match ($order->type) {
            OrderType::Ebook => 'ebook-order.success',
            OrderType::EbookEn => 'ebook-en-order.success',
            OrderType::Paper => 'book-order.success',
        };

        return view_locale($view, [
            'order' => $order->toOrderArray(),
        ]);
    }

    private function paidOrderFromDownloadSession(string $sessionKey): ?Order
    {
        $orderData = session($sessionKey);

        if (! is_array($orderData)) {
            return null;
        }

        $order = isset($orderData['id'])
            ? Order::find($orderData['id'])
            : Order::where('invoice_id', $orderData['invoice_id'] ?? null)->first();

        if (! $order || ! $order->isPaymentSuccessful()) {
            return null;
        }

        return $order;
    }

    private function paymentFailedMessage(): string
    {
        return $this->ebookLocalizedMessage(
            'Оплата не пройшла. Будь ласка, спробуйте ще раз або використайте іншу картку.',
            'Payment failed. Please try again or use another card.',
            'Оплата не прошла. Пожалуйста, попробуйте еще раз или используйте другую карту.',
            'გადახდა ვერ შესრულდა. გთხოვთ, სცადოთ ხელახლა ან გამოიყენოთ სხვა ბარათი.',
        );
    }

    /**
     * @return array<string, string>
     */
    private function ebookValidationMessages(): array
    {
        $locale = app()->getLocale();

        return [
            'email.required' => match ($locale) {
                'uk' => 'Email обов\'язковий для заповнення.',
                'en' => 'Email is required.',
                'ka' => 'ელფოსტა სავალდებულოა.',
                default => 'Email обязателен для заполнения.',
            },
            'email.email' => match ($locale) {
                'uk' => 'Будь ласка, введіть коректний email адрес.',
                'en' => 'Please enter a valid email address.',
                'ka' => 'გთხოვთ, შეიყვანოთ სწორი ელფოსტა.',
                default => 'Пожалуйста, введите корректный email адрес.',
            },
            'privacy_agreement.required' => match ($locale) {
                'uk' => 'Необхідна згода на обробку персональних даних.',
                'en' => 'Consent to personal data processing is required.',
                'ka' => 'საჭიროა თანხმობა პერსონალური მონაცემების დამუშავებაზე.',
                default => 'Необходимо согласие на обработку персональных данных.',
            },
            'privacy_agreement.accepted' => match ($locale) {
                'uk' => 'Необхідна згода на обробку персональних даних.',
                'en' => 'Consent to personal data processing is required.',
                'ka' => 'საჭიროა თანხმობა პერსონალური მონაცემების დამუშავებაზე.',
                default => 'Необходимо согласие на обработку персональных данных.',
            },
        ];
    }

    private function ebookLocalizedMessage(string $uk, string $en, string $ru, string $ka): string
    {
        return match (app()->getLocale()) {
            'uk' => $uk,
            'en' => $en,
            'ka' => $ka,
            default => $ru,
        };
    }
}
