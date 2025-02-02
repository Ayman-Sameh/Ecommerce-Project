@extends('front.master')

@section('content')


     <!-- Offcanvas Overlay -->
     <div class="offcanvas-overlay"></div>

     <!-- Start Hero Slider Section-->
     <div class="hero-slider-section">
         <!-- Slider main container -->
         <div class="hero-slider-active swiper-container">
             <!-- Additional required wrapper -->
             <div class="swiper-wrapper">
                 <!-- Start Hero Single Slider Item -->
                 <div class="hero-single-slider-item swiper-slide">
                     <!-- Hero Slider Image -->
                     <div class="hero-slider-bg">
                         <img src="{{ asset('assets/images/hero-slider/home-3/hero-slider-1.jpg') }}" alt="">
                     </div>
                     <!-- Hero Slider Content -->
                     <div class="hero-slider-wrapper">
                         <div class="container">
                             <div class="row">
                                 <div class="col-auto">
                                     <div class="hero-slider-content">
                                         <h4 class="subtitle">New collection</h4>
                                         <h1 class="title">New Series of <br> Degital Watch </h1>
                                         <a href="{{url('index-product')}}" class="btn btn-lg btn-pink">shop now </a>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div> <!-- End Hero Single Slider Item -->
                 <!-- Start Hero Single Slider Item -->
                 <div class="hero-single-slider-item swiper-slide">
                     <!-- Hero Slider Image -->
                     <div class="hero-slider-bg">
                         <img src="{{ asset('assets/images/hero-slider/home-3/hero-slider-2.jpg') }}" alt="">
                     </div>
                     <!-- Hero Slider Content -->
                     <div class="hero-slider-wrapper">
                         <div class="container">
                             <div class="row">
                                 <div class="col-auto">
                                     <div class="hero-slider-content">
                                         <h4 class="subtitle">New collection</h4>
                                         <h1 class="title">Best Of HiFi <br> Loud Speaker</h1>
                                         <a href="{{url('index-product')}}" class="btn btn-lg btn-pink">shop now </a>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div> <!-- End Hero Single Slider Item -->
             </div>
 
             <!-- If we need pagination -->
             <div class="swiper-pagination active-color-pink"></div>
 
             <!-- If we need navigation buttons -->
             <div class="swiper-button-prev d-none d-lg-block"></div>
             <div class="swiper-button-next d-none d-lg-block"></div>
         </div>
     </div>
     <!-- End Hero Slider Section-->
 
     <!-- Start Service Section -->
     <div class="service-promo-section section-top-gap-100">
         <div class="service-wrapper">
             <div class="container">
                 <div class="row">
                     <!-- Start Service Promo Single Item -->
                     <div class="col-lg-3 col-sm-6 col-12">
                         <div class="service-promo-single-item" data-aos="fade-up" data-aos-delay="0">
                             <div class="image">
                                 <img src="{{ asset('assets/images/icons/service-promo-5.png') }}" alt="">
                             </div>
                             <div class="content">
                                 <h6 class="title">FREE SHIPPING</h6>
                                 <p>Get 10% cash back, free shipping, free returns, and more at 1000+ top retailers!</p>
                             </div>
                         </div>
                     </div>
                     <!-- End Service Promo Single Item -->
                     <!-- Start Service Promo Single Item -->
                     <div class="col-lg-3 col-sm-6 col-12">
                         <div class="service-promo-single-item" data-aos="fade-up" data-aos-delay="200">
                             <div class="image">
                                 <img src="{{ asset('assets/images/icons/service-promo-6.png') }}" alt="">
                             </div>
                             <div class="content">
                                 <h6 class="title">30 DAYS MONEY BACK</h6>
                                 <p>100% satisfaction guaranteed, or get your money back within 30 days!</p>
                             </div>
                         </div>
                     </div>
                     <!-- End Service Promo Single Item -->
                     <!-- Start Service Promo Single Item -->
                     <div class="col-lg-3 col-sm-6 col-12">
                         <div class="service-promo-single-item" data-aos="fade-up" data-aos-delay="400">
                             <div class="image">
                                 <img src="{{ asset('assets/images/icons/service-promo-7.png') }}" alt="">
                             </div>
                             <div class="content">
                                 <h6 class="title">SAFE PAYMENT</h6>
                                 <p>Pay with the world’s most popular and secure payment methods.</p>
                             </div>
                         </div>
                     </div>
                     <!-- End Service Promo Single Item -->
                     <!-- Start Service Promo Single Item -->
                     <div class="col-lg-3 col-sm-6 col-12">
                         <div class="service-promo-single-item" data-aos="fade-up" data-aos-delay="600">
                             <div class="image">
                                 <img src="{{ asset('assets/images/icons/service-promo-8.png') }}" alt="">
                             </div>
                             <div class="content">
                                 <h6 class="title">LOYALTY CUSTOMER</h6>
                                 <p>Card for the other 30% of their purchases at a rate of 1% cash back.</p>
                             </div>
                         </div>
                     </div>
                     <!-- End Service Promo Single Item -->
                 </div>
             </div>
         </div>
     </div>
     <!-- End Service Section -->
 
     <!-- Start First Banner Section -->
     <div class="banner-section section-top-gap-100">
         <div class="banner-wrapper clearfix">

             @foreach ($bannar as $ban)
               @if ($ban->select == '1')
                    <!-- Start Banner Single Item -->
                    <a href="{{url('index-product')}}">
                        <div class="banner-single-item banner-style-7 banner-animation banner-color--green float-left"
                            data-aos="fade-up" data-aos-delay="0">
                                <div class="image">
                                    <img class="img-fluid" src="{{ asset('/storage/uploads/bannar') }}/{{$ban->image}}" alt="">
                                </div>
                                
                            </div>
                    </a>
                    <!-- End Banner Single Item -->
                @endif
            @endforeach
         </div>
     </div>
     <!-- End Banner Section -->
 
     <!-- Start Product Default Slider Section -->
     <div class="product-default-slider-section section-top-gap-100 section-fluid">
         <!-- Start Section Content Text Area -->
         <div class="section-title-wrapper" data-aos="fade-up" data-aos-delay="0">
             <div class="container">
                 <div class="row">
                     <div class="col-12">
                         <div class="section-content-gap">
                             <div class="secton-content">
                                 <h3 class="section-title">the New arrivals</h3>
                                 <p>Preorder now to receive exclusive deals & gifts</p>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         <!-- Start Section Content Text Area -->
         <div class="product-wrapper" data-aos="fade-up" data-aos-delay="200">
             <div class="container">
                 <div class="row">
                     <div class="col-12">
                         <div class="product-slider-default-2rows default-slider-nav-arrow">
                             <!-- Slider main container -->
                             <div class="swiper-container product-default-slider-4grid-2row">
                                 <!-- Additional required wrapper -->
                                 <div class="swiper-wrapper">
                                     <!-- Start Product Default Single Item -->

                                     
                                    @foreach ($product as $prod)
                                     <div class="product-default-single-item product-color--pink swiper-slide" id="{{$prod->id}}"> 
                                         <div class="image-box">
                                             <a href="storage/uploads/Products/{{$prod->image}}" class="image-link">
                                                 <img src="storage/uploads/Products/{{$prod->image}}" style="  height: 311px; width: 270px; image-rendering: auto; " alt=""> </a>
                                             <div class="action-link">
                                                 <div class="action-link-left">
                                                     <a href="{{url('view-product/'. $prod->id)}}" ><i class="fa fa-forward"></i>  More Details</a>
                                                 </div>
                                             </div>
                                         </div>
                                         <div class="content">
                                             <div class="content-left">
                                                 <h6 class="title col-12"><a href="{{url('view-product/'. $prod->id)}}">{{$prod->name}}</a></h6>
                                                 <ul class="">
                                                    <li> {{$prod->category->name}} </li>
                                                 </ul>
                                             </div>
                                             <div class="content-right ">
                                                 <span class="price"><del>${{$prod->price}}</del> ${{((int)$prod->price - (int)$prod->offer)}}</span>
                                             </div>
 
                                         </div>
                                        </div>
                                    @endforeach
                                     <!-- End Product Default Single Item -->
                                 </div>
                             </div>
                             <!-- If we need navigation buttons -->
                             <div class="swiper-button-prev"></div>
                             <div class="swiper-button-next"></div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <!-- End Product Default Slider Section -->
 
     <!-- Start Second Banner Section  -->
     <div class="banner-section section-top-gap-100">
         <div class="banner-wrapper clearfix">

            @foreach ($bannar as $ban)
                @if ($ban->select == '2')

                     <!-- Start Banner Single Item -->
                    <a href="{{url('index-product')}}">
                        <div class="banner-single-item banner-style-8 banner-animation banner-color--green float-left"
                            data-aos="fade-up" data-aos-delay="0">
                            <div class="image">
                                <img class="img-fluid" src="{{ asset('/storage/uploads/bannar') }}/{{$ban->image}}" alt="">
                            </div>
                        </div>
                    </a>
                    <!-- End Banner Single Item -->

                @endif
            @endforeach
         </div>
     </div>
     <!-- End Banner Section -->
 
     <!-- Start Product Default Slider Section -->
     <div class="product-default-slider-section section-fluid section-inner-bg">
         <!-- Start Section Content Text Area -->
         <div class="section-title-wrapper" data-aos="fade-up" data-aos-delay="0">
             <div class="container">
                 <div class="row">
                     <div class="col-12">
                         <div class="section-content-gap">
                             <div class="secton-content">
                                 <h3 class="section-title">BEST SELLERS</h3>
                                 <p>Add our best sellers to your weekly lineup.</p>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         <!-- Start Section Content Text Area -->
         <div class="product-wrapper" data-aos="fade-up" data-aos-delay="0">
             <div class="container">
                 <div class="row">
                     <div class="col-12">
                         <div class="product-slider-default-1row default-slider-nav-arrow">
                             <!-- Slider main container -->
                             <div class="swiper-container product-default-slider-4grid-1row">
                                 <!-- Additional required wrapper -->
                                 <div class="swiper-wrapper">
                                     @foreach ($product_best as $prod)
                                     <div class="product-default-single-item product-color--pink swiper-slide" id="{{$prod->id}}"> 
                                         <div class="image-box">
                                             <a href="storage/uploads/Products/{{$prod->image}}" class="image-link">
                                                 <img src="storage/uploads/Products/{{$prod->image}}" style="  height: 311px; width: 270px; image-rendering: auto; " alt=""> </a>
                                             <div class="action-link">
                                                 <div class="action-link-left">
                                                     <a href="{{url('view-product/'. $prod->id)}}" ><i class="fa fa-forward"></i>  More Details</a>
                                                 </div>
                                             </div>
                                         </div>
                                         <div class="content">
                                             <div class="content-left">
                                                 <h6 class="title col-12"><a href="{{url('view-product/'. $prod->id)}}">{{$prod->name}}</a></h6>
                                                 <ul class="">
                                                    <li> {{$prod->category->name}} </li>
                                                 </ul>
                                             </div>
                                             <div class="content-right ">
                                                 <span class="price"><del>${{$prod->price}}</del> ${{((int)$prod->price - (int)$prod->offer)}}</span>
                                             </div>
 
                                         </div>
                                        </div>
                                    @endforeach
                                 </div>
                             </div>
                             <!-- If we need navigation buttons -->
                             <div class="swiper-button-prev"></div>
                             <div class="swiper-button-next"></div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <!-- End Product Default Slider Section -->
 
     <!-- Start Blog Slider Section -->
     {{-- <div class="blog-default-slider-section section-top-gap-100 section-fluid">
         <!-- Start Section Content Text Area -->
         <div class="section-title-wrapper" data-aos="fade-up" data-aos-delay="0">
             <div class="container">
                 <div class="row">
                     <div class="col-12">
                         <div class="section-content-gap">
                             <div class="secton-content">
                                 <h3 class="section-title">THE LATEST BLOGS</h3>
                                 <p>Present posts in a best way to highlight interesting moments of your blog.</p>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         <!-- Start Section Content Text Area -->
         <div class="blog-wrapper" data-aos="fade-up" data-aos-delay="200">
             <div class="container">
                 <div class="row">
                     <div class="col-12">
                         <div class="blog-default-slider default-slider-nav-arrow">
                             <!-- Slider main container -->
                             <div class="swiper-container blog-slider">
                                 <!-- Additional required wrapper -->
                                 <div class="swiper-wrapper">
                                     <!-- Start Product Default Single Item -->
                                     <div class="blog-default-single-item blog-color--pink swiper-slide">
                                         <div class="image-box">
                                             <a href="blog-single-sidebar-left.html" class="image-link">
                                                 <img class="img-fluid"
                                                     src="assets/images/blog/blog-grid-home-1-img-1.jpg" alt="">
                                             </a>
                                         </div>
                                         <div class="content">
                                             <h6 class="title"><a href="blog-single-sidebar-left.html">Blog Post One</a>
                                             </h6>
                                             <p>Donec vitae hendrerit arcu, sit amet faucibus nisl. Cras pretium arcu ex.
                                                 Aenean posuere libero eu augue condimentum rhoncus. Praesent</p>
                                             <div class="inner">
                                                 <a href="blog-single-sidebar-left.html"
                                                     class="read-more-btn icon-space-left">Read More <span><i
                                                             class="ion-ios-arrow-thin-right"></i></span></a>
                                                 <div class="post-meta">
                                                     <a href="#" class="date">24 Apr</a>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                     <!-- End Product Default Single Item -->
                                     <!-- Start Product Default Single Item -->
                                     <div class="blog-default-single-item blog-color--pink swiper-slide">
                                         <div class="image-box">
                                             <a href="blog-single-sidebar-left.html" class="image-link">
                                                 <img class="img-fluid"
                                                     src="assets/images/blog/blog-grid-home-1-img-2.jpg" alt="">
                                             </a>
                                         </div>
                                         <div class="content">
                                             <h6 class="title"><a href="blog-single-sidebar-left.html">Blog Post Two</a>
                                             </h6>
                                             <p>Donec vitae hendrerit arcu, sit amet faucibus nisl. Cras pretium arcu ex.
                                                 Aenean posuere libero eu augue condimentum rhoncus. Praesent</p>
                                             <div class="inner">
                                                 <a href="#" class="read-more-btn icon-space-left">Read More <span><i
                                                             class="ion-ios-arrow-thin-right"></i></span></a>
                                                 <div class="post-meta">
                                                     <a href="blog-single-sidebar-left.html" class="date">24 Apr</a>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                     <!-- End Product Default Single Item -->
                                     <!-- Start Product Default Single Item -->
                                     <div class="blog-default-single-item blog-color--pink swiper-slide">
                                         <div class="image-box">
                                             <a href="blog-single-sidebar-left.html" class="image-link">
                                                 <img class="img-fluid"
                                                     src="assets/images/blog/blog-grid-home-1-img-3.jpg" alt="">
                                             </a>
                                         </div>
                                         <div class="content">
                                             <h6 class="title"><a href="blog-single-sidebar-left.html">Blog Post
                                                     Three</a></h6>
                                             <p>Donec vitae hendrerit arcu, sit amet faucibus nisl. Cras pretium arcu ex.
                                                 Aenean posuere libero eu augue condimentum rhoncus. Praesent</p>
                                             <div class="inner">
                                                 <a href="blog-single-sidebar-left.html"
                                                     class="read-more-btn icon-space-left">Read More <span><i
                                                             class="ion-ios-arrow-thin-right"></i></span></a>
                                                 <div class="post-meta">
                                                     <a href="#" class="date">24 Apr</a>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                     <!-- End Product Default Single Item -->
                                     <!-- Start Product Default Single Item -->
                                     <div class="blog-default-single-item blog-color--pink swiper-slide">
                                         <div class="image-box">
                                             <a href="blog-single-sidebar-left.html" class="image-link">
                                                 <img class="img-fluid"
                                                     src="assets/images/blog/blog-grid-home-1-img-4.jpg" alt="">
                                             </a>
                                         </div>
                                         <div class="content">
                                             <h6 class="title"><a href="blog-single-sidebar-left.html">Blog Post Four</a>
                                             </h6>
                                             <p>Donec vitae hendrerit arcu, sit amet faucibus nisl. Cras pretium arcu ex.
                                                 Aenean posuere libero eu augue condimentum rhoncus. Praesent</p>
                                             <div class="inner">
                                                 <a href="blog-single-sidebar-left.html"
                                                     class="read-more-btn icon-space-left">Read More <span><i
                                                             class="ion-ios-arrow-thin-right"></i></span></a>
                                                 <div class="post-meta">
                                                     <a href="#" class="date">24 Apr</a>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                     <!-- End Product Default Single Item -->
                                     <!-- Start Product Default Single Item -->
                                     <div class="blog-default-single-item blog-color--pink swiper-slide">
                                         <div class="image-box">
                                             <a href="blog-single-sidebar-left.html" class="image-link">
                                                 <img class="img-fluid"
                                                     src="assets/images/blog/blog-grid-home-1-img-5.jpg" alt="">
                                             </a>
                                         </div>
                                         <div class="content">
                                             <h6 class="title"><a href="blog-single-sidebar-left.html">Blog Post Five</a>
                                             </h6>
                                             <p>Donec vitae hendrerit arcu, sit amet faucibus nisl. Cras pretium arcu ex.
                                                 Aenean posuere libero eu augue condimentum rhoncus. Praesent</p>
                                             <div class="inner">
                                                 <a href="blog-single-sidebar-left.html"
                                                     class="read-more-btn icon-space-left">Read More <span><i
                                                             class="ion-ios-arrow-thin-right"></i></span></a>
                                                 <div class="post-meta">
                                                     <a href="#" class="date">24 Apr</a>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                     <!-- End Product Default Single Item -->
                                     <!-- Start Product Default Single Item -->
                                     <div class="blog-default-single-item blog-color--pink swiper-slide">
                                         <div class="image-box">
                                             <a href="blog-single-sidebar-left.html" class="image-link">
                                                 <img class="img-fluid"
                                                     src="assets/images/blog/blog-grid-home-1-img-6.jpg" alt="">
                                             </a>
                                         </div>
                                         <div class="content">
                                             <h6 class="title"><a href="blog-single-sidebar-left.html">Blog Post Six</a>
                                             </h6>
                                             <p>Donec vitae hendrerit arcu, sit amet faucibus nisl. Cras pretium arcu ex.
                                                 Aenean posuere libero eu augue condimentum rhoncus. Praesent</p>
                                             <div class="inner">
                                                 <a href="blog-single-sidebar-left.html"
                                                     class="read-more-btn icon-space-left">Read More <span><i
                                                             class="ion-ios-arrow-thin-right"></i></span></a>
                                                 <div class="post-meta">
                                                     <a href="#" class="date">24 Apr</a>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                     <!-- End Product Default Single Item -->
                                 </div>
                             </div>
                             <!-- If we need navigation buttons -->
                             <div class="swiper-button-prev"></div>
                             <div class="swiper-button-next"></div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div> --}}
     <!-- End Blog Slider Section -->
 
     <!-- Start Company Logo Section -->
     <div class="company-logo-section section-top-gap-100 section-fluid">
         <div class="company-logo-wrapper" data-aos="fade-up" data-aos-delay="0">
             <div class="container">
                 <div class="row">
                     <div class="col-12">
                         <div class="company-logo-slider default-slider-nav-arrow">
                             <!-- Slider main container -->
                             <div class="swiper-container company-logo-slider">
                                 <!-- Additional required wrapper -->
                                 <div class="swiper-wrapper">

                                    @foreach ($brand as $brands)

                                        <!-- Start Company Logo Single Item -->
                                        <div class="company-logo-single-item swiper-slide">
                                            <div class="image"><img class="img-fluid"
                                                    src="{{ asset('/storage/uploads/brand') }}/{{$brands->image}}" alt=""></div>
                                        </div>
                                        <!-- End Company Logo Single Item -->
                                        
                                    @endforeach
                                 </div>
                             </div>
                             <!-- If we need navigation buttons -->
                             <div class="swiper-button-prev d-none d-md-block"></div>
                             <div class="swiper-button-next d-none d-md-block"></div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <!-- End Company Logo Section -->
   
    
@endsection
