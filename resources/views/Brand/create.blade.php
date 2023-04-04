@extends('layouts.master')
@section('content')
@section('page')
Add Brand
@endsection
<div class="container">
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Add Brand</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{route('brand.store')}}" method="POST" enctype="multipart/form-data">
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
              <label for="user_id">User Id</label>
              <select name="user_id" select id="user_id" class="form-control" >
                  <option value="" class="option_color">Select User_ID</option>
                  @foreach ($data as $d)
                  <option value="{{$d->id}}">{{$d->name}}</option>
                  @endforeach

              </select>
              @if ($errors->has('user_id'))
              <span class="text-danger">{{ $errors->first('user_id') }}</span>
          @endif
          </div>
          <div class="form-group">
            <label for="product_id">Product Id</label>
            <select name="product_id" select id="product_id" class="form-control" >
                <option value="" class="option_color">Select Product_ID</option>
                @foreach ($product as $d)
                <option value="{{$d->id}}">{{$d->name}}</option>
                @endforeach
            </select>
            @if ($errors->has('product_id'))
            <span class="text-danger">{{ $errors->first('product_id') }}</span>
        @endif
        </div>
        <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
      </div>

    </form>
  </div>
</div>

@endsection
