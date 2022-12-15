@extends('admin.master')

@section('title' , 'Orders Page')

@section('titlepage' , 'Orders')

@section('contant')


<div class="col-11 m-auto">

    <table class="table table-bordered border-primary table-hover">

      @include('admin.massage')

        <thead class="table-primary">
            <tr>
              <th>#</th>
              <th>Name User</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Address</th>
              <th>Status</th>
              <th>Notes</th>
              <th>Total Order</th>
              <th>Ordered at</th>
              <th>Ebit</th>
              <th>View Order</th>
            </tr>
          </thead>
          <tbody>
            
              @foreach ($order as $orders)
            <tr>   
              <th>{{$loop->iteration}}</th>
              <td>{{$orders->name}}</td>
              <td>{{$orders->email}}</td>
              <td>{{$orders->phone}}</td>
              <td>{{$orders->address}}</td> 
              @if ($orders->status == 'rejected')
                  <td><kbd style="background: red;">{{$orders->status}}</kbd></td>
              @elseif($orders->status == 'accepted')
              <td><kbd style="background: rgb(89, 255, 0);">{{$orders->status}}</kbd></td>
              @else
              <td><kbd class="bg-primary">{{$orders->status}}</kbd></td>
              @endif
              <td>{{$orders->notes}}</td>
              <td>${{$orders->total_price}}</td>
              <td>{{$orders->ordered_at}}</td>
              <td>
                <a href="{{url('/admin/order/' . $orders->id . '/edit')}}" class="btn btn-primary"> Edit Status</a>
              </td>
               <td>
                <a href="{{url('/admin/order/' . $orders->id)}}" class="btn btn-primary"> Shoe order</a>
              </td>
            </tr>
              @endforeach
            
          </tbody>
    </table>
</div>
    
@endsection