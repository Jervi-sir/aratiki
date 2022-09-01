<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/png" href="images/icon.png"/>
    <title>Home</title>
    @vite('resources/css/global.scss')
    @vite('resources/views/home/styles/index.scss')
  </head>
  <body>
    <div class="bg-blue"></div>
    <div x-data='forMenu' class="body">
        <div class="overlay"></div>
        @include('home._header')
        <div class="body-top">
            <!-- Header -->
            @include('home._side_menu')
            <div class="event-container">
                <!-- Search -->
                @include('home._search')
                <!-- Popular events -->
                @include('home._popular_events')
            </div>
        </div>
        <!-- Join -->
        @include('home._join')
        <!-- Footer -->
        @include('home._footer')
    </div>

    <script defer src="./index.js"></script>
  </body>
</html>
