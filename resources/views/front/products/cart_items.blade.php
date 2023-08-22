<?php use App\Models\Product; ?>
<!-- Products-List-Wrapper -->
<div class="table-wrapper u-s-m-b-60">
    <table>
        <thead>
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Subtotal</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @php $total_price = 0 @endphp
            @foreach($getCartItems as $item)
            <?php
                $getDiscountAttributePrice = Product::getDiscountAttributePrice($item['product_id'],$item['size']);
                $productImage = isset($item['product']['product_image']) ? $item['product']['product_image'] : null;
            $productName = isset($item['product']['product_name']) ? $item['product']['product_name'] : 'Product Name Not Available';
            $productCode = isset($item['product']['product_code']) ? $item['product']['product_code'] : 'Product Code Not Available';
            $productColor = isset($item['product']['product_color']) ? $item['product']['product_color'] : 'Product Color Not Available';
                
            ?>
                        <tr>
                            <td>
                                <div class="cart-anchor-image">
                                    <a href="{{ url('product/'.$item['product_id']) }}">
                                        @if(isset($productImage))
                                            <img src="{{ asset('front/images/product_images/small/'.$productImage) }}" alt="Product">
                                        @else
                                            <p>No product image available</p>
                                        @endif
                                        <h6>
                                            {{ $productName }} ({{ $productCode }}) - {{ $item['size'] }} <br>
                                            Color: {{ $productColor }}
                                        </h6>
                                    </a>
                                </div>
                            </td>
                        <div class="cart-price">
                            @if($getDiscountAttributePrice['discount'] > 0)
                                <div class="price-template">
                                    <div class="item-new-price">
                                        ৳ {{ $getDiscountAttributePrice['final_price'] }}
                                    </div>
                                </div>
                            @endif
                        </div>
                    </td>
                    <td>
                        <div class="cart-quantity">
                            <div class="quantity">
                                <input type="text" class="quantity-text-field" value="{{ $item['quantity'] }}">
                                <a class="plus-a updateCartItem" data-cartid="{{ $item['id'] }}" data-qty="{{ $item['quantity'] }}" data-max="1000">&#43;</a>
                                <a class="minus-a updateCartItem" data-cartid="{{ $item['id']}}" data-qty="{{ $item['quantity'] }}" data-min="1" >&#45;</a>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="cart-price">
                        {{ $getDiscountAttributePrice['final_price'] * $item['quantity'] }}
                        </div>
                    </td>
                    <td>
                        <div class="action-wrapper">
                            <!-- <button class="button button-outline-secondary fas fa-sync"></button> -->
                            <button class="button button-outline-secondary fas fa-trash deleteCartItem" data-cartid="{{ $item['id']}}"></button>
                        </div>
                    </td>
                </tr>
                @php $total_price = $total_price + ($getDiscountAttributePrice['final_price'] * $item['quantity']) @endphp    
            @endforeach
        </tbody>
    </table>
</div>
<!-- Products-List-Wrapper /- -->

<!-- Billing -->
<div class="calculation u-s-m-b-60">
    <div class="table-wrapper-2">
        <table>
            <thead>
                <tr>
                    <th colspan="2">Cart Totals</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <h3 class="calc-h3 u-s-m-b-0">Sub Total</h3>
                    </td>
                    <td>
                        <span class="calc-text">Tk.{{ $total_price }}</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h3 class="calc-h3 u-s-m-b-0 ">Coupon Discount</h3>
                    </td>
                    <td>
                        <span class="calc-text couponAmount">
                            @if(Session::has('couponAmount'))
                                Tk.{{ Session::get('couponAmount') }}
                            @else
                                Tk. 0
                            @endif
                        </span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h3 class="calc-h3 u-s-m-b-0 ">Grand Total</h3>
                    </td>
                    <td>
                        <span class="calc-text grand_total">Tk.{{ $total_price - Session::get('couponAmount') }}</span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<!-- Billing /- -->