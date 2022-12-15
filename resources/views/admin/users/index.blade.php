@extends('admin.master')

@section('title' , 'Users Page')

@section('titlepage' , 'Users')

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
              <th>Name</th>
              <th>Email</th>
              <th>Type</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tbody>
            
              @foreach ($user as $users)
            <tr>   
              <th>{{$loop->iteration}}</th>
              <td>{{$users->name}}</td>
              <td>{{$users->email}}</td>
              <td><kbd class="bg-primary">{{$users->type}}</kbd></td>
              <td>
                <a href="{{url('/admin/user/' . $users->id . '/edit')}}" class="btn btn-primary">Edit</a>
              </td>
              <td>
                <form action="{{url('/admin/user/' . $users->id)}}" method="POST">
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