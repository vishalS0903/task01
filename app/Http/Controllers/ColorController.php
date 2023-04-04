<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Color;

class ColorController extends Controller
{
    public function create()
    {
        $data = User::all();
        $product = Product::all();
        // dd($product);
        return view('Color.create',compact('data','product'));
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
        $product= new Color();
        $product->name=$request->name;
        $product->user_id=$request->user_id;
        $product->product_id=$request->product_id;
        $product->save();
        return redirect()->route('color.table')->with('message', 'Data Added Successfully!');

    }
    public function index()
    {
        $colors = Color::all();
        // dd($colors);

        return view('Color.index',compact('colors'));
    }

    public function edit($id){
        $data = User::all();
        $product = Product::all();
        $products = Color::find($id);
        return view('Color.edit',compact('data','products','product'));
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
        $product = Color::find($id);
        $product->name=$request->name;
        $product->user_id=$request->user_id;
        $product->product_id=$request->product_id;
        $product->save();
        return redirect()->route('color.table')->with('message', 'Data Updated Successfully!');


    }
    public function delete($id){
        $data = Color::find($id);
        $data->delete();
        return redirect()->route('color.table')->with('message', 'Data Removed Successfully!');

    }
}
