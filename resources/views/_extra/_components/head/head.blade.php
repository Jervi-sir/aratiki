@vite('resources/views/_extra/_components/head/head.scss')
<div class="header-container mobile">
    <header>
        <a class="logo">
            <img src="../../images/Logo.svg" alt="">
        </a>
        <button class="hamburger">
            <img src="../../images/Hamburger.svg" alt="">
        </button>
    </header>
    <h1></h1>
</div>
<div class="header-container desktop">
    <header>
        <a class="logo">
            <img src="../../images/logo_blue.svg" alt="">
        </a>
        <button class="hamburger">
            <img src="../../images/Hamburger.svg" alt="">
        </button>
        <div class="menu">
            <a href="#" class="">Home</a>
            <a href="#" class="active">Events</a>
            <a href="#" class="">My Tickets</a>
            <a href="#" class="">Contact Us</a>
        </div>
        <div class="auth">
            <a href="#" class="login">Log in</a>
            <a href="#" class="register">Register</a>
        </div>
        <div class="user" style="display:none">
            <div class="welcome">
                <span>Welcome,</span>
                <span class="username">Jervi</span>
            </div>
            <img class="user-image" src="../../images/user.svg" alt="">
            <img src="../../images/arrow_down.svg" alt="">
        </div>
    </header>
    <h1></h1>
</div>
