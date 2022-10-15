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
            <span>{{ __('home.results') }}</span>
            <span>{{ $count }} <small>{{ __('home.found') }}</small> </span>
        </label>
        <div class="event-list after-search">
            @foreach ($events as $event)
            <div class="card">
                <div class="image">
                    @auth
                    <div class="bookmark">
                        <img src="../../images/bookmark.svg" alt="aratiki search">
                    </div>
                    @endauth
                    <a class="preview" href="{{ $event['url'] }}">
                        <img src="{{ env('APP.ENV') .  $event['image'] }}" alt="aratiki search">
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
                            <div class="promoter">{{ __('home.by') }} {{ $event['advertiser_name'] }}</div>
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
            @if ($count <= 0)
            <div class="not-events">
                <h3>{{ __('home.no_event_found') }}</h3>
            </div>
            @endif
        </div>
    </div>
    
</div>
@endsection
