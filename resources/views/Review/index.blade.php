
@extends('layouts.master')
@section('content')
@section('page')
Review Table
@endsection
<div class="container">
    <div class="row">

      <div class="col-12">
        {{-- <a href="{{route('product.create')}}">  <button class="btn btn-success">Add Product</button></a> --}}

<div class="card">

    <div class="card-header">

      <h3 class="card-title">DataTable with minimal features & hover style</h3>
      {{-- <div class="text-right">
        <a href="{{route('product.create')}}">  <button class="btn btn-success">Add Product</button></a>
        </div> --}}
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="myTable" class="table table-bordered table-hover">
        <thead>

            <tr>
                <th>ID</th>
                <th>User Id</th>
                <th>Product Id</th>
                <th>message</th>
                <th>Rating</th>
            </tr>

        </thead>
        <tbody>
            {{-- @foreach ($product as $p)


            <tr>
              <td>{{$p->id}}</td>
              <td>{{$p->name}}</td>

              <td>{!! Str::words($p->description, 5, ' ...') !!}</td>


              <td>
                  <img src="{{asset('uploads_image/'.$p->image)}}" width="100px" height="100px">
              </td>
              <td>{{$p->category}}</td>


              <td><a href="{{route('product.edit',$p->id)}}"><button type="button" class="btn btn-primary">Edit</button></a>
                  <a href="{{route('delete',$p->id)}}"> <button type="button" class="btn btn-danger">delete</button></td></a>


            </tr>
            @endforeach --}}


        </tbody>

      </table>
    </div>
    <!-- /.card-body -->
  </div>
</div>
    </div>
</div>
@endsection
