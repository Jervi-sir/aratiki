@vite('resources/views/_components/head/head.scss')
<div x-data="{ open: false }" class="header-container mobile">
    <header>
        <a href="{{ route('homepage') }}" class="logo">
            @auth
                @if (Auth()->user()->role->name == 'advertiser')
                <img src="../../images/Logo_pro.svg" alt="aratiki">
                @else 
                <img src="../../images/Logo.svg" alt="aratiki">
                @endif
            @endauth

            @guest
                <img src="../../images/Logo.svg" alt="aratiki">
            @endguest
        </a>
        <button class="hamburger" @click="open = ! open">
            <img src="../../images/Hamburger.svg" alt="aratiki hamburger">
        </button>
    </header>
    <div class="menu-slide" x-show="open" x-transition style="display: none">
        <div class="bg-box" @click="open = ! open"></div>
        <div class="box">
            <div class="top">
                <img src="../../images/Logo_mini.svg" alt="aratiki logo">
                <button @click="open = ! open">
                    <img src="../../images/cancel.svg" alt="aratiki cancel">
                </button>
            </div>
            <div class="link-list">
                <a class="link" href="{{ route('homepage') }}">
                    <img src="../../images/home.svg" alt="aratiki home">
                    <span>{{ __('_components.home') }}</span>
                </a>
                @auth
                <a class="link" href="{{ route('user.allTickets') }}">
                    <img src="../../images/tickets.svg" alt="aratiki tickets">
                    <span>{{ __('_components.my_tickets') }}</span>
                </a>
                @if (Auth()->user()->role->name == 'advertiser')
                <a class="link" href="{{ route('get.advertiser.allOffers') }}">
                    <img src="../../images/events.svg" alt="aratiki events">
                    <span>{{ __('_components.my_events') }}</span>
                </a>
                <a class="link" href="{{ route('get.advertiser.addOffer') }}">
                    <img src="../../images/add_event.svg" alt="aratiki add event">
                    <span>{{ __('_components.add_event') }}</span>
                </a>
                @endif
                @endauth
                @guest
                <a class="link" href="{{ route('login') }}">
                    <img src="../../images/logs.svg" alt="aratiki logo">
                    <span>{{ __('_components.login') }}</span>
                </a>
                <a class="link" href="{{ route('advertiser.join') }}">
                    <img src="../../images/advertiser.svg" alt="aratiki advertiser">
                    <span>{{ __('_components.join_advertiser') }}</span>
                </a>
                @endguest
                @auth
                <form class="link" method="POST" action="{{ route('logout') }}">
                    @csrf
                    <img src="../../images/logout.svg" alt="aratiki logout">
                    <a href="javascript:;" onclick="parentNode.submit();">{{ __('_components.logout') }}</a>
                </form>
                @endauth
            </div>
            @auth
                @if (Auth()->user()->role_id !=2)
                <div class="bottom">
                    <a href="{{ route('user.upgradePage') }}">{{ __('_components.upgrade_account') }}</a>
                </div>
                @endif
            @endauth
        </div>
    </div>
</div>
