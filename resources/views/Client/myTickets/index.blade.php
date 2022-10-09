@extends('_layouts.master')
{{-- [] --}}

@section('head')
    @vite('resources/views/Client/myTickets/styles.scss')
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
            <div class="total-tickets">
                <span>total tickets:</span>
                <span>{{ $user['total_tickets'] }} tickets</span>
                <span class="nb-active">({{ $user['active_tickets'] }} active)</span>
            </div>
            <a href="{{ route('user.edit') }}" class="edit-btn">
                Edit
            </a>
        </div>
    </div>
</div>

<div class="ticket-list">
    <label for="">
        <span>My  Tickets</span>
        <span class="nb-active">{{ $user['active_tickets'] }} active</span>
    </label>
    @foreach ($tickets as $ticket)
    <a href="{{ $ticket['url'] }}" class="ticket">
        <div class="left">
            <div class="title">{{ $ticket['event_name'] }}</div>
            <div class="promoter">By {{ $ticket['advertiser_name'] }}</div>
            <div class="location">{{ $ticket['location'] }}</div>
            <div class="timeline">
                <div class="start">{{ $ticket['event_time_starts'] }} | {{ $ticket['event_date_starts'] }}</div>
                <div class="arrow"><img src="../../images/arrow_thin.svg" alt=""></div>
                <div class="end">{{ $ticket['event_time_ends'] }} | {{ $ticket['event_date_ends'] }}</div>
            </div>
        </div>
        <div class="cut">
            <img src="../../images/cut_vertical.svg" alt="">
        </div>
        <div class="right">
            <div class="date">
                <div class="day">{{ $ticket['event_day_starts'] }}</div>
                <div class="month">{{ $ticket['event_month_starts'] }}</div>
                <div class="separator"></div>
                <div class="time">{{ $ticket['event_time_starts'] }}</div>
            </div>
            <div class="separator"></div>
            <div class="qrcode">
                <div id="qrcode"></div>
                <div class="price">{{ $ticket['price'] }}</div>
            </div>
        </div>
    </a>
    @endforeach

</div>
@endsection
