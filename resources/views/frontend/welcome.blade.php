@extends('frontend.layouts.app')

@section('title', $title)
@section('headerclass', 'header-transparent-wrap')
@push('css')
    @if (
        !empty(sliders(session()->get('setting_id'), 'setting_id')) &&
            count(sliders(session()->get('setting_id'), 'setting_id')) > 0)
        @foreach (sliders(session()->get('setting_id'), 'setting_id') as $slide)
            @if ($slide->type_of == 'video')
                <link rel="prefetch" href="{{ getImageUrl($slide->image_or_video, 'images') }}" as="video">
            @endif
        @endforeach
    @endif
@endpush
@push('js')
    @if (
        !empty(sliders(session()->get('setting_id'), 'setting_id')) &&
            count(sliders(session()->get('setting_id'), 'setting_id')) > 0)
        @foreach (sliders(session()->get('setting_id'), 'setting_id') as $slide)
            @if ($slide->type_of == 'video')
                <script>
                    var videoElement = document.getElementById('slider_video_{{ $slide->id }}')
                    fetch('{{ getImageUrl($slide->image_or_video, 'images') }}')
                        .then(response => response.blob())
                        .then(blob => {
                            const blobUrl = URL.createObjectURL(blob);
                            videoElement.src = blobUrl;
                            videoElement.play();
                        })
                        .catch(error => console.error('Video yüklenirken hata oluştu:', error));
                </script>
            @endif
        @endforeach
    @endif
