<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function create(){
        $product=Category::all();
        return view('product.create',compact('product'));
        }

        public function store(Request $request){
            $validatedData = $request->validate([
                'name' => 'required',
                'description' => 'required',
                'image' => 'required',
                'category_id' => 'required',

            ], [
                'name.required' => 'Name is required',
                'description.required' => 'Description is required',
                'image.required' => 'Image is required',
                'category_id.required' => 'category_id is required'
            ]);

            $product= new Product();
            $product->name = $request->name ;
            $product-> description =$request->description;

            if($request->hasFile('image')){
                $file = $request->file('image');
                $extention = $file->getClientOriginalExtension();
                $filename = time().'.'.$extention;
                $file->move('uploads_image',$filename);
                $product->image = $filename;

            }
            $product->category_id = $request->category_id ;

            $product-> save();

            return redirect()->route('product.table')->with('message', 'Data Added Successfully!');

        }
        public function index(){
            $product=Product::with('category')->get();
            // @dd($product);
            return view('product.index',compact('product'));
        }
        public function edit($id){
            $data=Category::all();

            $product=Product::with('category')->find($id);
            // @dd($product);
            return view('product.edit',compact('product','data'));
        }
        public function update(Request $request,$id){

            $product=Product::find($id);

            $product->name = $request->name ;
            $product-> description =$request->description;

            if($request->hasFile('image')){
                $file = $request->file('image');
                $extention = $file->getClientOriginalExtension();
                $filename = time().'.'.$extention;
                $file->move('uploads_image',$filename);
                $product->image = $filename;

            }
            $product->category_id = $request->category_id ;
            $product->save();
            return redirect()->route('product.table')->with('message', 'Data Updated Successfully!');

        }
        public function delete($id){
            $product=Product::find($id);
            $product->delete();
            return redirect()->route('product.table')->with('message', 'Data Removed Successfully!');

        }

}
