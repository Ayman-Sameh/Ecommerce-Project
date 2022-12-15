@extends('front.master')

@section('content')

           <!-- ...:::: Start Breadcrumb Section:::... -->
           <div class="breadcrumb-section breadcrumb-bg-color--golden">
            <div class="breadcrumb-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h3 class="breadcrumb-title">change password</h3>
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
                            <form method="POST" action="{{ url('/update-password') }}">
                                @csrf
                                @include('front.massage')
                                
                                <div class="default-form-box">
                                    <label for="old_password">Old Password</label>
                                    <input id="old_password" type="password" name="old_password">
                                </div>
                                <div class="default-form-box">
                                    <label for="new_password">New Password</label>
                                    <input id="new_password" type="password" name="new_password">
                                </div>
                                <div class="default-form-box">
                                    <label for="new_password_confirmation">Confirm Password</label>
                                    <input id="new_password_confirmation" type="password" name="new_password_confirmation">
                                </div>
        
    
                                <div class="login_submit">
                                    <button type="submit" class="btn btn-md btn-outline-dark mb-4">Change Password</button>
                                </div>   
                            </form>
                        </div>
                    </div>
                    <!--login area end-->
                </div>
            </div>
        </div> <!-- ...:::: End Customer Login Section :::... -->

@endsection