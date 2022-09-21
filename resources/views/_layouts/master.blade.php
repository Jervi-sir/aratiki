<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aratiki</title>

    @vite('resources/_newDesign/_styles/global.scss')
    @vite('resources/_newDesign/_components/_footer/footer.scss')

    @yield('style-head')
    @yield('script-head')

    <script src="script.js"></script>
    <script src="qrcode.js"></script>
</head>
<body>
    <div class="body">

    </div>

    @include('_newDesign._components._footer.footer')

    <script>
        function qrCodeRun() {
            var qrcode = new QRCode(document.getElementById("qrcode"), {
                text: "982-26sd-3265sad-ds",
                width: 128,
                height: 128,
                colorDark : "#203354",
                colorLight : "#ffffff",
                correctLevel : QRCode.CorrectLevel.H
            });
        }
    </script>
</body>
</html>
