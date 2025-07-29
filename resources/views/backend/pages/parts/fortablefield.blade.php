<td class="text-center">
    @switch($type)
        @case('logojson')
            @if (isset($data->logos['logo']) && !empty($data->logos['logo']))
                <img class="img-fluid img-responsive img-circle img-small" style="height:100px"
                    src="{{ getImageUrl($data->logos['logo'], 'images') }}"
                    alt="{{ $data->name[app()->getLocale() . '_name'] }}" />
            @else
                <span class="text-center text-danger">Məlumat tapılmadı</span>
            @endif
        @break

        @case('imagejson')
            @if (!empty($data->images) && count($data->images) > 0)
                <div class="row">
                    @foreach ($data->images as $key => $image)
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <img class="img-fluid img-responsive img-circle img-small" style="height:50px"
                                src="{{ getImageUrl($image, 'images') }}"
                                alt="{{ $data->name[app()->getLocale() . '_name'] }}" />
                        </div>
                    @endforeach
                </div>
            @else
                <span class="text-center text-danger">Məlumat tapılmadı</span>
            @endif
        @break

        @case('namejson')
            @if (
                !empty($data->name) &&
                    isset($data->name[app()->getLocale() . '_name']) &&
                    !empty($data->name[app()->getLocale() . '_name']))
                {{ $data->name[app()->getLocale() . '_name'] }}
            @else
                <span class="text-center text-danger">Məlumat tapılmadı</span>
            @endif
        @break

        @case('key')
            @if (isset($data->key) && !empty($data->key))
                {{ $data->key }}
            @else
                <span class="text-center text-danger">Məlumat tapılmadı</span>
            @endif
        @break

        @case('valuejson')
            @if (
                !empty($data->value) &&
                    isset($data->value[app()->getLocale() . '_value']) &&
                    !empty($data->value[app()->getLocale() . '_value']))
                {{ $data->value[app()->getLocale() . '_value'] }}
            @else
                <span class="text-center text-danger">Məlumat tapılmadı</span>
            @endif
        @break

        @case('descriptionjson')
            @if (
                !empty($data->description) &&
                    isset($data->description[app()->getLocale() . '_description']) &&
                    !empty($data->description[app()->getLocale() . '_description']))
                {{ $data->description[app()->getLocale() . '_description'] }}
            @else
                <span class="text-center text-danger">Məlumat tapılmadı</span>
            @endif
        @break

        @case('addressjson')
            @if (
                !empty($data->address) &&
                    isset($data->address[app()->getLocale() . '_address']) &&
                    !empty($data->address[app()->getLocale() . '_address']))
                {{ $data->address[app()->getLocale() . '_address'] }}
            @else
                <span class="text-center text-danger">Məlumat tapılmadı</span>
            @endif
        @break

        @case('status')
            <span class="text-white @if ($data->status == 1) bg-success @else bg-danger @endif w-100 h-100 d-block">
                {{ $data->status == 1 ? 'Aktiv' : 'Passiv' }}</span>
        @break

        @case('user_id')
            <span class="text-black">
                @php($user = users($data->user_id))
                @if (!empty($user) && isset($user->id))
                    {{ $user->name }}
                @else
                    <span class="text-center text-danger">Məlumat tapılmadı</span>
                @endif
            </span>
        @break

        @case('domain')
            @if (isset($data->domain) && !empty($data->domain))
                {{ $data->domain }}
            @else
                <span class="text-center text-danger">Məlumat tapılmadı</span>
            @endif
        @break

        @case('setting')
            @php($settingcurrent = settings($data->setting_id, 'id'))
            @if (!empty($settingcurrent) && isset($settingcurrent->id) && !empty($settingcurrent->id))
                {{ $settingcurrent->name[app()->getLocale() . '_name'] }}
            @else
                <span class="text-center text-danger">Məlumat tapılmadı</span>
            @endif
        @break

        @case('image_or_video')
            @if ($data->type_of == 'image' && isset($data->image_or_video) && !empty($data->image_or_video))
                <img src="{{ getImageUrl($data->image_or_video, 'images') }}" class="img-fluid img-responsive"
                    style="height:100px" />
            @elseif($data->type_of == 'video' && isset($data->image_or_video) && !empty($data->image_or_video))
                <video style="width:100%;" src="{{ getImageUrl($data->image_or_video, 'images') }}" controls></video>
            @endif
        @break

        @case('image')
            @if (isset($data->image) && !empty($data->image))
                <img src="{{ getImageUrl($data->image, 'images') }}" class="img-fluid img-responsive" style="height:100px" />
            @else
                <p class="text-center text-danger">Məlumat tapılmadı</p>
            @endif
        @break

        @case('video')
            @if (isset($data->video) && !empty($data->video))
                <video src="{{ getImageUrl($data->video, 'images') }}"></video>
            @else
                <p class="text-center text-danger">Məlumat tapılmadı</p>
            @endif
        @break

        @case('name')
            {{ $data->name }}
        @break

        @case('email')
            {{ $data->email }}
        @break

        @case('top_category_id')
            @php($category = categories($data->top_category_id, 'id'))
            @if (!empty($category) && isset($category->id))
                {{ $category->name[app()->getLocale() . '_name'] }}
            @else
                <span class="text-center text-danger">Məlumat tapılmadı</span>
            @endif
        @break

        @case('top_service_id')
            @php($service = services($data->top_service_id, 'id'))
            @if (!empty($service) && isset($service->id))
                {{ $service->name[app()->getLocale() . '_name'] }}
            @else
                <span class="text-center text-danger">Məlumat tapılmadı</span>
            @endif
        @break

        @case('user_info')
            @if (!empty($data->user_info) && isset($data->user_info['name']) && !empty($data->user_info['name']))
                {{ $data->user_info['name'] }} @if (isset($data->user_info['email']) && !empty($data->user_info['email']))
                    <a href="mailto:{{ $data->user_info['email'] }}">{{ $data->user_info['email'] }}</a>
                @endif
                @if (isset($data->user_info['phone']) && !empty($data->user_info['phone']))
                    <a href="tel:{{ $data->user_info['phone'] }}">{{ $data->user_info['phone'] }}</a>
                @endif
            @else
                <span class="text-center text-danger">Məlumat tapılmadı</span>
            @endif
        @break

        @case('ip_address')
            {{ $data->ip_address }}
        @break

        @case('meta')
            @if (!empty($data->meta) && isset($data->meta['device']) && !empty($data->meta['device']))
                {{ $data->meta['device'] }} {{ $data->meta['browser'] }}
            @else
                <span class="text-center text-danger">Məlumat tapılmadı</span>
            @endif
        @break

        @case('category_id')
            @php($category = categories($data->category_id, 'id'))
            @if (!empty($category) && isset($category->id) && !empty($category->id))
                {{ $category->name[app()->getLocale() . '_name'] }}
            @else
                <span class="text-center text-danger">Məlumat tapılmadı</span>
            @endif
        @break

        @case('pricejson')
            @if (isset($data->prices['endirim_price']) && !empty($data->prices['endirim_price']))
                {{ $data->prices['endirim_price'] }}
                <small style="text-decoration: overline">{{ $data->prices['price'] }}</small>
            @else
                {{ $data->prices['price'] }}
            @endif
        @break

    @endswitch
</td>
