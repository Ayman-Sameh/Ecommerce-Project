@extends('front.master')

@section('content')

        <!-- ...:::: Start Breadcrumb Section:::... -->
        <div class="breadcrumb-section breadcrumb-bg-color--golden">
            <div class="breadcrumb-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h3 class="breadcrumb-title">{{$page->title}}</h3>
                            <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                                <nav aria-label="breadcrumb">
                                    <ul>
                                        <li><a href="{{url('/')}}">Home</a></li>
                                        <li><a>Pages</a></li>
                                        <li class="active" aria-current="page">{{$page->title}}</li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- ...:::: End Breadcrumb Section:::... -->

        <!-- ...::::Start Privacy Policy  Section:::... -->
        <div class="privacy-section">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="privacy-policy-wrapper">
                            {!! $page->contant !!}
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- ...::::End Privacy Policy Section:::... -->

@endsection