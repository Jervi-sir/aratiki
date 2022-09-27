@extends('auth.layout')
{{-- [done] --}}

@section('title')
login
@endsection

@section('body')
<div class="body-login">
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <img src="../../images/logo.svg" alt="" class="logo"/>
        <h1>Login</h1>
        @if ($errors->any())
            <ul class="errors">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        <div class="row">
            <label for="email"><img src="../../images/email.svg" alt=""></label>
            <input id="email"
                    placeholder="Email"
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    autofocus />
        </div>
        <div x-data="{ show: true }"  class="row">
            <label for="password" ><img src="../../images/password.svg" alt=""></label>
            <input id="password"
                    name="password"
                    :type="show ? 'password' : 'text'"
                    placeholder="Password"
                    min="8"
                    required autocomplete="current-password" />
            <img class="eye" x-bind:src="show == true ? '../../images/show.svg' : '../../images/hide.svg'" x-on:click="show = !show" alt="">
        </div>
        @if (Route::has('password.request'))
        <div class="forgot-password">
            <a href="{{ route('password.request') }}">
                {{ __('Forgot your password?') }}
            </a>
        </div>
        @endif
        <input id="remember_me" type="checkbox" name="remember" checked hidden>
        <button type="submit">Login</button>
    </form>
</div>

<div class="register">
    <a href="{{ route('register') }}">
        <span>New to AraTicket?</span> <strong>Register</strong>
    </a>
</div>
@endsection
