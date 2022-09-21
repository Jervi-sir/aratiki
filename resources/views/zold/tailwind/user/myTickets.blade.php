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
                <h1 class="text-center py-3 text-purple-400 font-bold">Home</h1>

                <h2>My tickets</h2>
                <div class="grid grid-cols-3 gap-4">
                    @foreach ($tickets as $ticket)
                    <div class="max-w-sm bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                        <a href="#">
                            <img class="rounded-t-lg" src="/docs/images/blog/image-1.jpg" alt="" />
                        </a>
                        <div class="p-5">
                            <a href="#">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $ticket->offer->campaign_name}}</h5>
                            </a>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $ticket->offer->campaign_starts }}</p>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $ticket->offer->campaign_ends }}</p>
                            @php
                                $start = Carbon\Carbon::parse($ticket->offer->campaign_starts);
                                $end = Carbon\Carbon::parse($ticket->offer->campaign_ends);
                                $duration = $end->diffInDays($start);
                            @endphp
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $duration }}</p>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $ticket->offer->advertiser->company_name }}</p>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $ticket->details }}</p>
                            <a href="{{ route('user.thisTicket', ['qrcode' => $ticket->qrcode]) }}" class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Check this ticket
                                <svg class="ml-2 -mr-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>

            </main>
        </div>
    </body>
</html>
