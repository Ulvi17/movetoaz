@extends('frontend.layouts.app')
@section('title', $title)

@section('bodyclass',
    $setting->domain == env('APP_DOMAIN')
    ? 'houzez_agent-template-default single single-houzez_agent postid-156 houzez-theme
    houzez-footer-position transparent- houzez-header- elementor-default elementor-kit-16177'
    : ($routename == 'products'
    ? 'cars-template-default single single-cars postid-767 wp-embed-responsive theme-renax woocommerce-no-js version-light
    renax-v-1.1.1 rn-empty-preloader-ac-color rn-empty-progress-bar-color rn-empty-social-border-color
    rn-empty-menu-active-color rn-empty-footer-li-color rn-empty-footer-a-color elementor-default elementor-kit-7
    elementor-page elementor-page-767'
    : 'post-template-default single single-post postid-103 single-format-standard wp-embed-responsive theme-renax
    woocommerce-no-js version-light renax-v-1.1.1 rn-empty-preloader-ac-color rn-empty-progress-bar-color
    rn-empty-social-border-color rn-empty-menu-active-color rn-empty-footer-li-color rn-empty-footer-a-color
    elementor-default elementor-kit-7 elementor-page elementor-page-103'))
@section('content')

    @include('frontend.parts.breadcump', ['title' => $title])

    @if ($setting->domain == env('APP_DOMAIN'))
        @switch($routename)
            @case('product')
            @case('products')
                <div class="page-amenities-single">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-4">
                                <!-- Amenities Sidebar Start -->
                                <div class="amenities-sidebar">
                                    <a href="{{ route('frontend.index', ['page' => 'products', 'setting_id' => session()->get('setting_id')]) }}"
                                        style="width:100%;background-color:var(--accent-color);border-color:var(--accent-color);"
                                        class="btn btn-primary btn-block mb-2"> <i class="fa fa-chevron-left"></i>
                                        {{ convert_locale('back') }}</a>

                                    <!-- Amenities Category List Start -->
                                    <div class="amenities-catagery-list wow fadeInUp"
                                        style="visibility: visible; animation-name: fadeInUp;">
                                        <h3>{{ convert_locale('we_are_serve') }}</h3>
                                        @include('frontend.parts.sidebar_links', [
                                            'links' => products(session()->get('setting_id'), 'setting_id'),
                                            'data' => $data,
                                            'page' => 'products',
                                        ])
                                    </div>
                                    <!-- Amenities Category List End -->

                                    <!-- Sidebar CTA Box Start -->

                                    @include('frontend.parts.sidebar_cta')
                                    <!-- Sidebar CTA Button End -->
                                </div>
                            </div>

                            <div class="col-lg-8">
                                <!-- Amenities Single Content Start -->
                                <div class="amenities-single-content">
                                    <!-- Amenities Featured Image Start -->

                                    <!-- Amenities Featured Image End -->

                                    <!-- Amenities Entry Start -->
                                    <div class="amenities-entry">
                                        <p class="wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                                            {!! $data->description[app()->getLocale() . '_description'] ?? '' !!}
                                        </p>
                                        @if (!empty($data->images))
                                            @foreach ($data->images as $image)
                                                <div class="amenities-featured-img post_image_height">
                                                    <figure class="image-anime reveal"
                                                        style="transform: translate(0px, 0px); opacity: 1; visibility: inherit;">
                                                        <img src="{{ getImageUrl($image, 'images') }}"
                                                            alt="{{ $data->name[app()->getLocale() . '_name'] }}"
                                                            style="transform: translate(0px, 0px);">
                                                    </figure>
                                                </div>
                                            @endforeach
                                        @endif

                                    </div>
                                    <!-- Amenities Entry End -->

                                </div>
                                <!-- Amenities Single Content End -->
                            </div>
                        </div>
                    </div>
                    @include('frontend.parts.step_process', ['data' => $data])
                </div>
            @break

            @case('teams')
            @case('team')
                <div class="page-amenities-single">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-4">
                                <!-- Amenities Sidebar Start -->
                                <div class="amenities-sidebar">
                                    <a href="{{ route('frontend.index', ['page' => 'welcome', 'setting_id' => session()->get('setting_id')]) }}"
                                        style="width:100%;background-color:var(--accent-color);border-color:var(--accent-color);"
                                        class="btn btn-primary btn-block mb-2"> <i class="fa fa-chevron-left"></i>
                                        {{ convert_locale('back') }}</a>

                                    <!-- Amenities Category List Start -->
                                    <div class="amenities-catagery-list wow fadeInUp"
                                        style="visibility: visible; animation-name: fadeInUp;">
                                        <h3>{{ convert_locale('teams') }}</h3>
                                        @include('frontend.parts.sidebar_links', [
                                            'links' => teams(session()->get('setting_id'), 'setting_id'),
                                            'data' => $data,
                                            'page' => 'teams',
                                        ])
                                    </div>
                                    <!-- Amenities Category List End -->

                                    <!-- Sidebar CTA Box Start -->
                                    @include('frontend.parts.sidebar_cta')
                                    <!-- Sidebar CTA Box End -->
                                </div>
                                <!-- Amenities Sidebar End -->
                            </div>

                            <div class="col-lg-8">
                                <!-- Amenities Single Content Start -->
                                <div class="amenities-single-content">
                                    <!-- Amenities Featured Image Start -->
                                    @if (!empty($data->image))
                                        <div class="amenities-featured-img post_image_height">
                                            <figure class="image-anime reveal"
                                                style="transform: translate(0px, 0px); opacity: 1; visibility: inherit;">
                                                <img src="{{ getImageUrl($data->image, 'images') }}"
                                                    alt="{{ $data->name[app()->getLocale() . '_name'] }}"
                                                    style="transform: translate(0px, 0px);object-fit:contain;">
                                            </figure>
                                        </div>
                                    @endif
                                    <!-- Amenities Featured Image End -->

                                    <!-- Amenities Entry Start -->
                                    <div class="amenities-entry">
                                        <p class="wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                                            {!! $data->description[app()->getLocale() . '_description'] ?? '' !!}
                                        </p>


                                    </div>
                                    <!-- Amenities Entry End -->

                                </div>
                                <!-- Amenities Single Content End -->
                            </div>
                        </div>
                    </div>
                </div>
            @break

            @case('services')
            @case('service')
                <div class="page-amenities-single">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-4">
                                <!-- Amenities Sidebar Start -->
                                <div class="amenities-sidebar">
                                    <a href="{{ route('frontend.index', ['page' => 'services', 'setting_id' => session()->get('setting_id')]) }}"
                                        style="width:100%;background-color:var(--accent-color);border-color:var(--accent-color);"
                                        class="btn btn-primary btn-block mb-2"> <i class="fa fa-chevron-left"></i>
                                        {{ convert_locale('back') }}</a>

                                    <!-- Amenities Category List Start -->
                                    <div class="amenities-catagery-list wow fadeInUp"
                                        style="visibility: visible; animation-name: fadeInUp;">
                                        <h3>{{ convert_locale('we_are_serve') }}</h3>
                                        @include('frontend.parts.sidebar_links', [
                                            'links' => empty($data->top_service_id)
                                                ? services($data->id, 'top_service_id')
                                                : services($data->top_service_id, 'top_service_id'),
                                            'data' => $data,
                                            'page' => 'services',
                                        ])
                                    </div>
                                    <!-- Amenities Category List End -->

                                    <!-- Sidebar CTA Box Start -->
                                    @include('frontend.parts.sidebar_cta')
                                    <!-- Sidebar CTA Box End -->
                                </div>
                                <!-- Amenities Sidebar End -->
                            </div>

                            <div class="col-lg-8">
                                <!-- Amenities Single Content Start -->
                                <div class="amenities-single-content">
                                    <!-- Amenities Featured Image Start -->

                                    <!-- Amenities Featured Image End -->

                                    <!-- Amenities Entry Start -->
                                    <div class="amenities-entry">
                                        <p class="wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                                            {!! $data->description[app()->getLocale() . '_description'] ?? '' !!}
                                        </p>

                                        @if (!empty($data->images))
                                            @foreach ($data->images as $image)
                                                <div
                                                    class="amenities-featured-img post_image_height @if (count($data->images) > 1) col-sm-6 col-md-4 col-lg-4 @endif">
                                                    <figure class="image-anime reveal"
                                                        style="transform: translate(0px, 0px); opacity: 1; visibility: inherit;">
                                                        <img src="{{ getImageUrl($image, 'images') }}"
                                                            alt="{{ $data->name[app()->getLocale() . '_name'] }}"
                                                            style="transform: translate(0px, 0px);object-fit:contain;">
                                                    </figure>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                    <!-- Amenities Entry End -->

                                </div>
                                <!-- Amenities Single Content End -->
                            </div>
                        </div>
                    </div>
                </div>
            @break

            @case('blog')
            @case('blogs')

            @case('new')
            @case('news')
                <div class="page-amenities-single">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-4">
                                <!-- Amenities Sidebar Start -->
                                <div class="amenities-sidebar">
                                    <a href="{{ route('frontend.index', ['page' => 'blogs', 'setting_id' => session()->get('setting_id')]) }}"
                                        style="width:100%;background-color:var(--accent-color);border-color:var(--accent-color);"
                                        class="btn btn-primary btn-block mb-2"> <i class="fa fa-chevron-left"></i>
                                        {{ convert_locale('back') }}</a>

                                    <!-- Amenities Category List Start -->
                                    <div class="amenities-catagery-list wow fadeInUp"
                                        style="visibility: visible; animation-name: fadeInUp;">
                                        <h3>{{ convert_locale('news') }}</h3>
                                        @include('frontend.parts.sidebar_links', [
                                            'links' => blogs(session()->get('setting_id'), 'setting_id'),
                                            'data' => $data,
                                            'page' => 'news',
                                        ])
                                    </div>
                                    <!-- Amenities Category List End -->

                                    <!-- Sidebar CTA Box Start -->
                                    @include('frontend.parts.sidebar_cta')
                                    <!-- Sidebar CTA Box End -->
                                </div>
                                <!-- Amenities Sidebar End -->
                            </div>

                            <div class="col-lg-8">
                                <!-- Amenities Single Content Start -->
                                <div class="amenities-single-content">
                                    <!-- Amenities Featured Image Start -->

                                    <!-- Amenities Featured Image End -->

                                    <!-- Amenities Entry Start -->
                                    <div class="amenities-entry">
                                        <p class="wow fadeInUp">
                                            {!! $data->description[app()->getLocale() . '_description'] ?? '' !!}
                                        </p>

                                        @if (!empty($data->images))
                                            @foreach ($data->images as $image)
                                                <div class="amenities-featured-img post_image_height">
                                                    <figure class="image-anime reveal"
                                                        style="transform: translate(0px, 0px); opacity: 1; visibility: inherit;">
                                                        <img src="{{ getImageUrl($image, 'images') }}"
                                                            alt="{{ $data->name[app()->getLocale() . '_name'] }}"
                                                            style="transform: translate(0px, 0px);object-fit:contain;">
                                                    </figure>
                                                </div>
                                            @endforeach
                                        @endif

                                    </div>
                                    <!-- Amenities Entry End -->

                                </div>
                                <!-- Amenities Single Content End -->
                            </div>
                        </div>
                    </div>
                </div>
            @break

            @case('standartpages')
                <div class="page-amenities-single">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-4">
                                <!-- Amenities Sidebar Start -->
                                <div class="amenities-sidebar">

                                    <!-- Amenities Category List Start -->
                                    <div class="amenities-catagery-list wow fadeInUp"
                                        style="visibility: visible; animation-name: fadeInUp;">
                                        <h3>{{ convert_locale('what_we_provide') }}</h3>
                                        @include('frontend.parts.sidebar_links', [
                                            'links' => standartpages(session()->get('setting_id'), 'setting_id'),
                                            'data' => $data,
                                            'page' => 'standartpages',
                                        ])
                                    </div>
                                    <!-- Amenities Category List End -->

                                    <!-- Sidebar CTA Box Start -->
                                    @include('frontend.parts.sidebar_cta')
                                    <!-- Sidebar CTA Box End -->
                                </div>
                                <!-- Amenities Sidebar End -->
                            </div>

                            <div class="col-lg-8">
                                <!-- Amenities Single Content Start -->
                                <div class="amenities-single-content">
                                    <!-- Amenities Featured Image Start -->

                                    <!-- Amenities Featured Image End -->

                                    <!-- Amenities Entry Start -->
                                    <div class="amenities-entry">
                                        <p class="wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                                            {!! $data->description[app()->getLocale() . '_description'] ?? '' !!}
                                        </p>

                                        @if (!empty($data->images))
                                            <div class="row">
                                                @foreach ($data->images as $image)
                                                    <div
                                                        class="amenities-featured-img post_image_height @if (count($data->images) > 1) col-sm-6 col-md-4 col-lg-4 @endif">
                                                        <figure class="image-anime reveal"
                                                            style="transform: translate(0px, 0px); opacity: 1; visibility: inherit;">
                                                            <img src="{{ getImageUrl($image, 'images') }}"
                                                                alt="{{ $data->name[app()->getLocale() . '_name'] }}"
                                                                style="transform: translate(0px, 0px);">
                                                        </figure>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                    <!-- Amenities Entry End -->

                                </div>
                                <!-- Amenities Single Content End -->
                            </div>
                        </div>
                    </div>
                </div>
            @break

        @endswitch
    @elseif($setting->domain == 'chinamotorsaz.com')
        @switch($routename)
            @case('blogs')
            @case('blog')
                @include('frontend.parts.breadcump', [
                    'setting' => $setting,
                    'title' => $title,
                    'image' =>
                        !empty($data->images) && isset($data->images[0]) && !empty($data->images[0])
                            ? $data->images[0]
                            : null,
                ])
                <section class="" data-scroll-index=1>
                    <div class=container>
                        <div class=row>
                            <div class="col-md-12 post-content">
                                <div data-elementor-type=wp-post data-elementor-id=103 class="elementor elementor-103">
                                    <div class="elementor-element elementor-element-4c6078e e-con-full e-flex e-con e-parent"
                                        data-id=4c6078e data-element_type=container>
                                        <div class="elementor-element elementor-element-565ea7d elementor-widget elementor-widget-text-editor"
                                            data-id=565ea7d data-element_type=widget data-widget_type=text-editor.default>
                                            <div class=elementor-widget-container>
                                                <style>
                                                    /*! elementor - v3.23.0 - 05-08-2024 */
                                                    .elementor-widget-text-editor.elementor-drop-cap-view-stacked .elementor-drop-cap {
                                                        background-color: #69727d;
                                                        color: #fff
                                                    }

                                                    .elementor-widget-text-editor.elementor-drop-cap-view-framed .elementor-drop-cap {
                                                        color: #69727d;
                                                        border: 3px solid;
                                                        background-color: transparent
                                                    }

                                                    .elementor-widget-text-editor:not(.elementor-drop-cap-view-default) .elementor-drop-cap {
                                                        margin-top: 8px
                                                    }

                                                    .elementor-widget-text-editor:not(.elementor-drop-cap-view-default) .elementor-drop-cap-letter {
                                                        width: 1em;
                                                        height: 1em
                                                    }

                                                    .elementor-widget-text-editor .elementor-drop-cap {
                                                        float: left;
                                                        text-align: center;
                                                        line-height: 1;
                                                        font-size: 50px
                                                    }

                                                    .elementor-widget-text-editor .elementor-drop-cap-letter {
                                                        display: inline-block
                                                    }
                                                </style>
                                                <p>{!! $data->description[app()->getLocale() . '_description'] ?? '' !!}</p>
                                            </div>
                                        </div>
                                        @if (!empty($data->images) && count($data->images) > 1)
                                            <div class="elementor-element elementor-element-b002ebf elementor-widget elementor-widget-renax-gallery"
                                                data-id=b002ebf data-element_type=widget data-widget_type=renax-gallery.default>
                                                <div class=elementor-widget-container>
                                                    <div class=container-after-gallery>
                                                        <div class="row isotope-items-wrap  no-hide-last loadmore-wrapper-gallery sec-gallery"
                                                            data-load-item=10000000 data-button-text="Load More">
                                                            @for ($i = 1; $i < count($data->images); $i++)
                                                                <div class="col-lg-6 gallery-item isotope-item mb-15 col-md-6">
                                                                    <a href="{{ getImageUrl($data->images[0], 'images') }}"
                                                                        title="{{ $data->name[app()->getLocale() . '_name'] }}"
                                                                        class="gallery-masonry-item-img-link img-zoom">
                                                                        <div class="gallery-box ">
                                                                            <div class=gallery-img>
                                                                                <img decoding=async
                                                                                    src="{{ getImageUrl($data->images[0], 'images') }}"
                                                                                    alt="{{ $data->name[app()->getLocale() . '_name'] }}">
                                                                            </div>
                                                                            <div class=bottom-fade></div>
                                                                        </div>
                                                                    </a>
                                                                </div>
                                                            @endfor
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class=clear></div>
                            </div>
                        </div>
                    </div>
                </section>
            @break

            @case('products')
            @case('product')
                @if (!empty($data->images) && count($data->images) > 0)
                    <div class="elementor-element elementor-element-23aa597 e-con-full e-flex e-con e-parent" data-id=23aa597
                        data-element_type=container>
                        <div class="elementor-element elementor-element-1f3baa5 elementor-widget elementor-widget-renax-banner-slideshow"
                            data-id=1f3baa5 data-element_type=widget data-widget_type=renax-banner-slideshow.default>
                            <div class=elementor-widget-container>
                                <aside class="kenburns-section video-fullscreen-wrap" id=kenburnsSliderContainer
                                    data-overlay-dark=5
                                    data-images="[
                                    @foreach ($data->images as $key => $val)
                                        {src: '{{ getImageUrl($val, 'images') }}'}, @endforeach
                                    ]"
                                    data-transition=fade2 data-animation=kenburnsUpRight data-transition-duration=1000
                                    data-delay=10000 data-animation-duration=20000>
                                    <div class="v-middle caption">
                                        <div class=container>
                                            <div class=row>
                                                <div class="col-md-12 offset-md-0 mb-30 mt-30 text-center"></div>
                                            </div>
                                        </div>
                                    </div>
                                </aside>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="elementor-element elementor-element-6b5ad7bf e-flex e-con-boxed e-con e-parent" data-id=6b5ad7bf
                    data-element_type=container>
                    <div class=e-con-inner>
                        <div class="elementor-element elementor-element-48fbdb30 e-con-full e-flex e-con e-child" data-id=48fbdb30
                            data-element_type=container>
                            <div class="elementor-element elementor-element-54886a27 elementor-widget elementor-widget-renax-simple-title"
                                data-id=54886a27 data-element_type=widget data-widget_type=renax-simple-title.default>
                                <div class=elementor-widget-container>
                                    <div class="clear text-left ">
                                        <div class="rx-simple-title black">{{ convert_locale('general_information') }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="elementor-element elementor-element-41bf03b0 elementor-widget elementor-widget-text-editor"
                                data-id=41bf03b0 data-element_type=widget data-widget_type=text-editor.default>
                                <div class=elementor-widget-container>
                                    <style>
                                        /*! elementor - v3.23.0 - 05-08-2024 */
                                        .elementor-widget-text-editor.elementor-drop-cap-view-stacked .elementor-drop-cap {
                                            background-color: #69727d;
                                            color: #fff
                                        }

                                        .elementor-widget-text-editor.elementor-drop-cap-view-framed .elementor-drop-cap {
                                            color: #69727d;
                                            border: 3px solid;
                                            background-color: transparent
                                        }

                                        .elementor-widget-text-editor:not(.elementor-drop-cap-view-default) .elementor-drop-cap {
                                            margin-top: 8px
                                        }

                                        .elementor-widget-text-editor:not(.elementor-drop-cap-view-default) .elementor-drop-cap-letter {
                                            width: 1em;
                                            height: 1em
                                        }

                                        .elementor-widget-text-editor .elementor-drop-cap {
                                            float: left;
                                            text-align: center;
                                            line-height: 1;
                                            font-size: 50px
                                        }

                                        .elementor-widget-text-editor .elementor-drop-cap-letter {
                                            display: inline-block
                                        }
                                    </style>
                                    <p>{!! $data->description[app()->getLocale() . '_description'] ?? '' !!}</p>
                                </div>
                            </div>
                        </div>
                        <div class="elementor-element elementor-element-6545c39f e-con-full e-flex e-con e-child" data-id=6545c39f
                            data-element_type=container>
                            <div class="elementor-element elementor-element-4bb15470 elementor-widget elementor-widget-renax-car-info"
                                data-id=4bb15470 data-element_type=widget data-widget_type=renax-car-info.default>
                                <div class=elementor-widget-container>
                                    <div class=car-details>
                                        <div class="sidebar-car ">
                                            <div class="title ">
                                                <h4>₼{{ !empty($data->prices) && isset($data->prices['endirim_price']) && !empty($data->prices['endirim_price']) ? $data->prices['endirim_price'] : $data->prices['price'] }}</span>
                                                    @if (!empty($data->prices) && isset($data->prices['endirim_price']) && !empty($data->prices['endirim_price']))
                                                        <span>/{{ $data->prices['price'] }}</span>
                                                    @endif
                                                </h4>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="elementor-element elementor-element-13c7b315 e-flex e-con-boxed e-con e-parent" data-id=13c7b315
                    data-element_type=container data-settings={&quot;background_background&quot;:&quot;classic&quot;}>
                    <div class=e-con-inner>
                        <div class="elementor-element elementor-element-25ce3ce0 elementor-widget elementor-widget-renax-sec-title"
                            data-id=25ce3ce0 data-element_type=widget data-widget_type=renax-sec-title.default>
                            <div class=elementor-widget-container>
                                <div class="about text-center ">
                                    <div class=section-subtitle>@lang('additional.fields.buythecar')</div>
                                    <div class="section-title white">@lang('additional.fields.interestedinpurchase')</div>
                                    <p class="rx-lets-talk white">@lang('additional.fields.donthesitateandsendmessage')</p>
                                </div>
                            </div>
                        </div>
                        <div class="elementor-element elementor-element-76ac22f e-flex e-con-boxed e-con e-child" data-id=76ac22f
                            data-element_type=container>
                            <div class=e-con-inner>
                                @if (!empty($setting->social_media['whatsapp'] ?? null))
                                    <div class="elementor-element elementor-element-669f9b4b elementor-widget elementor-widget-renax-button"
                                        data-id=669f9b4b data-element_type=widget data-widget_type=renax-button.default>
                                        <div class=elementor-widget-container>
                                            <div class="sec-button float-left clear">
                                                <a class="button-1 rx-icon-left "
                                                    href="https://api.whatsapp.com/send?phone={{ $setting->social_media['whatsapp'] }}"
                                                    target=_blank rel="noopener noreferrer">
                                                    <i aria-hidden=true class="fab fa-whatsapp"></i>
                                                    WhatsApp
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if (!empty($setting->social_media['phone'] ?? null))
                                    <div class="elementor-element elementor-element-7183a93d elementor-widget elementor-widget-renax-button"
                                        data-id=7183a93d data-element_type=widget data-widget_type=renax-button.default>
                                        <div class=elementor-widget-container>
                                            <div class="sec-button float-left clear">
                                                <a class="button-2  " href="tel:{{ $setting->social_media['phone'] }}"
                                                    target=_self rel="noopener noreferrer">
                                                    {{ convert_locale('call') }}
                                                    <span class="fa fa-phone"></span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @break

            @case('standartpages')
            @case('standartpage')
                @include('frontend.parts.breadcump', [
                    'setting' => $setting,
                    'title' => $title,
                    'image' =>
                        !empty($data->images) && isset($data->images[0]) && !empty($data->images[0])
                            ? $data->images[0]
                            : null,
                ])
                <section class="" data-scroll-index=1>
                    <div class=container>
                        <div class=row>
                            <div class="col-md-12 post-content">
                                <div class="elementor-element elementor-element-9921b59 e-flex e-con-boxed e-con e-parent"
                                    data-id=9921b59 data-element_type=container>
                                    <div class=e-con-inner>
                                        <div class="elementor-element elementor-element-f674b29 e-con-full e-flex e-con e-child d-flex w-100"
                                            data-id=f674b29 data-element_type=container style="flex-direction:row">
                                            <div class="elementor-element elementor-element-a52ad39 elementor-widget elementor-widget-renax-sec-title d-inline-block"
                                                style="width:100%%;" data-id=a52ad39 data-element_type=widget
                                                data-widget_type=renax-sec-title.default
                                                style="height:unset;margin-bottom:0;padding-bototm:0;">
                                                <div class=elementor-widget-container style="height:unset;">
                                                    <div class="about text-left ">
                                                        <div class=section-subtitle>{{ convert_locale('about') }}</div>
                                                        <div class="section-title black">
                                                            {{ $data->name[app()->getLocale() . '_name'] }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="elementor-element elementor-element-390c8ed elementor-widget elementor-widget-text-editor"
                                                    data-id=390c8ed data-element_type=widget data-widget_type=text-editor.default>
                                                    <div class=elementor-widget-container>
                                                        <style>
                                                            /*! elementor - v3.23.0 - 05-08-2024 */
                                                            .elementor-widget-text-editor.elementor-drop-cap-view-stacked .elementor-drop-cap {
                                                                background-color: #69727d;
                                                                color: #fff
                                                            }

                                                            .elementor-widget-text-editor.elementor-drop-cap-view-framed .elementor-drop-cap {
                                                                color: #69727d;
                                                                border: 3px solid;
                                                                background-color: transparent
                                                            }

                                                            .elementor-widget-text-editor:not(.elementor-drop-cap-view-default) .elementor-drop-cap {
                                                                margin-top: 8px
                                                            }

                                                            .elementor-widget-text-editor:not(.elementor-drop-cap-view-default) .elementor-drop-cap-letter {
                                                                width: 1em;
                                                                height: 1em
                                                            }

                                                            .elementor-widget-text-editor .elementor-drop-cap {
                                                                float: left;
                                                                text-align: center;
                                                                line-height: 1;
                                                                font-size: 50px
                                                            }

                                                            .elementor-widget-text-editor .elementor-drop-cap-letter {
                                                                display: inline-block
                                                            }
                                                        </style>
                                                        <p>{!! $data->description[app()->getLocale() . '_description'] ?? '' !!}
                                                        </p>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            @break

            @case('aksiyalar')
            @case('aksiya')
                @include('frontend.parts.breadcump', [
                    'setting' => $setting,
                    'title' => $title,
                    'image' =>
                        !empty($data->images) && isset($data->images[0]) && !empty($data->images[0])
                            ? $data->images[0]
                            : null,
                ])
                <section class="" data-scroll-index=1>
                    <div class=container>
                        <div class=row>
                            <div class="col-md-12 post-content">
                                <div class="elementor-element elementor-element-9921b59 e-flex e-con-boxed e-con e-parent"
                                    data-id=9921b59 data-element_type=container>
                                    <div class=e-con-inner>
                                        <div class="elementor-element elementor-element-f674b29 e-con-full e-flex e-con e-child d-flex w-100"
                                            data-id=f674b29 data-element_type=container style="flex-direction:row">
                                            <div class="elementor-element elementor-element-a52ad39 elementor-widget elementor-widget-renax-sec-title d-inline-block"
                                                style="width:100%%;" data-id=a52ad39 data-element_type=widget
                                                data-widget_type=renax-sec-title.default
                                                style="height:unset;margin-bottom:0;padding-bototm:0;">
                                                <div class=elementor-widget-container style="height:unset;">
                                                    <div class="about text-left ">
                                                        <div class=section-subtitle>{{ convert_locale('about') }}</div>
                                                        <div class="section-title black">
                                                            {{ $data->name[app()->getLocale() . '_name'] }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="elementor-element elementor-element-390c8ed elementor-widget elementor-widget-text-editor"
                                                    data-id=390c8ed data-element_type=widget data-widget_type=text-editor.default>
                                                    <div class=elementor-widget-container>
                                                        <style>
                                                            /*! elementor - v3.23.0 - 05-08-2024 */
                                                            .elementor-widget-text-editor.elementor-drop-cap-view-stacked .elementor-drop-cap {
                                                                background-color: #69727d;
                                                                color: #fff
                                                            }

                                                            .elementor-widget-text-editor.elementor-drop-cap-view-framed .elementor-drop-cap {
                                                                color: #69727d;
                                                                border: 3px solid;
                                                                background-color: transparent
                                                            }

                                                            .elementor-widget-text-editor:not(.elementor-drop-cap-view-default) .elementor-drop-cap {
                                                                margin-top: 8px
                                                            }

                                                            .elementor-widget-text-editor:not(.elementor-drop-cap-view-default) .elementor-drop-cap-letter {
                                                                width: 1em;
                                                                height: 1em
                                                            }

                                                            .elementor-widget-text-editor .elementor-drop-cap {
                                                                float: left;
                                                                text-align: center;
                                                                line-height: 1;
                                                                font-size: 50px
                                                            }

                                                            .elementor-widget-text-editor .elementor-drop-cap-letter {
                                                                display: inline-block
                                                            }
                                                        </style>
                                                        <p>{!! $data->description[app()->getLocale() . '_description'] ?? '' !!}
                                                        </p>

                                                        @if (!empty($data->images) && count($data->images) > 0)
                                                            <div class="row my-2">
                                                                @foreach ($data->images as $image)
                                                                    <div class="col-sm-6 col-md-4 col-lg-3 my-1">
                                                                        <img src="{{ getImageUrl($image, 'images') }}"
                                                                            class="img-fluid img-responsive" />
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            @break

        @endswitch
    @elseif($setting->domain == 'paradiseevents.az')
        @include('frontend.parts.breadcump', ['setting' => $setting, 'title' => $title])
        @switch($routename)
            @case('standartpages')
                <!-- ABOUT SECTION START -->
                <section class="et-about pt-[60px] pb-[130px] xl:pb-[80px] md:pb-[60px] overflow-hidden relative">
                    <div
                        class="container mx-auto max-w-[calc(100%-39.1vw)] xxxl:max-w-[calc(100%-350px)] xl:max-w-[calc(100%-170px)] px-[12px] lg:max-w-full">
                        <div
                            class="flex items-center md:flex-wrap gap-x-[60px] xxl:gap-x-[40px] lg:gap-x-[30px] gap-y-[40px] sm:gap-y-[40px] lg:justify-center">
                            <!-- left -->
                            <div
                                class="et-about-img relative z-[1] md:w-auto shrink-0 max-w-full mr-[70px] md:mr-0 ml-[28px] xxxl:ml-[47px] md:ml-0 xs:w-[70%] xxs:w-[90%] xxs:ml-[47px]">
                                @if (
                                    !empty(standartpages('haqqmzda', 'typewithdomain')->images) &&
                                        count(standartpages('haqqmzda', 'typewithdomain')->images) > 0)
                                    <img src="{{ getImageUrl(standartpages('haqqmzda', 'typewithdomain')->images[0], 'images') }}"
                                        alt="{{ standartpages('haqqmzda', 'typewithdomain')->name[app()->getLocale() . '_name'] }}"
                                        class="shrink-0 rounded-[10px]" />
                                @endif
                                {{-- <img src="assets/img/about-img-3.jpg" alt="image" class="et-about-floating-img absolute top-[45px] -right-[70px] shrink-0 rounded-[20px] border-white border-[10px] xs:hidden" /> --}}

                                <!-- vectors -->
                                <div class="et-about-vectors xs:hidden">
                                    <img src="{{ asset('frontend/events/assets/img/about-img-vector-1.png') }}" alt="vector"
                                        class="et-about-vector-1 absolute -left-[47px] top-[20px] -z-[1]" />
                                    <img src="{{ asset('frontend/events/assets/img/about-img-vector-2.png') }}" alt="vector"
                                        class="et-about-vector-2 absolute -left-[27px] top-[41px] -z-[1]" />
                                    <img src="{{ asset('frontend/events/assets/img/about-img-vector-3.png') }}" alt="vector"
                                        class="et-about-vector absolute -right-[24px] bottom-[34px] -z-[1]" />
                                </div>

                                <!-- video btn -->
                                {{-- <div class="absolute bottom-[50px] -left-[47px] lg:-left-[27px] md:-left-[47px] w-[180px] lg:w-[160px] aspect-square bg-[url('../assets/img/about-video-btn-bg.jpg')] text-center text-[22px] text-white z-[1] flex items-center justify-center before:absolute before:bg-etBlue/80 before:-z-[1] before:inset-0 after:bg-etBlack after:w-[47px] after:h-[30px] after:absolute after:top-[100%] after:left-0 after:-z-[2] after:skew-y-[30deg] after:-translate-y-[17px]">
                                    <a href="https://www.youtube.com/watch?v=AQleI8oFqZo&amp;t=1s" data-fslightbox="about-video" class="w-[107px] aspect-square rounded-full border border-white/20 flex justify-center items-center text-etBlue relative z-[1] text-[18px] before:absolute before:w-[56px] before:h-[56px] before:bg-white before:rounded-full before:-z-[1] hover:text-black"><i class="fa-solid fa-play"></i></a>
                                </div> --}}
                            </div>

                            <!-- right -->
                            <div class="et-about__txt">
                                <h2 class="et-section-title mb-[24px] md:mb-[19px] anim-text">
                                    {{ standartpages('haqqmzda', 'typewithdomain')->name[app()->getLocale() . '_name'] }}
                                </h2>

                                <p class="mb-[30px] text-[19px] font-light text-etGray md:mb-[30px] rev-slide-up">
                                    {!! standartpages('haqqmzda', 'typewithdomain')->description[app()->getLocale() . '_description'] !!}
                                </p>

                                <div
                                    class="flex xxs:flex-wrap items-center gap-[20px] pt-[30px] border-t border-[#D9D9D9] mb-[50px] xxs:mb-[30px] rev-slide-up">
                                    <div
                                        class="shrink-0 h-[80px] w-[80px] rounded-[6px] shadow-[0_4px_50px_10px_rgba(18,96,254,0.10)] flex items-center justify-center">
                                        <svg width="40" height="40" viewBox="0 0 40 40" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_6038_295)">
                                                <path
                                                    d="M35.4168 33.3346H28.4501C27.7601 33.3346 27.2001 32.7746 27.2001 32.0846C27.2001 31.3946 27.7601 30.8346 28.4501 30.8346H34.5401L36.9651 24.168H3.03343L5.45843 30.8346H11.5501C12.2401 30.8346 12.8001 31.3946 12.8001 32.0846C12.8001 32.7746 12.2401 33.3346 11.5501 33.3346H4.58343C4.05843 33.3346 3.58843 33.0063 3.40843 32.5113L0.0751012 23.3446C-0.0632322 22.9613 -0.00823216 22.5346 0.226768 22.1996C0.460101 21.8663 0.841768 21.668 1.2501 21.668H38.7501C39.1584 21.668 39.5401 21.8663 39.7734 22.2013C40.0084 22.5346 40.0634 22.963 39.9251 23.3463L36.5918 32.513C36.4118 33.0063 35.9418 33.3346 35.4168 33.3346Z"
                                                    fill="#1260FE" />
                                                <path
                                                    d="M27.0849 40.0013C27.0216 40.0013 26.9583 39.9963 26.8933 39.9863C26.2116 39.8813 25.7433 39.243 25.8483 38.5613L27.2933 29.168H12.7066L14.1516 38.5613C14.2566 39.2446 13.7883 39.8813 13.1066 39.9863C12.4249 40.098 11.7849 39.6246 11.6816 38.9413L10.0149 28.108C9.95994 27.748 10.0633 27.3796 10.3016 27.103C10.5399 26.8263 10.8849 26.668 11.2499 26.668H28.7499C29.1149 26.668 29.4616 26.828 29.6983 27.1046C29.9349 27.3813 30.0399 27.748 29.9849 28.1096L28.3183 38.943C28.2249 39.5596 27.6916 40.0013 27.0849 40.0013Z"
                                                    fill="#1260FE" />
                                                <path
                                                    d="M37.5 23.7498C36.81 23.7498 36.25 23.1898 36.25 22.4998C36.25 19.2015 34.4866 16.0798 31.6483 14.3515C31.0583 13.9915 30.8716 13.2232 31.2316 12.6332C31.5916 12.0432 32.36 11.8565 32.95 12.2165C36.5266 14.3965 38.7483 18.3365 38.7483 22.4998C38.75 23.1898 38.19 23.7498 37.5 23.7498Z"
                                                    fill="#1260FE" />
                                                <path
                                                    d="M30.8333 15C32.214 15 33.3333 13.8807 33.3333 12.5C33.3333 11.1193 32.214 10 30.8333 10C29.4525 10 28.3333 11.1193 28.3333 12.5C28.3333 13.8807 29.4525 15 30.8333 15Z"
                                                    fill="#1260FE" />
                                                <path
                                                    d="M19.9999 13.3333C16.3233 13.3333 13.3333 10.3433 13.3333 6.66667C13.3333 2.99 16.3233 0 19.9999 0C23.6766 0 26.6666 2.99 26.6666 6.66667C26.6666 10.3433 23.6766 13.3333 19.9999 13.3333ZM19.9999 2.5C17.7016 2.5 15.8333 4.37 15.8333 6.66667C15.8333 8.96333 17.7016 10.8333 19.9999 10.8333C22.2983 10.8333 24.1666 8.96333 24.1666 6.66667C24.1666 4.37 22.2983 2.5 19.9999 2.5Z"
                                                    fill="#1260FE" />
                                                <path
                                                    d="M32.5 24.1667C31.81 24.1667 31.25 23.6067 31.25 22.9167C31.25 19.93 28.82 17.5 25.8333 17.5H14.1667C11.18 17.5 8.75 19.93 8.75 22.9167C8.75 23.6067 8.19 24.1667 7.5 24.1667C6.81 24.1667 6.25 23.6067 6.25 22.9167C6.25 18.5517 9.80167 15 14.1667 15H25.8333C30.1983 15 33.75 18.5517 33.75 22.9167C33.75 23.6067 33.19 24.1667 32.5 24.1667Z"
                                                    fill="#1260FE" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_6038_295">
                                                    <rect width="40" height="40" fill="white" />
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </div>
                                    <!-- txt -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- vectors -->
                    <div class="xs:hidden">
                        <img src="{{ asset('frontend/events/assets/img/about-vector-1.png') }}" alt="vector"
                            class="pointer-events-none absolute top-[340px] left-[90px] -z-[1]">
                        <img src="{{ asset('frontend/events/assets/img/about-vector-2.png') }}" alt="vector"
                            class="pointer-events-none absolute top-[153px] right-0 -z-[1]">
                    </div>
                </section>
                <!-- ABOUT SECTION END -->
            @break

            @case('products')
                <div class="et-event-details-content py-[130px] lg:py-[80px] md:py-[60px]">
                    <div class="container mx-auto max-w-[1200px] px-[12px] xl:max-w-full">
                        <div class="flex gap-[30px] lg:gap-[20px] md:flex-col md:items-center">
                            <!-- left content -->
                            <div class="left">
                                <!-- img -->
                                @if (!empty($data->images) && count($data->images) > 0)
                                    <div class="relative rounded-[8px] overflow-hidden">
                                        <img class="w-100 img-fluid img-responsive" style="width:100%"
                                            src="{{ getImageUrl($data->images[0], 'images') }}"
                                            alt="{{ $data->name[app()->getLocale() . '_name'] }}">
                                    </div>
                                @endif

                                <!-- txt -->
                                <div>
                                    <h4
                                        class="text-[30px] xs:text-[25px] xxs:text-[22px] font-medium text-etBlack mb-[11px] mt-[27px]">
                                        {{ $data->name[app()->getLocale() . '_name'] }}</h4>

                                    <p class="font-light text-[19px] text-etGray mb-[17px]">
                                        {!! $data->description[app()->getLocale() . '_description'] ?? '' !!}
                                    </p>
                                </div>


                                @if (!empty($setting->social_media) && isset($setting->social_media['phone']) && !empty($setting->social_media['phone']))
                                    <!-- actions -->
                                    <div class="border-y border-[#d9d9d9] py-[24px] flex items-center xxs:flex-col gap-[20px]">
                                        <a href="tel:{{ $setting->social_media['phone'] }}"
                                            class="inline-flex items-center h-[50px] rounded-full bg-etBlue px-[20px] text-[17px] font-medium text-white gap-[10px] hover:bg-etGray">{{ convert_locale('more') }}
                                            <i class="fa-arrow-right-long fa-solid"></i></a>
                                        <div class="flex gap-[12px]">
                                            <span
                                                class="icon bg-etBlue w-[50px] aspect-square rounded-full outline-[2px] outline outline-white -outline-offset-[3px] flex items-center justify-center">
                                                <img src="{{ asset('frontend/events/assets/img/call-icon.svg') }}"
                                                    alt="call icon">
                                            </span>

                                            <span class="txt font-semibold text-etBlack">
                                                <span
                                                    class="block text-[14px] mb-[2px]">{{ convert_locale('phone_number') }}</span>
                                                <a href="tel:{{ $setting->social_media['phone'] }}"
                                                    class="text-[18px] hover:text-etBlue">{{ $setting->social_media['phone'] }}</a>
                                            </span>
                                        </div>
                                    </div>
                                @endif

                            </div>

                            @if (
                                !empty($data->additional_data) &&
                                    isset($data->additional_data['external_buy_url']) &&
                                    !empty($data->additional_data['external_buy_url']))
                                <!-- right sidebar -->
                                <div class="right max-w-full w-[370px] lg:w-[360px] shrink-0 space-y-[30px]">
                                    <!-- ticket widget -->
                                    <div
                                        class="et-event-details-ticket-widgget border border-[#e5e5e5] rounded-[16px] overflow-hidden">
                                        <!-- heading -->
                                        <div class="bg-etBlue p-[16px] xxs:p-[12px]">
                                            <h5 class="font-medium text-[20px] text-white text-center">
                                                @lang('additional.fields.ticketinfo')
                                            </h5>
                                        </div>

                                        <!-- body  -->
                                        <div class="p-[22px] lg:p-[16px]">

                                            <!-- button -->
                                            <a href="{{ $data->additional_data['external_buy_url'] }}"
                                                class="bg-etBlue h-[50px] rounded-full px-[15px] flex items-center justify-center gap-x-[10px] w-full text-white text-[15px] hover:bg-[#000D83]">
                                                <span><img src="{{ asset('frontend/events/assets/img/ticket-icon.svg') }}"
                                                        alt="ticket icon" /></span>
                                                <span>
                                                    @lang('additional.fields.get_tickets')
                                                </span>
                                            </a>
                                        </div>
                                    </div>

                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            @break

            @case('blogs')
            @case('blog')
                <div class="et-event-details-content py-[130px] lg:py-[80px] md:py-[60px]">
                    <div class="container mx-auto max-w-[1200px] px-[12px] xl:max-w-full">
                        <div class="flex gap-[30px] lg:gap-[20px] md:flex-col md:items-center">
                            <!-- left content -->
                            <div class="left">
                                <!-- img -->
                                @if (!empty($data->images) && count($data->images) > 0)
                                    <div class="relative rounded-[8px] overflow-hidden">
                                        <img class="w-100 img-fluid img-responsive" style="width:100%"
                                            src="{{ getImageUrl($data->images[0], 'images') }}"
                                            alt="{{ $data->name[app()->getLocale() . '_name'] }}">
                                    </div>
                                @endif

                                <!-- txt -->
                                <div class="mb-[20px]">
                                    <h4
                                        class="text-[30px] xs:text-[25px] xxs:text-[22px] font-medium text-etBlack mb-[11px] mt-[27px]">
                                        {{ $data->name[app()->getLocale() . '_name'] }}</h4>

                                    <p class="font-light text-[19px] text-etGray mb-[17px]">
                                        {!! $data->description[app()->getLocale() . '_description'] ?? '' !!}
                                    </p>
                                </div>


                                @if (!empty($setting->social_media) && isset($setting->social_media['phone']) && !empty($setting->social_media['phone']))
                                    <!-- actions -->
                                    <div class="border-y border-[#d9d9d9] py-[24px] flex items-center xxs:flex-col gap-[20px]">
                                        <a href="tel:{{ $setting->social_media['phone'] }}"
                                            class="inline-flex items-center h-[50px] rounded-full bg-etBlue px-[20px] text-[17px] font-medium text-white gap-[10px] hover:bg-etGray">{{ convert_locale('more') }}
                                            <i class="fa-arrow-right-long fa-solid"></i></a>
                                        <div class="flex gap-[12px]">
                                            <span
                                                class="icon bg-etBlue w-[50px] aspect-square rounded-full outline-[2px] outline outline-white -outline-offset-[3px] flex items-center justify-center">
                                                <img src="{{ asset('frontend/events/assets/img/call-icon.svg') }}"
                                                    alt="call icon">
                                            </span>

                                            <span class="txt font-semibold text-etBlack">
                                                <span
                                                    class="block text-[14px] mb-[2px]">{{ convert_locale('phone_number') }}</span>
                                                <a href="tel:{{ $setting->social_media['phone'] }}"
                                                    class="text-[18px] hover:text-etBlue">{{ $setting->social_media['phone'] }}</a>
                                            </span>
                                        </div>
                                    </div>
                                @endif

                                @if (
                                    !empty($setting->social_media) &&
                                        isset($setting->social_media['whatsapp']) &&
                                        !empty($setting->social_media['whatsapp']))
                                    <!-- actions -->
                                    <div class="border-y border-[#d9d9d9] py-[24px] flex items-center xxs:flex-col gap-[20px]">
                                        <a href="tel:{{ $setting->social_media['whatsapp'] }}"
                                            class="inline-flex items-center h-[50px] rounded-full bg-etBlue px-[20px] text-[17px] font-medium text-white gap-[10px] hover:bg-etGray">{{ convert_locale('more') }}
                                            <i class="fa-arrow-right-long fa-solid"></i></a>
                                        <div class="flex gap-[12px]">
                                            <span
                                                class="icon bg-etBlue w-[50px] aspect-square rounded-full outline-[2px] outline outline-white -outline-offset-[3px] flex items-center justify-center">
                                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/6b/WhatsApp.svg/2044px-WhatsApp.svg.png"
                                                    alt="">
                                            </span>

                                            <span class="txt font-semibold text-etBlack">
                                                <span
                                                    class="block text-[14px] mb-[2px]">{{ convert_locale('whatsapp_number') }}</span>
                                                <a href="tel:{{ $setting->social_media['whatsapp'] }}"
                                                    class="text-[18px] hover:text-etBlue">{{ $setting->social_media['whatsapp'] }}</a>
                                            </span>
                                        </div>
                                    </div>
                                @endif

                            </div>

                        </div>
                    </div>
                </div>
            @break
        @endswitch
    @endif
@endsection
