import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/sweet-alert.js',
            ],
            refresh: true,
        }),
        vue(), // ← Tambahkan ini agar plugin Vue aktif
    ],
});
