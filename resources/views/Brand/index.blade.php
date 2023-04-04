
@extends('layouts.master')
@section('content')
@section('page')
Brand Table
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
        {{-- <div class="align-items-end">
        <a href="{{route('product.create')}}">  <button class="btn btn-success">Add Product</button></a>
        </div> --}}
<div class="card">


    <div class="card-header">

      <h3 class="card-title">DataTable with minimal features & hover style</h3>
      <div class="text-right">
        <a href="{{route('brand.create')}}">  <button class="btn btn-success">Add Brand</button></a>
        </div>
    </div>

    <!-- /.card-header -->
    <div class="card-body">
      <table id="myTable" class="table table-bordered table-hover">
        <thead>

            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>User ID</th>
                <th>Product ID</th>

                <th>Action</th>
            </tr>

        </thead>
        <tbody>
            @foreach ($product as $p)

           <tr>
              <td>{{$p->id}}</td>
              <td>{{$p->name}}</td>
              <td>{{$p->user->name}}</td>
              <td>{{$p->product->name}}</td>
              <td>
                <a href="{{route('brand.edit',$p->id)}}"><button type="button" class="btn btn-primary">Edit</button></a>
                <a href="{{route('brand.delete',$p->id)}}"> <button type="button" class="btn btn-danger">delete</button></a>
              </td>

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
+
