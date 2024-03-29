<!DOCTYPE html>
<html lang="{{ __('layout.lang') }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        @yield('title')
    </title>
    <link rel="icon" href="../../images/Logo_mini.svg" sizes="any" type="image/svg+xml">
    @vite('resources/views/_styles/global.scss')
    @vite('resources/views/Auth/auth.scss')
    @vite('resources/js/app.js')
    @yield('head')
</head>
<body>
    <div class="body">
        @yield('body')
    </div>
</body>
</html>
