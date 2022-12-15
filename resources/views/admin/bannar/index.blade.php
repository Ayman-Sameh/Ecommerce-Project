@extends('admin.master')

@section('title' , 'Banner Page')

@section('titlepage' , 'Banner')

@section('contant')


<div class="col-11 m-auto">
    <table class="table table-bordered border-primary table-hover">

      @include('admin.massage')

        <thead class="table-primary">
            <tr>
              <th>#</th>
              <th>Section</th>
              <th>Image</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tbody>
            
              @foreach ($bannar as $ban)
            <tr>   
              <th>{{$loop->iteration}}</th>

              @if ($ban->select == '1')
                <td> First Banner Section </td>
              @else
                <td> Second Banner Section </td>
              @endif
              <td>
                <img src="/storage/uploads/bannar/{{$ban->image}}" width="90">
              </td>
              <td>
                <a href="{{url('admin/bannar/' . $ban->id . '/edit')}}" class="btn btn-primary">Edit</a>
              </td>
              <td>
                <form action="{{url('admin/bannar/' . $ban->id)}}" method="POST">
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