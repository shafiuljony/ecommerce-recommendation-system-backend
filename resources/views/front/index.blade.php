<?php

use App\Models\Product;
?>
@extends('front.layout.layout')
@section('content')
<!-- Main-Slider -->
<div class="default-height ph-item">
    <div class="slider-main owl-carousel">
        @foreach($sliderBanners as $banner)
        <div class="bg-image">
            <div class="slide-content">
                <h1><a @if(!empty($banner['link'])) herf="{{ url($banner['link']) }}" @else href="javascript:;"
                        @endif><img src="{{ asset('front/images/banner_images/'.$banner['image']) }}"
                            title="{{ $banner['title'] }}" alt="{{ $banner['alt']}}"></a></h1>
                <!-- <h2>{{ $banner['title'] }}</h2> -->
                <!-- <div class="banner-content">

                    <p class="banner-subtitle">Trending item</p>

                    <h2 class="banner-title">Women's latest fashion sale</h2>

                    <p class="banner-text">
                    starting at &#2547; <b>200</b>.00
                    </p>

                    <a href="#" class="banner-btn">Shop now</a>

                </div> -->
            </div>
        </div>
        @endforeach
    </div>
</div>
<!-- Main-Slider /- -->

@if(isset($fixBanners[0]['image']))
<!-- Banner-Layer -->
<div class="banner-layer">
    <div class="container">
        <div class="image-banner">
            <a target="_blank" rel="nofollow" href="{{ url($fixBanners[0]['link']) }}"
                class="mx-auto banner-hover effect-dark-opacity">
                <img class="img-fluid" src="{{ asset('front/images/banner_images/'.$fixBanners[0]['image']) }}"
                    alt="{{ $fixBanners[0]['alt'] }}" title="{{ $fixBanners[0]['title'] }}">
            </a>
        </div>
    </div>
</div>
<!-- Banner-Layer /- -->
@endif


<!--
    - CATEGORY
-->

<!-- <div class="category">

    <div class="">

        <div class="category-item-container has-scrollbar">

        <div class="category-item">

            <div class="category-img-box">
            <img src="{{ asset('front/images/product/category/dress.svg')}}" alt="dress & frock" width="30">
            </div>

            <div class="category-content-box">

            <div class="category-content-flex">
                <h3 class="category-item-title">Dress & frock</h3>

                <p class="category-item-amount">(53)</p>
            </div>

            <a href="#" class="category-btn">Show all</a>

            </div>

        </div>

        <div class="category-item">

            <div class="category-img-box">
            <img src="{{ asset('front/images/product/category/coat.svg')}}" alt="winter wear" width="30">
            </div>

            <div class="category-content-box">

            <div class="category-content-flex">
                <h3 class="category-item-title">Winter wear</h3>

                <p class="category-item-amount">(58)</p>
            </div>

            <a href="#" class="category-btn">Show all</a>

            </div>

        </div>

        <div class="category-item">

            <div class="category-img-box">
            <img src="{{ asset('front/images/product/category/glasses.svg')}}" alt="glasses & lens" width="30">
            </div>

            <div class="category-content-box">

            <div class="category-content-flex">
                <h3 class="category-item-title">Glasses & lens</h3>

                <p class="category-item-amount">(68)</p>
            </div>

            <a href="#" class="category-btn">Show all</a>

            </div>

        </div>

        <div class="category-item">

            <div class="category-img-box">
            <img src="{{ asset('front/images/product/category/shorts.svg')}}" alt="shorts & jeans" width="30">
            </div>

            <div class="category-content-box">

            <div class="category-content-flex">
                <h3 class="category-item-title">Shorts & jeans</h3>

                <p class="category-item-amount">(84)</p>
            </div>

            <a href="#" class="category-btn">Show all</a>

            </div>

        </div>

        <div class="category-item">

            <div class="category-img-box">
            <img src="{{ asset('front/images/product/category/tee.svg')}}" alt="t-shirts" width="30">
            </div>

            <div class="category-content-box">

            <div class="category-content-flex">
                <h3 class="category-item-title">T-shirts</h3>

                <p class="category-item-amount">(35)</p>
            </div>

            <a href="#" class="category-btn">Show all</a>

            </div>

        </div>

        <div class="category-item">

            <div class="category-img-box">
            <img src="{{ asset('front/images/product/category/jacket.svg')}}" alt="jacket" width="30">
            </div>

            <div class="category-content-box">

            <div class="category-content-flex">
                <h3 class="category-item-title">Jacket</h3>

                <p class="category-item-amount">(16)</p>
            </div>

            <a href="#" class="category-btn">Show all</a>

            </div>

        </div>

        <div class="category-item">

            <div class="category-img-box">
            <img src="{{ asset('front/images/product/category/watch.svg')}}" alt="watch" width="30">
            </div>

            <div class="category-content-box">

            <div class="category-content-flex">
                <h3 class="category-item-title">Watch</h3>

                <p class="category-item-amount">(27)</p>
            </div>

            <a href="#" class="category-btn">Show all</a>

            </div>

        </div>

        <div class="category-item">

            <div class="category-img-box">
            <img src="{{ asset('front/images/product/category/hat.svg')}}" alt="hat & caps" width="30">
            </div>

            <div class="category-content-box">

            <div class="category-content-flex">
                <h3 class="category-item-title">Hat & caps</h3>

                <p class="category-item-amount">(39)</p>
            </div>

            <a href="#" class="category-btn">Show all</a>

            </div>

        </div>

        </div>

    </div>

