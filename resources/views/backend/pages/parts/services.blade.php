<div class="col-sm-6 col-md-4 col-lg-3">
    <label>{{ $label }}</label>
    <select name="services[]" class="selectpicker" multiple data-live-search="true">
        <option></option>
        @foreach ($collect as $key => $val)
            <option @if (isset($data) &&
                    !empty($data) &&
                    isset($elem_id) &&
                    !empty($elem_id) &&
                    !empty(product_has_service($val->id, $elem_id)) &&
                    isset(product_has_service($val->id, $elem_id)->id)) selected @endif value="{{ $val->id }}">
                {{ $val->name[app()->getLocale() . '_name'] }}</option>
        @endforeach
    </select>
</div>
