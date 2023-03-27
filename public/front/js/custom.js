$(document).ready(function(){
    $('#getPrice').change(function(){
        var size = $(this).val();
        var product_id = $(this).attr("product-id");
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/get-product-price',
            data: { size:size, product_id:product_id},
            type: 'post',
            success: function(resp){
                
                if(resp['discount']>0){
                    $(".getAttributePrice").html("<div class='price'><h4>৳ "+resp['final_price']+"</h4></div><div class='original-price'><span>Original Price:</span><span>৳ "+resp['product_price']+"</span></div>");
                }else{
                    $(".getAttributePrice").html("<div class='price'><h4>৳ "+resp['final_price']+"</h4></div>");
                }
            },error:function(){
                alert("Error");
            }
        })
    })

    //Update cart items Qty
    $(document).on('click','.updateCartItem', function(){
        if($(this).hasClass('plus-a')){
            //Get qty
            var quantity = $(this).data('qty');
           
            //Increment qty by
             new_qty = parseInt(quantity + 1); 
            //  alert(new_qty)
        }
        if($(this).hasClass('minus-a')){
            //Get qty
            var quantity = $(this).data('qty');
            //Check Qty
            if(quantity <= 1){
                alert("Items Quantity must be 1 or Greater!");
                return false;
            }
           
            //Increment qty by
             new_qty = parseInt(quantity - 1); 
        }
        var cartid = $(this).data('cartid');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data:{cartid:cartid,qty:new_qty},
            url: '/cart/update',
            type: 'post',
            success:function(resp){
                alert(resp);
            },error:function(){
                alert("Error");
            }
        })
    });
});

function get_filter(class_name){
    var filter = []
    $('.'+class_name+':checked').each(function(){
        filter.push($(this).val());

    });
    return filter;
}
