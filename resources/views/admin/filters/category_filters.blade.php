<?php use App\Models\ProductsFilter; 
    $productFilters = ProductsFilter::productFilters();
?>
@foreach($productFilters as $filter)
    <div class="form-group">
        <label for="{{ $filter['filter_column']}}">Select {{ $filter['filter_name']}}</label>
        <select name="{{ $filter['filter_column']}}" id="{{ $filter['filter_column']}}" class="form-control text-dark">
        <option  value="">Select</option>
        @foreach($filter['filter_values'] as $value)
            <option value="{{$value['filter_value']}}">{{ ucwords($value['filter_value'])}}</option>  
        @endforeach
        </select>
    </div>
@endforeach