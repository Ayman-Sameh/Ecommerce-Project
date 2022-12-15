@extends('front.master')

@section('content')

        <!-- Offcanvas Overlay -->
        <div class="offcanvas-overlay"></div>

        <!-- ...:::: Start Breadcrumb Section:::... -->
        <div class="breadcrumb-section breadcrumb-bg-color--golden">
            <div class="breadcrumb-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h3 class="breadcrumb-title">Order</h3>
                            <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                                <nav aria-label="breadcrumb">
                                    <ul>
                                        <li><a href="{{url('/')}}">Home</a></li>
                                        <li><a href="{{url('/account')}}">Orders History</a></li>
                                        <li class="active" aria-current="page">Order</li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- ...:::: End Breadcrumb Section:::... -->

        <div class="col-9 m-auto">
            <div class="table_page table-responsive">
                <table>
                    <thead>
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
                        <td>{{$loop->iteration}}</td>
                        @foreach ($orders->product as $item)
                        <td>{{$item->name}}</td>
                        <td>{{$orders->price}}</td>
                        <td>{{$orders->qty}}</td>
                            {{-- @foreach ($item->productColor as $color)
                            <td> <h1 style="background-color:{{$color->color}}; padding:20px; width: 70px; margin: auto;" ></h1> </td>
                            @endforeach --}}
                        <td> <img src="{{ asset('/storage/uploads/Products') }}/{{$item->image}}" width="90"> </td>
                        @endforeach

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>


@endsection