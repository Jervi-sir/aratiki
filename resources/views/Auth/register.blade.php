@extends('auth.layout')
{{-- [done] --}}

@section('title')
register
@endsection

@section('head')
<script src="https://cdnjs.cloudflare.com/ajax/libs/zxcvbn/4.4.2/zxcvbn.js" integrity="sha512-TZlMGFY9xKj38t/5m2FzJ+RM/aD5alMHDe26p0mYUMoCF5G7ibfHUQILq0qQPV3wlsnCwL+TPRNK4vIWGLOkUQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
                        value="{{ old('name') }}"
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
                        value="{{ old('email') }}"
                        placeholder="Email"
                        required />
        </div>
        <div x-data="phoneNumber" class="row">
            <label><img src="../../images/phone_white.svg" alt=""></label>
            <input type="text"
                    placeholder="Phone number"
                    name="phone_number"
                    value="{{ old('phone_number') }}"
                    @keypress="validatePhone"
                    required />
        </div>
        <div x-data="passwordChecker" class="password">
            <div class="row">
                <label for="password"><img src="../../images/password.svg" alt=""></label>
                <input id="password"
                        name="password"
                        min="8"
                        :type="show ? 'password' : 'text'"
                        placeholder="Password"
                        x-model="password"
                        @keyup="calculate"
                        autocomplete="new-password"
                        required />
                    <img class="eye" x-bind:src="show == true ? '../../images/show.svg' : '../../images/hide.svg'" x-on:click="show = !show" alt="">
            </div>
            <div class="strength">
                <div class="level" x-bind:class="{ valid: contains_lovercase }">Lowercase</div>
                <div class="level" x-bind:class="{ valid: contains_number }">Number</div>
                <div class="level" x-bind:class="{ valid: contains_uppercase }">Uppercase</div>
            </div>
        </div>
        <button type="submit">Create Your Account</button>
    </form>
</div>
<div class="register">
    <a href="{{ route('login') }}">
        <span>Already have an account in AraTicket?</span> <strong>Login</strong>
    </a>
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

    function passwordChecker() {
        return {
            show: true,
            status: null,
            password: null,
            score: 1,
            password_length: 0,
            typed: false,
            contains_lovercase: false,
            contains_number: false,
            contains_uppercase: false,
            valid_password_length: false,
            valid_password: false,
            calculate() {
                this.password_length = this.password.length;
                if (this.password_length > 7) {
                    this.valid_password_length = true;
                } else {
                    this.valid_password_length = false;
                }

                if (this.password_length > 0) {
                    this.typed = true;
                } else {
                    this.typed = false;
                }

                this.contains_lovercase = /[a-z]/.test(this.password);
                this.contains_number = /\d/.test(this.password);
                this.contains_uppercase = /[A-Z]/.test(this.password);

                // Check if the password is valid
                if (this.contains_lovercase == true) {
                    this.status = 'weak'; 
                    this.score = 1;
                    if(this.contains_uppercase == true) {
                        this.status = 'medium';
                        this.score = 2;
                        if(this.contains_number == true) {
                            this.status = 'strong';
                            this.score = 3;
                        }
                    }
                } else {
                    this.status = ''
                }
                
            }
        }
    }
    
    
        
</script>
@endsection
