@if (
    (isset($name) && $name == true) ||
        (isset($slug) && $slug == true) ||
        (isset($address) && $address == true) ||
        (isset($value) && $value == true) ||
        (isset($position) && $position == true) ||
        (isset($description) && $description == true))
    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                <button class="nav-link {{ strtoupper($localeCode) }} @if ($localeCode == 'az') active @endif"
                    id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab"
                    aria-controls="nav-home" aria-selected="true"
                    onclick="changeTabElements('{{ strtoupper($localeCode) }}')">{{ strtoupper($localeCode) }}</button>
                &nbsp;
            @endforeach
        </div>
    </nav>
@endif
<div class="tab-content" id="nav-tabContent">
    @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
        <div class="tab-pane {{ strtoupper($localeCode) }} fade @if ($localeCode == 'az') show active @endif pt-3"
            id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            <div class="row">
                @if (isset($name) && $name == true)
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Ad <span
                                    class="badge badge-info">{{ strtoupper($localeCode) }}</span></label>
                            <input type="text" id="{{ $localeCode }}_name"
                                value="{{ old($localeCode . '_name', isset($data) && !empty($data) && isset($data->name[$localeCode . '_name']) && !empty($data->name[$localeCode . '_name']) ? $data->name[$localeCode . '_name'] : null) }}"
                                name="{{ $localeCode }}_name" onkeyup="nameandsetslug('{{ $localeCode }}')"
                                class="form-control {{ $errors->first($localeCode . '_name') ? 'is-invalid' : '' }}">
                        </div>
                    </div>
                @endif
                @if (isset($slug) && $slug == true)
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Url <span
                                    class="badge badge-info">{{ strtoupper($localeCode) }}</span></label>
                            <input type="text" id="{{ $localeCode }}_slug"
                                value="{{ old($localeCode . '_slug', isset($data) && !empty($data) && isset($data->slug[$localeCode . '_slug']) && !empty($data->slug[$localeCode . '_slug']) ? $data->slug[$localeCode . '_slug'] : null) }}"
                                name="{{ $localeCode }}_slug"
                                class="form-control {{ $errors->first($localeCode . '_slug') ? 'is-invalid' : '' }}">
                        </div>
                    </div>
                @endif
                @if (isset($address) && $address == true)
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Ünvan <span
                                    class="badge badge-info">{{ strtoupper($localeCode) }}</span></label>
                            <input type="text"
                                value="{{ old($localeCode . '_address', isset($data) && !empty($data) && isset($data->address[$localeCode . '_address']) && !empty($data->address[$localeCode . '_address']) ? $data->address[$localeCode . '_address'] : null) }}"
                                name="{{ $localeCode }}_address"
                                class="form-control {{ $errors->first($localeCode . '_address') ? 'is-invalid' : '' }}">
                        </div>
                    </div>
                @endif

                @if (isset($value) && $value == true)
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Dəyər <span
                                    class="badge badge-info">{{ strtoupper($localeCode) }}</span></label>
                            <input type="text"
                                value="{{ old($localeCode . '_value', isset($data) && !empty($data) && isset($data->value[$localeCode . '_value']) && !empty($data->value[$localeCode . '_value']) ? $data->value[$localeCode . '_value'] : null) }}"
                                name="{{ $localeCode }}_value"
                                class="form-control {{ $errors->first($localeCode . '_value') ? 'is-invalid' : '' }}">
                        </div>
                    </div>
                @endif

                @if (isset($position) && $position == true)
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Vəzifə <span
                                    class="badge badge-info">{{ strtoupper($localeCode) }}</span></label>
                            <input type="text"
                                value="{{ old($localeCode . '_position', isset($data) && !empty($data) && isset($data->position[$localeCode . '_position']) && !empty($data->position[$localeCode . '_position']) ? $data->position[$localeCode . '_position'] : null) }}"
                                name="{{ $localeCode }}_position"
                                class="form-control {{ $errors->first($localeCode . '_position') ? 'is-invalid' : '' }}">
                        </div>
                    </div>
                @endif

                @if (isset($description) && $description == true)
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Açıqlama <span
                                    class="badge badge-info">{{ strtoupper($localeCode) }}</span></label>
                            <textarea name="{{ $localeCode }}_description"
                                class="form-control summernote {{ $errors->first($localeCode . '_description') ? 'is-invalid' : '' }}"
                                rows="4">{{ old($localeCode . '_description', isset($data) && !empty($data) && isset($data->description[$localeCode . '_description']) && !empty($data->description[$localeCode . '_description']) ? $data->description[$localeCode . '_description'] : null) }}</textarea>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    @endforeach
</div>
@push('js')
    <script>
        function nameandsetslug(locale) {
            const nameInput = document.getElementById(`${locale}_name`);
            const slugInput = document.getElementById(`${locale}_slug`);
            const slug = nameInput.value.trim()
                .toLowerCase()
                .replace(/[^a-z0-9\s-]/g, '')
                .replace(/\s+/g, '-')
                .replace(/-+/g, '-');
            slugInput.value = slug;
        }

        window.addEventListener('load', function() {
            @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                nameandsetslug('{{ $localeCode }}');
            @endforeach
        });
    </script>
@endpush
