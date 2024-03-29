@extends('_layouts.master')
{{-- [done] --}}

@section('head')
    @vite('resources/views/Advertiser/addOffer/styles.scss')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAPsDFZ7HBTlFz0qutXmDGr5jWXe8q-qSY&amp;libraries=places"></script>
@endsection

@section('body')
<form action="{{ route('post.advertiser.addOffer') }}" method="POST" >
    @csrf
    <!-- Images Input -->
   @include('Advertiser.addOffer.imagesInput')

    <!-- Event Names -->
    <div x-data="{ state: '' }">
        <div class="input-container">
            <label for="event-name">
                {{ __('advertiser.event_name') }}:
                <span class="required">*</span>
            </label>
            <input name="event_name"
                id="event-name"
                class="input"
                x-model="state" 
                x-bind:class="{ 'green-border': state }"  
                type="text" 
                placeholder="{{ __('advertiser.enter_event_name') }}"
                required
            >
        </div>
    </div>
    <!-- Event Type -->
    <div x-data="{ state: '', statusType: '' }">
        <div class="input-container">
            <label for="evet-type">
                {{ __('advertiser.event_category') }}:
                <span class="required">*</span>
            </label>
            <select name="category" 
                id="evet-type"
                class="input"
                x-model="state" 
                x-bind:class="{ 'green-border': state }"  
                required
            >
                <option value="" disabled selected>select event type</option>
                @foreach ($categories as $item)
                <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                @endforeach
                <option value="other">other</option>

            </select>
            <input name="other_category"
                class="input"
                x-show="state == 'other'"
                x-model="statusType" 
                x-bind:class="{ 'green-border': statusType }"  
                type="text" 
                placeholder="{{ __('advertiser.enter_event_type') }}"
                x-bind:required="state == 'other'"
            >
        </div>
    </div>
    <!-- Event Date -->
    <div x-data="datePicker">
        <div class="input-container">
            <label for="event-date-start">
                {{ __('advertiser.event_date_start') }}:
                <span class="required">*</span>
            </label>
            <input name="event_starts"
                id="event-date-start"
                class="input"
                x-model="stateA" 
                x-bind:class="{ 'green-border': stateA }"  
                type="datetime-local" 
                placeholder="{{ __('advertiser.select_date') }}"
                x-on:change="setupStartDate"
                required
            >
        </div>
        <div class="input-container">
            <label for="event-date-end">
                {{ __('advertiser.event_date_end') }}:
                <span class="required">*</span>
            </label>
            <input name="event_ends" 
                id="event-date-end"
                class="input"
                x-model="stateB" 
                x-bind:class="{ 'green-border': stateB }"  
                type="datetime-local" 
                placeholder="{{ __('advertiser.select_date') }}"
                required
            >
        </div>
    </div>
    <!-- Event Location -->
    <div x-data="{ state: '' }">
        <div class="input-container">
            <label for="event-location">
                {{ __('advertiser.event_location') }}:
                <span class="required">*</span>
            </label>
            <input name="location" 
                id="event-location"
                class="input"
                x-model="state" 
                x-bind:class="{ 'green-border': state }" 
                type="text" 
                placeholder="{{ __('advertiser.enter_location') }}"
                required
            >

        </div>
    </div>
    <!-- Event Map Location -->
    <div x-data="{ state: '' }">
        <div class="input-container">
            <label for="event-map">
                {{ __('advertiser.event_map_location') }}:
            </label>
            <input name="map_location" 
                id="event-map"
                class="input"
                x-model="state" 
                x-bind:class="{ 'green-border': state }" 
                type="text" 
                placeholder="{{ __('advertiser.enter_location') }}"
                disabled
            >
        </div>
    </div>
    <!-- Event About -->
    <div x-data="{ state: '' }">
        <div class="input-container">
            <label for="event-about">
                {{ __('advertiser.about_event') }}:
                <span class="required">*</span>
            </label>
            <textarea name="description" 
                id="event-about" 
                class="textarea"
                x-model="state" 
                x-bind:class="{ 'green-border': state }" 
                placeholder="{{ __('advertiser.describe details') }}"
                required
            ></textarea>
        </div>
    </div>
    <hr>
    <!-- Event Ticket Vip -->
    <div x-data="priceValidator">
        <div class="input-container">
            <label class="enable-vip" for="enable-vip">
                {{ __('advertiser.enable_vip') }}:
                <input name="containVIP"
                    id="enable-vip"
                    x-model="enableVIP"
                    x-bind:class="{ 'green-border': enableVIP }"
                    type="checkbox"
                >
            </label>
            <label x-show="enableVIP" for="ticket-vip">
                {{ __('advertiser.ticket_price_vip') }}:
                <span class="required">*</span>
            </label>
            <div x-show="enableVIP" class="input ticket" x-bind:class="{ 'green-border': stateA }" >
                <input name="price_vip"
                    class="price"
                    id="ticket-vip"  
                    x-model="stateB" 
                    @keypress="validatePrice"  
                    type="text" 
                    placeholder="D.A 245"
                    x-bind:required="enableVIP"
                >
                <input name="ticket_vip_amount"
                    class="amount"
                    type="number" 
                    min="1"
                    value="1"
                >
            </div>
        </div>
    </div>
    <!-- Event Ticket Economy -->
    <div x-data="priceValidator">
        <div class="input-container">
            <label for="ticket-economy">
                {{ __('advertiser.ticket_price_economy') }}:
                <span class="required">*</span>
            </label>
            <div class="input ticket" x-bind:class="{ 'green-border': stateA }" >
                <input name="price_economy"
                    class="price"
                    id="ticket-economy"  
                    x-model="stateA" 
                    @keypress="validatePrice"  
                    type="text" 
                    placeholder="D.A 245"
                    required
                >
                <input name="ticket_economy_amount"
                    class="amount"
                    type="number" 
                    min="1"
                    value="1"
                >
            </div>
        </div>
    </div>
    <!-- Event Ticket type -->
    <div x-data="{ state: '' }">
        <div class="input-container">
            <label for="ticket-type">
                {{ __('advertiser.payment_method') }}:
                <span class="required">*</span>
            </label>
            <select name="payment_type" 
                id="ticket-type"
                class="select"
                x-model="state" 
                x-bind:class="{ 'green-border': state }"  
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
            {{ __('advertiser.phone_number_confimr') }}:
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
            @if ($phone_number)
            value="{{$phone_number}}"
            @endif
            required
        >
    </div>

    <button class="create-button">
        {{ __('advertiser.create_event') }}
    </button>
