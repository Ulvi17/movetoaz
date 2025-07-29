@extends('backend.layouts.main')
@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
@endpush
@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
    <script>
        setTimeout(() => {
            $('.selectpicker').selectpicker();
        }, 1000);
    </script>
    <script>
        function deleteimage(id, image) {
            event.preventDefault();
            var r = confirm("Şəkli silmək istədiyinizdən əminsiniz?");
            if (r == true) {
                $.ajax({
                    url: "{{ route('delete.image') }}",
                    type: 'DELETE',
                    data: {
                        '_token': '{{ csrf_token() }}',
                        'id': id,
                        'image': `${image}`,
                        routename: '{{ $pageparams['routename'] }}'
                    },
                    success: function(data) {
                        if (data.status == 'success') {
                            var imageElement = document.getElementById(image);

                            if (imageElement) {
                                imageElement.remove();
                            }

                            toastr.success(data.message);
                        } else if (data.status == 'warning') {
                            toastr.warning(data.message);
                        } else if (data.status == 'danger') {
                            toastr.error(data.message);
                        }
                    },
                    error: function(err) {
                        toastr.error("Xəta yarandı yenidən yoxlayın");
                    }
                });
            } else {
                toastr.error("Uğursuz");
            }

        }
    </script>

    <script>
        var elem = document.querySelector('.js-switch');
        var switchery = new Switchery(elem, {
            color: '#1AB394'
        });
    </script>
