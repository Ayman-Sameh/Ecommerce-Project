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
                                <h3 class="breadcrumb-title">Shopping Products</h3>
                                <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                                    <nav aria-label="breadcrumb">
                                        <ul>
                                            <li><a href="{{url('/')}}">Home</a></li>
                                            <li><a href="{{url('/index-product')}}">Shop</a></li>
                                            <li class="active" aria-current="page">Shopping Products</li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- ...:::: End Breadcrumb Section:::... -->
 
       <!-- ...:::: Start Shop Section:::... -->
       <div class="shop-section">
        <div class="container">
            <div class="row flex-column-reverse flex-lg-row">
                <div class="col-lg-3">
                    <!-- Start Sidebar Area -->
                    <div class="siderbar-section" data-aos="fade-up" data-aos-delay="0">

                        <form action="{{url('view-category')}}" method="GET">
                            <!-- Start Single Sidebar Widget -->
                            <div class="sidebar-single-widget">
                                <h6 class="sidebar-title">Filter
                                    <button type="submit" class="btn float-right" style="background: #b19361; color:white">Filter </button>
                                    <a href="{{url('index-product')}}" class="btn float-right" style="background: #ff0303; color:white"> clean</a>
                                </h6>
                                <div class="sidebar-content">
                                    <h6 class="my-3 border-bottom border-3 col-3"><b>Categories</b> </h6>
                                    <ul class="sidebar-menu">
                                        @foreach ($category as $cat)
                                        @php
                                            $checked = [];
                                            if (isset($_GET['filter'])) {
                                                $checked = $_GET['filter'];
                                            }
                                        @endphp
                                        <li>
                                            <input type="checkbox" style="width: 10%;" name="filter[]" value="{{$cat->id}}"
                                              @if (in_array($cat->id , $checked )) checked @endif
                                            /> {{$cat->name}}
                                        <li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="sidebar-content">
                                    <h6 class="my-3 border-bottom border-3 col-3"><b>Price</b> </h6>
                                    <ul class="sidebar-menu">
                                        <li>
                                            <label for="">Min Price</label>
                                            <input type="number" class="border col-5" name="min_price" value="{{request()->min_price}}">
                                        </li>
                                        <li>
                                            <label for="">Max Price</label>
                                            <input type="number" class="border col-5" name="max_price" value="{{request()->max_price}}">
                                        </li>
                                    </ul>
                                </div>
                            </div> <!-- End Single Sidebar Widget -->

                        </form>
                    </div> <!-- End Sidebar Area -->
                </div>
                <div class="col-lg-9">
                    <!-- Start Shop Product Sorting Section -->
                    <div class="shop-sort-section">
                        <div class="container">
                            <div class="row">
                                <!-- Start Sort Wrapper Box -->
                                <div class="sort-box d-flex justify-content-between align-items-md-center align-items-start flex-md-row flex-column"
                                    data-aos="fade-up" data-aos-delay="0">
                                    <!-- Start Sort tab Button -->
                                    <div class="sort-tablist d-flex align-items-center">
                                        <ul class="tablist nav sort-tab-btn">
                                            <li><a class="nav-link active" data-bs-toggle="tab"
                                                    href="#layout-3-grid"><img src="{{ asset('assets/images/icons/bkg_grid.png') }}"
                                                        alt=""></a></li>
                                            <li><a class="nav-link" data-bs-toggle="tab" href="#layout-list"><img
                                                        src="{{ asset('assets/images/icons/bkg_list.png') }}" alt=""></a></li>
                                        </ul>

                                        <!-- Start Page Amount -->
                                        <div class="page-amount ml-2">
                                            <span>Showing </span>
                                        </div> <!-- End Page Amount -->
                                    </div> <!-- End Sort tab Button -->

                                </div> <!-- Start Sort Wrapper Box -->
                            </div>
                        </div>
                    </div> <!-- End Section Content -->

                    <!-- Start Tab Wrapper -->
                    <div class="sort-product-tab-wrapper">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="tab-content tab-animate-zoom">
                                        <!-- Start Grid View Product -->
                                        <div class="tab-pane active show sort-layout-single" id="layout-3-grid">
                                            <div class="row">
                                                @foreach ($product as $prod)
                                                <div class="col-xl-4 col-sm-6 col-12">
                                                        
                                                    <!-- Start Product Default Single Item -->
                                                    <div class="product-default-single-item product-color--golden"
                                                        data-aos="fade-up" data-aos-delay="0">
                                                        <div class="image-box">
                                                            <a href="{{ asset('storage/uploads/Products') }}/{{$prod->image}}" class="image-link">
                                                                <img src="{{ asset('storage/uploads/Products') }}/{{$prod->image}}" style="  height: 311px; width: 270px; image-rendering: auto; " alt="">
                                                            </a>
                                                            <div class="action-link">
                                                                <div class="action-link-left">
                                                                    <a href="{{url('view-product/'. $prod->id)}}" ><i class="fa fa-forward"></i>  More Details</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="content">
                                                            <div class="content-left">
                                                                <h6 class="title"><a
                                                                        href="{{url('view-product/'. $prod->id)}}">{{$prod->name}}</a></h6>
                                                                <ul class="review-star">
                                                                    <li>{{$prod->category->name}}</li>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="content-right">
                                                                <span class="price"><del>${{$prod->price}}</del> ${{((int)$prod->price - (int)$prod->offer)}}</span>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <!-- End Product Default Single Item -->
                                                </div>
                                                @endforeach
                                            </div>
                                        </div> <!-- End Grid View Product -->
                                        <!-- Start List View Product -->
                                        <div class="tab-pane sort-layout-single" id="layout-list">
                                            <div class="row">
                                                @foreach ($product as $prod)
                                                    
                                                <div class="col-12">
                                                    <!-- Start Product Defautlt Single -->
                                                    <div class="product-list-single product-color--golden">
                                                        <a href="product-details-default.html"
                                                            class="product-list-img-link">
                                                            <img class="img-fluid"
                                                                src="storage/uploads/Products/{{$prod->image}}" style="  height: 300px; width: 650px;" alt="">
                                                        </a>
                                                        <div class="product-list-content">
                                                            <h5 class="product-list-link"><a
                                                                    href="product-details-default.html"> {{$prod->name}} </a></h5>
                                                            <ul class="review-star">
                                                                <li>{{$prod->category->name}}</li>
                                                            </ul>
                                                            <span class="product-list-price"><del>${{$prod->price}}</del> ${{((int)$prod->price - (int)$prod->offer)}}</span>
                                                            <p>{{$prod->description}}</p>
                                                            <div class="product-action-icon-link-list">
                                                                    <a href="{{url('view-product/'. $prod->id)}}" class="btn btn-lg btn-black-default-hover" ><i class="fa fa-forward"></i>  More Details</a>
                                                            </div>
                                                        </div>
                                                    </div> <!-- End Product Defautlt Single -->
                                                </div>

                                                @endforeach
                                            </div>
                                        </div> <!-- End List View Product -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- End Tab Wrapper -->

                    <!-- Start Pagination -->
                    <div class="page-pagination text-center" data-aos="fade-up" data-aos-delay="0">
                        <ul>
                            <li>{{$product->links()}}</li>
                        </ul>
                    </div> <!-- End Pagination -->
                </div>
            </div>
        </div>
    </div> <!-- ...:::: End Shop Section:::... -->
    
@endsection