@extends('admin.master')

@section('title' , 'Add Bannar')

@section('titlepage' , 'Add Bannar')

@section('contant')

  <div class="col-11 border rounded-3 border-primary m-auto p-3">
    <form action="{{route('bannar.store')}}" method="POST" enctype="multipart/form-data">

        @csrf
        @include('admin.massage')

        <div class="mb-3">
            <label for="select" class="form-label">Select Section</label>
            <select name="select" id="select" class="form-select" >
              <option selected disabled>Select Section</option>
              <option value="1">First Banner Section</option>
              <option value="2">Second Banner Section</option>

            </select>
        </div>    
        <div class="mb-3">
          <label for="image" class="form-label">Image</label>
          <input type="file" class="form-control" id="image" name="image">
        </div>
        <div class="d-grid gap-2 col-4 mx-auto">
            <button type="submit" class="btn btn-primary">Add Bannar</button>
          </div>
      </form>
  </div>
    
@endsection