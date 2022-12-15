@extends('admin.master')

@section('title' , 'Edit Brands')

@section('titlepage' , 'Edit Brands')

@section('contant')

  <div class="col-11 border rounded-3 border-primary m-auto p-3">
    <form action="{{url('admin/brand/' . $brand->id)}}" method="POST" enctype="multipart/form-data">

        @csrf
        @method('PUT')
        @include('admin.massage')
   
        <div class="mb-3">
          <label for="image" class="form-label">Image</label>
          <input type="file" class="form-control" id="image" name="image">
        </div>
        <div class="d-grid gap-2 col-4 mx-auto">
            <button type="submit" class="btn btn-primary">Edit Brand</button>
          </div>
    </form>
  </div>
    
@endsection