</form>

<script>
    //-- [ Date Picker ] ------
    var today = new Date();
    var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
    var dateTime = date + 'T00:00:00';
    console.log(dateTime);
    document.getElementById('event-date-start').min = dateTime;
    document.getElementById('event-date-end').min = dateTime;

    function datePicker() {
        return {
            stateA: '',
            stateB: '',
            setupStartDate() {
                document.getElementById('event-date-end').min = this.stateA;
            },
        }
    }

    //-- [ Date validators ] ------
    function priceValidator() {
        return {
            enableVIP: false,
            stateA: '',
            stateB: '',
            validatePrice(event) {
                let keyCode = event.keyCode;
                if ((keyCode < 48 || keyCode > 57) && keyCode != 46) {
                    event.preventDefault();
                }
            },
        }
    }

    function phoneNumber() {
        return {
            state: {!! json_encode($phone_number) !!},
            validatePhone(event) {
                let keyCode = event.keyCode;
                if ((keyCode < 48 || keyCode > 57) && keyCode != 43) {
                    event.preventDefault();
                }
            },
        }
    }

    //-- [ Place Api Location ] ------
    googleAutocomplete = {
        autocompleteField: function(fieldId) {
            (
                autocomplete = new google.maps.places.Autocomplete(
                    document.getElementById(fieldId),
                    {componentRestrictions: {country: "dz"}}
                )
            ),
            { types: ["geocode"] };
            google.maps.event.addListener(autocomplete, "place_changed", function() {
                // Segment results into usable parts.
                var place = autocomplete.getPlace(),
                    address = place.address_components,
                    lat = place.geometry.location.lat(),
                    lng = place.geometry.location.lng();

                document.getElementById('event-map').value = lat + ', ' + lng;
            });
        }
    };

    googleAutocomplete.autocompleteField("event-location");
</script>

@endsection
