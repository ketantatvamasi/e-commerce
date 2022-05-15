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
                            <li class="breadcrumb-item active"> &nbsp;&nbsp;/&nbsp; Order</li>
                        </ol>
                    </div>
{{--                    <h4 class="page-title">Order List</h4>--}}
                </div><!--end page-title-box-->
            </div><!--end col-->
        </div>
{{--        <div class="pb-3 text-end">--}}
{{--            <button type="button" class="btn btn-success" ><a class="text-white" href="{{route('createProduct')}}">Add</a></button>--}}
{{--        </div>--}}
        <div class="row pt-3">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Order List</h4>
                    </div><!--end card-header-->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id='orderTable' style="font-size: 13px!important;" class="tabulator">
                                <thead class="tabulator-header tabulator-headers">
                                <tr>
                                    <td>ID</td>
                                    <td>User name</td>
                                    <td>Email</td>
                                    <td>Mobile</td>
                                    <td>Address</td>
                                    <td>Total Amount</td>
                                    <td>Total quantity</td>
                                    <td>Product name</td>
                                    <td>Payment ID</td>
                                    <td>Date</td>
                                    <td>Payment status</td>
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
            var cnt = 1;
            $('#orderTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{route('getorder')}}",
                columns: [
                    { "render": function(){
                            return cnt++;
                        }
                    },
                    { data: 'user_name'},
                    { data: 'email'},
                    { data: 'mobile'},
                    { data: 'address' },
                    // { data: 'amount'},
                    { "render": function(data, type, row, meta){
                            return '₹'+" "+row.amount;
                        }
                    },
                    { data: 'quantity' },
                    { data: 'product_name' },
                    { data: 'payment_id' },
                    { data: 'date' },
                    { "render": function(data, type, row, meta){
                        if(row.payment_status == "Credit"){
                            return '<span class="badge badge-soft-success" style="font-size: 0.85rem!important;">'+row.payment_status+'</span>';
                        }
                            return '<span class="badge badge-soft-danger" style="font-size: 0.85rem!important;">'+row.payment_status+'</span>';
                        }
                    },
                ]
            });
        });
    </script>
@endpush
