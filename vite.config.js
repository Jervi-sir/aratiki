import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                //------ [ Global ]
                'app/DDD/_extra/_styles/global.scss',
                //------ [ Media ]

                //------ [ Components ]
                'app/DDD/_extra/_components/footer/footer.scss',
                'app/DDD/_extra/_components/head/head.scss',
                'app/DDD/_extra/_components/search/search.scss',
                'app/DDD/_extra/_components/success/success.scss',

                //------ [ Advertiser ]
                'app/DDD/Advertiser/post/styles.scss',

                //------ [ Client ]
                'app/DDD/Client/myTickets/styles.scss',
                'app/DDD/Client/showTicket/styles.scss',

                //------ [ Offer ]
                'app/DDD/Offer/results/styles.scss',
                'app/DDD/Offer/show/styles.scss',

                //------ [ Home ]
                'app/DDD/home/styles.scss',

                //------ [ Auth ]
                'app/DDD/css/register.scss',
                'app/DDD/css/login.scss',

            ],
            refresh: [
                'app/DDD/**',
                'resources/routes/**',
                'routes/**',
                'resources/views/**',
            ],

        }),
    ],
});
