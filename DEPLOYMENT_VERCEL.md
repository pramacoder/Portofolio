# Deployment Laravel ke Vercel - CATATAN PENTING

## ⚠️ PERINGATAN

**Vercel TIDAK mendukung PHP/Laravel secara native.** Vercel adalah platform untuk:
- Static sites (HTML, CSS, JS)
- Serverless functions (Node.js, Python, Go, dll)
- **BUKAN untuk PHP applications**

## Alternatif Platform yang Direkomendasikan untuk Laravel

### 1. **Railway** (Paling Mudah) ⭐
- ✅ Support PHP/Laravel langsung
- ✅ Free tier tersedia
- ✅ Auto-deploy dari GitHub
- ✅ Database included
- **Link**: https://railway.app

**Cara Deploy:**
1. Connect GitHub repository
2. Pilih "Deploy from GitHub repo"
3. Railway akan auto-detect Laravel
4. Set environment variables
5. Done!

### 2. **Render** (Gratis dengan Limit)
- ✅ Support PHP/Laravel
- ✅ Free tier (dengan limit)
- ✅ Auto-deploy dari GitHub
- **Link**: https://render.com

**Cara Deploy:**
1. Buat account di Render
2. New > Web Service
3. Connect GitHub repository
4. Build Command: `composer install --no-dev && npm install && npm run build`
5. Start Command: `php -S 0.0.0.0:$PORT -t public`
6. Set environment variables

### 3. **Laravel Forge** (Profesional)
- ✅ Khusus untuk Laravel
- ✅ Managed hosting
- ✅ Auto-deploy, SSL, dll
- ⚠️ Berbayar ($12/bulan)
- **Link**: https://forge.laravel.com

### 4. **DigitalOcean App Platform**
- ✅ Support PHP/Laravel
- ✅ Managed platform
- ⚠️ Berbayar (mulai $5/bulan)
- **Link**: https://www.digitalocean.com/products/app-platform

### 5. **Heroku**
- ✅ Support PHP/Laravel
- ⚠️ Free tier dihentikan (berbayar sekarang)
- **Link**: https://www.heroku.com

## Jika Tetap Ingin Mencoba Vercel

Meskipun Vercel tidak mendukung PHP, ada beberapa workaround (TIDAK DISARANKAN):

### Opsi 1: Convert ke Static Site
- Export semua halaman menjadi HTML static
- Kehilangan fitur dynamic Laravel
- Perlu banyak perubahan code

### Opsi 2: Serverless Functions (Sangat Kompleks)
- Convert Laravel routes ke Vercel serverless functions
- Perlu rewrite banyak code
- Tidak praktis untuk Laravel

## Rekomendasi

**Untuk portfolio website Laravel ini, saya sangat merekomendasikan Railway atau Render** karena:
1. ✅ Support PHP/Laravel langsung
2. ✅ Free tier tersedia
3. ✅ Mudah setup
4. ✅ Auto-deploy dari GitHub
5. ✅ Tidak perlu konfigurasi kompleks

## Konfigurasi untuk Railway

Buat file `railway.json`:

```json
{
  "$schema": "https://railway.app/railway.schema.json",
  "build": {
    "builder": "NIXPACKS"
  },
  "deploy": {
    "startCommand": "php artisan serve --host=0.0.0.0 --port=$PORT",
    "restartPolicyType": "ON_FAILURE",
    "restartPolicyMaxRetries": 10
  }
}
```

## Konfigurasi untuk Render

Buat file `render.yaml`:

```yaml
services:
  - type: web
    name: portfolio
    env: php
    buildCommand: composer install --no-dev --optimize-autoloader && npm install && npm run build
    startCommand: php -S 0.0.0.0:$PORT -t public
    envVars:
      - key: APP_ENV
        value: production
      - key: APP_DEBUG
        value: false
```

## Environment Variables yang Perlu Diset

Di platform manapun, pastikan set environment variables berikut:

```env
APP_NAME=Portfolio
APP_ENV=production
APP_KEY=base64:... (generate dengan php artisan key:generate)
APP_DEBUG=false
APP_URL=https://your-domain.com

# Database (jika diperlukan)
DB_CONNECTION=sqlite
DB_DATABASE=/path/to/database.sqlite

# Atau gunakan database yang disediakan platform
```

## Kesimpulan

**JANGAN gunakan Vercel untuk Laravel.** Gunakan Railway atau Render untuk deployment yang mudah dan gratis.

