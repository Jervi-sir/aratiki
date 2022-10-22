@extends('_layouts.master')
{{-- [] --}}

@section('head')
    @vite('resources/views/Advertiser/showProfile/styles.scss')
@endsection

@section('body')
<div class="profile-container">
    <div class="profile-card">
        <div class="details">
            <div class="left">
                <div class="username">{{ $user['name'] }}</div>
                <div class="phone">{{ $user['phone_number'] }}</div>
                <div class="bio">{{ $user['bio'] }}</div>
            </div>
            <div class="right">
                <img src="../../images/promoter.png" alt="aratiki events, promoter">
            </div>
        </div>
        <div class="total-n-edit">
            <div class="total-events">
                <span>{{ __('advertiser.total_events') }}:</span>
                <span>{{ $user['total_events'] }} {{ __('advertiser.events') }}</span>
                <span class="nb-active">({{ $user['active_events'] }} active)</span>
            </div>
        </div>
    </div>
</div>

<div class="event-list">
    <label for="">
        <span>{{ __('advertiser.my_events') }}</span>
        <span class="nb-active">{{ $user['active_events'] }} {{ __('advertiser.active') }}</span>
    </label>
    @foreach ($offers as $event)
    <div class="card">
        <a href="{{ $event['url'] }}" class="image">
            <div class="bookmark">
                <img src="../../images/bookmark.svg" alt="aratiki filter">
            </div>
            <div class="preview">
                <img src="{{ $event['image'] }}" alt="aratiki filter">
            </div>
            <div class="date-container">
                <div class="date">
                    {{ $event['date'] }}
                </div>
            </div>
        </a>
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
                    {{ $event['price_economy'] }}
                </div>
            </div>
        </div>
    </div>
    @endforeach

    @if (count($offers) == 0)
    <div class="no-events">
        <h3>{{ __('advertiser.no_events') }}</h3>
    </div>
    @endif

</div>
@endsection
