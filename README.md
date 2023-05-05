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
9. Anda bisa mendapatkan Api Key RajaOngkir dengan membuat akun di https://rajaongkir.com/ 
10. Tambahkan atau ubah file .ENV seperti dibawah :
```
MAIL_MAILER=smtp
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=mailtrapusername
MAIL_PASSWORD=mailtrappass
MAIL_ENCRYPTION=tls
```
11. Untuk mendapatkan isi username dan password. buat akun di https://mailtrap.io/
13. Masuk Terminal dan jalankan ```php artisan storage:link```
14. Selanjutnya jalankan ```php artisan migrate```
15. Lalu jalankan ```php artisan db:seed --class=PermissionSeeder```
16. Lalu jalankan ```php artisan db:seed --class=UserSeeder```
17. Selanjutnya jelankan ```php artisan key:generate```
18. Setelah semuanya dilakukan. Jalankan Website dengan. ```php artisan serve```
19. Masuk kedalam website melalui [htttp://127.0.0.1:8000](http://127.0.0.1:8000/)
