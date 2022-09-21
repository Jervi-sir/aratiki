@extends('_extra._layouts.master')

@section('styles-head')
    @vite('app/DDD/home/styles.scss')
@endsection

@section('body')
<div class="home-before-search">
    <div class="popular-event">
        <label for="">
            <span>Popular Events</span>
            <a href="#">View All</a>
        </label>
        <div class="event-list">
            <div class="card">
                <div class="image">
                    <div class="bookmark">
                        <img src="../../images/bookmark.svg" alt="">
                    </div>
                    <div class="preview">
                        <img src="../../images/Rectangle.png" alt="">
                    </div>
                    <div class="date-container">
                        <div class="date">
                            April 01
                        </div>
                    </div>
                </div>
                <div class="details">
                    <div class="title-promoter-duration">
                        <div class="title-promoter">
                            <div class="title">Event name</div>
                            <div class="promoter">By Promoter name</div>
                        </div>
                        <div class="duration">
                            1 day
                        </div>
                    </div>
                    <div class="location-price">
                        <div class="location">
                            <img src="../../images/location.svg" alt="">
                            <span>Location</span>
                        </div>
                        <div class="price">
                            Price
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="categories-container">
        <label for="">
            <span>Event Categories</span>
            <a href="#">View All</a>
        </label>
        <div class="categories-list">
            <div class="category">
                <img src="../../images/Trendy.svg" alt="">
                <span>Trendy</span>
            </div>
            <div class="category">
                <img src="../../images/music.svg" alt="">
                <span>Music Festival</span>
            </div>
            <div class="category">
                <img src="../../images/art.svg" alt="">
                <span>Art Festival</span>
            </div>
            <div class="category">
                <img src="../../images/computer.svg" alt="">
                <span>Computer Hackathon</span>
            </div>

        </div>
    </div>

    <div class="join-container">
        <div class="create-account">
            <h1>Don’t have an account?</h1>
            <span>Join Us!</span>
            <a href="#">Create Your Account</a>
        </div>
        <div class="advertiser-account">
            <h1>Wanna promote your event?</h1>
            <a href="#">Fill Your Request</a>
            <span>
                For <strong>FREE</strong> since its all about helping people to reach out to you
            </span>
        </div>
    </div>
</div>
@endsection
