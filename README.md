# GrandCore Foundation
*Open Source Корпорация*

[Сайт Платформы](https://grandcore.org/)
[Проект в виде Карты](https://www.mindomo.com/mindmap/mind-map-83798b37459848089f13a01522e84907 )
[Дизайн Экранов](https://www.figma.com/file/NlikNEJQHliYlxI3MHhiSW/Share?node-id=0%3A1 )
Telegram Создателя[@i0zgMRV49fX](https://t.me/i0zgMRV49fX")
Telegram новости Проекта [@grandcore](https://t.me/grandcore)

##### Generate keys for laravel/passport

```php artisan passport:client --password```

For auth now use only key of "Laravel Password Grant Client"

url for auth: ``` "{env('APP_URL')}/oauth/token";```
```
body: {
    grant_type: 'password',
    client_id: <Client ID>,
    client_secret: '<Client secret>',
    username: '<email>',
    password: '<password>',
    scope: ''
};
```

#### First Deploy
```composer install```

```php artisan migrate --seed```

Default admin credentials:
> email: admin@grandcore.org
>
> password: secret
