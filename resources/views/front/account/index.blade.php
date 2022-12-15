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
                            <h3 class="breadcrumb-title">My Account</h3>
                            <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                                <nav aria-label="breadcrumb">
                                    <ul>
                                        <li><a href="{{url('/')}}">Home</a></li>
                                        <li><a href="{{url('/index-product')}}">Shop</a></li>
                                        <li class="active" aria-current="page">My Account</li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- ...:::: End Breadcrumb Section:::... -->
    
        <!-- ...:::: Start Account Dashboard Section:::... -->
        <div class="account-dashboard">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <!-- Nav tabs -->
                        <div class="dashboard_tab_button" data-aos="fade-up" data-aos-delay="0">
                            <ul role="tablist" class="nav flex-column dashboard-list">
                                <li><a href="#dashboard" data-bs-toggle="tab"
                                        class="nav-link btn btn-block btn-md btn-black-default-hover active">Account details</a>
                                </li>
                                <li> <a href="#orders" data-bs-toggle="tab"
                                        class="nav-link btn btn-block btn-md btn-black-default-hover">Orders History</a></li>
                                <li class="nav-item d-none d-sm-inline-block">
                                    <form action="{{ route('logout') }}" method="POST" >
                                        @csrf
                                    <a class="nav-link btn btn-block btn-md btn-black-default-hover" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     this.closest('form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    </form>
                                </li>        
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-9 col-lg-9">
                        <!-- Tab panes -->
                        <div class="tab-content dashboard_content" data-aos="fade-up" data-aos-delay="200">
                            <div class="tab-pane fade show active" id="dashboard">
                                <div style="float: right;">
                                    <a href="{{ url('change-password') }}" class="nav-link btn btn-block btn-black-default-hover mb-2">change password</a>
                                    <a href="{{ url('edit-profile') }}" class="m-auto nav-link btn btn-block btn-black-default-hover">Edit Profile</a>
                                </div>
                                <h4>Account details </h4>
                                <div class="card rounded" style="width:400px">
                                    @auth
                                    
                                    <img class="rounded-circle" src="{{ asset('storage/uploads/user') }}/{{Auth::user()->image}}" alt="Card image">
                                    <div class="card-body">
                                        <h5><b> Name : </b> {{Auth::user()->name}}</h5>
                                        <h5><b> Email : </b> {{Auth::user()->email}}</h5>
                                    </div>
                                    @endauth
                                </div>
                            </div>
                            <div class="tab-pane fade" id="orders">
                                <h4>Orders History</h4>
                                <div class="table_page table-responsive">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>Order</th>
                                                <th>Status</th>
                                                <th>Total Order</th>
                                                <th>Ordered at</th>
                                                <th>View Order</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($order as $orders)
                                            <tr>   
                                              <td>{{$loop->iteration}}</td>
                                                @if ($orders->status == 'rejected')
                                                    <td><kbd style="background: red;">{{$orders->status}}</kbd></td>
                                                @elseif($orders->status == 'accepted')
                                                    <td><kbd style="background: rgb(89, 255, 0);">{{$orders->status}}</kbd></td>
                                                @else
                                                    <td><kbd class="bg-primary">{{$orders->status}}</kbd></td>
                                                @endif
                                              <td>${{$orders->total_price}}</td>
                                              <td>{{$orders->ordered_at}}</td>
                                              <td>
                                                   <a href="{{url('/view-order/' . $orders->id)}}" class="view">View Order</a>
                                              </td>
                                            </tr>
                                              @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- ...:::: End Account Dashboard Section:::... -->

@endsection