## Вариант сайта для GrandCore Foundation

Используется TALL-stack (https://tallstack.io) - Laravel, Livewire, TaiwindCSS, AlpineJS

Все интерактивные элементы работают на Livewire (https://laravel-livewire.com/), служебное управление DOM - при помощи AlpineJS (https://github.com/alpinejs/alpine). Верстка на базе TailwindCSS (https://tailwindcss.com/) и TailwindUI (https://tailwindui.com/).

Преимущество такого подхода - простота написания (не надо делать аутентификацию по токенам и дублировать авторизацию и прочий код на клиенте), SSR из коробки (отсутствие проблем с индексацией поисковиками) и малый объём js-бандла (25 кБ).

### Установка

```
composer install
```
```
cp .env.example .env
```
отредактировать .env под свои нужды (доступ к БД и т.д.)
```
php artisan key:generate
```
```
php artisan migrate --seed
```
Вход под админом:

> admin@grandcore.org
>
> secret

Админка с выдачей инвайтов: /admin/invites

### Разработка

```
npm install
```
Если редактируется основной файл стилей `resources/scss/app.scss` или `tailwind.config.js`:
```
npm run watch
```

--------------------------------------------

## GrandCore Foundation
*Open Source Корпорация*

[Сайт Платформы](https://grandcore.org/)

[Проект в виде Карты](https://www.mindomo.com/mindmap/mind-map-83798b37459848089f13a01522e84907 )

[Дизайн Экранов](https://www.figma.com/file/NlikNEJQHliYlxI3MHhiSW/Share?node-id=0%3A1 )

Telegram Создателя[@i0zgMRV49fX](https://t.me/i0zgMRV49fX")

Telegram новости Проекта [@grandcore](https://t.me/grandcore)
