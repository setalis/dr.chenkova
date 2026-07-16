<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Ваши файлы английской электронной книги</title>
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
        .file-list {
            list-style: none;
            padding: 0;
        }
        .file-list li {
            padding: 10px;
            margin-bottom: 10px;
            background-color: white;
            border-left: 4px solid #4BAE37;
            border-radius: 3px;
        }
        .footer {
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid #ddd;
            font-size: 12px;
            color: #666;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Спасибо за покупку!</h1>
    </div>

    <div class="content">
        <p>Ваш заказ успешно оплачен. Файлы английской электронной книги «Skin for Life» прикреплены к этому письму.</p>

        <div class="section">
            <div class="section-title">Файлы книги:</div>
            <ul class="file-list">
                <li>EPUB — для большинства электронных читалок</li>
                <li>KPF — формат Kindle Package Format</li>
            </ul>
        </div>

        <div class="section">
            <p>Все файлы прикреплены к этому письму. Вы можете скачать их на свое устройство и наслаждаться чтением!</p>
        </div>

        @if(isset($order['invoice_id']))
        <div class="section">
            <p><strong>Номер заказа:</strong> {{ $order['invoice_id'] }}</p>
        </div>
        @endif
    </div>

    <div class="footer">
        <p>Если у вас возникли вопросы, пожалуйста, свяжитесь с нами.</p>
    </div>
</body>
</html>
