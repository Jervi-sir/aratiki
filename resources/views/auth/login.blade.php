<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    @vite('resources/css/global.scss')
    @vite('resources/css/login.scss')
</head>
<body>
    <div class="body-login">
        <form action="">
            <img src="images/logo.svg" alt="" class="logo"/>
            <h1>Login</h1>
            <div class="row">
                <label><img src="images/email.svg" alt=""></label>
                <input type="text" placeholder="Email">
            </div>
            <div class="row">
                <label><img src="images/password.svg" alt=""></label>
                <input type="text" placeholder="Password">
            </div>
            <div class="forgot-password">
                <a href="#">Forgot password?</a>
            </div>
            <button type="submit">Login</button>
        </form>
    </div>

    <div class="register">
        <a href="{{ route('register') }}">
            <span>New to AraTicket?</span> <strong>Register</strong>
        </a>
    </div>


</body>
</html>