</div> -->

<!--
    - Recommended Products
-->
@if (!empty($recommendedProducts))
    <!-- Display the recommended products -->
    @auth
        <section class="section-maker">
            <div class="container">
                <div class="sec-maker-header text-center">
                    <h3 class="sec-maker-h3">Recommended Products</h3>
                    <div class="products-slider owl-carousel" data-item="4">
                        @foreach($recommendedProducts as $product)
                        <?php $product_image_path = 'front/images/product_images/small/' . $product['product_image']; ?>
                        <div class="item">
                            <div class="image-container">
                                <a class="item-img-wrapper-link" href="{{ url('product/'.$product['id']) }}">
                                    @if(!empty($product['product_image']) && file_exists($product_image_path))
                                    <img class="img-fluid" src="{{ asset($product_image_path) }}" alt="Product">
                                    @else
                                    <img class="img-fluid" src="{{ asset('front/images/product_images/small/no-image.png')}}"
                                        alt="Product">
                                    @endif
                                </a>
                                <!-- <div class="item-action-behaviors">
                                    <a class="item-quick-look" data-toggle="modal" href="#quick-view">Quick Look
                                    </a>
                                    <a class="item-mail" href="javascript:void(0)">Mail</a>
                                    <a class="item-addwishlist" href="javascript:void(0)">Add to Wishlist</a>
                                    <a class="item-addCart" href="javascript:void(0)">Add to Cart</a>
                                </div> -->
                            </div>
                            <div class="item-content">
                                <div class="what-product-is">
                                    <ul class="bread-crumb">
                                        <li class="has-separator">
                                            <a
                                                href="{{ url('product/'.$product['id']) }}">{{ $product['category']['category_name'] }}</a>
                                        </li>
                                        <li class="has-separator">
                                            <a href="{{ url('product/'.$product['id']) }}">{{ $product['product_code']}}</a>
                                        </li>
                                        <li class="has-separator">
                                            <a href="{{ url('product/'.$product['id']) }}">{{ $product['product_color']}}</a>
                                        </li>
                                        <li>
                                            <a href="{{ url('product/'.$product['id']) }}">{{ $product['brand']['name'] }}</a>
                                        </li>
                                    </ul>
                                    <h6 class="item-title">
                                        <a href="{{ url('product/'.$product['id']) }}">{{ $product['product_name'] }}</a>
                                    </h6>
                                    <?php
                                    $averageRating = App\Models\Rating::where('product_id', $product['id'])->avg('rating');
                                    $totalReviews = App\Models\Rating::where('product_id', $product['id'])->count();
                                    ?>
                                    <div class="item-stars">
                                        <div class='star'
                                            title="{{ $averageRating }} out of 5 - based on {{ $totalReviews }} {{ $totalReviews == 1 ? 'Review' : 'Reviews' }}">
                                            <span style='width:{{ ($averageRating / 5) * 100 }}%'></span>
                                        </div>
                                        <span>({{ $totalReviews }})</span>
                                    </div>
                                </div>
                                <?php $discountPrice = Product::discountPrice($product['id']) ?>
                                @if($discountPrice > 0)
                                <div class="price-template">
                                    <div class="item-new-price">
                                        ৳ {{ $discountPrice }}
                                    </div>
                                    <div class="item-old-price">
                                        ৳ {{ $product['product_price'] }}
                                    </div>
                                </div>
                                @else
                                <div class="price-template">
                                    <div class="item-new-price">
                                        ৳ {{ $product['product_price'] }}
                                    </div>
                                </div>
                                @endif
                            </div>
                            <?php $isProductNew = Product::isProductNew($product['id']); ?>
                            @if($isProductNew=="Yes")
                            <div class="tag new">
                                <span>NEW</span>
                            </div>
                            @endif
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endauth
@endif
<!-- Top Collection /- -->
<!-- Top Collection -->
<section class="section-maker">
    <div class="container">
        <div class="sec-maker-header text-center">
            <h3 class="sec-maker-h3">TOP COLLECTION</h3>
            <ul class="nav tab-nav-style-1-a justify-content-center">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#men-latest-products">New Arrivals</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#men-best-selling-products">Best Sellers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#discounted-products">Discounted Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#men-featured-products">Featured Products</a>
                </li>
            </ul>
        </div>
        <div class="wrapper-content">
            <div class="outer-area-tab">
                <div class="tab-content">
                    <div class="tab-pane active show fade" id="men-latest-products">
                        <div class="slider-fouc">
                            <div class="products-slider owl-carousel" data-item="4">
                                @foreach($newProducts as $product)
                                <?php $product_image_path = 'front/images/product_images/small/' . $product['product_image']; ?>
                                <div class="item">
                                    <div class="image-container">
                                        <a class="item-img-wrapper-link" href="{{ url('product/'.$product['id']) }}">
                                            @if(!empty($product['product_image']) && file_exists($product_image_path))
                                            <img class="img-fluid" src="{{ asset($product_image_path) }}" alt="Product">
                                            @else
                                            <img class="img-fluid"
                                                src="{{ asset('front/images/product_images/small/no-image.png')}}"
                                                alt="Product">
                                            @endif
                                        </a>
                                        <!-- <div class="item-action-behaviors">
                                            <a class="item-quick-look" data-toggle="modal" href="#quick-view">Quick Look
                                            </a>
                                            <a class="item-mail" href="javascript:void(0)">Mail</a>
                                            <a class="item-addwishlist" href="javascript:void(0)">Add to Wishlist</a>
                                            <a class="item-addCart" href="javascript:void(0)">Add to Cart</a>
                                        </div> -->
                                    </div>
                                    <div class="item-content">
                                        <div class="what-product-is">
                                            <ul class="bread-crumb">
                                                <li class="has-separator">
                                                    <a
                                                        href="{{ url('product/'.$product['id']) }}">{{ $product['category']['category_name'] }}</a>
                                                </li>
                                                <li class="has-separator">
                                                    <a
                                                        href="{{ url('product/'.$product['id']) }}">{{ $product['product_code'] }}</a>
                                                </li>
                                                <li class="has-separator">
                                                    <a
                                                        href="{{ url('product/'.$product['id']) }}">{{ $product['product_color']}}</a>
                                                </li>
                                                <li>
                                                    <a
                                                        href="{{ url('product/'.$product['id']) }}">{{ $product['brand']['name'] }}</a>
                                                </li>
                                            </ul>
                                            <h6 class="item-title">
                                                <a
                                                    href="{{ url('product/'.$product['id']) }}">{{ $product['product_name'] }}</a>
                                            </h6>
                                            <?php
                                            $averageRating = App\Models\Rating::where('product_id', $product['id'])->avg('rating');
                                            $totalReviews = App\Models\Rating::where('product_id', $product['id'])->count();
                                            ?>
                                            <div class="item-stars">
                                                <div class='star'
                                                    title="{{ $averageRating }} out of 5 - based on {{ $totalReviews }} {{ $totalReviews == 1 ? 'Review' : 'Reviews' }}">
                                                    <span style='width:{{ ($averageRating / 5) * 100 }}%'></span>
                                                </div>
                                                <span>({{ $totalReviews }})</span>
                                            </div>
                                        </div>
                                        <?php $discountPrice = Product::discountPrice($product['id']) ?>
                                        @if($discountPrice > 0)
                                        <div class="price-template">
                                            <div class="item-new-price">
                                                ৳ {{ $discountPrice }}
                                            </div>
                                            <div class="item-old-price">
                                                ৳ {{ $product['product_price'] }}
                                            </div>
                                        </div>
                                        @else
                                        <div class="price-template">
                                            <div class="item-new-price">
                                                ৳ {{ $product['product_price'] }}
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                    <?php $isProductNew = Product::isProductNew($product['id']); ?>
                                    @if($isProductNew=="Yes")
                                    <div class="tag new">
                                        <span>NEW</span>
                                    </div>
                                    @endif
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane show fade" id="men-best-selling-products">
                        <div class="slider-fouc">
                            <div class="products-slider owl-carousel" data-item="4">
                                @foreach($bestSellers as $product)
                                <?php $product_image_path = 'front/images/product_images/small/' . $product['product_image']; ?>
                                <div class="item">
                                    <div class="image-container">
                                        <a class="item-img-wrapper-link" href="{{ url('product/'.$product['id']) }}">
                                            @if(!empty($product['product_image']) && file_exists($product_image_path))
                                            <img class="img-fluid" src="{{ asset($product_image_path) }}" alt="Product">
                                            @else
                                            <img class="img-fluid"
                                                src="{{ asset('front/images/product_images/small/no-image.png')}}"
                                                alt="Product">
                                            @endif
                                        </a>
                                        <!-- <div class="item-action-behaviors">
                                            <a class="item-quick-look" data-toggle="modal" href="#quick-view">Quick Look
                                            </a>
                                            <a class="item-mail" href="javascript:void(0)">Mail</a>
                                            <a class="item-addwishlist" href="javascript:void(0)">Add to Wishlist</a>
                                            <a class="item-addCart" href="javascript:void(0)">Add to Cart</a>
                                        </div> -->
                                    </div>
                                    <div class="item-content">
                                        <div class="what-product-is">
                                            <ul class="bread-crumb">
                                                <li class="has-separator">
                                                    <a
                                                        href="{{ url('product/'.$product['id']) }}">{{ $product['category']['category_name'] }}</a>
                                                </li>
                                                <li class="has-separator">
                                                    <a
                                                        href="{{ url('product/'.$product['id']) }}">{{ $product['product_code'] }}</a>
                                                </li>
                                                <li class="has-separator">
                                                    <a
                                                        href="{{ url('product/'.$product['id']) }}">{{ $product['product_color']}}</a>
                                                </li>
                                                <li>
                                                    <a
                                                        href="{{ url('product/'.$product['id']) }}">{{ $product['brand']['name'] }}</a>
                                                </li>
                                            </ul>
                                            <h6 class="item-title">
                                                <a
                                                    href="{{ url('product/'.$product['id']) }}">{{ $product['product_name'] }}</a>
                                            </h6>
                                            <?php
                                            $averageRating = App\Models\Rating::where('product_id', $product['id'])->avg('rating');
                                            $totalReviews = App\Models\Rating::where('product_id', $product['id'])->count();
                                            ?>
                                            <div class="item-stars">
                                                <div class='star'
                                                    title="{{ $averageRating }} out of 5 - based on {{ $totalReviews }} {{ $totalReviews == 1 ? 'Review' : 'Reviews' }}">
                                                    <span style='width:{{ ($averageRating / 5) * 100 }}%'></span>
                                                </div>
                                                <span>({{ $totalReviews }})</span>
                                            </div>
                                        </div>
                                        <?php $discountPrice = Product::discountPrice($product['id']) ?>
                                        @if($discountPrice > 0)
                                        <div class="price-template">
                                            <div class="item-new-price">
                                                ৳ {{ $discountPrice }}
                                            </div>
                                            <div class="item-old-price">
                                                ৳ {{ $product['product_price'] }}
                                            </div>
                                        </div>
                                        @else
                                        <div class="price-template">
                                            <div class="item-new-price">
                                                ৳ {{ $product['product_price'] }}
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                    <?php $isProductNew = Product::isProductNew($product['id']); ?>
                                    @if($isProductNew=="Yes")
                                    <div class="tag new">
                                        <span>NEW</span>
                                    </div>
                                    @endif
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="discounted-products">
                        <div class="slider-fouc">
                            <div class="products-slider owl-carousel" data-item="4">
                                @foreach($discounterProducts as $product)
                                <?php $product_image_path = 'front/images/product_images/small/' . $product['product_image']; ?>
                                <div class="item">
                                    <div class="image-container">
                                        <a class="item-img-wrapper-link" href="{{ url('product/'.$product['id']) }}">
                                            @if(!empty($product['product_image']) && file_exists($product_image_path))
                                            <img class="img-fluid" src="{{ asset($product_image_path) }}" alt="Product">
                                            @else
                                            <img class="img-fluid"
                                                src="{{ asset('front/images/product_images/small/no-image.png')}}"
                                                alt="Product">
                                            @endif
                                        </a>
                                        <!-- <div class="item-action-behaviors">
                                            <a class="item-quick-look" data-toggle="modal" href="#quick-view">Quick Look
                                            </a>
                                            <a class="item-mail" href="javascript:void(0)">Mail</a>
                                            <a class="item-addwishlist" href="javascript:void(0)">Add to Wishlist</a>
                                            <a class="item-addCart" href="javascript:void(0)">Add to Cart</a>
                                        </div> -->
                                    </div>
                                    <div class="item-content">
                                        <div class="what-product-is">
                                            <ul class="bread-crumb">
                                                <li class="has-separator">
                                                    <a
                                                        href="{{ url('product/'.$product['id']) }}">{{ $product['category']['category_name'] }}</a>
                                                </li>
                                                <li class="has-separator">
                                                    <a
                                                        href="{{ url('product/'.$product['id']) }}">{{ $product['product_code'] }}</a>
                                                </li>
                                                <li class="has-separator">
                                                    <a
                                                        href="{{ url('product/'.$product['id']) }}">{{ $product['product_color']}}</a>
                                                </li>
                                                <li>
                                                    <a
                                                        href="{{ url('product/'.$product['id']) }}">{{ $product['brand']['name'] }}</a>
                                                </li>
                                            </ul>
                                            <h6 class="item-title">
                                                <a
                                                    href="{{ url('product/'.$product['id']) }}">{{ $product['product_name'] }}</a>
                                            </h6>
                                            <?php
                                            $averageRating = App\Models\Rating::where('product_id', $product['id'])->avg('rating');
                                            $totalReviews = App\Models\Rating::where('product_id', $product['id'])->count();
                                            ?>
                                            <div class="item-stars">
                                                <div class='star'
                                                    title="{{ $averageRating }} out of 5 - based on {{ $totalReviews }} {{ $totalReviews == 1 ? 'Review' : 'Reviews' }}">
                                                    <span style='width:{{ ($averageRating / 5) * 100 }}%'></span>
                                                </div>
                                                <span>({{ $totalReviews }})</span>
                                            </div>
                                        </div>
                                        <?php $discountPrice = Product::discountPrice($product['id']) ?>
                                        @if($discountPrice > 0)
                                        <div class="price-template">
                                            <div class="item-new-price">
                                                ৳ {{ $discountPrice }}
                                            </div>
                                            <div class="item-old-price">
                                                ৳ {{ $product['product_price'] }}
                                            </div>
                                        </div>
                                        @else
                                        <div class="price-template">
                                            <div class="item-new-price">
                                                ৳ {{ $product['product_price'] }}
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                    <?php $isProductNew = Product::isProductNew($product['id']); ?>
                                    @if($isProductNew=="Yes")
                                    <div class="tag new">
                                        <span>NEW</span>
                                    </div>
                                    @endif
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="men-featured-products">
                        <div class="slider-fouc">
                            <div class="products-slider owl-carousel" data-item="4">
                                @foreach($isfeatured as $product)
                                <?php $product_image_path = 'front/images/product_images/small/' . $product['product_image']; ?>
                                <div class="item">
                                    <div class="image-container">
                                        <a class="item-img-wrapper-link" href="{{ url('product/'.$product['id']) }}">
                                            @if(!empty($product['product_image']) && file_exists($product_image_path))
                                            <img class="img-fluid" src="{{ asset($product_image_path) }}" alt="Product">
                                            @else
                                            <img class="img-fluid"
                                                src="{{ asset('front/images/product_images/small/no-image.png')}}"
                                                alt="Product">
                                            @endif
                                        </a>
                                        <!-- <div class="item-action-behaviors">
                                            <a class="item-quick-look" data-toggle="modal" href="#quick-view">Quick Look
                                            </a>
                                            <a class="item-mail" href="javascript:void(0)">Mail</a>
                                            <a class="item-addwishlist" href="javascript:void(0)">Add to Wishlist</a>
                                            <a class="item-addCart" href="javascript:void(0)">Add to Cart</a>
                                        </div> -->
                                    </div>
                                    <div class="item-content">
                                        <div class="what-product-is">
                                            <ul class="bread-crumb">
                                                <li class="has-separator">
                                                    <a
                                                        href="{{ url('product/'.$product['id']) }}">{{ $product['category']['category_name'] }}</a>
                                                </li>
                                                <li class="has-separator">
                                                    <a
                                                        href="{{ url('product/'.$product['id']) }}">{{ $product['product_code'] }}</a>
                                                </li>
                                                <li class="has-separator">
                                                    <a
                                                        href="{{ url('product/'.$product['id']) }}">{{ $product['product_color']}}</a>
                                                </li>
                                                <li>
                                                    <a
                                                        href="{{ url('product/'.$product['id']) }}">{{ $product['brand']['name'] }}</a>
                                                </li>
                                            </ul>
                                            <h6 class="item-title">
                                                <a
                                                    href="{{ url('product/'.$product['id']) }}">{{ $product['product_name'] }}</a>
                                            </h6>
                                            <?php
                                            // Get the average rating and total number of reviews for the current product
                                            $averageRating = App\Models\Rating::where('product_id',
                                            $product['id'])->avg('rating');
                                            $totalReviews = App\Models\Rating::where('product_id',
                                            $product['id'])->count();
                                            ?>

                                            <div class="item-stars">
                                                <div class='star'
                                                    title="{{ $averageRating }} out of 5 - based on {{ $totalReviews }} {{ $totalReviews == 1 ? 'Review' : 'Reviews' }}">
                                                    <span style='width:{{ ($averageRating / 5) * 100 }}%'></span>
                                                </div>
                                                <span>({{ $totalReviews }})</span>
                                            </div>
                                        </div>
                                        <?php $discountPrice = Product::discountPrice($product['id']) ?>
                                        @if($discountPrice > 0)
                                        <div class="price-template">
                                            <div class="item-new-price">
                                                ৳ {{ $discountPrice }}
                                            </div>
                                            <div class="item-old-price">
                                                ৳ {{ $product['product_price'] }}
                                            </div>
                                        </div>
                                        @else
                                        <div class="price-template">
                                            <div class="item-new-price">
                                                ৳ {{ $product['product_price'] }}
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                    <?php $isProductNew = Product::isProductNew($product['id']); ?>
                                    @if($isProductNew=="Yes")
                                    <div class="tag new">
                                        <span>NEW</span>
                                    </div>
                                    @endif
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
<!-- Top Collection /- -->
@if(isset($fixBanners[1]['image']))
<!-- Banner-Layer -->
<div class="banner-layer">
    <div class="container">
        <div class="image-banner">
            <a target="_blank" rel="nofollow" href="{{ url($fixBanners[1]['link']) }}"
                class="mx-auto banner-hover effect-dark-opacity">
                <img class="img-fluid" src="{{ asset('front/images/banner_images/'.$fixBanners[1]['image']) }}"
                    alt="{{ $fixBanners[1]['alt'] }}" title="{{ $fixBanners[1]['title'] }}">
            </a>
        </div>
    </div>
</div>
<!-- Banner-Layer /- -->
@endif
<!-- Site-Priorities -->
<section class="app-priority">
    <div class="container">
        <div class="priority-wrapper u-s-p-b-80">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <div class="single-item-wrapper">
                        <div class="single-item-icon">
                            <i class="ion ion-md-star"></i>
                        </div>
                        <h2>
                            Great Value
                        </h2>
                        <p>We offer competitive prices on our 100 million plus product range</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <div class="single-item-wrapper">
                        <div class="single-item-icon">
                            <i class="ion ion-md-cash"></i>
                        </div>
                        <h2>
                            Shop with Confidence
                        </h2>
                        <p>Our Protection covers your purchase from click to delivery</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <div class="single-item-wrapper">
                        <div class="single-item-icon">
                            <i class="ion ion-ios-card"></i>
                        </div>
                        <h2>
                            Safe Payment
                        </h2>
                        <p>Pay with the world’s most popular and secure payment methods</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <div class="single-item-wrapper">
                        <div class="single-item-icon">
                            <i class="ion ion-md-contacts"></i>
                        </div>
                        <h2>
                            24/7 Help Center
                        </h2>
                        <p>Round-the-clock assistance for a smooth shopping experience</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Site-Priorities /- -->
@endsection