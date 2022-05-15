<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\backend\Product;
use App\Models\Product_size;
use App\Models\Woman_product;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Item;
use Illuminate\Support\Facades\DB;

class DasboardController extends Controller
{
    public function wishlistView(){
        $catArr = $this->getCat();
        $itemArr = $this->menuBar();
        $product = $this->getProduct();
        $womanProduct = $this->getWomanProduct();

        return view('wishlist',compact('itemArr','catArr','product','womanProduct'));
    }
//    public function cartView(){
//        $catArr = $this->getCat();
//        $itemArr = $this->menuBar();
//        return view('cart',compact('itemArr','catArr'));
//    }
    public function shopView(){
        $catArr = $this->getCat();
        $itemArr = $this->menuBar();
        $product = $this->getProduct();
//        $image = ProductPhoto::get();
        return view('shop.shop',compact('itemArr','catArr','product'));
    }
    public function index()
    {
        $catArr = $this->getCat();
        $itemArr = $this->menuBar();
        $product = $this->getProduct();
//        dd($product);
        return view('dashboard',compact('itemArr','catArr','product'));
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
            ->get();
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
}
