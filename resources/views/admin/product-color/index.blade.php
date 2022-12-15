@extends('admin.master')

@section('title' , 'Product Color Page')

@section('titlepage' , 'Product Color')

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
              <th>Name Product</th>
              <th>Name Color</th>
              <th>Color</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tbody>
            
              @foreach ($productcolor as $productcolors)
            <tr>   
              <th>{{$loop->iteration}}</th>
              <td>{{$productcolors->product->name}}</td>
              <td>{{$productcolors->name}}</td>
              <td> <h1 style="background-color:{{$productcolors->color}}; padding:20px; " ></h1> </td>
              <td>
                <a href="{{url('/admin/productcolor/' . $productcolors->id . '/edit')}}" class="btn btn-primary">Edit</a>
              </td>
              <td>
                <form action="{{url('/admin/productcolor/' . $productcolors->id)}}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger">Delete</button>
                </form>
              </td>
            </tr>
              @endforeach
            
          </tbody>
      </table>
</div>
    
@endsection