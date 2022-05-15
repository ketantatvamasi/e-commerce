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
                            <li class="breadcrumb-item active"> &nbsp;&nbsp;/&nbsp; Woman Product</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Woman Product</h4>
                </div><!--end page-title-box-->
            </div><!--end col-->
        </div>
        <div class="pb-3">
            <button type="button" class="btn btn-primary" ><a class="text-white" href="{{route('WomanProductView')}}"><i class="fas fa-arrow-left"></i></a></button>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add product</h4>
                    </div><!--end card-header-->
                    <div class="card-body">
                        <form role="form" id="addproduct" class="row g-3 needs-validation" method="post" enctype="multipart/form-data" novalidate>
                            {{csrf_field()}}
{{--                        <form class="row g-3 needs-validation" novalidate>--}}
                            <div class="col-md-6">
                                <label for="product_nameproduct_name" class="form-label">Product name</label>
                                <input type="text" class="form-control" name="product_name" id="product_name" placeholder="Product name" required>
                                <div class="invalid-feedback">
                                    Please enter the Product name.
                                </div>
                            </div>
                            <div class="col-md-6"></div>
                            <div class="col-md-6">
                                <label for="decription" class="form-label">Description</label>
                                <textarea rows="4" placeholder="Decription" class="form-control" name="decription" id="decription" required></textarea>
                                <div class="invalid-feedback">
                                    Please enter the description.
                                </div>
                            </div>
                            <div class="col-md-6"></div>
                            <div class="col-md-3">
                                <label for="mrp_price" class="form-label">MRP price</label>
                                <input type="text" class="form-control" name="mrp_price" id="mrp_price" placeholder="MRP price" required>
                                <div class="invalid-feedback">
                                    Please enter the MRP price.
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="saleing_price" class="form-label">Saleing price</label>
                                <input type="text" class="form-control" name="saleing_price" id="saleing_price" placeholder="Saleing price" required>
                                <div class="invalid-feedback">
                                    Please enter the Saleing price.
                                </div>
                            </div>
                            <div class="col-md-6"></div>
                            <div class="col-md-3">
                                <label for="category_id" class="form-label">Category</label>
                                <select class="form-select" name="category_id" id="category_id" required>
                                    <option selected disabled value="">Select category</option>
                                    @foreach ($category as $key => $value)
                                        <option value="{{ $value->id }}">{{ $value->name}}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Please select a valid category.
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="subcategory_id" class="form-label">Select subcategory</label>
                                    <select class="form-select" name="subcategory_id"  required>
                                        <option selected disabled value="">Select subcategory</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Please select a valid subcategory.
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6"></div>
                            <div class="col-md-3">
                                <label for="brand_id" class="form-label">Brand</label>
                                <select class="form-select" name="brand_id" id="brand_id" required>
                                    <option selected disabled value="">Select Brand</option>
                                    @foreach ($brand as $key => $value)
                                        <option value="{{ $value->id }}">{{ $value->brand_name}}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Please select a valid Brand.
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="size_id" class="form-label">Size</label>
                                <select class="form-select" name="size[]" id="size_id" multiple="multiple" required>
{{--                                    <option selected disabled value="0">Select Size</option>--}}
                                    @foreach ($size as $key => $value)
                                        <option value="{{ $value->id }}">{{ $value->size}}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Please select a valid state.
                                </div>
                            </div>
                            <div class="col-md-6"></div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Product image (can attach more than one and 282 X 310px)*</label>
                                    <input type="file" class="form-control" name="photos[]" multiple required/>
                                    <div class="invalid-feedback">
                                        Please choose a product image.
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6"></div>
                            <div class="col-md-6">
                                <table id="feature" class="table mb-0">
                                    <thead>
                                        <tr>
                                            <th colspan="3">Feature</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="item_row">
                                            <td>
                                                <input type="text" class="form-control"  name="data[1][name]" id="name_1" placeholder="Name" required>
                                                <div class="invalid-feedback">
                                                    Please enter the name.
                                                </div>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control"  name="data[1][value]" id="value_1" placeholder="Value" required>
                                                <div class="invalid-feedback">
                                                    Please enter the value.
                                                </div>
                                            </td>
                                            <td><a href="javascript:void(0);" id="addfield" class="btn btn-success addfield">
                                                    <i class="fas fa-plus"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Create</button>
{{--                                <button class="btn btn-primary" type="submit">Submit form</button>--}}
                            </div>
                        </form><!--end form-->
                    </div><!--end card-body-->
                </div><!--end card-->
            </div><!--end col-->
    </div>
@endsection
@push('script')
    <script src="{{asset('assets/backend/pages/form-validation.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('select[name="category_id"]').on('change', function () {
                // alert('change');
                var categoryID = $(this).val();
                // alert(categoryID);

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
            var count = $('.item_row').length;
            // alert(count);
            $("#feature").on("click", ".addfield", function () {
                // alert('click');
                count++;
                var htmlRows = '';
                htmlRows += '<tr class="item_row">';
                htmlRows += '<td><input type="text" class="form-control"  name="data[' + count + '][name]" id="name_' + count + '" placeholder="Name" required> <div class="invalid-feedback">Please enter the name.</div></td>';
                htmlRows += '<td><input type="text" class="form-control"  name="data[' + count + '][value]" id="value_' + count + '" placeholder="Value" required><div class="invalid-feedback">Please enter the value.</div></td>';
                htmlRows += '<td><div class="row"><div class="col-4"><a href="javascript:;" id="addfield" class="btn btn-success addfield"><i class="fas fa-plus"></i></a></div>"<div class="col-4"><a href="javascript:;" id="deletefield" class="btn btn-danger"><i class="far fa-trash-alt"></i></a></div></div></td>';
                htmlRows += '</tr>';
                $('#feature').append(htmlRows);
            });
            $("#feature").on("click", "#deletefield", function () {
                $(this).closest("tr").remove();
            });
        });
    </script>
@endpush
