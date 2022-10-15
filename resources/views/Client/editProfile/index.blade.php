@extends('_layouts.master')
{{-- [done] --}}

@section('head')
    @vite('resources/views/Client/editProfile/styles.scss')
@endsection

@section('body')
<form action="{{ route('user.update') }}" method="POST" >
    @csrf
    <!-- Images Input -->
   @include('Client.editProfile.imageInput')
    <!-- Event Names -->
    <div x-data="{ state: false }">
        <div class="input-container">
            <label for="user-name">
                {{ __('client.username') }}:
                <span class="required">*</span>
            </label>
            <input name="user_name"
                id="user-name"
                class="input"
                type="text" 
                x-bind:class="{ 'green-border': state }"  
                value="{{ $user['name'] }}"
                @keyup="state=true"
                placeholder="{{ __('client.enter_username') }}"
                required
            >
        </div>
    </div>
    <!-- Event Email -->
    <div>
        <div class="input-container">
            <label for="event-email">
                {{ __('client.email') }}:
                <span class="required">*</span>
            </label>
            <input 
                id="event-email"
                class="input"
                value="{{ $user['email'] }}"
                type="text" 
                placeholder="{{ __('client.enter_event_name') }}"
                disabled
            >
        </div>
    </div>
    <!-- Event About -->
    <div x-data="{ state: false }">
        <div class="input-container">
            <label for="event-about">
                {{ __('client.bio') }}:
                <span class="required">*</span>
            </label> 
            <textarea name="description" 
                id="event-about" 
                class="textarea"
                x-bind:class="{ 'green-border': state }" 
                @keyup="state=true"
                placeholder="{{ __('client.describe_datails') }}"
                required
            >{{ $user['bio'] }}</textarea>
        </div>
    </div>
    <hr>
    <!-- Phone number -->
    <div x-data="phoneNumber" class="input-container">
        <label for="phone-number">
            {{ __('client.phone_number_confirmation') }}:
            <span class="required">*</span>
        </label>
        <input name="phone_number"
            id="phone-number"
            class="input"
            x-bind:class="{ 'green-border': state }" 
            type="text" 
            placeholder="+213..."
            @keyup="validatePhone"
            @if ($user['phone_number'])
            value="{{$user['phone_number']}}"
            @endif
            required
        >
    </div>

    <button class="create-button">
        {{ __('client.update_profile') }}
    </button>
</form>

<script>
    function phoneNumber() {
        return {
            state: false,
            validatePhone(event) {
                this.state = true;
                let keyCode = event.keyCode;
                if ((keyCode < 48 || keyCode > 57) && keyCode != 43) {
                    event.preventDefault();
                }
            },
        }
    }
</script>
@endsection
