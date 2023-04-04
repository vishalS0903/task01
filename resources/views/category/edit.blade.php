{{-- <!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>


<div class="container">
  <h2>CATEGORY  form</h2>

  <form action="{{route('update',$product->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" value={{$product->name}}>
    </div>
    <div class="form-group">
        <label for="image"> Image</label>
        <input type="file" class="form-control" name="image" value="{{old('image')??$product->image}}">
      </div>
    <div class="form-group">
        <label for="status">Status</label>
        <select name="status" select id="status" class="form-control" >
            <option value="" class="option_color">Select Status</option>
            <option value="1" @if ($product->status==1) selected='selected' @endif>Active</option>
            <option value="0"  @if ($product->status==0) selected='selected' @endif>Deactive</option>
        </select>
    </div>

    <button type="submit" class="btn btn-default">update</button>
  </form>
</div>

</body>
</html> --}}









@extends('layouts.master')
@section('content')
<div class="container">
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Edit Category</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{route('update',$product->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
      <div class="card-body">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" value={{$product->name}}>
            @if ($errors->has('name'))
            <span class="text-danger">{{ $errors->first('name') }}</span>
        @endif
          </div>
          {{-- <div class="form-group">
              <label for="image"> Image</label>
              <input type="file" class="form-control" name="image" placeholder="upload profile image">
            </div> --}}
            <div class="form-group">
                <label for="image">Image</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file"  name="image" class="custom-file-input" id="exampleInputFile" value="{{old('image')??$product->image}}">
                    <label class="custom-file-label" for="exampleInputFile">Choose file </label>
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
              <label for="status">Status</label>
              <select name="status" select id="status" class="form-control" >
                <option value="" class="option_color">Select Status</option>
                <option value="1" @if ($product->status==1) selected='selected' @endif>Active</option>
                <option value="0"  @if ($product->status==0) selected='selected' @endif>Deactive</option>
            </select>
            @if ($errors->has('status'))
                <span class="text-danger">{{ $errors->first('status') }}</span>
            @endif
          </div>


        {{-- <div class="form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1">
          <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div> --}}
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>

    </form>
  </div>
</div>
@endsection
