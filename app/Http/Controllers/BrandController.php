<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;
use App\Models\User;
use App\Models\Color;

class BrandController extends Controller
{
    public function create()
    {
        $data = User::all();
        $product = Product::all();
        // dd($product);
        return view('Brand.create',compact('data','product'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'user_id' => 'required',
            'product_id' => 'required',

        ], [
            'name.required' => 'Name is required',
            'user_id.required' => 'User_ID is required',
            'product_id.required' => 'Product_ID is required'
        ]);
        $product= new Brand();
        $product->name=$request->name;
        $product->user_id=$request->user_id;
        $product->product_id=$request->product_id;
        $product->save();
        return redirect()->route('brand.table')->with('message', 'Data Added Successfully!');

    }
    public function index()
    {
        $product = Brand::all();
        // dd($product);
        return view('Brand.index',compact('product'));
    }

    public function edit($id){
        $data = User::all();
        $product = Product::all();
        $products = Brand::find($id);
        return view('Brand.edit',compact('data','products','product'));
    }
    public function update(Request $request,$id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'user_id' => 'required',
            'product_id' => 'required',

        ], [
            'name.required' => 'Name is required',
            'user_id.required' => 'User_ID is required',
            'product_id.required' => 'Product_ID is required'
        ]);
        $product = Brand::find($id);
        $product->name=$request->name;
        $product->user_id=$request->user_id;
        $product->product_id=$request->product_id;
        $product->save();
        return redirect()->route('brand.table')->with('message', 'Data Updated Successfully!');


    }
    public function delete($id){
        $data = Brand::find($id);
        $data->delete();
        return redirect()->route('brand.table')->with('message', 'Data Removed Successfully!');

    }
}
