$(document).ready(function(){
    //$(".loader").show();
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
           
            //Increament qty by
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
                $(".totalCartItems").html(resp.totalCartItems);
                $(".totalCartItems").html(resp.totalCartItems);
                if(resp.status==false){
                    alert(resp.message);
                }
                $('#appendCartItems').html(resp.view);
                $('#appendHeaderCartItems').html(resp.headerview);
            },error:function(){
                alert("Error");
            }
        })
    });

    //Delete cart items Qty
    $(document).on('click','.deleteCartItem', function(){
        var cartid = $(this).data('cartid');
        var result = confirm("Want to Delete This Product")
        if(result){
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data:{cartid:cartid},
                url:'/cart/delete',
                type:'post',
                success:function(resp){
                    $(".totalCartItems").html(resp.totalCartItems);
                    $('#appendCartItems').html(resp.view);
                },error:function(){
                    alert("Error");
                }
            })  
          $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data:{cartid:cartid},
            url:'/cart/delete',
            type:'post',
            success:function(resp){
                $(".totalCartItems").html(resp.totalCartItems);
                $('#appendCartItems').html(resp.view);
                $('#appendHeaderCartItems').html(resp.headerview);
            },error:function(){
                alert("Error");
            }
        })  
        }
            
    });

    // Show Loader
    $(document).on('click', '#placeOrder', function(){
        $(".loader").show();
    });

    //Register Form Validation
    $("#registerForm").submit(function(){
        $(".loader").show();
        var formdata = $(this).serialize();
        $.ajax({
            url:"/user/register",
            type:"POST",
            data:formdata,
            success:function(resp){
                if(resp.type=="error"){
                    $(".loader").hide();
                    $.each(resp.errors,function(i,error){
                            $("#register-"+i).attr('style','color:red');
                            $("#register-"+i).html(error);
                        setTimeout(function(){
                            $("#register-"+i).css({
                                'display':'none'
                            });
                        },3000);
                    });
                }else if(resp.type=="success"){
                    // alert(resp.message);
                    $(".loader").hide();
                    $("#register-success").attr('style','color:green');
                    $("#register-success").html(resp.message);
                }   
            },error:function(){
                alert("error");
            }
        })
    });

    //Account Form Validation
    $("#accountForm").submit(function(){
        $(".loader").show();
        var formdata = $(this).serialize();
        $.ajax({
            url:"/user/account",
            type:"POST",
            data:formdata,
            success:function(resp){
                if(resp.type=="error"){
                    $(".loader").hide();
                    $.each(resp.errors,function(i,error){
                            $("#account-"+i).attr('style','color:red');
                            $("#account-"+i).html(error);
                        setTimeout(function(){
                            $("#account-"+i).css({
                                'display':'none'
                            });
                        },3000);
                    });
                }else if(resp.type=="success"){
                    // alert(resp.message);
                    $(".loader").hide();
                    $("#account-success").attr('style','color:green');
                    $("#account-success").html(resp.message);
                    setTimeout(function(){
                        $("#account-success").css({
                            'display':'none'
                        });
                    },3000);
                }   
            },error:function(){
                alert("error");
            }
        })
    });

    //Password Form Validation
    $("#passwordForm").submit(function(){
        $(".loader").show();
        var formdata = $(this).serialize();
        $.ajax({
            url:"/user/update-password",
            type:"POST",
            data:formdata,
            success:function(resp){
                if(resp.type=="error"){
                    $(".loader").hide();
                    $.each(resp.errors,function(i,error){
                            $("#password-"+i).attr('style','color:red');
                            $("#password-"+i).html(error);
                        setTimeout(function(){
                            $("#password-"+i).css({
                                'display':'none'
                            });
                        },3000);
                    });
                }else if(resp.type=="incorrect"){
                    $(".loader").hide();
                        $("#password-error").attr('style','color:red');
                        $("#password-error").html(resp.message);
                    setTimeout(function(){
                        $("#password-error").css({
                            'display':'none'
                        });
                    },3000);
                }else if(resp.type=="success"){
                    // alert(resp.message);
                    $(".loader").hide();
                    $("#password-success").attr('style','color:green');
                    $("#password-success").html(resp.message);
                    setTimeout(function(){
                        $("#password-success").css({
                            'display':'none'
                        });
                    },3000);
                }   
            },error:function(){
                alert("error");
            }
        })
    });

    //Login Form Validation
    $("#loginForm").submit(function(){
        var formdata = $(this).serialize();
        $.ajax({
            url:"/user/login",
            type:"POST",
            data:formdata,
            success:function(resp){
                if(resp.type=="error"){
                    $.each(resp.errors,function(i,error){
                            $("#login-"+i).attr('style','color:red');
                            $("#login-"+i).html(error);
                        setTimeout(function(){
                            $("#register-"+i).css({
                                'display':'none'
                            });
                        },3000);
                    });
                }else if(resp.type=="incorrect"){
                    // alert(resp.message);
                    $("#login-error").attr('style','color:red');
                    $("#login-error").html(resp.message);
                }else if(resp.type=="inactive"){
                    // alert(resp.message);
                    $("#login-error").attr('style','color:red');
                    $("#login-error").html(resp.message);
                }else if(resp.type=="success"){
                    window.location.href = resp.url;
                }  
            },error:function(){
                alert("error");
            }
        })
    });

    //Forgot Password Form Validation
    $("#forgotForm").submit(function(){
        $(".loader").show();
        var formdata = $(this).serialize();
        $.ajax({
            url:"/user/forgot-password",
            type:"POST",
            data:formdata,
            success:function(resp){
                if(resp.type=="error"){
                    $(".loader").hide();
                    $.each(resp.errors,function(i,error){
                            $("#forgot-"+i).attr('style','color:red');
                            $("#forgot-"+i).html(error);
                        setTimeout(function(){
                            $("#forgot-"+i).css({
                                'display':'none'
                            });
                        },3000);
                    });
                }else if(resp.type=="success"){
                    // alert(resp.message);
                    $(".loader").hide();
                    $("#forgot-success").attr('style','color:green');
                    $("#forgot-success").html(resp.message);
                }   
            },error:function(){
                alert("error");
            }
        })
    });

    //Apply Coupon

    $("#ApplyCoupon").submit(function(){
        var user = $(this).attr("user");
        if(user==1){
            //Do nothing
        }else{
        alert("Please Login to Apply Coupon!");
        return false;
        }
        var code = $("#code").val();
        $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type:'post',
        data:{code:code},
        url:'/apply-coupon',
        success:function(resp){
            console.log(resp);
            if(resp.message!=""){
                alert(resp.message)
            }
            $(".totalCartItems").html(resp.totalCartItems);
            $('#appendCartItems').html(resp.view);
            $('#appendHeaderCartItems').html(resp.headerview);
            if(resp.couponAmount > 0){
                $('.couponAmount').text("Tk."+resp.couponAmount);
            }else{
                $('.couponAmount').text("Tk.0");
            }
            if(resp.grand_total > 0){
                $('.grand_total').text("Tk."+resp.grand_total);
            }
        },error:function(){
            alert("Error");
        }
    })
    });

    // Edit Delivery Address
    $(document).on('click','.editAddress',function(){
        var addressid = $(this).data("addressid");
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data:{addressid:addressid},
            url:'/get-delivery-address',
            type:'post',
            success:function(resp){
                $("#showdifferent").removeClass("collapse");
                $(".newAddress").hide();
                $(".deliveryText").text("Edit Delivery Address");
                $('[name=delivery_id]').val(resp.address['id']);
                $('[name=delivery_name]').val(resp.address['name']);
                $('[name=delivery_address]').val(resp.address['address']);
                $('[name=delivery_city]').val(resp.address['city']);
                $('[name=delivery_state]').val(resp.address['state']);
                $('[name=delivery_country]').val(resp.address['country']);
                $('[name=delivery_pincode]').val(resp.address['pincode']);
                $('[name=delivery_mobile]').val(resp.address['mobile']);
            },error:function(){
                alert("Error");
            }
        });
    });

    //Save Delivery Address
    $(document).on('submit',"#addressAddEditForm",function(){
        var formdata = $("#addressAddEditForm").serialize();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/save-delivery-address',
            type: 'post',
            data: formdata,
            success:function(resp){
                if(resp.type=="error"){
                    $(".loader").hide();
                    $.each(resp.errors,function(i,error){
                            $("#delivery-"+i).attr('style','color:red');
                            $("#delivery-"+i).html(error);
                        setTimeout(function(){
                            $("#delivery-"+i).css({
                                'display':'none'
                            });
                        },3000);
                    });
                }else{
                    $("#deliveryAddresses").html(resp.view);
                    window.location.href = "checkout";
                }
            },error:function(){
                alert("Error");
            }
        });
    })

    //Remove Delivery Address
    $(document).on('click','.removeAddress',function(){
        if(confirm("Are you sure to remove this?")){
            var addressid = $(this).data("addressid");
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/remove-delivery-address',
                type: 'post',
                data: {addressid:addressid},
                success:function(resp){
                    $("#deliveryAddresses").html(resp.view);
                    window.location.href = "checkout";
                },error:function(){
                    alert("Error");
                }
            });
        }
    });

    // Calculate grand total
    $("input[name=address_id]").bind('change',function(){
        var shipping_charges = $(this).attr("shipping_charges");
        var total_price = $(this).attr("total_price");
        var coupon_amount = $(this).attr("coupon_amount");
        $(".shipping_charges").html("TK."+shipping_charges);
        var allpincodeCount =  $(this).attr("allpincodeCount");
        if(allpincodeCount >0 ){
            $(".allpincodeMethod").show();
        }else{
            $(".allpincodeMethod").hide();
        }
        if(coupon_amount==""){
            coupon_amount = 0;
        }
        $(".couponAmount").html("TK."+coupon_amount);
        var grand_total = parseInt(total_price) + parseInt(shipping_charges) - parseInt(coupon_amount);
        //alert(grand_total);
        $(".grand_total").html("TK."+grand_total);
    });
});

    
 function get_filter(class_name){
    var filter = []
    $('.'+class_name+':checked').each(function(){
        filter.push($(this).val());

    });
    return filter;
}