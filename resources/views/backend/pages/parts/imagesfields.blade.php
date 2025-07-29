<div class="col-md-8 col-sm-12 col-lg-6">
    <div class="form-group">
        <label for="">Şəkillər</label>
        @if (!empty($data) && count($data) > 0)
            <div class="row">
                @foreach ($data as $key => $value)
                    <div class="col-sm-12 col-md-4 col-lg-3 mb-2 position-relative" id="{{ $value }}">
                        <button type="button" class="btn btn-sm btn-danger position-absolute" style="top:0;right:0;"
                            onclick="deleteimage({{ $elem_id }},'{{ $value }}')"><i
                                class="fa fa-trash"></i></button>
                        <img src="{{ getImageUrl($value, 'images') }}" alt="{{ $key }}" width="150">
                    </div>
                @endforeach
            </div>
        @endif
        <input type="file" name="images[]" multiple class="form-conrol" />
    </div>
</div>
