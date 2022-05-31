<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\backend\Product;
use App\Models\Category;
use App\Models\Features;
use App\Models\Item;
use App\Models\Product_size;
use App\Models\Woman_product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
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
    public function getWomanProduct(){
        $product = Woman_product::select(
            'woman_products.id',
            'woman_products.product_name',
            'woman_products.decription',
            'woman_products.mrp_price',
            'woman_products.saleing_price',
            "c.name as category_name",
            "sc.name as subcategory_name",
            DB::raw('group_concat(p.image) as image_name')
        )
            ->leftJoin("categories as c", "c.id", "=", "woman_products.category_id")
            ->leftJoin("categories as sc", "sc.id", "=", "woman_products.subcategory_id")
            ->leftJoin("woman_product_images as p", "p.product_id", "=", "woman_products.id")->groupby('woman_products.id')
            ->paginate(8);
        return $product;
    }
    public function getProduct(){
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
        ->leftJoin("categories as c", "c.id", "=", "products.category_id")
        ->leftJoin("categories as sc", "sc.id", "=", "products.subcategory_id")
        ->leftJoin("product_photos as p", "p.product_id", "=", "products.id")->groupby('products.id')
        ->get();
    return $product;
}
    public function shopView(){
        $catArr = $this->getCat();
        $itemArr = $this->menuBar();
        $product = $this->getProduct();
//        $image = ProductPhoto::get();
        return view('shop.shop',compact('itemArr','catArr','product'));
    }
    public function shopView2(){
        $catArr = $this->getCat();
        $itemArr = $this->menuBar();
        $product = $this->getWomanProduct();
//        $image = ProductPhoto::get();
        return view('shop.shop2',compact('itemArr','catArr','product'));
    }
    public function productDetails($id){
//        return $id;
        $catArr = $this->getCat();
        $itemArr = $this->menuBar();
        $product = Woman_product::select(
            'woman_products.id',
            'woman_products.product_name',
            'woman_products.decription',
            'woman_products.mrp_price',
            'woman_products.saleing_price',
            'b.brand_name as brand_name',
            "c.name as category_name",
            "sc.name as subcategory_name",
            DB::raw('group_concat(p.image) as image_name')
        )
            ->where('woman_products.id',$id)
            ->leftJoin("categories as c", "c.id", "=", "woman_products.category_id")
            ->leftJoin("categories as sc", "sc.id", "=", "woman_products.subcategory_id")
            ->leftJoin("brands as b", "b.id", "=", "woman_products.brand_id")
            ->leftJoin("woman_product_images as p", "p.product_id", "=", "woman_products.id")->groupby('woman_products.id')
            ->get();
//        dd($product);
        $size = Product_size::select(
            'product_sizes.id',
            's.size as size'
        )
            ->where('product_id',$id)
            ->leftJoin("sizes as s", "s.id", "=", "product_sizes.size_id")->orderby('id')
            ->get();
//        dd($size);
        $feature = Features::where('product_id',$id)->get();
//        dd($feature);
        return view('shop.productDetails',compact('product','size','feature','itemArr','catArr'));
    }
    public function addToCart2($id)
    {
//        $product = Product::findOrFail($id);
//        dd($id);
        $product = Woman_product::select(
            'woman_products.id',
            'woman_products.product_name',
            'woman_products.decription',
            'woman_products.mrp_price',
            'woman_products.saleing_price',
            "c.name as category_name",
            "sc.name as subcategory_name",
            DB::raw('group_concat(wp.image) as image_name')
        )
            ->where('woman_products.id',$id)
            ->leftJoin("categories as c", "c.id", "=", "woman_products.category_id")
            ->leftJoin("categories as sc", "sc.id", "=", "woman_products.subcategory_id")
            ->leftJoin("woman_product_images as wp", "wp.product_id", "=", "woman_products.id")->groupby('woman_products.id')
            ->get();
//        dd($product);
        $cart2 = session()->get('cart2', []);
//        dd($product[0]->image_name);

        if(isset($cart2[$id])) {
            $cart2[$id]['quantity']++;
        } else {
            $cart2[$id] = [
                "name" => $product[0]->product_name,
                "quantity" => 1,
                "mrp_price" => $product[0]->mrp_price,
                "saleing_price" => $product[0]->saleing_price,
                "image" => $product[0]->image_name
            ];
        }
        session()->put('cart2', $cart2);

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }
    public function update2(Request $request)
    {
//        return $request;
        if($request->id && $request->quantity){
            $cart = session()->get('cart2');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart2', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }
    public function remove2(Request $request)
    {
//        return $request;
        if($request->id) {
            $cart = session()->get('cart2');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart2', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }
}
