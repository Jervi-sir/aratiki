@extends('auth.layout')
{{-- [done] --}}

@section('title')
Update to Advertiser
@endsection

@section('body')
@vite('resources/views/Client/upgrade/styles.scss')
<div class="body-login">
    <form method="POST" action="{{ route('user.upgrade') }}">
        @csrf
        <img src="../../images/logo.svg" alt="" class="logo"/>
        <h1>Join Us</h1>
        <h6>become an Advertiser</h6>
        @if ($errors->any())
            <ul class="errors">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        <div class="row">
            <label for="name" ><img src="../../images/user_.svg" alt=""></label>
            <input id="name"
                        name="name"
                        value="{{ $user['name'] }}"
                        type="text"
                        placeholder="Name"
                        required
                        autofocus />
        </div>
        <div class="row">
            <label for="email"><img src="../../images/email.svg" alt=""></label>
            <input id="email"
                    placeholder="Email"
                    type="email"
                    name="email"
                    value="{{ $user['email'] }}"
                    required
                    autofocus />
        </div>
        <div x-data="phoneNumber" class="row">
            <label><img src="../../images/phone_white.svg" alt=""></label>
            <input type="text"
                    placeholder="Phone number"
                    name="phone_number"
                    value="{{ $user['phone_number'] }}"
                    @keypress="validatePhone"
                    required />
        </div>
        <div class="row">
            <label for="description"><img src="../../images/info.svg" alt=""></label>
            <input id="description"
                    name="description"
                    placeholder="Quick Description"
                    type="text"
                    value="{{ $user['description'] }}"
                    required
                    autofocus />
        </div>
        <input id="remember_me" type="checkbox" name="remember" checked hidden>
        <button type="submit">Become an Advertiser</button>
    </form>
</div>

<script>
    function phoneNumber() {
        return {
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
