import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/global.scss',
                'resources/css/auth.scss',
                'resources/css/home.scss',
                'resources/css/register.scss',
                'resources/css/login.scss',
            ],
            refresh: true,
        }),
    ],
});