@endpush
@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>{{ $pageparams['title'] }}</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.index', ['page' => 'welcome']) }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.index', ['page' => $pageparams['routename']]) }}">{{ $pageparams['title'] }}</a>
                </li>
            </ol>
        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <div class="ibox-tools mb-3">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="fullscreen-link">
                                <i class="fa fa-expand"></i>
                            </a>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-6">
                                <h5>{{ $pageparams['title'] }}</h5>
                            </div>
                            <div class="col-6 text-right">
                                <a href="{{ route('admin.index', ['page' => $pageparams['routename']]) }}"
                                    class="btn btn-w-m btn-default">Geri</a>
                            </div>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <form
                            @if (isset($data) && !empty($data) && isset($data->id)) action="{{ route('admin.store_update', ['page' => $pageparams['routename'], 'id' => $data->id]) }}" @else action="{{ route('admin.store_update', ['page' => $pageparams['routename']]) }}" @endif
                            method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="user_id" value="{{ auth()->id() }}" />
                            <input type="hidden" name="page" value="{{ $pageparams['routename'] }}" />
                            @csrf

                            @include('backend.parts.language_fields', [
                                'name' => in_array('namejson', $pageparams['fields']),
                                'slug' => in_array('slugjson', $pageparams['fields']),
                                'position' => in_array('positionjson', $pageparams['fields']),
                                'description' => in_array('descjson', $pageparams['fields']),
                                'address' => in_array('addressjson', $pageparams['fields']),
                                'value' => in_array('valuejson', $pageparams['fields']),
                                'data' => isset($data) && !empty($data) ? $data : null,
                            ])

                            @if (in_array('socialjson', $pageparams['fields']))
                                @include('backend.pages.parts.socialmediafields', [
                                    'data' => $data->social_media ?? null,
                                ])
                            @endif

                            @if (in_array('logojson', $pageparams['fields']))
                                @include('backend.pages.parts.logofields', [
                                    'data' => $data->logos ?? null,
                                ])
                            @endif

                            @if (in_array('imagesjson', $pageparams['fields']))
                                @include('backend.pages.parts.imagesfields', [
                                    'data' => $data->images ?? null,
                                    'elem_id' => $data->id ?? null,
                                ])
                            @endif

                            @if (in_array('button_data', $pageparams['fields']))
                                @include('backend.pages.parts.sliderbuttonfields', [
                                    'data' => $data->button_data ?? null,
                                ])
                            @endif

                            @if (in_array('pricejson', $pageparams['fields']))
                                @include('backend.pages.parts.pricejsonfields', [
                                    'data' => $data->prices ?? null,
                                ])
                            @endif

                            <div class="row">

                                @if (in_array('image_or_video', $pageparams['fields']))
                                    @include('backend.pages.parts.image_or_video', [
                                        'data' => $data->image_or_video ?? null,
                                        'type_of' => $data->type_of ?? 'image',
                                    ])
                                @endif

                                @if (in_array('image', $pageparams['fields']))
                                    @include('backend.pages.parts.imagefield', [
                                        'data' => $data->image ?? null,
                                    ])
                                @endif

                                @if (in_array('video', $pageparams['fields']))
                                    @include('backend.pages.parts.videofield', [
                                        'data' => $data->video ?? null,
                                    ])
                                @endif

                                @if (in_array('type_of_slider_image_or_video', $pageparams['fields']))
                                    @include('backend.pages.parts.type_of_slider_image_or_video', [
                                        'data' => $data->type_of ?? null,
                                        'name' => 'type_of',
                                        'label' => 'Tip',
                                        'required' => true,
                                    ])
                                @endif

                                @if (in_array('domain', $pageparams['fields']))
                                    @include('backend.pages.parts.inputfield', [
                                        'data' => $data->domain ?? null,
                                        'name' => 'domain',
                                        'label' => 'Domen',
                                        'type' => 'text',
                                        'required' => true,
                                    ])
                                @endif

                                @if (in_array('key', $pageparams['fields']))
                                    @include('backend.pages.parts.inputfield', [
                                        'data' => $data->key ?? null,
                                        'name' => 'key',
                                        'label' => 'Açar söz',
                                        'type' => 'text',
                                        'required' => true,
                                    ])
                                @endif

                                @if (in_array('name', $pageparams['fields']))
                                    @include('backend.pages.parts.inputfield', [
                                        'data' => $data->name ?? null,
                                        'name' => 'name',
                                        'label' => 'Ad',
                                        'type' => 'text',
                                        'required' => true,
                                    ])
                                @endif

                                @if (in_array('email', $pageparams['fields']))
                                    @include('backend.pages.parts.inputfield', [
                                        'data' => $data->email ?? null,
                                        'name' => 'emailuser',
                                        'label' => 'E-mail',
                                        'type' => 'email',
                                        'required' => true,
                                    ])
                                @endif

                                @if (in_array('password', $pageparams['fields']))
                                    @include('backend.pages.parts.inputfield', [
                                        'data' => null,
                                        'name' => 'password',
                                        'label' => 'Şifrə',
                                        'type' => 'password',
                                        'required' => true,
                                    ])
                                @endif

                                @if (in_array('order_number', $pageparams['fields']))
                                    @include('backend.pages.parts.inputfield', [
                                        'data' => $data->order_number ?? null,
                                        'name' => 'order_number',
                                        'label' => 'Sıra nömrəsi',
                                        'type' => 'number',
                                        'required' => true,
                                    ])
                                @endif

                                @if (in_array('youtube_url', $pageparams['fields']))
                                    @include('backend.pages.parts.inputfield', [
                                        'data' =>
                                            !empty($data->additional_data) &&
                                            isset($data->additional_data['youtube_url']) &&
                                            !empty($data->additional_data['youtube_url'])
                                                ? $data->additional_data['youtube_url']
                                                : null,
                                        'name' => 'youtube_url',
                                        'label' => 'Youtube link',
                                        'type' => 'url',
                                        'required' => false,
                                    ])
                                @endif

                                @if (in_array('status', $pageparams['fields']))
                                    @include('backend.pages.parts.statusfield', [
                                        'data' => $data->status ?? null,
                                        'name' => 'status',
                                        'label' => 'Status',
                                    ])
                                @endif

                                @if (in_array('setting_id', $pageparams['fields']))
                                    @include('backend.pages.parts.choisesfield', [
                                        'data' => $data->setting_id ?? null,
                                        'collect' => settings(),
                                        'name' => 'setting_id',
                                        'label' => 'Vebsayt',
                                        'required' => true,
                                    ])
                                @endif

                                @if (in_array('category_id', $pageparams['fields']))
                                    @include('backend.pages.parts.choisesfield', [
                                        'data' => $data->category_id ?? null,
                                        'collect' => categories(),
                                        'name' => 'category_id',
                                        'label' => 'Kateqoriyalar',
                                        'required' => false,
                                    ])
                                @endif

                                @if (in_array('top_service_id', $pageparams['fields']))
                                    @include('backend.pages.parts.choisesfield', [
                                        'data' => $data->top_service_id ?? null,
                                        'collect' => services(1, 'top_null'),
                                        'name' => 'top_service_id',
                                        'label' => 'Xidmətlər',
                                        'required' => false,
                                    ])
                                @endif

                                @if (in_array('top_category_id', $pageparams['fields']))
                                    @include('backend.pages.parts.choisesfield', [
                                        'data' => $data->top_category_id ?? null,
                                        'collect' => categories(),
                                        'name' => 'top_category_id',
                                        'label' => 'Üst kateqoriya',
                                        'required' => false,
                                    ])
                                @endif
                                @if (in_array('services_id', $pageparams['fields']))
                                    @include('backend.pages.parts.services', [
                                        'collect' => services(null, null),
                                        'data' => $data->services ?? null,
                                        'elem_id' => $data->id ?? null,
                                        'label' => 'Xidmətlər',
                                    ])
                                @endif

                                @if (in_array('langsjson', $pageparams['fields']))
                                    @include('backend.pages.parts.langjson', [
                                        'data' => $data->langs ?? null,
                                        'label' => 'İstifadə ediləcək dillər',
                                    ])
                                @endif

                                @if (in_array('external_buy_url', $pageparams['fields']))
                                    @include('backend.pages.parts.inputfield', [
                                        'data' => $data->external_buy_url ?? null,
                                        'name' => 'external_buy_url',
                                        'label' => 'Xarici alış keçid linki',
                                        'type' => 'text',
                                        'required' => false,
                                    ])
                                @endif
                            </div>
                            <br />



                            <br />

                            <button class="btn btn-primary btn-block">Saxla</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
