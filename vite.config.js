import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/global.scss',
                'resources/css/auth.scss',
                'resources/views/home/styles/index.scss',
                'resources/views/search/styles/index.scss',
                'resources/views/offer/styles/index.scss',
                'resources/css/register.scss',
                'resources/css/login.scss',
            ],
            //refresh: true,
            refresh: [
                'app/Http/Controllers/**'
            ],

        }),
    ],
});
