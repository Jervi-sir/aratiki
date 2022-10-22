import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                //------ [ Global ]
                'resources/views/_styles/global.scss',
                'resources/views/errors/styles.scss',
                //------ [ Media ]

                //------ [ Components ]
                'resources/views/_components/footer/footer.scss',
                'resources/views/_components/head/head.scss',
                'resources/views/_components/search/search.scss',

                'resources/views/_components/info/info.scss',
                'resources/views/_components/notification/bottom_notification.scss',
                'resources/views/_components/notification/center_notification.scss',
                
                //------ [ Advertiser ]
                'resources/views/Advertiser/addOffer/styles.scss',
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
                'resources/views/Home/search.scss',

                //------ [ Auth ]
                'resources/views/Auth/auth.scss',

                //------ [ Script ]
                'resources/js/app.js',

            ],
            refresh: [
                'app/Http/Controllers/**',
                'routes/**',
                'lang/**',
                'resources/views/**',
            ],

        }),
    ],
});
