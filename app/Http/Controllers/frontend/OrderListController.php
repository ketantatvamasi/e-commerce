<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Country;
use App\Models\Item;
use App\Models\Order;
use App\Models\Shipping_address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderListController extends Controller
{
    public function getCat(){
        $data = Category::select(['id', 'name', 'parent_id'])->where('parent_id', 0)->orderby('parent_id')->orderby('name')->get()->toArray();
        $catArr = array();
        foreach ($data as $kay => $value) {
            $catArr[$kay] = $value;
            $catArr[$kay]['submenu'] = Category::select(['id', 'name', 'parent_id'])->where('parent_id', $value['id'])->orderby('parent_id')->orderby('name')->get()->toArray();
        }
        return $catArr;
    }
    public function menuBar($id = 0){
//        \DB::enableQueryLog();
        $result = Item::select(['id', 'name', 'parent_id'])->where('parent_id', $id)->orderby('parent_id', 'ASC')->get()->toArray();
//        dd(\DB::getQueryLog());
        $output="";
        if($result) {
            $row_result = count($result);
            if($row_result>0){
                $output.="<ul class='header__sub--menu subMenu'>";
                foreach ($result as $value){
                    $count = Item::select(['id'])->where('parent_id', $value['id'])->count();
                    $tmp_icon ='';
                    if($count > 0)
                        $tmp_icon ='<i class="fa-solid fa-angle-right" style="float: right"></i>';
                    $output.="<li class='header__sub--menu__items'><a href='#'>".$value['name']. $tmp_icon."</a>".$this->menuBar($value['id'])."</li>";
                }
                $output.="</ul>";
            }
        }
        return $output;
    }
    public function orderList(){
        $catArr = $this->getCat();
        $itemArr = $this->menuBar();
        return view('order.orderList',compact('itemArr','catArr'));
    }
    public function editaddress($id){
        $catArr = $this->getCat();
        $itemArr = $this->menuBar();
        $countries = Country::all();
        $title = "Edit";
        $address = Shipping_address::select()->where('id',$id)->get();
        return view('order.address',compact('itemArr','catArr','address','countries','title'));
//        dd($address);
    }
    public function deleteaddress($id){
//        return $id;
        Shipping_address::where('id',$id)->delete();
        return redirect()->route('addresses');
    }
    public function deleteShppingAddress($id){
//        return $id;
        Shipping_address::where('id',$id)->delete();
        return redirect()->route('checkout');
    }
    public function addAddress(){
//        return "insert";
        $catArr = $this->getCat();
        $itemArr = $this->menuBar();
        $countries = Country::all();
        $title = "Add";
        return view('order.address',compact('itemArr','catArr','countries','title'));
    }
    public function address(Request $request){
//        return $request;
        $user_id = Auth::user()->id;
        $validator = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'address' => 'required',
            'address2' => 'required',
            'city' => 'required',
            'country_id' => 'required',
            'postal_code'=>'numeric|required'
        ]);
        $input = array(
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'address' => $request->address,
            'address2' => $request->address2,
            'city' => $request->city,
            'country_id' => $request->country_id,
            'postal_code'=>$request->postal_code,
            'user_id'=>$user_id
        );
//        dd($input);
        if($request->id == null){
            Shipping_address::create($input);
            return redirect()->route('addresses');
//            return "insert";
        }else{
//            return "update";
            Shipping_address::where('id',$request->id)->update($input);
            return redirect()->route('addresses');
        }
    }
    public function addresses(){
        $catArr = $this->getCat();
        $itemArr = $this->menuBar();
        $id = Auth::user()->id;
        $address = Shipping_address::select(
            "shipping_addresses.id",
            "address",
            "address2",
            "city",
            "postal_code",
            "c.name as country_name",
        )
            ->leftJoin("countries as c", "c.id", "=", "shipping_addresses.country_id")
            ->where('user_id',$id)
            ->get();
//        dd($address);
        return view('order.addresses',compact('itemArr','catArr','address'));
    }
    public function getOrderList(Request $request){
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
        $totalRecords = Order::select('count(*) as allcount')->count();
        $totalRecordswithFilter = Order::select('count(*) as allcount')->where('id', 'like', '%' .$searchValue . '%')->count();
//        return "hello";
        $id = Auth::user()->id;

        $product = Order::select(
            "orders.id as order_id",
            "orders.created_at as date",
            "p.payment_id as payment_id",
            "p.payment_status as payment_status",
            "oi.quantity as quantity",
            "oi.price as amount",
            "pr.product_name as product_name",
        )
            ->leftJoin("payments as p", "p.order_id", "=", "orders.id")
            ->leftJoin("order_items as oi", "oi.order_id", "=", "orders.id")
            ->leftJoin("products as pr", "pr.id", "=", "oi.product_id")
            ->where('user_id',$id)
            ->get();
//        dd($product);
        $data_arr = array();

        foreach($product as $record){
//            dd($record);
            $order_id = $record->order_id;
            $date = $record->date;
            $product_name = $record->product_name;
            $payment_id = $record->payment_id;
            $payment_status = $record->payment_status;
            $quantity = $record->quantity;
            $total = $record->amount * $record->quantity;
            $newDateFormat = date('F d, Y', strtotime($record->date));
//            dd($newDateFormat2);
//
            $data_arr[] = array(
                "order_id" => $order_id,
                "date" => $newDateFormat,
                "product_name" => $product_name,
                "total" => $total,
                "payment_id" => $payment_id,
                "payment_status" => $payment_status,
                "quantity" => $quantity
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
