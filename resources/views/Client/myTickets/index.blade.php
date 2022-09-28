@extends('_extra/_layouts.master')
{{-- [] --}}

@section('head')
    @vite('resources/views/Client/myTickets/styles.scss')
@endsection

@section('body')
<div class="profile-container">
    <div class="profile-card">
        <div class="details">
            <div class="left">
                <div class="username">Username</div>
                <div class="phone">Phone number</div>
                <div class="bio">bio</div>
            </div>
            <div class="right">
                <img src="../../images/promoter.png" alt="">
            </div>
        </div>
        <div class="total-n-edit">
            <div class="total-tickets">
                <span>total tickets:</span>
                <span>5 tickets</span>
                <span class="nb-active">(1 active)</span>
            </div>
            <a href="#" class="edit-btn">
                Edit
            </a>
        </div>
    </div>
</div>

<div class="ticket-list">
    <label for="">
        <span>My  Tickets</span>
        <span class="nb-active">1 active</span>
    </label>
    <div class="ticket">
        <div class="left">
            <div class="title">Name event</div>
            <div class="promoter">By Ultra Fest. INC</div>
            <div class="location">Location</div>
            <div class="timeline">
                <div class="start">20:00 | 15 July</div>
                <div class="arrow"><img src="../../images/arrow_thin.svg" alt=""></div>
                <div class="end">20:00 | 15 July</div>
            </div>
        </div>
        <div class="cut">
            <img src="../../images/cut_vertical.svg" alt="">
        </div>
        <div class="right">
            <div class="date">
                <div class="day">16</div>
                <div class="month">JULY</div>
                <div class="separator"></div>
                <div class="time">10:00PM</div>
            </div>
            <div class="separator"></div>
            <div class="qrcode">
                <div id="qrcode"></div>
                <div class="price">200,00 DA</div>
            </div>
        </div>
    </div>
</div>
@endsection
