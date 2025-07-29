<div class="row">
    <div class="col-sm-6 col-md-4 col-lg-3">
        <div class='form-group'>
            <label>Məbləğ</label>
            <input type='text' class='form-control' name='prices[price]'
                @if (isset($data) && !empty($data) && isset($data['price']) && !empty($data['price'])) value="{{ $data['price'] }}" @endif />
        </div>
    </div>
    <div class="col-sm-6 col-md-4 col-lg-3">
        <div class='form-group'>
            <label>Endirim məbləğ</label>
            <input type='text' class='form-control' name='prices[endirim_price]'
                @if (isset($data) && !empty($data) && isset($data['endirim_price']) && !empty($data['endirim_price'])) value="{{ $data['endirim_price'] }}" @endif />
        </div>
    </div>
</div>
