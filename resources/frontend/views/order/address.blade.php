@extends('layouts.app')

@section('content')
    <main class="main__content_wrapper">
        <!-- my account section start -->
        <section class="my__account--section section--padding">
            <div class="container">
                <div class="my__account--section__inner border-radius-10 d-flex">
                    <div class="account__left--sidebar">
                        <h2 class="account__content--title h3 mb-20">My Profile</h2>
                        <ul class="account__menu">
                            <li class="account__menu--list active"><a href="{{route('orderList')}}">Dashboard</a></li>
                            <li class="account__menu--list"><a href="{{route('addresses')}}">Addresses</a></li>
                            <li class="account__menu--list">
                                <a  href="{{ route('user.logout') }}"
                                    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="dropdown-icon fe fe-alert-circle"></i> Log Out
                                </a>
                                <form id="logout-form" action="{{ route('user.logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                    <div class="account__wrapper">
                        <div class="account__content">

                            <h3 class="account__content--title">{{$title}} Address</h3>
                            <div class="account__details--footer d-flex">
                                <form method="post" role="form" action="{{route('address')}}">
                                    @csrf
                                    @if(isset($address[0]->id))
                                        <input type="hidden" name="id" value="{{$address[0]->id}}">
                                    @else
                                        <input type="hidden" name="id" value="">
                                    @endif
                                    <div class="checkout__content--step section__shipping--address" style="padding: 0!important;">
                                        <div class="section__shipping--address__content">
                                            <div class="row">
                                                <div class="col-lg-6 mb-12">
                                                    <div class="checkout__input--list ">
                                                        <label>
                                                            @if(isset($address[0]->first_name))
                                                                <input class="checkout__input--field border-radius-5" name="first_name" placeholder="First name (optional)" value="{{$address[0]->first_name}}" type="text">
                                                            @else
                                                                <input class="checkout__input--field border-radius-5" name="first_name" placeholder="First name (optional)"  type="text">
                                                            @endif
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-12">
                                                    <div class="checkout__input--list">
                                                        <label>
                                                            @if(isset($address[0]->last_name))
                                                                <input class="checkout__input--field border-radius-5" name="last_name" placeholder="Last name" value="{{$address[0]->last_name}}" type="text">
                                                            @else
                                                                <input class="checkout__input--field border-radius-5" name="last_name" placeholder="Last name" type="text">
                                                            @endif
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-12 mb-12">
                                                    <div class="checkout__input--list">
                                                        <label>
                                                            @if(isset($address[0]->address))
                                                                <input class="checkout__input--field border-radius-5" name="address" placeholder="Address" value="{{$address[0]->address}}" type="text">
                                                            @else
                                                                <input class="checkout__input--field border-radius-5" name="address" placeholder="Address"  type="text">
                                                            @endif
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-12 mb-12">
                                                    <div class="checkout__input--list">
                                                        <label>
                                                            @if(isset($address[0]->address2))
                                                                <input class="checkout__input--field border-radius-5" name="address2" placeholder="Apartment, suite, etc. (optional)" value="{{$address[0]->address2}}" type="text">
                                                            @else
                                                                <input class="checkout__input--field border-radius-5" name="address2" placeholder="Apartment, suite, etc. (optional)"  type="text">
                                                            @endif
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-12 mb-12">
                                                    <div class="checkout__input--list">
                                                        <label>
                                                            @if(isset($address[0]->city))
                                                                <input class="checkout__input--field border-radius-5" name="city" placeholder="City" value="{{$address[0]->city}}" type="text">
                                                            @else
                                                                <input class="checkout__input--field border-radius-5" name="city" placeholder="City" type="text">
                                                            @endif
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-12">
                                                    <div class="checkout__input--list checkout__input--select select">
                                                        <label class="checkout__select--label" for="country">Country/region</label>
                                                        @if(isset($address[0]->country_id))
                                                            <select class="checkout__input--select__field border-radius-5" name="country_id" id="country">
                                                                @foreach ($countries as $country)
                                                                    <option value="{{$country->id}}"{{ ($country->id == $address[0]->country_id) ? 'selected' : '' }}>{{$country->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        @else
                                                            <select class="checkout__input--select__field border-radius-5" name="country_id" id="country">
                                                                @foreach ($countries as $country)
                                                                    <option value="{{$country->id}}">{{$country->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-12">
                                                    <div class="checkout__input--list">
                                                        <label>
                                                            @if(isset($address[0]->postal_code))
                                                                <input class="checkout__input--field border-radius-5" name="postal_code" placeholder="Postal code" value="{{$address[0]->postal_code}}" type="text">
                                                            @else
                                                                <input class="checkout__input--field border-radius-5" name="postal_code" placeholder="Postal code"  type="text">
                                                            @endif
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="checkout__content--step__footer d-flex align-items-center">
                                        <button class="account__details--footer__btn" type="submit" >Save</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- my account section end -->
    </main>
@endsection
