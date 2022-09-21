@extends('_layouts.master')

@section('styles-head')
    @vite('resources/views/Client/showTicket/styles.scss')
@endsection

@section('script-head')
@endsection

@section('body')
<div class="ticket-container">
    <div class="top-ticket">
        <h2 class="action">Show at Boarding Gate</h2>
        <div class="qrcode" id="qrcode"></div>
        <h3 class="price">2000 D.A</h3>
    </div>

    <div class="cut">
        <img src="../../images/cut.svg" alt="">
    </div>
    <div class="bottom-ticket">
        <h1 class="title">Festival Name</h1>
        <h5 class="promoter">By promoter name</h5>
        <h4 class="location">Location</h4>
        <div class="timeline">
            <div class="start">
                <span class="hours">HH</span>
                <span class="date">date</span>
            </div>
            <div class="arrow">
                <img src="../../images/arrow.svg" alt="">
            </div>

            <div class="end">
                <span class="hours">HH</span>
                <span class="date">date</span>
            </div>
        </div>
    </div>

</div>
@endsection
