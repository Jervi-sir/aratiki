@extends('_extra._layouts.master')
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
            <div class="event-promoter">
                <span>By</span>
                <img src="../../images/promoter.png" alt="">
                <span>{{ $offer['advertiser_name'] }}</span>
            </div>
            <!-- Phone number -->
            <div class="event-phone">
                <img src="../../images/phone_number.svg" alt="">
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
            <label for="">About</label>
            <p>{{ $offer['description'] }}</p>
        </div>
        <!-- Timeline -->
        <div class="event-timeline">
            <label for="">Timeline Event</label>
            <div class="timeline">
                <div class="left">
                    Opening Event
                </div>
                <div class="right">
                    <img src="../../images/clock.svg" alt="">
                    <span>{{ $offer['event_starts'] }}</span>
                </div>
            </div>
            <div class="timeline">
                <div class="left">
                    Ending Event
                </div>
                <div class="right">
                    <img src="../../images/clock.svg" alt="">
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
                    <span>VIP</span>
                </div>
                <div class="price economy">
                    <div>
                        {{ $offer['price_economy'] }} 
                        <small>D.A</small>
                    </div>
                    <span>Economic</span>
                </div>
            </div>

            <div x-data="{ open: false, selected: 0 }">
                <div x-show="open" x-transition class="purchase-slide">
                    <div class="bg-box" @click="open = ! open"></div>
                    <div class="box">
                        <div class="top">
                            <div class="title">
                                <img src="../../images/Logo_mini.svg" alt="">
                                <h3>Purchase Ticket</h3>
                            </div>
                            <button @click="open = ! open">
                                <img src="../../images/cancel.svg" alt="">
                            </button>
                        </div>
                        <form class="form" action="{{ route('user.purchase') }}" method="POST">
                            @csrf
                            <div class="select-type">
                                <h3>Select type of ticket</h3>
                                <input name="offer_id" type="text" value="{{ $offer['id'] }}" hidden>
                                <div class="type">
                                    <input name="type" @click="selected = {{ $offer['price_vip'] }} " type="radio" id="vip"  value="vip">
                                    <label for="vip">VIP</label>
                                    <span>{{ $offer['price_vip'] }} <small>D.A</small> </span>
                                </div>
                                <div class="type">
                                    <input name="type" @click="selected = {{ $offer['price_economy'] }} " type="radio" id="economy" value="economy">
                                    <label for="economy">Economy</label>
                                    <span>{{ $offer['price_economy'] }} <small>D.A</small> </span>
                                </div>
                            </div>
                            <div class="total">
                                <h3>Total</h3>
                                <h2>
                                    <span x-text="selected"></span>
                                    <small>D.A</small>
                                </h2>
                            </div>
                            <div class="payment-card"> </div>
                            <button :disabled="selected == 0">Purchase ticket</button>
                        </form>
                    </div>
                    
                </div>
                <button @click="open = ! open" class="request">Get ticket</button>
            </div>
        </div>
    </div>
</div>
<div class="more-offers">
    <label for="">More Events</label>
    <div class="offer-list">
        @foreach ($suggestions as $item)
        <div class="card">
            <div class="image">
                @auth
                <div class="bookmark">
                    <img src="../../images/bookmark.svg" alt="">
                </div>
                @endauth
                <a class="preview" href="{{ $item['url'] }}">
                    <img src="{{ env('APP.ENV') .  $item['image'] }}" alt="">
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
                        <div class="promoter">By {{ $item['advertiser_name'] }}</div>
                    </div>
                    <div class="duration">
                        {{ $item['duration'] }}
                    </div>
                </div>
                <div class="location-price">
                    <div class="location">
                        <img src="../../images/location.svg" alt="">
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
