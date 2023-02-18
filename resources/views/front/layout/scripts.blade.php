<?php use App\Models\ProductsFilter; 
    $productFilters = ProductsFilter::productFilters();
?>
<script>
$(document).ready(function(){
    $("#sort").on("change",function(){
        // this.form.submit();
        var sort = $("#sort").val();
        var url = $("#url").val();
        @foreach($productFilters as $filters)
            var {{ $filters['filter_column'] }} = get_filter("{{ $filters['filter_column'] }}");
        @endforeach
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url:url,
            method:'Post',
            data: {
                @foreach($productFilters as $filters)
                    {{ $filters['filter_column'] }}:{{ $filters['filter_column'] }},
                @endforeach
                url:url,sort:sort},
            success:function(data){
                $('.filter_products').html(data);
            },error:function(){
                alert('Error');
            }
        })
    });
});

    @foreach($productFilters as $filter)
    $(".{{ $filter['filter_column'] }}").on('click',function(){
        var url = $("#url").val();
        var sort = $("#sort option:selected").text();
        @foreach($productFilters as $filters)
            var {{ $filters['filter_column'] }} = get_filter("{{ $filters['filter_column'] }}");
        @endforeach
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: url,
            method: "Post",
            data: {
                @foreach($productFilters as $filters)
                    {{ $filters['filter_column'] }}:{{ $filters['filter_column'] }},
                @endforeach
                url:url,sort:sort},
            success: function(data){
                $('.filter_products').html(data);
            },error:function(){
                alert('Error');
            }
        });
    });
    @endforeach
</script>