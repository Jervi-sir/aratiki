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
            <div {{ $attributes }}>
                <ul class="errors">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row">
            <label for="email"><img src="../../images/email.svg" alt=""></label>
            <input id="email"
                    placeholder="Email"
                    type="email"
                    name="email"
                    :value="old('email')"
                    required
                    autofocus />
        </div>
        <div class="row">
            <label for="password" ><img src="../../images/password.svg" alt=""></label>
            <input id="password"
                    placeholder="Password"
                    type="password"
                    name="password"
                    required autocomplete="current-password" />
        </div>
        @if (Route::has('password.request'))
        <div class="forgot-password">
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
