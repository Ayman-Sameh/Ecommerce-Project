@extends('admin.master')

@section('title' , 'Brand Page')

@section('titlepage' , 'Brand')

@section('contant')


<div class="col-11 m-auto">

    <table class="table table-bordered border-primary table-hover">

      @include('admin.massage')

        <thead class="table-primary">
            <tr>
              <th>#</th>
              <th>Image</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tbody>
            
              @foreach ($brands as $brand)
            <tr>   
              <th>{{$loop->iteration}}</th>
              <td>
                <img src="/storage/uploads/brand/{{$brand->image}}" width="90">
              </td>
              <td>
                <a href="{{url('admin/brand/' . $brand->id . '/edit')}}" class="btn btn-primary">Edit</a>
              </td>
              <td>
                <form action="{{url('admin/brand/' . $brand->id)}}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger">Delete</button>
                </form>
              </td>
            </tr>
              @endforeach 
               {{-- {{ $category->links() }} --}}
            
          </tbody>
      </table>

      
</div>

@endsection