<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        @vite(['resources/css/app.css', 'resources/js/app.js'])


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
            <main class="mx-auto w-3/4">
                <h1 class="text-center py-3 text-purple-400 font-bold">All My Offers</h1>
                <div class="flex flex-wrap">
                    @foreach ($offers as $offer)
                    @include('tailwind.advertiser._offerCard', ['offer' => $offer])
                    @endforeach
                </div>
            </main>
        </div>
    </body>
</html>
