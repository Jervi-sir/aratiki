@extends('_layouts.auth')

@section('title')
Become an Advertiser
@endsection

@section('head')
    @vite('resources/js/app.js')
@endsection

@section('body')
<div class="body-login">
    <form method="POST" action="{{ route('post.advertiser.join') }}">
        @csrf
        <img src="../../images/logo.svg" alt="aratiki" class="logo"/>
        <h1>{{ __('auth.become_advertiser') }}</h1>
        @if ($errors->any())
            <div {{ $attributes }}>
                <ul class="errors">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row">
            <label for="name"><img src="../../images/business.svg" alt="aratiki"></label>
            <input id="name"
                    placeholder="{{ __('auth.name_company') }}"
                    type="text"
                    name="name"
                    :value="old('name')"
                    required
                    autofocus />
        </div>

        <div class="row">
            <label for="email"><img src="../../images/email.svg" alt="aratiki"></label>
            <input id="email"
                    placeholder="{{ __('auth.email') }}"
                    type="email"
                    @guest
                    name="email"
                    :value="old('email')"
                    required
                    @endguest
                    @auth
                        value = {{ Auth()->user()->email }}
                        disabled
                    @endauth
                    autofocus />
        </div>
        @guest
        <div class="row">
            <label for="password" ><img src="../../images/password.svg" alt="aratiki"></label>
            <input id="password"
                    placeholder="{{ __('auth.passowrd') }}"
                    type="password"
                    name="password"
                    required autocomplete="current-password" />
        </div>
        <div class="row">
            <label><img src="../../images/password.svg" alt="aratiki"></label>
            <input type="password"
                        placeholder="{{ __('auth.confirm_passowrd') }}"
                        type="password"
                        name="password_confirmation"
                        required />
        </div>
        @endguest
        <div x-data="phoneNumber" class="row">
            <label for="phone_number"><img src="../../images/phone_number.svg" alt="aratiki"></label>
            <input id="phone_number"
                    placeholder="{{ __('auth.phone_number') }}"
                    type="text"
                    name="phone_number"
                    required
                    autofocus
                    @keypress="validatePhone($event)" />
        </div>
        <div class="row">
            <label for="description"><img src="../../images/info.svg" alt="aratiki"></label>
            <input id="description"
                    placeholder="{{ __('auth.quick_description') }}"
                    type="text"
                    name="description"
                    :value="old('description')"
                    required
                    autofocus />
        </div>

        <button type="submit">{{ __('auth.become_advertiser') }}</button>
    </form>
</div>
<div class="register">
    <a href="{{ route('home') }}">
        <span>{{ __('auth.go_back_to') }}</span> 
        <strong>{{ __('auth.home') }}</strong>
    </a>
</div>
<script>
    function phoneNumber() {
        return {
            validatePhone(event) {
                console.log(1)
                let keyCode = event.keyCode;
                if ((keyCode < 48 || keyCode > 57) && keyCode != 43) {
                        event.preventDefault();
                }
            },
        }
    }
</script>
@endsection
