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
                alert(resp['final_price']);
            },error:function(){
                alert("Error");
            }
        })
    })
});

function get_filter(class_name){
    var filter = []
    $('.'+class_name+':checked').each(function(){
        filter.push($(this).val());

    });
    return filter;
}
