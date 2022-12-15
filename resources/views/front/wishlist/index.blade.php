@extends('front.master')

@section('content')

        <!-- Offcanvas Overlay -->
        <div class="offcanvas-overlay"></div>

        @if ($wishlist->count() > 0)
         <!-- ...:::: Start Breadcrumb Section:::... -->
        <div class="breadcrumb-section breadcrumb-bg-color--golden">
            <div class="breadcrumb-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h3 class="breadcrumb-title">Wishlist</h3>
                            <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                                <nav aria-label="breadcrumb">
                                    <ul>
                                        <li><a href="{{url('/')}}">Home</a></li>
                                        <li><a href="{{url('/index-product')}}">Shop</a></li>
                                        <li class="active" aria-current="page">Wishlist</li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- ...:::: End Breadcrumb Section:::... -->

    <!-- ...:::: Start Wishlist Section:::... -->
    <div class="wishlist-section">
        <!-- Start Cart Table -->
        <div class="wishlish-table-wrapper" data-aos="fade-up" data-aos-delay="0">
            <div class="container">
                <div class="row product_data">
                    <div class="col-12">
                        <div class="table_desc">
                            <div class="table_page table-responsive">
                                @include('front.massage')
                                <table>
                                    <!-- Start Wishlist Table Head -->
                                    <thead>
                                        <tr>
                                            <th class="product_remove">Delete</th>
                                            <th class="product_thumb">Image</th>
                                            <th class="product_name">Product</th>
                                            <th class="product-price">Price</th>
                                            <th class="product_quantity">Quantity</th>
                                            {{-- <th class="product_quantity">Color</th> --}}
                                            <th class="product_addcart">Add To Cart</th>
                                        </tr>
                                    </thead> <!-- End Cart Table Head -->
                                    <tbody>
                                        <!-- Start Wishlist Single Item-->
                                        @foreach ($wishlist as $item)

                                        <tr>
                                            <td class="product_remove">
                                                <form action="{{url('delete-wish-item/' . $item->id)}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button style="font-size:25px;" ><i class="fa fa-trash-o"></i></button>
                                                  </form>
                                            </td>
                                            <td class="product_thumb"><a href="{{asset('storage/uploads/Products')}}/{{$item->product->image}}"><img src="{{asset('storage/uploads/Products')}}/{{$item->product->image}}" alt=""></a></td>
                                            <td class="product_name"><a >{{$item->product->name}}</a></td>      
                                            <td class="product-price">${{((int)$item->product->price - (int)$item->product->offer)}}</td>
                                            <td class="product_quantity">
                                                <input type="hidden" class="product_id" value="{{$item->product_id}}">
                                                <input type="hidden" class="color_input" value="1">
                                                <label>Quantity</label> 
                                                <input min="1" max="100" value="1" class="qty_input" type="number">
                                            </td>
                                            <td class="product_addcart"><a href="add-to-cart" class="btn btn-md btn-golden addToCart" data-bs-toggle="modal" data-bs-target="#modalAddcart">Add To Cart</a>
                                            </td>
                                        </tr> <!-- End Wishlist Single Item-->
                                            
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- End Cart Table -->
    </div> <!-- ...:::: End Wishlist Section:::... -->
        @else

        <!-- ...:::: Start Breadcrumb Section:::... -->
    <div class="breadcrumb-section breadcrumb-bg-color--golden">
        <div class="breadcrumb-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h3 class="breadcrumb-title">Empty Wishlist</h3>
                        <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                            <nav aria-label="breadcrumb">
                                <ul>
                                    <li><a href="{{url('/')}}">Home</a></li>
                                    <li><a href="{{url('/index-product')}}">Shop</a></li>
                                    <li class="active" aria-current="page">Empty Wishlist</li>
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
                            
                            <h4 class="title">Your Wishlist is Empty</h4>
                            <h6 class="sub-title">Sorry Mate... No item Found inside your Wishlist!</h6>
                            <a href="{{url('/index-product')}}" class="btn btn-lg btn-golden">Continue Shopping</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- ...::::End  About Us Center Section:::... -->
            
        @endif



@endsection
