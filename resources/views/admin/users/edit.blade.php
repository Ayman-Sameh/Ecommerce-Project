@extends('admin.master')

@section('title' , 'Edit Usres')

@section('titlepage' , 'Edit User')

@section('contant')

  <div class="col-11 border rounded-3 border-primary m-auto p-3">
    <form action="{{url('admin/user/' . $user->id)}}" method="POST" class="row" enctype="multipart/form-data">

        @csrf
        @method('PUT')
        @include('admin.massage')

        <div class="mb-3 col-md-7 m-auto p-3">
          <label for="type" class="form-label">Name Category</label>
          <select name="type" id="type" class="form-select" >
            <option selected disabled>{{$user->type}}</option>
            <option>Admin</option>
            <option>User</option>
          </select>
        </div>
        <div class="mb-3 col-md-7 m-auto p-3">
          <label for="name" class="form-label">User Name</label>
          <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}" placeholder="Enter User Name">
        </div>
        <div class="mb-3 col-md-7 m-auto p-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}" placeholder=" email">
        </div>
        <div class="d-grid gap-2 col-7 mx-auto p-3">
            <button type="submit" class="btn btn-primary p-2">Edit User</button>
          </div>
      </form>
  </div>
    
@endsection