@endpush
@section('content')
    @if ($setting && $setting->domain == env('APP_DOMAIN'))
        @include('frontend.parts.sliders')

        <!-- About Us Section Start -->
        <div class="about-us">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <!-- About Us Images Start -->
                        <div class="about-us-images">
                            <div class="about-us-image-box-1">
                                <!-- About Image 1 Start -->
                                <div class="about-img-1">

                                    <figure class="image-anime reveal">
                                        @if (
                                            !empty(standartpages('haqqmzda', 'typewithdomain')->images) &&
                                                count(standartpages('haqqmzda', 'typewithdomain')->images) > 0)
                                            <img src="{{ getImageUrl(standartpages('haqqmzda', 'typewithdomain')->images[0], 'images') }}"
                                                alt="">
                                        @else
                                            <img src="{{ asset('movetoaz/images/about-img-1.jpg') }}" alt="">
                                        @endif

                                    </figure>
                                </div>
                                <!-- About Image 1 End -->
                            </div>

                            <div class="about-us-image-box-2">
                                <!-- About Image 2 Start -->
                                <div class="about-img-2">
                                    <figure class="image-anime reveal">
                                        {{-- <img src="{{ asset('movetoaz/images/about-img-2.jpg') }}" alt=""> --}}
                                        @if (
                                            !empty(standartpages('haqqmzda', 'typewithdomain')->images) &&
                                                count(standartpages('haqqmzda', 'typewithdomain')->images) > 1)
                                            <img src="{{ getImageUrl(standartpages('haqqmzda', 'typewithdomain')->images[1], 'images') }}"
                                                alt="">
                                        @else
                                            <img src="{{ asset('movetoaz/images/about-img-2.jpg') }}" alt="">
                                        @endif
                                    </figure>
                                </div>
                                <!-- About Image 2 End -->

                                <!-- About Image 3 Start -->
                                <div class="about-img-3">
                                    <figure class="image-anime reveal">
                                        {{-- <img src="{{ asset('movetoaz/images/about-img-3.jpg') }}" alt=""> --}}
                                        @if (
                                            !empty(standartpages('haqqmzda', 'typewithdomain')->images) &&
                                                count(standartpages('haqqmzda', 'typewithdomain')->images) > 2)
                                            <img src="{{ getImageUrl(standartpages('haqqmzda', 'typewithdomain')->images[2], 'images') }}"
                                                alt="">
                                        @else
                                            <img src="{{ asset('movetoaz/images/about-img-3.jpg') }}" alt="">
                                        @endif
                                    </figure>
                                </div>
                                <!-- About Image 3 End -->
                            </div>

                            @if (
                                !empty(standartpages('haqqmzda', 'typewithdomain')->additional_data) &&
                                    isset(standartpages('haqqmzda', 'typewithdomain')->additional_data['youtube_url']) &&
                                    !empty(standartpages('haqqmzda', 'typewithdomain')->additional_data['youtube_url']))
                                <div class="intro-video-box">
                                    <!-- Video Play Button Start -->
                                    <div class="video-play-button">
                                        <a href="{{ standartpages('haqqmzda', 'typewithdomain')->additional_data['youtube_url'] }}"
                                            class="popup-video" data-cursor-text="{{ convert_locale('Play') }}"><i
                                                class="fa-solid fa-play"></i></a>
                                    </div>
                                    <!-- Video Play Button End -->
                                </div>
                                <!-- Intro Video Box End -->
                            @endif
                        </div>
                    </div>
                    <!-- About Us Images End -->

                    <div class="col-lg-6">
                        <!-- About Us Content Start -->
                        <div class="about-us-content">
                            <!-- Section Title Start -->
                            <div class="section-title">
                                <h3 class="wow fadeInUp">
                                    {{ convert_locale("why_us") }}
                                </h3>
                                {{-- <h2 class="text-anime-style-2" data-cursor="-opaque">Bringing Innovation And Heart to <span>
                                        Every Detail</span></h2> --}}
                                <div class="wow fadeInUp about_content_on_welcome_page" data-wow-delay="0.2s">{!! standartpages('niy-bizi-semlisiniz', 'typewithdomain')->description[app()->getLocale() . '_description'] !!}</div>
                            </div>
                            <!-- Section Title End -->

                            <!-- About Content Body End -->

                            <!-- About Content Footer Start -->
                            <div class="about-content-footer wow fadeInUp" data-wow-delay="0.8s">
                                <!-- About Content Button Start -->
                                <div class="about-content-btn">
                                    <a href="{{ route('frontend.show', ['page' => 'standartpages', 'slug' => standartpages('haqqmzda', 'typewithdomain')->slugs[app()->getLocale() . '_slug']]) }}"
                                        class="btn-default">{{ convert_locale('more') }}</a>
                                </div>
                                <!-- About Content Button End -->

                                @if (
                                    !empty(settings(session()->get('setting_id'), 'setting_id')->social_media) &&
                                        isset(settings(session()->get('setting_id'), 'setting_id')->social_media['phone']) &&
                                        !empty(settings(session()->get('setting_id'), 'setting_id')->social_media['phone']))
                                    <!-- About Contact Box Start -->
                                    <div class="about-contact-box">
                                        <div class="icon-box">
                                            <img src="{{ asset('movetoaz/images/icon-accent-phone.svg') }}" alt="">
                                        </div>

                                        <div class="about-contact-content">
                                            <p>{{ convert_locale('call_us') }}</p>
                                            <h3>
                                                <a
                                                    href="tel:{{ settings(session()->get('setting_id'), 'setting_id')->social_media['phone'] }}"> {{ settings(session()->get('setting_id'), 'setting_id')->social_media['phone'] }}</a>
                                            </h3>
                                        </div>
                                    </div>
                                    @if (
                                        !empty(settings(session()->get('setting_id'), 'setting_id')->social_media) &&
                                            isset(settings(session()->get('setting_id'), 'setting_id')->social_media['whatsapp']) &&
                                            !empty(settings(session()->get('setting_id'), 'setting_id')->social_media['whatsapp']))
                                        <div class="about-contact-box">
                                            <div class="icon-box">
                                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/6b/WhatsApp.svg/2044px-WhatsApp.svg.png"
                                                    alt="">
                                            </div>
                                            <div class="about-contact-content">
                                                <h3>
                                                    <p>{{ convert_locale('Whatsapp') }}: </p>
                                                    <a
                                                        href="{{ settings(session()->get('setting_id'), 'setting_id')->social_media['whatsapp'] }}"> +{{ explode_from_data(settings(session()->get('setting_id'), 'setting_id')->social_media['whatsapp'], '/', 3) }}</a>
                                                </h3>
                                            </div>
                                        </div>
                                    @endif


                                    <!-- About Contact Box End -->
                                @endif
                            </div>
                            <!-- About Content Footer End -->
                        </div>
                        <!-- About Us Content End -->
                    </div>
                </div>
            </div>
        </div>
        <!-- About Us Section End -->


        <!-- Our Apartment Section Start -->
        <div class="our-apartments">
            <div class="container">
                <div class="row section-row">
                    <div class="col-lg-12">
                        <!-- Section Title Start -->
                        <div class="section-title">
                            <h3 class="wow fadeInUp">{{ convert_locale('packages') }}</h3>
                            <h2 class="text-anime-style-2" data-cursor="-opaque">{!! convert_locale('package_subtitle') !!}
                            </h2>
                        </div>
                        <!-- Section Title End -->
                    </div>
                </div>

                <div class="row">
                    @foreach (products(session()->get('setting_id'), 'setting_id') as $service)
                        <div class="col-lg-3 col-md-6">
                            <!-- Apartment Item Start -->
                            <div class="apartment-item wow fadeInUp">
                                @if (!empty($service->images))
                                    <!-- Apartment Image Start -->
                                    <div class="apartment-image">
                                        <a href="{{ route('frontend.show', ['page' => 'product', 'slug' => $service->slugs[app()->getLocale() . '_slug'], 'setting_id' => session()->get('setting_id')]) }}"
                                            data-cursor-text="{{ convert_locale('more') }}">
                                            <figure class="image-anime">
                                                <img src="{{ getImageUrl($service->images[0], 'images') }}"
                                                    alt="{{ $service->name[app()->getLocale() . '_name'] }}">
                                            </figure>
                                        </a>
                                    </div>
                                    <!-- Apartment Image End -->
                                @endif

                                <!-- Apartment Button Start -->
                                <div class="apartment-btn">
                                    <a
                                        href="{{ route('frontend.show', ['page' => 'product', 'slug' => $service->slugs[app()->getLocale() . '_slug'], 'setting_id' => session()->get('setting_id')]) }}"><img
                                            src="{{ asset('movetoaz/images/arrow-accent.svg') }}" alt=""></a>
                                </div>
                                <!-- Apartment Button End -->

                                <!-- Apartment Content Start -->
                                <div class="apartments-content">
                                    <h3><a
                                            href="{{ route('frontend.show', ['page' => 'product', 'slug' => $service->slugs[app()->getLocale() . '_slug'], 'setting_id' => session()->get('setting_id')]) }}">{{ $service->name[app()->getLocale() . '_name'] }}</a>
                                    </h3>
                                </div>
                                <!-- Apartment Content End -->
                            </div>
                        </div>
                    @endforeach


                    <div class="col-md-12">
                        <!-- Our Apartments Footer Start -->
                        <div class="our-apartment-footer wow fadeInUp" data-wow-delay="0.8s">
                            <a href="{{ route('frontend.index', ['page' => 'products', 'setting_id' => session()->get('setting_id')]) }}"
                                class="btn-default">{{ convert_locale('view_all_packages') }}</a>
                        </div>
                        <!-- Our Apartments Footer End -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Our Apartment Section End -->

        <!-- Our Team Section Start -->
        <div class="our-team">
            <div class="container">
                <div class="row section-row align-items-center">
                    <div class="col-lg-12">
                        <!-- Section Title Start -->
                        <div class="section-title">
                            <h3 class="wow fadeInUp">{{ convert_locale('teams') }}</h3>
                            <h2 class="text-anime-style-2" data-cursor="-opaque">{!! convert_locale('teams_subtitle') !!}
                            </h2>
                        </div>
                        <!-- Section Title End -->
                    </div>
                </div>

                <div class="row">
                    @foreach (teams(session()->get('setting_id'), 'setting_id') as $team)
                        <div class="col-lg-3 col-md-6">
                            <!-- Team Member Item Start -->
                            <div class="team-member-item wow fadeInUp">
                                @if (!empty($team->image))
                                    <!-- Team Image Start -->
                                    <div class="team-image">
                                        <a href="{{ route('frontend.show', ['page' => 'teams', 'setting_id' => session()->get('setting_id'), 'slug' => $team->slugs[app()->getLocale() . '_slug']]) }}"
                                            data-cursor-text="{{ convert_locale('more') }}">
                                            <figure class="image-anime">
                                                <img src="{{ getImageUrl($team->image, 'images') }}"
                                                    alt="{{ $team->name[app()->getLocale() . '_name'] }}">
                                            </figure>
                                        </a>

                                        <!-- Team Readmore Button Start -->
                                        <div class="team-readmore-btn">
                                            <a
                                                href="{{ route('frontend.show', ['page' => 'teams', 'setting_id' => session()->get('setting_id'), 'slug' => $team->slugs[app()->getLocale() . '_slug']]) }}"><img
                                                    src="{{ asset('movetoaz/images/arrow-white.svg') }}"
                                                    alt=""></a>
                                        </div>
                                        <!-- Team Readmore Button End -->
                                    </div>
                                    <!-- Team Image End -->
                                @endif

                                <!-- Team Body Start -->
                                <div class="team-body">
                                    <!-- Team Content Start -->
                                    <div class="team-content">
                                        <h3><a
                                                href="{{ route('frontend.show', ['page' => 'teams', 'setting_id' => session()->get('setting_id'), 'slug' => $team->slugs[app()->getLocale() . '_slug']]) }}">{{ $team->name[app()->getLocale() . '_name'] }}</a>
                                        </h3>
                                        <p>{!! !empty($team->position) ? $team->position[app()->getLocale() . '_position'] : '' !!}</p>
                                    </div>
                                    <!-- Team Content End -->

                                    <!-- Team Social Icon Start -->
                                    {{-- <div class="team-social-icon">
                                        <ul>
                                            <li><a href="index-video.html#"><i class="fa-brands fa-instagram"></i></a></li>
                                            <li><a href="index-video.html#"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="index-video.html#"><i class="fa-brands fa-dribbble"></i></a></li>
                                        </ul>
                                    </div> --}}
                                    <!-- Team Social Icon End -->
                                </div>
                                <!-- Team Body End -->
                            </div>
                            <!-- Team Member Item Start -->
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
        <!-- Our Team Section End -->

        @if (
            !empty(whychooseus(session()->get('setting_id'), 'setting_id')) &&
                count(whychooseus(session()->get('setting_id'), 'setting_id')) > 0)
            <!-- Our Testimonial Section Start -->
            <div class="our-testimonial">
                <div class="container">
                    <div class="row section-row">
                        <div class="col-lg-12">
                            <!-- Section Title Start -->
                            <div class="section-title">
                                <h3 class="wow fadeInUp">{{ convert_locale('testimonials') }}</h3>
                                <h2 class="text-anime-style-2" data-cursor="-opaque">{!! convert_locale('testimonials_subtitle') !!}</h2>
                                <a href="{{ route('frontend.contactus') }}"> {{ convert_locale('contactus') }}</a>
                            </div>
                            <!-- Section Title End -->
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="testimonial-slider">
                                <div class="swiper">
                                    <div class="swiper-wrapper" data-cursor-text="{{ convert_locale('drag') }}">
                                        @foreach (whychooseus(session()->get('setting_id'), 'setting_id') as $choose)
                                            <!-- Testimonial Slide Start -->

                                            <div class="swiper-slide">
                                                <div class="testimonial-item">
                                                    <div class="testimonial-content">
                                                        <p>{!! $choose->description[app()->getLocale() . '_description'] !!} </p>
                                                    </div>
                                                    <div class="author-info">
                                                        @if (!empty($choose->images))
                                                            <div class="author-image">
                                                                <figure class="image-anime">
                                                                    <img src="{{ getImageUrl($choose->images[0], 'images') }}"
                                                                        alt="{{ $choose->name[app()->getLocale() . '_name'] }}">
                                                                </figure>
                                                            </div>
                                                        @endif
                                                        <div class="author-content">
                                                            <h3>{{ $choose->name[app()->getLocale() . '_name'] }}</h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Testimonial Slide End -->
                                        @endforeach

                                    </div>
                                    <div class="testimonial-btn">
                                        <div class="testimonial-btn-prev"></div>
                                        <div class="testimonial-btn-next"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Our Testimonial Section End -->
        @endif

        <!-- Our Faq Section Start -->
        <div class="our-faqs">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <!-- Our Faq Content Start -->
                        <div class="our-faqs-content">
                            <!-- Section Title Start -->
                            <div class="section-title">
                                <h3 class="wow fadeInUp">{{ convert_locale('faqs') }}</h3>
                                <h2 class="text-anime-style-2" data-cursor="-opaque">{!! convert_locale('faqs_subtitle') !!}
                                </h2>
                            </div>
                            <!-- Section Title End -->

                            <!-- FAQ Accordion Start -->
                            <div class="faq-accordion" id="accordion">
                                @foreach (faqs(session()->get('setting_id'), 'setting_id') as $key => $faq)
                                    <!-- FAQ Item Start -->
                                    <div class="accordion-item wow fadeInUp">
                                        <h2 class="accordion-header" id="heading1">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapse{{ $key }}"
                                                aria-expanded="{{ $key == 0 ? true : false }}"
                                                aria-controls="collapse{{ $key }}">
                                                {{ $faq->name[app()->getLocale() . '_name'] }}
                                            </button>
                                        </h2>
                                        <div id="collapse{{ $key }}"
                                            class="accordion-collapse collapse {{ $key == 0 ? 'show' : '' }}"
                                            aria-labelledby="heading1" data-bs-parent="#accordion">
                                            <div class="accordion-body">
                                                <p>{!! $faq->description[app()->getLocale() . '_description'] !!}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- FAQ Item End -->
                                @endforeach


                            </div>
                            <!-- FAQ Accordion End -->
                        </div>
                        <!-- Our Faq Content End -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Our Faq Section End -->

        @if (
            !empty(blogs(session()->get('setting_id'), 'setting_id')) &&
                count(blogs(session()->get('setting_id'), 'setting_id')) > 0)
            <!-- Our Blog Section Start -->
            <div class="our-blog">
                <div class="container">
                    <div class="row section-row">
                        <div class="col-lg-12">
                            <!-- Section Title Start -->
                            <div class="section-title">
                                <h3 class="wow fadeInUp">{{ convert_locale('news') }}</h3>
                                <h2 class="text-anime-style-2" data-cursor="-opaque">{!! convert_locale('news_subtitle') !!}</h2>
                            </div>
                            <!-- Section Title End -->
                        </div>
                    </div>

                    <div class="row">

                        @foreach (blogs(session()->get('setting_id'), 'setting_id') as $blog)
                            <div class="col-lg-4 col-md-6">
                                <!-- Post Item Start -->
                                <div class="post-item wow fadeInUp">
                                    @if (!empty($blog->images))
                                        <!-- Post Featured Image Start-->
                                        <div class="post-featured-image">
                                            <a href="{{ route('frontend.show', ['page' => 'news', 'slug' => $blog->slugs[app()->getLocale() . '_slug'], 'setting_id' => session()->get('setting_id')]) }}"
                                                data-cursor-text="{{ convert_locale('more') }}">
                                                <figure class="image-anime">
                                                    <img src="{{ getImageUrl($blog->images[0], 'images') }}"
                                                        alt="{{ $blog->name[app()->getLocale() . '_name'] }}">
                                                </figure>
                                            </a>
                                        </div>
                                        <!-- Post Featured Image End -->
                                    @endif

                                    <!-- Post Item Body Start -->
                                    <div class="post-item-body">
                                        <!-- Post Item Content Start -->
                                        <div class="post-item-content">
                                            <h2><a
                                                    href="{{ route('frontend.show', ['page' => 'news', 'slug' => $blog->slugs[app()->getLocale() . '_slug'], 'setting_id' => session()->get('setting_id')]) }}">{{ $blog->name[app()->getLocale() . '_name'] }}</a>
                                            </h2>
                                            <p>{!! mb_substr(strip_tags_with_whitespace($blog->description[app()->getLocale() . '_description']), 0, 100) !!}</p>
                                        </div>
                                        <!-- Post Item Content End -->

                                        <!-- Post Item Button Start-->
                                        <div class="post-item-btn">
                                            <a href="{{ route('frontend.show', ['page' => 'news', 'slug' => $blog->slugs[app()->getLocale() . '_slug'], 'setting_id' => session()->get('setting_id')]) }}"
                                                class="readmore-btn">{{ convert_locale('more') }} <img
                                                    src="{{ asset('movetoaz/images/arrow-primary.svg') }}"
                                                    alt=""></a>
                                        </div>
                                        <!-- Post Item Button End-->
                                    </div>
                                    <!-- Post Item Body End -->
                                </div>
                                <!-- Post Item End -->
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
            <!-- Our Blog Section End -->
        @endif
    @elseif($setting && $setting->domain == 'chinamotorsaz.com')
        <section class=rx-full-width data-scroll-index=1>
            <div data-elementor-type=wp-page data-elementor-id=656 class="elementor elementor-656">

                {{-- @if (!empty(sliders(session()->get('setting_id'), 'setting_id')) && count(sliders(session()->get('setting_id'), 'setting_id')) > 0) --}}
                {{-- Sliders --}}
                <div class="elementor-element elementor-element-65db884 e-con-full e-flex e-con e-parent" data-id=65db884
                    data-element_type=container>
                    <div class="elementor-element elementor-element-fd947aa elementor-widget elementor-widget-renax-banner-image"
                        data-id=fd947aa data-element_type=widget data-widget_type=renax-banner-image.default>
                        <div class=elementor-widget-container>
                            <header class=header>
                                <div class=video-fullscreen-wrap>
                                    <div class=video-fullscreen-video data-overlay-dark=2><video playsinline autoplay loop
                                            muted poster="{{ asset('frontend/cars/video/cover1.jpg') }}">
                                            <source
                                                src="{{ asset('frontend/cars/video/181537-866999852_1_compressed.mp4') }}"
                                                type=video/mp4 autoplay loop muted>
                                        </video></div>
                                    <div class=v-middle>
                                        <div class=container>
                                            <div class=row>
                                                <div class="col-md-12 offset-md-0 mb-30 mt-30 text-center">
                                                    <h6 class="rx-header-banner-sub-title">* Premium</h6>
                                                    <h1 class="rx-header-banner-title">@lang('additional.fields.avtomobileldeedin')</h1>
                                                    <br />
                                                    <a href="{{ route('frontend.index', ['page' => 'products']) }}"
                                                        class="button-1 mt-15 mb-15 mr-15" target=_self
                                                        rel="noopener noreferrer">@lang('additional.routename.product_cars')
                                                        <span class="fa fa-arrow-top-right"></span>
                                                    </a>
                                                    <a href="{{ route('frontend.contactus') }}"
                                                        class="button-2 mt-15 mb-15" target=_self
                                                        rel="noopener noreferrer">{{ convert_locale("contactus") }}
                                                        <span class="fa fa-arrow-top-right"></span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </header>
                        </div>
                    </div>
                </div>
                {{-- Sliders --}}
                {{-- @endif --}}

                {{-- Aksiyalar --}}
                @if (
                    !empty(aksiyalar(session()->get('setting_id'), 'setting_id')) &&
                        count(aksiyalar(session()->get('setting_id'), 'setting_id')) > 0)
                    <div class="elementor-element elementor-element-316da0f e-flex e-con-boxed e-con e-parent e-lazyloaded"
                        data-id="316da0f" data-element_type="container">
                        <div class="e-con-inner">

                            @foreach (aksiyalar(session()->get('setting_id'), 'setting_id') as $key => $aksiya)
                                <a class="elementor-element elementor-element-bd55fc8 e-con-full e-flex e-con e-child"
                                    href="{{ route('frontend.show', ['page' => 'aksiyalar', 'setting_id' => session()->get('setting_id'), 'slug' => $aksiya->slugs[app()->getLocale() . '_slug']]) }}"
                                    data-id="bd55fc8" data-element_type="container">
                                    <div class="elementor-element elementor-element-f407afa elementor-widget elementor-widget-renax-process"
                                        data-id="f407afa" data-element_type="widget"
                                        data-widget_type="renax-process.default">
                                        <div class="elementor-widget-container">
                                            <div class="process-number">
                                                <div class="item ">
                                                    <div class="con">
                                                        <div class="no">{{ $key + 1 }}</div>
                                                        <h5 class="rx-process-title">
                                                            {{ $aksiya->name[app()->getLocale() . '_name'] }}</h5>
                                                        <p>{{ mb_substr(strip_tags_with_whitespace($aksiya->description[app()->getLocale() . '_description']), 0, 100) }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @endforeach

                        </div>
                    </div>
                @endif
                {{-- Aksiyalar --}}


                @if (
                    !empty(services('haqqmzda', 'typewithdomain')) &&
                        isset(services('haqqmzda', 'typewithdomain')->id) &&
                        !empty(services('haqqmzda', 'typewithdomain')->id))
                    {{-- Services --}}
                    <div class="elementor-element elementor-element-316da0f e-flex e-con-boxed e-con e-parent"
                        data-id=316da0f data-element_type=container>
                        <div class=e-con-inner>
                            @foreach (services('haqqmzda', 'typewithdomain') as $key => $service)
                                <div class="elementor-element elementor-element-bd55fc8 e-con-full e-flex e-con e-child"
                                    data-id=bd55fc8 data-element_type=container>
                                    <div class="elementor-element elementor-element-f407afa elementor-widget elementor-widget-renax-process"
                                        data-id=f407afa data-element_type=widget data-widget_type=renax-process.default>
                                        <div class=elementor-widget-container>
                                            <div class=process-number>
                                                <div class="item ">
                                                    <div class=con>
                                                        <div class=no>{{ $loop->iteration }}</div>
                                                        <h5 class="rx-process-title">
                                                            {{ $service->name[app()->getLocale() . '_name'] }}</h5>
                                                        <p>{{ mb_substr(strip_tags_with_whitespace($service->description[app()->getLocale() . '_description']), 0, 100) }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                    {{-- Services --}}
                @endif

                {{-- @if (!empty(standartpages('haqqmzda', 'typewithdomain')) && isset(standartpages('haqqmzda', 'typewithdomain')->id) && !empty(standartpages('haqqmzda', 'typewithdomain')->id))
                    <div class="elementor-element elementor-element-9921b59 e-flex e-con-boxed e-con e-parent"
                        data-id=9921b59 data-element_type=container>
                        <div class=e-con-inner>
                            <div class="elementor-element elementor-element-f674b29 e-con-full e-flex e-con e-child d-flex w-100"
                                data-id=f674b29 data-element_type=container style="flex-direction:row">
                                <div class="elementor-element elementor-element-a52ad39 elementor-widget elementor-widget-renax-sec-title d-inline-block"
                                    style="width:49%;" data-id=a52ad39 data-element_type=widget
                                    data-widget_type=renax-sec-title.default
                                    style="height:unset;margin-bottom:0;padding-bototm:0;">
                                    <div class=elementor-widget-container style="height:unset;">
                                        <div class="about text-left ">
                                            <div class=section-subtitle>{{ convert_locale("about") }}</div>
                                            <div class="section-title black">
                                                {{ standartpages('haqqmzda', 'typewithdomain')->name[app()->getLocale() . '_name'] }}
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
                                            <p>{{ mb_substr(strip_tags_with_whitespace(standartpages('haqqmzda', 'typewithdomain')->description[app()->getLocale() . '_description']), 0, 100) }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="elementor-element elementor-element-4dd3314 elementor-widget elementor-widget-renax-button"
                                        data-id=4dd3314 data-element_type=widget data-widget_type=renax-button.default>
                                        <div class=elementor-widget-container>
                                            <div class="sec-button float-left clear">
                                                <a class="button-4  "
                                                    href="{{ route('frontend.show', ['slug' => standartpages('haqqmzda', 'typewithdomain')->slugs[app()->getLocale() . '_slug'], 'page' => 'standartpages']) }}"
                                                    target=_self rel="noopener noreferrer">
                                                    {{ convert_locale("more") }}
                                                    <span class="fa fa-arrow-right"></span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @if (!empty(standartpages('niy-biz', 'typewithdomain')) && isset(standartpages('niy-biz', 'typewithdomain')->id) && !empty(standartpages('niy-biz', 'typewithdomain')->id))
                                    <div class="elementor-element elementor-element-a52ad39 elementor-widget elementor-widget-renax-sec-title d-inline-block"
                                        style="width:49%;" data-id=7473530 data-element_type=container>
                                        <div class="elementor-element elementor-element-a52ad39 elementor-widget elementor-widget-renax-sec-title"
                                            data-id=a52ad39 data-element_type=widget
                                            data-widget_type=renax-sec-title.default
                                            style="height:unset;margin-bottom:0;padding-bototm:0;">
                                            <div class=elementor-widget-container style="height:unset;">
                                                <div class="about text-left ">
                                                    <div class=section-subtitle>{{ convert_locale("about") }}</div>
                                                    <div class="section-title black">
                                                        {{ standartpages('niy-biz', 'typewithdomain')->name[app()->getLocale() . '_name'] }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="elementor-element elementor-element-390c8ed elementor-widget elementor-widget-text-editor"
                                                data-id=390c8ed data-element_type=widget
                                                data-widget_type=text-editor.default>
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
                                                    <p>{{ mb_substr(strip_tags_with_whitespace(standartpages('niy-biz', 'typewithdomain')->description[app()->getLocale() . '_description']), 0, 100) }}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="elementor-element elementor-element-4dd3314 elementor-widget elementor-widget-renax-button"
                                                data-id=4dd3314 data-element_type=widget
                                                data-widget_type=renax-button.default>
                                                <div class=elementor-widget-container>
                                                    <div class="sec-button float-left clear">
                                                        <a class="button-4  "
                                                            href="{{ route('frontend.show', ['slug' => standartpages('niy-biz', 'typewithdomain')->slugs[app()->getLocale() . '_slug'], 'page' => 'standartpages']) }}"
                                                            target=_self rel="noopener noreferrer">
                                                            {{ convert_locale("more") }}
                                                            <span class="fa fa-arrow-right"></span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endif --}}

                @if (
                    !empty(products(session()->get('setting_id'), 'setting_id')) &&
                        count(products(session()->get('setting_id'), 'setting_id')) > 0)
                    {{-- Products --}}
                    <div class="elementor-element elementor-element-07b0422 e-con-full e-flex e-con e-parent"
                        data-id=07b0422 data-element_type=container>
                        <div class="elementor-element elementor-element-712e944 elementor-widget elementor-widget-renax-sec-title"
                            data-id=712e944 data-element_type=widget data-widget_type=renax-sec-title.default>
                            <div class=elementor-widget-container>
                                <div class="about text-center ">
                                    <div class=section-subtitle>@lang('additional.fields.lookatstock')</div>
                                    <div class="section-title black">@lang('additional.fields.instockcars')</div>
                                </div>
                            </div>
                        </div>
                        <div class="elementor-element elementor-element-95bc39c elementor-widget elementor-widget-renax-car-carousel"
                            data-id=95bc39c data-element_type=widget data-widget_type=renax-car-carousel.default>
                            <div class=elementor-widget-container>
                                <div class=cars1>
                                    <div class=container-after-car>
                                        <div class="row isotope-items-wrap-car  no-hide-last loadmore-wrapper-car "
                                            data-load-item=6 data-button-text="Load More">
                                            @foreach (products(session()->get('setting_id'), 'setting_id') as $key => $product)
                                                <div
                                                    class=" isotope-item col-lg-6  col-md-6 luxury-cars sport-cars suvs convertible sedan small-cars  mb-60">
                                                    <div class="item ">
                                                        @if (!empty($product->images) && isset($product->images[0]) && !empty($product->images[0]))
                                                            <div class="img position-re-order-car-carousel o-hidden ">
                                                                <div class=cd-pt-ab>
                                                                    <img decoding=async
                                                                        src="{{ getImageUrl($product->images[0], 'images') }}"
                                                                        alt="{{ $product->name[app()->getLocale() . '_name'] }}">
                                                                </div>
                                                            </div>
                                                        @endif
                                                        <div class="con active">
                                                            <div class=row>
                                                                <div class=col-md-7>
                                                                    <div class=title><a
                                                                            href="{{ route('frontend.show', ['slug' => $product->slugs[app()->getLocale() . '_slug'], 'page' => 'products']) }}">{{ $product->name[app()->getLocale() . '_name'] }}</a>
                                                                    </div>
                                                                    <div class=details>
                                                                        {{ mb_substr(strip_tags_with_whitespace($product->description[app()->getLocale() . '_description']), 0, 100) }}
                                                                    </div>
                                                                </div>
                                                                <div class=col-md-5>
                                                                    <div class=book>
                                                                        <div><a href="{{ route('frontend.show', ['slug' => $product->slugs[app()->getLocale() . '_slug'], 'page' => 'product']) }}"
                                                                                class=btn><span>{{ convert_locale("more") }}</span></a>
                                                                        </div>
                                                                        <div>
                                                                            <span
                                                                                class=price>₼{{ !empty($product->prices) && isset($product->prices['endirim_price']) && !empty($product->prices['endirim_price']) ? $product->prices['endirim_price'] : $product->prices['price'] }}</span>
                                                                            @if (!empty($product->prices) && isset($product->prices['endirim_price']) && !empty($product->prices['endirim_price']))
                                                                                <span>/{{ $product->prices['price'] }}</span>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach

                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Products --}}
                @endif

                @if (
                    !empty(whychooseus(session()->get('setting_id'), 'setting_id')) &&
                        count(whychooseus(session()->get('setting_id'), 'setting_id')) > 0)
                    {{-- Steps --}}
                    <div class="elementor-element elementor-element-6221898 e-flex e-con-boxed e-con e-parent"
                        data-id=6221898 data-element_type=container>
                        <div class=e-con-inner>
                            <div class="elementor-element elementor-element-ba35cc8 e-con-full e-flex e-con e-child"
                                data-id=ba35cc8 data-element_type=container>
                                <div class="elementor-element elementor-element-76513d5 elementor-widget elementor-widget-renax-sec-title"
                                    data-id=76513d5 data-element_type=widget data-widget_type=renax-sec-title.default>
                                    <div class=elementor-widget-container>
                                        <div class="about text-center ">
                                            <div class=section-subtitle>{{ convert_locale("services") }}</div>
                                            <div class="section-title black">@lang('additional.fields.carbuyingprocess')</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @foreach (whychooseus(session()->get('setting_id'), 'setting_id') as $key => $service)
                                <div class="elementor-element elementor-element-7e8c3b6 e-con-full e-flex e-con e-child"
                                    data-id=7e8c3b6 data-element_type=container>
                                    <div class="elementor-element elementor-element-e4ecafd elementor-widget elementor-widget-renax-feature"
                                        data-id=e4ecafd data-element_type=widget data-widget_type=renax-feature.default>
                                        <div class="elementor-widget-container d-flex">
                                            <div class=process>
                                                <div class=item>
                                                    <div class="text text-left">
                                                        <h2 class="rx-feature-title">
                                                            {{ $service->name[app()->getLocale() . '_name'] }}</h2>
                                                        <p>{{ mb_substr(strip_tags_with_whitespace($service->description[app()->getLocale() . '_description']), 0, 100) }}
                                                        </p>
                                                    </div>
                                                    <div class=numb>
                                                        <div class=numb-curv>
                                                            <div class=number>
                                                                0{{ $loop->iteration }}.</div>
                                                            <div class=shap-left-top>
                                                                <svg viewBox="0 0 11 11" fill=none
                                                                    xmlns=http://www.w3.org/2000/svg class="w-11 h-11">
                                                                    <path
                                                                        d="M11 1.54972e-06L0 0L2.38419e-07 11C1.65973e-07 4.92487 4.92487 1.62217e-06 11 1.54972e-06Z"
                                                                        fill=#fff></path>
                                                                </svg>
                                                            </div>
                                                            <div class=shap-right-bottom>
                                                                <svg viewBox="0 0 11 11" fill=none
                                                                    xmlns=http://www.w3.org/2000/svg class="w-11 h-11">
                                                                    <path
                                                                        d="M11 1.54972e-06L0 0L2.38419e-07 11C1.65973e-07 4.92487 4.92487 1.62217e-06 11 1.54972e-06Z"
                                                                        fill=#fff></path>
                                                                </svg>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            <div class="elementor-element elementor-element-b9ef849 e-con-full e-flex e-con e-child"
                                data-id=b9ef849 data-element_type=container>
                                <div class="elementor-element elementor-element-3ead2dd elementor-widget elementor-widget-renax-notice"
                                    data-id=3ead2dd data-element_type=widget data-widget_type=renax-notice.default>
                                    <div class=elementor-widget-container>
                                        <div class="row justify-content-center process">
                                            <div class="col-md-12 text-center mt-15">
                                                <p class=rx-process-icon>
                                                    <span class="fa fa-info"></span>
                                                    @lang('additional.fields.ifyouhaveproblempleasecallus', ['phone' => $setting->social_media['phone']])
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Steps --}}
                @endif

                @if (!empty(blogs($setting->id, 'setting_id')) && count(blogs($setting->id, 'setting_id')) > 0)
                    {{-- Blogs --}}
                    <div class="elementor-element elementor-element-ae629dc e-flex e-con-boxed e-con e-parent"
                        data-id=ae629dc data-element_type=container>
                        <div class=e-con-inner>
                            <div class="elementor-element elementor-element-6719db4 elementor-widget elementor-widget-renax-sec-title"
                                data-id=6719db4 data-element_type=widget data-widget_type=renax-sec-title.default>
                                <div class=elementor-widget-container>
                                    <div class="about text-center ">
                                        <div class=section-subtitle>{{ convert_locale("blogs") }}</div>
                                        <div class="section-title black">@lang('additional.fields.latestnews')</div>
                                    </div>
                                </div>
                            </div>
                            <div class="elementor-element elementor-element-95c80ab elementor-widget elementor-widget-renax-blog-carousel"
                                data-id=95c80ab data-element_type=widget data-widget_type=renax-blog-carousel.default>
                                <div class=elementor-widget-container>
                                    <div class=blog1>
                                        <div class="owl-carousel owl-theme" data-carousel-autoplay=false
                                            data-carousel-speed=1000 data-carousel-timeout=5000 data-carousel-nav=false
                                            data-rtl=false data-carousel-dots-mobile=true data-carousel-dots=true
                                            data-carousel-columns=3>
                                            @foreach (blogs($setting->id, 'setting_id') as $blog)
                                                <div class="item ">
                                                    @if (!empty($blog->images) && isset($blog->images[0]) && !empty($blog->images[0]))
                                                        <div class="img position-re-order-blog-carousel o-hidden ">
                                                            <div class=cd-pt-ab>
                                                                <img decoding=async
                                                                    src="{{ getImageUrl($blog->images[0], 'images') }}"
                                                                    class=rx-border-radius
                                                                    alt="{{ $blog->name[app()->getLocale() . '_name'] }}">
                                                            </div>
                                                        </div>
                                                    @endif
                                                    <div class="wrapper ">
                                                        <div class=date> <a
                                                                href="{{ route('frontend.show', ['slug' => $blog->slugs[app()->getLocale() . '_slug'], 'page' => 'blogs']) }}">{{ $blog->created_at->format('d.m.Y') }}</a>
                                                        </div>
                                                        <div class=con>
                                                            @if (isset($blog->category_id) && !empty($blog->category_id))
                                                                <div class=category> <a
                                                                        href="{{ route('frontend.show', ['slug' => $blog->slugs[app()->getLocale() . '_slug'], 'page' => 'blogs']) }}"><i
                                                                            class="fa fa-folder"></i><a
                                                                            href="{{ route('frontend.show', ['slug' => $blog->slugs[app()->getLocale() . '_slug'], 'page' => 'blogs']) }}"
                                                                            rel="category tag">{{ $blog->category->name[app()->getLocale() . '_name'] }}</a></a>
                                                                </div>
                                                            @endif
                                                            <div class=text> <a
                                                                    href="{{ route('frontend.show', ['slug' => $blog->slugs[app()->getLocale() . '_slug'], 'page' => 'blogs']) }}">{{ $blog->name[app()->getLocale() . '_name'] }}</a>
                                                            </div> <a
                                                                href="{{ route('frontend.show', ['slug' => $blog->slugs[app()->getLocale() . '_slug'], 'page' => 'blogs']) }}"
                                                                class=icon-btn><i class="fa fa-arrow-right"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Blogs --}}
                @endif

                {{-- Contact With --}}
                {{-- <div class="elementor-element elementor-element-93c2502 e-flex e-con-boxed e-con e-parent e-lazyloaded"
                    data-id="93c2502" data-element_type="container"
                    data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                    <div class="e-con-inner">
                        <div class="elementor-element elementor-element-d887f71 elementor-widget elementor-widget-renax-sec-title"
                            data-id="d887f71" data-element_type="widget" data-widget_type="renax-sec-title.default">
                            <div class="elementor-widget-container">
                                <div class="about text-center ">
                                    <div class=section-subtitle>@lang('additional.fields.useourservices')r</div>
                                    <div class="section-title white">@lang('additional.fields.chooseownplace')</div>
                                    <p class="rx-lets-talk white">@lang('additional.fields.lookpropertiesandbuy')</p>
                                </div>
                            </div>
                        </div>
                        <div class="elementor-element elementor-element-6b56af7 e-flex e-con-boxed e-con e-child"
                            data-id="6b56af7" data-element_type="container">
                            <div class="e-con-inner">
                                @if (!empty($setting->social_media['whatsapp'] ?? null))
                                    <div class="elementor-element elementor-element-618fd1c elementor-widget elementor-widget-renax-button"
                                        data-id=618fd1c data-element_type=widget data-widget_type=renax-button.default>
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
                                <div class="elementor-element elementor-element-08a2bb7 elementor-widget elementor-widget-renax-button"
                                    data-id="08a2bb7" data-element_type="widget" data-widget_type="renax-button.default">
                                    <div class="elementor-widget-container">
                                        <div class="sec-button float-left clear">
                                            <a class="button-2"
                                                href="{{ route('frontend.contactus', ['setting_id' => session()->get('setting_id')]) }}"
                                                target="_self" rel="noopener noreferrer">
                                                {{ convert_locale("contactus") }}
                                                <span class="ti-arrow-top-right"></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}


                {{-- Contact With --}}
                @include('frontend.parts.partners', ['setting' => $setting])
            </div>
        </section>
    @elseif($setting && $setting->domain == 'paradiseevents.az')
        <main>

            @if (
                !empty(sliders(session()->get('setting_id'), 'setting_id')) &&
                    count(sliders(session()->get('setting_id'), 'setting_id')) > 0)
                <!-- BANNER SECTION START -->
                <section class="et-banner relative bg-etBlue">
                    <div class="et-banner-slider swiper">

                        <div class="swiper-wrapper">
                            @foreach (sliders(session()->get('setting_id'), 'setting_id') as $slide)
                                <!-- single slide -->
                                <div class="swiper-slide">
                                    <div class="bg-no-repeat bg-cover @if ($slide->type_of == 'image') bg-[url('{{ getImageUrl($slide->image_or_video, 'images') }}')] @else video_slider @endif bg-center pt-[clamp(150px,17.3vw,333px)] pb-[clamp(120px,22vw,422px)] text-white relative overflow-hidden z-[1] before:content-normal before:absolute before:inset-0 before:bg-etBlue/40 before:-z-[1]"
                                        @if ($slide->type_of == 'image') style="background-image:url('{{ getImageUrl($slide->image_or_video, 'images') }}');position:relative;" @endif>
                                        <div class="artist_faces left_top"><img
                                                src="{{ asset('frontend/events/images/aygun_kazimova.jpg') }}" /></div>
                                        <div class="artist_faces right_top"><img
                                                src="{{ asset('frontend/events/images/jennifer_lopez.jpg') }}" /></div>
                                        <div class="artist_faces left_center"><img
                                                src="{{ asset('frontend/events/images/singer_1.jpg') }}" /></div>
                                        <div class="artist_faces right_center"><img
                                                src="{{ asset('frontend/events/images/miro.jpeg') }}" /></div>
                                        <div class="artist_faces left_bottom"><img
                                                src="{{ asset('frontend/events/images/singer_2.png') }}" /></div>
                                        <div class="artist_faces right_bottom"><img
                                                src="{{ asset('frontend/events/images/roya.jpg') }}" /></div>
                                        @if ($slide->type_of == 'video')
                                            <video class="w-full h-full object-cover slide_video_bg"
                                                id="slider_video_{{ $slide->id }}" {{-- src="{{ getImageUrl($slide->image_or_video, 'images') }}" --}} nocontrols
                                                muted loop autoplay preload="auto">
                                                <source src="{{ getImageUrl($slide->image_or_video, 'images') }}" />
                                            </video>
                                        @endif
                                        <div class="mx-[15.5em] xxxl:mx-[10em] xxl:mx-[40px] xs:mx-[12px]">
                                            <div
                                                class="flex md:flex-col items-center justify-between gap-x-[30px] gap-y-[30px] md:grid-cols-1">
                                                <div class="left relative z-[20] w-[55%] md:w-full">
                                                    <h6 class="font-kalam font-bold text-[2.4rem] mb-[3px] anim-text">
                                                        {!! $slide->description[app()->getLocale() . '_description'] !!}</h6>

                                                    <h1
                                                        class="text-[clamp(42px,6.25vw,12rem)] font-semibold leading-[1.1] mb-[36px] md:mb-[36px] anim-text">
                                                        {{ $slide->name[app()->getLocale() . '_name'] }}</h1>

                                                    <div class="et-banner-btns flex flex-wrap items-center gap-[20px]">
                                                        @if (!empty($slide->button_data) && isset($slide->button_data['url']) && !empty($slide->button_data['url']))
                                                            <a href="{{ $slide->button_data['url'] }}"
                                                                class="et-btn bg-white inline-flex items-center justify-center gap-x-[13px] h-[45px] px-[15px] text-etBlue font-normal text-[17px] rounded-full">{{ $slide->button_data['name'] }}</a>
                                                        @endif

                                                    </div>

                                                    <!-- vectors -->
                                                    <div class="et-banner-vectors">
                                                        <div class="absolute left-[457px] bottom-[calc(100%+40px)]"><img
                                                                src="{{ asset('frontend/events/assets/img/banner-vector.png') }}"
                                                                alt="vector" class="w-[45px] h-[45px]"></div>
                                                        <div class="absolute bottom-0 right-[6px]"><img
                                                                src="{{ asset('frontend/events/assets/img/banner-vector.png') }}"
                                                                alt="vector" class="w-[21px] h-[21px]"></div>
                                                    </div>
                                                </div>

                                                <!-- video button -->
                                                {{-- <div class="et-banner-video-btn w-[40%] md:w-full shrink-0">
                                                <a href="https://www.youtube.com/watch?v=AQleI8oFqZo&amp;t=1s" data-fslightbox="banner-video-1" class="w-[135px] aspect-square rounded-full border border-white/20 flex justify-center items-center text-etBlue ml-auto mr-[230px] lg:mr-[150px] md:mr-auto md:ml-0 relative z-[1] text-[18px] before:absolute before:w-[70px] before:h-[70px] before:bg-white before:rounded-full before:-z-[1] before:transition before:duration-[400ms] hover:text-white hover:before:bg-etBlue hover:border-etBlue"><i class="fa-solid fa-play"></i></a>
                                            </div> --}}
                                            </div>
                                        </div>

                                        <!-- bottom title -->
                                        <span
                                            class="et-banner-bottom-title text-[clamp(30px,13vw,250px)] font-bold text-white/10 text-center block absolute bottom-[40px] left-0 w-full">{{ $setting->name[app()->getLocale() . '_name'] }}</span>
                                    </div>
                                </div>
                            @endforeach

                        </div>

                        <div
                            class="et-banner-slider-dots absolute flex flex-col right-[40px] xxs:right-[15px] !left-auto z-[1] !top-[50%] -translate-y-[50%] !w-auto">
                        </div>
                    </div>
                </section>
                <!-- BANNER SECTION END -->
            @endif


            <section
                class="et-blogs bg-[#EEF4FF] py-[130px] lg:py-[80px] md:py-[60px] relative before:absolute before:inset-0 before:bg-[url('{{ asset('frontend/events/assets/img/news-bg.jpg') }}')] before:bg-cover before:bg-center before:bg-no-repeat before:mix-blend-multiply">
                <div
                    class="container mx-auto max-w-[calc(100%-37.1vw)] xxxl:max-w-[calc(100%-350px)] xl:max-w-[calc(100%-170px)] px-[12px] lg:max-w-full">
                    <!-- heading -->
                    <div class="et-categories-heading text-center mb-[51px] xl:mb-[41px] lg:mb-[31px]">
                        <h2 class="et-section-title anim-text">@lang('additional.routename.products_events')</h2>
                    </div>

                    <!-- single schedule -->
                    @if (!empty(products(session()->get('setting_id'), 'setting_id')))
                        @foreach (products(session()->get('setting_id'), 'setting_id') as $product)
                            <div
                                class="et-schedule flex md:flex-wrap gap-x-[30px] gap-y-[20px] justify-between rev-slide-up">
                                @if (!empty($product->images) && count($product->images) > 0)
                                    <div
                                        class="w-[270px] h-[226px] shadow-[0_4px_60px_rgba(18,96,254,0.12)] shrink-0 rounded-[20px] overflow-hidden">
                                        <img src="{{ getImageUrl($product->images[0], 'images') }}"
                                            alt="{{ $product->name[app()->getLocale() . '_name'] }}">
                                    </div>
                                @endif

                                <!-- text -->
                                <div
                                    class="px-[37px] sm:px-[22px] py-[30px] shadow-[0_4px_60px_rgba(18,96,254,0.12)] w-full rounded-[20px] flex gap-y-[15px] xs:flex-col items-center xs:items-start">
                                    <div
                                        class="et-schedule__heading pr-[40px] sm:pr-[25px] xs:pr-0 mr-[40px] sm:mr-[25px] xs:mr-0 border-r xs:border-r-0 border-[#d9d9d9]">
                                        <!-- date & time -->
                                        <div
                                            class="et-schedule-date-time border border-[rgba(217,217,217,0.89)] py-[7px] px-[15px] rounded-full inline-flex xxs:w-full items-center justify-center gap-x-[24px] gap-y-[10px] mb-[10px] xxs:border-0 xxs:p-0 xxs:justify-start">
                                            <div class="date flex items-center gap-[10px]">
                                                <span class="icon">
                                                    <svg width="16" height="17" viewBox="0 0 16 17"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <g clip-path="url(#clip0_2043_1443)">
                                                            <path
                                                                d="M14.125 1.75H13.375V0.5H12.125V1.75H3.875V0.5H2.625V1.75H1.875C0.841125 1.75 0 2.59113 0 3.625V14.625C0 15.6589 0.841125 16.5 1.875 16.5H14.125C15.1589 16.5 16 15.6589 16 14.625V3.625C16 2.59113 15.1589 1.75 14.125 1.75ZM14.75 14.625C14.75 14.9696 14.4696 15.25 14.125 15.25H1.875C1.53038 15.25 1.25 14.9696 1.25 14.625V6.375H14.75V14.625ZM14.75 5.125H1.25V3.625C1.25 3.28038 1.53038 3 1.875 3H2.625V4.25H3.875V3H12.125V4.25H13.375V3H14.125C14.4696 3 14.75 3.28038 14.75 3.625V5.125Z"
                                                                fill="var(--et-blue)" />
                                                            <path d="M3.625 7.6875H2.375V8.9375H3.625V7.6875Z"
                                                                fill="var(--et-blue)" />
                                                            <path d="M6.125 7.6875H4.875V8.9375H6.125V7.6875Z"
                                                                fill="var(--et-blue)" />
                                                            <path d="M8.625 7.6875H7.375V8.9375H8.625V7.6875Z"
                                                                fill="var(--et-blue)" />
                                                            <path d="M11.125 7.6875H9.875V8.9375H11.125V7.6875Z"
                                                                fill="var(--et-blue)" />
                                                            <path d="M13.625 7.6875H12.375V8.9375H13.625V7.6875Z"
                                                                fill="var(--et-blue)" />
                                                            <path d="M3.625 10.1875H2.375V11.4375H3.625V10.1875Z"
                                                                fill="var(--et-blue)" />
                                                            <path d="M6.125 10.1875H4.875V11.4375H6.125V10.1875Z"
                                                                fill="var(--et-blue)" />
                                                            <path d="M8.625 10.1875H7.375V11.4375H8.625V10.1875Z"
                                                                fill="var(--et-blue)" />
                                                            <path d="M11.125 10.1875H9.875V11.4375H11.125V10.1875Z"
                                                                fill="var(--et-blue)" />
                                                            <path d="M3.625 12.6875H2.375V13.9375H3.625V12.6875Z"
                                                                fill="var(--et-blue)" />
                                                            <path d="M6.125 12.6875H4.875V13.9375H6.125V12.6875Z"
                                                                fill="var(--et-blue)" />
                                                            <path d="M8.625 12.6875H7.375V13.9375H8.625V12.6875Z"
                                                                fill="var(--et-blue)" />
                                                            <path d="M11.125 12.6875H9.875V13.9375H11.125V12.6875Z"
                                                                fill="var(--et-blue)" />
                                                            <path d="M13.625 10.1875H12.375V11.4375H13.625V10.1875Z"
                                                                fill="var(--et-blue)" />
                                                        </g>
                                                    </svg>
                                                </span>

                                                <span
                                                    class="text-etGray font-normal text-[16px]">{{ $product->created_at->format('d.m.Y') }}</span>
                                            </div>
                                        </div>

                                        <!-- title -->
                                        <h3
                                            class="et-schedule-title text-[24px] sm:text-[22px] font-regular text-etBlack leading-[1.25] mb-[16px] anim-text">
                                            <a href="{{ route('frontend.show', ['page' => 'products', 'slug' => $product->slugs[app()->getLocale() . '_slug']]) }}"
                                                class="hover:text-etBlue">Siempre Son Flores" Musica Cubana Salsa Jazz
                                                adipi scing elit. Nullam</a>
                                        </h3>

                                        @if (
                                            !empty($product->address) &&
                                                isset($product->address[app()->getLocale() . '_address']) &&
                                                !empty($product->address[app()->getLocale() . '_address']))
                                            <!-- location -->
                                            <div class="et-schedule-loaction flex items-center gap-[12px]">
                                                <span class="icon">
                                                    <svg width="12" height="16" viewBox="0 0 12 16"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M5.99998 0C2.80482 0 0.205383 2.59944 0.205383 5.79456C0.205383 9.75981 5.39098 15.581 5.61176 15.8269C5.81913 16.0579 6.1812 16.0575 6.3882 15.8269C6.60898 15.581 11.7946 9.75981 11.7946 5.79456C11.7945 2.59944 9.1951 0 5.99998 0ZM5.99998 8.70997C4.39241 8.70997 3.0846 7.40212 3.0846 5.79456C3.0846 4.187 4.39245 2.87919 5.99998 2.87919C7.60751 2.87919 8.91532 4.18703 8.91532 5.79459C8.91532 7.40216 7.60751 8.70997 5.99998 8.70997Z"
                                                            fill="var(--et-blue)" />
                                                    </svg>
                                                </span>
                                                <h6 class="text-[16px] text-etGray">
                                                    {{ $product->address[app()->getLocale() . '_address'] }}</h6>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif

                </div>

            </section>


            @if (
                !empty(services(session()->get('setting_id'), 'setting_id')) &&
                    count(services(session()->get('setting_id'), 'setting_id')) > 0)
                <!-- FEATURES SECTION STAR -->
                <div
                    class="bg-[#EEF4FF] relative z-[1] after:absolute after:inset-0 after:bg-[url({{ asset('frontend/events/assets/img/features-bg.png') }})] after:bg-no-repeat after:bg-cover after:-z-[2] after:mix-blend-multiply after:pointer-events-none pb-[130px] xl:pb-[80px] md:pb-[60px] pt-[244px] xl:pt-[194px] md:pt-[174px]">
                    <div
                        class="container mx-auto max-w-[calc(100%-37.1vw)] xxxl:max-w-[calc(100%-350px)] xl:max-w-[calc(100%-170px)] px-[12px] lg:max-w-full rev-slide-up">
                        <!-- heading -->
                        <div class="text-center mb-[52px]">
                            <h2 class="et-section-title anim-text">@lang('additional.fields.services')</h2>
                        </div>

                        <!-- cards -->
                        <div
                            class="grid grid-cols-4 md:grid-cols-3 sm:grid-cols-2 xxs:grid-cols-1 gap-[30px] lg:gap-[20px]">
                            @foreach (services(session()->get('setting_id'), 'setting_id') as $service)
                                <!-- single card -->
                                <div class="rounded-[20px] bg-white overflow-hidden group">
                                    @if (!empty($service->images) && count($service->images) > 0)
                                        <!-- icon -->
                                        <div
                                            class="w-[146px] aspect-square border-[20px] bg-etBlue border-[#EDF3FE] rounded-full rounded-tr-none ml-auto flex items-center justify-center">
                                            <img src="{{ getImageUrl($service->images[0], 'images') }}"
                                                alt="{{ $service->name[app()->getLocale() . '_name'] }}"
                                                class="transition duration-[0.4s] group-hover:-scale-x-100">
                                        </div>
                                    @endif

                                    <!-- text -->
                                    <div class="px-[30px] xxl:px-[20px] py-[23px] xxl:py-[18px]">
                                        <h5 class="font-medium text-[22px] text-etBlack mb-[8px]"><a href="#"
                                                class="hover:text-etBlue">{{ $service->name[app()->getLocale() . '_name'] }}</a>
                                        </h5>
                                        <p class="font-light text-etGray text-[16px]">
                                            {{ mb_substr(strip_tags_with_whitespace($service->description[app()->getLocale() . '_description']), 0, 50) }}...
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- vectors -->
                    <div class="md:hidden">
                        <img src="{{ asset('frontend/events/assets/img/features-vector-1.png') }}" alt="vector"
                            class="pointer-events-none absolute bottom-[130px] left-[40px] -z-[1]">
                        <img src="{{ asset('frontend/events/assets/img/features-vector-2.png') }}" alt="vector"
                            class="pointer-events-none absolute top-[222px] right-[180px] -z-[1]">
                        <img src="{{ asset('frontend/events/assets/img/features-vector-3.png') }}" alt="vector"
                            class="pointer-events-none absolute bottom-[138px] right-[106px] -z-[1]">
                    </div>
                </div>
                <!-- FEATURES SECTION end -->
            @endif

            @if (
                !empty(whychooseus(session()->get('setting_id'), 'setting_id')) &&
                    count(whychooseus(session()->get('setting_id'), 'setting_id')) > 0)
                <!-- STATS SECTION START -->
                <section
                    class="text-center py-[130px] xl:py-[80px] md:py-[60px] bg-[url({{ asset('frontend/events/assets/img/stats-bg.jpg') }})] bg-no-repeat bg-cover relative z-[1] before:absolute before:inset-0 before:bg-etBlue/85 before:-z-[1]">
                    <div
                        class="container mx-auto max-w-[calc(100%-37.1vw)] xxxl:max-w-[calc(100%-350px)] xl:max-w-[calc(100%-170px)] px-[12px] lg:max-w-full rev-slide-up">
                        <div
                            class="flex xs:flex-col gap-x-[77px] sm:gap-x-[57px] gap-y-[15px] justify-center border-b border-white/20 pb-[35px]">
                            @foreach (whychooseus(session()->get('setting_id'), 'setting_id') as $why)
                                <!-- single stat -->
                                <div class="et-single-stat text-white">
                                    <h5 class="number font-semibold text-[55px]">
                                        {{ strip_tags_with_whitespace($why->description[app()->getLocale() . '_description']) }}+
                                    </h5>
                                    <h6 class="font-medium text-[16px]">{{ $why->name[app()->getLocale() . '_name'] }}
                                    </h6>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- vectors -->
                    <div>
                        <img src="{{ asset('frontend/events/assets/img/stats-vector-1.png') }}" alt="vector"
                            class="pointer-events-none absolute top-[150px] left-[105px] -z-[1] md:hidden">
                        <img src="{{ asset('frontend/events/assets/img/stats-vector-2.png') }}" alt="vector"
                            class="pointer-events-none absolute bottom-[63px] left-[63px] -z-[1] w-[80px] aspect-square opacity-10">
                        <img src="{{ asset('frontend/events/assets/img/stats-vector-2.png') }}" alt="vector"
                            class="pointer-events-none absolute top-[80px] right-[70px] -z-[1] opacity-10">
                        <img src="{{ asset('frontend/events/assets/img/stats-vector-3.png') }}" alt="vector"
                            class="pointer-events-none absolute bottom-[112px] right-[80px] -z-[1]">
                    </div>
                </section>
                <!-- STATS SECTION END -->
            @endif

            @include('frontend.parts.partners', ['setting' => $setting])


            @if (
                !empty(blogs(session()->get('setting_id'), 'setting_id')) &&
                    count(blogs(session()->get('setting_id'), 'setting_id')) > 0)
                <!-- BLOG/NEWS SECTION START -->
                <section
                    class="et-blogs bg-[#EEF4FF] py-[130px] lg:py-[80px] md:py-[60px] relative before:absolute before:inset-0 before:bg-[url('{{ asset('frontend/events/assets/img/news-bg.jpg') }}')] before:bg-cover before:bg-center before:bg-no-repeat before:mix-blend-multiply">
                    <div
                        class="container mx-auto max-w-[calc(100%-37.1vw)] xxxl:max-w-[calc(100%-350px)] xl:max-w-[calc(100%-170px)] px-[12px] lg:max-w-full">
                        <!-- heading -->
                        <div class="et-categories-heading text-center mb-[51px] xl:mb-[41px] lg:mb-[31px]">
                            <h2 class="et-section-title anim-text">{{ convert_locale("blogs") }}</h2>
                        </div>

                        <div
                            class="grid grid-cols-3 md:grid-cols-2 xs:grid-cols-1 justify-center gap-[30px] lg:gap-[20px]">
                            @foreach (blogs(session()->get('setting_id'), 'setting_id') as $blog)
                                <!-- single blog -->
                                <div class="et-blog bg-white relative p-[30px] lg:p-[20px] rounded-[20px] group">
                                    @if (!empty($blog->images) && count($blog->images) > 0)
                                        <div class="et-blog__img relative z-[1] overflow-hidden rounded-[20px] mb-[21px]">
                                            <img src="{{ getImageUrl($blog->images[0], 'images') }}"
                                                alt="{{ $blog->name[app()->getLocale() . '_name'] }}"
                                                class="w-full aspect-[62/45] rounded-[8px] object-cover group-hover:scale-110 transition duration-[400ms]">
                                        </div>
                                    @endif

                                    <div class="et-blog__txt">
                                        <h4 class="et-blog__title text-[20px] sm:text-[18px] font-medium mb-[11px]"><a
                                                href="{{ route('frontend.show', ['page' => 'news', 'slug' => $blog->slugs[app()->getLocale() . '_slug']]) }}"
                                                class="hover:text-etBlue">{{ $blog->name[app()->getLocale() . '_name'] }}</a>
                                        </h4>

                                        <!-- date -->
                                        <div
                                            class="bg-[#ECF0F5] rounded-[10px] font-medium text-[14px] text-etBlack inline-block uppercase overflow-hidden text-center">
                                            <span
                                                class="bg-etBlue text-white block py-[3px] rounded-[10px]">{{ $blog->created_at->format('d') }}</span>
                                            <span
                                                class="px-[11px] py-[2px] block">{{ $blog->created_at->format('M') }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </section>
                <!-- BLOG/NEWS SECTION END -->
            @endif
        </main>
    @endif
@endsection
