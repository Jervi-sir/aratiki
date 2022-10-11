@extends('_layouts.master')
{{-- [done] --}}
@section('title')
    {{ $offer['event_name'] }} -Edit
@endsection

@section('head')
    @vite('resources/views/Offer/show/styles.scss')
    @vite('resources/views/Advertiser/showOffer/styles.scss')
@endsection

@section('body')
<div class="bg-blue"></div>
<div class="offer-container">
    <!-- Right Container -->
    <div class="right-container">
        <!-- Images -->
        @include('Advertiser.showOffer.images')
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
        </div>

        <!-- stats-panel -->
        <div class="stats-panel">
            <div class="decor"></div>
            <div class="event-status">
                <div class="vip">
                    @if ($offer['hasVip'])
                    <img src="../../images/vip.svg" alt="">
                    <span class="true">VIP available</span>
                    @else
                    <img src="../../images/not_vip.svg" alt="">
                    <span class="false">no VIP available</span>
                    @endif
                </div>
                <div class="active">
                    @if ($offer['is_active'])
                    <img src="../../images/active.svg" alt="">
                    <span class="true">Active</span>
                    @else
                    <img src="../../images/not_active.svg" alt="">
                    <span class="false">not Active</span>
                    @endif
                </div>
                <div class="verified">
                    @if ($offer['is_verified'])
                    <img src="../../images/verified.svg" alt="">
                    <span class="true">Verified</span>
                    @else
                    <img src="../../images/not_verified.svg" alt="">
                    <span class="false">not Verified</span>
                    @endif
                </div>
            </div>

            <div class="total-tickets-stats">
                <h1>Ticket Status</h1>
                @if ($offer['hasVip'])
                <label for="">VIP Tickets</label>
                <div class="stats">
                    <div class="amounts">
                        <p>
                            <span>Total</span>
                            <span class="number">{{ $offer['total_tickets_vip'] }}</span>
                        </p>
                        <p>
                            <span>Lefts</span>
                            <span class="number">{{ $offer['tickets_left_vip'] }}</span>
                        </p>
                    </div>
                    <div class="price">{{ $offer['price_vip'] }} DA</div>
                </div>
                @endif

                <label for="">Economic Tickets</label>
                <div class="stats">
                    <div class="amounts">
                        <p>
                            <span>Total</span>
                            <span class="number">{{ $offer['total_tickets_economy'] }}</span>
                        </p>
                        <p>
                            <span>Lefts</span>
                            <span class="number">{{ $offer['tickets_left_economy'] }}</span>
                        </p>
                    </div>
                    <div class="price">{{ $offer['price_economy'] }} DA</div>
                </div>
            </div>

            <div class="other-stats">
                <h1>Other Stats</h1>
                <table class="stats">
                    <tr>
                        <td>Event Type</td>
                        <td>{{ $offer['category'] }}</td>
                    </tr>
                    <tr>
                        <td>Payment Type</td>
                        <td>{{ $offer['payment_type_name'] }}</td>
                    </tr>
                    <tr>
                        <td>Total Visited</td>
                        <td>{{ $offer['nb_visited'] }}</td>
                    </tr>
                    <tr>
                        <td>Phone Number</td>
                        <td>{{ $offer['phone_number'] }}</td>
                    </tr>
                    <tr>
                        <td>Date Creation</td>
                        <td>{{ $offer['created_at'] }}</td>
                    </tr>
                </table>
            </div>
            <div class="decor"></div>
        </div>

        <a href="{{ route('get.advertiser.editOffer', ['id' => $offer['id']]) }}" class="edit-btn">Edit details</a>
    </div>
</div>
@endsection
