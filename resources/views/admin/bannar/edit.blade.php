@extends('admin.master')

@section('title' , 'Edit Bannar')

@section('titlepage' , 'Edit Bannar')

@section('contant')

  <div class="col-11 border rounded-3 border-primary m-auto p-3">
    <form action="{{url('admin/bannar/' . $bannar->id)}}" method="POST" enctype="multipart/form-data">

        @csrf
        @method('PUT')
        @include('admin.massage')

          <div class="mb-3">
            <label for="select" class="form-label">Select Section</label>
            <select name="select" id="select" class="form-select" >
              <option selected disabled>
                @if ($bannar->select == '1')
                   First Banner Section 
                @else
                    Second Banner Section 
                @endif
              </option>
              <option value="1">First Banner Section</option>
              <option value="2">Second Banner Section</option>

            </select>
        </div>    
        <div class="mb-3">
          <label for="image" class="form-label">Image</label>
          <input type="file" class="form-control" id="image" name="image">
        </div>
        <div class="d-grid gap-2 col-4 mx-auto">
            <button type="submit" class="btn btn-primary">Edit Bannar</button>
          </div>
      </form>
  </div>
    
@endsection