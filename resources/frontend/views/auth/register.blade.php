@extends('layouts.app')

@section('content')
    <!-- Start login section  -->
    <div class="login__section section--padding">
        <div class="container">
            <form action="{{route('register')}}" method="POST">
                @csrf
                <div class="login__section--inner">
                    <div class="row">
                        <div class="col-3"></div>
                        <div class="col-6">
                            <div class="account__login register">
                                <div class="account__login--header mb-25">
                                    <h2 class="account__login--header__title h3 mb-10">Create an Account</h2>
                                    <p class="account__login--header__desc">Register here if you are a new customer</p>
                                </div>
                                <div class="account__login--inner">
                                    <input id="name" type="text" class="account__login--input @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Username">
                                    <input id="email" type="email" class="account__login--input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email Address">
                                    <input id="password" type="password" class="account__login--input @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
                                    <input id="password-confirm" type="password" class="account__login--input" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm password">
                                    <button class="account__login--btn primary__btn mb-10" type="submit"> {{ __('Register') }}</button>
                                    <div class="account__login--remember position__relative">
                                        <p class="account__login--signup__text">Allready have account? <a href="{{route('login')}}" >Sign In</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-3"></div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- End login section  -->
@endsection
