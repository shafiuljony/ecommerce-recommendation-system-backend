<!-- Form-Fields /- -->
<h4 class="section-h4 deliveryText">Add New Delivery Address</h4>
<div class="u-s-m-b-24">
    <input type="checkbox" class="check-box" id="ship-to-different-address" data-toggle="collapse"
        data-target="#showdifferent">
    @if(count($deliveryAddresses)>0)
    <label class="label-text newAddress" for="ship-to-different-address">Ship to a different address?</label>
    @else
    <label class="label-text newAddress" for="ship-to-different-address">Check to add Delivery Address</label>
    @endif
</div>
<div class="collapse" id="showdifferent">
    <!-- Form-Fields -->
    <form id="addressAddEditForm" action="javascript:;" method="post">@csrf
        <input type="hidden" name="delivery_id">
        <div class="group-inline u-s-m-b-13">
            <div class="group-1 u-s-p-r-16">
                <label for="first-name-extra">Name
                    <span class="astk">*</span>
                </label>
                <input type="text" name="delivery_name" id="delivery_name" class="text-field">
                <p id="delivery-delivery_name"></p>
            </div>
            
            <div class="group-2">
                <label for="last-name-extra">Address
                    <span class="astk">*</span>
                </label>
                <input type="text" name="delivery_address" id="delivery_address" class="text-field">
                <p id="delivery-delivery_address"></p>
            </div>
        </div>
        <div class="group-inline u-s-m-b-13">
            <div class="group-1 u-s-p-r-16">
                <label for="first-name-extra">City
                    <span class="astk">*</span>
                </label>
                <input type="text" name="delivery_city" id="delivery_city" class="text-field">
                <p id="delivery-delivery_city"></p>
            </div>
            <div class="group-2">
                <label for="last-name-extra">State
                    <span class="astk">*</span>
                </label>
                <input type="text" name="delivery_state" id="delivery_state" class="text-field">
                <p id="delivery-delivery_state"></p>
            </div>
        </div>
        <div class="u-s-m-b-13">
            <label for="select-country-extra">Country
                <span class="astk">*</span>
            </label>
            <div class="select-box-wrapper">
                <select class="select-box" id="delivery_country" name="delivery_country">
                    <option value="">Select Country</option>
                    @foreach($countries as $country)
                    <option value="{{ $country['country_name'] }}" @if($country['country_name']==Auth::user()->country)
                        selected @endif>{{ $country['country_name'] }}</option>
                    @endforeach
                </select>
                <p id="delivery-delivery_country"></p>
            </div>
        </div>
        <div class="u-s-m-b-13">
            <label for="postcode-extra">Pincode
                <span class="astk">*</span>
            </label>
            <input type="text" id="delivery_pincode" name="delivery_pincode" class="text-field">
            <p id="delivery-delivery_pincode"></p>
        </div>
        <div class="u-s-m-b-13">
            <label for="postcode-extra">Mobile
                <span class="astk">*</span>
            </label>
            <input type="text" id="delivery_mobile" name="delivery_mobile" class="text-field">
            <p id="delivery-delivery_mobile"></p>
        </div>
        <div class="u-s-m-b-13">
            <button style="width:100%;" type="submit" class="button button-outline-secondary">Save</button>
        </div>
    </form>
    <!-- Form-Fields /- -->
</div>
<div>
    <label for="order-notes">Order Notes</label>
    <textarea class="text-area" id="order-notes"
        placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
</div>