@extends('_layouts.master')
{{-- [done] --}}
@section('title')
    {{ $offer['event_name'] }} - {{ __('advertiser.edit') }}
@endsection

@section('head')
    @vite('resources/views/Offer/show/styles.scss')
    @vite('resources/views/Advertiser/showOffer/styles.scss')
@endsection

@section('body')
<div class="bg-blue"></div>

@include('_components.notification.center_notification')

<div class="offer-container">
    <!-- Right Container -->
    <div class="right-container">
        <!-- Images -->
        @include('Advertiser.showOffer.images', ['event_name' => $offer['event_name']])
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
                <span>{{ __('advertiser.by') }}</span>
                <img src="../../images/promoter.png" alt="{{ $offer['advertiser_name'] }}">
                <span>{{ $offer['advertiser_name'] }}</span>
            </div>
            <!-- Phone number -->
            <div class="event-phone">
                <img src="../../images/phone_number.svg" alt="aratiki promoter number">
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
            <label for="">{{ __('advertiser.about') }}</label>
            <p>{{ $offer['description'] }}</p>
        </div>
        <!-- Timeline -->
        <div class="event-timeline">
            <label for="">{{ __('advertiser.timeline_event') }}</label>
            <div class="timeline">
                <div class="left">
                    {{ __('advertiser.opening_event') }}
                </div>
                <div class="right">
                    <img src="../../images/clock.svg" alt="aratiki clock">
                    <span>{{ $offer['event_starts'] }}</span>
                </div>
            </div>
            <div class="timeline">
                <div class="left">
                    
                    {{ __('advertiser.ending_event') }}
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
                    <span>{{ __('advertiser.vip') }}</span>
                </div>
                <div class="price economy">
                    <div>
                        {{ $offer['price_economy'] }} 
                        <small>D.A</small>
                    </div>
                    <span>{{ __('advertiser.economic') }}</span>
                </div>
            </div>
        </div>

        <!-- stats-panel -->
        <div class="stats-panel">
            <div class="decor"></div>
            <div class="event-status">
                <div class="vip">
                    @if ($offer['hasVip'])
                    <img src="../../images/vip.svg" alt="aratiki VIP">
                    <span class="true">{{ __('advertiser.vip_available') }}</span>
                    @else
                    <img src="../../images/not_vip.svg" alt="aratiki no VIP">
                    <span class="false">{{ __('advertiser.no_vip_available') }}</span>
                    @endif
                </div>
                <div class="active">
                    @if ($offer['is_active'])
                    <img src="../../images/active.svg" alt="aratiki Active">
                    <span class="true">{{ __('advertiser.active') }}</span>
                    @else
                    <img src="../../images/not_active.svg" alt="aratiki not Active">
                    <span class="false">{{ __('advertiser.not_active') }}</span>
                    @endif
                </div>
                <div class="verified">
                    @if ($offer['is_verified'])
                    <img src="../../images/verified.svg" alt="aratiki Verified">
                    <span class="true">{{ __('advertiser.verified') }}</span>
                    @else
                    <img src="../../images/not_verified.svg" alt="aratiki not Verified">
                    <span class="false">{{ __('advertiser.not_verified') }}</span>
                    @endif
                </div>
            </div>

            <div class="total-tickets-stats">
                <h1>{{ __('advertiser.ticket_status') }}</h1>
                @if ($offer['hasVip'])
                <label for="">{{ __('advertiser.vip_tickets') }}</label>
                <div class="stats">
                    <div class="amounts">
                        <p>
                            <span>{{ __('advertiser.total') }}</span>
                            <span class="number">{{ $offer['total_tickets_vip'] }}</span>
                        </p>
                        <p>
                            <span>{{ __('advertiser.lefts') }}</span>
                            <span class="number">{{ $offer['tickets_left_vip'] }}</span>
                        </p>
                    </div>
                    <div class="price">{{ $offer['price_vip'] }} DA</div>
                </div>
                @endif

                <label for="">{{ __('advertiser.economic_tickets') }}</label>
                <div class="stats">
                    <div class="amounts">
                        <p>
                            <span>{{ __('advertiser.total') }}</span>
                            <span class="number">{{ $offer['total_tickets_economy'] }}</span>
                        </p>
                        <p>
                            <span>{{ __('advertiser.lefts') }}</span>
                            <span class="number">{{ $offer['tickets_left_economy'] }}</span>
                        </p>
                    </div>
                    <div class="price">{{ $offer['price_economy'] }} DA</div>
                </div>
            </div>

            <div class="other-stats">
                <h1>{{ __('advertiser.other_stats') }}</h1>
                <table class="stats">
                    <tr>
                        <td>{{ __('advertiser.event_type') }}</td>
                        <td>{{ $offer['category'] }}</td>
                    </tr>
                    <tr>
                        <td>{{ __('advertiser.payment_type') }}</td>
                        <td>{{ $offer['payment_type_name'] }}</td>
                    </tr>
                    <tr>
                        <td>{{ __('advertiser.total_visited') }}</td>
                        <td>{{ $offer['nb_visited'] }}</td>
                    </tr>
                    <tr>
                        <td>{{ __('advertiser.phone_number') }}</td>
                        <td>{{ $offer['phone_number'] }}</td>
                    </tr>
                    <tr>
                        <td>{{ __('advertiser.date_creation') }}</td>
                        <td>{{ $offer['created_at'] }}</td>
                    </tr>
                </table>
            </div>
            <div class="decor"></div>
        </div>

        <a href="{{ route('get.advertiser.editOffer', ['id' => $offer['id']]) }}" class="edit-btn">
            {{ __('advertiser.edit_details') }}
        </a>

        <a href="{{ route('showOffer', ['id' => $offer['id']]) }}" class="edit-btn guest">
            {{ __('advertiser.show_as_guest') }}
        </a>

    </div>
</div>
@endsection
