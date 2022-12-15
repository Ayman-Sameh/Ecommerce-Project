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
                            <h3 class="breadcrumb-title">Checkout</h3>
                            <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                                <nav aria-label="breadcrumb">
                                    <ul>
                                        <li><a href="{{url('/')}}">Home</a></li>
                                        <li><a href="{{url('/index-product')}}">Shop</a></li>
                                        <li class="active" aria-current="page">Checkout</li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- ...:::: End Breadcrumb Section:::... -->
    
        <!-- ...:::: Start Checkout Section:::... -->
        <div class="checkout-section">
            <div class="container">
                <div class="row">
                </div>
                <!-- Start User Details Checkout Form -->
                <div class="checkout_form" data-aos="fade-up" data-aos-delay="400">
                    <div class="row">
                        @include('front.massage')
                        <div class="col-lg-6 col-md-6">
                           <form action="{{url('place-order')}}" method="POST">
                            @csrf
                            <h3>Billing Details</h3>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="default-form-box">
                                        <label for="name"> Full Name </label>
                                        <input type="text" value="{{Auth::user()->name}}" name="name" id="name">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="default-form-box">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="default-form-box">
                                        <label for="email">Email</label>
                                        <input type="email" value="{{Auth::user()->email}}" name="email" id="email">
                                    </div>    
                                </div>
                                <div class="col-12">
                                    <div class="default-form-box">
                                        <label for="phone">Phone</label>
                                        <input type="text" name="phone" id="phone">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="default-form-box">
                                        <label for="address"> Address</label>
                                        <input type="text" name="address" id="address" placeholder="Detailed address">
                                        <input type="hidden" name="offer" id="offer" value="0">
                                        
                                        @php
                                            $total = 0;
                                        @endphp

                                        @foreach ($cartItem as $item)
                                        <input type="hidden" name="total" id="total" value="{{((int)$item->product->price - (int)$item->product->offer)}}">
                                            @php
                                                $total +=(($item->product->price - $item->product->offer) * $item->product_qty);
                                            @endphp
                                        </tr>
                                            @endforeach
                                            <input type="hidden" name="total_price" id="total_price" value="{{$total + 10}}">
                                    </div>
                                </div>
                                <div class="col-12 mt-3">
                                    <div class="order-notes">
                                        <label for="notes">Notes</label>
                                        <textarea id="notes" name="notes" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                    </div>
                                </div>
                            </div>
                       
                    </div>
                    <div class="col-lg-6 col-md-6">
                            <h3>Your order</h3>
                            <div class="order_table table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $total = 0;
                                        @endphp

                                        @foreach ($cartItem as $item)
                                        <tr>

                                            <td> {{$item->product->name}} <strong> × {{$item->product_qty}}</strong></td>
                                            <td> ${{((int)$item->product->price - (int)$item->product->offer)}}</td>

                                            @php
                                                $total +=(($item->product->price - $item->product->offer) * $item->product_qty);
                                            @endphp
                                        </tr>
                                            @endforeach

                                        
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Cart Subtotal</th>
                                            <td>${{$total}}</td>
                                        </tr>
                                        <tr>
                                            <th>Shipping</th>
                                            <td><strong>$10</strong></td>
                                        </tr>
                                        <tr class="order_total">
                                            <th>Order Total</th>
                                            <td><strong>${{$total + 10}}</strong></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="payment_method">
                                <div class="order_button pt-3">
                                    <button class="btn btn-md btn-black-default-hover" type="submit">Completion Of Order</button>
                                </div>
                            </div>
                           </form>
                        </div>
                    </div>
                </div> <!-- Start User Details Checkout Form -->
            </div>
        </div><!-- ...:::: End Checkout Section:::... -->

@endsection