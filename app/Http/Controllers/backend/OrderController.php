<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\backend\Product;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Features;
use App\Models\Payment;
use App\Models\Product_size;
use App\Models\Size;
use App\Models\Woman_product;
use App\Models\Woman_product_image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function OrderView()
    {
//        return "hello";
        return view('order.order');
    }
    public function getorder(Request $request){
        $draw = $request->get('draw');
        $start = $request->get("start");
        $rowperpage = $request->get("length"); // Rows display per page

        $columnIndex_arr = $request->get('order');
        $columnName_arr = $request->get('columns');
        $order_arr = $request->get('order');
        $search_arr = $request->get('search');

        $columnIndex = $columnIndex_arr[0]['column']; // Column index
        $columnName = $columnName_arr[$columnIndex]['data']; // Column name
        $columnSortOrder = $order_arr[0]['dir']; // asc or desc
        $searchValue = $search_arr['value']; // Search value

        // Total records
        $totalRecords = Payment::select('count(*) as allcount')->count();
        $totalRecordswithFilter = Payment::select('count(*) as allcount')->where('id', 'like', '%' .$searchValue . '%')->count();

        $product = Payment::select(
            'payments.id',
            'payments.email',
            'payments.mobile',
            'payments.payment_id',
            'payments.payment_status',
            'payments.created_at as date',
            "o.name as user_name",
            "o.address as addre",
            "o.address2 as addre2",
            "o.city as city",
            "c.name as country_name",
            "o.postal_code as postal_code",
            "oi.quantity as quantity",
            "oi.price as amount",
            "p.product_name as product_name",
        )
            ->leftJoin("orders as o", "o.id", "=", "payments.order_id")
            ->leftJoin("countries as c", "c.id", "=", "o.country_id")
            ->leftJoin("order_items as oi", "oi.order_id", "=", "o.id")
            ->leftJoin("products as p", "p.id", "=", "oi.product_id")
            ->get();
//        dd($product);
        $data_arr = array();

        foreach($product as $record){
//            dd($record);
            $id = $record->id;
            $product_name = $record->product_name;
            $user_name = $record->user_name;
//            $amount = $record->amount;
            $payment_id = $record->payment_id;
            $payment_status = $record->payment_status;
            $quantity = $record->quantity;
            $email = $record->email;
            $mobile = $record->mobile;
            $newDateFormat = date('F d, Y', strtotime($record->date));
            $amount = $record->amount * $record->quantity;
            $address = $record->addre.",".$record->addre2.",".$record->city." ".$record->country_name."-".$record->postal_code;
//            dd($newDateFormat);
//
            $data_arr[] = array(
                "id" => $id,
                "product_name" => $product_name,
                "user_name" => $user_name,
                "amount" => $amount,
                "payment_id" => $payment_id,
                "payment_status" => $payment_status,
                "quantity" => $quantity,
                "address" => $address,
                "email"=>$email,
                "mobile"=>$mobile,
                "date"=>$newDateFormat,
            );
        }
//        dd($data_arr);
        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordswithFilter,
            "aaData" => $data_arr
        );

        return response()->json($response);
    }
}
