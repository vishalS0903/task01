@extends('layouts.master')
@section('content')
@section('page')
Add Product
@endsection

<script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>

<div class="container">
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Add Product</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
      <div class="card-body">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
            @if ($errors->has('name'))
            <span class="text-danger">{{ $errors->first('name') }}</span>
        @endif
          </div>
          <div class="form-group">
            <label for="name">Description:</label>
            <textarea name="description" id="body" cols="30" rows="10" class="form-control"></textarea>
            @if ($errors->has('description'))
            <span class="text-danger">{{ $errors->first('description') }}</span>
        @endif
         </div>
            <div class="form-group">
                <label for="image">Image</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file"  name="image" class="custom-file-input" id="exampleInputFile">
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
                <label for="title">select Category</label>
                <select name="category_id" select id="category" class="form-control" >
                    <option value="{{old('category_id')}}" class="option_color">Select Category</option>
                    @foreach ($product as $c)
                    <option value="{{$c->id}}">{{$c->name}}</option>

                    @endforeach
                </select>

              </div>
              @if ($errors->has('category_id'))
              <span class="text-danger">{{ $errors->first('category_id') }}</span>
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