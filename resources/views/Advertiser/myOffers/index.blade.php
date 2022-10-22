@extends('_layouts.master')
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
                <img src="../../images/promoter.png" alt="aratiki events, promoter">
            </div>
        </div>
        <div class="total-n-edit">
            <div class="total-events">
                <span>{{ __('advertiser.total_events') }}:</span>
                <span>{{ $user['total_events'] }} {{ __('advertiser.events') }}</span>
                <span class="nb-active">({{ $user['active_events'] }} active)</span>
            </div>
            <a href="{{ route('user.edit') }}" class="edit-btn">
                {{ __('advertiser.edit') }}
            </a>
        </div>
    </div>
</div>

<div class="event-list">
    <label for="">
        <span>{{ __('advertiser.my_events') }}</span>
        <span class="nb-active">{{ $user['active_events'] }} {{ __('advertiser.active') }}</span>
    </label>
    @foreach ($offers as $offer)
    <a href="{{ $offer['url'] }}" class="event">
        <div class="top">
            <div class="left">
                <div class="thumbnail">
                    <img src="{{ $offer['main_image'] }}" alt="aratiki events">
                </div>
                <div class="data">
                    <div class="title">{{ $offer['event_name'] }}</div>
                    <div class="location">
                        <img src="../../images/location.svg" alt="aratiki events, location">
                        <span>{{ $offer['location'] }}</span>
                    </div>
                    <div class="details">{{ $offer['details'] }}</div>
                    <div class="timeline">
                        <div class="start">{{ $offer['event_starts'] }}</div>
                        <div class="arrow"><img src="../../images/arrow_thin.svg" alt="aratiki arrow"></div>
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
            <span class="event-type">{{ __('advertiser.event_category') }}</span>
            <span class="event-status active">{{ __('advertiser.is_active')}}</span>
            <span class="event-status active">{{ __('advertiser.is_verified')}}</span>
            <span class="created-at">{{ $offer['created_at'] }}</span>
        </div>
    </a>
    @endforeach

    @if (count($offers) == 0)
    <div class="no-events">
        <h3>{{ __('advertiser.no_events') }}</h3>
    </div>
    @endif

    <div class="add-event">
        @if (count($offers) > 10)
        <a href="" class="disabled">
            {{ __('advertiser.add_event') }}
        </a>
        @else
        <a href="{{ route('get.advertiser.addOffer') }}">
            {{ __('advertiser.add_event') }}
        </a>
        @endif
    </div>

</div>
@endsection
