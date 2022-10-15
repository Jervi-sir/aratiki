@extends('_layouts.master')
{{-- [] --}}

@section('head')
    @vite('resources/views/Offer/results/styles.scss')
@endsection

@section('body')
@include('_components.search.search', ['value' => $searchedFor])

<div class="bg-blue"></div>
<div class="results-container">
    <label for="">
        <div class="nb-result">{{ count($events) }} {{ __('offer.found') }}</div>
        <div class="filter">
            <span>{{ __('offer.sort') }}</span>
            <img src="../../images/filter.svg" alt="aratiki filter">
        </div>
    </label>

    <div class="result-list">
        @foreach ($events as $event)
        <div class="card">
            <a href="{{ $event['url'] }}" class="image">
                <div class="bookmark">
                    <img src="../../images/bookmark.svg" alt="aratiki filter">
                </div>
                <div class="preview">
                    <img src="{{ $event['image'] }}" alt="aratiki filter">
                </div>
                <div class="date-container">
                    <div class="date">
                        {{ $event['date'] }}
                    </div>
                </div>
            </a>
            <div class="details">
                <div class="title-promoter-duration">
                    <div class="title-promoter">
                        <div class="title">{{ $event['event_name'] }}</div>
                        <div class="promoter">By {{ $event['advertiser_name'] }}</div>
                    </div>
                    <div class="duration">
                        {{ $event['duration'] }}
                    </div>
                </div>
                <div class="location-price">
                    <div class="location">
                        <img src="../../images/location.svg" alt="aratiki location">
                        <span>{{ $event['location'] }}</span>
                    </div>
                    <div class="price">
                        {{ $event['price_economy'] }}
                    </div>
                </div>
            </div>
        </div>
        @endforeach

    </div>
</div>
@endsection
