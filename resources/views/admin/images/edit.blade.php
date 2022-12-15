@extends('admin.master')

@section('title' , 'Edit Product Image')

@section('titlepage' , 'Edit Product Image')

@section('contant')

  <div class="col-11 border rounded-3 border-primary m-auto p-3">
    <form action="{{url('/admin/image/' . $image->id)}}" method="POST" class="row" enctype="multipart/form-data">

        @csrf
        @method('PUT')
        @include('admin.massage')

        <div class="mb-3 col-md-10 m-auto p-2">
          <label for="product_id" class="form-label">Name Product</label>
          <select name="product_id" id="product_id" class="form-select" >
            <option selected disabled>{{$image->product->name}}</option>
            @foreach ($product as $products)
                
            <option value="{{$products->id}}">{{$products->name}}</option>

            @endforeach
          </select>
        </div>
        <div class="mb-3 col-md-10 m-auto p-2">
          <label for="image" class="form-label">Image</label>
          <input type="file" class="form-control" id="image" name="image">
        </div>
        <div class="d-grid gap-2 col-4 mx-auto">
            <button type="submit" class="btn btn-primary p-2">Edit Image</button>
          </div>
      </form>
  </div>
    
@endsection