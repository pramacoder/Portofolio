# Quick Start Guide - Portfolio Website

## Setup Cepat (Tanpa Database)

Karena ini portfolio statis, **TIDAK PERLU DATABASE**. Langkah-langkah:

### 1. Install Dependencies

```bash
# Install PHP dependencies
composer install

# Install Node.js dependencies  
npm install
```

### 2. Setup Environment

```bash
# Copy .env jika belum ada
copy .env.example .env

# Generate application key
php artisan key:generate
```

### 3. Build Assets

```bash
# Build untuk production
npm run build

# ATAU untuk development dengan hot reload
npm run dev
```

### 4. Jalankan Website

**Opsi A: Menggunakan Laragon (Recommended)**

1. Buka Laragon
2. Klik **Start All**
3. Pastikan project sudah terdaftar di Laragon
4. Akses: `http://portofolioweb.test` atau `http://localhost`

**Opsi B: Menggunakan Laravel Serve**

```bash
php artisan serve
```

Kemudian akses: `http://localhost:8000`

### 5. Akses Halaman

- Home: `http://portofolioweb.test/` atau `http://localhost:8000/`
- About: `http://portofolioweb.test/about`
- Projects: `http://portofolioweb.test/projects`
- Contact: `http://portofolioweb.test/contact`

## Catatan Penting

✅ **TIDAK PERLU MIGRATION** - Portfolio ini tidak menggunakan database
✅ **TIDAK PERLU SQLite** - Website bisa berjalan tanpa database
✅ Semua halaman adalah static pages
✅ Form contact bisa diimplementasikan nanti jika diperlukan

## Troubleshooting

Jika ada masalah, lihat file `TROUBLESHOOTING.md`

## Next Steps

1. Upload gambar ke `public/images/portfolio/`
2. Edit konten di `resources/views/pages/`
3. Customize styling sesuai kebutuhan

