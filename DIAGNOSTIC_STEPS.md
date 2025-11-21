# Пошаговая диагностика ошибки 500 на продакшене

## План диагностики

Выполняйте шаги по порядку. После каждого шага проверяйте результат.

---

## ШАГ 1: Проверка простого роута (без контроллера)

**Цель:** Убедиться, что роутинг Laravel работает.

1. Откройте файл `routes/web.php`
2. Найдите строки 43-47 (диагностический роут)
3. Раскомментируйте тестовый роут:
```php
Route::get('/test-simple', function () {
    return response('TEST: Простой роут работает!', 200);
})->name('test-simple');
```

4. На продакшене выполните:
```bash
php artisan route:clear
php artisan route:cache
```

5. Откройте в браузере: `https://dr-chenkova.com/book-order/test-simple`

**Ожидаемый результат:** Должно показать "TEST: Простой роут работает!"

**Если не работает:** Проблема в роутинге или веб-сервере.

---

## ШАГ 2: Проверка контроллера (простой ответ)

**Цель:** Убедиться, что контроллер загружается и работает.

1. Откройте файл `app/Http/Controllers/BookOrderController.php`
2. Найдите метод `create()` (строка ~118)
3. Раскомментируйте ШАГ 1:
```php
return response('TEST: BookOrderController работает!', 200);
```
4. Закомментируйте остальной код метода (или оставьте только этот return)

5. На продакшене:
```bash
php artisan route:clear
php artisan route:cache
composer dump-autoload -o
```

6. Откройте: `https://dr-chenkova.com/book-order/create`

**Ожидаемый результат:** Должно показать "TEST: BookOrderController работает!"

**Если не работает:** Проблема с автозагрузкой контроллера или его зависимостями.

---

## ШАГ 3: Проверка простого view (без компонентов)

**Цель:** Убедиться, что система представлений работает.

1. Убедитесь, что файл `resources/views/test-simple.blade.php` существует
2. В `BookOrderController.php` закомментируйте ШАГ 1, раскомментируйте ШАГ 2:
```php
return view('test-simple');
```

3. На продакшене:
```bash
php artisan view:clear
rm -rf storage/framework/views/*.php
```

4. Откройте: `https://dr-chenkova.com/book-order/create`

**Ожидаемый результат:** Должна показаться простая HTML страница с заголовком "Простой тест"

**Если не работает:** Проблема с системой представлений или правами доступа к `storage/framework/views/`

---

## ШАГ 4: Проверка view с компонентом

**Цель:** Найти проблему с компонентами Blade.

1. В `BookOrderController.php` используйте ШАГ 3 (текущий код с детальным логированием)

2. На продакшене:
```bash
php artisan view:clear
rm -rf storage/framework/views/*.php
```

3. Откройте: `https://dr-chenkova.com/book-order/create`

4. Сразу проверьте логи:
```bash
tail -n 100 storage/logs/laravel.log
```

**Что искать в логах:**
- `BookOrderController::create called - START` - контроллер вызван
- `View file exists` - файл представления найден
- `Component file exists` - компонент найден
- `View object created successfully` - view создан успешно
- Любые ошибки с указанием файла и строки

**Если ошибка в логах:**
- Скопируйте полный текст ошибки
- Обратите внимание на файл и строку, где произошла ошибка
- Проверьте, существует ли указанный файл на продакшене

---

## ШАГ 5: Запуск диагностического скрипта

**Цель:** Полная проверка окружения.

1. Загрузите файл `diagnose_production.php` на продакшен
2. Выполните:
```bash
php diagnose_production.php
```

3. Проверьте вывод скрипта - он покажет:
   - Версию PHP
   - Наличие расширений
   - Существование файлов
   - Права доступа
   - Работу автозагрузки
   - Инициализацию Laravel

---

## Возможные проблемы и решения

### Проблема: Файлы не найдены
**Решение:** Проверьте, что все файлы загружены на продакшен:
- `resources/views/book-order/create.blade.php`
- `resources/views/components/layouts/main.blade.php`
- `resources/views/components/layouts/partials/header.blade.php`
- `resources/views/components/layouts/partials/footer.blade.php`

### Проблема: Права доступа
**Решение:**
```bash
chmod -R 755 storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache
```

### Проблема: Компонент не найден
**Решение:** Проверьте структуру директорий:
```bash
ls -la resources/views/components/layouts/
ls -la resources/views/components/layouts/partials/
```

### Проблема: Opcache кеширует старую версию
**Решение:**
```bash
php -r "if (function_exists('opcache_reset')) opcache_reset();"
# или перезапустите PHP-FPM
```

### Проблема: Отсутствуют зависимости компонента
**Решение:** Проверьте, что компонент `main.blade.php` не использует несуществующие части:
```bash
grep -n "x-layouts.partials" resources/views/components/layouts/main.blade.php
```

---

## После диагностики

Когда найдете проблему:
1. Исправьте её
2. Верните нормальный код в `BookOrderController.php` (ШАГ 3)
3. Очистите все кеши
4. Проверьте работу страницы

---

## Контакты для помощи

Если проблема не решается, соберите следующую информацию:
1. Вывод `diagnose_production.php`
2. Последние 100 строк `storage/logs/laravel.log`
3. Результаты всех шагов диагностики
4. Версию PHP: `php -v`
5. Версию Laravel: `php artisan --version`
















