<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function createItem(Request $request)
    {
        $categories = Item::where('parent_id', 0)->orderby('name', 'asc')->get();
        if($request->method()=='GET')
        {
            return view('create-item', compact('categories'));
        }
        if($request->method()=='POST')
        {
            $validator = $request->validate([
                'name'      => 'required',
//                'slug'      => 'required|unique:categories',
                'parent_id' => 'nullable|numeric'
            ]);

            Item::create([
                'name' => $request->name,
//                'slug' => $request->slug,
                'parent_id' =>$request->parent_id
            ]);

            return redirect()->back()->with('success', 'Item has been created successfully.');
        }
    }
}
