@extends('admin.master')

@section('title' , 'Products Page')

@section('titlepage' , 'Products')

@section('contant')


<div class="col-11 m-auto">

  <div class="col-11 m-auto">
 
        <form action="" method="GET">
          <div class="input-group mb-3 col-4">
            <input type="search" name="search" class="form-control" placeholder=" Search..." value="{{$search}}">
            <button class="btn btn-success" type="submit" id="button-addon2" title="Search"><i class="fa-solid fa-magnifying-glass"></i> </button>
          </div>
        </form>
          
        
        <div>
          <a href="{{url('admin/export')}}" class="btn btn-success float-end m-1"><i class="fa-regular fa-file-excel"></i>&nbsp; Excel Export</a>
        </div>
       <table class="table table-bordered border-primary table-hover">
          
          @include('admin.massage')
          
        <thead class="table-primary">
            <tr>
              <th>#</th>
              <th>Name Category</th>
              <th>Name Product</th>
              <th>Price</th>
              <th>Offer</th>
              <th>total</th>
              <th>Description</th>
              <th>Image</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tbody>
            
              @foreach ($product as $products)
            <tr>   
              <th>{{$loop->iteration}}</th>
              <td>{{$products->category->name}}</td>
              <td>{{$products->name}}</td>
              <td>{{$products->price}}</td>
              <td>{{$products->offer}}</td>
              <td>{{ ((int)$products->price - (int)$products->offer) }}</td>
              <td>{{$products->description}}</td>
              <td><img src="/storage/uploads/Products/{{$products->image}}" width="90"></td>
              <td>
                <a href="{{url('/admin/product/' . $products->id . '/edit')}}" class="btn btn-primary">Edit</a>
              </td>
              <td>
                <form action="{{url('/admin/product/' . $products->id)}}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger">Delete</button>
                </form>
              </td>
            </tr>
              @endforeach
              {{ $product->links() }}
          </tbody>
      </table>
</div>
    
@endsection