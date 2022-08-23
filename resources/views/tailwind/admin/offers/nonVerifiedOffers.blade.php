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
                <h1 class="text-center py-3 text-purple-400 font-bold">Non verified Offerss</h1>
                <div class="rounded-t-xl overflow-auto bg-gradient-to-r from-emerald-50 to-teal-100 p-10">
                    <table class="table-auto mx-auto">
                      <thead>
                        <tr>
                            <th class="px-4 py-2 text-blue-600">is verified</th>
                            <th class="px-4 py-2 text-blue-600">is Active</th>
                            <th class="px-4 py-2 text-blue-600">is Advertiser Verified</th>

                            <th class="px-4 py-2 text-blue-600">name</th>
                            <th class="px-4 py-2 text-blue-600">date start</th>
                            <th class="px-4 py-2 text-blue-600">date end</th>
                            <th class="px-4 py-2 text-blue-600">tickets left</th>

                            <th class="px-4 py-2 text-blue-600">Advertiser</th>
                            <th class="px-4 py-2 text-blue-600">details</th>
                            <th class="px-4 py-2 text-blue-600">created</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($offers as $offer)
                        <tr class="@if($loop->iteration % 2 == 0)bg-blue-200 @endif">
                            <td class="border border-blue-500 px-4 py-2 text-blue-600 font-medium">
                                @if($offer->advertiser->is_verified)
                                <form action="{{ route('admin.confirmOffer', ['id'=>$offer->id]) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="rounded-full bg-green-300 text-white px-4 py-1 hover:bg-gray-800 ease-in-out duration-200  mx-auto">Verify</button>
                                </form>
                                @else
                                <a href="{{ route('admin.editAdv', ['id' => $offer->advertiser->id]) }}" class="block rounded-md bg-red-300 text-white px-4 py-1 hover:bg-gray-800 ease-in-out duration-200  text-center">
                                    Verify Advertiser
                                </a>
                                @endif
                            </td>
                            <td class="border border-blue-500 px-4 py-2 text-blue-600 font-medium text-center">{{ $offer->is_active ? 'yes' : 'no' }}</td>
                            <td class="border border-blue-500 px-4 py-2 text-blue-600 font-medium text-center">{{ $offer->advertiser->is_verified ? 'yes' : 'no' }}</td>
                            <td class="border border-blue-500 px-4 py-2 text-blue-600 font-medium">{{ $offer->campaign_name }}</td>
                            <td class="border border-blue-500 px-4 py-2 text-blue-600 font-medium">{{ $offer->campaign_starts }}</td>
                            <td class="border border-blue-500 px-4 py-2 text-blue-600 font-medium">{{ $offer->campaign_ends }}</td>
                            <td class="border border-blue-500 px-4 py-2 text-blue-600 font-medium">{{ $offer->tickets_left }}</td>
                            <td class="border border-blue-500 px-4 py-2 text-blue-600 font-medium">
                                <a href="{{ route('admin.editAdv', ['id' => $offer->advertiser->id]) }}" class="rounded-full text-orange-600 px-4 py-1 hover:bg-gray-800 ease-in-out duration-200">
                                    {{ $offer->advertiser->company_name }}
                                </a>
                            </td>
                            <td class="border border-blue-500 px-4 py-2 text-blue-600 font-medium">{{ $offer->details }}</td>
                            <td class="border border-blue-500 px-4 py-2 text-blue-600 font-medium">{{ $offer->created_at }}</td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                </div>

            </main>
        </div>
    </body>
</html>
