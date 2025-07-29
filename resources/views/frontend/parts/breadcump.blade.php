@if ($setting->domain == 'chinamotorsaz.com')
    <div class="elementor-element elementor-element-3df5ec9b e-con-full e-flex e-con e-parent breadcump_globalmart"
        data-id=3df5ec9b data-element_type=container>
        <div class="elementor-element elementor-element-7984f9c4 elementor-widget elementor-widget-renax-banner-simple"
            data-id=7984f9c4 data-element_type=widget data-widget_type=renax-banner-simple.default>
            <div class=elementor-widget-container>
                <section class="banner-header section-padding bg-img-c bg-img bg-fixed " data-overlay-dark=6
                    data-background="@if (isset($image) && !empty($image)) {{ getImageUrl($image, 'images') }} @else {{ asset('frontend/cars/video/cover' . rand(1, 5) . '.jpg') }} @endif"
                    data-position="bottom center">
                    <div class=v-middle>
                        <div class=container>
                            <div class=row>
                                <div class="col-md-12 offset-md-0 text-center">
                                    <h6 class="rx-df-page-banner-subtitle">
                                        {{ $setting->name[app()->getLocale() . '_name'] }}
                                    </h6>
                                    <h1 class="rx-df-page-banner-title">{{ $title }}</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@elseif($setting->domain == 'paradiseevents.az')
    <!-- BREADCRUMB SECTION START -->
    <section
        class="et-breadcrumb bg-[#000D83] pt-[210px] lg:pt-[190px] sm:pt-[160px] pb-[130px] lg:pb-[110px] sm:pb-[80px] relative z-[1] before:absolute before:inset-0 before:bg-[url('{{ asset('frontend/events/assets/img/breadcrumb-bg.jpg') }}')] before:bg-no-repeat before:bg-cover before:bg-center before:-z-[1] before:opacity-30">
        <div class="container mx-auto max-w-[1200px] px-[12px] xl:max-w-full text-center text-white">
            <h1 class="et-breadcrumb-title font-medium text-[56px] md:text-[50px] xs:text-[45px]">{{ $title }}
            </h1>
            <ul class="inline-flex items-center gap-[10px] font-medium text-[16px]">
                <li class="opacity-80"><a
                        href="{{ route('frontend.index', ['page' => 'welcome', 'setting_id' => session()->get('setting_id')]) }}"
                        class="hover:text-etBlue">{{ convert_locale("welcome") }}</a></li>
                <li><i class="fa-solid fa-angle-right"></i><i class="fa-solid fa-angle-right"></i></li>
                <li class="current-page">{{ $title }}</li>
            </ul>
        </div>
    </section>
    <!-- BREADCRUMB SECTION END -->
@else
    <!-- Page Header Start -->
    <div class="page-header parallaxie">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Page Header Box Start -->
                    <div class="page-header-box">
                        <h1 class="text-anime-style-2" data-cursor="-opaque">{{ $title }}</h1>
                        <nav class="wow fadeInUp">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('frontend.index', ['page' => 'welcome', 'setting_id' => session()->get('setting_id')]) }}">{{ convert_locale("homepage") }}</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
                            </ol>
                        </nav>
                    </div>
                    <!-- Page Header Box End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header End -->
@endif
