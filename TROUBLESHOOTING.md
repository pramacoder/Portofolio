# Troubleshooting Guide

## Masalah: SQLite Driver Tidak Ditemukan

**Error:** `could not find driver (Connection: sqlite)`

### Solusi 1: Skip Migration (Recommended untuk Portfolio Statis)

Portfolio website ini tidak memerlukan database karena hanya menampilkan halaman statis. Migration hanya diperlukan untuk fitur seperti cache, session, dll yang opsional.

**Langkah:**

1. Skip migration - tidak perlu dijalankan untuk portfolio statis
2. Website tetap bisa berjalan tanpa database

### Solusi 2: Aktifkan SQLite Extension (Jika Ingin Menggunakan Database)

Jika Anda ingin menggunakan database untuk fitur tertentu:

1. Buka file `php.ini` di Laragon

    - Lokasi biasanya: `C:\laragon\bin\php\php-8.x.x\php.ini`

2. Cari dan uncomment baris berikut:

    ```ini
    extension=pdo_sqlite
    extension=sqlite3
    ```

3. Restart Laragon (Stop All kemudian Start All)

4. Verifikasi:
    ```bash
    php -r "echo extension_loaded('pdo_sqlite') ? 'SQLite loaded' : 'SQLite NOT loaded';"
    ```

### Solusi 3: Gunakan MySQL (Alternatif)

Jika SQLite tidak bisa diaktifkan, gunakan MySQL yang sudah tersedia di Laragon:

1. Edit file `.env`:

    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=portofolioweb
    DB_USERNAME=root
    DB_PASSWORD=
    ```

2. Buat database di phpMyAdmin atau via command:

    ```sql
    CREATE DATABASE portofolioweb;
    ```

3. Jalankan migration:
    ```bash
    php artisan migrate
    ```

## Masalah: Domain Tidak Bisa Diakses (DNS_PROBE_FINISHED_NXDOMAIN)

**Error:** `portofolioweb.test:8080` tidak bisa diakses

### Solusi 1: Pastikan Laragon Sudah Running

1. Buka Laragon
2. Klik **Start All** (Apache/Nginx dan MySQL harus hijau)
3. Tunggu hingga semua service running

### Solusi 2: Cek Konfigurasi Domain di Laragon

1. Buka Laragon
2. Klik kanan pada project `PortofolioWeb`
3. Pilih **Quick add** atau **Add to hosts**
4. Pastikan domain `portofolioweb.test` sudah terdaftar

### Solusi 3: Akses via Localhost

Jika domain tidak berfungsi, gunakan localhost:

1. Jalankan development server:

    ```bash
    php artisan serve
    ```

2. Akses via browser:
    ```
    http://localhost:8000
    ```

### Solusi 4: Cek Port 8080

Jika menggunakan port 8080, pastikan:

-   Port 8080 tidak digunakan aplikasi lain
-   Konfigurasi virtual host di Laragon sudah benar
-   Coba akses tanpa port: `http://portofolioweb.test`

## Masalah: Assets Tidak Muncul

### Solusi:

1. Build assets:

    ```bash
    npm install
    npm run build
    ```

2. Atau untuk development:

    ```bash
    npm run dev
    ```

3. Pastikan Vite dev server running jika menggunakan `npm run dev`

## Masalah: Halaman Blank atau Error 500

### Solusi:

1. Clear cache:

    ```bash
    php artisan cache:clear
    php artisan config:clear
    php artisan route:clear
    php artisan view:clear
    ```

2. Cek file `.env` sudah ada dan benar:

    ```bash
    php artisan key:generate
    ```

3. Cek log error:
    ```bash
    cat storage/logs/laravel.log
    ```

## Checklist Cepat

-   [ ] Laragon sudah Start All
-   [ ] Domain sudah terdaftar di Laragon
-   [ ] File `.env` sudah ada
-   [ ] `APP_KEY` sudah di-generate
-   [ ] Assets sudah di-build (`npm run build`)
-   [ ] Port tidak conflict dengan aplikasi lain

## Untuk Portfolio Statis (Tidak Perlu Database)

Portfolio website ini **TIDAK MEMERLUKAN DATABASE** karena:

-   Semua halaman adalah static pages
-   Tidak ada form yang perlu disimpan ke database
-   Tidak ada user authentication
-   Tidak ada dynamic content dari database

**Jadi migration bisa di-skip!**

Website tetap bisa berjalan normal tanpa database.
