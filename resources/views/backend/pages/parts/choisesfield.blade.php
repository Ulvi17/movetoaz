<div class="col-lg-4 col-md-6 col-sm-12">
    <div class="form-group">
        <label for="">{{ $label }}@if ($required == true)
                <span class="text-danger">*</span>
            @endif
        </label>
        <select name="{{ $name }}" class="form-control" @if ($required == true) required @endif>
            <option></option>
            @if (!empty($collect) && count($collect) > 0)
                @foreach ($collect as $elem)
                    <option @if (isset($data) && !empty($data) && $data == $elem->id) selected @endif value="{{ $elem->id }}">
                        {{ $elem->name[app()->getLocale() . '_name'] }}</option>
                    @if (!empty($elem->child_services) && count($elem->child_services) > 0)
                        @foreach ($elem->child_services as $subelem)
                            <option @if (isset($data) && !empty($data) && $data == $subelem->id) selected @endif value="{{ $subelem->id }}">
                                &nbsp;&nbsp;&nbsp; {{ $subelem->name[app()->getLocale() . '_name'] }}</option>
                        @endforeach
                    @endif
                @endforeach
            @endif
        </select>
    </div>
</div>
