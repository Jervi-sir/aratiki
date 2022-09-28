@extends('_extra._layouts.master')
{{-- [done] --}}

@section('head')
    @vite('resources/views/Advertiser/post/styles.scss')
    @vite('resources/views/Advertiser/editOffer/styles.scss')
@endsection

@section('body')
<form action="{{ $offer['url'] }}" method="POST" >
    @csrf
    <!-- Images Input -->
   @include('Advertiser.editOffer.imagesInput')
    <!-- Event Names -->
    <div x-data="{ state: {{ json_encode($offer['event_name']) }}, gotEdited: false }">
        <div class="input-container">
            <label for="event-name">
                Event Name:
                <span class="required">*</span>
            </label>
            <input name="event_name"
                id="event-name"
                class="input"
                x-model="state"
                :class="gotEdited ? 'orange-border' : 'green-border'"  
                @keyup="gotEdited = true"
                type="text" 
                placeholder="Enter event name"
                required
            >
        </div>
    </div>
    <!-- Event Type -->
    <div x-data="{ state: {{ json_encode($offer['category']) }}, statusType: '', gotEdited: false }">
        <div class="input-container">
            <label for="evet-type">
                Event Category:
                <span class="required">*</span>
            </label>
            <select name="category_id" 
                id="evet-type"
                class="input"
                x-model="state" 
                :class="gotEdited ? 'orange-border' : 'green-border'"  
                @change="gotEdited = true"
                required
            >
                <option value="" disabled selected>select event type</option>
                @foreach ($categories as $item)
                <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                @endforeach
                <option value="other">other</option>

            </select>
            <input name="other_type"
                class="input"
                x-show="state == 'other'"
                x-model="statusType" 
                x-bind:class="{ 'green-border': statusType }"  
                type="text" 
                placeholder="Enter new Type"
                x-bind:required="state == 'other'"
            >
        </div>
    </div>
    <!-- Event Date -->
    <div x-data="{ state: {{ json_encode($offer['event_starts']) }}, gotEdited: false }">
        <div class="input-container">
            <label for="event-date-start">
                Event Date Starts:
                <span class="required">*</span>
            </label>
            <input name="event_starts"
                id="event-date-start"
                class="input"
                x-model="state" 
                :class="gotEdited ? 'orange-border' : 'green-border'"  
                @change="gotEdited = true"
                type="datetime-local" 
                placeholder="Select date"
                required
            >
        </div>
    </div>
    <!-- Event Date -->
    <div x-data="{ state: {{ json_encode($offer['event_ends']) }}, gotEdited: false }">
        <div class="input-container">
            <label for="event-date-end">
                Event Date Ends:
                <span class="required">*</span>
            </label>
            <input name="event_ends" 
                id="event-date-end"
                class="input"
                x-model="state" 
                :class="gotEdited ? 'orange-border' : 'green-border'"  
                @change="gotEdited = true"
                type="datetime-local" 
                placeholder="Select date"
                required
            >
        </div>
    </div>
    <!-- Event Location -->
    <div x-data="{ state: {{ json_encode($offer['location']) }}, gotEdited: false }">
        <div class="input-container">
            <label for="event-location">
                Event Location:
                <span class="required">*</span>
            </label>
            <input name="location" 
                id="event-location"
                class="input"
                x-model="state" 
                :class="gotEdited ? 'orange-border' : 'green-border'"  
                @keyup="gotEdited = true"
                type="text" 
                placeholder="Enter location"
                required
            >
        </div>
    </div>
    <!-- Event Map Location -->
    <div x-data="{ state: {{ json_encode($offer['map_location']) }}, gotEdited: false }">
        <div class="input-container">
            <label for="event-map">
                Event Map location:
            </label>
            <input name="map_location" 
                id="event-map"
                class="input"
                x-model="state" 
                :class="gotEdited ? 'orange-border' : 'green-border'"  
                @keyup="gotEdited = true"
                type="text" 
                placeholder="Enter location"
                required
            >
        </div>
    </div>
    <!-- Event About -->
    <div x-data="{ state: {{ json_encode($offer['description']) }}, gotEdited: false }">
        <div class="input-container">
            <label for="event-about">
                About event:
                <span class="required">*</span>
            </label>
            <textarea name="description" 
                id="event-about" 
                class="textarea"
                x-model="state" 
                :class="gotEdited ? 'orange-border' : 'green-border'"  
                @keyup="gotEdited = true"
                placeholder="Describe the details"
                required
            ></textarea>
        </div>
    </div>

    <hr>
    <!-- Event Ticket Vip -->
    <div x-data="priceValidator">
        <div class="input-container">
            <label class="enable-vip" for="enable-vip">
                Enable a VIP ticket:
                <input name="containVIP"
                    id="enable-vip"
                    x-model="enableVIP"
                    x-bind:class="{ 'green-border': enableVIP }"
                    type="checkbox"
                    x-bind:disabled="enableVIP"
                    x-bind:checked="enableVIP"
                >
            </label>
            <label x-show="enableVIP" for="ticket-vip">
                Ticket Price for VIP:
                <span class="required">*</span>
            </label>
            <div x-show="enableVIP" class="input ticket">
                <input name="price_vip"
                    class="price"
                    id="ticket-vip"  
                    x-model="stateVip" 
                    @keypress="validatePrice"  
                    type="text" 
                    placeholder="D.A 245"
                    x-bind:required="enableVIP"
                >
                <input name="ticket_vip_amount"
                    class="amount"
                    value="{{ json_encode($offer['total_tickets_vip']) }}"
                    type="number" 
                    min="{{ $offer['tickets_left_vip'] }}"
                    value="{{ $offer['total_tickets_vip'] }}"
                >
            </div>
        </div>
    </div>
    <!-- Event Ticket Economy -->
    <div x-data="priceValidator">
        <div class="input-container">
            <label for="ticket-economy">
                Ticket Price for Economy:
                <span class="required">*</span>
            </label>
            <div class="input ticket" >
                <input name="price_economy"
                    class="price"
                    id="ticket-economy"  
                    x-model="stateEconomic" 
                    @keypress="validatePrice"  
                    type="text" 
                    placeholder="D.A 245"
                    required
                >
                <input name="ticket_economy_amount"
                    value="{{ json_encode($offer['total_tickets_economy']) }}"
                    class="amount"
                    type="number" 
                    min="{{ $offer['total_tickets_economy'] }}"
                    value="{{ $offer['total_tickets_economy'] }}"
                >
            </div>
        </div>
    </div>
    <!-- Event Ticket type -->
    <div x-data="{ state: {{ json_encode($offer['payment_id']) }}, gotEdited: false }">
        <div class="input-container">
            <label for="ticket-type">
                Payout Method (CCP/ BaridiMob):
                <span class="required">*</span>
            </label>
            <select name="payment_id" 
                id="ticket-type"
                class="select"
                x-model="state" 
                :class="gotEdited ? 'orange-border' : 'green-border'"  
                @change="gotEdited = true"
                name="payment_method"
                required
            >
                <option value="" disabled selected>Select payment</option>
                @foreach ($payments as $payment)
                <option value="{{ $payment['id'] }}" >{{ $payment['name'] }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <!-- Phone number -->

    <div x-data="phoneNumber" class="input-container">
        <label for="phone-number">
            Phone number so we Confirm creation:
            <span class="required">*</span>
        </label>
        <input name="phone_number"
            id="phone-number"
            class="input"
            x-model="state" 
            x-bind:class="{ 'green-border': state }" 
            type="text" 
            placeholder="+213..."
            @keypress="validatePhone"
            @if ($offer['phone_number'])
            value="{{ $offer['phone_number'] }}"
            @endif
            required
        >
    </div>
    <button class="create-button">
        Update Event
    </button>

</form>

<script>
    function priceValidator() {
        return {
            enableVIP: {!! json_encode($offer['hasVip']) !!},
            stateEconomic: {!! json_encode($offer['price_economy']) !!},
            stateVip: {!! json_encode($offer['price_vip']) !!},
            validatePrice(event) {
                let keyCode = event.keyCode;
                if ((keyCode < 48 || keyCode > 57) && keyCode != 46) {
                    event.preventDefault();
                }
            },
        }
    }
</script>

<script>
    function phoneNumber() {
        return {
            state: {!! json_encode($offer['phone_number']) !!},
            validatePhone(event) {
                let keyCode = event.keyCode;
                if ((keyCode < 48 || keyCode > 57) && keyCode != 43) {
                    event.preventDefault();
                }
            },
        }
    }
</script>
@endsection
