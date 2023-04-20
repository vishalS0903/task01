@extends('layouts.master')
@section('content')
@section('page')
Edit Product
@endsection

<script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>

<div class="container">
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Edit Product</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{route('product.update',$product->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
      <div class="card-body">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" value="{{$product->name}}">
            @if ($errors->has('name'))
            <span class="text-danger">{{ $errors->first('name') }}</span>
        @endif
          </div>
          <div class="form-group">
            <label for="name">Description:</label>
            <textarea name="description" id="body" cols="30" rows="10" class="form-control">{{$product->description}}</textarea>
            @if ($errors->has('description'))
            <span class="text-danger">{{ $errors->first('description') }}</span>
            @endif
         </div>
         <div class="form-group">
            <label for="category_id">select Category</label>
            <select name="category_id" select id="category" class="form-control" >
                <option value="{{old('category_id')}}" class="option_color">Select Category</option>
                @foreach ($category as $category)
                 <option value="{{$category->id}}" @if($category->id==$product->category_id) selected="selected" @endif>{{$category->name}}</option>
                @endforeach
            </select>
          @if ($errors->has('category_id'))
          <span class="text-danger">{{ $errors->first('category_id') }}</span>
          @endif
         </div>
         <div class="form-group">
            <label for="brand_id">select Brand</label>
            <select name="brand_id" select id="brand" class="form-control" >
                <option value="{{old('brand_id')}}" class="option_color">Select Brand</option>
                @foreach ($brand as $c)
                <option value="{{$c->id}}" @if($c->id==$product->brand_id) selected="selected" @endif>{{$c->name}}</option>
                @endforeach
            </select>
          @if ($errors->has('brand_id'))
          <span class="text-danger">{{ $errors->first('brand_id') }}</span>
          @endif
         </div>

         <div class="form-group">
            <label for="size">select size:</label>
            <select name="size" select id="size" class="form-control" >
                <option value="{{old('size')}}" class="option_color">Select size</option>
                <option value="M" @if ($product->size=="M") selected='selected' @endif>M</option>
                <option value="S" @if ($product->size=="S") selected='selected' @endif>S</option>
                <option value="L" @if ($product->size=="L") selected='selected' @endif>L</option>
                <option value="XL" @if ($product->size=="XL") selected='selected' @endif>XL</option>
                <option value="XXL" @if ($product->size=="XXL") selected='selected' @endif>XXL</option>

            </select>
          @if ($errors->has('size'))
          <span class="text-danger">{{ $errors->first('size') }}</span>
          @endif
         </div>

         <div class="form-group">
            <label for="color_id">select Color:</label>
            <select name="color_id" select id="color_id" class="form-control" >
                <option value="{{old('color_id')}}" class="option_color">Select Color</option>
                @foreach ($color as $c)
                <option value="{{$c->id}}" @if($c->id==$product->color_id) selected="selected" @endif>{{$c->name}}</option>
                 @endforeach
            </select>
          @if ($errors->has('color_id'))
          <span class="text-danger">{{ $errors->first('color_id') }}</span>
          @endif
         </div>
         <div class="form-group">
            <label for="price">Price:</label>
            <input type="number" class="form-control" id="price" placeholder="Enter price" name="price" value="{{$product->price}}">
            @if ($errors->has('price'))
            <span class="text-danger">{{ $errors->first('price') }}</span>
        @endif
        <div class="form-group">
            <label for="quantity">Total Quantity:</label>
            <select name="quantity" select id="quantity" class="form-control" >
                <option value="{{old('quantity')}}" class="option_color">Select Quantity</option>
                <option value="1" @if ($product->quantity==1) selected='selected' @endif>1</option>
                <option value="2" @if ($product->quantity==2) selected='selected' @endif>2</option>
                <option value="3" @if ($product->quantity==3) selected='selected' @endif>3</option>
                <option value="4" @if ($product->quantity==4) selected='selected' @endif>4</option>
            </select>
          @if ($errors->has('quantity'))
          <span class="text-danger">{{ $errors->first('quantity') }}</span>
          @endif
         </div>

            <div class="form-group">
                <label for="image">Image</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file"  name="image" class="custom-file-input" id="exampleInputFile">3
                    
                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                  </div>
                  <div class="input-group-append">
                    <span class="input-group-text">Upload</span>
                  </div>
                </div>
                @if ($errors->has('image'))
                <span class="text-danger">{{ $errors->first('image') }}</span>
            @endif
              </div>
              <div class="form-group">
                <label for="user_id">User Name:</label>
                <select name="user_id" select id="user_id" class="form-control" >
                    <option value="{{old('user_id')}}" class="option_color">Select User_id</option>
                    @foreach ($user as $c)
                    <option value="{{$c->id}}" @if($c->id==$product->user_id) selected="selected" @endif>{{$c->name}}</option>
                    @endforeach
                </select>
              @if ($errors->has('user_id'))
              <span class="text-danger">{{ $errors->first('user_id') }}</span>
              @endif
             </div>


      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>

    </form>
  </div>
</div>
<script>
    ClassicEditor
        .create(document.querySelector('#body'))
        .catch(error => {
            console.error(error);
        });
</script>
@endsection
