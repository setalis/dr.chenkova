<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Your English e-book files</title>
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
        <h1>Thank you for your purchase!</h1>
    </div>

    <div class="content">
        <p>Your order has been paid successfully. The English e-book files for «Skin for Life» are attached to this email.</p>

        <div class="section">
            <div class="section-title">Book files:</div>
            <ul class="file-list">
                <li>EPUB — for most e-readers</li>
                <li>KPF — Kindle Package Format</li>
            </ul>
        </div>

        <div class="section">
            <p>All files are attached to this email. You can download them to your device and enjoy reading!</p>
        </div>

        @if(isset($order['invoice_id']))
        <div class="section">
            <p><strong>Order number:</strong> {{ $order['invoice_id'] }}</p>
        </div>
        @endif
    </div>

    <div class="footer">
        <p>If you have any questions, please contact us.</p>
    </div>
</body>
</html>
