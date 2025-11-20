<?php
/**
 * Диагностический скрипт для проверки проблем на продакшене
 * Запуск: php diagnose_production.php
 */

require __DIR__ . '/vendor/autoload.php';

echo "=== Диагностика проблем на продакшене ===\n\n";

$basePath = __DIR__;

// 1. Проверка версии PHP
echo "1. Версия PHP:\n";
echo "   " . PHP_VERSION . "\n";
echo "   " . (version_compare(PHP_VERSION, '8.2.0', '>=') ? '✓' : '✗') . " Требуется PHP 8.2+\n\n";

// 2. Проверка необходимых расширений
echo "2. Проверка расширений PHP:\n";
$required = ['mbstring', 'openssl', 'pdo', 'tokenizer', 'xml', 'ctype', 'json', 'fileinfo'];
foreach ($required as $ext) {
    $loaded = extension_loaded($ext);
    echo "   " . ($loaded ? '✓' : '✗') . " $ext\n";
}
echo "\n";

// 3. Проверка файлов контроллера
echo "3. Проверка файлов:\n";
$files = [
    'app/Http/Controllers/BookOrderController.php',
    'resources/views/book-order/create.blade.php',
    'resources/views/components/layouts/main.blade.php',
    'resources/views/components/layouts/partials/header.blade.php',
    'resources/views/components/layouts/partials/footer.blade.php',
    'config/monobank.php',
];

foreach ($files as $file) {
    $fullPath = $basePath . '/' . $file;
    $exists = file_exists($fullPath);
    echo "   " . ($exists ? '✓' : '✗') . " $file\n";
    if ($exists) {
        echo "      Размер: " . filesize($fullPath) . " байт\n";
        echo "      Права: " . substr(sprintf('%o', fileperms($fullPath)), -4) . "\n";
    }
}
echo "\n";

// 4. Проверка прав доступа
echo "4. Проверка прав доступа:\n";
$dirs = [
    'storage',
    'storage/framework',
    'storage/framework/views',
    'storage/logs',
    'bootstrap/cache',
];

foreach ($dirs as $dir) {
    $fullPath = $basePath . '/' . $dir;
    if (is_dir($fullPath)) {
        $writable = is_writable($fullPath);
        $readable = is_readable($fullPath);
        echo "   " . ($writable && $readable ? '✓' : '✗') . " $dir (readable: " . ($readable ? 'yes' : 'no') . ", writable: " . ($writable ? 'yes' : 'no') . ")\n";
    } else {
        echo "   ✗ $dir (не существует)\n";
    }
}
echo "\n";

// 5. Проверка .env переменных
echo "5. Проверка .env переменных:\n";
$envFile = $basePath . '/.env';
if (file_exists($envFile)) {
    echo "   ✓ .env файл существует\n";
    $envContent = file_get_contents($envFile);
    $requiredVars = ['APP_KEY', 'APP_ENV', 'DB_CONNECTION'];
    foreach ($requiredVars as $var) {
        $found = strpos($envContent, $var) !== false;
        echo "   " . ($found ? '✓' : '✗') . " $var\n";
    }
} else {
    echo "   ✗ .env файл не найден\n";
}
echo "\n";

// 6. Проверка автозагрузки
echo "6. Проверка автозагрузки:\n";
$className = 'App\Http\Controllers\BookOrderController';
if (class_exists($className)) {
    echo "   ✓ Класс $className загружается\n";
    $reflection = new ReflectionClass($className);
    echo "   Файл: " . $reflection->getFileName() . "\n";
    echo "   Методы: " . implode(', ', array_map(fn($m) => $m->getName(), $reflection->getMethods(ReflectionMethod::IS_PUBLIC))) . "\n";
} else {
    echo "   ✗ Класс $className НЕ загружается\n";
}
echo "\n";

// 7. Попытка создать экземпляр контроллера
echo "7. Создание экземпляра контроллера:\n";
try {
    if (class_exists($className)) {
        $controller = new $className();
        echo "   ✓ Экземпляр создан успешно\n";
        
        // Пробуем вызвать метод create
        echo "8. Вызов метода create():\n";
        try {
            $result = $controller->create();
            echo "   ✓ Метод create() выполнен\n";
            echo "   Тип результата: " . get_class($result) . "\n";
        } catch (\Exception $e) {
            echo "   ✗ Ошибка при вызове create(): " . $e->getMessage() . "\n";
            echo "   Файл: " . $e->getFile() . ":" . $e->getLine() . "\n";
        }
    }
} catch (\Exception $e) {
    echo "   ✗ Ошибка при создании экземпляра: " . $e->getMessage() . "\n";
    echo "   Файл: " . $e->getFile() . ":" . $e->getLine() . "\n";
}
echo "\n";

// 8. Проверка Laravel приложения
echo "9. Инициализация Laravel приложения:\n";
try {
    $app = require $basePath . '/bootstrap/app.php';
    echo "   ✓ Laravel приложение инициализировано\n";
    
    // Проверяем view helper
    if (function_exists('view')) {
        echo "   ✓ Функция view() доступна\n";
    } else {
        echo "   ✗ Функция view() НЕ доступна\n";
    }
    
    // Проверяем route helper
    if (function_exists('route')) {
        echo "   ✓ Функция route() доступна\n";
    } else {
        echo "   ✗ Функция route() НЕ доступна\n";
    }
    
} catch (\Exception $e) {
    echo "   ✗ Ошибка при инициализации: " . $e->getMessage() . "\n";
    echo "   Файл: " . $e->getFile() . ":" . $e->getLine() . "\n";
}
echo "\n";

// 9. Проверка компонентов Blade
echo "10. Проверка компонентов Blade:\n";
$componentPath = $basePath . '/resources/views/components/layouts/main.blade.php';
if (file_exists($componentPath)) {
    $content = file_get_contents($componentPath);
    
    // Проверяем зависимости компонента
    $dependencies = [
        'x-layouts.partials.header' => 'header.blade.php',
        'x-layouts.partials.footer' => 'footer.blade.php',
    ];
    
    foreach ($dependencies as $component => $file) {
        $depPath = $basePath . '/resources/views/components/layouts/partials/' . $file;
        $exists = file_exists($depPath);
        $used = strpos($content, $component) !== false;
        echo "   " . ($exists && $used ? '✓' : ($used ? '✗' : '-')) . " $component ($file)\n";
    }
} else {
    echo "   ✗ Компонент main.blade.php не найден\n";
}
echo "\n";

echo "=== Диагностика завершена ===\n";
echo "\nРекомендации:\n";
echo "1. Если класс не загружается - выполните: composer dump-autoload -o\n";
echo "2. Если проблемы с правами - выполните: chmod -R 755 storage bootstrap/cache\n";
echo "3. Если проблемы с view - проверьте наличие всех файлов компонентов\n";
echo "4. Проверьте логи: tail -f storage/logs/laravel.log\n";















