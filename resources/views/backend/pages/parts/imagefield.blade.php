<div class="col-md-8 col-sm-12 col-lg-6">
    <div class="form-group">
        <label for="">Şəkil</label>
        @if (isset($data) && !empty($data))
            <div class="row mb-2">
                <img src="{{ getImageUrl($data, 'images') }}" class="img-fluid img-responsive" style="height:100px" />
            </div>
        @endif
        <input type="file" name="image" class="form-conrol" />
    </div>
</div>
