@extends('_extra._layouts.master')

@section('styles-head')
    @vite('resources/views/Advertiser/post/styles.scss')
@endsection

@section('body')
<form action="">
    <!-- Images Input -->
    <div class="images-input">
        <div class="main-img">
            <!-- preview -->
            <div class="preview">
                <button type="button" class="remove">
                        <img src="../../images/remove.svg" alt="">
                </button>
                <div class="preview-image-container">
                    <div class="preview-image">
                        <img src="../../images/Rectangle.png" alt="">
                    </div>
                </div>
            </div>
            <label for="main-img">
                <span class="plus">+</span>
                <span class="text">Add Cover Photos</span>
            </label>
            <input id="main-img" type="file" hidden>
        </div>

        <div class="optional-img-container">
            <div class="optional-img">
                <!-- preview -->
                <div class="preview">
                    <button type="button" class="remove">
                            <img src="../../images/remove.svg" alt="">
                    </button>
                    <div class="preview-image-container">
                        <div class="preview-image">
                            <img src="../../images/Rectangle.png" alt="">
                        </div>
                    </div>
                </div>
                <label for="second-img">
                    <span class="plus">+</span>
                </label>
            </div>
            <div class="optional-img">
                <label for="third-img">
                    <span class="plus">+</span>
                </label>
            </div>
            <div class="optional-img">
                <label for="fourth-img">
                    <span class="plus">+</span>
                </label>
            </div>
            <div class="optional-img">
                <label for="fifth-img">
                    <span class="plus">+</span>
                </label>
            </div>

            <input id="second-img" type="file" hidden>
            <input id="third-img" type="file" hidden>
            <input id="fourth-img" type="file" hidden>
            <input id="fifth-img" type="file" hidden>
        </div>
    </div>


    <!-- Event Names -->
    <div class="input-container">
        <label for="">
            Event Name:
            <span class="required">*</span>
        </label>
        <input type="text" placeholder="Enter event name">
    </div>
    <!-- Event Type -->
    <div class="input-container">
        <label for="">
            Event Type:
            <span class="required">*</span>
        </label>
        <select name="" id="">
            <option value="" disabled selected>select event type</option>
        </select>
    </div>
    <!-- Event Date -->
    <div class="input-container">
        <label for="">
            Event Date Starts:
            <span class="required">*</span>
        </label>
        <input type="datetime-local" placeholder="Select date">
    </div>
    <!-- Event Date -->
    <div class="input-container">
        <label for="">
            Event Date Ends:
            <span class="required">*</span>
        </label>
        <input type="datetime-local" placeholder="Select date">
    </div>
    <!-- Event Location -->
    <div class="input-container">
        <label for="">
            Event Location:
            <span class="required">*</span>
        </label>
        <input type="text" placeholder="Enter location">
    </div>
    <!-- Event Location -->
    <div class="input-container">
        <label for="">
            Event Map location:
            <span class="required">*</span>
        </label>
        <input type="text" placeholder="Enter location">
    </div>
    <!-- Event About -->
    <div class="input-container">
        <label for="">
            About event:
            <span class="required">*</span>
        </label>
        <textarea name="" id="" placeholder="Describe the details"></textarea>
    </div>

    <hr>
    <!-- Event Ticket Vip -->
    <div class="input-container">
        <label for="">
            Ticket Price for VIP:
            <span class="required">*</span>
        </label>
        <input type="text" placeholder="D.A 245">
    </div>
    <!-- Event Ticket Economy -->
    <div class="input-container">
        <label for="">
            Ticket Price for Economy:
            <span class="required">*</span>
        </label>
        <input type="text" placeholder="D.A 245">
    </div>
    <!-- Event Ticket Economy -->
    <div class="input-container">
        <label for="">
            Payout Method (CCP/ BaridiMob):
            <span class="required">*</span>
        </label>
        <select name="" id="">
            <option value="" disabled selected>Select payment</option>
        </select>
    </div>

    <!-- Phone number -->
    <div class="input-container">
        <label for="">
            Phone number so we Confirm creation:
            <span class="required">*</span>
        </label>
        <input type="text" placeholder="+213...">
    </div>

    <button class="create-button">
        Create Event
    </button>

</form>
@endsection
