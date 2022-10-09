<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="images/icon.png"/>
    <title>
        @yield('title')
    </title>
    @vite('resources/views/_styles/global.scss')
    @vite('resources/views/Auth/auth.scss')
    @vite('resources/js/app.js')
    @yield('head')
</head>
<body>
    @yield('body')
</body>
</html>
