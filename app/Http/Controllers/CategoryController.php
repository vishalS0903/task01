<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function create()
        {
            return view('category.create');
        }

    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required',
            'status' => 'required',
            'image' => 'required',

        ], [
            'name.required' => 'Name is required',
            'status.required' => 'Status is required',
            'image.required' => 'Image is required'
        ]);

        $product= new Category();
        $product->name = $request->name ;
        $product-> status =$request->status;

        if($request->hasFile('image')){
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads_image',$filename);
            $product->image = $filename;

        }
        $product-> save();

        return redirect()->route('table')->with('message', 'Data Added Successfully!');

    }
    public function index(){
        $product=Category::all();
        // @dd($product);
        return view('category.table',compact('product'));
    }
    public function edit($id){
        $product=Category::find($id);
        // dd($product);

        return view('category.edit',compact('product'));
    }
    public function update(Request $request,$id){
        $validatedData = $request->validate([
            'name' => 'required',
            'status' => 'required',
            'image' => 'required',

        ], [
            'name.required' => 'Name is required',
            'status.required' => 'Status is required',
            'image.required' => 'Image is required'
        ]);

        $product=Category::find($id);
        $product->name = $request->name ;
        $product-> status =$request->status;
        if($request->hasFile('image')){
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads_image',$filename);
            $product->image = $filename;

        }
        $product-> save();

        return redirect()->route('table')->with('message', 'Data Updated Successfully!');

    }

    public function delete($id){

        $product=Category::find($id);
        $product->delete();
        return redirect()->route('table')->with('message', 'Data Removed Successfully!');

    }
}
