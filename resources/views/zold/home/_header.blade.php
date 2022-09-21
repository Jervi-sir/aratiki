<header>
    <div class="bg-header">
        <div class="logo">
        <img src="images/logo-blue.svg" alt="">
        <a href="#" class="close">
            <img src="images/hamburger-blue.svg" alt="">
        </a>
        <a href="#" class="hamburger active">
            <img src="images/hamburger-blue.svg" alt="">
        </a>
        </div>
        <nav>
        <ul class="links">
            <li>
            <a class="active" href="index">Home</a>
            </li>
            <li>
            <a href="#">My Tickets</a>
            </li>
            <li>
            <a href="event.html">Events</a>
            </li>
            <li>
            <a href="#">Contact Us</a>
            </li>
        </ul>
        </nav>
        <div class="login">
        <a href="{{ route('login') }}" class="btn-login">Login</a>
        <a href="{{ route('register') }}" class="btn-signup">Register</a>
        </div>
    </div>
</header>
