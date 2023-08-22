<?php use App\Models\Product;
$getCartItems = getCartItems() 
?>
<!-- Mini Cart -->
<div class="mini-cart-wrapper">
        <div class="mini-cart">
            <div class="mini-cart-header">
                YOUR CART
                <button type="button" class="button ion ion-md-close" id="mini-cart-close"></button>
            </div>
            <ul class="mini-cart-list">
            @php $total_price = 0 @endphp
    @foreach($getCartItems as $item)
        <?php
            $getDiscountAttributePrice = Product::getDiscountAttributePrice($item['product_id'],$item['size']);
            
            // Check if 'product' key exists within $item before accessing it
            $productImage = isset($item['product']['product_image']) ? $item['product']['product_image'] : null;
            $productName = isset($item['product']['product_name']) ? $item['product']['product_name'] : 'Product Name Not Available';
        ?>
        <li class="clearfix">
            <a href="{{ url('product/'.$item['product_id']) }}">
                @if(isset($productImage))
                    <img src="{{ asset('front/images/product_images/small/'.$productImage) }}" alt="Product">
                @else
                    <p>No product image available</p>
                @endif
                <span class="mini-item-name">{{ $productName }}</span>
                <span class="mini-item-price">৳ {{ $getDiscountAttributePrice['final_price'] }}</span>
                <span class="mini-item-quantity"> x {{ $item['quantity'] }} </span>
            </a>
        </li>
        @php $total_price = $total_price + ($getDiscountAttributePrice['final_price'] * $item['quantity']) @endphp    
    @endforeach 
            </ul>
            <div class="mini-shop-total clearfix">
                <span class="mini-total-heading float-left">Total:</span>
                <span class="mini-total-price float-right">৳{{ $total_price }}</span>
            </div>
            <div class="mini-action-anchors">
                <a href="{{ url('cart')}}" class="cart-anchor">View Cart</a>
                <a href="{{ url('checkout')}}" class="checkout-anchor">Checkout</a>
            </div>
        </div>
    </div>
    <!-- Mini Cart /- -->