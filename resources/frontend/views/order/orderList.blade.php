@push('css')
    <link href="{{asset('assets/backend/plugins/tabulator/bootstrap/tabulator_bootstrap4.css')}}" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css"/>
    <link href="{{asset('assets/backend/plugins/sweet-alert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/backend/plugins/animate/animate.min.css')}}" rel="stylesheet" type="text/css">
    <style>
        .success{
            font-size: 1.2rem!important;
            background-color: rgba(34,183,131,.15)!important;
            display: inline-block;
            padding: 0 0.75em;
            border-radius: 50rem!important;
            color: #22b783;
            font-weight: 600;
        }
        .error{
            font-size: 1.2rem!important;
            background-color: rgba(239,77,86,.15)!important;
            display: inline-block;
            padding: 0 0.75em;
            border-radius: 50rem!important;
            color: #ef4d56;
            font-weight: 600;
        }
    </style>
@endpush
@extends('layouts.app')

@section('content')
    <main class="main__content_wrapper">

        <!-- my account section start -->
        <section class="my__account--section section--padding">
            <div class="container">
{{--                <p class="account__welcome--text">Hello, Admin welcome to your dashboard!</p>--}}
                <div class="my__account--section__inner border-radius-10 d-flex">
                    <div class="account__left--sidebar">
                        <h2 class="account__content--title h3 mb-20">My Profile</h2>
                        <ul class="account__menu">
                            <li class="account__menu--list active"><a href="{{route('orderList')}}">Dashboard</a></li>
                            <li class="account__menu--list"><a href="{{route('addresses')}}">Addresses</a></li>
                            <li class="account__menu--list">
                                <a  href="{{ route('user.logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="dropdown-icon fe fe-alert-circle"></i> Log Out
                                </a>
                                <form id="logout-form" action="{{ route('user.logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                    <div class="row pt-3">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h2 class="account__content--title h3 mb-20">Orders History</h2>
                                </div><!--end card-header-->
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id='orderListTable' style="font-size: 13px!important;" class="tabulator">
                                            <thead class="tabulator-header tabulator-headers">
                                            <tr>
                                                <td class="account__table--header__child--items">ID</td>
                                                <td class="account__table--header__child--items">Order ID</td>
                                                <td class="account__table--header__child--items">Payment ID</td>
                                                <td class="account__table--header__child--items">Product Name</td>
                                                <td class="account__table--header__child--items">Quantity</td>
                                                <td class="account__table--header__child--items">Total</td>
                                                <td class="account__table--header__child--items">Date</td>
                                                <td class="account__table--header__child--items">Payment Status</td>
                                            </tr>
                                            </thead>
                                            <tbody style="text-align: center;"></tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- my account section end -->
    </main>
@endsection
@push('script')
    <script src="{{asset('assets/backend/plugins/sweet-alert2/sweetalert2.min.js')}}"></script>
    {{--    <script src="{{asset('assets/backend/pages/sweet-alert.init.js')}}"></script>--}}
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            var cnt = 1;
            $('#orderListTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{route('getOrderList')}}",
                columns: [
                    { "render": function(){
                            return cnt++;
                        }
                    },
                    { data: 'order_id'},
                    { data: 'payment_id'},
                    { data: 'product_name'},
                    { data: 'quantity' },
                    // { data: 'amount'},
                    { "render": function(data, type, row, meta){
                            return '₹'+" "+row.total;
                        }
                    },
                    { data: 'date' },
                    // { data: 'payment_status' },
                    { "render": function(data, type, row, meta){
                            if(row.payment_status == "Credit"){
                                // <span class="badge rounded-pill bg-success">Success</span>
                                return '<span class="success">'+row.payment_status+'</span>';
                            }else {
                                return '<span class="error">' + row.payment_status + '</span>';
                            }
                        }
                    },
                ]
            });
        });
    </script>
@endpush
