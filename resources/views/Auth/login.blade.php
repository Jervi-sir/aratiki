@extends('_layouts.auth')

@section('title')
login
@endsection

@section('body')
<div class="body-login">
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <a href="{{ route('home') }}">
            <img src="../../images/logo.svg" alt="aratiki" class="logo"/>
        </a>
        <h1>{{ __('auth.login') }}</h1>
        @if ($errors->any())
            <ul class="errors">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        <div class="row">
            <label for="email"><img src="../../images/email.svg" alt="aratiki"></label>
            <input id="email"
                    placeholder="{{ __('auth.email') }}"
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    autofocus />
        </div>
        <div x-data="{ show: true }"  class="row">
            <label for="password" ><img src="../../images/password.svg" alt="aratiki"></label>
            <input id="password"
                    name="password"
                    :type="show ? 'password' : 'text'"
                    placeholder="{{ __('auth.password') }}"
                    min="8"
                    required autocomplete="current-password" />
            <img class="eye" x-bind:src="show == true ? '../../images/show.svg' : '../../images/hide.svg'" x-on:click="show = !show" alt="aratiki">
        </div>
        @if (Route::has('password.request'))
        <div class="forgot-password">
            <a href="{{ route('password.request') }}">
                {{ __('auth.forgot_password') }}
            </a>
        </div>
        @endif
        <input id="remember_me" type="checkbox" name="remember" checked hidden>
        <button type="submit">{{ __('auth.login') }}</button>
    </form>
</div>

<div class="register">
    <a href="{{ route('register') }}">
        <span>
            {{ __('auth.new_here') }}
        </span> 
        <strong>
            {{ __('auth.register') }}
        </strong>
    </a>
</div>
@endsection
