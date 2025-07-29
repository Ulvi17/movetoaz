<div class="col-md-8 col-sm-12 col-lg-6">
    <div class="form-group">
        <label for="">Video</label>
        @if (isset($data) && !empty($data))
            <div class="row mb-2">
                <video src="{{ getImageUrl($data, 'images') }}"></video>
            </div>
        @endif
        <input type="file" name="video" class="form-conrol" />
    </div>
</div>
