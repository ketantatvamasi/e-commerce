<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Features;
use App\Models\Product_size;
use App\Models\Size;
use App\Models\Woman_product;
use App\Models\Woman_product_image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WomanProductController extends Controller
{

    public function WomanProductView()
    {
        return view('product.woman_product');
    }
    public function getWomanProduct(Request $request){
        ## Read value
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
        $totalRecords = Woman_product::select('count(*) as allcount')->count();
        $totalRecordswithFilter = Woman_product::select('count(*) as allcount')->where('product_name', 'like', '%' .$searchValue . '%')->count();

        $product = Woman_product::select(
            'woman_products.id',
            'woman_products.product_name',
            'woman_products.decription',
            'woman_products.mrp_price',
            'woman_products.saleing_price',
            "c.name as category_name",
            "sc.name as subcategory_name",

//            DB::raw('group_concat(s.size) as size'),

            DB::raw('group_concat(p.image) as image_name')
        )
            ->leftJoin("categories as c", "c.id", "=", "woman_products.category_id")
            ->leftJoin("categories as sc", "sc.id", "=", "woman_products.subcategory_id")
//            ->leftJoin("product_sizes as ps","ps.product_id","=","woman_products.id")
//            ->leftJoin("sizes as s","s.id",'=',"ps.size_id")
            ->leftJoin("woman_product_images as p", "p.product_id", "=", "woman_products.id")
            ->groupby('woman_products.id')
            ->get();
//        dd($product);
        $data_arr = array();

        foreach($product as $record){
            $id = $record->id;
            $product_name = $record->product_name;
            $decription = $record->decription;
            $mrp_price = $record->mrp_price;
            $saleing_price = $record->saleing_price;
            $category_name = $record->category_name;
            $subcategory_name = $record->subcategory_name;
            $image_name = $record->image_name;

            $data_arr[] = array(
                "id" => $id,
                "product_name" => $product_name,
                "decription" => $decription,
                "mrp_price" => $mrp_price,
                "saleing_price" => $saleing_price,
                "category_name" => $category_name,
                "subcategory_name" => $subcategory_name,
                "image_name" => $image_name
            );
        }

        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordswithFilter,
            "aaData" => $data_arr
        );

        return response()->json($response);
    }
    public function deleteWomanProduct(Request $request){
        Product_size::where('product_id',$request['id'])->delete();
        Woman_product_image::where('product_id',$request['id'])->delete();
        Features::where('product_id',$request['id'])->delete();
        $data = Woman_product::where('id',$request['id'])->delete();

        if($data){
            $response = "Product deleted";
        }else{
            $response = "Product not deleted";
        }
        return response()->json($response);
    }
    public function createWomanProduct(Request $request){
        $category = Category::where('parent_id', 0)->orderby('name', 'asc')->get();
        $brand = Brand::get();
        $size = Size::get();
        if($request->method()=='GET')
        {
            return view('product.addwoman_product',compact('category','brand','size'));
        }
        if($request->method()=='POST') {
//            return $request->data;
            $input = array(
                'product_name'=> $request->product_name,
                'decription'=> $request->decription,
                'mrp_price'=> $request->mrp_price,
                'saleing_price'=> $request->saleing_price,
                'category_id'=> $request->category_id,
                'subcategory_id'=> $request->subcategory_id,
                'brand_id'=> $request->brand_id,
            );
//            return $data;
//            dd($input);
            $womanproduct=Woman_product::create($input);
            $product_id = $womanproduct->id;

            foreach ($request->size as $size){
//                dd($size);
                Product_size::create([
                    'product_id' => $product_id,
                    'size_id' => $size
                ]);
            }
            foreach ($request->data as $value){
                Features::create([
                    'product_id'=>$product_id,
                    'name'=>$value['name'],
                    'value'=>$value['value'],
                ]);
            }
            if($request->hasFile('photos'))
            {
                $allowedfileExtension=['pdf','jpg','png','docx'];
                $files = $request->file('photos');
//                dd($files);
                foreach($files as $file){
                    $filename = $file->getClientOriginalName();
                    $extension = $file->getClientOriginalExtension();
                    $check=in_array($extension,$allowedfileExtension);
//                dd($check);
                    if($check)
                    {
//                        dd($request->photos);
                        $i = 0;
                        foreach ($request->photos as $photo) {
                            $imageName = ++$i.time().'.'.$photo->extension();
                            $photo->move(public_path('images'),$imageName);
                            Woman_product_image::create([
                                'product_id' => $product_id,
                                'image' => $imageName
                            ]);
//                        return $imageName;
                        }
//                        dd($imageName);
//                    echo "Upload Successfully";
                        return redirect()->route('WomanProductView');
                    }
                    else
                    {
                        return redirect()->back()->with('error', 'Product not uploaded.');
                    }
                }
            }
        }
    }
    public function editWomanProduct($id){
        $category = Category::where('parent_id', 0)->orderby('name', 'asc')->get();
        $brand = Brand::get();
        $product = Woman_product::where('id',$id)->first();
        $product_image = Woman_product_image::where('product_id',$id)->get();
        $size = Size::get();
        $product_size = Product_size::where('product_id',$id)->get()->toArray();
//        echo "<pre>";
//        print_r($product_size);
        $size_id = array_column($product_size, 'size_id');
//        print_r($size_id);
//        die();
//        dd($data);

        $feature = Features::where('product_id',$id)->get();
//        dd($feature);
        return view('product.editWomanProduct',compact('category','product','product_image','brand','size','size_id','feature'));
    }
    public function updateWomanProduct(Request $request){
//        return $request;
        $input2 = array(
            'product_name' => $request['product_name'],
            'decription' => $request['decription'],
            'mrp_price' => $request['mrp_price'],
            'saleing_price' => $request['saleing_price'],
            'category_id' => $request['category_id'],
            'subcategory_id' => $request['subcategory_id']
        );
        Product_size::where('product_id',$request['id'])->delete();
        Features::where('product_id',$request['id'])->delete();
        foreach ($request->size as $size){
//                dd($size);
            Product_size::create([
                'product_id' => $request['id'],
                'size_id' => $size
            ]);
        }
        foreach ($request->data as $value){
            Features::create([
                'product_id'=>$request['id'],
                'name'=>$value['name'],
                'value'=>$value['value'],
            ]);
        }
        if($request->hasFile('photos')) {
            $allowedfileExtension=['pdf','jpg','png','docx'];
            $files = $request->file('photos');
//                dd($files);
            foreach($files as $file){
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $check=in_array($extension,$allowedfileExtension);
//                dd($check);
                if($check)
                {
                    Woman_product::where('id',$request['id'])->update($input2);
                    $i = 0;
                    foreach ($request->photos as $photo) {
                        $imageName = ++$i.time().'.'.$photo->extension();
                        $photo->move(public_path('images'),$imageName);
                        Woman_product_image::create([
                            'product_id' => $request['id'],
                            'image' => $imageName
                        ]);
//                        return $imageName;
                    }
//                        dd($imageName);
//                    echo "Upload Successfully";
//                    return redirect()->back()->with('success', 'Product has been updated successfully.');
                    return redirect()->route('WomanProductView');
                }
                else
                {
                    return redirect()->route('WomanProductView');
                }
            }
        }else{
            Woman_product::where('id',$request['id'])->update($input2);
            return redirect()->route('WomanProductView');
        }
    }
    public function deleteWomanProductImage(Request $request){
//        return $request;
        $data = Woman_product_image::where('id',$request['id'])->delete();

        if($data){
            $response = "Product deleted";
        }else{
            $response = "Product not deleted";
        }
        return response()->json($response);
    }
}
