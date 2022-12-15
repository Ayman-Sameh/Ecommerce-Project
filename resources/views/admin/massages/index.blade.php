@extends('admin.master')

@section('title' , 'Massages Page')

@section('titlepage' , 'Massages')

@section('contant')


<div class="col-11 m-auto">
    <table class="table table-bordered border-primary table-hover">

      @include('admin.massage')

        <thead class="table-primary">
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Email</th>
              <th>Supject</th>
              <th>Massage</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tbody>
            
              @foreach ($massage as $massages)
            <tr>   
              <td>{{$loop->iteration}}</td>
              <td>{{$massages->name}}</td>
              <td>{{$massages->email}}</td>
              <td>{{$massages->subject}}</td>
              <td>{{$massages->massage}}</td>
              <td>
                <form action="{{url('admin/massage/' . $massages->id)}}" method="POST">
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