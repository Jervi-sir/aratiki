<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        @vite('resources/views/errors/styles.scss')

    </head>
    <body>
        
        <div class="error-container">
            <div class="message">
                <h1>
                    @yield('code')
                </h1>
                <h5>
                    @yield('message')
                </h5>
            </div>
            <div>
                <a href="/">Back Home</a>
            </div>
        </div>
    </body>
</html>
