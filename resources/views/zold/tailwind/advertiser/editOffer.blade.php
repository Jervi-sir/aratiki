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
                <h1 class="text-center py-3 text-purple-400 font-bold">edit Offer</h1>
                <form action="{{ route('update.advertiser.editOffer', ['id' => $offer->id ])}}" method="POST" class="m-auto w-full max-w-sm bg-white p-11 rounded-xl">
                    @csrf
                    <!-- campaign_name -->
                    <div class="md:flex md:items-center mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                                Campaign Name
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <input required value="{{ $offer->campaign_name }}" type="text" name="campaign_name" placeholder="Your Brand" class="bg-gray-100 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500">
                        </div>
                    </div>
                    <!-- type -->
                    <div class="md:flex md:items-center mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="type">
                                Type
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <input disabled value="{{ $offer->template->template_name }}" type="text" class="bg-gray-400 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-200 leading-tight focus:outline-none focus:bg-white focus:border-purple-500">
                        </div>
                    </div>
                    <!-- campaign_starts -->
                    <div class="md:flex md:items-center mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                                Campaign Starts
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <input required value="{{ $offer->campaign_starts }}"  type="date" name="campaign_starts" class="bg-gray-100 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500">
                        </div>
                    </div>
                    <!-- campaign_ends -->
                    <div class="md:flex md:items-center mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                                Campaign Ends
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <input required type="date" value="{{ $offer->campaign_ends }}" name="campaign_ends" class="bg-gray-100 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500">
                        </div>
                    </div>
                    <!-- tickets_left -->
                    <div class="md:flex md:items-center mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                                Tickets
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <input required value="{{ $offer->tickets_left }}" type="number" min="0" name="tickets_left" placeholder="0" class="bg-gray-100 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500">
                        </div>
                    </div>

                    <!-- details -->
                    <div class="md:flex md:items-center mb-6">
                        <div class="md:w-1/3">
                          <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="details">
                            Details
                          </label>
                        </div>
                        <div class="md:w-2/3">
                            <textarea required id="details" rows="4" name="details" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-100 appearance-none border-2 border-gray-200 rounded  py-2 px-4  leading-tight focus:outline-none focus:bg-white focus:border-purple-500" placeholder="Leave a comment...">{{ $offer->details }}</textarea>
                        </div>
                      </div>
                    <div class="md:flex md:items-center">
                      <div class="md:w-1/3"></div>
                      <div class="md:w-2/3">
                        <button class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
                          Update
                        </button>
                      </div>
                    </div>
                </form>

            </main>
        </div>
    </body>
</html>
