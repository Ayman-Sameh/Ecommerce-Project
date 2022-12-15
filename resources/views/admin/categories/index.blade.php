@extends('admin.master')

@section('title' , 'Category Page')

@section('titlepage' , 'Categories')

@section('contant')


<div class="col-11 m-auto">
  <form action="" method="GET">
    <div class="input-group mb-3 col-4">

      <input type="search" name="search" class="form-control" placeholder=" Search..." value="{{$search}}">
      <button class="btn btn-success" type="submit" id="button-addon2" title="Search"><i class="fa-solid fa-magnifying-glass"></i> </button>

    </div>
</form>

    <table class="table table-bordered border-primary table-hover">

      @include('admin.massage')

        <thead class="table-primary">
            <tr>
              <th>#</th>
              <th>Name Category</th>
              <th>Products</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tbody>
            
              @foreach ($category as $categories)
            <tr>   
              <th>{{$loop->iteration}}</th>
              <td>{{$categories->name}}</td>
              <td>
                 @foreach ($categories->product as $product)
                  {{$product->name}}  <i class="fa fa-anchor"></i>
                 @endforeach
              </td>
              <td>
                <a href="{{url('admin/category/' . $categories->id . '/edit')}}" class="btn btn-primary">Edit</a>
              </td>
              <td>
                <form action="{{url('admin/category/' . $categories->id)}}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger">Delete</button>
                </form>
              </td>
            </tr>
              @endforeach
              {{ $category->links() }}
            
          </tbody>
      </table>

      
</div>

@endsection