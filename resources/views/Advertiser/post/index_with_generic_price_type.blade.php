@extends('_layouts.master')
{{-- [done] --}}

@section('head')
    @vite('resources/views/Advertiser/post/styles.scss')
@endsection

@section('body')
<form action="{{ route('post.advertiser.addOffer') }}" method="POST" >
    @csrf
    <!-- Images Input -->
   @include('Advertiser.post.imagesInput')

    <!-- Event Names -->
    <div x-data="{ state: '' }">
        <div class="input-container">
            <label for="event-name">
                Event Name:
                <span class="required">*</span>
            </label>
            <input name="event_name"
                id="event-name"
                class="input"
                x-model="state" 
                x-bind:class="{ 'green-border': state }"  
                type="text" 
                placeholder="Enter event name"
                required
            >
        </div>
    </div>
    <!-- Event Type -->
    <div x-data="{ state: '', statusType: '' }">
        <div class="input-container">
            <label for="evet-type">
                Event Category:
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
                placeholder="Enter new Type"
                x-bind:required="state == 'other'"
            >
        </div>
    </div>
    <!-- Event Date -->
    <div x-data="{ state: '' }">
        <div class="input-container">
            <label for="event-date-start">
                Event Date Starts:
                <span class="required">*</span>
            </label>
            <input name="event_starts"
                id="event-date-start"
                class="input"
                x-model="state" 
                x-bind:class="{ 'green-border': state }"  
                type="datetime-local" 
                placeholder="Select date"
                required
            >
        </div>
    </div>
    <!-- Event Date -->
    <div x-data="{ state: '' }">
        <div class="input-container">
            <label for="event-date-end">
                Event Date Ends:
                <span class="required">*</span>
            </label>
            <input name="event_ends" 
                id="event-date-end"
                class="input"
                x-model="state" 
                x-bind:class="{ 'green-border': state }"  
                type="datetime-local" 
                placeholder="Select date"
                required
            >
        </div>
    </div>
    <!-- Event Location -->
    <div x-data="{ state: '' }">
        <div class="input-container">
            <label for="event-location">
                Event Location:
                <span class="required">*</span>
            </label>
            <input name="location" 
                id="event-location"
                class="input"
                x-model="state" 
                x-bind:class="{ 'green-border': state }" 
                type="text" 
                placeholder="Enter location"
                required
            >
        </div>
    </div>
    <!-- Event Map Location -->
    <div x-data="{ state: '' }">
        <div class="input-container">
            <label for="event-map">
                Event Map location:
            </label>
            <input name="map_location" 
                id="event-map"
                class="input"
                x-model="state" 
                x-bind:class="{ 'green-border': state }" 
                type="text" 
                placeholder="Enter location"
                required
            >
        </div>
    </div>
    <!-- Event About -->
    <div x-data="{ state: '' }">
        <div class="input-container">
            <label for="event-about">
                About event:
                <span class="required">*</span>
            </label>
            <textarea name="description" 
                id="event-about" 
                class="textarea"
                x-model="state" 
                x-bind:class="{ 'green-border': state }" 
                placeholder="Describe the details"
                required
            ></textarea>
        </div>
    </div>

    <hr>
    <!-- Event Ticket type -->
    <div x-data="{ state: '' }">
        <div class="input-container">
            <label for="ticket-type">
                Payout Method (CCP/ BaridiMob):
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

    <!-- Event Ticket Economy -->
    <div x-data="priceValidator">
        <div class="input-container">
            <label for="ticket-economy">
                Ticket Price for Economy:
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
    
    <hr>

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
            @if ($phone_number)
            value="{{$phone_number}}"
            @endif
            required
        >
    </div>

    <button class="create-button">
        Create Event
    </button>

</form>

<script>
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
</script>

<script>
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
</script>
@endsection
