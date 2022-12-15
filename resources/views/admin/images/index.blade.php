@extends('admin.master')

@section('title' , 'Product Image Page')

@section('titlepage' , 'Product Image')

@section('contant')


<div class="col-11 m-auto">
    <table class="table table-bordered border-primary table-hover">

      @include('admin.massage')

        <thead class="table-primary">
            <tr>
              <th>#</th>
              <th>Name Product</th>
              <th>Image</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tbody>
        
              @foreach ($image as $images)
            <tr>   
              <th>{{$loop->iteration}}</th>
              <td>{{$images->product->name}}</td>
              <td>
                <img src="/storage/uploads/Image-Product/{{$images->image}}" width="90">
              </td>
              <td>
                <a href="{{url('/admin/image/' . $images->id . '/edit')}}" class="btn btn-primary">Edit</a>
              </td>
              <td>
                <form action="{{url('/admin/image/' . $images->id)}}" method="POST">
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