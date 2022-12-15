@extends('admin.master')

@section('title' , 'Edit Category')

@section('titlepage' , 'Edit Categories')

@section('contant')

  <div class="col-11 border rounded-3 border-primary m-auto p-3">
    <form action="{{url('admin/category/' . $category->id)}}" method="POST" enctype="multipart/form-data">

        @csrf
        @method('PUT')
        @include('admin.massage')

        <div class="mb-3">
          <label for="name" class="form-label">Name Category</label>
          <input type="text" class="form-control" id="name" name="name" value="{{$category->name}}">
        </div>
        <div class="d-grid gap-2 col-4 mx-auto">
            <button type="submit" class="btn btn-primary">Edit Category</button>
          </div>
      </form>
  </div>
    
@endsection