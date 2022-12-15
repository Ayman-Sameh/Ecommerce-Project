@extends('admin.master')

@section('title' , 'Pages')

@section('titlepage' , 'Pages')

@section('contant')


<div class="col-11 m-auto">
    <table class="table table-bordered border-primary table-hover">

      @include('admin.massage')

        <thead class="table-primary">
            <tr>
              <th>#</th>
              <th>Name Page</th>
              <th>contant</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tbody>
            
              @foreach ($page as $pages)
            <tr>   
              <td>{{$loop->iteration}}</td>
              <td>{{$pages->title}}</td>
              <td>
                <a href="{{url('admin/page/' . $pages->id)}}" class="btn btn-primary">Show Page</a>
              </td>
              <td>
                <a href="{{url('admin/page/' . $pages->id . '/edit')}}" class="btn btn-primary">Edit</a>
              </td>
              <td>
                <form action="{{url('admin/page/' . $pages->id)}}" method="POST">
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