<div class="form-group">
    <label for="title_mm">Title</label>
    <input type="text" name="title_mm" class="form-control form-control-sm" placeholder="Enter Name" id="title_mm" />
</div>
<div class="form-group">
    <label for="desc_mm">Description</label>
    <textarea type="text" id="editorForProperty2" rows="10" style="white-space: pre-wrap;" name="desc_mm"
        class="form-control form-control-sm" placeholder="Enter Descriptione" id="desc_mm" /></textarea>
    <input type="hidden" name="product_id" value="{{ $product_id }}" />
    <input type="hidden" name="property_type_id" value="{{ $property_type_id }}" />
</div>
