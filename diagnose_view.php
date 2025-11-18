<?php
/**
 * Диагностика проблем с представлениями
 * Запуск: php diagnose_view.php
 */

require __DIR__ . '/vendor/autoload.php';

$app = require __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

echo "=== Диагностика представлений ===\n\n";

// 1. Проверка существования view файлов
echo "1. Проверка view файлов:\n";
$views = [
    'book-order.create' => 'resources/views/book-order/create.blade.php',
    'components.layouts.main' => 'resources/views/components/layouts/main.blade.php',
    'components.layouts.partials.header' => 'resources/views/components/layouts/partials/header.blade.php',
    'components.layouts.partials.footer' => 'resources/views/components/layouts/partials/footer.blade.php',
    'test-simple' => 'resources/views/test-simple.blade.php',
];

foreach ($views as $viewName => $filePath) {
    $fullPath = __DIR__ . '/' . $filePath;
    if (file_exists($fullPath)) {
        echo "   ✓ $viewName: существует\n";
        echo "      Размер: " . filesize($fullPath) . " байт\n";
    } else {
        echo "   ✗ $viewName: НЕ НАЙДЕН ($filePath)\n";
    }
}

// 2. Проверка компонентов Blade
echo "\n2. Проверка компонентов Blade:\n";
try {
    $viewFinder = $app->make('view.finder');
    echo "   ✓ ViewFinder создан\n";
    
    // Проверяем, может ли Laravel найти view
    foreach (['book-order.create', 'test-simple'] as $viewName) {
        try {
            $path = $viewFinder->find($viewName);
            echo "   ✓ View '$viewName' найден: $path\n";
        } catch (\Exception $e) {
            echo "   ✗ View '$viewName' НЕ найден: " . $e->getMessage() . "\n";
        }
    }
} catch (\Exception $e) {
    echo "   ✗ Ошибка при проверке ViewFinder: " . $e->getMessage() . "\n";
}

// 3. Проверка Vite
echo "\n3. Проверка Vite:\n";
$viteManifest = __DIR__ . '/public/build/manifest.json';
if (file_exists($viteManifest)) {
    echo "   ✓ Manifest Vite найден\n";
    $manifest = json_decode(file_get_contents($viteManifest), true);
    if ($manifest) {
        echo "   ✓ Manifest валиден\n";
        echo "   Файлов в манифесте: " . count($manifest) . "\n";
    } else {
        echo "   ✗ Manifest невалиден\n";
    }
} else {
    echo "   ⚠ Manifest Vite не найден (возможно, не собран)\n";
}

// 4. Проверка Livewire
echo "\n4. Проверка Livewire:\n";
if (class_exists('Livewire\Livewire')) {
    echo "   ✓ Livewire установлен\n";
} else {
    echo "   ⚠ Livewire не найден (может быть проблемой, если используется в layout)\n";
}

// 5. Попытка создать простой view
echo "\n5. Попытка создать простой view:\n";
try {
    $view = view('test-simple');
    echo "   ✓ View 'test-simple' создан успешно\n";
    
    // Пытаемся получить содержимое
    $content = $view->render();
    echo "   ✓ View отрендерен успешно\n";
    echo "   Размер содержимого: " . strlen($content) . " байт\n";
} catch (\Exception $e) {
    echo "   ✗ Ошибка при создании view: " . $e->getMessage() . "\n";
    echo "   Файл: " . $e->getFile() . ":" . $e->getLine() . "\n";
}

// 6. Попытка создать view с компонентом
echo "\n6. Попытка создать view с компонентом layouts.main:\n";
try {
    $view = view('book-order.create');
    echo "   ✓ View 'book-order.create' создан успешно\n";
    
    // Пытаемся получить содержимое
    $content = $view->render();
    echo "   ✓ View отрендерен успешно\n";
    echo "   Размер содержимого: " . strlen($content) . " байт\n";
} catch (\Exception $e) {
    echo "   ✗ Ошибка при создании view: " . $e->getMessage() . "\n";
    echo "   Файл: " . $e->getFile() . ":" . $e->getLine() . "\n";
    
    if ($e->getPrevious()) {
        echo "   Предыдущее исключение: " . $e->getPrevious()->getMessage() . "\n";
        echo "   Файл: " . $e->getPrevious()->getFile() . ":" . $e->getPrevious()->getLine() . "\n";
    }
    
    echo "   Trace:\n";
    $trace = explode("\n", $e->getTraceAsString());
    foreach (array_slice($trace, 0, 10) as $line) {
        echo "   " . $line . "\n";
    }
}

// 7. Проверка через HTTP запрос
echo "\n7. Проверка через HTTP запрос:\n";
try {
    $request = Illuminate\Http\Request::create('/book-order/create', 'GET');
    $response = $kernel->handle($request);
    
    echo "   Статус: " . $response->getStatusCode() . "\n";
    if ($response->getStatusCode() === 200) {
        echo "   ✓ Запрос успешен\n";
        $content = $response->getContent();
        echo "   Размер ответа: " . strlen($content) . " байт\n";
        if (strlen($content) < 500) {
            echo "   Содержимое: " . substr($content, 0, 500) . "\n";
        }
    } else {
        echo "   ✗ Ошибка HTTP: " . $response->getStatusCode() . "\n";
        $content = $response->getContent();
        echo "   Содержимое: " . substr($content, 0, 1000) . "\n";
    }
} catch (\Exception $e) {
    echo "   ✗ Ошибка при HTTP запросе: " . $e->getMessage() . "\n";
    echo "   Файл: " . $e->getFile() . ":" . $e->getLine() . "\n";
}

echo "\n=== Конец диагностики ===\n";

