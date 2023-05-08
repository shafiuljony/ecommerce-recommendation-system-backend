<?php use App\Models\Product; ?>
@extends('front.layout.layout')
@section('content')
<!-- Page Introduction Wrapper -->
<div class="page-style-a">
    <div class="container">
        <div class="page-intro">
            <h2>Cart</h2>
            <ul class="bread-crumb">
                <li class="has-separator">
                    <i class="ion ion-md-home"></i>
                    <a href="index.html">Home</a>
                </li>
                <li class="is-marked">
                    <a href="#">Proceed to Payment</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- Page Introduction Wrapper /- -->
<!-- Thanks-Page -->
<div class="page-cart u-s-p-t-80">
   <div class="container">
      <div class="row">
            <div class="col-lg-12" align="center">
               <h3>PLEASE MAKE PAYMENT FOR YOUR ORDER</h3>
               <form action="#" method="post">@csrf
                <input type="hidden" name="amount" value="{{ round(Session::get('grand_total')/105,2) }}">
                <input type="image" src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/checkout-logo-large.png">
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- Thanks-Page /- -->
@endsection