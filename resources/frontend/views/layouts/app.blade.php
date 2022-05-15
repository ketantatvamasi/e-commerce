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
{{--    @auth--}}
        @include('layouts.partials.header')
{{--    @endauth--}}

    <!-- Page-content -->
    @yield('content')
    <!-- End Page-content -->

{{--    @auth--}}
        @include('layouts.partials.footer')
{{--    @endauth--}}
    <!-- end main content-->


    <!-- Scroll top bar -->
    <button id="scroll__top"><svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M112 244l144-144 144 144M256 120v292"/></svg></button>

    @include('layouts.partials.footer-scripts')
</body>

</html>
