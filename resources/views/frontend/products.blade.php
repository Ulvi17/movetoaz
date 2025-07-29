@extends('frontend.layouts.app')
@section('title', $title)
@section('content')
    @if ($setting->domain == env('APP_DOMAIN'))
        @include('frontend.parts.breadcump', ['title' => $title])
        @if (!empty($data) && count($data) > 0)
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
                                            <a href="{{ route('frontend.show', ['page' => 'product', 'slug' => $service->slugs[app()->getLocale() . '_slug'], 'setting_id' => session()->get('setting_id')]) }}"
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
                                                    href="{{ route('frontend.show', ['page' => 'product', 'slug' => $service->slugs[app()->getLocale() . '_slug'], 'setting_id' => session()->get('setting_id')]) }}">{{ $service->name[app()->getLocale() . '_name'] }}</a>
                                            </h3>
                                        </div>
                                        <div class="amenities-btn">
                                            <a
                                                href="{{ route('frontend.show', ['page' => 'product', 'slug' => $service->slugs[app()->getLocale() . '_slug'], 'setting_id' => session()->get('setting_id')]) }}"><img
                                                    src="{{ asset('movetoaz/images/arrow-white.svg') }}" alt=""></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Amenties Item End -->
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
    @elseif($setting->domain == 'chinamotorsaz.com')
        @include('frontend.parts.breadcump', ['setting' => $setting, 'title' => $title])
        @if (!empty($data) && count($data) > 0)
            <div class="elementor-element elementor-element-ba76bd5 e-flex e-con-boxed e-con e-parent" data-id=ba76bd5
                data-element_type=container>
                <div class=e-con-inner>
                    <div class="elementor-element elementor-element-470be18 elementor-widget elementor-widget-renax-car-grid"
                        data-id=470be18 data-element_type=widget data-widget_type=renax-car-grid.default>
                        <div class=elementor-widget-container>
                            <div class=cars1>
                                <div class=container-after-car>
                                    <div class="row isotope-items-wrap-car  no-hide-last loadmore-wrapper-car "
                                        data-load-item=6 data-button-text="Load More">
                                        @foreach ($data as $key => $product)
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
                </div>
            </div>
        @else
            <p class="text-center text-danger">{{ convert_locale("notfound") }}</p>
        @endif

        </div>
        </section>
    @elseif($setting->domain == 'paradiseevents.az')
        @include('frontend.parts.breadcump', ['setting' => $setting, 'title' => $title])
        <div class="py-[130px] lg:py-[80px] md:py-[60px] overflow-hidden">
            <!-- EVENTS SECTION START -->
            <section class="et-all-events">
                <div class="container mx-auto max-w-[1200px] px-[12px] xl:max-w-full">

                    <div class="et-schedules-tab-container">

                        <div class="all-scheduled-events space-y-[30px]">
                            <!-- single schedule -->
                            @if (!empty($data))
                                @foreach ($data as $product)
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
                                                        class="hover:text-etBlue">Siempre Son Flores" Musica Cubana Salsa
                                                        Jazz adipi scing elit. Nullam</a>
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

                    </div>
                </div>
            </section>
            <!-- EVENTS SECTION END -->
        </div>
    @endif
@endsection
