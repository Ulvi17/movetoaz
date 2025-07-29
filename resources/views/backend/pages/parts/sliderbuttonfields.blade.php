<div class="row">
    <div class="col-sm-6 col-md-4 col-lg-3">
        <label>Buton adı</label>
        <input type="text" class="form-control" name="button_data[name]"
            @if (isset($data) ** !empty($data) && isset($data['name']) && !empty($data['name'])) value="{{ $data['name'] }}" @endif />
    </div>
    <div class="col-sm-6 col-md-4 col-lg-3">
        <label>Buton rəngi</label>
        <input type="color" class="form-control" name="button_data[color]"
            @if (isset($data) ** !empty($data) && isset($data['color']) && !empty($data['color'])) value="{{ $data['color'] }}" @endif />
    </div>
    <div class="col-sm-6 col-md-4 col-lg-3">
        <label>Buton yönləndiriləcək url</label>
        <input type="url" class="form-control" name="button_data[url]"
            @if (isset($data) ** !empty($data) && isset($data['url']) && !empty($data['url'])) value="{{ $data['url'] }}" @endif />
    </div>
</div>
