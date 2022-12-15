@extends('admin.master')

@section('title' , 'Add Brand')

@section('titlepage' , 'Add Brand')

@section('contant')

  <div class="col-11 border rounded-3 border-primary m-auto p-3">
    <form action="{{route('brand.store')}}" method="POST" enctype="multipart/form-data">

        @csrf
        @include('admin.massage')
   
        <div class="mb-3">
          <label for="image" class="form-label">Image</label>
          <input type="file" class="form-control" id="image" name="image">
        </div>
        <div class="d-grid gap-2 col-4 mx-auto">
            <button type="submit" class="btn btn-primary">Add Brand</button>
          </div>
      </form>
  </div>
    
@endsection