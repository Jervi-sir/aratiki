@extends('_extra._layouts.master')

@section('styles-head')
    @vite('resources/views/Advertiser/post/styles.scss')
@endsection

@section('body')
<form action="{{ route('post.advertiser.addOffer') }}" method="POST" >
    @csrf
    <!-- Images Input -->
   @include('Advertiser.post.imagesInput')

    <!-- Event Names -->
    <div class="input-container">
        <label for="">
            Event Name:
            <span class="required">*</span>
        </label>
        <input name="name" type="text" placeholder="Enter event name">
    </div>
    <!-- Event Type -->
    <div class="input-container">
        <label for="">
            Event Type:
            <span class="required">*</span>
        </label>
        <select name="type" id="">
            <option value="" disabled selected>select event type</option>
        </select>
    </div>
    <!-- Event Date -->
    <div class="input-container">
        <label for="">
            Event Date Starts:
            <span class="required">*</span>
        </label>
        <input name="date_starts" type="datetime-local" placeholder="Select date">
    </div>
    <!-- Event Date -->
    <div class="input-container">
        <label for="">
            Event Date Ends:
            <span class="required">*</span>
        </label>
        <input name="date_ends" type="datetime-local" placeholder="Select date">
    </div>
    <!-- Event Location -->
    <div class="input-container">
        <label for="">
            Event Location:
            <span class="required">*</span>
        </label>
        <input name="location" type="text" placeholder="Enter location">
    </div>
    <!-- Event Location -->
    <div class="input-container">
        <label for="">
            Event Map location:
            <span class="required">*</span>
        </label>
        <input name="map_location" type="text" placeholder="Enter location">
    </div>
    <!-- Event About -->
    <div class="input-container">
        <label for="">
            About event:
            <span class="required">*</span>
        </label>
        <textarea name="descruption" name="" id="" placeholder="Describe the details"></textarea>
    </div>

    <hr>
    <!-- Event Ticket Vip -->
    <div class="input-container">
        <label for="">
            Ticket Price for VIP:
            <span class="required">*</span>
        </label>
        <input name="price_vip" type="text" placeholder="D.A 245">
    </div>
    <!-- Event Ticket Economy -->
    <div class="input-container">
        <label for="">
            Ticket Price for Economy:
            <span class="required">*</span>
        </label>
        <input name="price_economy" type="text" placeholder="D.A 245">
    </div>
    <!-- Event Ticket Economy -->
    <div class="input-container">
        <label for="">
            Payout Method (CCP/ BaridiMob):
            <span class="required">*</span>
        </label>
        <select name="payment_method" name="" id="">
            <option value="" disabled selected>Select payment</option>
        </select>
    </div>

    <!-- Phone number -->
    <div class="input-container">
        <label for="">
            Phone number so we Confirm creation:
            <span class="required">*</span>
        </label>
        <input name="phone_number" type="text" placeholder="+213...">
    </div>

    <button class="create-button">
        Create Event
    </button>

</form>
@endsection
