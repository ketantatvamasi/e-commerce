@extends('layouts.app_admin')
@section('content')
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="float-end">
                        <ol class="breadcrumb">
                            {{-- <li><a href="#">Metrica</a> </li><!--end nav-item-->--}}
                            <li><a href="{{route('admin.dashboard')}}">Dashboard </a> </li><!--end nav-item-->
                            <li class="breadcrumb-item active"> &nbsp;&nbsp;/&nbsp; Product</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Product</h4>
                </div><!--end page-title-box-->
            </div><!--end col-->
        </div>
        <div class="pb-6">
            <button type="button" class="btn btn-primary" ><a class="text-white" href="{{route('ProductView')}}"><i class="fas fa-arrow-left"></i></a></button>
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
                                    <h4 class="box-title">Create Product</h4>
                                </div>
                                <form role="form" id="addproduct" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <input type="hidden" name="id" id="id" value="">
                                    <div class="box-body">
                                        <div class="row">
                                            <div class="col-sm-5">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label>Product name*</label>
                                                        <input type="text" name="product_name" id="product_name" class="form-control mt-2 mb-2" placeholder="Product name" value="{{old('name')}}"  />
                                                        <small></small>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label>Decription*</label>
                                                        <textarea rows="4" name="decription" id="decription" class="form-control mt-2 mb-2" placeholder="Decription" value="{{old('decription')}}"  ></textarea>
                                                        <small></small>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label>MRP price*</label>
                                                        <input type="text" name="mrp_price" id="mrp_price" class="form-control mt-2 mb-2" placeholder="MRP price" value="{{old('mrp_price')}}"  />
                                                        <small></small>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label>Saleing price*</label>
                                                        <input type="text" name="saleing_price" id="saleing_price" class="form-control mt-2 mb-2" placeholder="Saleing price" value="{{old('saleing_price')}}"  />
                                                        <small></small>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label>Select category*</label>
                                                        <select type="text" name="category_id" class="form-control mt-2 mb-3">
                                                            <option value="0">Select category</option>
                                                            @foreach ($category as $key => $value)
                                                                <option value="{{ $value->id }}">{{ $value->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label>Select subcategory*</label>
                                                        <select type="text" name="subcategory_id" class="form-control mt-2 mb-3">
                                                            <option value="0">Select subcategory</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label>Product image (can attach more than one and 282 X 310px)*</label>
                                                        <input type="file" class="form-control" name="photos[]" multiple />
                                                        <small></small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="box-footer pt-2">
                                        <button type="submit" class="btn btn-primary">Create</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script src="{{asset('assets/backend/pages/form-validation.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('select[name="category_id"]').on('change', function () {
                var categoryID = $(this).val();
                alert(categoryID);

                if (categoryID) {
                    $.ajax({
                        url: "{{route('getSubcategory')}}",
                        type: "GET",
                        dataType: "json",
                        data: {
                            'id': categoryID
                        },
                        success: function (data) {
                            // console.log(data);
                            $('select[name="subcategory_id"]').empty();
                            $('select[name="subcategory_id"]').append('<option value="0">Select subcategory</option>');
                            $.each(data, function (key, value) {
                                $('select[name="subcategory_id"]').append('<option value="' + value['id'] + '">' + value['name'] + '</option>');
                            });
                        }
                    });
                } else {
                    $('select[name="subcategory_id"]').empty();
                }
            });
        });
    </script>
@endpush
