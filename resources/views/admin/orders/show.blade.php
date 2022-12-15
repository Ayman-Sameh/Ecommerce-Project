@extends('admin.master')

@section('title' , 'Order user Page')

@section('titlepage' , 'Order User')

@section('contant')


<div class="col-11 m-auto">

    <table class="table table-bordered border-primary table-hover">

      @include('admin.massage')

        <thead class="table-primary">
            <tr>
              <th>#</th>
              <th>Name Product</th>
              <th>Price</th>
              <th>Quantity</th>
              {{-- <th>Color</th> --}}
              <th>Image</th>
            </tr>
          </thead>
          <tbody>
            
            @foreach ($order->orderproduct as $orders)
                
            <tr>   
              <th>{{$loop->iteration}}</th>
              @foreach ($orders->product as $item)
              <td>{{$item->name}}</td>
              <td>{{$orders->price}}</td>
              <td>{{$orders->qty}}</td>
                {{-- @foreach ($item->productColor as $color)
                  <td> <h1 style="background-color:{{$color->color}}; padding:20px; " ></h1> </td>
                @endforeach --}}
              <td> <img src="{{ asset('/storage/uploads/Products') }}/{{$item->image}}" width="90"> </td>
              @endforeach

            </tr>
              @endforeach
            
          </tbody>
      </table>
</div>
    
@endsection