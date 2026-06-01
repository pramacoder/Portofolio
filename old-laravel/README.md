# Portfolio Website

Website portfolio profesional yang dibangun dengan Laravel, Tailwind CSS, dan Alpine.js.

## Fitur

-   ✅ 4 Halaman Responsive (Home, About, Projects, Contact)
-   ✅ Design Mobile & Desktop (8 desain dari Figma)
-   ✅ Dark Mode Support
-   ✅ Alpine.js untuk interaktivitas
-   ✅ Tailwind CSS 4 untuk styling
-   ✅ Modern UI/UX

## Teknologi

-   **Backend**: Laravel 12
-   **Frontend**: Tailwind CSS 4, Alpine.js
-   **Build Tool**: Vite
-   **PHP**: >= 8.2

## Instalasi

### Development

```bash
# Clone repository
git clone <repository-url>
cd PortofolioWeb

# Install PHP dependencies
composer install

# Install Node.js dependencies
npm install

# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate

# Setup database (edit .env terlebih dahulu)
php artisan migrate

# Build assets
npm run dev

# Jalankan development server
php artisan serve
```

### Production

Lihat file [DEPLOYMENT.md](DEPLOYMENT.md) untuk panduan lengkap deployment.

## Struktur Project

```
PortofolioWeb/
├── app/                    # Application logic
├── config/                 # Configuration files
├── database/              # Migrations & seeders
├── public/                # Public assets
│   ├── images/
│   │   └── portfolio/     # Portfolio images
│   │       ├── hero/
│   │       ├── projects/
│   │       └── testimonials/
│   └── index.php         # Entry point
├── resources/
│   ├── css/
│   │   └── app.css       # Tailwind CSS
│   ├── js/
│   │   └── app.js        # Alpine.js setup
│   └── views/
│       ├── components/   # Reusable components
│       ├── layouts/      # Layout templates
│       └── pages/        # Page templates
├── routes/
│   └── web.php           # Web routes
└── vite.config.js        # Vite configuration
```

## Halaman

-   **Home** (`/`) - Halaman utama dengan hero section dan featured projects
-   **About** (`/about`) - Tentang saya, experience, dan skills
-   **Projects** (`/projects`) - Portfolio projects dengan filter
-   **Contact** (`/contact`) - Form kontak dan informasi

## Menambahkan Gambar

1. Upload gambar hero ke `public/images/portfolio/hero/`
2. Upload gambar project ke `public/images/portfolio/projects/`
3. Update path gambar di file view sesuai kebutuhan

## Customization

### Mengubah Konten

Edit file di `resources/views/pages/`:

-   `home.blade.php` - Konten halaman home
-   `about.blade.php` - Konten halaman about
-   `projects.blade.php` - Konten halaman projects
-   `contact.blade.php` - Konten halaman contact

### Mengubah Styling

Edit file `resources/css/app.css` atau gunakan Tailwind classes langsung di Blade templates.

### Mengubah Navigation

Edit file `resources/views/components/header.blade.php`

## Development Commands

```bash
# Development server dengan hot reload
npm run dev

# Build untuk production
npm run build

# Clear cache
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
```

## License

MIT License

## Support

Untuk pertanyaan atau masalah, silakan buat issue di repository ini.
