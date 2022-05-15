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
                            <li><a href="{{route('admin.dashboard')}}">Dashboard </a> </li><!--end nav-item-->
                            <li class="breadcrumb-item active"> &nbsp;&nbsp;/&nbsp; Category</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Category</h4>
                </div><!--end page-title-box-->
            </div><!--end col-->
        </div>
        <div class="row">
            <div class="col-sm-12">
                <section class="content" >
                    <div class="row">
                        <div class="col-md-12">
                            @if ($errors->any())
                                <div>
                                    @foreach ($errors->all() as $error)
                                        <li class="alert alert-danger">{{ $error }}</li>
                                    @endforeach
                                </div>
                            @endif

                            @if(\Session::has('error'))
                                <div>
                                    <li class="alert alert-danger">{!! \Session::get('error') !!}</li>
                                </div>
                            @endif

                            @if(\Session::has('success'))
                                <div>
                                    <li class="alert alert-success">{!! \Session::get('success') !!}</li>
                                </div>
                            @endif
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Create Category</h3>
                                </div>
                                <form role="form" method="post">
                                    {{csrf_field()}}
                                    <div class="box-body">
                                        <div class="row">
                                            <div class="col-sm-5">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label>Category name*</label>
                                                        <input type="text" name="name" class="form-control mt-2 mb-2" placeholder="Category name" value="{{old('name')}}" required />
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label>Select parent category*</label>
                                                        <select type="text" name="parent_id" class="form-control mt-2 mb-3">
                                                            <option value="0">None</option>
                                                            @if($categories)
                                                                @foreach($categories as $category)
                                                                    <?php $dash=''; ?>
                                                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                                                    @if(count($category->subcategory))
                                                                        @include('subCategoryList-option',['subcategories' => $category->subcategory])
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary">Create</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <!-- end page title end breadcrumb -->
    </div><!-- container -->
@endsection

{{--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">--}}

