# Правила именования файлов представлений для локализации

## Формат именования

Файлы локализованных представлений должны следовать следующему формату:

```
{оригинальное_имя}-{код_локали}.blade.php
```

### Примеры:

- **Русский язык:**
  - `home-ru.blade.php`
  - `about-ru.blade.php`
  - `book-order/create-ru.blade.php`

- **Украинский язык:**
  - `home-uk.blade.php`
  - `about-uk.blade.php`
  - `book-order/create-uk.blade.php`

- **Грузинский язык:**
  - `home-ka.blade.php`
  - `about-ka.blade.php`
  - `book-order/create-ka.blade.php`

## Важно!

1. **Используйте дефис `-`, а не подчеркивание `_`**
   - ✅ Правильно: `home-uk.blade.php`
   - ❌ Неправильно: `home_ua.blade.php` или `home_uk.blade.php`

2. **Используйте код локали `uk`, а не `ua`**
   - ✅ Правильно: `home-uk.blade.php`
   - ❌ Неправильно: `home-ua.blade.php`
   
   Причина: в системе используется стандартный ISO 639-1 код `uk` для украинского языка.

3. **Файлы лежат в той же папке, что и оригинальные**
   - ✅ Правильно: 
     ```
     resources/views/
     ├── home.blade.php
     ├── home-ru.blade.php
     ├── home-uk.blade.php
     ```
   - ❌ Неправильно (отдельные папки):
     ```
     resources/views/
     ├── home.blade.php
     ├── ru/
     │   └── home.blade.php
     └── uk/
         └── home.blade.php
     ```

## Структура файлов

### Простые страницы

```
resources/views/
├── home.blade.php          ← Оригинал (fallback)
├── home-ru.blade.php       ← Русская версия
├── home-uk.blade.php       ← Украинская версия
├── home-ka.blade.php       ← Грузинская версия
├── about.blade.php
├── about-ru.blade.php
├── about-uk.blade.php
├── about-ka.blade.php
└── ...
```

### Страницы в подпапках

```
resources/views/
└── book-order/
    ├── create.blade.php      ← Оригинал
    ├── create-ru.blade.php   ← Русская версия
    ├── create-uk.blade.php   ← Украинская версия
    ├── create-ka.blade.php   ← Грузинская версия
    ├── success.blade.php
    ├── success-ru.blade.php
    ├── success-uk.blade.php
    └── success-ka.blade.php
```

## Как это работает

Когда вызывается `view_locale('home')`:

1. Система определяет текущую локаль (например, `ka`)
2. Ищет файл `home-ka.blade.php`
3. Если найден → использует его
4. Если не найден → использует оригинальный `home.blade.php` (fallback)

## Примеры использования

### В роуте:
```php
Route::get('/', function ($locale) {
    return view_locale('home');  // Автоматически выберет home-ru.blade.php или home-uk.blade.php
})->name('home');
```

### В контроллере:
```php
public function index()
{
    return view_locale('about', ['data' => $data]);
}
```

## Чеклист при создании локализованного файла

- [ ] Файл назван с дефисом: `{имя}-{локаль}.blade.php`
- [ ] Использован код `ru` для русского, `uk` для украинского или `ka` для грузинского
- [ ] Файл находится в той же папке, что и оригинал
- [ ] Все ссылки в файле используют `route_locale()` вместо `route()`
- [ ] Весь текст переведен на соответствующий язык

## Переименование существующих файлов

Если у вас уже есть файлы с неправильным именованием:

```bash
# Переименовать home_ua.blade.php в home-uk.blade.php
move resources\views\home_ua.blade.php resources\views\home-uk.blade.php

# Или для Linux/Mac:
mv resources/views/home_ua.blade.php resources/views/home-uk.blade.php
```

## Почему именно такой формат?

1. **Дефис вместо подчеркивания** - более читаемо и соответствует стандартам Laravel
2. **`uk` вместо `ua`** - стандартный ISO код локали, используется в URL (`/uk/`)
3. **В той же папке** - проще поддерживать, не нужно менять пути в коде
4. **Fallback на оригинал** - если локализованная версия не найдена, используется оригинал












