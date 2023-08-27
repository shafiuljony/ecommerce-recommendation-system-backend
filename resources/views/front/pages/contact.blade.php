<?php use App\Models\Product; ?>
@extends('front.layout.layout')
@section('content')
<!-- Page Introduction Wrapper -->
<div class="page-style-a">
    <div class="container">
        <div class="page-intro">
            <h2>Contact Us</h2>
            <ul class="bread-crumb">
                <li class="has-separator">
                    <i class="ion ion-md-home"></i>
                    <a href="#">Home</a>
                </li>
                <li class="is-marked">
                    <a href="#">Contact Us</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- Page Introduction Wrapper /- -->
<!-- Contact-Page -->
<div class="page-contact u-s-p-t-80">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="touch-wrapper">
                    <h1 class="contact-h1">Get In Touch With Us</h1>
                    @if(Session::has('success_message'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success: </strong> {{ Session::get('success_message')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    @if($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error: </strong> <?php echo implode('', $errors->all('<div>:message</div>')); ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <form  action="{{ url('contact')}}" method="post">@csrf
                        <div class="group-inline u-s-m-b-30">
                            <div class="group-1 u-s-p-r-16">
                                <label for="contact-name">Your Name
                                    <span class="astk">*</span>
                                </label>
                                <input type="text" id="contact-name" class="text-field" placeholder="Name" name="name">
                            </div>
                            <div class="group-2">
                                <label for="contact-email">Your Email
                                    <span class="astk">*</span>
                                </label>
                                <input type="email" id="contact-email" class="text-field" placeholder="Email" name="email">
                            </div>
                        </div>
                        <div class="u-s-m-b-30">
                            <label for="contact-subject">Subject
                                <span class="astk">*</span>
                            </label>
                            <input type="text" id="contact-subject" class="text-field" placeholder="Subject" name="subject">
                        </div>
                        <div class="u-s-m-b-30">
                            <label for="contact-message">Message: <span class="astk">*</span></label>
                            <textarea class="text-area" id="contact-message" name="message"></textarea>
                        </div>
                        <div class="u-s-m-b-30">
                            <button type="submit" class="button button-outline-secondary">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="information-about-wrapper">
                    <h1 class="contact-h1">Information About Us</h1>
                    <p>
                        Welcome to our Multivendor E-Commerce Recommended System! At ANON, we have harnessed the power of cutting-edge technology to create a seamless and personalized shopping experience for both buyers and sellers in the dynamic world of e-commerce. Our platform is designed to connect shoppers with the products they desire while empowering vendors to showcase their offerings effectively.
                    </p>
                    <p>
                        <h3>Join Us in Shaping the Future:</h3>
                        At ANON , we believe that a thriving e-commerce ecosystem benefits everyone involved. Whether you're a shopper seeking personalized experiences or a vendor looking to expand your reach, our Multivendor E-Commerce Recommended System is the gateway to a more efficient, engaging, and satisfying online shopping journey. Join us on this exciting journey as we redefine the way commerce is conducted in the digital age.
                    </p>
                </div>
                <div class="contact-us-wrapper">
                    <h1 class="contact-h1">Contact Us</h1>
                    <div class="contact-material u-s-m-b-16">
                        <h6>Location</h6>
                        <span> GEC, Chattogram, Bangladesh</span>
                    </div>
                    <div class="contact-material u-s-m-b-16">
                        <h6>Email</h6>
                        <span>anon@ecom.com.bd</span>
                    </div>
                    <div class="contact-material u-s-m-b-16">
                        <h6>Telephone</h6>
                        <span> +8801558947938</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="u-s-p-t-80">
        <div id="map"></div>
    </div>
</div>
    <!-- Contact-Page /- -->
@endsection