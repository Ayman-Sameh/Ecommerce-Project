@extends('admin.master')

@section('title' , 'Edit Settings')

@section('titlepage' , 'Edit Settings')

@section('contant')

<div class="container col-11 border-top border-end border-start rounded-3 border-primary m-auto p-3 mb-5">
    <div class="container row ml-3">
        <div class="col-3"><b>Name:</b>  {{$setting->name}}</div>
        <div class="col-3"><b>Email:</b> {{$setting->email}}</div>
        <div class="col-3"><b>Phone:</b> {{$setting->phone}}</div>
        <div class="col-3"><b>Whatsapp:</b> {{$setting->whatsapp}}</div>
    </div>
    <div class="container row ml-3 mt-2">
        <div class="col-3 nav-item"><b>Facebook:</b> <a href="{{$setting->facebook}}" class="link-dark"> <i class="nav-icon fa-brands fa-facebook"></i></a></div>
        <div class="col-3 nav-item"><b>Instagram:</b> <a href="{{$setting->instagram}}" class="link-dark"> <i class="fa-brands fa-square-instagram"></i></a></div>
        <div class="col-3 nav-item"><b>Twitter:</b> <a href="{{$setting->twitter}}" class="link-dark"><i class="fa-brands fa-square-twitter"></i></a></div>
        <div class="col-3 nav-item"><b>Youtube:</b> <a href="{{$setting->youtube}}" class="link-dark"><i class="fa-brands fa-youtube"></i></a></div>
    </div>
    <div class="container row ml-3 mt-2 ">
        <div class="col-6"><b>Logo: </b><img src="/storage/uploads/Settings/{{$setting->logo}}" width="90" ></div>
        <div class="col-6"><b>Description: </b>{{$setting->description}}</div>
    </div>
    <div class="container row ml-3 mt-2 ">
    </div>

</div>

  <div class="col-11 border rounded-3 border-primary m-auto p-3">
    <form action="{{url('/admin/setting/' . $setting->id)}}" method="POST" class="row" enctype="multipart/form-data">

        @csrf
        @method('PUT')
        @include('admin.massage')

        <div class="mb-3 col-md-4">
          <label for="name" class="form-label">Name Site</label>
          <input type="text" class="form-control" id="name" name="name" value="{{$setting->name}}">
        </div>
        <div class="mb-3 col-md-4">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" id="email" name="email" value="{{$setting->email}}">
        </div>
        <div class="mb-3 col-md-4">
          <label for="phone" class="form-label">Phone</label>
          <input type="number" class="form-control" id="phone" name="phone" value="{{$setting->phone}}">
        </div>
        <div class="mb-3 col-md-4">
          <label for="whatsapp" class="form-label">Whatsapp</label>
          <input type="number" class="form-control" id="whatsapp" name="whatsapp" value="{{$setting->whatsapp}}">
        </div>
        <div class="mb-3 col-md-4">
          <label for="facebook" class="form-label">Facebook</label>
          <input type="url" class="form-control" id="facebook" name="facebook" value="{{$setting->facebook}}">
        </div>
        <div class="mb-3 col-md-4">
          <label for="instagram" class="form-label">Instagram</label>
          <input type="url" class="form-control" id="instagram" name="instagram" value="{{$setting->instagram}}">
        </div>
        <div class="mb-3 col-md-4">
          <label for="twitter" class="form-label">Twitter</label>
          <input type="url" class="form-control" id="twitter" name="twitter" value="{{$setting->twitter}}">
        </div>
        <div class="mb-3 col-md-4">
          <label for="youtube" class="form-label">Youtube</label>
          <input type="url" class="form-control" id="youtube" name="youtube" value="{{$setting->youtube}}">
        </div>
        <div class="mb-3 col-md-4">
          <label for="logo" class="form-label">Logo</label>
          <input type="file" class="form-control" id="logo" name="logo">
        </div>
        <div class="form-floating mb-3 col-md-12">
          <textarea name="description" id="description" class="form-control" rows="7" placeholder="Leave a comment here" >{{$setting->description}}</textarea>
          <label for="description">Description</label>
        </div>
        <div class="d-grid gap-2 col-4 mx-auto">
            <button type="submit" class="btn btn-primary p-2">Edit </button>
          </div>
      </form>
  </div>
    
@endsection