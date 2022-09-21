import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/_newDesign/_styles/global.scss',
                'resources/_newDesign/home/style.scss',
                'resources/_newDesign/_components/_footer/footer.scss',
                'resources/css/register.scss',
                'resources/css/login.scss',
            ],
            refresh: [
                'resources/routes/**',
                'routes/**',
                'resources/views/**',
            ],

        }),
    ],
});
