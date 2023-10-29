## Aplikasi Penjualan HIjab Berbasis website

aplikasi ini menggunkan framework laravel, dengan menggunkan css tailwind, mysql sebegai database, dan jetstream sebagai authentication

-   [laravel](https://laravel.com/docs/routing)
-   [tailwind](https://laravel.com/docs/container)

lalu pastikan di laptop sudah ada composer dan npm

-   [node js](https://nodejs.org/en)
-   [composer](https://getcomposer.org/download/)
-   [xampp](https://www.apachefriends.org/download.html)

## Installation

```
$ git clone https://github.com/moanfs/penjualan-hijab.git
```

## usege

1. install

```
$ composer install
$ npm install
```

2. setelah rename file dengan nama .evn.example menjasi .env
3. setelah itu generate key dengan copy dibawah

```
$ php artisan key:generate
```

4. lanjut dengan migrasi database

```
$ php artisan migrate
```

5. lanjut dengan menjalankan project dengan

```
$ php artisan serve
```

```
$ npm run dev
```

```
$ conc "php artisan serve" "npm run dev"
```
