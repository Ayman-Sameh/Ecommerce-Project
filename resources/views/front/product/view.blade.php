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
                        <h3 class="breadcrumb-title">{{$product->name}}</h3>
                        <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                            <nav aria-label="breadcrumb">
                                <ul>
                                    <li><a href="{{url('/')}}">Home</a></li>
                                    <li><a href="{{url('index-product')}}">Shop</a></li>
                                    <li class="active" aria-current="page">{{$product->name}}</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- ...:::: End Breadcrumb Section:::... -->

    <!-- Start Product Details Section -->
    <div class="product-details-section">
        <div class="container">
            <div class="row product_data">
                <div class="col-xl-5 col-lg-6">
                    <div class="product-details-gallery-area" data-aos="fade-up" data-aos-delay="0">
                        <!-- Start Large Image -->
                        <div class="product-large-image product-large-image-horaizontal swiper-container">
                            <div class="swiper-wrapper">
                                <div class="product-image-large-image swiper-slide zoom-image-hover img-responsive">
                                    <img src="{{ asset('storage/uploads/Products') }}/{{$product->image}}" alt="">
                                </div>
                                @foreach ($imgproduct as $img)
                                    
                                <div class="product-image-large-image swiper-slide zoom-image-hover img-responsive">
                                    <img src="{{ asset('storage/uploads/Image-Product') }}/{{$img->image}}" alt="">
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- End Large Image -->
                        <!-- Start Thumbnail Image -->
                        <div
                            class="product-image-thumb product-image-thumb-horizontal swiper-container pos-relative mt-5">
                            <div class="swiper-wrapper">
                                <div class="product-image-thumb-single swiper-slide">
                                    <img class="img-fluid" src="{{ asset('storage/uploads/Products') }}/{{$product->image}}"
                                        alt="">
                                </div>
                                @foreach ($imgproduct as $img)
                                    
                                <div class="product-image-thumb-single swiper-slide">
                                    <img class="img-fluid" src="{{ asset('storage/uploads/Image-Product') }}/{{$img->image}}"
                                        alt="">
                                </div>
                                @endforeach
                            </div>
                            <!-- Add Arrows -->
                            <div class="gallery-thumb-arrow swiper-button-next"></div>
                            <div class="gallery-thumb-arrow swiper-button-prev"></div>
                        </div>
                        <!-- End Thumbnail Image -->
                    </div>
                </div>
                <div class="col-xl-7 col-lg-6">
                    <div class="product-details-content-area product-details--golden" data-aos="fade-up"
                        data-aos-delay="200">
                        <!-- Start  Product Details Text Area-->
                        <div class="product-details-text">
                            <h4 class="title">{{$product->name}}    </h4>
                            <div class="d-flex align-items-center">
                                <ul class="review-star">
                                    {{-- <li>{{$product->category->name}}</li> --}}
                                    <li class="fill"><i class="ion-android-star"></i></li>
                                    <li class="fill"><i class="ion-android-star"></i></li>
                                    <li class="fill"><i class="ion-android-star"></i></li>
                                    <li class="fill"><i class="ion-android-star"></i></li>
                                    <li class="empty"><i class="ion-android-star"></i></li>
                                </ul>
                                {{-- <a href="#" class="customer-review ml-2">(customer review )</a> --}}
                            </div>
                            <div class="price"><del>${{$product->price}}</del>   ${{((int)$product->price - (int)$product->offer)}}</div>
                            <p> {{$product->description}} </p>
                        </div> <!-- End  Product Details Text Area-->
                            <div class="variable-single-item" style="margin-bottom: 47px; ">
                                <span>Color</span>
                                <div class="product-variable-color">
                                        <select class="color-select color_input col-4">
                                            <option selected disabled> Select Color</option>
                                            @foreach ($colorproduct as $color)
                                            <option value="{{$color->id}}" selected>{{$color->name}}
                                            
                                               </option>
                                            @endforeach
                                        </select>
                                    
                                        @foreach ($colorproduct as $color)
                                        <div class="color-select" style="margin-left: 230px;">

                                            <h6 class="col-1 border"  style="background-color:{{$color->color}}; padding:15px;"></h2>
                                        </div>
                                        @endforeach
                                        
                                </div>
                            </div>

                            <div class="d-flex align-items-center ">
                                <div class="variable-single-item ">
                                    <input type="hidden" value="{{$product->id}}" class="product_id">
                                    <span class="mt-5">Quantity</span>
                                    <div class="product-variable-quantity">
                                        <input min="1" max="100" value="1" class="qty_input" type="number">
                                    </div>
                                </div>

                                <div class="product-add-to-cart-btn mt-5">
                                    <a href="add-to-cart" class="addToCart" data-bs-toggle="modal" data-bs-target="#modalAddcart">+ Add To Cart</a>
                                </div>
                            </div>
                            <!-- Start  Product Details Meta Area-->
                            <div class="product-details-meta mb-20 m-3">
                                <a href="add-to-wishlist" class="icon-space-right addtowishlist"><i class="icon-heart "></i>Add to wishlist</a>
                            </div> <!-- End  Product Details Meta Area-->
                        </div> <!-- End Product Variable Area -->

                        <!-- Start  Product Details Catagories Area-->
                        <div class="product-details-catagory mb-2">
                            <span class="title">CATEGORIES:</span>
                            <ul>
                                <li><a href="">{{$product->category->name}}</a></li>
                            </ul>
                        </div> <!-- End  Product Details Catagories Area-->


                        <!-- Start  Product Details Social Area-->
                        <div class="product-details-social">
                            <span class="title">SHARE THIS PRODUCT:</span>
                            <ul>
                                @foreach ($setting as $set)
                                    
                                <li><a href="{{$set->facebook}}"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="{{$set->twitter}}"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="{{$set->instagram}}"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="{{$set->youtube}}"><i class="fa fa-youtube"></i></a></li>

                                @endforeach
                            </ul>
                        </div> <!-- End  Product Details Social Area-->
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End Product Details Section -->

@endsection