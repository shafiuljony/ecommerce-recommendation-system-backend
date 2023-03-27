function get_filter(class_name){
    var filter = []
    $('.'+class_name+':checked').each(function(){
        filter.push($(this).val());

    });
    return filter;
}



$(document).ready(function(){


    //Register Form Validation
    $("#registerForm").submit(function(){
        var formdata = $(this).serialize();
        $.ajax({
            url:"/user/register",
            type:"POST",
            data:formdata,
            success:function(resp){
                alert(resp.url); 
                window.location.href = resp.url;
            },error:function(){
                alart("Error");
            }
        })
    });


});