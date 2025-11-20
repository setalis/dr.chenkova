# Локализация файлов в подпапках

## Правило для файлов в подпапках

**Файлы локализованных версий лежат в той же папке, что и оригинальные!**

## Пример: ebook-order/download.blade.php

### Структура файлов:

```
resources/views/
└── ebook-order/
    ├── download.blade.php          ← Оригинал (fallback)
    ├── download-ru.blade.php       ← Русская версия
    ├── download-uk.blade.php       ← Украинская версия
    ├── force-download-pdf.blade.php
    ├── force-download-pdf-ru.blade.php
    └── force-download-pdf-uk.blade.php
```

### Использование в коде:

```php
// В контроллере или роуте
return view_locale('ebook-order.download', ['order' => $orderData]);
```

**Как это работает:**
1. Вызывается `view_locale('ebook-order.download')`
2. Система определяет локаль (например, `uk`)
3. Ищет файл `ebook-order.download-uk` → `ebook-order/download-uk.blade.php`
4. Если найден → использует его
5. Если не найден → использует оригинал `ebook-order/download.blade.php`

## Другие примеры

### book-order/create.blade.php

```
resources/views/
└── book-order/
    ├── create.blade.php
    ├── create-ru.blade.php
    ├── create-uk.blade.php
    ├── success.blade.php
    ├── success-ru.blade.php
    ├── success-uk.blade.php
    ├── error.blade.php
    ├── error-ru.blade.php
    └── error-uk.blade.php
```

**Использование:**
```php
return view_locale('book-order.create');
return view_locale('book-order.success', ['order' => $order]);
return view_locale('book-order.error', ['message' => $message]);
```

### emails/book-order.blade.php

```
resources/views/
└── emails/
    ├── book-order.blade.php
    ├── book-order-ru.blade.php
    └── book-order-uk.blade.php
```

**Использование:**
```php
Mail::send('emails.book-order', ['order' => $order], function($message) {
    // ...
});
// Но лучше использовать view_locale:
Mail::send(view_locale('emails.book-order'), ['order' => $order], function($message) {
    // ...
});
```

## Важно помнить

1. **Точка в имени view = разделитель папок**
   - `ebook-order.download` → `ebook-order/download.blade.php`
   - `ebook-order.download-uk` → `ebook-order/download-uk.blade.php`

2. **Суффикс добавляется к имени файла, не к пути**
   - ✅ Правильно: `ebook-order/download-uk.blade.php`
   - ❌ Неправильно: `ebook-order-uk/download.blade.php`

3. **Все файлы в одной папке**
   - Оригинал и локализованные версии лежат вместе
   - Не создавайте отдельные папки `ru/` или `uk/`

## Пошаговая инструкция

### Шаг 1: Найдите оригинальный файл
```
resources/views/ebook-order/download.blade.php
```

### Шаг 2: Создайте копию с суффиксом локали
```bash
# Windows
copy resources\views\ebook-order\download.blade.php resources\views\ebook-order\download-uk.blade.php

# Linux/Mac
cp resources/views/ebook-order/download.blade.php resources/views/ebook-order/download-uk.blade.php
```

### Шаг 3: Переведите контент
Откройте `download-uk.blade.php` и переведите весь текст на украинский.

### Шаг 4: Обновите ссылки
Замените все `route()` на `route_locale()`:
```blade
{{-- Было --}}
<a href="{{ route('ebook-order.download') }}">

{{-- Стало --}}
<a href="{{ route_locale('ebook-order.download') }}">
```

## Проверка работы

После создания файла `download-uk.blade.php`:

1. Откройте `/uk/ebook-order/payment-success` (после успешной оплаты)
2. Должна открыться украинская версия страницы скачивания
3. Если файл не найден, будет использован оригинальный `download.blade.php`

## Полный пример структуры проекта

```
resources/views/
├── home.blade.php
├── home-ru.blade.php
├── home-uk.blade.php
├── about.blade.php
├── about-ru.blade.php
├── about-uk.blade.php
├── book-order/
│   ├── create.blade.php
│   ├── create-ru.blade.php
│   ├── create-uk.blade.php
│   ├── success.blade.php
│   ├── success-ru.blade.php
│   └── success-uk.blade.php
├── ebook-order/
│   ├── download.blade.php
│   ├── download-ru.blade.php
│   ├── download-uk.blade.php
│   ├── force-download-pdf.blade.php
│   ├── force-download-pdf-ru.blade.php
│   └── force-download-pdf-uk.blade.php
└── emails/
    ├── book-order.blade.php
    ├── book-order-ru.blade.php
    └── book-order-uk.blade.php
```












