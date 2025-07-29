<div class="col-md-8 col-sm-12 col-lg-6">
    <div class="form-group">
        <label for="">Şəkil və ya video</label>
        <div class="row mb-2">
            @if ($type_of == 'image' && isset($data) && !empty($data))
                <img src="{{ getImageUrl($data, 'images') }}" class="img-fluid img-responsive" style="height:100px" />
            @elseif($type_of == 'video' && isset($data) && !empty($data))
                <video style="width:100%;" src="{{ getImageUrl($data, 'images') }}" controls></video>
            @endif
        </div>
        <input type="file" name="image_or_video" class="form-conrol" />
    </div>
</div>
