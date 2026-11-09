# Aplikasi Pendataan Siswa dan Kelas — Angga (TI25)

UTS Pemrograman Framework — Laravel, menggunakan DB Query Builder (`DB::table()`), tanpa Model/Eloquent, tanpa Bootstrap/Tailwind.

## Cara memasang ke project Laravel
```bash
composer create-project laravel/laravel ujian-laravel
cd ujian-laravel
# salin isi folder ini (app/, database/, public/, resources/, routes/) ke dalam project, timpa routes/web.php
```
Edit `.env`:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ujian_laravel
DB_USERNAME=root
DB_PASSWORD=
```
Buat database `ujian_laravel` di MySQL, lalu:
```bash
php artisan migrate
php artisan serve
```
Buka http://127.0.0.1:8000

## Upload GitHub
```bash
git init
git add .
git commit -m "Menyelesaikan aplikasi pendataan siswa"
git branch -M main
git remote add origin https://github.com/USERNAME/ujian-laravel.git
git push -u origin main
```
Pastikan `.env` tidak ikut ter-push (sudah ada di `.gitignore` bawaan Laravel).
