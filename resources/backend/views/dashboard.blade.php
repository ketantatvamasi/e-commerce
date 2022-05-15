@extends('layouts.app_admin')
{{--@push('css')--}}
{{--    <link href="{{asset('assets/backend/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />--}}
{{--    <link href="{{asset('assets/backend/css/icons.min.css')}}" rel="stylesheet" type="text/css" />--}}
{{--    <link href="{{asset('assets/backend/css/app.min.css')}}" rel="stylesheet" type="text/css" />--}}
{{--@endpush--}}
@section('content')
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="float-end">
                        <ol class="breadcrumb">
{{--                            <li><a href="#">Metrica</a> </li><!--end nav-item-->--}}
                            <li><a href="{{route('admin.dashboard')}}">Home </a> </li><!--end nav-item-->
                            <li class="breadcrumb-item active"> &nbsp;&nbsp;/&nbsp; Dashboard</li>
                        </ol>
                     </div>
                    <h4 class="page-title">Dashboard</h4>
                </div><!--end page-title-box-->
            </div><!--end col-->
        </div>
        <!-- end page title end breadcrumb -->
    </div><!-- container -->
@endsection
{{--@push('script')--}}
{{--    <script src="{{asset('assets/backend/js/app.js')}}"></script>--}}
{{--@endpush--}}
