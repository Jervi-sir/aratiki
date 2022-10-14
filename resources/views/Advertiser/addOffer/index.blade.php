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
    <div x-data="datePicker">
        <div class="input-container">
            <label for="event-date-start">
                Event Date Starts:
                <span class="required">*</span>
            </label>
            <input name="event_starts"
                id="event-date-start"
                class="input"
                x-model="stateA" 
                x-bind:class="{ 'green-border': stateA }"  
                type="datetime-local" 
                placeholder="Select date"
                x-on:change="setupStartDate"
                required
            >
        </div>
        <div class="input-container">
            <label for="event-date-end">
                Event Date Ends:
                <span class="required">*</span>
            </label>
            <input name="event_ends" 
                id="event-date-end"
                class="input"
                x-model="stateB" 
                x-bind:class="{ 'green-border': stateB }"  
                type="datetime-local" 
                placeholder="Select date"
                required
            >
        </div>
    </div>
    <script>
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
    </script>
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
    <script>
        // Prepare location info object.
        var locationInfo = {
        geo: null,
        country: null,
        state: null,
        city: null,
        postalCode: null,
        street: null,
        streetNumber: null,
            reset: function() {
                this.geo = null;
                this.country = null;
                this.state = null;
                this.city = null;
                this.postalCode = null;
                this.street = null;
                this.streetNumber = null;
            }
        };

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
                    // Reset location object.
                    //locationInfo.reset();

                    // Save the individual address components.
                    //locationInfo.geo = [lat, lng];

                    /*
                    for (var i = 0; i < address.length; i++) {
                        var component = address[i].types[0];
                        switch (component) {
                        case "country":
                            locationInfo.country = address[i]["long_name"];
                            break;
                        case "administrative_area_level_1":
                            locationInfo.state = address[i]["long_name"];
                            break;
                        case "locality":
                            locationInfo.city = address[i]["long_name"];
                            break;
                        case "postal_code":
                            locationInfo.postalCode = address[i]["long_name"];
                            break;
                        case "route":
                            locationInfo.street = address[i]["long_name"];
                            break;
                        case "street_number":
                            locationInfo.streetNumber = address[i]["long_name"];
                            break;
                        default:
                            break;
                        }
                    }
                    */
                    /*
                    // Preview map.
                    var src =
                        "https://maps.googleapis.com/maps/api/staticmap?key=AIzaSyAILGVlt-SOiL381JT3TQ9dxxoNIUuxrV8&center=" +
                        lat +
                        "," +
                        lng +
                        "&zoom=14&size=480x125&maptype=roadmap&sensor=false",
                        img = document.createElement("img");

                    img.src = src;
                    img.className = "absolute top-0 left-0 z-20";
                    document.getElementById("js-preview-map").appendChild(img);

                    // Preview JSON output.
                    document.getElementById("js-preview-json").innerHTML = JSON.stringify(
                        locationInfo,
                        null,
                        4
                    );
                    */
                });
            }
        };

        googleAutocomplete.autocompleteField("event-location");
    </script>
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
                disabled
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
                >
            </label>
            <label x-show="enableVIP" for="ticket-vip">
                Ticket Price for VIP:
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
