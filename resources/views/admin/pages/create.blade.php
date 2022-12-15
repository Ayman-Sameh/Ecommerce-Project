@extends('admin.master')

@section('title' , 'Add Page')

@section('titlepage' , 'Add Page')

@section('contant')

  <div class="col-11 border rounded-3 border-primary m-auto p-3">
    <form action="{{route('page.store')}}" method="POST" enctype="multipart/form-data">

        @csrf
        @include('admin.massage')

        <div class="mb-3">
          <label for="title" class="form-label">Title Page</label>
          <input type="text" class="form-control" id="title" name="title" placeholder="Enter Page Title">
        </div>
        <div class="mb-3">
          <label for="contant" class="form-label">Content Page</label>
          <textarea name="contant" class="form-control" id="editor"></textarea>
        </div>
        
        <div class="d-grid gap-2 col-4 mx-auto">
            <button type="submit" id="submit" class="btn btn-primary">Add Page</button>
          </div>
      </form>
  </div>
    
@endsection

@section('script')
<script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>    
    <script>
        ClassicEditor
             .create( document.querySelector( '#editor' ) , {
                ckfinder:{
                    uploadUrl: '{{route('page.store').'?_token='.csrf_token()}}'
                }
             
             });                 
    </script>      

@endsection