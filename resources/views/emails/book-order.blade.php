<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Новый заказ бумажной книги</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background-color: #4BAE37;
            color: white;
            padding: 20px;
            text-align: center;
            border-radius: 5px 5px 0 0;
        }
        .content {
            background-color: #f9f9f9;
            padding: 20px;
            border: 1px solid #ddd;
            border-top: none;
        }
        .section {
            margin-bottom: 20px;
        }
        .section-title {
            font-weight: bold;
            font-size: 16px;
            color: #4BAE37;
            margin-bottom: 10px;
            border-bottom: 2px solid #4BAE37;
            padding-bottom: 5px;
        }
        .field {
            margin-bottom: 8px;
        }
        .field-label {
            font-weight: bold;
            display: inline-block;
            width: 150px;
        }
        .field-value {
            display: inline-block;
        }
        .status {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 3px;
            font-weight: bold;
            background-color: #4BAE37;
            color: white;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Новый заказ бумажной книги</h1>
        <div class="status">Статус: {{ $status === 'success' ? 'Оплачено' : 'Ожидает оплаты' }}</div>
    </div>
    
    <div class="content">
        @if(isset($order))
            <div class="section">
                <div class="section-title">Информация о клиенте</div>
                <div class="field">
                    <span class="field-label">Имя:</span>
                    <span class="field-value">{{ $order['name'] ?? 'Не указано' }}</span>
                </div>
                <div class="field">
                    <span class="field-label">Номер телефона:</span>
                    <span class="field-value">{{ $order['phone'] ?? 'Не указано' }}</span>
                </div>
            </div>

            <div class="section">
                <div class="section-title">Мессенджер</div>
                <div class="field">
                    <span class="field-label">Мессенджер:</span>
                    <span class="field-value">
                        @if(isset($order['messenger']))
                            @if($order['messenger'] === 'telegram')
                                Telegram
                            @elseif($order['messenger'] === 'instagram')
                                Instagram
                            @elseif($order['messenger'] === 'whatsapp')
                                WhatsApp
                            @else
                                {{ $order['messenger'] }}
                            @endif
                        @else
                            Не указано
                        @endif
                    </span>
                </div>
                <div class="field">
                    <span class="field-label">Контакт:</span>
                    <span class="field-value">{{ $order['contact'] ?? 'Не указано' }}</span>
                </div>
            </div>

            <div class="section">
                <div class="section-title">Адрес доставки</div>
                <div class="field">
                    <span class="field-label">Страна:</span>
                    <span class="field-value">{{ $order['country'] ?? 'Не указано' }}</span>
                </div>
                <div class="field">
                    <span class="field-label">Город:</span>
                    <span class="field-value">{{ $order['city'] ?? 'Не указано' }}</span>
                </div>
                @if(!empty($order['region']))
                <div class="field">
                    <span class="field-label">Регион:</span>
                    <span class="field-value">{{ $order['region'] }}</span>
                </div>
                @endif
                <div class="field">
                    <span class="field-label">Адрес 1:</span>
                    <span class="field-value">{{ $order['address_1'] ?? 'Не указано' }}</span>
                </div>
                @if(!empty($order['address_2']))
                <div class="field">
                    <span class="field-label">Адрес 2:</span>
                    <span class="field-value">{{ $order['address_2'] }}</span>
                </div>
                @endif
                <div class="field">
                    <span class="field-label">Индекс (ZIP):</span>
                    <span class="field-value">{{ $order['zip'] ?? 'Не указано' }}</span>
                </div>
            </div>

            <div class="section">
                <div class="section-title">Информация о заказе</div>
                <div class="field">
                    <span class="field-label">Товар:</span>
                    <span class="field-value">{{ $order['product_name'] ?? 'Бумажная книга' }}</span>
                </div>
                <div class="field">
                    <span class="field-label">Сумма:</span>
                    <span class="field-value">
                        @if(isset($order['currency_info']['symbol']))
                            {{ number_format($order['amount'] / 100, 2) }} {{ $order['currency_info']['symbol'] }} ({{ $order['currency'] ?? 'UAH' }})
                        @else
                            {{ number_format($order['amount'] / 100, 2) }} ₴
                        @endif
                    </span>
                </div>
                @if(!empty($order['invoice_id']))
                <div class="field">
                    <span class="field-label">Номер заказа:</span>
                    <span class="field-value">{{ $order['invoice_id'] }}</span>
                </div>
                @endif
            </div>
        @endif
    </div>
</body>
</html>

