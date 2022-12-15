@extends('admin.master')

@section('title' , 'Edit Status')

@section('titlepage' , 'Edit Status')

@section('contant')

  <div class="col-11 border rounded-3 border-primary m-auto p-3">
    <form action="{{url('admin/order/' . $order->id)}}" method="POST" class="row" enctype="multipart/form-data">

        @csrf
        @method('PUT')
        @include('admin.massage')

        <div class="mb-3 col-md-7 m-auto p-3">
          <label for="status" class="form-label">Status</label>
          <select name="status" id="status" class="form-select" >
            <option selected disabled>{{$order->status}}</option>
            <option>Accepted</option>
            <option>Shipping Now</option>
            <option>Done Shipping</option>
            <option>Rejected</option>
          </select>
        </div>
        <div class="d-grid gap-2 col-7 mx-auto p-3">
            <button type="submit" class="btn btn-primary p-2">Edit Status</button>
          </div>
      </form>
  </div>
    
@endsection