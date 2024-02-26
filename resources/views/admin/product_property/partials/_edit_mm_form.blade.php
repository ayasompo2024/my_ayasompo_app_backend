<div class="form-group">
    <label for="title_mm">Title</label>
    <input type="text" name="title_mm" value="{{ $product_property->title_mm }}"
        class="form-control form-control-sm" placeholder="Enter Name" id="title_mm" />
</div>
<div class="form-group">
    <label for="desc_mm">Description</label>
    <textarea type="text" id="editorForProperty2" rows="10" style="white-space: pre-wrap;" name="desc_mm"
        class="form-control form-control-sm" placeholder="Enter Descriptione" id="desc_mm" />{{$product_property->desc_mm}}</textarea>
</div>