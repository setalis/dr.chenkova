# Решение проблемы 500 ошибки на продакшене

## Проблема
Ошибка 500 при обращении к `/book-order/create` на продакшене, хотя локально все работает.

## Возможные причины и решения

### 1. Очистка кеша Laravel (самое вероятное решение)

Выполните на продакшене следующие команды:

```bash
# Очистка всех кешей
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Пересоздание кеша конфигурации
php artisan config:cache

# Пересоздание кеша маршрутов
php artisan route:cache

# Оптимизация автозагрузки
composer dump-autoload
```

### 2. Проверка файла конфигурации

Убедитесь, что файл `config/monobank.php` существует на продакшене и содержит все необходимые настройки.

### 3. Проверка прав доступа

Убедитесь, что у веб-сервера есть права на чтение файлов:

```bash
chmod -R 755 storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache
```

### 4. Проверка логов ошибок

Проверьте логи Laravel для детальной информации об ошибке:

```bash
tail -f storage/logs/laravel.log
```

Или проверьте логи веб-сервера (Apache/Nginx).

### 5. Проверка переменных окружения

Убедитесь, что файл `.env` содержит все необходимые переменные и что он загружается правильно:

```bash
php artisan config:clear
php artisan config:cache
```

### 6. Проверка автозагрузки классов

Убедитесь, что класс `App\Services\MonobankService` существует и правильно загружается:

```bash
composer dump-autoload -o
```

### 7. Проверка версии PHP

Убедитесь, что на продакшене используется совместимая версия PHP (Laravel 11 требует PHP 8.2+).

### 8. Временное решение (если ничего не помогает)

Если проблема критична и нужно быстрое решение, можно сделать `MonobankService` опциональным в методе `create()`:

```php
public function create(): View
{
    // MonobankService не используется в этом методе
    return view('book-order.create');
}
```

Но это потребует изменения конструктора или использования lazy loading.

## Рекомендуемый порядок действий

1. **Сначала очистите все кеши** (пункт 1)
2. **Проверьте логи** (пункт 4) для точной диагностики
3. **Проверьте права доступа** (пункт 3)
4. **Обновите автозагрузку** (пункт 6)

## Дополнительная диагностика

Если проблема сохраняется, добавьте временное логирование в метод `create()`:

```php
public function create(): View
{
    \Log::info('BookOrderController::create called');
    try {
        return view('book-order.create');
    } catch (\Exception $e) {
        \Log::error('Error in create method', [
            'message' => $e->getMessage(),
            'trace' => $e->getTraceAsString(),
        ]);
        throw $e;
    }
}
```

Это поможет определить точную причину ошибки.

