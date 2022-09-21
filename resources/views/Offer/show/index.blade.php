@extends('_extra._layouts.master')

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
                    <span>Location, location</span>
                </div>
                <div class="bookmark">
                    <img src="../../images/bookmark.svg" alt="">
                </div>
                <div class="preview">
                    <img src="../../images/Rectangle.png" alt="">
                </div>
                <div class="nav-images">
                    <div class="left">
                        <div id="images1" class="select-image active"></div>
                        <div id="images2" class="select-image"></div>
                        <div id="images3" class="select-image"></div>
                    </div>
                    <div class="date">
                        April 01
                    </div>
                    <div class="right">
                        <div id="images4" class="select-image"></div>
                        <div id="images5" class="select-image"></div>
                    </div>
                </div>
            </div>
            <div class="secondary-images">
                <div class="thumbnail">
                    <img src="../../images/Rectangle.png" alt="">
                </div>
                <div class="thumbnail">
                    <img src="../../images/Rectangle.png" alt="">
                </div>
                <div class="thumbnail">
                    <img src="../../images/Rectangle.png" alt="">
                </div>
                <div class="thumbnail">
                    <img src="../../images/Rectangle.png" alt="">
                </div>

            </div>

        </div>
    </div>
    <!-- Left Container -->
    <div class="left-container">
        <!-- Title -->
        <div class="event-title">
            <h1>TeDX - Oran</h1>
        </div>
        <!-- Promoter -->
        <div class="event-promoter">
            <span>By</span>
            <img src="../../images/promoter.png" alt="">
            <span>promoter name</span>
        </div>
        <!-- Date -->
        <div class="event-date">
            <span>April 01, 09:00 PM</span>
        </div>
        <!-- About -->
        <div class="event-about">
            <label for="">About</label>
            <p>Lorem ipsum dolor sit amet, ignota percipit insolens nam te. Et pro clita aliquando, at ridens eleifend pri. Pro decore liberavisse te, nam adhuc aeque at. Dicant laudem et eam.</p>
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
                    <span>April 01, 09:00PM</span>
                </div>
            </div>
            <div class="timeline">
                <div class="left">
                    Ending Event
                </div>
                <div class="right">
                    <img src="../../images/clock.svg" alt="">
                    <span>April 01, 09:00PM</span>
                </div>
            </div>
        </div>
        <!-- Price n tickets -->
        <form class="buy">
            <div class="amounts">
                <div class="tickets">
                    <button type="button" class="minus">-</button>
                    <input type="number" name="" id="" value="1">
                    <button type="button" class="plus">+</button>
                </div>
                <div class="price">
                    <div class="total">1000 D.A</div>
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

</div>
@endsection
