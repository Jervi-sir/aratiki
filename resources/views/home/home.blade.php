<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>
    @vite('resources/css/global.scss')
    @vite('resources/css/home.scss')
  </head>
  <body>

    <div class="overlay"></div>
    @include('home.header')
    <div class="body-top">
        <!-- Header -->
        @include('home.side_menu')
        <div class="event-container">
            <!-- Search -->
            @include('home.search')
            <!-- Popular events -->
            @include('home.popular_events')
        </div>
    </div>
    <!-- Join -->
    @include('home.join')
    <!-- Footer -->
    @include('home.footer')
    <script defer src="./index.js"></script>
  </body>
</html>
