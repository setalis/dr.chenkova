# Руководство по локализации проекта

## Структура файлов

### Подход с копиями страниц

Для каждого языка создаются отдельные файлы с суффиксом локали:

```
resources/views/
├── home.blade.php          # Оригинал (fallback)
├── home-ru.blade.php       # Русская версия
├── home-uk.blade.php       # Украинская версия
├── about.blade.php
├── about-ru.blade.php
├── about-uk.blade.php
└── ...
```

## URL структура

Все страницы доступны по URL с префиксом локали:

- Русский: `/ru/`, `/ru/about`, `/ru/book`, и т.д.
- Украинский: `/uk/`, `/uk/about`, `/uk/book`, и т.д.
- Корень `/` автоматически редиректит на `/ru`

## Использование в коде

### В роутах (routes/web.php)

```php
Route::get('/about', function ($locale) {
    return view_locale('about');
})->name('about');
```

### В контроллерах

```php
public function index()
{
    return view_locale('home', ['data' => $data]);
}
```

### В Blade шаблонах

#### Генерация ссылок с locale

```blade
{{-- Использование helper функции --}}
<a href="{{ route_locale('home') }}">Главная</a>
<a href="{{ route_locale('about') }}">О нас</a>

{{-- С параметрами --}}
<a href="{{ route_locale('test.result', ['session' => $session]) }}">Результат</a>

{{-- Явное указание локали --}}
<a href="{{ route_locale('home', [], 'uk') }}">Українська версія</a>
```

#### Переключатель языка

```blade
<x-language-switcher />
```

## Создание локализованных страниц

### Шаг 1: Создайте копию оригинального файла

```bash
# Пример для страницы home
cp resources/views/home.blade.php resources/views/home-ru.blade.php
cp resources/views/home.blade.php resources/views/home-uk.blade.php
```

### Шаг 2: Переведите контент

Откройте файл `home-uk.blade.php` и переведите весь текст на украинский язык.

### Шаг 3: Обновите ссылки

Убедитесь, что все внутренние ссылки используют `route_locale()`:

```blade
{{-- Было --}}
<a href="{{ route('about') }}">О нас</a>

{{-- Стало --}}
<a href="{{ route_locale('about') }}">Про нас</a>
```

## Middleware

Middleware `SetLocale` автоматически:
- Определяет локаль из URL параметра `{locale}`
- Устанавливает локаль для приложения
- Сохраняет локаль в сессии

## Fallback механизм

Если локализованная версия страницы не найдена, система автоматически использует оригинальный файл:

1. Ищет `home-uk.blade.php` (для украинского)
2. Если не найдено → использует `home.blade.php`

## Примеры

### Простая страница

**home-ru.blade.php:**
```blade
<x-layouts.main>
    <h1>Главная страница</h1>
    <p>Добро пожаловать!</p>
    <a href="{{ route_locale('about') }}">О нас</a>
</x-layouts.main>
```

**home-uk.blade.php:**
```blade
<x-layouts.main>
    <h1>Головна сторінка</h1>
    <p>Ласкаво просимо!</p>
    <a href="{{ route_locale('about') }}">Про нас</a>
</x-layouts.main>
```

### Страница с данными из контроллера

**Контроллер:**
```php
public function show($id)
{
    $data = Model::find($id);
    return view_locale('page', ['data' => $data]);
}
```

**page-ru.blade.php:**
```blade
<h1>{{ $data->title_ru }}</h1>
<p>{{ $data->content_ru }}</p>
```

**page-uk.blade.php:**
```blade
<h1>{{ $data->title_uk }}</h1>
<p>{{ $data->content_uk }}</p>
```

## Чеклист для перевода страницы

- [ ] Создать файл `{view}-ru.blade.php`
- [ ] Создать файл `{view}-uk.blade.php`
- [ ] Перевести весь текст в украинской версии
- [ ] Заменить все `route()` на `route_locale()`
- [ ] Проверить работу на `/ru/{page}` и `/uk/{page}`
- [ ] Добавить переключатель языка в header/footer

## Важные замечания

1. **Всегда используйте `route_locale()`** для внутренних ссылок
2. **Оригинальный файл** (`home.blade.php`) остается как fallback
3. **Параметр `{locale}`** обязателен в URL для локализованных роутов
4. **Роуты без локали** (dashboard, settings) остаются без изменений

## Миграция существующих страниц

1. Определите, какие страницы нужно локализовать
2. Создайте копии с суффиксами `-ru` и `-uk`
3. Переведите контент
4. Обновите ссылки на `route_locale()`
5. Протестируйте на обоих языках










