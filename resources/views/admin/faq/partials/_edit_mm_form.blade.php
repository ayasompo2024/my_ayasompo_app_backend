<div>
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title_mm" value="{{ $faq->title_mm }}" class="form-control form-control-sm"
            placeholder="Enter Name" id="title" />
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea type="text" id="editorForProperty2" rows="10" style="white-space: pre-wrap;" name="desc_mm"
            class="form-control form-control-sm" placeholder="Enter Descriptione" id="description" />{{ $faq->desc_mm }}</textarea>
    </div>
</div>
