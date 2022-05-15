<!doctype html>
<html lang="en">
@include('layouts.partials.head')

<body>

<!-- Start preloader -->
<div id="preloader">
    <div id="ctn-preloader" class="ctn-preloader">
        <div class="animation-preloader">
            <div class="spinner"></div>
            <div class="txt-loading">
                <span data-text-preloader="L" class="letters-loading">L</span>
                <span data-text-preloader="O" class="letters-loading">O</span>
                <span data-text-preloader="A" class="letters-loading">A</span>
                <span data-text-preloader="D" class="letters-loading">D</span>
                <span data-text-preloader="I" class="letters-loading">I</span>
                <span data-text-preloader="N" class="letters-loading">N</span>
                <span data-text-preloader="G" class="letters-loading">G</span>
            </div>
        </div>

        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
    </div>
</div>
<!-- End preloader -->
@php $total = 0 @endphp
@foreach((array) session('cart') as $id => $details)
    @php $total += $details['saleing_price'] * $details['quantity'] @endphp
@endforeach
@foreach((array) session('cart2') as $id => $details)
    @php $total += $details['saleing_price'] * $details['quantity'] @endphp
@endforeach
<!-- Start checkout page area -->
<div class="checkout__page--area">
    <div class="container">
        <div class="checkout__page--inner d-flex">
            <div class="main checkout__mian">
                <header class="main__header checkout__mian--header mb-30">
{{--                    <h1 class="main__logo--title"><a class="logo logo__left mb-20" href="javascript:void(0)"><img src="{{asset('assets/frontend/img/logo/nav-log.png')}}" alt="logo"></a></h1>--}}
                    <details class="order__summary--mobile__version">
                        <summary class="order__summary--toggle border-radius-5">
                                <span class="order__summary--toggle__inner">
                                    <span class="order__summary--toggle__icon">
                                        <svg width="20" height="19" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M17.178 13.088H5.453c-.454 0-.91-.364-.91-.818L3.727 1.818H0V0h4.544c.455 0 .91.364.91.818l.09 1.272h13.45c.274 0 .547.09.73.364.18.182.27.454.18.727l-1.817 9.18c-.09.455-.455.728-.91.728zM6.27 11.27h10.09l1.454-7.362H5.634l.637 7.362zm.092 7.715c1.004 0 1.818-.813 1.818-1.817s-.814-1.818-1.818-1.818-1.818.814-1.818 1.818.814 1.817 1.818 1.817zm9.18 0c1.004 0 1.817-.813 1.817-1.817s-.814-1.818-1.818-1.818-1.818.814-1.818 1.818.814 1.817 1.818 1.817z" fill="currentColor"></path>
                                        </svg>
                                    </span>
                                    <span class="order__summary--toggle__text show">
                                        <span>Show order summary</span>
                                        <svg width="11" height="6" xmlns="http://www.w3.org/2000/svg" class="order-summary-toggle__dropdown" fill="currentColor"><path d="M.504 1.813l4.358 3.845.496.438.496-.438 4.642-4.096L9.504.438 4.862 4.534h.992L1.496.69.504 1.812z"></path></svg>
                                    </span>
                                    <span class="order__summary--final__price">$227.70</span>
                                </span>
                        </summary>
                        <div class="order__summary--section">
                            <div class="cart__table checkout__product--table">
                                <table class="summary__table">
                                    <tbody class="summary__table--body">
                                    <tr class=" summary__table--items">
                                        <td class=" summary__table--list">
                                            <div class="product__image two  d-flex align-items-center">
                                                <div class="product__thumbnail border-radius-5">
                                                    <a href="javascript:void(0)"><img class="border-radius-5" src="{{asset('assets/frontend/img/product/small-product7.png')}}" alt="cart-product"></a>
                                                    <span class="product__thumbnail--quantity">1</span>
                                                </div>
                                                <div class="product__description">
                                                    <h3 class="product__description--name h4"><a href="javascript:void(0)">Fresh-whole-fish</a></h3>
                                                    <span class="product__description--variant">COLOR: Blue</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class=" summary__table--list">
                                            <span class="cart__price">£65.00</span>
                                        </td>
                                    </tr>
                                    <tr class="summary__table--items">
                                        <td class=" summary__table--list">
                                            <div class="cart__product d-flex align-items-center">
                                                <div class="product__thumbnail border-radius-5">
                                                    <a href="javascript:void(0)"><img class="border-radius-5" src="{{asset('assets/frontend/img/product/small-product2.png')}}" alt="cart-product"></a>
                                                    <span class="product__thumbnail--quantity">1</span>
                                                </div>
                                                <div class="product__description">
                                                    <h3 class="product__description--name h4"><a href="javascript:void(0)">Vegetable-healthy</a></h3>
                                                    <span class="product__description--variant">COLOR: Green</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class=" summary__table--list">
                                            <span class="cart__price">£82.00</span>
                                        </td>
                                    </tr>
                                    <tr class=" summary__table--items">
                                        <td class=" summary__table--list">
                                            <div class="cart__product d-flex align-items-center">
                                                <div class="product__thumbnail border-radius-5">
                                                    <a href="javascript:void(0)"><img class="border-radius-5" src="{{asset('assets/frontend/img/product/small-product4.png')}}" alt="cart-product"></a>
                                                    <span class="product__thumbnail--quantity">1</span>
                                                </div>
                                                <div class="product__description">
                                                    <h3 class="product__description--name h4"><a href="javascript:void(0)">Raw-onions-surface</a></h3>
                                                    <span class="product__description--variant">COLOR: White</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class=" summary__table--list">
                                            <span class="cart__price">£78.00</span>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="checkout__discount--code">
                                <form class="d-flex" action="#">
                                    <label>
                                        <input class="checkout__discount--code__input--field border-radius-5" placeholder="Gift card or discount code"  type="text">
                                    </label>
                                    <button class="checkout__discount--code__btn primary__btn border-radius-5" type="submit">Apply</button>
                                </form>
                            </div>

                            <div class="checkout__total">
                                <table class="checkout__total--table">
                                    <tbody class="checkout__total--body">
                                    <tr class="checkout__total--items">
                                        <td class="checkout__total--title text-left">Subtotal </td>
                                        <td class="checkout__total--amount text-right">{{$total}}</td>
                                    </tr>
                                    <tr class="checkout__total--items">
                                        <td class="checkout__total--title text-left">Shipping</td>
                                        <td class="checkout__total--calculated__text text-right">Calculated at next step</td>
                                    </tr>
                                    </tbody>
                                    <tfoot class="checkout__total--footer">
                                    <tr class="checkout__total--footer__items">
                                        <td class="checkout__total--footer__title checkout__total--footer__list text-left">Total </td>
                                        <td class="checkout__total--footer__amount checkout__total--footer__list text-right">{{$total}}</td>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </details>
                </header>
                <main class="main__content_wrapper">
                    <form method="post" role="form" action="{{route('checkout2')}}">
                        {{csrf_field()}}
                        <div class="checkout__content--step section__shipping--address">
                            <div class="section__header checkout__section--header d-flex align-items-center justify-content-between mb-25">
                                <h2 class="section__header--title h3">Selete Shipping address</h2>
                                <p class="layout__flex--item">

                                    <a class="layout__flex--item__link" href="{{route('addAddress')}}">Enter a new delivery address</a>
                                </p>
                            </div>
                            <div class="row">
                            @foreach($data as $value )
                                <div class="col-md-6">
                                    <input type="radio" name="id" value="{{$value->id}}" checked><span style="padding-left: 0.5rem;" >
                                        <p class="account__details--desc">{{$value->address}},</p> </span>
                                        <p class="account__details--desc">{{$value->address2}},<br> {{$value->city}} {{$value->postal_code}},<br> {{$value->country_name}}</p>
                                    <div class="account__details--footer d-flex mb-20">
                                        <button class="account__details--footer__btn" type="button" ><a href="editAddress/{{$value->id}}">Edit</a></button>
                                        <button class="account__details--footer__btn " type="button"><a href="deleteShppingAddress/{{$value->id}}">Delete</a></button>
                                    </div>
                                </div>
                            @endforeach
                            </div>
                        </div>
                        <div class="checkout__content--step__footer d-flex align-items-center">
                            <button type="submit" class="continue__shipping--btn primary__btn border-radius-5" >Continue To Shipping</button>
                            <a class="previous__link--content" href="{{route('shop')}}">Return to shopping</a>
                        </div>
                    </form>
                </main>
                <footer class="main__footer checkout__footer">
                    <p class="copyright__content">Copyright © 2022
                        All Rights Reserved</p>
                </footer>
            </div>
            <aside class="checkout__sidebar sidebar">
                <div class="cart__table checkout__product--table" style="margin-bottom: 0!important;">
                    <table class="cart__table--inner">
                        <tbody class="cart__table--body">
                        @if(session('cart'))
                            @foreach(session('cart') as $id => $details)
                                <tr class="cart__table--body__items">
                            <td class="cart__table--body__list">
                                <div class="product__image two  d-flex align-items-center">
                                    <div class="product__thumbnail border-radius-5">
                                        @php
                                            $img = explode(",",$details['image']);
                                            $n = count($img);
                                        @endphp
                                        <a href="#">
                                            @for($i=0; $i<$n; $i++)
                                                @if($i==0)
                                                    <img class="border-radius-5" src="{{asset('images/'.$img[$i])}}" alt="cart-product">
                                                @endif
                                            @endfor
                                        </a>
                                        <span class="product__thumbnail--quantity">{{$details['quantity']}}</span>
                                    </div>
                                    <div class="product__description">
                                        <h3 class="product__description--name h4"><a href="javascript:void(0)">{{$details['name']}}</a></h3>
                                        <span class="product__description--variant">COLOR: Blue</span>
                                    </div>
                                </div>
                            </td>
                            <td class="cart__table--body__list">
                                <span class="cart__price">₹ {{$details['saleing_price']}}</span>
                            </td>
                        </tr>
                            @endforeach
                        @endif
                        @if(session('cart2'))
                            @foreach(session('cart2') as $id => $details)
                                <tr class="cart__table--body__items">
                                    <td class="cart__table--body__list">
                                        <div class="product__image two  d-flex align-items-center">
                                            <div class="product__thumbnail border-radius-5">
                                                @php
                                                    $img = explode(",",$details['image']);
                                                    $n = count($img);
                                                @endphp
                                                <a href="#">
                                                    @for($i=0; $i<$n; $i++)
                                                        @if($i==0)
                                                            <img class="border-radius-5" src="{{asset('images/'.$img[$i])}}" alt="cart-product">
                                                        @endif
                                                    @endfor
                                                </a>
                                                <span class="product__thumbnail--quantity">{{$details['quantity']}}</span>
                                            </div>
                                            <div class="product__description">
                                                <h3 class="product__description--name h4"><a href="javascript:void(0)">{{$details['name']}}</a></h3>
                                                <span class="product__description--variant">COLOR: Blue</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="cart__table--body__list">
                                        <span class="cart__price">₹ {{$details['saleing_price']}}</span>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
{{--                <div class="checkout__discount--code">--}}
{{--                    <form class="d-flex" action="#">--}}
{{--                        <label>--}}
{{--                            <input class="checkout__discount--code__input--field border-radius-5" placeholder="Gift card or discount code"  type="text">--}}
{{--                        </label>--}}
{{--                        <button class="checkout__discount--code__btn primary__btn border-radius-5" type="submit">Apply</button>--}}
{{--                    </form>--}}
{{--                </div>--}}
                <div class="checkout__total">
                    <table class="checkout__total--table">
                        <tbody class="checkout__total--body">
                        <tr class="checkout__total--items">
                            <td class="checkout__total--title text-left">Subtotal </td>
                            <td class="checkout__total--amount text-right">₹ {{$total}}</td>
                        </tr>
                        <tr class="checkout__total--items">
                            <td class="checkout__total--title text-left">Shipping</td>
                            <td class="checkout__total--calculated__text text-right">Calculated at next step</td>
                        </tr>
                        </tbody>
                        <tfoot class="checkout__total--footer">
                        <tr class="checkout__total--footer__items">
                            <td class="checkout__total--footer__title checkout__total--footer__list text-left">Total </td>
                            <td class="checkout__total--footer__amount checkout__total--footer__list text-right">₹ {{$total}}</td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </aside>
        </div>
    </div>
</div>
<!-- End checkout page area -->

<!-- Scroll top bar -->
<button id="scroll__top"><svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M112 244l144-144 144 144M256 120v292"/></svg></button>

@include('layouts.partials.footer-scripts')
</body>
</html>
