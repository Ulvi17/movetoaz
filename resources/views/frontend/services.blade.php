@extends('frontend.layouts.app')
@section('title', $title)
@section('content')
    @if ($setting->domain == env('APP_DOMAIN'))
        @include('frontend.parts.breadcump', ['title' => $title])
        @if (
            !empty($data) &&
                count($data) > 0)
            <div class="page-amenities">
                <div class="container">
                    <div class="row">
                        @foreach ($data as $service)
                            <div class="col-lg-4 col-md-6">
                                <!-- Amenties Item Start -->
                                <div class="our-amenities-item wow fadeInUp"
                                    style="visibility: visible; animation-name: fadeInUp;">
                                    @if (!empty($service->images))
                                        <div class="amenities-img">
                                            <a href="{{ route('frontend.show', ['page' => 'service', 'slug' => $service->slugs[app()->getLocale() . '_slug'], 'setting_id' => session()->get('setting_id')]) }}"
                                                data-cursor-text="{{ convert_locale('more') }}">
                                                <figure class="image-anime">
                                                    <img src="{{ getImageUrl($service->images[0], 'images') }}"
                                                        alt="{{ $service->name[app()->getLocale() . '_name'] }}">
                                                </figure>
                                            </a>
                                        </div>
                                    @endif

                                    <div class="amenities-content">
                                        <div class="amenities-item-title">
                                            <h3><a
                                                    href="{{ route('frontend.show', ['page' => 'service', 'slug' => $service->slugs[app()->getLocale() . '_slug'], 'setting_id' => session()->get('setting_id')]) }}">{{ $service->name[app()->getLocale() . '_name'] }}</a>
                                            </h3>
                                        </div>
                                        <div class="amenities-btn">
                                            <a
                                                href="{{ route('frontend.show', ['page' => 'service', 'slug' => $service->slugs[app()->getLocale() . '_slug'], 'setting_id' => session()->get('setting_id')]) }}"><img
                                                    src="{{ asset('movetoaz/images/arrow-white.svg') }}" alt=""></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Amenties Item End -->
                            </div>
                        @endforeach
                        <div class="col-lg-4 col-md-6">
                            <!-- Amenties Item Start -->
                            <div class="our-amenities-item wow fadeInUp"
                                style="visibility: visible; animation-name: fadeInUp;">
                                
                                    <div class="amenities-img">
                                        <a href="https://expertsm.com/en/services/"
                                            data-cursor-text="{{ convert_locale('more') }}">
                                            <figure class="image-anime">
                                                <img src="https://expertsm.b-cdn.net/wp-content/uploads/2023/08/logo.svg"
                                                    alt="ExpertSM">
                                            </figure>
                                        </a>
                                    </div>
                                
                                <div class="amenities-content">
                                    <div class="amenities-item-title">
                                        <h3><a
                                                href="https://expertsm.com/en/services/">{{ convert_locale("More Services") }}</a>
                                        </h3>
                                    </div>
                                    <div class="amenities-btn">
                                        <a
                                            href="https://expertsm.com/en/services/"><img
                                                src="{{ asset('movetoaz/images/arrow-white.svg') }}" alt=""></a>
                                    </div>
                                </div>
                            </div>
                            <!-- Amenties Item End -->
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @elseif($setting->domain == 'chinamotorsaz.com')
        @include('frontend.parts.breadcump', ['setting' => $setting, 'title' => $title])
        <div class="elementor-element elementor-element-2757641 e-flex e-con-boxed e-con e-parent" data-id=2757641
            data-element_type=container>
            <div class="e-con-inner d-flex w-100" style="flex-direction: row">
                @if (!empty($data) && count($data) > 0)
                    @foreach ($data as $key => $dat)
                        <div class="elementor-element elementor-element-23d2de3 e-con-full e-flex e-con e-child w-50"
                            data-id=23d2de3 data-element_type=container>
                            <div class="elementor-element elementor-element-ec14b94 elementor-widget elementor-widget-renax-feature"
                                data-id=ec14b94 data-element_type=widget data-widget_type=renax-feature.default>
                                <div class=elementor-widget-container>
                                    <div class=process>
                                        <div class=item>
                                            <div class="text text-left">
                                                <h5 class="rx-feature-title">
                                                    {{ $dat->name[app()->getLocale() . '_name'] }}</h5>
                                                <p>{!! $dat->description[app()->getLocale() . '_description'] !!}</p>
                                            </div>
                                            <div class=numb>
                                                <div class=numb-curv>
                                                    <div class=number>
                                                        {{ $loop->iteration }}.</div>
                                                    <div class=shap-left-top>
                                                        <svg viewBox="0 0 11 11" fill=none xmlns=http://www.w3.org/2000/svg
                                                            class="w-11 h-11">
                                                            <path
                                                                d="M11 1.54972e-06L0 0L2.38419e-07 11C1.65973e-07 4.92487 4.92487 1.62217e-06 11 1.54972e-06Z"
                                                                fill=#fff></path>
                                                        </svg>
                                                    </div>
                                                    <div class=shap-right-bottom>
                                                        <svg viewBox="0 0 11 11" fill=none xmlns=http://www.w3.org/2000/svg
                                                            class="w-11 h-11">
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
                @else
                    <p class="text-center text-danger">{{ convert_locale("notfound") }}</p>
                @endif
            </div>
        </div>
        </div>
    @elseif($setting->domain == 'paradiseevents.az')
        </section>
    @endif
@endsection
