@extends('_extra._layouts.master')
{{-- [] --}}

@section('styles-head')
    @vite('resources/views/Offer/show/styles.scss')
@endsection

@section('body')

<div class="offer-container">
    <!-- Right Container -->
    <div class="right-container">
        <!-- Images -->
        <div class="images">
            <div class="main-images">
                <div class="location">
                    <img src="../../images/flag.svg" alt="">
                    <span>{{ 'media/' . $offer['location'] }}</span>
                </div>
                <div class="bookmark">
                    <img src="../../images/bookmark.svg" alt="">
                </div>
                <div class="preview">
                    <img src="{{ env('APP.ENV') }}{{ '/media/' . $offer['images'][0] }}" alt="">
                </div>
                <div class="nav-images">
                    <div class="left">
                        <div id="images1" class="select-image active"></div>
                        <div id="images2" class="select-image"></div>
                        <div id="images3" class="select-image"></div>
                    </div>
                    <div class="date">
                        {{ $offer['date'] }}
                    </div>
                    <div class="right">
                        <div id="images4" class="select-image"></div>
                        <div id="images5" class="select-image"></div>
                    </div>
                </div>
            </div>
            <div class="secondary-images">
                @foreach ($offer['images'] as $item)
                <div class="thumbnail">
                    <img src="{{ env('APP.ENV') }}{{ '/media/' . $item }}" alt="">
                </div>
                @endforeach
            </div>

        </div>
    </div>
    <!-- Left Container -->
    <div class="left-container">
        <!-- Title -->
        <div class="event-title">
            <h1>{{ $offer['event_name'] }}</h1>
            <span>{{ $offer['type'] }}</span>
        </div>

        <div class="promoter-phone">
            <!-- Promoter -->
            <div class="event-promoter">
                <span>By</span>
                <img src="../../images/promoter.png" alt="">
                <span>{{ $offer['promoter_name'] }}</span>
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
        <form class="buy">
            <div class="amounts">
                
                <div class="price vip">
                    <div>
                        {{ $offer['price_economy'] }} 
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

            <button class="request">Check The Source</button>
        </form>
    </div>
</div>
<div class="more-offers">
    <label for="">More Events</label>
    <div class="offer-list">
        <div class="card">
            <div class="image">
                <div class="location">
                    <img src="../../images/flag.svg" alt="">
                    <span>Oran</span>
                </div>
                <div class="bookmark">
                    <img src="../../images/bookmark.svg" alt="">
                </div>
                <div class="preview">
                    <img src="../../images/Rectangle.png" alt="">
                </div>
                <div class="date">
                    April 01
                </div>
            </div>

            <div class="title">
                Forbidden Festival
            </div>
            <div class="promoter-duration">
                <div class="promoter">
                    By Leopanthera
                </div>
                <div class="duration">
                    1 day
                </div>
            </div>
            <div class="view-price">
                <a href="#" class="view-button">
                    View More
                </a>
                <span class="price">
                    2000 D.A
                </span>
            </div>

        </div>
    </div>

    <div class="tickets-spinner">
        <button type="button" class="minus">-</button>
        <input type="number" name="" id="" value="1">
        <button type="button" class="plus">+</button>
    </div>
</div>
@endsection
