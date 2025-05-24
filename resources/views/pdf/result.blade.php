<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Результат теста по типу кожи</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
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
    </style>
</head>
<body>
    <h1>Результат теста по типу кожи</h1>
    
    <div class="result">
        {{ $result }}
    </div>

    <div class="description">
        <p>D / O — Сухая или жирная</p>
        <p>S / R — Чувствительная или резистентная</p>
        <p>N / P — Непигментированная или пигментированная</p>
        <p>T / W — Упругая или морщинистая</p>
    </div>

    <div class="footer">
        <p>Дата теста: {{ $session->created_at->format('d.m.Y H:i') }}</p>
    </div>
</body>
</html> 