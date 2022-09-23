<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        @yield('title')
    </title>

    @vite('resources/views/_extra/_styles/global.scss')
    @vite('resources/js/app.js')
    @yield('styles-head')
    @yield('script-head')

</head>
<body>
    <div class="body">
        @include('_extra/_components/head/head')
        @yield('body')
    </div>

    @include('_extra/_components/footer/footer')
</body>
</html>
