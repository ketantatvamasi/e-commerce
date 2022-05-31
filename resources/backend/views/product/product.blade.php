@push('css')
    <link href="{{asset('assets/backend/plugins/tabulator/bootstrap/tabulator_bootstrap4.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css"/>
    <link href="{{asset('assets/backend/plugins/sweet-alert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/backend/plugins/animate/animate.min.css')}}" rel="stylesheet" type="text/css">
@endpush
@extends('layouts.app_admin')
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
                            <li class="breadcrumb-item active"> &nbsp;&nbsp;/&nbsp; Product</li>
                        </ol>
                    </div>
{{--                    <h4 class="page-title">Product List</h4>--}}
                </div><!--end page-title-box-->
            </div><!--end col-->
        </div>
        <div class="pb-3 pt-3 text-end">
            <button type="button" class="btn btn-success" ><a class="text-white" href="{{route('createProduct')}}">Add</a></button>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Product List</h4>
                    </div><!--end card-header-->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id='empTable' style="font-size: 13px!important;" class="tabulator">
                                <thead class="tabulator-header tabulator-headers">
                                    <tr>
                                        <td>Product name</td>
                                        <td>Decription</td>
                                        <td>MRP price</td>
                                        <td>Saleing price</td>
                                        <td>Category Name</td>
                                        <td>Subcategory Name</td>
                                        <td>Image</td>
                                        <td>Action</td>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('script')
    <script src="{{asset('assets/backend/plugins/sweet-alert2/sweetalert2.min.js')}}"></script>
{{--    <script src="{{asset('assets/backend/pages/sweet-alert.init.js')}}"></script>--}}
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script>
    $(document).ready(function() {
        // var cnt = 1;
        $('#empTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{route('getproduct')}}",
            columns: [
                { data: 'product_name', },
                { data: 'decription' },
                { data: 'mrp_price' },
                { data: 'saleing_price' },
                { data: 'category_name' },
                { data: 'subcategory_name' },
                { "render": function ( data, type, row, meta ) {
                        const myArray = row.image_name.split(",");
                        var image = '';
                        $.each( myArray, function( key, value ) {
                            var img = '{{asset("images/")}}/'+value;
                            image += '<img class="thumb-md rounded-circle" src="'+img+'" height="50"/>';

                        });
                        return image;
                    }
                },
                {"render": function ( data, type, row, meta ) {
                    var action = '{{url("backend/editProduct") }}/'+ row.id;
                        {{--var upload = '{{url("backend/uploadImage") }}/'+ row.id;--}}
                        // return '<a href="'+upload+'"><i class="fas fa-upload"></i></a>&nbsp;&nbsp;' +
                        return '<a href="'+action+'" ><i class="fas fa-edit" ></i></a>&nbsp;&nbsp;' +
                            '<a href="#" onclick="deleteRecord(' + row.id +')"><i class="fas fa-trash-alt"></i></a>';}
                }
            ]
        });
    });
    {{--function editRecord(id){--}}
    {{--    var token = "{{ csrf_token() }}";--}}
    {{--    $.ajax({--}}
    {{--        url: "{{route('editProduct')}}",--}}
    {{--        type: "POST",--}}
    {{--        dataType: "json",--}}
    {{--        data: {--}}
    {{--            '_token': token,--}}
    {{--            'id': id--}}
    {{--        },--}}
    {{--        success:function(data) {--}}
    {{--            console.log(data);--}}
    {{--        }--}}
    {{--    });--}}
    {{--}--}}


    function deleteRecord(id){
        // alert(id);
        var token = "{{ csrf_token() }}";
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
        }).then(function(result) {
            if (result.isConfirmed) {
                $.ajax({
                    url: "{{route('deleteProduct')}}",
                    type: "POST",
                    dataType: "json",
                    data: {
                        '_token': token,
                        'id': id
                    },
                    success:function(data) {
                        // console.log(data);
                        $('#empTable').DataTable().ajax.reload();
                    }
                });
            }
        })
        // alert(token);
    }
    </script>
@endpush
