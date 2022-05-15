@extends('layouts.app')

@section('content')
    <div class="login__section section--padding">
        <div class="container">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="login__section--inner">
                    <div class="row">
                        <div class="col-3"></div>
                        <div class="col-6">
                            <div class="account__login">
                                <div class="account__login--header mb-25">
                                    <h2 class="account__login--header__title h3 mb-10">Login</h2>
                                    <p class="account__login--header__desc">Login if you area a returning customer.</p>
                                </div>
                                <div class="account__login--inner">
                                    <input id="email" type="email" class="account__login--input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email address">
                                    <input id="password" type="password" class="account__login--input @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                                    <div class="account__login--remember__forgot mb-15 d-flex justify-content-between align-items-center">
                                        <div class="account__login--remember position__relative">
                                            <input class="checkout__checkbox--input" id="check1" type="checkbox">
                                            <span class="checkout__checkbox--checkmark"></span>
                                            <label class="checkout__checkbox--label login__remember--label" for="check1">
                                                Remember me</label>
                                        </div>
{{--                                        <button class="account__login--forgot" type="submit">Forgot Your Password?</button>--}}
                                        <a href="{{ route('password.request') }}" class="account__login--forgot">Forgot Your Password?</a>
                                    </div>
                                    <button class="account__login--btn primary__btn" type="submit">Login</button>
{{--                                    <div class="account__login--divide">--}}
{{--                                        <span class="account__login--divide__text">OR</span>--}}
{{--                                    </div>--}}
{{--                                    <div class="account__social d-flex justify-content-center mb-15">--}}
{{--                                        <a class="account__social--link facebook" target="_blank" href="https://www.facebook.com/">Facebook</a>--}}
{{--                                        <a class="account__social--link google" target="_blank" href="https://www.google.com/">Google</a>--}}
{{--                                        <a class="account__social--link twitter" target="_blank" href="https://twitter.com/">Twitter</a>--}}
{{--                                    </div>--}}
                                    <div style="margin-top: 1rem;">
                                        <p class="account__login--signup__text">Don,t Have an Account? <a href="{{route('register')}}" >Sign up now</a> </p>
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
<!-- CONTAINER CLOSED -->
@endsection
@push('scripts')
    <script src="{{asset('assets/frontend/js/show-password.min.js')}}"></script>
@endpush
