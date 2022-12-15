@extends('admin.master')

@section('title' , 'Edit Product Color')

@section('titlepage' , 'Edit Product Color')

@section('contant')

  <div class="col-11 border rounded-3 border-primary m-auto p-3">
    <form action="{{url('/admin/productcolor/' . $productcolor->id)}}" method="POST" class="row" enctype="multipart/form-data">

        @csrf
        @method('PUT')
        @include('admin.massage')

        <div class="mb-3 col-md-10 m-auto p-2">
          <label for="product_id" class="form-label">Name Product</label>
          <select name="product_id" id="product_id" class="form-select" >
            <option selected>{{$productcolor->product->name}}</option>
            @foreach ($product as $products)
                
            <option value="{{$products->id}}">{{$products->name}}</option>

            @endforeach
          </select>
        </div>
        <div class="mb-3 col-md-10 m-auto p-2">
          <label for="name" class="form-label">Name Color</label>
          <input type="text" class="form-control" id="name" name="name" value="{{$productcolor->name}}">
        </div>
        <div class="mb-3 col-md-2 m-auto p-2">
          <label for="color" class="form-label">Color</label>
          <input type="color" class="form-control" id="color" name="color" value="{{$productcolor->color}}">
        </div>
        <div class="d-grid gap-2 col-4 mx-auto">
            <button type="submit" class="btn btn-primary p-2">Edit Color</button>
          </div>
      </form>
  </div>
    
@endsection