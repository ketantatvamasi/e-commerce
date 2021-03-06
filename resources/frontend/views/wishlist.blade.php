@extends('layouts.app')

@section('content')
    <main class="main__content_wrapper">
        <!-- cart section start -->
        <section class="cart__section section--padding">
            <div class="container">
                <div class="cart__section--inner">
                    <form action="#">
                        <h2 class="cart__title mb-40">Wishlist</h2>
                        <div class="cart__table">
                            <table class="cart__table--inner">
                                <thead class="cart__table--header">
                                <tr class="cart__table--header__items">
                                    <th class="cart__table--header__list"></th>
                                    <th class="cart__table--header__list">Product</th>
                                    <th class="cart__table--header__list">Price</th>
                                    <th class="cart__table--header__list text-center">STOCK STATUS</th>
                                    <th class="cart__table--header__list text-right">ADD TO CART</th>
                                </tr>
                                </thead>
                                <tbody class="cart__table--body">
                                @if(session('wishlist'))
                                    @foreach(session('wishlist') as $id => $details)
                                        <tr class="cart__table--body__items id" data-id="{{ $id }}">
                                            <td class="cart__table--body__list" style="width:5%;">
                                                <div class="cart__product d-flex align-items-center">
                                                    <button class="cart__remove--btn" aria-label="search button" type="button">
                                                        <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16px" height="16px"><path d="M 4.7070312 3.2929688 L 3.2929688 4.7070312 L 10.585938 12 L 3.2929688 19.292969 L 4.7070312 20.707031 L 12 13.414062 L 19.292969 20.707031 L 20.707031 19.292969 L 13.414062 12 L 20.707031 4.7070312 L 19.292969 3.2929688 L 12 10.585938 L 4.7070312 3.2929688 z"></path></svg>
                                                    </button>
                                                </div>
                                            </td>
                                            <td class="cart__table--body__list" style="width:60%;">
                                                <div class="cart__product d-flex align-items-center">
{{--                                                <button class="cart__remove--btn" aria-label="search button" type="button">--}}
{{--                                                    <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16px" height="16px"><path d="M 4.7070312 3.2929688 L 3.2929688 4.7070312 L 10.585938 12 L 3.2929688 19.292969 L 4.7070312 20.707031 L 12 13.414062 L 19.292969 20.707031 L 20.707031 19.292969 L 13.414062 12 L 20.707031 4.7070312 L 19.292969 3.2929688 L 12 10.585938 L 4.7070312 3.2929688 z"></path></svg>--}}
{{--                                                </button>--}}
                                                    <div class="cart__thumbnail">
                                                        @php
                                                            $img = explode(",",$details['image']);
                                                            $n = count($img);
                                                        @endphp
                                                        <a href="{{url('productDetails/'.$details['id'])}}">
                                                            @for($i=0; $i<$n; $i++)
                                                                @if($i==0)
                                                                    <img class="border-radius-5" src="{{asset('images/'.$img[$i])}}" alt="cart-product">
                                                                @endif
                                                            @endfor
                                                        </a>
                                                    </div>
                                                    <div class="cart__content">
                                                        <h4 class="cart__content--title"><a href="{{url('productDetails/'.$details['id'])}}">{{$details['name']}}</a></h4>
                                                        <span class="cart__content--variant" >{{$details['decription']}}</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cart__table--body__list">
                                                <span class="cart__price">??? {{$details['saleing_price']}}</span>
                                            </td>
                                            <td class="cart__table--body__list text-center">
                                                <span class="in__stock text__secondary">in stock</span>
                                            </td>
                                            <td class="cart__table--body__list text-right">
                                                <a class="wishlist__cart--btn primary__btn" href="{{ route('add.to.cart2', $details['id']) }}">Add To Cart</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                            <div class="continue__shopping d-flex justify-content-between">
                                <a class="continue__shopping--link" href="{{route('dashboard')}}">Continue shopping</a>
{{--                                <a class="continue__shopping--clear" href="#">View All Products</a>--}}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <!-- cart section end -->
    </main>
@endsection
