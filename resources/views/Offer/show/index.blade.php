@extends('_layouts.master')
{{-- [] --}}

@section('head')
    @vite('resources/views/Offer/show/styles.scss')
@endsection

@section('body')

<div class="offer-container">
    <!-- Right Container -->
    <div class="right-container">
        <!-- Images -->
       @include('Offer.show.images')
    </div>
    <!-- Left Container -->
    <div class="left-container">
        <!-- Title -->
        <div class="event-title">
            <h1>{{ $offer['event_name'] }}</h1>
            <span>{{ $offer['category'] }}</span>
        </div>

        <div class="promoter-phone">
            <!-- Promoter -->
            <a href="{{ route('show.advertiser.profile', ['id' => $offer['adverrtiser_id']]) }}" class="event-promoter">
                <span>{{ __('offer.by') }}</span>
                <img src="../../images/promoter.png" alt="aratiki promoter">
                <span>{{ $offer['advertiser_name'] }}</span>
            </a>
            <!-- Phone number -->
            <div class="event-phone">
                <img src="../../images/phone_number.svg" alt="aratiki phone number">
                <div class="separator"></div>
                <span>{{ $offer['phone_number'] }}</span>
            </div>
        </div>
        <!-- Date -->
        <div class="event-date">
            <span>{{ $offer['event_starts'] }}</span>
            <span>{{ $offer['duration'] }}</span>
        </div>
        <!-- About -->
        <div class="event-about">
            <label for="">{{ __('offer.about') }}</label>
            <p>{{ $offer['description'] }}</p>
        </div>
        <!-- Timeline -->
        <div class="event-timeline">
            <label for="">{{ __('offer.timeline_event') }}</label>
            <div class="timeline">
                <div class="left">
                    {{ __('offer.opening_event') }}
                </div>
                <div class="right">
                    <img src="../../images/clock.svg" alt="aratiki clock">
                    <span>{{ $offer['event_starts'] }}</span>
                </div>
            </div>
            <div class="timeline">
                <div class="left">
                    {{ __('offer.ending_event') }}
                </div>
                <div class="right">
                    <img src="../../images/clock.svg" alt="aratiki clock">
                    <span>{{ $offer['event_ends'] }}</span>
                </div>
            </div>
        </div>
        <!-- Price n tickets -->
        <div class="buy">
            <div class="amounts">
                <div class="price vip">
                    <div>
                        {{ $offer['price_vip'] }} 
                        <small>D.A</small>
                    </div>
                    <span>{{ __('offer.vip') }}</span>
                </div>
                <div class="price economy">
                    <div>
                        {{ $offer['price_economy'] }} 
                        <small>D.A</small>
                    </div>
                    <span>{{ __('offer.economic') }}</span>
                </div>
            </div>

            <div x-data="{ open: false, selected: 0 }">
                <div x-show="open" x-transition class="purchase-slide" style="display:none">
                    <div class="bg-box" @click="open = ! open"></div>
                    <div class="box">
                        <div class="top">
                            <div class="title">
                                <img src="../../images/Logo_mini.svg" alt="aratiki Logo">
                                <h3>{{ __('offer.purchase_ticket') }}</h3>
                            </div>
                            <button @click="open = ! open">
                                <img src="../../images/cancel.svg" alt="aratiki cancel">
                            </button>
                        </div>
                        <form class="form" action="{{ route('user.purchase') }}" method="POST">
                            @csrf
                            <div class="select-type">
                                <h3>Select type of ticket</h3>
                                <input name="offer_id" type="text" value="{{ $offer['id'] }}" hidden>
                                <div class="type">
                                    <input name="type" @click="selected = {{ $offer['price_vip'] }} " type="radio" id="vip"  value="vip">
                                    <label for="vip">
                                        <span class="type-name">{{ __('offer.vip') }}</span>
                                        <span class="type-price">{{ $offer['price_vip'] }} <small>D.A</small> </span>
                                    </label>
                                </div>
                                <div class="type">
                                    <input name="type" @click="selected = {{ $offer['price_economy'] }} " type="radio" id="economic" value="economic">
                                    <label for="economic">
                                        <span class="type-name"">{{ __('offer.economy') }}</span>
                                        <span class="type-price">{{ $offer['price_economy'] }} <small>D.A</small> </span>
                                    </label>
                                </div>
                            </div>
                            <div class="total">
                                <h3>{{ __('offer.total') }}</h3>
                                <h2>
                                    <span x-text="selected"></span>
                                    <small>D.A</small>
                                </h2>
                            </div>
                            <div class="payment-card"> </div>
                            <div class="process-purchase">
                                @auth
                                <button :disabled="selected == 0">{{ __('offer.purchase_ticket') }}</button>
                                @endauth
                                @guest
                                <button >{{ __('home.login') }}</button>
                                <span>to continue purchase</span>
                                @endguest
                            </div>
                        </form>
                    </div>
                    
                </div>
                <button @click="open = ! open" class="request">{{ __('offer.get_ticket') }}</button>
            </div>
        </div>
    </div>
</div>
<div class="more-offers">
    <label for="">{{ __('offer.more_events') }}</label>
    <div class="offer-list">
        @foreach ($suggestions as $item)
        <div class="card">
            <div class="image">
                @auth
                <div class="bookmark">
                    <img src="../../images/bookmark.svg" alt="aratiki bookmark">
                </div>
                @endauth
                <a class="preview" href="{{ $item['url'] }}">
                    <img src="{{ env('APP.ENV') .  $item['image'] }}" alt="aratiki preview">
                </a>
                <div class="date-container">
                    <div class="date">
                        {{ $item['date'] }}
                    </div>
                </div>
            </div>

            <div class="details">
                <div class="title-promoter-duration">
                    <div class="title-promoter">
                        <div class="title">{{ $item['event_name'] }}</div>
                        <div class="promoter">{{ __('offer.by') }} {{ $item['advertiser_name'] }}</div>
                    </div>
                    <div class="duration">
                        {{ $item['duration'] }}
                    </div>
                </div>
                <div class="location-price">
                    <div class="location">
                        <img src="../../images/location.svg" alt="aratiki location">
                        <span>{{ $item['location'] }}</span>
                    </div>
                    <div class="price">
                        {{ $item['price_economy'] }} <small>DA</small>
                    </div>
                </div>
            </div>

        </div>
        @endforeach
    </div>
</div>
@endsection
