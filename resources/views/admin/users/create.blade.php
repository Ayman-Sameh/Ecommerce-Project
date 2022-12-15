@extends('admin.master')

@section('title' , 'Add Usres')

@section('titlepage' , 'Add Users')

@section('contant')

  <div class="col-11 border rounded-3 border-primary m-auto p-3">
    <form action="{{route('user.store')}}" method="POST" class="row" enctype="multipart/form-data">

        @csrf
        @include('admin.massage')

        <div class="mb-3 col-md-7 m-auto p-3">
          <label for="type" class="form-label">Name Category</label>
          <select name="type" id="type" class="form-select" >
            <option selected disabled>Open this select menu</option>
            <option>Admin</option>
            <option>User</option>
          </select>
        </div>
        <div class="mb-3 col-md-7 m-auto p-3">
          <label for="name" class="form-label">User Name</label>
          <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}" placeholder="Enter User Name">
        </div>
        <div class="mb-3 col-md-7 m-auto p-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}" placeholder=" email">
        </div>
        <div class="mb-3 col-md-7 m-auto p-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" id="password" name="password" value="{{old('password')}}" placeholder=" password">
        </div>
        <div class="d-grid gap-2 col-7 mx-auto p-3">
            <button type="submit" class="btn btn-primary p-2">Add User</button>
          </div>
      </form>
  </div>
    
@endsection