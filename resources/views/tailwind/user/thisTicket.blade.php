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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/qrious/4.0.2/qrious.min.js"></script>

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
                <h1 class="text-center py-3 text-purple-400 font-bold">Ticket</h1>

                <div class="flex justify-center">
                    <div class="text-center max-w-sm bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                        <div class="qr-code-result ">
                            <canvas id="qr-code" class="mx-auto"></canvas>
                          </div>
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
                            <a href="#" class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-orange-700 rounded-lg hover:bg-orange-800 focus:ring-4 focus:outline-none focus:ring-orange-300 dark:bg-orange-600 dark:hover:bg-orange-700 dark:focus:ring-orange-800">
                                Refund
                                coming soon
                            </a>
                        </div>
                    </div>
                </div>

            </main>
        </div>
        <script>
            /* JS comes here */
            var qr;
            var qrBlade = {!! json_encode($ticket->qrcode) !!};
            (function() {
                          qr = new QRious({
                          element: document.getElementById('qr-code'),
                          size: 200,
                          value: qrBlade,
                      });
                  })();

                  function generateQRCode() {
                      var qrtext = document.getElementById("qr-text").value;
                      document.getElementById("qr-result").innerHTML = "QR code for " + qrtext +":";
                      //alert(qrtext);
                      qr.set({
                          foreground: '#0f62fe',
                          size: 200,
                          value: qrtext
                      });
                  }
          </script>
    </body>
</html>
