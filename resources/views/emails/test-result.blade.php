<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Результат теста по типу кожи</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .result {
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            margin: 20px 0;
            color: #4f46e5;
        }
        .description {
            margin: 20px 0;
        }
        .description p {
            margin: 10px 0;
        }
        .footer {
            margin-top: 30px;
            font-size: 12px;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Результат теста по типу кожи</h1>
        
        <div class="result">
            {{ $resultCode }}
        </div>

        <div class="description">
            <p><strong>D/O:</strong> {{ $resultCode[0] === 'D' ? 'Сухая' : 'Жирная' }} кожа</p>
            <p><strong>S/R:</strong> {{ $resultCode[1] === 'S' ? 'Чувствительная' : 'Резистентная' }} кожа</p>
            <p><strong>N/P:</strong> {{ $resultCode[2] === 'N' ? 'Непигментированная' : 'Пигментированная' }} кожа</p>
            <p><strong>T/W:</strong> {{ $resultCode[3] === 'T' ? 'Упругая' : 'Морщинистая' }} кожа</p>
        </div>

        <div class="footer">
            <p>Дата теста: {{ $session->created_at->format('d.m.Y H:i') }}</p>
        </div>
    </div>
</body>
</html> 