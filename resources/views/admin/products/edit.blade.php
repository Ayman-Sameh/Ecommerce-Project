@extends('admin.master')

@section('title' , 'Edit Products')

@section('titlepage' , 'Edit Products')

@section('contant')

  <div class="col-11 border rounded-3 border-primary m-auto p-3">
    <form action="{{url('/admin/product/' . $product->id)}}" method="POST" class="row" enctype="multipart/form-data">

        @csrf
        @method('PUT')
        @include('admin.massage')

        <div class="mb-3 col-md-6">
          <label for="category_id" class="form-label">Name Category</label>
          <select name="category_id" id="category_id" class="form-select" >
            {{-- <option value="">Open this select menu</option> --}}
            @foreach ($category as $category)
                
            <option value="{{$category->id}}" {{$category->id == $category->category_id ? 'selected':''}}>{{$category->name}}</option>

            @endforeach
          </select>
        </div>
        <div class="mb-3 col-md-6">
          <label for="name" class="form-label">Name Product</label>
          <input type="text" class="form-control" id="name" name="name" value="{{$product->name}}">
        </div>
        <div class="mb-3 col-md-4">
          <label for="price" class="form-label">Price</label>
          <input type="number" class="form-control" id="price" name="price" value="{{$product->price}}">
        </div>
        <div class="mb-3 col-md-4">
          <label for="offer" class="form-label">Offer</label>
          <input type="number" class="form-control" id="offer" name="offer" placeholder="Offer" value="{{$product->offer}}">
        </div>
        <div class="mb-3 col-md-4">
          <label for="image" class="form-label">Image Product</label>
          <input type="file" class="form-control" id="image" name="image">
        </div>
        <div class="form-floating mb-3 col-md-12">
          <textarea name="description" id="description" class="form-control" rows="7" placeholder="Leave a comment here" >{{$product->description}}</textarea>
          <label for="description">Description</label>
        </div>
        <div class="d-grid gap-2 col-4 mx-auto">
            <button type="submit" class="btn btn-primary p-2">Edit Product</button>
          </div>
      </form>
  </div>
    
@endsection