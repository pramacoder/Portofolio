# Panduan Deployment Portfolio Website

## Prerequisites

-   PHP >= 8.2
-   Composer
-   Node.js >= 18.x dan npm
-   Database (OPSIONAL - hanya diperlukan jika menggunakan cache/session database)

## Langkah-langkah Deployment

### 1. Install Dependencies

```bash
# Install PHP dependencies
composer install --optimize-autoloader --no-dev

# Install Node.js dependencies
npm install

# Build assets untuk production
npm run build
```

### 2. Konfigurasi Environment

```bash
# Copy file .env.example ke .env (jika belum ada)
cp .env.example .env

# Generate application key
php artisan key:generate

# Edit file .env dan sesuaikan konfigurasi:
# - APP_NAME
# - APP_URL
# - Database configuration
# - Mail configuration (jika diperlukan)
```

### 3. Setup Database (OPSIONAL)

**CATATAN PENTING:** Portfolio website ini adalah **STATIC WEBSITE** dan **TIDAK MEMERLUKAN DATABASE**.

Migration hanya diperlukan jika Anda ingin menggunakan fitur seperti:

-   Cache database
-   Session database
-   Queue database

Jika tidak menggunakan fitur tersebut, **SKIP langkah ini**.

```bash
# Hanya jalankan jika ingin menggunakan database untuk cache/session
php artisan migrate --force

# (Opsional) Seed database jika diperlukan
php artisan db:seed
```

### 4. Optimasi untuk Production

```bash
# Cache configuration
php artisan config:cache

# Cache routes
php artisan route:cache

# Cache views
php artisan view:cache

# Optimize autoloader
composer install --optimize-autoloader --no-dev
```

### 5. Set Permissions (Linux/Mac)

```bash
# Set permissions untuk storage dan bootstrap/cache
chmod -R 775 storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache
```

### 6. Setup Web Server

#### Apache (.htaccess sudah tersedia di public folder)

Pastikan mod_rewrite diaktifkan dan document root mengarah ke folder `public/`.

#### Nginx

```nginx
server {
    listen 80;
    server_name your-domain.com;
    root /path/to/PortofolioWeb/public;

    add_header X-Frame-Options "SAMEORIGIN";
    add_header X-Content-Type-Options "nosniff";

    index index.php;

    charset utf-8;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location = /favicon.ico { access_log off; log_not_found off; }
    location = /robots.txt  { access_log off; log_not_found off; }

    error_page 404 /index.php;

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.2-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }
}
```

## Checklist Sebelum Deploy

-   [ ] Semua dependencies terinstall (`composer install`, `npm install`)
-   [ ] Assets sudah di-build (`npm run build`)
-   [ ] File `.env` sudah dikonfigurasi dengan benar
-   [ ] `APP_KEY` sudah di-generate
-   [ ] Database sudah di-setup dan migration sudah dijalankan (OPSIONAL - tidak diperlukan untuk portfolio statis)
-   [ ] Cache sudah di-generate (config, routes, views)
-   [ ] Permissions untuk storage dan bootstrap/cache sudah benar
-   [ ] Web server sudah dikonfigurasi dengan benar
-   [ ] Gambar portfolio sudah di-upload ke `public/images/portfolio/`
-   [ ] Konten website sudah disesuaikan (nama, email, deskripsi, dll)

## Struktur Folder Gambar

Pastikan folder berikut ada dan berisi gambar:

```
public/images/portfolio/
├── hero/
│   ├── hero-image.jpg
│   └── profile.jpg
├── projects/
│   ├── project-1.jpg
│   ├── project-2.jpg
│   ├── project-3.jpg
│   ├── project-4.jpg
│   ├── project-5.jpg
│   ├── project-6.jpg
│   └── featured.jpg
└── testimonials/
    └── (gambar testimoni jika diperlukan)
```

## Troubleshooting

### Assets tidak muncul

-   Pastikan `npm run build` sudah dijalankan
-   Pastikan `APP_ENV=production` di file `.env`
-   Clear cache: `php artisan cache:clear`

### Route tidak berfungsi

-   Pastikan mod_rewrite aktif (Apache)
-   Pastikan konfigurasi web server benar
-   Clear route cache: `php artisan route:clear`

### Error 500

-   Check file `.env` sudah benar
-   Check permissions untuk storage dan bootstrap/cache
-   Check log di `storage/logs/laravel.log`

## Environment Variables Penting

```env
APP_NAME="Portfolio"
APP_ENV=production
APP_KEY=base64:...
APP_DEBUG=false
APP_URL=https://your-domain.com

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=portfolio_db
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

## Setelah Deployment

1. Test semua halaman:

    - `/` (Home)
    - `/about` (About)
    - `/projects` (Projects)
    - `/contact` (Contact)

2. Test responsive design di berbagai device

3. Test dark mode (jika browser support)

4. Verify semua gambar muncul dengan benar

5. Test form contact (jika sudah diimplementasikan backend)

## Maintenance

### Update Dependencies

```bash
composer update
npm update
npm run build
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### Clear Cache

```bash
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
```
