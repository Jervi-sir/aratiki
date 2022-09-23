import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                //------ [ Global ]
                'resources/views/_extra/_styles/global.scss',
                'resources/views/errors/styles.scss',
                //------ [ Media ]

                //------ [ Components ]
                'resources/views/_extra/_components/footer/footer.scss',
                'resources/views/_extra/_components/head/head.scss',
                'resources/views/_extra/_components/search/search.scss',
                'resources/views/_extra/_components/success/success.scss',

                //------ [ Advertiser ]
                'resources/views/Advertiser/post/styles.scss',
                'resources/views/Advertiser/showOffer/styles.scss',
                'resources/views/Advertiser/editOffer/styles.scss',

                //------ [ Client ]
                'resources/views/Client/myTickets/styles.scss',
                'resources/views/Client/showTicket/styles.scss',

                //------ [ Offer ]
                'resources/views/Offer/results/styles.scss',
                'resources/views/Offer/show/styles.scss',

                //------ [ Home ]
                'resources/views/Home/styles.scss',

                //------ [ Auth ]
                'resources/views/css/register.scss',
                'resources/views/css/login.scss',

                //------ [ Script ]
                'resources/js/app.js',

            ],
            refresh: [
                'app/Http/Controllers/**',
                'routes/**',
                'resources/views/**',
            ],

        }),
    ],
});
