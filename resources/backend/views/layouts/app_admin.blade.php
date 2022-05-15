
<html lang="en">

@include('layouts.partials.head')
@stack('css')
<body id="body" >
{{--    @auth--}}
    @php
        if(Auth::guard('admin')->check())
        {
            @endphp
         @include('layouts.partials.header')

        @include('layouts.partials.sidebar')
    @php } @endphp
{{--    @endauth--}}
        <div class="page-wrapper">
            <!-- Page Content-->
            <div class="page-content-tab">
                <!-- Page-content -->
                @yield('content')

                <!-- End Page-content -->
                @auth
                    @include('layouts.partials.footer')
                @endauth
            </div>
            <!-- end main content-->
        </div>
    @include('layouts.partials.footer-scripts')
@stack('script')
</body>
</html>
