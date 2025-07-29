<div class="col-sm-6 col-md-4 col-lg-3">
    <label>{{ $label }}</label>
    @php
        $langs = !empty($data) ? $data : [];
    @endphp

    <select name="langs[]" class="selectpicker" multiple data-live-search="true">
        <option></option>
        @foreach (config('laravellocalization.localesall') as $key => $value)
            <option @if (!empty($langs) && in_array($value, $langs)) selected @endif value="{{ $value }}">
                {{ strtoupper($value) }}
            </option>
        @endforeach
    </select>

</div>
