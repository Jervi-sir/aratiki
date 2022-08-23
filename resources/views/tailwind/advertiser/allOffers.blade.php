<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                </div>
            </header>

            <!-- Page Content -->
            <main>
                <h1 class="text-center py-3 text-purple-400 font-bold">All My Offers</h1>
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    <span class="sr-only">Edit</span>
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Campaign Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    is Verified
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    is Active
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Tickets Left
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Period
                                </th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($offers as $offer)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="px-6 py-4 text-right">
                                    <a href="{{ route('get.advertiser.editOffer', ['id' => $offer->id]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                </td>
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                    {{ $offer->campaign_name }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $offer->is_verified }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $offer->is_active }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $offer->tickets_left }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $offer->campaign_starts }}
                                    {{ $offer->campaign_ends }}
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </body>
</html>
