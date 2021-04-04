```
composer install
```
- add .env from .env.example with db connection and run commands
```
php artisan migrate
php artisan key:generate
```
- for data set
```
php artisan test
```
- for check homework selections
```
php artisan orders:get-by-contractor-id 2
php artisan orders:get-all-paid
php artisan orders:get-total-sum
php artisan contractors:get-duplicated

```
