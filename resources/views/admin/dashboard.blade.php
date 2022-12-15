<!DOCTYPE html>
<html lang="en">
    
  @include('admin.layout.head')

  @section('title' , 'Dashboard')

    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">
        
          <!-- Preloader -->
          <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{ asset('assets/images/logo/logo_black.png') }}" alt="Logo">
          </div>

          <!-- Navbar -->
          <nav id="app" class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
              </li>
              <li class="nav-item d-none d-sm-inline-block">
                <a href="{{url('/')}}" class="nav-link">Home</a>
              </li>
              <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link">Contact</a>
              </li>
            </ul>
        
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">

                <li class="nav-item d-none d-sm-inline-block">
                        <form action="{{ route('logout') }}" method="POST" >
                            @csrf
                        <a class="nav-link" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         this.closest('form').submit();">
                            {{ __('Logout') }}
                        </a>
                        </form>
                </li>
              </li>
            </ul>
          </nav>
          <!-- /.navbar -->
        
          <!-- Main Sidebar Container -->
          <aside class="main-sidebar  elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link mb-2">
              <img src="{{ asset('assets/images/logo/logo_black.png') }}" alt="Logo" class="brand-image" >
            </a>
        
            <!-- Sidebar -->
            <div class="sidebar">
              <!-- Sidebar user panel (optional) -->
              <div class="user-panel mt-3 pb-3 mb-3 d-flex border">
                <div class="image">
                  <img src="{{ asset('storage/uploads/user') }}/{{Auth::user()->image}}" class="img-circle elevation-2 mt-3" alt="User Image">
                </div>
                <div class="info">
                  <a href="{{url('/admin/dashboard')}}" class="d-block mt-3 link-dark pl-2">{{ Auth::user()->name }}</a>
                </div>
              </div>
        
              <!-- SidebarSearch Form -->
              {{-- <div class="form-inline">
                <div class="input-group  p-1" data-widget="sidebar-search">
                  <button class="btn btn-sidebar">
                    <i class="fas fa-search fa-fw"></i>
                  </button>
                  <input class="form-control form-control-sidebar rounded-3" type="search" placeholder="Search" aria-label="Search">
                  <div class="input-group-append">
                  </div>
                </div>
              </div> --}}
        
              <!-- Sidebar Menu -->
              <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class
                       with font-awesome or any other icon font library -->
                  
                       <li class="nav-item menu">
                        <a class="nav-link bg-black">
                          <i class="nav-icon fa-solid fa-users"></i>
                          <p>
                            Users
                            <i class="right fas fa-angle-left"></i>
                          </p>
                        </a>
                        <ul class="nav nav-treeview">
                          <li class="nav-item">
                            <a href="{{route('user.index')}}" class="nav-link">
                              <i class="fa fa-arrow-right nav-icon"></i>
                              <p>View Users</p>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="{{route('user.create')}}" class="nav-link">
                              <i class="fa fa-arrow-right nav-icon"></i>
                              <p>Add User</p>
                            </a>
                          </li>
                        </ul>
                      </li>     
                  
                  <li class="nav-item menu">
                    <a class="nav-link bg-black">
                      <i class="nav-icon fa fa-cube "></i>
                      <p>
                        Categories
                        <i class="right fas fa-angle-left"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="{{route('category.index')}}" class="nav-link">
                          <i class="fa fa-arrow-right nav-icon"></i>
                          <p>View Category</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{route('category.create')}}" class="nav-link">
                          <i class="fa fa-arrow-right nav-icon"></i>
                          <p>Add Category</p>
                        </a>
                      </li>
                    </ul>
                  </li>

                  <li class="nav-item menu">
                    <a class="nav-link bg-black">
                      <i class="nav-icon fa-brands fa-shopify"></i>
                      <p>
                        Products
                        <i class="right fas fa-angle-left"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="{{route('product.index')}}" class="nav-link">
                        <i class="fa fa-arrow-right nav-icon"></i>
                        <p>View Products</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{route('product.create')}}" class="nav-link">
                        <i class="fa fa-arrow-right nav-icon"></i>
                        <p>Add Products</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{url('admin/import')}}" class="nav-link">
                        <i class="fa fa-arrow-right nav-icon"></i>
                        <p>Import Products</p>
                      </a>
                    </li>
                    </ul>
                  </li>

                  <li class="nav-item menu">
                    <a class="nav-link bg-black">
                      <i class="nav-icon fa fa-paintbrush"></i>
                      <p>
                        Product Color
                        <i class="right fas fa-angle-left"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="{{route('productcolor.index')}}" class="nav-link">
                        <i class="fa fa-arrow-right nav-icon"></i>
                        <p>View Product Color</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{route('productcolor.create')}}" class="nav-link">
                        <i class="fa fa-arrow-right nav-icon"></i>
                        <p>Add Product Color</p>
                      </a>
                    </li>
                    </ul>
                  </li>

                  <li class="nav-item menu">
                    <a class="nav-link bg-black">
                      <i class="nav-icon fa fa-images"></i>
                      <p>
                        Product Image
                        <i class="right fas fa-angle-left"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="{{route('image.index')}}" class="nav-link">
                        <i class="fa fa-arrow-right nav-icon"></i>
                        <p>View Product Image</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{route('image.create')}}" class="nav-link">
                        <i class="fa fa-arrow-right nav-icon"></i>
                        <p>Add Product Image</p>
                      </a>
                    </li>
                    </ul>
                  </li>

                  <li class="nav-item menu">
                    <a class="nav-link bg-black">
                      <i class="nav-icon fa-solid fa-circle-check"></i>
                      <p>
                        Orders
                        <i class="right fas fa-angle-left"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="{{route('order.index')}}" class="nav-link">
                        <i class="fa fa-arrow-right nav-icon"></i>
                        <p>View Orders</p>
                      </a>
                    </li>
                    </ul>
                  </li>

                  <li class="nav-item menu">
                    <a class="nav-link bg-black">
                      <i class="nav-icon fa-solid fa-tarp"></i>
                      <p>
                        Report
                        <i class="right fas fa-angle-left"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="{{url('admin/report')}}" class="nav-link">
                        <i class="fa fa-arrow-right nav-icon"></i>
                        <p>Report Orders</p>
                      </a>
                    </li>
                    </ul>
                  </li>

                  <li class="nav-item menu">
                    <a class="nav-link bg-black">
                      <i class="nav-icon fa-brands fa-bandcamp"></i>
                      <p>
                        Bannar
                        <i class="right fas fa-angle-left"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="{{route('bannar.index')}}" class="nav-link">
                        <i class="fa fa-arrow-right nav-icon"></i>
                        <p>View Bannar</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{route('bannar.create')}}" class="nav-link">
                        <i class="fa fa-arrow-right nav-icon"></i>
                        <p>Add Bannar</p>
                      </a>
                    </li>
                    </ul>
                  </li>

                  <li class="nav-item menu">
                    <a class="nav-link bg-black">
                      <i class="nav-icon fa-brands fa-squarespace"></i>
                      <p>
                        Brands
                        <i class="right fas fa-angle-left"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="{{route('brand.index')}}" class="nav-link">
                        <i class="fa fa-arrow-right nav-icon"></i>
                        <p>View Brands</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{route('brand.create')}}" class="nav-link">
                        <i class="fa fa-arrow-right nav-icon"></i>
                        <p>Add Brands</p>
                      </a>
                    </li>
                    </ul>
                  </li>
              
                    <li class="nav-item menu">
                      <a class="nav-link bg-black">
                        <i class="nav-icon fa fa-file-lines"></i>
                        <p>
                          Pages
                          <i class="right fas fa-angle-left"></i>
                        </p>
                      </a>
                      <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="{{route('page.index')}}" class="nav-link">
                          <i class="fa fa-arrow-right nav-icon"></i>
                          <p>View Pages</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{route('page.create')}}" class="nav-link">
                          <i class="fa fa-arrow-right nav-icon"></i>
                          <p>Add Pages</p>
                        </a>
                      </li>
                      </ul>
                    </li>

                    <li class="nav-item menu">
                      <a class="nav-link bg-black">
                        <i class="nav-icon fa fa-solid fa-envelope"></i>
                        <p>
                          Massages
                          <i class="right fas fa-angle-left"></i>
                        </p>
                      </a>
                      <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="{{route('massage.index')}}" class="nav-link">
                          <i class="fa fa-arrow-right nav-icon"></i>
                          <p>View Massages</p>
                        </a>
                      </li>
                      </ul>
                    </li>

                    <li class="nav-item menu">
                      <a class="nav-link bg-black">
                        <i class="nav-icon fa fa-wrench"></i>
                        <p>
                          Settings
                          <i class="right fas fa-angle-left"></i>
                        </p>
                      </a>
                      <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="{{url('admin/setting/1/edit')}}" class="nav-link">
                          <i class="fa fa-arrow-right nav-icon"></i>
                          <p>Edit Settings</p>
                        </a>
                      </li>
                      </ul>
                    </li>

                </ul>  
              </nav>
              <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
          </aside>
        
          <!-- Content Wrapper. Contains page content -->
          <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
              <div class="container-fluid">
                <div class="row mb-2">
                  <div class="col-sm-6">
                    <h1 class="m-0"><b>@yield('titlepage')</b></h1>
                  </div><!-- /.col -->
                </div><!-- /.row -->
              </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
        
            <!-- Main content -->
            <section class="content">
              <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                  <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                      <div class="inner">
                        <h3>{{$order}}</h3>
                        <p>Orders</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-bag"></i>
                      </div>
                      <a href="{{url('admin/order')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <!-- ./col -->
                  <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                      <div class="inner">
                        <h3>{{$user}}</h3>
                        <p>Users</p>
                      </div>
                      <div class="icon">
                        <i class="fa-solid fa-user"></i>
                      </div>
                      <a href="{{url('admin/user')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <!-- ./col -->
                  <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                      <div class="inner">
                        <h3>{{$categort}}</h3>
                        <p>Categories</p>
                      </div>
                      <div class="icon">
                        <i class="fa-solid fa-layer-group"></i>
                      </div>
                      <a href="{{url('admin/category')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <!-- ./col -->
                  <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                      <div class="inner">
                        <h3>{{$product}}</h3>
                        <p>Products</p>
                      </div>
                      <div class="icon">
                        <i class="fa-solid fa-basket-shopping"></i>
                      </div>
                      <a href="{{url('admin/product')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <!-- ./col -->
                  <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-purple">
                      <div class="inner">
                        <h3>{{$massages}}</h3>
                        <p>Massages</p>
                      </div>
                      <div class="icon">
                        <i class="fa-solid fa-envelope"></i>
                      </div>
                      <a href="{{url('admin/massage')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <!-- ./col -->
                </div>
                <!-- /.row -->
                  </section>
                  <!-- right col -->
                </div>
                <!-- /.row (main row) -->
              </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->

          @include('admin.layout.footer')

    </body> 

</html>    