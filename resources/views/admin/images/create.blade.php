@extends('admin.master')

@section('title' , 'Add Product Image')

@section('titlepage' , 'Add Product Image')

@section('contant')

  <div class="col-11 border rounded-3 border-primary m-auto p-3">
    <form action="{{route('image.store')}}" method="POST" class="row" enctype="multipart/form-data">

        @csrf
        @include('admin.massage')

        <div class="mb-3 col-md-10 m-auto p-2">
          <label for="product_id" class="form-label">Name Product</label>
          <select name="product_id" id="product_id" class="form-select" >
            <option selected disabled>Open this select menu</option>
            @foreach ($product as $products)
                
            <option value="{{$products->id}}">{{$products->name}}</option>

            @endforeach
          </select>
        </div>
        <div class="mb-3 col-md-10 m-auto p-2">
          <label for="image" class="form-label">Image</label>
          <input type="file" class="form-control" name="image[]" id="image" multiple>
        </div>
        <div class="d-grid gap-2 col-4 mx-auto">
            <button type="submit" class="btn btn-primary p-2">Add Image</button>
          </div>
      </form>
  </div>
    
@endsection