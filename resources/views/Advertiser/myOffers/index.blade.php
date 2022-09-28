@extends('_extra/_layouts.master')
{{-- [] --}}

@section('head')
    @vite('resources/views/Advertiser/myOffers/styles.scss')
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
                <img src="../../images/promoter.png" alt="">
            </div>
        </div>
        <div class="total-n-edit">
            <div class="total-events">
                <span>total events:</span>
                <span>{{ $user['total_events'] }} events</span>
                <span class="nb-active">({{ $user['active_events'] }} active)</span>
            </div>
            <a href="{{ route('user.edit') }}" class="edit-btn">
                Edit
            </a>
        </div>
    </div>
</div>

<div class="event-list">
    <label for="">
        <span>My  Events</span>
        <span class="nb-active">{{ $user['active_events'] }} active</span>
    </label>
    @foreach ($offers as $offer)
    <a href="{{ $offer['url'] }}" class="event">
        <div class="top">
            <div class="left">
                <div class="thumbnail">
                    <img src="{{ $offer['main_image'] }}" alt="">
                </div>
                <div class="data">
                    <div class="title">{{ $offer['event_name'] }}</div>
                    <div class="location">
                        <img src="../../images/location.svg" alt="">
                        <span>{{ $offer['location'] }}</span>
                    </div>
                    <div class="details">{{ $offer['details'] }}</div>
                    <div class="timeline">
                        <div class="start">{{ $offer['event_starts'] }}</div>
                        <div class="arrow"><img src="../../images/arrow_thin.svg" alt=""></div>
                        <div class="end">{{ $offer['event_ends'] }}</div>
                    </div>
                </div>
            </div>
            <div class="right">
                <div class="separator"></div>
                <div class="tickets-stats">
                    <div class="tickets">
                        <label for="">Sold</label>
                        <span>{{ $offer['tickets_sold'] }}</span>
                    </div>
                    <div class="tickets">
                        <label for="">Total</label>
                        <span>{{ $offer['total_tickets'] }}</span>
                    </div>
                    <div class="price">
                        <span>{{ $offer['price_economy'] }}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom">
            <span class="event-type">Music event</span>
            <span class="event-status active">is active</span>
            <span class="event-status active">is verified</span>
            <span class="created-at">{{ $offer['created_at'] }}</span>
        </div>
    </a>
    @endforeach

</div>
@endsection
