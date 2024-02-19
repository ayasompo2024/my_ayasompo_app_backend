<div class="form-group">
    <label for="title">Title</label>
    <input type="text" name="title" value="{{ $product_property->title }}"
        class="form-control form-control-sm" placeholder="Enter Name" id="title" />
</div>
<div class="form-group">
    <label for="description">Description</label>
    <textarea type="text" id="editorForProperty" rows="10" style="white-space: pre-wrap;" name="desc"
        class="form-control form-control-sm" placeholder="Enter Descriptione" id="description" />{{$product_property->desc}}</textarea>
</div>