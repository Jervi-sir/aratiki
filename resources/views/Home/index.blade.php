@extends('_layouts.master')
{{-- [done] need to make card to grid kinda --}}

@section('head')
    @vite('resources/views/Home/styles.scss')
@endsection

@section('body')
<div class="bg-blue"></div>
@include('_components.search.search', ['value' => ''])
<div class="home-before-search">
    @include('Home.categories')
    <div class="popular-event">
        <label for="">
            <span>{{ __('home.popular_event') }}</span>
            <a href="#">{{ __('home.see_more') }}</a>
        </label>
        <div class="event-list">
            @foreach ($events as $event)
            <div class="card" >
                <div class="image">
                    @auth
                    <div class="bookmark">
                        <img src="../../images/bookmark.svg" alt="aratiki bookmark">
                    </div>
                    @endauth
                    <a class="preview" href="{{ $event['url'] }}">
                        <img src="{{ env('APP.ENV') .  $event['image'] }}" alt="aratiki preview">
                    </a>
                    <div class="date-container">
                        <div class="date">
                            {{ $event['date'] }}
                        </div>
                    </div>
                </div>
                <div class="details">
                    <div class="title-promoter-duration">
                        <div class="title-promoter">
                            <div class="title">{{ $event['event_name'] }}</div>
                            <div class="promoter">By {{ $event['advertiser_name'] }}</div>
                        </div>
                        <div class="duration">
                            {{ $event['duration'] }}
                        </div>
                    </div>
                    <div class="location-price">
                        <div class="location">
                            <img src="../../images/location.svg" alt="aratiki location">
                            <span>{{ $event['location'] }}</span>
                        </div>
                        <div class="price">
                            {{ $event['price_economy'] }} <small>DA</small>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    @guest
    <div class="join-container">
        <div class="create-account">
            <h1>{{ __('home.dont_have_account') }}</h1>
            <span>Join Us!</span>
            <a href="{{ route('register') }}">{{ __('home.create_account') }}</a>
        </div>
        <div class="advertiser-account">
            <h1>{{ __('home.become_advertiser') }}</h1>
            <a href="{{ route('advertiser.join') }}">{{ __('home.fill_request') }}</a>
            <span>
                {{ __('home.for') }} 
                <strong>{{ __('home.free') }}</strong> 
                {{ __('home.become_advertiser_text') }}
            </span>
        </div>
    </div>
    @endguest
</div>
@endsection
