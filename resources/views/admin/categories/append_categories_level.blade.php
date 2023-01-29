<div class="form-group">
    <label for="parent_id">Select Category Level</label>
    <select name="parent_id" id="parent_id" class="form-control">
        <option value="0">Main Category</option>
        @if(!empty($getCategories))
            @foreach($getCategories as$category)
                <option value="{{ $category['id']}}">{{ $category['category_name']}}</option>
            @endforeach
        @endif
    </select>
</div>