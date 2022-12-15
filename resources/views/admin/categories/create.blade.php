@extends('admin.master')

@section('title' , 'Add Category')

@section('titlepage' , 'Add Categories')

@section('contant')

  <div class="col-11 border rounded-3 border-primary m-auto p-3">
    <form action="{{route('category.store')}}" method="POST" enctype="multipart/form-data">

        @csrf
        @include('admin.massage')

        <div class="mb-3">
          <label for="name" class="form-label">Name Category</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="Enter Category Name">
        </div>
        <div class="d-grid gap-2 col-4 mx-auto">
            <button type="submit" class="btn btn-primary">Add Category</button>
          </div>
      </form>
  </div>
    
@endsection