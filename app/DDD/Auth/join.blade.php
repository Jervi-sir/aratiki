@extends('auth.layout')

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
        <img src="images/logo.svg" alt="" class="logo"/>
        <h1>Become an Advertiser</h1>
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
            <label for="name"><img src="images/business.svg" alt=""></label>
            <input id="name"
                    placeholder="Name of your Comapny"
                    type="text"
                    name="name"
                    :value="old('name')"
                    required
                    autofocus />
        </div>

        <div class="row">
            <label for="email"><img src="images/email.svg" alt=""></label>
            <input id="email"
                    placeholder="Email"
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
            <label for="password" ><img src="images/password.svg" alt=""></label>
            <input id="password"
                    placeholder="Password"
                    type="password"
                    name="password"
                    required autocomplete="current-password" />
        </div>
        <div class="row">
            <label><img src="images/password.svg" alt=""></label>
            <input type="password"
                        placeholder="Confirm password"
                        type="password"
                        name="password_confirmation"
                        required />
        </div>
        @endguest
        <div x-data="phoneNumber" class="row">
            <label for="phone_number"><img src="images/phone_number.svg" alt=""></label>
            <input id="phone_number"
                    placeholder="Phone number"
                    type="text"
                    name="phone_number"
                    required
                    autofocus
                    @keypress="validatePhone($event)" />
        </div>
        <div class="row">
            <label for="description"><img src="images/info.svg" alt=""></label>
            <input id="description"
                    placeholder="Quick Description"
                    type="text"
                    name="description"
                    :value="old('description')"
                    required
                    autofocus />
        </div>

        <button type="submit">Become an Advertiser</button>
    </form>
</div>
<div class="register">
    <a href="{{ route('home') }}">
        <span>Go back to</span> <strong>Home</strong>
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
