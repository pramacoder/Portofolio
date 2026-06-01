# Deployment Checklist

Gunakan checklist ini sebelum melakukan deployment ke production.

## Pre-Deployment

### 1. Dependencies
- [ ] `composer install --optimize-autoloader --no-dev` sudah dijalankan
- [ ] `npm install` sudah dijalankan
- [ ] `npm run build` sudah dijalankan (assets ter-build dengan sukses)

### 2. Environment Configuration
- [ ] File `.env` sudah dibuat dan dikonfigurasi
- [ ] `APP_KEY` sudah di-generate (`php artisan key:generate`)
- [ ] `APP_ENV=production` di file `.env`
- [ ] `APP_DEBUG=false` di file `.env`
- [ ] `APP_URL` sudah diset ke domain production
- [ ] Database configuration sudah benar
- [ ] Mail configuration sudah benar (jika diperlukan)

### 3. Database
- [ ] Database sudah dibuat
- [ ] Migration sudah dijalankan (`php artisan migrate --force`)
- [ ] Seeder sudah dijalankan (jika diperlukan)

### 4. Assets & Images
- [ ] Folder `public/images/portfolio/` sudah berisi gambar:
  - [ ] `hero/hero-image.jpg`
  - [ ] `hero/profile.jpg`
  - [ ] `projects/project-1.jpg` sampai `project-6.jpg`
  - [ ] `projects/featured.jpg`
- [ ] Semua path gambar sudah benar di view files

### 5. Content Customization
- [ ] Nama dan informasi personal sudah diupdate di semua halaman
- [ ] Email dan kontak sudah diupdate
- [ ] Deskripsi dan konten sudah disesuaikan
- [ ] Social media links sudah diupdate (jika diperlukan)

### 6. Optimization
- [ ] `php artisan config:cache` sudah dijalankan
- [ ] `php artisan route:cache` sudah dijalankan
- [ ] `php artisan view:cache` sudah dijalankan
- [ ] `composer install --optimize-autoloader --no-dev` sudah dijalankan

### 7. Permissions (Linux/Mac)
- [ ] `storage/` folder permissions: 775
- [ ] `bootstrap/cache/` folder permissions: 775
- [ ] Ownership sudah benar (www-data atau user web server)

### 8. Web Server Configuration
- [ ] Document root mengarah ke folder `public/`
- [ ] mod_rewrite aktif (Apache)
- [ ] PHP version >= 8.2
- [ ] Nginx/Apache configuration sudah benar

## Post-Deployment Testing

### 1. Halaman Testing
- [ ] Home page (`/`) bisa diakses dan tampil dengan benar
- [ ] About page (`/about`) bisa diakses dan tampil dengan benar
- [ ] Projects page (`/projects`) bisa diakses dan tampil dengan benar
- [ ] Contact page (`/contact`) bisa diakses dan tampil dengan benar

### 2. Responsive Testing
- [ ] Mobile view (320px - 768px) tampil dengan benar
- [ ] Tablet view (768px - 1024px) tampil dengan benar
- [ ] Desktop view (1024px+) tampil dengan benar

### 3. Functionality Testing
- [ ] Navigation menu berfungsi dengan benar
- [ ] Mobile menu (hamburger) berfungsi dengan benar
- [ ] Dark mode berfungsi (jika browser support)
- [ ] Semua link internal berfungsi
- [ ] Semua gambar muncul dengan benar
- [ ] Form contact bisa di-submit (jika backend sudah diimplementasikan)

### 4. Performance Testing
- [ ] Halaman load cepat (< 3 detik)
- [ ] Assets (CSS/JS) ter-load dengan benar
- [ ] Tidak ada error di browser console
- [ ] Tidak ada 404 error untuk assets

### 5. SEO & Meta
- [ ] Title tag sudah benar di setiap halaman
- [ ] Meta description sudah ada (jika diperlukan)
- [ ] Favicon sudah ada

## Security Checklist

- [ ] `.env` file tidak ter-commit ke repository
- [ ] `APP_DEBUG=false` di production
- [ ] File permissions sudah benar
- [ ] Tidak ada sensitive information yang ter-expose
- [ ] HTTPS sudah diaktifkan (jika menggunakan SSL)

## Backup

- [ ] Database backup sudah dibuat
- [ ] File backup sudah dibuat
- [ ] Backup strategy sudah ditentukan

## Monitoring

- [ ] Error logging sudah diaktifkan
- [ ] Log files bisa diakses
- [ ] Monitoring tools sudah disetup (jika diperlukan)

## Notes

Tambahkan catatan khusus untuk deployment ini:

```
Tanggal Deployment: _______________
Deployed by: _______________
Domain: _______________
Server: _______________
```

