@extends('auth.layout')

@section('title')
register
@endsection

@section('body')
<div class="body-register">

    <form method="POST" action="{{ route('register') }}">
        @csrf
        <img src="../../images/logo.svg" alt="" class="logo"/>
        <h1>Register</h1>
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
                        :value="old('name')"
                        type="text"
                        placeholder="Name"
                        required
                        autofocus />
        </div>
        <div class="row">
            <label for="email"><img src="../../images/email.svg" alt=""></label>
            <input id="email"
                        type="email"
                        name="email"
                        :value="old('email')"
                        placeholder="Email"
                        required />
        </div>
        <div class="row">
            <label for="password"><img src="../../images/password.svg" alt=""></label>
            <input id="password"
                        type="password"
                        placeholder="Password"
                        name="password"
                        required autocomplete="new-password" />
        </div>
        <div class="row">
            <label><img src="../../images/password.svg" alt=""></label>
            <input type="password"
                        placeholder="Confirm password"
                        type="password"
                        name="password_confirmation"
                        required />
        </div>
        <button type="submit">Create Your Account</button>
    </form>
</div>
<div class="register">
    <a href="{{ route('login') }}">
        <span>Already have an account in AraTicket?</span> <strong>Login</strong>
    </a>
</div>
@endsection
