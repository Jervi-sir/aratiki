<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/png" href="images/icon.png"/>
    <title>Add Offer</title>
    @vite('resources/css/global.scss')
    @vite('resources/js/app.js')
    @vite('resources/views/offer/styles/index.scss')
  </head>
  <body>
    <div class="bg-blue"></div>
    <div x-data='forMenu' class="body">
        <div class="overlay"></div>
        @include('home._header')

        @if (session()->has('hasNotification'))
            <div class="notification" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 800)" x-transition.duration.500ms>
                <img src="/images/success_check.svg" alt="">
                <h3>Request sent Successfully</h3>
                <h5>We will call you to confirm you registration</h5>
            </div>
        @endif
        <div class="body-top">
            <!-- Header -->
            @include('home._side_menu')
            <div class="event-container">
                <!-- Search -->
                @include('home._search')
                <!-- Popular events -->
            </div>
        </div>

        <!-- Footer -->
        @include('home._footer')
    </div>

  </body>
</html>
