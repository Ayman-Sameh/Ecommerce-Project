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
                            <h3 class="breadcrumb-title">Contact Us</h3>
                            <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                                <nav aria-label="breadcrumb">
                                    <ul>
                                        <li><a href="{{url('/')}}">Home</a></li>
                                        <li class="active" aria-current="page">Contact Us</li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- ...:::: End Breadcrumb Section:::... -->
    
        <!-- ...::::Start Map Section:::... -->
        <div class="map-section" data-aos="fade-up" data-aos-delay="0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="mapouter">
                            <div class="gmap_canvas">
                                <iframe id="gmap_canvas"
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d55251.37709964788!2d31.29348387917556!3d30.059483810319847!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14583fa60b21beeb%3A0x79dfb296e8423bba!2z2KfZhNmC2KfZh9ix2KnYjCDZhdit2KfZgdi42Kkg2KfZhNmC2KfZh9ix2KnigKw!5e0!3m2!1sar!2seg!4v1665432631791!5m2!1sar!2seg"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- ...::::End  Map Section:::... -->
    
        <!-- ...::::Start Contact Section:::... -->
        <div class="contact-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <!-- Start Contact Details -->
                        <div class="contact-details-wrapper section-top-gap-100" data-aos="fade-up" data-aos-delay="0">
                            <div class="contact-details">
                                <!-- Start Contact Details Single Item -->
                                <div class="contact-details-single-item">
                                    <div class="contact-details-icon">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                    @foreach ($setting as $set)
                                        
                                    
                                    <div class="contact-details-content contact-phone">
                                        <a href="tel:+{{$set->phone}}">Phone :{{$set->phone}}</a>
                                        <a href="tel:+{{$set->whatsapp}}">Whatsapp :{{$set->whatsapp}}</a>
                                    </div>
                                </div> <!-- End Contact Details Single Item -->
                                <!-- Start Contact Details Single Item -->
                                <div class="contact-details-single-item">
                                    <div class="contact-details-icon">
                                        <i class="fa fa-globe"></i>
                                    </div>
                                    <div class="contact-details-content contact-phone">
                                        <a href="mailto:{{$set->email}}">{{$set->email}}</a>
                                    </div>
                                </div> <!-- End Contact Details Single Item -->
                                <!-- Start Contact Details Single Item -->
                                <div class="contact-details-single-item">
                                    <div class="contact-details-icon">
                                        <i class="fa fa-map-marker"></i>
                                    </div>
                                    <div class="contact-details-content contact-phone">
                                        <span>{{$set->description}}</span>
                                    </div>
                                </div> <!-- End Contact Details Single Item -->
                            </div>
                            <!-- Start Contact Social Link -->
                            <div class="contact-social">
                                <h4>Follow Us</h4>
                                <ul>
                                    <li><a href="{{$set->facebook}}"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="{{$set->twitter}}"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="{{$set->instagram}}"><i class="fa fa-instagram"></i></a></li>
                                    <li><a href="{{$set->youtube}}"><i class="fa fa-youtube"></i></a></li>
                                </ul>
                                @endforeach
                            </div> <!-- End Contact Social Link -->
                        </div> <!-- End Contact Details -->
                    </div>
                    <div class="col-lg-8">
                        <div class="contact-form section-top-gap-100" data-aos="fade-up" data-aos-delay="200">
                            <h3>Get In Touch</h3>
                            <form action="{{route('contact.store')}}" method="POST" enctype="multipart/form-data">
                                
                                @csrf
                                @include('front.massage')

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="default-form-box mb-20">
                                            <label for="contact-name">Name</label>
                                            <input name="name" type="text" id="contact-name">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="default-form-box mb-20">
                                            <label for="contact-email">Email</label>
                                            <input name="email" type="email" id="contact-email">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="default-form-box mb-20">
                                            <label for="contact-subject">Subject</label>
                                            <input name="subject" type="text" id="contact-subject">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="default-form-box mb-20">
                                            <label for="contact-message">Your Message</label>
                                            <textarea name="massage" id="contact-message" cols="30" rows="10"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <button class="btn btn-lg btn-black-default-hover" type="submit">SEND</button>
                                    </div>
                                    <p class="form-messege"></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ...::::ENd Contact Section:::... -->

@endsection