@vite('resources/views/_extra/_components/head/head.scss')
<div x-data="{ open: false }" class="header-container mobile">
    <header>
        <a href="{{ route('homepage') }}" class="logo">
            <img src="../../images/Logo.svg" alt="">
        </a>
        <button class="hamburger" @click="open = ! open">
            <img src="../../images/Hamburger.svg" alt="">
        </button>
    </header>
    <div class="menu-slide" x-show="open" x-transition>
        <div class="bg-box" @click="open = ! open"></div>
        <div class="box">
            <div class="top">
                <img src="../../images/Logo_mini.svg" alt="">
                <button @click="open = ! open">
                    <img src="../../images/cancel.svg" alt="">
                </button>
            </div>
            <div class="link-list">
                <a class="link" href="{{ route('homepage') }}">
                    <img src="../../images/icon_test.svg" alt="">
                    <span>Home</span>
                </a>
                <a class="link" href="{{ route('homepage') }}">
                    <img src="../../images/icon_test.svg" alt="">
                    <span>Notification</span>
                </a>
                @guest
                <a class="link" href="{{ route('login') }}">
                    <img src="../../images/icon_test.svg" alt="">
                    <span>Login</span>
                </a>
                @endguest
                @auth
                <form class="link" method="POST" action="{{ route('logout') }}">
                    @csrf
                    <img src="../../images/icon_test.svg" alt="">
                    <a href="javascript:;" onclick="parentNode.submit();">Log Out</a>
                </form>
                @endauth
            </div>
        </div>
    </div>
</div>
