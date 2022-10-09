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
            <span>Popular Events</span>
            <a href="#">See More</a>
        </label>
        <div class="event-list">
            @foreach ($events as $event)
            <div class="card" >
                <div class="image">
                    @auth
                    <div class="bookmark">
                        <img src="../../images/bookmark.svg" alt="">
                    </div>
                    @endauth
                    <a class="preview" href="{{ $event['url'] }}">
                        <img src="{{ env('APP.ENV') .  $event['image'] }}" alt="">
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
                            <img src="../../images/location.svg" alt="">
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
            <h1>Don’t have an account?</h1>
            <span>Join Us!</span>
            <a href="{{ route('register') }}">Create Your Account</a>
        </div>
        <div class="advertiser-account">
            <h1>Wanna promote your event?</h1>
            <a href="{{ route('advertiser.join') }}">Fill Your Request</a>
            <span>
                For <strong>FREE</strong> since its all about helping people to reach out to you
            </span>
        </div>
    </div>
    @endguest
</div>
@endsection
