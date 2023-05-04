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
8. Tambahkan code dibawah kedalam file .ENV :
    ```
    RAJAONGKIR_ACCOUNT_TYPE=starter
    RAJAONGKIR_API_KEY=isiapikeyanda
    RAJAONGKIR_PROV_TABLE=ro_province
    RAJAONGKIR_CITY_TABLE=ro_city
    RAJAONGKIR_CACHE=database
    ```
11. Masuk Terminal dan jalankan ```php artisan storage:link```
12. Selanjutnya jalankan "php artisan migrate"
13. Lalu jalankan ```php artisan db:seed --class=PermissionSeeder```
14. Lalu jalankan ```php artisan db:seed --class=UserSeeder```
15. Setelah semuanya dilakukan. Jalankan Website dengan. ```php artisan serve```
16. Masuk kedalam website melalui [htttp://127.0.0.1:8000](http://127.0.0.1:8000/)
