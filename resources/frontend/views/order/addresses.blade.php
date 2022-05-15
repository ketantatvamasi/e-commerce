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
                            <h3 class="account__content--title mb-20">Addresses</h3>
                            <button class="new__address--btn primary__btn mb-25" type="button"><a href="{{route('addAddress')}}">Add a new address</a></button>
{{--                            <h4 class="account__details--title">Default</h4>--}}
                            <div class="row">
                                @foreach($address as $value )
                                    <div class="col-6">
                                        <p class="account__details--desc">{{$value->address}},<br> {{$value->address2}},<br> {{$value->city}} {{$value->postal_code}},<br> {{$value->country_name}}</p>
                                        <div class="account__details--footer d-flex mb-20">
                                            <button class="account__details--footer__btn" type="button" ><a href="editAddress/{{$value->id}}">Edit</a></button>
                                            <button class="account__details--footer__btn " type="button"><a href="deleteAddress/{{$value->id}}">Delete</a></button>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- my account section end -->
    </main>
@endsection
