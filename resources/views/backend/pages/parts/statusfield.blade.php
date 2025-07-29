<div class="col-md-2">
    <div class="form-group">
        <label for="">{{ $label }}</label>
        <input type="checkbox"
            {{ isset($data) && !empty($data) && $data ? 'checked' : '' }}
            name="{{ $name }}"
            class="js-switch {{ $errors->first('status') ? 'is-invalid' : '' }}">
    </div>
</div>
