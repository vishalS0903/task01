
@extends('layouts.master')
@section('content')
@section('page')
Product Table
@endsection
<div class="container">
    <div class="row">

      <div class="col-12">
        @if(session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('message') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

    @endif
        {{-- <a href="{{route('product.create')}}">  <button class="btn btn-success">Add Product</button></a> --}}

<div class="card">

    <div class="card-header">

      <h3 class="card-title">DataTable with minimal features & hover style</h3>
      <div class="text-right">
        <a href="{{route('product.create')}}">  <button class="btn btn-success">Add Product</button></a>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="myTable" class="table table-bordered table-hover">
        <thead>

            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Image</th>
                <th>Category</th>
                <th>Brand</th>
                <th>Color</th>
                <th>Size</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>User</th>
                <th>Action</th>
            </tr>

        </thead>
        <tbody>
            @foreach ($product as $p)


            <tr>
              <td>{{$p->id}}</td>
              <td>{{$p->name}}</td>
              {{-- <td>{{$p->description}}</td> --}}
              <td>{!! Str::words($p->description, 5, ' ...') !!}</td>


              <td>
                  <img src="{{asset('uploads_image/'.$p->image)}}" width="100px" height="100px">
              </td>
              {{-- @dd($p->category) --}}
              <td>{{$p->category->name}}</td>
              <td>{{$p->brand->name}}</td>
              <td>{{$p->color->name}}</td>
              <td>{{$p->size}}</td>
              <td>{{$p->price}}</td>
              <td>{{$p->quantity}}</td>
              <td>{{$p->user->name}}</td>



              <td><a href="{{route('product.edit',$p->id)}}"><button type="button" class="btn btn-primary">Edit</button></a>
                  <a href="{{route('product.delete',$p->id)}}"> <button type="button" class="btn btn-danger">delete</button></td></a>


            </tr>
            @endforeach


        </tbody>

      </table>
    </div>
    <!-- /.card-body -->
  </div>
</div>
    </div>
</div>
@endsection
