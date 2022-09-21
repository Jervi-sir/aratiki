@extends('_layouts.master')

@section('styles-head')
    @vite('resources/views/Offer/results/styles.scss')
    @vite('resources/views/_components/search/search.scss')
@endsection

@section('body')

@include('_components.search.search')

<div class="results-container">
    <label for="">
        <div class="nb-result">12 Found</div>
        <div class="filter">
            <span>Sort</span>
            <img src="../../images/filter.svg" alt="">
        </div>
    </label>

    <div class="result-list">
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
@endsection
