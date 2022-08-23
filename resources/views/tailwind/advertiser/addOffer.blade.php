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
            @include('tailwind.components.navigation')
            <!-- Page Heading -->
            @include('tailwind.components.header', ['slot' => 'add Offer'])
            <!-- Page Content -->
            <main>
                <form action="{{ route('post.advertiser.addOffer')}}" method="POST" class="m-auto w-full max-w bg-white p-11 rounded-xl">
                    @csrf
                    <!-- images -->
                    @include('tailwind.components.input-images')
                    <!-- campaign_name -->
                    @include('tailwind.components.input-text',
                        [
                            'label' => 'Campaign Name',
                            'request_name' => 'campaign_name',
                            'placeholder' => 'Your Brand'
                        ])
                    <!-- type -->
                    @include('tailwind.components.select-option',
                        [
                            'label' => 'Type',
                            'request_name' => 'type',
                            'templates' => $templates
                        ])
                    <!-- campaign_starts -->
                    @include('tailwind.components.input-date',
                        [
                            'label' => 'Campaign Start',
                            'request_name' => 'campaign_starts',
                        ])
                    <!-- campaign_ends -->
                    @include('tailwind.components.input-date',
                        [
                            'label' => 'Campaign Ends',
                            'request_name' => 'campaign_ends',
                        ])
                    <!-- tickets_left -->
                    @include('tailwind.components.input-spinner',
                        [
                            'label' => 'How many tickets',
                            'request_name' => 'tickets_left',
                        ])
                    <!-- details -->
                    @include('tailwind.components.textarea',
                        [
                            'label' => 'Details',
                            'request_name' => 'details',
                        ])
                    <div class="md:flex md:items-center">
                      <div class="md:w-1/3 ml-auto">
                        <button class="w-full shadow bg-slate-800 hover:bg-slate-900 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
                          Create
                        </button>
                      </div>
                    </div>
                </form>
            </main>
        </div>


        @vite('resources/js/draggable.js')
    </body>
</html>
