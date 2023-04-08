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
        //$(".loader").show();
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
});

function get_filter(class_name){
    var filter = []
    $('.'+class_name+':checked').each(function(){
        filter.push($(this).val());

    });
    return filter;
}
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