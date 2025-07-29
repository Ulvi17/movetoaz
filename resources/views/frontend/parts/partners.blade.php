{{-- Partners --}}
@if ($setting->domain == env('APP_DOMAIN'))
    @if (
        !empty(partners($setting->id, 'setting_id')) &&
            count(partners($setting->id, 'setting_id')) > 0)
        <section
            class="elementor-section elementor-top-section elementor-element elementor-element-2be03584 elementor-section-content-middle elementor-section-stretched elementor-section-full_width elementor-section-height-default elementor-section-height-default"
            data-id="2be03584" data-element_type="section"
            data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;,&quot;background_background&quot;:&quot;classic&quot;}">
            <div class="elementor-background-overlay"></div>
            <div class="elementor-container elementor-column-gap-wide">
                <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-439fc813"
                    data-id="439fc813" data-element_type="column">
                    <div class="elementor-widget-wrap elementor-element-populated">
                        <div class="elementor-element elementor-element-2b03bc58 elementor-widget elementor-widget-houzez_elementor_space"
                            data-id="2b03bc58" data-element_type="widget"
                            data-widget_type="houzez_elementor_space.default">
                            <div class="elementor-widget-container">
                                <div class="houzez-spacer">
                                    <div class="houzez-spacer-inner"></div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <section
            class="elementor-section elementor-top-section elementor-element elementor-element-428fb1b0 elementor-hidden-tablet elementor-hidden-phone elementor-section-boxed elementor-section-height-default elementor-section-height-default"
            data-id="428fb1b0" data-element_type="section"
            data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
            <div class="elementor-container elementor-column-gap-default">
                @foreach (partners($setting->id, 'setting_id') as $partner)
                    <div class="elementor-column elementor-col-20 elementor-top-column elementor-element elementor-element-333ffd1"
                        data-id="333ffd1" data-element_type="column">
                        <div class="elementor-widget-wrap elementor-element-populated">
                            <div class="elementor-element elementor-element-190dfee8 elementor-widget elementor-widget-image"
                                data-id="190dfee8" data-element_type="widget" data-widget_type="image.default">
                                <div class="elementor-widget-container">
                                    <img loading="lazy" decoding="async" width="150" height="60"
                                        src="{{ getImageUrl($partner->image, 'images') }}"
                                        data-src="{{ getImageUrl($partner->image, 'images') }}"
                                        class="houzez-lazyload attachment-large size-large wp-image-16531"
                                        alt="{{ $partner->name[app()->getLocale() . '_name'] }}" srcset data-srcset />
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    @endif
@elseif($setting->domain == 'chinamotorsaz.com')
    {{-- @if (
        !empty(partners($setting->id, 'setting_id')) &&
            count(partners($setting->id, 'setting_id')) > 0)
        <div class="elementor-element elementor-element-8560196 e-flex e-con-boxed e-con e-parent" data-id=8560196
            data-element_type=container>
            <div class=e-con-inner>
                <div class="elementor-element elementor-element-745289f elementor-widget elementor-widget-renax-clients"
                    data-id=745289f data-element_type=widget data-widget_type=renax-clients.default>
                    <div class=elementor-widget-container>
                        <div class="clients clear">
                            <div class="owl-carousel owl-theme" data-carousel-autoplay=true data-carousel-speed=1000
                                data-carousel-timeout=5000 data-carousel-nav=false data-rtl=false
                                data-carousel-dots-mobile=false data-carousel-dots=false data-carousel-columns=6>

                                @foreach (partners($setting->id, 'setting_id') as $key => $value)
                                    <div class=clients-logo>
                                        <a href="javascript:void(0)" target=_self rel="noopener noreferrer">
                                            <img decoding=async src="{{ getImageUrl($value->image,'images') }}" alt="{{ $value->name[app()->getLocale().'_name'] }}"/>
                                        </a>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif --}}

@elseif($setting->domain=='paradiseevents.az')
    @if (
        !empty(partners($setting->id, 'setting_id')) &&
            count(partners($setting->id, 'setting_id')) > 0)
            <!-- SPONSORS & CTA SECTION START -->
            <section class="et-cta py-[130px] lg:py-[80px] md:py-[60px] relative z-[1]">
                <div class="container mx-auto max-w-[calc(100%-37.1vw)] xxxl:max-w-[calc(100%-350px)] xl:max-w-[calc(100%-170px)] px-[12px] lg:max-w-full">
                    <!-- sponsors -->
                    <div class="flex items-center md:flex-col gap-x-[42px] gap-y-[25px] border border-[#D9D9D9] rounded-[20px] py-[30px] xxs:py-[20px] px-[34px] xxs:px-[16px] mb-[130px] lg:mb-[80px] md:mb-[60px]">
                        <!-- left -->
                        <div class="flex xxs:flex-wrap items-end gap-[40px] xxs:gap-x-[10px] gap-y-[10px] pr-[42px] md:pr-0 border-r md:border-r-0 border-[#D9D9D9] max-w-[230px] md:max-w-full shrink-0">
                            <h5 class="font-medium text-[20px] text-etBlack anim-text">{{ convert_locale("partners") }}</h5>
                            <a href="javascript:void(0)" class="inline-block mb-[8px] group">
                                <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0 13.4121L11.1668 2.24543H3.87542V0H15V11.1246H12.7546V3.8332L1.58789 15L0 13.4121Z" class="fill-etBlue group-hover:fill-etBlack transition duration-[400ms]" />
                                </svg>
                            </a>
                        </div>

                        <!-- right -->
                        <div class="flex flex-wrap items-center justify-between md:justify-center gap-[30px] md:gap-[50px] w-full xxs:*:w-[40%]">
                            @foreach(partners($setting->id, 'setting_id') as $partner)
                                <!-- single sponsor -->
                                <a href="javascript:void(0)" class="group">
                                    <img src="{{getImageUrl($partner->image,'images')}}" style="height:60px;" />
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- vectors -->
                <div class="xs:hidden">
                    <img src="{{asset("frontend/events/assets/img/features-vector-1.png")}}" alt="vector" class="pointer-events-none absolute top-[372px] left-[40px] -z-[1]">
                    <img src="{{asset("frontend/events/assets/img/features-vector-3.png")}}" alt="vector" class="pointer-events-none absolute bottom-[207px] right-[106px] -z-[1]">
                </div>
            </section>
            <!-- SPONSORS & CTA SECTION END -->
    @endif
@endif
{{-- Partners --}}
