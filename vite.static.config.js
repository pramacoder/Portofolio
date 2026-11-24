import { defineConfig } from 'vite';
import tailwindcss from '@tailwindcss/vite';
import path from 'path';

export default defineConfig({
    plugins: [tailwindcss()],
    publicDir: false,
    build: {
        outDir: 'dist',
        emptyOutDir: true,
        assetsDir: 'assets',
        rollupOptions: {
            input: {
                style: path.resolve(process.cwd(), 'resources/css/app.css'),
                app: path.resolve(process.cwd(), 'resources/js/app.js'),
            },
            output: {
                entryFileNames: 'assets/[name].js',
                chunkFileNames: 'assets/[name]-[hash].js',
                assetFileNames: (assetInfo) => {
                    if (assetInfo.name && assetInfo.name.endsWith('.css')) {
                        return 'assets/app.css';
                    }
                    return 'assets/[name][extname]';
                },
            },
        },
    },
});
