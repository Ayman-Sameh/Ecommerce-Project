    <!-- Start Header Area -->
    <header class="header-section d-none d-xl-block">
        <div class="header-wrapper">
            <div class="header-bottom header-bottom-color--black section-fluid sticky-header sticky-color--black">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 d-flex align-items-center justify-content-between">
                            <!-- Start Header Logo -->
                            <div class="header-logo">
                                @foreach ($setting as $set)
                                    
                                <div class="logo">
                                    <a href="{{url('/')}}"><img src="{{ asset('/storage/uploads/Settings') }}/{{$set->logo}}" alt=""></a>
                                </div>
                                @endforeach
                            </div>
                            <!-- End Header Logo -->

                            <!-- Start Header Main Menu -->
                            <div class="main-menu menu-color--white menu-hover-color--pink">
                                <nav>
                                    <ul>
                                        <li class="has-dropdown">
                                            <a class="active main-menu-link" href="{{url('/')}}">Home </a>
                                        </li>
                                        <li class="has-dropdown">
                                            <a class="active main-menu-link" >Shopping <i
                                                    class="fa fa-angle-down"></i></a>
                                            <!-- Sub Menu -->
                                            <ul class="sub-menu">
                                                     {{-- @foreach ($category as $cat) --}}
                                                            
                                                            <li><a href="{{url('index-product')}}">Product</a></li>
                                                                
                                                            {{-- @endforeach --}}
                                                {{-- <li><a href="index-2.html">Home 2</a></li>
                                                <li><a href="index-3.html">Home 3</a></li>
                                                <li><a href="index-4.html">Home 4</a></li> --}}
                                                <ul class="pagination">
                                                    <li> 
                                                        {{-- {{ $category->links() }} --}}
                                                        
                                                    </li>
                                                </ul>
                                            </ul>
                                        </li>
                                        <li>
                                            {{-- <a href="about-us.html">About Us</a> --}}
                                        </li>
                                        <li>
                                            <a href="{{route('contact.create')}}">Contact Us</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            <!-- End Header Main Menu Start -->

                            <!-- Start Header Action Link -->
                            <ul class="header-action-link action-color--white action-hover-color--pink">
                                <li>
                                      <form action="{{url('searchproduct')}}" method="POST">
                                        @csrf
                                        <div class="input-group ">
                                  
                                          <input type="search" name="search" class="form-control text-dark bg-white" id="search_product" placeholder=" Search Product" >
                                          <button class="btn btn-pink" type="submit" title="Search"><i class="fa fa-search"></i> </button>
                                  
                                        </div>
                                    </form>
                                </li>
                                <li>
                                    <a href="#offcanvas-wishlish" class="offcanvas-toggle">
                                        <i class="icon-heart"></i>
                                        <span class="item-count wishlist-count">0</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#offcanvas-add-cart" class="offcanvas-toggle">
                                        <i class="icon-bag"></i>
                                        <span class="item-count cart-count">0</span>
                                    </a>
                                </li>
                                <li>
                                    @auth
                                        
                                    <a href="{{url('/account')}}"  title="{{Auth::user()->name}}">
                                        @endauth
                                        <i class="fa-sharp fa fa-user"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#offcanvas-about" class="offacnvas offside-about offcanvas-toggle">
                                        <i class="icon-menu"></i>
                                    </a>
                                </li>
                            </ul>
                            <!-- End Header Action Link -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Start Header Area -->

    <!-- Start Mobile Header -->
    <div class="mobile-header  mobile-header-bg-color--black section-fluid d-lg-block d-xl-none">
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex align-items-center justify-content-between">
                    <!-- Start Mobile Left Side -->
                    <div class="mobile-header-left">
                        <ul class="mobile-menu-logo">
                            <li>
                                <a href="index.html">
                                    @foreach ($setting as $set)

                                    <div class="logo">
                                        <img src="{{ asset('/storage/uploads/Settings') }}/{{$set->logo}}" alt="">
                                    </div>
                                        
                                    @endforeach
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- End Mobile Left Side -->

                    <!-- Start Mobile Right Side -->
                    <div class="mobile-right-side">
                        <ul class="header-action-link action-color--white action-hover-color--pink">
                            <li>
                                <a href="#search">
                                    <i class="icon-magnifier"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#offcanvas-wishlish" class="offcanvas-toggle">
                                    <i class="icon-heart"></i>
                                    <span class="item-count wishlist-count">0</span>
                                </a>
                            </li>
                            <li>
                                <a href="#offcanvas-add-cart" class="offcanvas-toggle">
                                    <i class="icon-bag"></i>
                                    <span class="item-count cart-count">0</span>
                                </a>
                            </li>
                            <li>
                                <a href="#mobile-menu-offcanvas"
                                    class="offcanvas-toggle offside-menu offside-menu-color--black">
                                    <i class="icon-menu"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- End Mobile Right Side -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Mobile Header -->

    <!--  Start Offcanvas Mobile Menu Section -->
    <div id="mobile-menu-offcanvas" class="offcanvas offcanvas-rightside offcanvas-mobile-menu-section">
        <!-- Start Offcanvas Header -->
        <div class="offcanvas-header text-right">
            <button class="offcanvas-close"><i class="ion-android-close"></i></button>
        </div> <!-- End Offcanvas Header -->
        <!-- Start Offcanvas Mobile Menu Wrapper -->
        <div class="offcanvas-mobile-menu-wrapper">
            <!-- Start Mobile Menu  -->
            <div class="mobile-menu-bottom">
                <!-- Start Mobile Menu Nav -->
                <div class="offcanvas-menu">
                    <ul>
                        <li class="has-dropdown">
                            <a class="active main-menu-link" href="{{url('/')}}">Home </a>
                        </li>
                        <li class="has-dropdown">
                            <a class="active main-menu-link" >Shopping <i
                                    class="fa fa-angle-down"></i></a>
                            <!-- Sub Menu -->
                            <ul class="sub-menu">
                                     {{-- @foreach ($category as $cat) --}}
                                            
                                            <li><a href="{{url('index-product')}}">Product</a></li>
                                                
                                            {{-- @endforeach --}}
                                {{-- <li><a href="index-2.html">Home 2</a></li>
                                <li><a href="index-3.html">Home 3</a></li>
                                <li><a href="index-4.html">Home 4</a></li> --}}
                                <ul class="pagination">
                                    <li> 
                                        {{-- {{ $category->links() }} --}}
                                        
                                    </li>
                                </ul>
                            </ul>
                        </li>
                        <li>
                            {{-- <a href="about-us.html">About Us</a> --}}
                        </li>
                        <li>
                            <a href="{{route('contact.create')}}">Contact Us</a>
                        </li>
                    </ul>
                </div> <!-- End Mobile Menu Nav -->
            </div> <!-- End Mobile Menu -->

            <!-- Start Mobile contact Info -->
            <div class="mobile-contact-info">

                @foreach ($setting as $set)
                
                <div class="logo">
                    <a href="index.html"><img src="{{ asset('/storage/uploads/Settings') }}/{{$set->logo}}" alt=""></a>
                </div>
                
                <address class="address">
                    <span>Address: {{$set->description}}</span>
                    <span>Call Us: {{$set->phone}}</span>
                    <span>Whatsapp: {{$set->whatsapp}}</span>
                    <span>Email: {{$set->email}}</span>
                </address>
                
                <ul class="social-link">
                    <li><a href="{{$set->facebook}}"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="{{$set->twitter}}"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="{{$set->instagram}}"><i class="fa fa-instagram"></i></a></li>
                    <li><a href="{{$set->youtube}}"><i class="fa fa-youtube"></i></a></li>
                </ul>
                
                @endforeach

                <ul class="user-link">
                    <li>
                        <form action="{{ route('logout') }}" method="POST" >
                            @csrf
                        <a class="nav-link" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         this.closest('form').submit();">
                            {{ __('Logout') }}
                        </a>
                        </form>
                    </li>
                    <li>
                        @auth
                        @if(Auth::user()->type == 'admin')
    
                            <a href="{{ url('admin/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                        @endif    
                        @endauth
                    </li>
                </ul>
            </div>
            <!-- End Mobile contact Info -->

        </div> <!-- End Offcanvas Mobile Menu Wrapper -->
    </div> <!-- ...:::: End Offcanvas Mobile Menu Section:::... -->

    <!-- Start Offcanvas Mobile Menu Section -->
    <div id="offcanvas-about" class="offcanvas offcanvas-rightside offcanvas-mobile-about-section">
        <!-- Start Offcanvas Header -->
        <div class="offcanvas-header text-right">
            <button class="offcanvas-close"><i class="ion-android-close"></i></button>
        </div> <!-- End Offcanvas Header -->
        <!-- Start Offcanvas Mobile Menu Wrapper -->
        <!-- Start Mobile contact Info -->
        <div class="mobile-contact-info">

            @foreach ($setting as $set)

            <div class="logo">
                <a href="index.html"><img src="{{ asset('storage/uploads/Settings') }}/{{$set->logo}}" alt=""></a>
            </div>

            <address class="address">
                <span>Address: {{$set->description}}</span>
                <span>Call Us: {{$set->phone}}</span>
                <span>Whatsapp: {{$set->whatsapp}}</span>
                <span>Email: {{$set->email}}</span>
            </address>

            <ul class="social-link">
                <li><a href="{{$set->facebook}}"><i class="fa fa-facebook"></i></a></li>
                <li><a href="{{$set->twitter}}"><i class="fa fa-twitter"></i></a></li>
                <li><a href="{{$set->instagram}}"><i class="fa fa-instagram"></i></a></li>
                <li><a href="{{$set->youtube}}"><i class="fa fa-youtube"></i></a></li>
            </ul>

            @endforeach

            <ul class="user-link">
                <li>
                    @if (Route::has('login'))
                    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                        @auth
                        <form action="{{ route('logout') }}" method="POST" >
                            @csrf
                        <a class="nav-link" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         this.closest('form').submit();">
                            {{ __('Logout') }}
                        </a>
                        </form>
                        @else
                            <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>
    
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif
                </li>
                <li>
                    @auth
                    @if(Auth::user()->type == 'admin')

                        <a href="{{ url('admin/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                    @endif    
                    @endauth
                </li>
            </ul>
        </div>
        <!-- End Mobile contact Info -->
    </div> <!-- ...:::: End Offcanvas Mobile Menu Section:::... -->

    <!-- Start Offcanvas Addcart Section -->
    <div id="offcanvas-add-cart" class="offcanvas offcanvas-rightside offcanvas-add-cart-section">
        <!-- Start Offcanvas Header -->
        <div class="offcanvas-header text-right">
            <button class="offcanvas-close"><i class="ion-android-close"></i></button>
        </div> <!-- End Offcanvas Header -->

        <!-- Start  Offcanvas Addcart Wrapper -->
        <div class="offcanvas-add-cart-wrapper">
            <h4 class="offcanvas-title">Shopping Cart</h4>
            <ul class="offcanvas-cart">

                @php
                    $total = 0;
                @endphp

                @foreach ($cartItem as $item)

                <li class="offcanvas-cart-item-single">
                    <div class="offcanvas-cart-item-block">
                        <a href="{{asset('storage/uploads/Products')}}/{{$item->product->image}}" class="offcanvas-cart-item-image-link">
                            <img src="{{asset('storage/uploads/Products')}}/{{$item->product->image}}" alt=""
                                class="offcanvas-cart-image">
                        </a>
                        <div class="offcanvas-cart-item-content">
                            <a class="offcanvas-cart-item-link">{{$item->product->name}}</a>
                            <div class="offcanvas-cart-item-details">
                                <span class="offcanvas-cart-item-details-quantity">{{$item->product_qty}} x </span>
                                <span class="offcanvas-cart-item-details-price">${{((int)$item->product->price - (int)$item->product->offer)}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="offcanvas-cart-item-delete text-right">
                        {{-- <a href="#" class="offcanvas-cart-item-delete"><i class="fa fa-trash-o"></i></a> --}}
                        <form action="{{url('delete-cart-item/' . $item->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button style="font-size:25px;" ><i class="fa fa-trash-o"></i></button>
                          </form>
                    </div>
                </li>

                @php
                    $total +=(($item->product->price - $item->product->offer) * $item->product_qty);
                @endphp    

                @endforeach
            </ul>
            <div class="offcanvas-cart-total-price">
                <span class="offcanvas-cart-total-price-text">Subtotal:</span>
                <span class="offcanvas-cart-total-price-value">${{$total}}</span>
            </div>
            <ul class="offcanvas-cart-action-button">
                <li><a href="{{url('cart')}}" class="btn btn-block btn-pink">View Cart</a></li>
                <li><a href="{{url('checkout')}}" class=" btn btn-block btn-pink mt-5">Checkout</a></li>
            </ul>
        </div> <!-- End  Offcanvas Addcart Wrapper -->

    </div> <!-- End  Offcanvas Addcart Section -->

    <!-- Start Offcanvas Mobile Menu Section -->
    <div id="offcanvas-wishlish" class="offcanvas offcanvas-rightside offcanvas-add-cart-section">
        <!-- Start Offcanvas Header -->
        <div class="offcanvas-header text-right">
            <button class="offcanvas-close"><i class="ion-android-close"></i></button>
        </div> <!-- ENd Offcanvas Header -->

        <!-- Start Offcanvas Mobile Menu Wrapper -->
        <div class="offcanvas-wishlist-wrapper">
            <h4 class="offcanvas-title">Wishlist</h4>
            <ul class="offcanvas-wishlist">

                @foreach ($wishlist as $item)

                <li class="offcanvas-wishlist-item-single">
                    <div class="offcanvas-wishlist-item-block">
                        <a href="{{asset('storage/uploads/Products')}}/{{$item->product->image}}" class="offcanvas-wishlist-item-image-link"> <img src="{{asset('storage/uploads/Products')}}/{{$item->product->image}}" alt="" class="offcanvas-wishlist-image">
                        </a>
                        <div class="offcanvas-wishlist-item-content">
                            <a class="offcanvas-wishlist-item-link">{{$item->product->name}}</a>
                            <div class="offcanvas-wishlist-item-details">
                                <span class="offcanvas-wishlist-item-details-price">${{((int)$item->product->price - (int)$item->product->offer)}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="offcanvas-wishlist-item-delete text-right">
                        {{-- <a href="#" class="offcanvas-wishlist-item-delete"><i class="fa fa-trash-o"></i></a> --}}
                        <form action="{{url('delete-wish-item/' . $item->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button style="font-size:20px;" ><i class="fa fa-trash-o"></i></button>
                          </form>
                    </div>
                </li>
                    
                @endforeach

                {{-- <li class="offcanvas-wishlist-item-single">
                    <div class="offcanvas-wishlist-item-block">
                        <a href="#" class="offcanvas-wishlist-item-image-link">
                            <img src="assets/images/product/default/home-2/default-1.jpg" alt=""
                                class="offcanvas-wishlist-image">
                        </a>
                        <div class="offcanvas-wishlist-item-content">
                            <a href="#" class="offcanvas-wishlist-item-link">Car Vails</a>
                            <div class="offcanvas-wishlist-item-details">
                                <span class="offcanvas-wishlist-item-details-quantity">3 x </span>
                                <span class="offcanvas-wishlist-item-details-price">$500.00</span>
                            </div>
                        </div>
                    </div>
                    <div class="offcanvas-wishlist-item-delete text-right">
                        <a href="#" class="offcanvas-wishlist-item-delete"><i class="fa fa-trash-o"></i></a>
                    </div>
                </li>
                <li class="offcanvas-wishlist-item-single">
                    <div class="offcanvas-wishlist-item-block">
                        <a href="#" class="offcanvas-wishlist-item-image-link">
                            <img src="assets/images/product/default/home-3/default-1.jpg" alt=""
                                class="offcanvas-wishlist-image">
                        </a>
                        <div class="offcanvas-wishlist-item-content">
                            <a href="#" class="offcanvas-wishlist-item-link">Shock Absorber</a>
                            <div class="offcanvas-wishlist-item-details">
                                <span class="offcanvas-wishlist-item-details-quantity">1 x </span>
                                <span class="offcanvas-wishlist-item-details-price">$350.00</span>
                            </div>
                        </div>
                    </div>
                    <div class="offcanvas-wishlist-item-delete text-right">
                        <a href="#" class="offcanvas-wishlist-item-delete"><i class="fa fa-trash-o"></i></a>
                    </div>
                </li> --}}
            </ul>
            <ul class="offcanvas-wishlist-action-button">
                <li><a href="{{url('wishlist')}}" class="btn btn-block btn-pink">View wishlist</a></li>
            </ul>
        </div> <!-- End Offcanvas Mobile Menu Wrapper -->

    </div> <!-- End Offcanvas Mobile Menu Section -->

    <!-- Start Offcanvas Search Bar Section -->
    {{-- <div id="search" class="search-modal">
        <button type="button" class="close">×</button>
        <form>
            <input type="search" id="search_product" placeholder="type keyword(s) here" />
            <button type="submit" class="btn btn-lg btn-pink">Search</button>
        </form>
    </div> --}}
    <!-- End Offcanvas Search Bar Section -->