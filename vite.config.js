import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                //------ [ Global ]
                'resources/views/_styles/global.scss',
                //------ [ Media ]

                //------ [ Components ]
                'resources/views/_components/footer/footer.scss',
                'resources/views/_components/head/head.scss',
                'resources/views/_components/search/search.scss',
                'resources/views/_components/success/success.scss',

                //------ [ Advertiser ]
                'resources/views/Advertiser/post/styles.scss',

                //------ [ Client ]
                'resources/views/Client/myTickets/styles.scss',
                'resources/views/Client/showTicket/styles.scss',

                //------ [ Offer ]
                'resources/views/Offer/results/styles.scss',
                'resources/views/Offer/show/styles.scss',

                //------ [ Home ]
                'resources/views/home/styles.scss',

                //------ [ Auth ]
                'resources/views/css/register.scss',
                'resources/views/css/login.scss',

            ],
            refresh: [
                'app/Http/Controllers/**',
                'resources/routes/**',
                'routes/**',
                'resources/views/**',
            ],

        }),
    ],
});
