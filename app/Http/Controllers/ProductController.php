<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Color;
use App\Models\User;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function create(){
        $category=Category::all();
        $color=Color::all();
        $brand=Brand::all();
        $user=User::all();
        // dd($user);
        return view('product.create',compact('category','color','brand','user'));
        }

        public function store(Request $request){
            $validatedData = $request->validate([
                'name' => 'required',
                'description' => 'required',
                'image' => 'required',
                'category_id' => 'required',
                'brand_id' => 'required',
                'size' => 'required',
                'color_id' => 'required',
                'price' => 'required',
                'quantity' => 'required',
                'user_id' => 'required',

            ], [
                'name.required' => 'Name is required',
                'description.required' => 'Description is required',
                'image.required' => 'Image is required',
                'category_id.required' => 'category_id is required',
                'brand_id.required' => 'brand_id is required',
                'size.required' => 'size is required',
                'color_id.required' => 'color_id is required',
                'price.required' => 'price is required',
                'quantity.required' => 'quantity is required',
                'user_id.required' => 'user_id is required',
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
            $product->brand_id = $request->brand_id ;
            $product->size = $request->size ;
            $product->color_id = $request->color_id ;
            $product->price = $request->price ;
            $product->quantity = $request->quantity ;
            $product->user_id = $request->user_id ;


            $product-> save();

            return redirect()->route('product.table')->with('message', 'Data Added Successfully!');

        }
        public function index(){
            $product=Product::with('category')->get();
            // @dd($product);
            return view('product.index',compact('product'));
        }
        public function edit($id){
            $category=Category::all();
            $color=Color::all();
            $brand=Brand::all();
            $user=User::all();
            $product=Product::with('category','color','brand','user')->find($id);
            // @dd($product);
            return view('product.edit',compact('product','category','brand','color','user'));
        }
        public function update(Request $request,$id){
            $validatedData = $request->validate([
                'name' => 'required',
                'description' => 'required',
                // 'image' => 'required',
                'category_id' => 'required',
                'brand_id' => 'required',
                'size' => 'required',
                'color_id' => 'required',
                'price' => 'required',
                'quantity' => 'required',
                'user_id' => 'required',

            ], [
                'name.required' => 'Name is required',
                'description.required' => 'Description is required',
                // 'image.required' => 'Image is required',
                'category_id.required' => 'category_id is required',
                'brand_id.required' => 'brand_id is required',
                'size.required' => 'size is required',
                'color_id.required' => 'color_id is required',
                'price.required' => 'price is required',
                'quantity.required' => 'quantity is required',
                'user_id.required' => 'user_id is required',
            ]);

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
            $product->brand_id = $request->brand_id ;
            $product->size = $request->size ;
            $product->color_id = $request->color_id ;
            $product->price = $request->price ;
            $product->quantity = $request->quantity ;
            $product->user_id = $request->user_id ;
  $product->save();
            return redirect()->route('product.table')->with('message', 'Data Updated Successfully!');

        }
        public function delete($id){
            $product=Product::find($id);
            $product->delete();
            return redirect()->route('product.table')->with('message', 'Data Removed Successfully!');

        }

}
