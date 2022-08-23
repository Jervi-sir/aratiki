<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    Become an Advertiser

    <form action="{{ route('post.advertiser.join')}}" method="POST">
        @csrf
        <span>username</span>
        <input type="text" name="name" placeholder="Company Name">
        <br>
        <span>email</span>
        <input type="email" name="email" placeholder="email">
        <br>
        <span>password</span>
        <input type="password" name="password" placeholder="password">
        <br>
        <hr>
        <span>Company Name</span>
        <input type="text" name="company_name" placeholder="Company Name">
        <br>
        <span>Phone Number</span>
        <input type="text" name="phone_number" placeholder="Phone Number">
        <br>
        <span>Details</span>
        <input type="text" name="details" placeholder="Details">
        <br>
        <span>Images</span>
        <input type="file" name="images" placeholder="Images">
        <br>
        <button type="submit">Request</button>
    </form>
</body>
</html>


@extends('test.layouts.master')

@section('title')
<title>Join us</title>
@endsection

@section('style-header')
<link rel="stylesheet" href="css/login.css">

@endsection

@section('body')
<div class="body-login">
    <!-- form --->
    <form action="{{ route('post.advertiser.join')}}" method="POST">
        @csrf
        <h1>Join our program</h1>
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
