## How To Use

Tata cara penginstalan web:

1. Clone project ini https://github.com/doniahmad/motolelang-web.git
2. Buka folder project di Code Editor
3. Buka folder project di Terminal
4. Jalankan diterminal ```composer install```
5. Hidupkan XAMPP/MAMP/Sejenisnya
6. Buat database baru di mysql
7. Lengkapi file .ENV di folder project dengan database yang sudah dibuat. contohnya : 
    ```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=nama_database
    DB_USERNAME=root
    DB_PASSWORD=
    ```
7. Masuk Terminal dan jalankan ```php artisan storage:link```
8. Selanjutnya jalankan "php artisan migrate"
9. Lalu jalankan ```"php artisan db:seed --class=PermissionSeeder"```
10. Lalu jalankan ```"php artisan db:seed --class=UserSeeder"```
11. Setelah semuanya dilakukan. Jalankan Website dengan. ```php artisan serve```
12. Masuk kedalam website melalui [htttp://127.0.0.1:8000](http://127.0.0.1:8000/)
