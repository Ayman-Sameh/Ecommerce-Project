@extends('front.master')

@section('content')

        <!-- Offcanvas Overlay -->
        <div class="offcanvas-overlay"></div>

        @if ($cartItem->count() > 0)
        <!-- ...:::: Start Breadcrumb Section:::... -->
        <div class="breadcrumb-section breadcrumb-bg-color--golden">
            <div class="breadcrumb-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h3 class="breadcrumb-title">Cart</h3>
                            <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                                <nav aria-label="breadcrumb">
                                    <ul>
                                        <li><a href="{{url('/')}}">Home</a></li>
                                        <li><a href="{{url('/index-product')}}">Shop</a></li>
                                        <li class="active" aria-current="page">Cart</li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- ...:::: End Breadcrumb Section:::... -->
    
        <!-- ...:::: Start Cart Section:::... -->
        <div class="cart-section">
            <!-- Start Cart Table -->
            <div class="cart-table-wrapper" data-aos="fade-up" data-aos-delay="0">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="table_desc">
                                <div class="table_page table-responsive">
                                    @include('front.massage')
                                    <table>
                                        <!-- Start Cart Table Head -->
                                        <thead>
                                            <tr>
                                                <th class="product_remove">Delete</th>
                                                <th class="product_thumb">Image</th>
                                                <th class="product_name">Product</th>
                                                <th class="product-price">Price</th>
                                                <th class="product_quantity">Quantity</th>
                                                <th class="product_Color">Color</th>
                                                <th class="product_total">Total</th>
                                            </tr>
                                        </thead> <!-- End Cart Table Head -->
                                        <tbody class="product_data">
                                            @php
                                                $total = 0;
                                            @endphp
                                            @foreach ($cartItem as $item)
                                               <!-- Start Cart Single Item-->
                                               <tr class="id" value="{{$item->id}}"> 
                                                <td>
                                                    <form action="{{url('delete-cart-item/' . $item->id)}}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button style="font-size:25px;" ><i class="fa fa-trash-o"></i></button>
                                                      </form>
                                                </td>
                                                <td class="product_thumb"><a href="{{asset('storage/uploads/Products')}}/{{$item->product->image}}"><img
                                                    src="{{asset('storage/uploads/Products')}}/{{$item->product->image}}"
                                                    alt=""></a></td>
                                                    <td class="product_name"><a>{{$item->product->name}}</a></td>
                                                        <td class="product-price">${{((int)$item->product->price - (int)$item->product->offer)}}</td>
                                                        <td class="product_quantity">
                                                            <input type="hidden" class="product_id" value="{{$item->product_id}}">
                                                            <label>Quantity</label> 
                                                            <input min="1" max="100" class="qty_input changeQuantity" value="{{$item->product_qty}}" type="number">
                                                        </td>
                                                        <td>
                                                            <div class="color-select" style="margin-left: 50px;">

                                                                <h6 class="col-1"  style="background-color:{{$item->colorproduct->color}}; padding:15px;"></h2>
                                                            </div>
                                                        </td>
                                                            <td class="product_total">${{((int)$item->product->price - (int)$item->product->offer) * (int)$item->product_qty}}</td>
                                                        </tr> <!-- End Cart Single Item-->

                                                        @php
                                                            $total +=(($item->product->price - $item->product->offer) * $item->product_qty);
                                                        @endphp

                                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- End Cart Table -->
    
            <!-- Start Coupon Start -->
            <div class="coupon_area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="coupon_code right" data-aos="fade-up" data-aos-delay="400">
                                <h3>Cart Totals</h3>
                                <div class="coupon_inner">
                                    <div class="cart_subtotal">
                                        <p>Subtotal</p>
                                        <p class="cart_amount">${{$total}}</p>
                                    </div>
                                    <div class="cart_subtotal ">
                                        <p>Shipping</p>
                                        <p class="cart_amount"><span>Flat Rate:</span> $10</p>
                                    </div>
                                    <a></a>
    
                                    <div class="cart_subtotal">
                                        <p>Total</p>
                                        <p class="cart_amount">${{$total + 10}}</p>
                                    </div>
                                    <div class="checkout_btn">
                                        <a href="{{url('checkout')}}" class="btn btn-md btn-golden">Proceed to Checkout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- End Coupon Start -->
        </div> <!-- ...:::: End Cart Section:::... -->
        @else

        <!-- ...:::: Start Breadcrumb Section:::... -->
    <div class="breadcrumb-section breadcrumb-bg-color--golden">
        <div class="breadcrumb-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h3 class="breadcrumb-title">Empty Cart</h3>
                        <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                            <nav aria-label="breadcrumb">
                                <ul>
                                    <li><a href="{{url('/')}}">Home</a></li>
                                    <li><a href="{{url('/index-product')}}">Shop</a></li>
                                    <li class="active" aria-current="page">Empty Cart</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- ...:::: End Breadcrumb Section:::... -->

    <!-- ...::::Start About Us Center Section:::... -->
    <div class="empty-cart-section section-fluid">
        <div class="emptycart-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-10 offset-md-1 col-xl-6 offset-xl-3">
                        <div class="emptycart-content text-center">
                            <div class="image">
                                <img class="img-fluid" src="{{ asset('assets/images/emprt-cart/empty-cart.png') }}" alt="">
                            </div>
                            {{-- {{ asset('') }} --}}
                            <h4 class="title">Your Cart is Empty</h4>
                            <h6 class="sub-title">Sorry Mate... No item Found inside your cart!</h6>
                            <a href="{{url('/index-product')}}" class="btn btn-lg btn-golden">Continue Shopping</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- ...::::End  About Us Center Section:::... -->
            
        @endif



@endsection
