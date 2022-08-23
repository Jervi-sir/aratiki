@extends('test.layouts.master')

@section('title')
<title>Login</title>
@endsection

@section('style-header')
<link rel="stylesheet" href="css/login.css">

@endsection

@section('body')
<div class="body-login">
    <!-- form --->
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <h1>Login</h1>
        <!-- Email -->
        <div class="row">
            <label><img src="images/email.svg" alt=""></label>
            <input type="email" name="email" placeholder="Email" :value="old('email')" required>
        </div>
        <!-- Password -->
        <div class="row">
            <label><img src="images/password.svg" alt=""></label>
            <input type="text" name="password" placeholder="Password" required>
        </div>
        @if (Route::has('password.request'))
        <div class="forgot-password">
            <a href="{{ route('password.request') }}">{{ __('Forgot your password?') }}</a>
        </div>
        @endif

        <!-- Remember Me -->
        <input type="checkbox" name="remember" checked hidden>

        <button type="submit">Login</button>
    </form>
</div>

<div class="register">
    <a href="{{ route('register') }}">
        <span>New to Ticketery?</span> <strong>Register</strong>
    </a>
</div>
@endsection
