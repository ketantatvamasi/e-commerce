@extends('layouts.app')

@section('content')
<!-- CONTAINER OPEN -->
<div class="login__section section--padding">
    <div class="container">
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="login__section--inner">
                <div class="row">
                    <div class="col-4"></div>
                    <div class="col-5">
                        <div class="account__login">
                            <div class="account__login--header mb-25">
                                <h2 class="account__login--header__title h3 mb-10">Forgot Password</h2>
                                <p class="account__login--header__desc">Forgot here if you are a customer</p>
                            </div>
                            <div class="account__login--inner">
                                <input id="email" type="email" class="account__login--input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
                                <button class="account__login--btn primary__btn" type="submit">{{ __('Send Password Reset Link') }}</button>
                                <div style="margin-top: 1rem;">
                                    <p class="account__login--signup__text">Don't Forgot It? <a href="{{route('login')}}" >Sign In here</a> </p>
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
