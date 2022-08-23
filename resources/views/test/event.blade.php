@extends('test.layouts.master')

@section('title')
Event name
@endsection

@section('style-header')
<link rel="stylesheet" href="css/event.css">
@endsection

@section('body')
<body>
    <div class="body-top">
        <!-- Header -->
        <header>
            <div class="hamburger"></div>
            <div class="user">
                <img src="images/user.svg" alt="">
            </div>
        </header>

    </div>

    <!-- Card -->
    <div class="content">
        <!-- Preview -->
        <div class="preview">
            <img class="image" src="#" alt="">
            <div class="actions">
                <div class="location">
                    <img src="images/flag.svg" alt="">
                    <span>Location, Location</span>
                </div>
                <a href="#" class="bookmark">
                    <img src="images/bookmark.svg" alt="">
                </a>
            </div>
            <div class="date">
                <span>April 01</span>
            </div>
        </div>

        <!-- Title -->
        <div class="title">

            <h1>Festival name</h1>
            <h4>
                <span>By</span>
                <img src="/images/user.svg" alt="">
                <span>promoter name</span>
            </h4>
        </div>

        <!-- About -->
        <div class="about">
            <label>About</label>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt, quaerat consequatur esse voluptatum natus accusantium excepturi molestias recusandae iusto nostrum exercitationem aut consequuntur adipisci nulla aliquam eligendi minus dolorem non.</p>
        </div>

        <!-- TimeLine -->
        <div class="timeline">
            <label>Timeline Event</label>
            <div class="time-row">
                <div class="left">
                    <span>Opening Event</span>
                </div>
                <div class="right">
                    <img src="images/clock.svg" alt="">
                    <span> April 01, 9:00 PM</span>
                </div>
            </div>
            <div class="time-row">
                <div class="left">
                    <span>Closing Event</span>
                </div>
                <div class="right">
                    <img src="images/clock.svg" alt="">
                    <span> April 01, 9:00 PM</span>
                </div>
            </div>
        </div>

        <!-- Images -->
        <div class="images">
            <label > Images</label>
            <div class="images-container">
                <img src="" alt="">
                <img src="" alt="">
                <img src="" alt="">
            </div>
        </div>

        <!-- Check -->
        <div class="check">
            <a href="#">Check the source</a>
        </div>
    </div>

@include('test.layouts.footer')

@endsection
