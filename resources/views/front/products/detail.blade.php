<?php use App\Models\Product;
     use App\Models\ProductsFilter;
     $productFilters = ProductsFilter::productFilters();
    //  dd($productFilters);
?>
@extends('front.layout.layout')
@section('content')
<!-- Page Introduction Wrapper -->
<div class="page-style-a">
    <div class="container">
        <div class="page-intro">
            <h2>Detail</h2>
            <ul class="bread-crumb">
                <li class="has-separator">
                    <i class="ion ion-md-home"></i>
                    <a href="{{ url('/') }}">Home</a>
                </li>
                <li class="is-marked">
                    <a href="javascript::">Detail</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- Page Introduction Wrapper /- -->
<!-- Single-Product-Full-Width-Page -->
<div class="page-detail u-s-p-t-80">
    <div class="container">
        <!-- Product-Detail -->
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <!-- Product-zoom-area -->
                <div class="easyzoom easyzoom--overlay easyzoom--with-thumbnails">
                    <a href="{{ asset('front/images/product_images/large/'.$productDetails['product_image']) }}">
                        <img src="{{ asset('front/images/product_images/large/'.$productDetails['product_image']) }}"
                            alt="" width="500" height="500" />
                    </a>

                </div>
                <div class="thumbnails mt-3">
                    <a href="{{ asset('front/images/product_images/large/'.$productDetails['product_image']) }}"
                        data-standard="{{ asset('front/images/product_images/small/'.$productDetails['product_image']) }}">
                        <img height="150" width="150"
                            src="{{ asset('front/images/product_images/small/'.$productDetails['product_image']) }}"
                            alt="" />
                    </a>
                    @foreach($productDetails['images'] as $image)
                    <a href="{{ asset('front/images/product_images/large/'.$image['image']) }}"
                        data-standard="{{ asset('front/images/product_images/small/'.$image['image']) }}">
                        <img height="150" width="150"
                            src="{{ asset('front/images/product_images/small/'.$image['image']) }}" alt="" />
                    </a>
                    @endforeach
                </div>
                <!-- Product-zoom-area /- -->
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <!-- Product-details -->
                <div class="all-information-wrapper">
                    <div class="section-1-title-breadcrumb-rating">

                        @if (Session::has('error_message'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error: </strong>{{ Session::get('error_message')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif

                        @if(Session::has('success_message'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success: </strong> {{ Session::get('success_message')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                        <div class="product-title">
                            <h1>
                                <a href="javascript::">{{ $productDetails['product_name'] }}</a>
                            </h1>
                        </div>
                        <ul class="bread-crumb">
                            <li class="has-separator">
                                <i class="ion ion-md-home"></i>
                                <a href="{{ url('/')}}">Home</a>
                            </li>
                            <li class="has-separator">
                                <a href="javascript::">{{ $productDetails['section']['name'] }}</a>
                            </li>
                            <?php echo $categoryDetails["breadcrumbs"]; ?>
                        </ul>
                        <?php
                            $averageRating = App\Models\Rating::where('product_id', $productDetails['id'])->avg('rating');
                            $totalReviews = App\Models\Rating::where('product_id', $productDetails['id'])->count();
                            ?>
                        <div class="item-stars">
                            <div class='star'
                                title="{{ $averageRating }} out of 5 - based on {{ $totalReviews }} {{ $totalReviews == 1 ? 'Review' : 'Reviews' }}">
                                <span style='width:{{ ($averageRating / 5) * 100 }}%'></span>
                            </div>
                            <span>({{ $totalReviews }})</span>
                        </div>
                    </div>
                </div>
                <div class="section-2-short-description u-s-p-y-14">
                    <h6 class="information-heading u-s-m-b-8">Description:</h6>
                    <p>{{ $productDetails['description'] }}
                    </p>
                </div>
                <div class="section-3-price-original-discount u-s-p-y-14">
                    <?php $discountPrice = Product::discountPrice($productDetails['id']); ?>
                    <span class="getAttributePrice">
                        @if($discountPrice > 0)
                        <div class="price">
                            <h4>৳ {{ $discountPrice }}</h4>
                        </div>
                        <div class="original-price">
                            <span>Original Price:</span>
                            <span>৳ {{ $productDetails['product_price'] }}</span>
                        </div>
                        @else
                        <div class="price">
                            <h4>৳ {{ $productDetails['product_price'] }}</h4>
                        </div>
                        @endif
                    </span>
                    <!-- <div class="discount-price">
                                <span>Discount:</span>
                                <span>15%</span>
                            </div>
                            <div class="total-save">
                                <span>Save:</span>
                                <span>$20</span>
                            </div> -->
                </div>
                <div class="section-4-sku-information u-s-p-y-14">
                    <h6 class="information-heading u-s-m-b-8">Sku Information:</h6>
                    <div class="availability">
                        <span>Availability:</span>
                        @if($totalStock>0)
                        <span>In Stock</span>
                        @else
                        <span class="danger">Out of Stock</span>
                        @endif
                    </div>
                    <div class="left">
                        <span>Product Code:</span>
                        <span>{{ $productDetails['product_code'] }}</span>
                    </div>
                    <div class="left">
                        <span>Product Color:</span>
                        <span>{{ $productDetails['product_color'] }}</span>
                    </div>
                    @if($totalStock>0)
                    <div class="left">
                        <span>Only:</span>
                        <span>{{$totalStock}} left</span>
                    </div>
                    @endif
                </div>
                @if(isset($productDetails['vendor']) && isset($productDetails['vendor']['id']) &&
                isset($productDetails['vendor']['vendorbusinessdetails']['shop_name']))
                <div>
                    sold by <a
                        href="/products/{{ $productDetails['vendor']['id'] }}">{{ $productDetails['vendor']['vendorbusinessdetails']['shop_name'] }}</a>
                </div>
                @endif


                <!-- @if(isset($productDetails['vendor']) && isset($productDetails['vendor']['id']) && isset($productDetails['vendor']['vendorbusinessdetails']['shop_name']))
                        <div>
                            sold by <a href="/products/{{ $productDetails['vendor']['id'] }}">{{ $productDetails['vendor']['vendorbusinessdetails']['shop_name'] }}</a> 
                        </div>
                        @endif -->


                <form action="{{ url('cart/add') }}" class="post-form" method="post">@csrf
                    <input type="hidden" name="product_id" value="{{ $productDetails['id'] }}">
                    <div class="section-5-product-variants u-s-p-y-14">
                        @if(count($groupProducts)>0)
                        <div>
                            <div><strong>Product Colors</strong></div>
                            <div class="mt-3">
                                @foreach($groupProducts as $product)
                                <a href="{{ url('product/'.$product['id']) }}">
                                    <img src="{{ asset('front/images/product_images/small/'.$product['product_image']) }}"
                                        width="80">
                                </a>
                                @endforeach
                            </div>
                        </div>
                        @endif
                        <div class="sizes u-s-m-b-11 mt-3">
                            <span>Available Size:</span>
                            <div class="size-variant select-box-wrapper">
                                <select name="size" id="getPrice" product-id="{{ $productDetails['id'] }}"
                                    class="select-box product-size" require>
                                    <option value="">Select Size</option>
                                    @foreach($productDetails['attributes'] as $attribute)
                                    <option value="{{ $attribute['size'] }}">{{ $attribute['size'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="section-6-social-media-quantity-actions u-s-p-y-14">
                        <div class="quantity-wrapper u-s-m-b-22">
                            <span>Quantity:</span>
                            <div class="quantity">
                                <input type="number" class="quantity-text-field" name="quantity" value="1">
                            </div>
                        </div>
                        <div>
                            <button class="button button-outline-secondary" type="submit">Add to cart</button>
                            <button class="button button-outline-secondary far fa-heart u-s-m-l-6"></button>
                            <button class="button button-outline-secondary far fa-envelope u-s-m-l-6"></button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- Product-details /- -->
        </div>
    </div>
    <!-- Product-Detail /- -->
    <!-- Detail-Tabs -->
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="detail-tabs-wrapper u-s-p-t-80">
                <div class="detail-nav-wrapper u-s-m-b-30">
                    <ul class="nav single-product-nav justify-content-center">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#video">Product video</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#detail">Product Detail</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#review">Reviews ( {{ $ratingsCount }} )</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content">
                    <!-- Description-Tab -->
                    <div class="tab-pane fade active show" id="video">
                        <div>
                            @if($productDetails['product_video'])
                            <video controls>
                                <source
                                    src=src="{{ url('front/videos/product_videos/'.$productDetails['product_video']) }}"
                                    type="video/mp4">
                            </video>
                            @else
                            <p>Product Video Not exists</p>
                            @endif
                        </div>
                    </div>
                    <!-- Description-Tab /- -->
                    <!-- Details-Tab -->
                    <div class="tab-pane fade" id="detail">
                        <div class="specification-whole-container">
                            <div class="spec-table u-s-m-b-50">
                                <h4 class="spec-heading">Product Details</h4>
                                <table>
                                    @foreach($productFilters as $filter)
                                    @if(isset($productDetails['category_id']))
                                    <?php $filterAvailable = ProductsFilter::filterAvailable($filter['id'],$productDetails['category_id']) ?>
                                    @if($filterAvailable=="Yes")
                                    <tr>
                                        <td>{{ $filter['filter_name'] }}</td>
                                        <td>
                                            @foreach($filter['filter_values'] as $value)
                                            @if(!empty($productDetails[$filter['filter_column']]) &&
                                            $value['filter_value'] == $productDetails[$filter['filter_column']])
                                            {{ ucwords($value['filter_value']) }}
                                            @endif
                                            @endforeach
                                        </td>
                                    </tr>
                                    @endif
                                    @endif
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- Specifications-Tab /- -->
                    <!-- Reviews-Tab -->
                    <div class="tab-pane fade" id="review">
                        <div class="review-whole-container">
                            <div class="row r-1 u-s-m-b-26 u-s-p-b-22">
                                <div class="col-lg-6 col-md-6">
                                    <div class="total-score-wrapper">
                                        <h6 class="review-h6">Average Rating</h6>
                                        <div class="circle-wrapper">
                                            <h1>{{ $avgStarRating }}</h1>
                                        </div>
                                        <h6 class="review-h6">Based on {{ $ratingsCount }} Reviews</h6>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="total-star-meter">
                                        <div class="star-wrapper">
                                            <span>5 Stars</span>
                                            <div class="star">
                                                <span style='width:0'></span>
                                            </div>
                                            <span>{{ $ratingFiveStarCount }}</span>
                                        </div>
                                        <div class="star-wrapper">
                                            <span>4 Stars</span>
                                            <div class="star">
                                                <span style='width:67px'></span>
                                            </div>
                                            <span>{{ $ratingFourStarCount }}</span>
                                        </div>
                                        <div class="star-wrapper">
                                            <span>3 Stars</span>
                                            <div class="star">
                                                <span style='width:0'></span>
                                            </div>
                                            <span>{{ $ratingThreeStarCount }}</span>
                                        </div>
                                        <div class="star-wrapper">
                                            <span>2 Stars</span>
                                            <div class="star">
                                                <span style='width:0'></span>
                                            </div>
                                            <span>{{ $ratingTowStarCount }}</span>
                                        </div>
                                        <div class="star-wrapper">
                                            <span>1 Star</span>
                                            <div class="star">
                                                <span style='width:0'></span>
                                            </div>
                                            <span>{{ $ratingOneStarCount }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row r-2 u-s-m-b-26 u-s-p-b-22">
                                <div class="col-lg-12">
                                    <div class="your-rating-wrapper">
                                        <h6 class="review-h6">Your Review is matter.</h6>
                                        <h6 class="review-h6">Have you used this product before?</h6>
                                        <form method="POST" action="{{ url('/add-rating') }}" name="ratingForm">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $productDetails['id'] }}">
                                            <div class="star-wrapper u-s-m-b-8">
                                                <div class="star">
                                                    <span id="your-stars" style='width:0'></span>
                                                </div>
                                                <label for="your-rating-value"></label>
                                                <input name="rating" id="your-rating-value" type="text"
                                                    class="text-field" placeholder="0.0" require>
                                                <span id="star-comment"></span>
                                            </div>
                                            <textarea name="review" class="text-area u-s-m-b-8" id="review-text-area"
                                                placeholder="Review" require></textarea>
                                            <button class="button button-outline-secondary">Submit Review</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Get-Reviews -->
                            <div class="get-reviews u-s-p-b-22">
                                <!-- Review-Options -->
                                <!-- <div class="review-options u-s-m-b-16">
                                        <div class="review-option-heading">
                                            <h6>Reviews
                                                <span> (15) </span>
                                            </h6>
                                        </div>
                                        <div class="review-option-box">
                                            <div class="select-box-wrapper">
                                                <label class="sr-only" for="review-sort">Review Sorter</label>
                                                <select class="select-box" id="review-sort">
                                                    <option value="">Sort by: Best Rating</option>
                                                    <option value="">Sort by: Worst Rating</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div> -->
                                <!-- Review-Options /- -->
                                <!-- All-Reviews -->
                                <div class="reviewers">
                                    @if(count($ratings)>0)
                                    @foreach($ratings as $rating)
                                    <div class="review-data">
                                        <div class="reviewer-name-and-date">
                                            <h6 class="reviewer-name">By {{ $rating['user']['name'] }}</h6>
                                            <h6 class="review-posted-date">
                                                {{ date("d-m-Y", strtotime($rating['created_at'])); }}</h6>
                                        </div>
                                        <div class="reviewer-stars-title-body">
                                            <div class="reviewer-stars">
                                                <div>
                                                    <?php 
                                                                    $count=0;
                                                                    while($count<$rating['rating']){ ?>
                                                    <span>&#9733;</span>
                                                    <?php $count++; } ?>
                                                </div>
                                                <!-- <span class="review-title">Good!</span> -->
                                            </div>
                                            <p class="review-body">
                                                {{ $rating['review'] }}
                                            </p>
                                        </div>
                                    </div>
                                    @endforeach
                                    @else
                                    <p>Reviews Not Availavle for this product</p>
                                    @endif
                                </div>
                                <!-- All-Reviews /- -->
                                <!-- Pagination-Review -->
                                <div class="pagination-review-area">
                                    <div class="pagination-review-number">
                                        <ul>
                                            <li style="display: none">
                                                <a href="single-product.html" title="Previous">
                                                    <i class="fas fa-angle-left"></i>
                                                </a>
                                            </li>
                                            <li class="active">
                                                <a href="single-product.html">1</a>
                                            </li>
                                            <li>
                                                <a href="single-product.html">2</a>
                                            </li>
                                            <li>
                                                <a href="single-product.html">3</a>
                                            </li>
                                            <li>
                                                <a href="single-product.html">...</a>
                                            </li>
                                            <li>
                                                <a href="single-product.html">10</a>
                                            </li>
                                            <li>
                                                <a href="single-product.html" title="Next">
                                                    <i class="fas fa-angle-right"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- Pagination-Review /- -->
                            </div>
                            <!-- Get-Reviews /- -->
                        </div>
                    </div>
                    <!-- Reviews-Tab /- -->
                </div>
            </div>
        </div>
    </div>
    <!-- Detail-Tabs /- -->
    <!-- Different-Product-Section -->
    <div class="detail-different-product-section u-s-p-t-80">
        <!-- Similar-Products -->
        <section class="section-maker">
            <div class="container">
                <div class="sec-maker-header text-center">
                    <h3 class="sec-maker-h3">Similar Products</h3>
                </div>
                <div class="slider-fouc">
                    <div class="products-slider owl-carousel" data-item="4">
                        @foreach($similarProducts as $product)
                        <div class="item">
                            <div class="image-container">
                                <a class="item-img-wrapper-link" href="{{ url('product/'.$product['id']) }}">
                                    <?php $product_image_path = 'front/images/product_images/small/'.$product['product_image'] ?>

                                    @if(!empty($product['product_image']) && file_exists($product_image_path))
                                    <img class="img-fluid" src="{{ asset($product_image_path) }}" alt="Product">
                                    @else
                                    <img class="img-fluid"
                                        src="{{ asset('front/images/product_images/small/no-images.png')}}"
                                        alt="Product">
                                    @endif
                                </a>
                                <!-- <div class="item-action-behaviors">
                                            <a class="item-quick-look" data-toggle="modal" href="#quick-view">Quick Look</a>
                                            <a class="item-mail" href="javascript:void(0)">Mail</a>
                                            <a class="item-addwishlist" href="javascript:void(0)">Add to Wishlist</a>
                                            <a class="item-addCart" href="javascript:void(0)">Add to Cart</a>
                                        </div> -->
                            </div>
                            <div class="item-content">
                                <div class="what-product-is">
                                    <ul class="bread-crumb">
                                        <li class="has-separator">
                                            <a href="shop-v1-root-category.html">{{ $product['product_code']}}</a>
                                        </li>
                                        <li class="has-separator">
                                            <a href="listing.html">{{ $product['product_color']}}</a>
                                        </li>
                                        <li>
                                            <a href="listing.html">{{ $product['brand']['name'] }}</a>
                                        </li>
                                    </ul>
                                    <h6 class="item-title">
                                        <a
                                            href="{{ url('product/'.$product['id']) }}">{{ $product['product_name'] }}</a>
                                    </h6>
                                    @php
                                    // Get the average rating and total number of reviews for the current product
                                    $averageRating = App\Models\Rating::where('product_id',
                                    $product['id'])->avg('rating');
                                    $totalReviews = App\Models\Rating::where('product_id', $product['id'])->count();
                                    @endphp

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
        <!-- Similar-Products /- -->
        <!-- Recently-View-Products  -->
        <section class="section-maker">
            <div class="container">
                <div class="sec-maker-header text-center">
                    <h3 class="sec-maker-h3">Recently Viewed Products</h3>
                </div>
                <div class="slider-fouc">
                    <div class="products-slider owl-carousel" data-item="4">
                        @foreach($recentlyViewedProducts as $product)
                        <div class="item">
                            <div class="image-container">
                                <a class="item-img-wrapper-link" href="{{ url('product/'.$product['id']) }}">
                                    <?php $product_image_path = 'front/images/product_images/small/'.$product['product_image'] ?>

                                    @if(!empty($product['product_image']) && file_exists($product_image_path))
                                    <img class="img-fluid" src="{{ asset($product_image_path) }}" alt="Product">
                                    @else
                                    <img class="img-fluid"
                                        src="{{ asset('front/images/product_images/small/no-images.png')}}"
                                        alt="Product">
                                    @endif
                                </a>
                                <!-- <div class="item-action-behaviors">
                                        <a class="item-quick-look" data-toggle="modal" href="#quick-view">Quick Look</a>
                                        <a class="item-mail" href="javascript:void(0)">Mail</a>
                                        <a class="item-addwishlist" href="javascript:void(0)">Add to Wishlist</a>
                                        <a class="item-addCart" href="javascript:void(0)">Add to Cart</a>
                                    </div> -->
                            </div>
                            <div class="item-content">
                                <div class="what-product-is">
                                    <ul class="bread-crumb">
                                        <li class="has-separator">
                                            <a href="shop-v1-root-category.html">{{ $product['product_code']}}</a>
                                        </li>
                                        <li class="has-separator">
                                            <a href="listing.html">{{ $product['product_color']}}</a>
                                        </li>
                                        <li>
                                            <a href="listing.html">{{ $product['brand']['name'] }}</a>
                                        </li>
                                    </ul>
                                    <h6 class="item-title">
                                        <a
                                            href="{{ url('product/'.$product['id']) }}">{{ $product['product_name'] }}</a>
                                    </h6>
                                    @php
                                    // Get the average rating and total number of reviews for the current product
                                    $averageRating = App\Models\Rating::where('product_id',
                                    $product['id'])->avg('rating');
                                    $totalReviews = App\Models\Rating::where('product_id', $product['id'])->count();
                                    @endphp

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
        <!-- Recently-View-Products /- -->
    </div>
    <!-- Different-Product-Section /- -->
</div>
</div>
<!-- Single-Product-Full-Width-Page /- -->
@endsection