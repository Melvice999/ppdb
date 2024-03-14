clone git project ppdb

check apakah php sudah terinstall
________________________________
pada cmd ketikan php -v
jika belum terinstall masuk ke system environment / environment variables / system variables / path 
pilih edit / new / lalu ketikan C:\xampp\php
maka komputer akan menginstall php melalui xampp
setelah disimpan muat ulang cmd lalu ketikan php -v


check apakah composer sudah terinstall
___________________________________
composer --version
jika belum terinstall download di https://getcomposer.org/
setelah diinstall muat ulang cmd lalu ketikan composer --version

navigasi ke project laravel kamu 
cd path/to/your/laravel/project
composer install
copy dan paste .env.example 
rename menjadi .env
php artisan key:generate
ubah koneksi database databse


check apakah npm sudah terinstall
node -v
npm -v

jika belum terinstall
npm install -g npm

coba npm run dev jika belum bisa ketikan 
npm install


jika sudah semua npm run dev dan php artisan serve