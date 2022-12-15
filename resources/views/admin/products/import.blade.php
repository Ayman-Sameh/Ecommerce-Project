@extends('admin.master')

@section('title' , 'Import Products')

@section('titlepage' , 'Import Products')

@section('contant')

<div class="col-11 border rounded-3 border-primary m-auto p-3">
    <form action="{{url('admin/import-product')}}" method="POST" class="row" enctype="multipart/form-data">

        @csrf
        @include('admin.massage')

        <div class="mb-3 ">
          <label for="excel_file" class="form-label">Import File</label>
          <input type="file" class="form-control" id="excel_file" name="excel_file" value="">
        </div>
        <div class="d-grid gap-2 col-4 mx-auto">
            <button type="submit" class="btn btn-primary p-2">Import Product</button>
          </div>
      </form>
</div>

@endsection