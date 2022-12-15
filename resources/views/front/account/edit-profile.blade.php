@extends('front.master')

@section('content')

           <!-- ...:::: Start Breadcrumb Section:::... -->
           <div class="breadcrumb-section breadcrumb-bg-color--golden">
            <div class="breadcrumb-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h3 class="breadcrumb-title">Edit Profile</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- ...:::: End Breadcrumb Section:::... -->
    
        <!-- ...:::: Start Customer Login Section :::... -->
        <div class="customer-login">
            <div class="container">
                <div class="row">
                    <!--login area start-->
                    <div class="col-lg-6 col-md-6 m-auto">
                         <div class="account_form register" data-aos="fade-up" data-aos-delay="200">
                            <form action="{{ url('/update-profile') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                {{-- @method('PUT') --}}
                                @include('front.massage')
                                
                                <div class="default-form-box">
                                    <label for="image">Image</label>
                                    <input id="image" type="file" name="image">
                                </div>
                                <div class="default-form-box">
                                    <label for="name">Name</label>
                                    <input id="name" type="text" name="name" value="@auth  {{Auth::user()->name}}  @endauth">
                                </div>
                                <div class="default-form-box">
                                    <label for="email">Email</label>
                                    <input id="email" type="email" name="email" value="@auth  {{Auth::user()->email}}  @endauth">
                                </div>
        
    
                                <div class="login_submit">
                                    <button type="submit" class="btn btn-md btn-outline-dark mb-4">Edit Profile</button>
                                </div>   
                            </form>
                        </div>
                    </div>
                    <!--login area end-->
                </div>
            </div>
        </div> <!-- ...:::: End Customer Login Section :::... -->

@endsection