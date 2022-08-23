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
                <h1 class="text-center py-3 text-purple-400 font-bold">Non verified Advertisers</h1>
                <div class="rounded-t-xl overflow-auto bg-gradient-to-r from-emerald-50 to-teal-100 p-10">
                    <table class="table-auto mx-auto">
                      <thead>
                        <tr>
                            <th class="px-4 py-2 text-blue-600">is verified</th>
                            <th class="px-4 py-2 text-blue-600">Company Name</th>
                            <th class="px-4 py-2 text-blue-600">Phone number</th>
                            <th class="px-4 py-2 text-blue-600">email</th>
                            <th class="px-4 py-2 text-blue-600">details</th>
                            <th class="px-4 py-2 text-blue-600">user Name</th>
                          <th class="px-4 py-2 text-blue-600">Role</th>
                          <th class="px-4 py-2 text-blue-600">joined</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($advs as $adv)
                        <tr class="@if($loop->iteration % 2 == 0)bg-blue-200 @endif">
                            <td class="border border-blue-500 px-4 py-2 text-blue-600 font-medium">
                                <form action="{{ route('admin.confirmAdv', ['id'=>$adv->id]) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="rounded-full bg-green-300 text-white px-4 py-1 hover:bg-gray-800 ease-in-out duration-200">Verify</button>
                                </form>
                            </td>
                            <td class="border border-blue-500 px-4 py-2 text-blue-600 font-medium">{{ $adv->company_name }}</td>
                            <td class="border border-blue-500 px-4 py-2 text-blue-600 font-medium">{{ $adv->phone_number }}</td>
                            <td class="border border-blue-500 px-4 py-2 text-blue-600 font-medium">{{ $adv->user->email }}</td>
                            <td class="border border-blue-500 px-4 py-2 text-blue-600 font-medium">{{ $adv->user->name }}</td>
                            <td class="border border-blue-500 px-4 py-2 text-blue-600 font-medium">{{ $adv->details }}</td>
                            <td class="border border-blue-500 px-4 py-2 text-blue-600 font-medium">{{ $adv->user->role->name }}</td>
                            <td class="border border-blue-500 px-4 py-2 text-blue-600 font-medium">{{ $adv->created_at }}</td>
                        </tr>
                        @endforeach

                      </tbody>
                    </table>
                </div>

            </main>
        </div>
    </body>
</html>
