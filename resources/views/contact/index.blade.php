
@extends('layouts.master')
@section('content')
@section('page')
Contact Table
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
        {{-- <a href="{{route('color.create')}}">  <button class="btn btn-success">Add Color</button></a> --}}
        </div>
    </div>

    <!-- /.card-header -->
    <div class="card-body">
      <table id="myTable" class="table table-bordered table-hover">
        <thead>

            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Subject</th>
                <th>Message</th>

                {{-- <th>Action</th> --}}
            </tr>

        </thead>
        <tbody>
            @foreach ($data as $p)

           <tr>
              <td>{{$p->id}}</td>
              <td>{{$p->c_fname}}</td>
              <td>{{$p->c_lname}}</td>
              <td>{{$p->c_email}}</td>
              <td>{{$p->c_subject}}</td>
              <td>{{$p->c_message}}</td>

              {{-- <td>
                <a href="{{route('color.edit',$p->id)}}"><button type="button" class="btn btn-primary">Edit</button></a>
                <a href="{{route('color.delete',$p->id)}}"> <button type="button" class="btn btn-danger">delete</button></a>
              </td> --}}

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

