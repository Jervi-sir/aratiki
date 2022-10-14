@extends('_layouts.master')
{{-- [done] need to make card to grid kinda --}}

@section('head')
    @vite('resources/views/Home/styles.scss')
    @vite('resources/views/Home/search.scss')
@endsection

@section('body')
<div class="bg-blue"></div>
@include('_components.search.search', ['value' => $keywords])
<div class="home-before-search">
    <div class="popular-event">
        <label for="">
            <span>Results</span>
            <span>{{ $count }} <small>found</small> </span>
        </label>
        <div class="event-list after-search">
            @foreach ($events as $event)
            <div class="card">
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
    
</div>
@endsection
