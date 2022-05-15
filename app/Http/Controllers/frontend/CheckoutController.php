<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Payment;
use App\Models\Final_order;
use App\Models\Order;
use App\Models\Order_item;
use App\Models\Shipping_address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Session;
use Validator;
use Exception;
class CheckoutController extends Controller
{
    //
    public function checkoutView(){
        $id = Auth::user()->id;
        $data = Shipping_address::where('user_id',$id)->get();

        $countries = Country::all();
        return view('checkout.checkout',compact('countries','data'));
    }
    public function checkoutView2(Request $request){
//        return "hello";
//        return $request->id;
        $address = Shipping_address::where('id',$request->id)->get()->first();
//        dd($address->first_name);
        $user_id = Auth::user()->id;
        $input = array(
            'first_name' => $address->first_name,
            'last_name' => $address->last_name,
            'address' => $address->address,
            'address2' => $address->address2,
            'city' => $address->city,
            'country_id' => $address->country_id,
            'postal_code'=>$address->postal_code,
            'user_id'=>$user_id
        );
//        dd($input);
        $this->data($input);
        return redirect()->route('payment');

//        if($request->id == null){
//             Shipping_address::create($input);
//            $this->data($input);
//            return redirect()->route('payment');
////            return "insert";
//        }else{
//            Shipping_address::where('id',$request->id)->update($input);
//            $this->data($input);
//            return redirect()->route('payment');
//        }
    }
    public function data($data){
        $name = $data['first_name']." ".$data['last_name'];
        $user_id = Auth::user()->id;
        $quantity = 0;
        $total = 0;
        if(session('cart') != null){
            foreach (session('cart') as $id => $details){
                $quantity += $details['quantity'];
                $total += $details['saleing_price'] * $details['quantity'];
            }
        }
        if(session('cart2') != null) {
            foreach (session('cart2') as $id => $details) {
                $quantity += $details['quantity'];
                $total += $details['saleing_price'] * $details['quantity'];
            }
        }
//        dd($total);
        $order = array(
            'user_id'=>$user_id,
            'name' => $name,
            'address' => $data['address'],
            'address2' => $data['address2'],
            'city' => $data['city'],
            'country_id' => $data['country_id'],
            'postal_code'=>$data['postal_code'],
            'total_amount'=>$total,
            'total_quantity'=>$quantity
        );
        $Order = Order::create($order);
        $order_id = $Order->id;
//        dd($order_id);
        if(session('cart') != null) {
            foreach (session('cart') as $key => $value) {
                $order_item = array(
                    'order_id' => $order_id,
                    'product_id' => $key,
                    'quantity' => $value['quantity'],
                    'price' => $value['saleing_price']
                );
                Order_item::create($order_item);
                $cart = session()->get('cart');
                $cart[$key]['order_id'] = $order_id;
                session()->put('cart', $cart);
            }
        }
        if(session('cart2') != null) {
            foreach (session('cart2') as $key => $value) {
                $order_item = array(
                    'order_id' => $order_id,
                    'product_id' => $key,
                    'quantity' => $value['quantity'],
                    'price' => $value['saleing_price']
                );
                Order_item::create($order_item);
                $cart = session()->get('cart2');
                $cart[$key]['order_id'] = $order_id;
                session()->put('cart2', $cart);
            }
        }
//        dd(session('cart'));
    }
    public function store(Request $request){

//        $user_id = Auth::user()->id;
        if(session('cart') != null){
            foreach (session('cart') as $key=>$value){
                $order_id = $value['order_id'];
            }
        }
        if(session('cart2') != null) {
            foreach (session('cart2') as $key => $value) {
                $order_id = $value['order_id'];
            }
        }
        $posted_data = $request->all();
        $validator = Validator::make($posted_data, array(
            'name' => 'required|min:3',
            'email' => 'required',
            'mobile' => 'required',
            'amount' => 'required'
        ), array(
            'name.required' => 'Enter your name.',
            'name.min' => 'Name must be min of 3 characters.',
            'email.required' => 'Enter your email address.',
            'mobile.required' => 'Enter your mobile number.',
            'amount.required' => 'Enter your amount.'
        ));

        if ($validator->fails()) {
            return redirect()->back()->withInput($request->only('name', 'email', 'mobile', 'amount'))->withErrors($validator->errors());
        }
        try {
            $instamojo = config('services.instamojo');
//                dd($instamojo);
            $payload = array(
                "purpose" => "IMORDER" . Str::random(9),
                "amount" => $request->amount,
                "buyer_name" => $request->name,
                "email" => $request->email,
                "phone" => $request->mobile,
                "send_email" => true,
                "send_sms" => true,
                "redirect_url" => url('/success')
            );
//            dd($payload);
//                dd($instamojo['endpoint']);
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $instamojo['endpoint'].'payment-requests/');
            curl_setopt($ch, CURLOPT_HEADER, FALSE);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                "X-Api-Key:".$instamojo['api_key'],
                "X-Auth-Token:".$instamojo['auth_token']
            ));
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
            $response = curl_exec($ch);
            curl_close($ch);

            $response = json_decode($response, true);
            if ($response['success'] == 1) {
                $payment_request = $response['payment_request'];
//                dd($payment_request);
//                Payment::insert([
//
//                    'amount' => $payment_request['amount'],
//                    'payment_request_id' => $payment_request['id'],
//                    'payment_link' => $payment_request['longurl'],
//                    'payment_status' => $payment_request['status'],
//                    'created_at' => now(),
//                    'updated_at' => now()
//                ]);
                Payment::insert([
                    'order_id' => $order_id,
                    'name' => $payment_request['buyer_name'],
                    'email' => $payment_request['email'],
                    'mobile' => $payment_request['phone'],
                    'amount' => $payment_request['amount'],
                    'payment_request_id' => $payment_request['id'],
                    'payment_link' => $payment_request['longurl'],
                    'payment_status' => $payment_request['status'],
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
                header('Location: ' . $payment_request['longurl']);
                exit();
            } else {
                echo "<pre>";
                print_r($response);
                exit;
            }
        }catch (Exception $e) {
            echo "<pre>";
            print('Error: ' . $e->getMessage());
            exit;
        }
    }
    public function success(Request $request)
    {
        $request_data = $request->all();
//        dd($request_data);
        $payment_id = $request_data['payment_id'];
        $payment_status = $request_data['payment_status'];
        $payment_request_id = $request_data['payment_request_id'];

        $im_payment = Payment::where('payment_request_id', $payment_request_id)->first();

        if ($payment_status == 'Credit') {
            $im_payment->payment_status = $payment_status;
            $im_payment->payment_id = $payment_id;
            $im_payment->save();
            Session::forget('cart');
            Session::forget('cart2');
            return redirect()->route('shop');
//            dd('Payment Successful');
        } else {
            return redirect()->route('checkout2');
        }
//        dd($request_data);
    }
    public function payment(){
        return view('checkout.finalPayment');
    }
}
