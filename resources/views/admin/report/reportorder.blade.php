@extends('admin.master')

@section('title' , 'Report')

@section('titlepage' , 'Report Order')

@section('contant')

<div class="col-11 border rounded-3 border-primary m-auto p-3">
  <div class="m-auto">
    <a class="btn btn-dark p-2" style="text-align: center;" href="{{url('admin/report')}}"><i class="fa-solid fa-broom"></i>clean</a>
  </div>
    <form action="{{url('admin/report-order')}}" method="POST" class="row" autocomplete="off">

        @csrf
        @include('admin.massage')

        <div class="mb-3 col-md-4" >
          <label for="status" class="form-label">Select Status</label>
          <select name="status" class="form-select" >
            <option disabled selected>Select Status</option>                
            <option value="0"             {{request()->status == "0" ? 'selected':''}}             >All</option>                
            <option value="accepted"      {{request()->status == "accepted" ? 'selected':''}}      >Accepted</option>
            <option value="shipping now"  {{request()->status == "shipping now" ? 'selected':''}}  >Shipping Now</option>
            <option value="done shipping" {{request()->status == "done shipping" ? 'selected':''}} >Done Shipping</option>
            <option value="rejected"      {{request()->status == "rejected" ? 'selected':''}}      >Rejected</option>

          </select>
        </div>
        <div class="mb-3 col-md-4" >
          <label for="user" class="form-label">Select User</label>
          <select name="user" class="form-select" >
            <option disabled selected>Select User</option>   
            @foreach ($user as $users)
                <option value="{{$users->id}}" {{request()->user == $users->id ? 'selected':''}} >{{$users->name}}</option>                
            @endforeach             
          </select>
        </div>
        <div class="mb-3 col-md-4 datepicker-form">
          <label for="min" class="form-label">Min Price</label>
          <input type="number" value="{{request()->min}}" class="form-control range-from date-picker-default" placeholder="Min Price"  name="min">
        </div>  
        <div class="mb-3 col-md-4 datepicker-form">
          <label for="max" class="form-label">Max Price</label>
          <input type="number" value="{{request()->max}}" class="form-control range-from date-picker-default" placeholder="Max Price"  name="max">
        </div>  
        <div class="mb-3 col-md-4 datepicker-form" data-date-format="yyyy-mm-dd">
          <label for="start" class="form-label">Start Date</label>
          <input type="date" value="{{request()->start}}" class="form-control range-from date-picker-default" placeholder="Start Date"  name="start">
        </div>  
        <div class="mb-3 col-md-4 datepicker-form" data-date-format="yyyy-mm-dd">
          <label for="end" class="form-label">End Date</label>
          <input type="date" value="{{request()->end}}" class="form-control range-from" placeholder="End Date" name="end">
        </div>  
        <div class="d-grid gap-2 col-4 mx-auto">
            <button type="submit" class="btn btn-primary p-2">Report</button>
        </div>

      </form>

      @isset($order)

        <div class="pt-3">
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
                          <a href="{{url('/admin/order/' . $orders->id)}}" class="btn btn-primary"> Shoe order</a>
                        </td>
                      </tr>
                        @endforeach
                      
                    </tbody>
              </table>
        </div>

      @endisset


  </div>
@endsection