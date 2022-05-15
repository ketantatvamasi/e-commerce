@extends('layouts.app')

@section('content')
<!-- CONTAINER OPEN -->
<div class="login__section section--padding">
    <div class="container">
        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <div class="login__section--inner">
                <div class="row">
                    <div class="col-4"></div>
                    <div class="col-5">
                        <div class="account__login">
                            <div class="account__login--header mb-25">
                                <h2 class="account__login--header__title h3 mb-10">{{ __('Reset Password') }}</h2>
                                <p class="account__login--header__desc">Set password here if you are a customer</p>
                            </div>
                            <div class="account__login--inner">
                                <input id="email" type="email" class="account__login--input @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                                <input id="password" type="password" class="account__login--input @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
                                <input id="password-confirm" type="password" class="account__login--input"  name="password_confirmation" required autocomplete="new-password" placeholder="Confirm password">
                                <button class="account__login--btn primary__btn" type="submit">{{ __('Reset Password') }}</button>
                                <div style="margin-top: 1rem;">
                                    <p class="account__login--signup__text">Forgot It? <a href="{{route('login')}}" >Sign In here</a> </p>
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
@endsection
