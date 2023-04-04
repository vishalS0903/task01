{{-- <!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
</head>
<body>

<div class="container">
  <h2>CATEGORY TABLE</h2>
  <button class="btn btn-success">Add Category</button><br>


  <table class="table" id="myTable">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Image</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($product as $p)


      <tr>
        <td>{{$p->id}}</td>
        <td>{{$p->name}}</td>
        <td>
            <img src="{{asset('uploads_image/'.$p->image)}}" width="100px" height="100px">
        </td>
        <td>
            @if ($p->status)
                <span class="label label-success">Active</span>
            @else
                <span class="label label-warning">Inactive</span>
            @endif

        </td>

        <td><a href="{{route('edit',$p->id)}}"><button type="button" class="btn btn-primary">Edit</button></a>
            <a href="{{route('delete',$p->id)}}"> <button type="button" class="btn btn-danger">delete</button></td></a>


      </tr>
      @endforeach

    </tbody>
  </table>
</div>
<script>
$(document).ready( function () {
    $('#myTable').DataTable({
        "searching": false,
         "paging": true,
         "pageLength":2,

    });

} );
</script>
<script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

</body>

</html> --}}


@extends('layouts.master')
@section('content')
@section('page')
Category Table
@endsection
<div class="container">
    <div class="row">

      <div class="col-12">
        {{-- <a href="{{route('category.create')}}">  <button class="btn btn-success">Add Category</button></a> <br> --}}
        @if(session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('message') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

    @endif
<div class="card">



    <div class="card-header">
      <h3 class="card-title">DataTable with minimal features & hover style</h3>
      <div class="text-right">
        <a href="{{route('category.create')}}">  <button class="btn btn-success">Add Category</button></a>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="myTable" class="table table-bordered table-hover">
        <thead>

            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Image</th>
                <th>Status</th>
                <th>Action</th>
            </tr>

        </thead>
        <tbody>
            @foreach ($product as $p)


            <tr>
              <td>{{$p->id}}</td>
              <td>{{$p->name}}</td>
              <td>
                  <img src="{{asset('uploads_image/'.$p->image)}}" width="100px" height="100px">
              </td>
              <td>
                  @if ($p->status)
                      <span class="label label-success">Active</span>
                  @else
                      <span class="label label-warning">Inactive</span>
                  @endif

              </td>

              <td><a href="{{route('edit',$p->id)}}"><button type="button" class="btn btn-primary">Edit</button></a>
                  <a href="{{route('delete',$p->id)}}"> <button type="button" class="btn btn-danger">delete</button></td></a>


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
