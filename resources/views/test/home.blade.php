@extends('test.layouts.master')

@section('title')
<title>Home</title>
@endsection

@section('style-header')
<link rel="stylesheet" href="css/home.css">
@endsection

@section('body')

<div class="body-top">

    <!-- Header -->
    <header>
        <div class="hamburger"></div>
        <div class="user">
            <img src="images/user.svg" alt="">
        </div>
    </header>

    <!-- Search -->
    <div class="search">
        <h1>Discover Amazing Events</h1>
        <form action="">
            <button type="submit">
                <img src="images/search.svg" alt="">
            </button>
            <input type="text" placeholder="Find your events">
        </form>
    </div>

    <!-- Popular events -->
    <div class="popular-events">
        <div class="header">
            <h4>Popular Events</h4>
            <a href="#">View all</a>
        </div>
        <div class="card-horizental-container">
            <div class="card">
                <div class="image">
                    <img class="preview" src="" width="260" height="150" alt="">
                    <a href="#" class="bookmark">
                        <img src="images/bookmark.svg" alt="">
                    </a>
                    <div class="date">
                        <span> April 01</span>
                    </div>
                </div>
                <div class="details">
                    <div class="row">
                        <div class="titles">
                            <span class="title">Event name</span>
                            <span class="promoter">By promoter name</span>
                        </div>
                        <div class="duration">
                            <span>
                                1day
                            </span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="location">
                            <img src="images/location.svg" alt="">
                            <span>Location</span>
                        </div>
                        <div class="price">
                            <span>Price</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="image">
                    <img class="preview" src="" width="260" height="150" alt="">
                    <a href="#" class="bookmark">
                        <img src="images/bookmark.svg" alt="">
                    </a>
                    <div class="date">
                        <span> April 01</span>
                    </div>
                </div>
                <div class="details">
                    <div class="row">
                        <div class="titles">
                            <span class="title">Event name</span>
                            <span class="promoter">By promoter name</span>
                        </div>
                        <div class="duration">
                            <span>
                                1day
                            </span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="location">
                            <img src="images/location.svg" alt="">
                            <span>Location</span>
                        </div>
                        <div class="price">
                            <span>Price</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="image">
                    <img class="preview" src="" width="260" height="150" alt="">
                    <a href="#" class="bookmark">
                        <img src="images/bookmark.svg" alt="">
                    </a>
                    <div class="date">
                        <span> April 01</span>
                    </div>
                </div>
                <div class="details">
                    <div class="row">
                        <div class="titles">
                            <span class="title">Event name</span>
                            <span class="promoter">By promoter name</span>
                        </div>
                        <div class="duration">
                            <span>
                                1day
                            </span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="location">
                            <img src="images/location.svg" alt="">
                            <span>Location</span>
                        </div>
                        <div class="price">
                            <span>Price</span>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>

<!-- Categories -->
<div class="event-categories">
    <div class="header">
        <h4>Event Categories</h4>
        <a href="#">View all</a>
    </div>
    <div class="category-horizental-container">
        <a href="#" class="category">
            <img src="images/music.svg" alt="">
            <span>Music Festival</span>
        </a>
        <a href="#" class="category">
            <img src="images/art.svg" alt="">
            <span>Art Festival</span>
        </a>
        <a href="#" class="category">
            <img src="images/computer.svg" alt="">
            <span>Geek Festival</span>
        </a>
        <a href="#" class="category">
            <img src="images/computer.svg" alt="">
            <span>Geek Festival</span>
        </a>

    </div>
</div>

<!-- Join -->
<div class="join">
    <div class="option">
        <h2>Don't have an account?</h2>
        <h4>Please join us</h4>
        <a href="{{ route('register') }}" class="join-button">
            Create Your Account
        </a>
    </div>
    <div class="option">
        <h2>Wanna Promote Your Event?</h2>
        <a href="#" class="join-button">
            Fill Your Request
        </a>
        <h5>For <strong>FREE</strong> since its all about helping people to reach out to you</h5>
    </div>
</div>


@include('test.layouts.footer')

@endsection
