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
            <main class="max-w-xl mx-auto">
                <form action="{{ route('post.advertiser.addOffer')}}" enctype="multipart/form-data" method="POST" class="m-auto w-full max-w bg-white p-11 rounded-xl shadow-md px-8 pt-6 pb-8 mb-4">
                    @csrf
                    <!-- Images -->
                    @include('tailwind.components.images')
                    <!-- Campaign name -->
                    @include('tailwind.components.input-text', ['label' => 'Event name', 'request_name' => 'campaign_name', 'placeholder' => 'Please enter your Campaign name'])
                    <!-- location -->
                    @include('tailwind.components.input-text', ['label' => 'Location', 'request_name' => 'location', 'placeholder' => "Please enter event's location"])
                    <!-- date picker  -->
                    @include('tailwind.components.input-date', ['request_name_1' => 'date_start', 'request_name_2' => 'date_end'])
                    <!-- event type -->
                    @include('tailwind.components.select-option', ['label' => 'Type of event', 'request_name' => 'type', 'placeholder' => 'Select event type', 'request_name_2' => $templates])
                    <!-- total tickets -->
                    @include('tailwind.components.input-spinner', ['request_name' => 'total_tickets', 'label' => 'Total tickets'])
                    <!-- Price -->

                    <!-- phonenumber  -->
                    @include('tailwind.components.phone-number', ['value' => $phone_number])
                    <!-- description -->
                    @include('tailwind.components.textarea', ['request_name' => 'description'])
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
