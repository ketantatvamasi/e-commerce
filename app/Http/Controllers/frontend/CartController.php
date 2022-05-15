<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\backend\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function addToCart($id)
    {
//        $product = Product::findOrFail($id);
        $product = Product::select(
            'products.id',
            'products.product_name',
            'products.decription',
            'products.mrp_price',
            'products.saleing_price',
            "c.name as category_name",
            "sc.name as subcategory_name",
            DB::raw('group_concat(p.image) as image_name')
        )
            ->where('products.id',$id)
            ->leftJoin("categories as c", "c.id", "=", "products.category_id")
            ->leftJoin("categories as sc", "sc.id", "=", "products.subcategory_id")
            ->leftJoin("product_photos as p", "p.product_id", "=", "products.id")->groupby('products.id')
            ->get();
        $cart = session()->get('cart', []);
//        dd($product[0]->image_name);
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product[0]->product_name,
                "quantity" => 1,
                "mrp_price" => $product[0]->mrp_price,
                "saleing_price" => $product[0]->saleing_price,
                "image" => $product[0]->image_name
            ];
        }
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function update(Request $request)
    {
//        return $request;
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }

    public function remove(Request $request)
    {
//        return $request;
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }
}
