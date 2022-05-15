<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\backend\Product;
use App\Models\backend\ProductPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ProductController extends Controller
{
    public function ProductView()
    {
        return view('product.product');
    }
    public function createProduct(Request $request){
        $category = Category::where('parent_id', 0)->orderby('name', 'asc')->get();
        if($request->method()=='GET')
        {
            return view('product.addProduct', compact('category'));
        }
        if($request->method()=='POST') {
//        return "hello";
            $input = $request->all();
            $validator = $request->validate([
                'product_name' => 'required',
                'decription' => 'required',
                'mrp_price' => 'numeric|required',
                'saleing_price' => 'numeric|required',
                'category_id' => 'numeric|required',
                'subcategory_id' => 'numeric|required',
                'photos'=>'required'
            ]);
            $product=Product::create($input);
            $product_id = $product->id;
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
                            ProductPhoto::create([
                                'product_id' => $product_id,
                                'image' => $imageName
                            ]);
//                        return $imageName;
                        }
//                        dd($imageName);
//                    echo "Upload Successfully";
                        return redirect()->back()->with('success', 'Product has been created successfully.');
                    }
                    else
                    {
                        return redirect()->back()->with('error', 'Product not uploaded.');
                    }
                }
            }
//            dd($product_id);
//            return redirect()->back()->with('success', 'Product has been created successfully.');
        }
    }
    public function getSubcategory(Request $request){
        $subcatgory = Category::where('parent_id', $request['id'])->orderby('name', 'asc')->get();
        return $subcatgory;
    }
    public function getproduct(Request $request){
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
        $totalRecords = Product::select('count(*) as allcount')->count();
        $totalRecordswithFilter = Product::select('count(*) as allcount')->where('product_name', 'like', '%' .$searchValue . '%')->count();

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
    public function deleteProductImage(Request $request){
//        return $request;
        $data = ProductPhoto::where('id',$request['id'])->delete();

        if($data){
            $response = "Product deleted";
        }else{
            $response = "Product not deleted";
        }
        return response()->json($response);
    }
    public function deleteProduct(Request $request){
        ProductPhoto::where('product_id',$request['id'])->delete();
        $data = Product::where('id',$request['id'])->delete();

        if($data){
            $response = "Product deleted";
        }else{
            $response = "Product not deleted";
        }
        return response()->json($response);
    }

    public function editProduct($id){
//        echo $id;
        $category = Category::where('parent_id', 0)->orderby('name', 'asc')->get();
        $product = Product::where('id',$id)->first();
        $product_image = ProductPhoto::where('product_id',$id)->get();
        return view('product.editProduct',compact('category','product','product_image'));
//        return response()->json($product);
    }
    public function updateProduct(Request $request){
//        return "hello";
        $validator = $request->validate([
            'product_name' => 'required',
            'decription' => 'required',
            'mrp_price' => 'numeric|required',
            'saleing_price' => 'numeric|required',
            'category_id' => 'numeric|required',
            'subcategory_id' => 'numeric|required'
        ]);
        $input2 = array(
            'product_name' => $request['product_name'],
            'decription' => $request['decription'],
            'mrp_price' => $request['mrp_price'],
            'saleing_price' => $request['saleing_price'],
            'category_id' => $request['category_id'],
            'subcategory_id' => $request['subcategory_id']
        );

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
                    Product::where('id',$request['id'])->update($input2);
                    $i = 0;
                    foreach ($request->photos as $photo) {
                        $imageName = ++$i.time().'.'.$photo->extension();
                        $photo->move(public_path('images'),$imageName);
                        ProductPhoto::create([
                            'product_id' => $request['id'],
                            'image' => $imageName
                        ]);
//                        return $imageName;
                    }
//                        dd($imageName);
//                    echo "Upload Successfully";
                    return redirect()->back()->with('success', 'Product has been updated successfully.');
                }
                else
                {
                    return redirect()->back()->with('error', 'Product has been not updated.');
                }
            }
        }else{
            Product::where('id',$request['id'])->update($input2);
            return redirect()->back()->with('success', 'Product has been updated successfully.');
        }

    }
}
