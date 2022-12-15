@extends('layouts.app')

@section('content')
       <!-- ...:::: Start Breadcrumb Section:::... -->
       <div class="breadcrumb-section breadcrumb-bg-color--golden">
        <div class="breadcrumb-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h3 class="breadcrumb-title">Login</h3>
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
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="default-form-box">
                                <label for="email">{{ __('Email Address') }}</label>
    
                                    <input id="email" type="email" class="@error('email') is-invalid @enderror"  name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
    
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
    
                            <div class="default-form-box">
                                <label for="password">{{ __('Password') }}</label>
    

                                    <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
    
                                    @error('password')
                                        <span role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>

                            <div class="login_submit">
                                <button type="submit" class="btn btn-md btn-outline-dark mb-4">
                                    {{ __('Login') }}
                                </button>
                                <label class="checkbox-default mb-4">
                                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <span for="remember">
                                        {{ __('Remember Me') }}
                                    </span>
                                </label>
                                @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                                </div>
                            </div>   
                        </form>
                    </div>
                </div>
                <!--login area end-->
            </div>
        </div>
    </div> <!-- ...:::: End Customer Login Section :::... -->

    <!-- Start Footer Section -->
    <footer class="footer-section footer-bg section-top-gap-100">
        <div class="footer-wrapper">

            <!-- Start Footer Center -->
            <div class="footer-center">
                <div class="container">
                    <div class="row mb-n6">
                        <div class="col-xl-3 col-lg-4 col-md-6 mb-6">
                            <div class="footer-social" data-aos="fade-up" data-aos-delay="0">
                                <h4 class="title">FOLLOW US</h4>
                                <ul class="footer-social-link">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-6 col-md-6 mb-6">
                            <div class="footer-newsletter" data-aos="fade-up" data-aos-delay="200">
                                <h4 class="title">DON'T MISS OUT ON THE LATEST</h4>
                                <div class="form-newsletter">
                                    <form action="#" method="post">
                                        <div class="form-fild-newsletter-single-item input-color--golden">
                                            <input type="email" placeholder="Your email address..." required>
                                            <button type="submit">SUBSCRIBE!</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
            <!-- Start Footer Center -->

            <!-- Start Footer Bottom -->
            <div class="footer-bottom">
                <div class="container">
                    <div
                        class="row justify-content-between align-items-center align-items-center flex-column flex-md-row mb-n6">
                        <div class="col-auto mb-6">
                            <div class="footer-copyright">
                                <p class="copyright-text">&copy; 2021 <a href="index.html">therankme</a>. Made with <i
                                        class="fa fa-heart text-danger"></i> by <a href="https://therankme.com/"
                                        target="_blank">therankme</a> </p>

                            </div>
                        </div>
                        <div class="col-auto mb-6">
                            <div class="footer-payment">
                                <div class="image">
                                    <img src="assets/images/company-logo/payment.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Start Footer Bottom -->
        </div>
    </footer>
    <!-- End Footer Section -->

@endsection
