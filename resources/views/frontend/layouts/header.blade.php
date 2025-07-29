@if ($setting && $setting->domain == env('APP_DOMAIN'))
    <!-- Preloader Start -->
    <div class="preloader">
        <div class="loading-container">
            <div class="loading"></div>
            <div id="loading-icon"><img src="{{ asset('movetoaz/images/loader.svg') }}" alt=""></div>
        </div>
    </div>
    <!-- Preloader End -->

    <!-- Header Start -->
    <header class="main-header">
        <div class="header-sticky">
            <nav class="navbar navbar-expand-lg">
                <div class="container">
                    <!-- Logo Start -->
                    <a class="navbar-brand header_navbar_brand_azerbaijanexperts"
                        href="{{ route('frontend.index', ['page' => 'welcome', 'setting_id' => session()->get('setting_id')]) }}">
                        <img @if (
                            !empty(settings(session()->get('setting_id'), 'setting_id')->logos) &&
                                isset(settings(session()->get('setting_id'), 'setting_id')->logos['logo']) &&
                                !empty(settings(session()->get('setting_id'), 'setting_id')->logos['logo'])) src="{{ getImageUrl(settings(session()->get('setting_id'), 'setting_id')->logos['logo'], 'images') }}" @else 
                                @if (
                                    !empty(settings(session()->get('setting_id'), 'setting_id')->logos) &&
                                        isset(settings(session()->get('setting_id'), 'setting_id')->logos['logo_white']) &&
                                        !empty(settings(session()->get('setting_id'), 'setting_id')->logos['logo_white'])) src="{{ getImageUrl(settings(session()->get('setting_id'), 'setting_id')->logos['logo_white'], 'images') }}" @endif
                            @endif
                        @if (
                            !empty(settings(session()->get('setting_id'), 'setting_id')->name) &&
                                isset(settings(session()->get('setting_id'), 'setting_id')->name[app()->getLocale() . '_name']) &&
                                !empty(settings(session()->get('setting_id'), 'setting_id')->name[app()->getLocale() . '_name'])) alt="mailto:{{ settings(session()->get('setting_id'), 'setting_id')->name[app()->getLocale() . '_name'] }}" @endif>
                    </a>
                    <!-- Logo End -->
                    <div class="show_only_mobile">
                        @if (
                            !empty(settings(session()->get('setting_id'), 'setting_id')->social_media) &&
                                isset(settings(session()->get('setting_id'), 'setting_id')->social_media['phone']) &&
                                !empty(settings(session()->get('setting_id'), 'setting_id')->social_media['phone']))
                            <!-- Header Contact Box Start -->
                            <a class="header-contact-box me-2"
                                href="tel:{{ settings(session()->get('setting_id'), 'setting_id')->social_media['phone'] }}">
                                <div class="icon-box">
                                    <img src="{{ asset('movetoaz/images/icon-white-phone.svg') }}" alt="">
                                </div>
                            </a>
                            <!-- Header Contact Box End -->
                        @endif

                        @if (
                            !empty(settings(session()->get('setting_id'), 'setting_id')->social_media) &&
                                isset(settings(session()->get('setting_id'), 'setting_id')->social_media['whatsapp']) &&
                                !empty(settings(session()->get('setting_id'), 'setting_id')->social_media['whatsapp']))
                            <!-- Header Contact Box Start -->
                            <a class="header-contact-box ml-2"
                                href="{{ settings(session()->get('setting_id'), 'setting_id')->social_media['whatsapp'] }}">
                                <div class="icon-box">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/6b/WhatsApp.svg/2044px-WhatsApp.svg.png"
                                        alt="">
                                </div>
                            </a>
                            <!-- Header Contact Box End -->
                        @endif
                    </div>
                    <!-- Main Menu Start -->
                    <div class="collapse navbar-collapse main-menu">
                        <div class="nav-menu-wrapper">
                            <ul class="navbar-nav mr-auto" id="menu">
                                {{-- <li class="nav-item submenu"><a class="nav-link"
                                        href="https://html.awaikenthemes.com/inclub/">Home</a>
                                    <ul>
                                        <li class="nav-item"><a class="nav-link"
                                                href="https://html.awaikenthemes.com/inclub/index.html">Home - Image</a>
                                        </li>
                                        <li class="nav-item"><a class="nav-link" href="index-video.html">Home -
                                                Video</a></li>
                                        <li class="nav-item"><a class="nav-link"
                                                href="https://html.awaikenthemes.com/inclub/index-slider.html">Home -
                                                Slider</a></li>
                                    </ul>
                                </li> --}}

                                <li class="nav-item"><a class="nav-link"
                                        href="{{ route('frontend.index', ['page' => 'welcome', 'setting_id' => session()->get('setting_id')]) }}">{{ convert_locale('homepage') }}</a>
                                </li>

                                <li class="nav-item submenu"><a class="nav-link"
                                        href="javascript:void(0)">{{ convert_locale('information') }}</a>
                                    <ul>
                                        @foreach (standartpages(session()->get('setting_id'), 'setting_id') as $page)
                                            <li class="nav-item">
                                                <a class="nav-link"
                                                    href="{{ route('frontend.show', ['slug' => $page->slugs[app()->getLocale() . '_slug'], 'page' => 'standartpages']) }}">
                                                    {{ $page->name[app()->getLocale() . '_name'] }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>

                                <li class="nav-item submenu"><a class="nav-link"
                                        href="{{ route('frontend.index', ['page' => 'products', 'setting_id' => session()->get('setting_id')]) }}">{{ convert_locale('packages') }}</a>
                                    <ul>
                                        @foreach (products(session()->get('setting_id'), 'setting_id') as $page)
                                            <li class="nav-item">
                                                <a class="nav-link"
                                                    href="{{ route('frontend.show', ['slug' => $page->slugs[app()->getLocale() . '_slug'], 'page' => 'product']) }}">
                                                    {{ $page->name[app()->getLocale() . '_name'] }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>


                                <li class="nav-item submenu"><a class="nav-link"
                                        href="{{ route('frontend.index', ['page' => 'services', 'setting_id' => session()->get('setting_id')]) }}">{{ convert_locale('services') }}</a>
                                    <ul>
                                        @foreach (services(session()->get('setting_id'), 'top_null_setting_id') as $page)
                                            <li class="nav-item @if (!empty($page->child_services) && count($page->child_services) > 0) submenu @endif">
                                                <a class="nav-link"
                                                    href="{{ route('frontend.show', ['slug' => $page->slugs[app()->getLocale() . '_slug'], 'page' => 'service']) }}">
                                                    {{ $page->name[app()->getLocale() . '_name'] }}
                                                </a>

                                                @if (!empty($page->child_services) && count($page->child_services) > 0)
                                                    <ul>
                                                        @foreach ($page->child_services as $subpage)
                                                            <li class="nav-item">
                                                                <a class="nav-link"
                                                                    href="{{ route('frontend.show', ['slug' => $subpage->slugs[app()->getLocale() . '_slug'], 'page' => 'service']) }}">
                                                                    {{ $subpage->name[app()->getLocale() . '_name'] }}
                                                                </a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>


                                <li class="nav-item"><a class="nav-link"
                                        href="{{ route('frontend.index', ['page' => 'faqs', 'setting_id' => session()->get('setting_id')]) }}">{{ convert_locale('faqs') }}</a>
                                </li>

                                {{-- <li class="nav-item"><a class="nav-link"
                                        href="{{ route('frontend.index', ['page' => 'news', 'setting_id' => session()->get('setting_id')]) }}">{{ convert_locale('news') }}</a>
                                </li> --}}

                                <li class="nav-item"><a class="nav-link"
                                        href="{{ route('frontend.contactus', ['setting_id' => session()->get('setting_id')]) }}">{{ convert_locale('contactus') }}</a>
                                </li>

                                <li class="nav-item submenu"><a class="nav-link"
                                        href="javascript:void(0)">{{ strtoupper(app()->getLocale()) }}</a>
                                    <ul>
                                        @foreach (settings(session()->get('setting_id'), 'setting_id')->langs as $lang)
                                            @if ($lang != app()->getLocale())
                                                <li class="nav-item">
                                                    <a class="nav-link"
                                                        href="{{ LaravelLocalization::getLocalizedURL($lang, null, [], true) }}">{{ strtoupper($lang) }}</a>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </li>
                            </ul>
                        </div>


                        @if (
                            !empty(settings(session()->get('setting_id'), 'setting_id')->social_media) &&
                                isset(settings(session()->get('setting_id'), 'setting_id')->social_media['phone']) &&
                                !empty(settings(session()->get('setting_id'), 'setting_id')->social_media['phone']))
                            <!-- Header Contact Box Start -->
                            <div class="header-contact-box me-2">
                                <div class="icon-box">
                                    <img src="{{ asset('movetoaz/images/icon-white-phone.svg') }}" alt="">
                                </div>
                                <div class="header-contact-box-content">
                                    <h3><a
                                            href="tel:{{ settings(session()->get('setting_id'), 'setting_id')->social_media['phone'] }}">{{ settings(session()->get('setting_id'), 'setting_id')->social_media['phone'] }}</a>
                                    </h3>
                                </div>
                            </div>
                            <!-- Header Contact Box End -->
                        @endif

                        @if (
                            !empty(settings(session()->get('setting_id'), 'setting_id')->social_media) &&
                                isset(settings(session()->get('setting_id'), 'setting_id')->social_media['whatsapp']) &&
                                !empty(settings(session()->get('setting_id'), 'setting_id')->social_media['whatsapp']))
                            <!-- Header Contact Box Start -->
                            <div class="header-contact-box ml-2">
                                <div class="icon-box">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/6b/WhatsApp.svg/2044px-WhatsApp.svg.png"
                                        alt="">
                                </div>
                                <div class="header-contact-box-content">
                                    <h3><a
                                            href="{{ settings(session()->get('setting_id'), 'setting_id')->social_media['whatsapp'] }}">+{{ explode_from_data(settings(session()->get('setting_id'), 'setting_id')->social_media['whatsapp'], '/', 3) }}</a>
                                    </h3>
                                </div>
                            </div>
                            <!-- Header Contact Box End -->
                        @endif
                    </div>
                    <!-- Main Menu End -->
                    <div class="navbar-toggle"></div>
                </div>
            </nav>
            <div class="responsive-menu"></div>
        </div>
    </header>
    <!-- Header End -->
@elseif($setting && $setting->domain == 'chinamotorsaz.com')
    <div class=preloader-bg></div>
    <div id=preloader>
        <div id=preloader-status>
            <div class="preloader-position loader"> <span></span></div>
        </div>
    </div>
    <div class="progress-wrap cursor-pointer">
        <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
            <g id="SVGRepo_iconCarrier">
                <path
                    d="M5 15L10 9.84985C10.2563 9.57616 10.566 9.35814 10.9101 9.20898C11.2541 9.05983 11.625 8.98291 12 8.98291C12.375 8.98291 12.7459 9.05983 13.0899 9.20898C13.434 9.35814 13.7437 9.57616 14 9.84985L19 15"
                    stroke="#f5b754" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            </g>
        </svg>
    </div>

    <nav class="navbar navbar-expand-lg renax-classic-main renax-menu-helper-class">
        <div class=container>

            @if (
                !empty($setting) &&
                    !empty($setting->logos) &&
                    isset($setting->logos['logo']) &&
                    !empty($setting->logos['logo_white']))
                <div class=logo-wrapper>
                    <a class=logo
                        href="{{ route('frontend.index', ['page' => 'welcome', 'setting_id' => session()->get('setting_id')]) }}"
                        data-mobile-logo="{{ getImageUrl($setting->logos['logo'], 'images') }}"
                        data-sticky-logo="{{ getImageUrl($setting->logos['logo_white'], 'images') }}">
                        <img src="{{ getImageUrl($setting->logos['logo_white'], 'images') }}" class=logo-img
                            alt="{{ $setting->name[app()->getLocale() . '_name'] }}">
                    </a>
                </div>
            @endif

            <div class="collapse navbar-collapse" id=navbar>
                <ul class="navbar-nav ms-auto">
                    <li id=menu-item-239 class="nav-item menu-item menu-item-type-post_type menu-item-object-page">
                        <a href="{{ route('frontend.index', ['page' => 'welcome', 'setting_id' => session()->get('setting_id')]) }}"
                            class="nav-link menu-item">{{ convert_locale('welcome') }}</a>
                    </li>

                    @if (
                        !empty(standartpages('haqqmzda', 'typewithdomain')) &&
                            isset(standartpages('haqqmzda', 'typewithdomain')->id) &&
                            !empty(standartpages('haqqmzda', 'typewithdomain')->id))
                        <li id=menu-item-239 class="nav-item menu-item menu-item-type-post_type menu-item-object-page">
                            <a href="{{ route('frontend.show', ['page' => 'standartpages', 'setting_id' => session()->get('setting_id'), 'slug' => standartpages('haqqmzda', 'typewithdomain')->slugs[app()->getLocale() . '_slug']]) }}"
                                class="nav-link menu-item">{{ standartpages('haqqmzda', 'typewithdomain')->name[app()->getLocale() . '_name'] }}</a>
                        </li>
                    @endif

                    <li id=menu-item-239 class="nav-item menu-item menu-item-type-post_type menu-item-object-page">
                        <a class="nav-link menu-item"
                            href="{{ route('frontend.index', ['page' => 'blogs', 'setting_id' => session()->get('setting_id')]) }}">{{ convert_locale('blogs') }}</a>
                    </li>

                    <li id=menu-item-239 class="nav-item menu-item menu-item-type-post_type menu-item-object-page">
                        <a class="nav-link menu-item"
                            href="{{ route('frontend.index', ['page' => 'products', 'setting_id' => session()->get('setting_id')]) }}">@lang('additional.routename.product_cars')</a>
                    </li>

                    <li id=menu-item-239 class="nav-item menu-item menu-item-type-post_type menu-item-object-page">
                        <a class="nav-link menu-item"
                            href="{{ route('frontend.index', ['page' => 'services', 'setting_id' => session()->get('setting_id')]) }}">{{ convert_locale('services') }}</a>
                    </li>

                    <li id=menu-item-722
                        class="nav-item dropdown  menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children">
                        <span class=nav-link>{{ strtoupper(app()->getLocale()) }} <i
                                class="fa fa-angle-down"></i></span>
                        <ul class=dropdown-menu>
                            @foreach ($setting->langs as $lang)
                                @if ($lang != app()->getLocale())
                                    <li id=menu-item-724
                                        class="dropdown-item menu-item menu-item-type-post_type menu-item-object-page">
                                        <a class="menu-item "
                                            href="{{ LaravelLocalization::getLocalizedURL($lang, null, [], true) }}">{{ strtoupper($lang) }}</a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </li>
                </ul>
                <div class=navbar-right>
                    <div class=wrap>
                        @if (!empty($setting->social_media['phone'] ?? null))
                            <a href="tel:{{ $setting->social_media['phone'] }}">
                                <div class=icon><i class="fa fa-phone"></i></div>
                            </a>

                            <div class=text>
                                <p>{{ convert_locale('needhelp') }}</p>
                                <h5><a
                                        href="tel:{{ $setting->social_media['phone'] }}">{{ $setting->social_media['phone'] }}</a>
                                </h5>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <div class="renax-mob-menu-wrapper renax-mob-menu-ss ">
        @if (
            !empty($setting) &&
                !empty($setting->logos) &&
                isset($setting->logos['logo_white']) &&
                !empty($setting->logos['logo_white']))
            <div class=logo-holder>
                <div class=logo-wrapper>
                    <a class=logo
                        href="{{ route('frontend.index', ['page' => 'welcome', 'setting_id' => session()->get('setting_id')]) }}"
                        data-mobile-logo="{{ getImageUrl($setting->logos['logo'], 'images') }}"
                        data-sticky-logo="{{ getImageUrl($setting->logos['logo_white'], 'images') }}">
                        <img src="{{ getImageUrl($setting->logos['logo_white'], 'images') }}" class=logo-img
                            alt="{{ $setting->name[app()->getLocale() . '_name'] }}">
                    </a>
                </div>
            </div>
        @endif

        <div class=nav-button-wrap>
            <div class=nav-button><span></span><span></span><span></span></div>
        </div>
        <div class="nav-holder main-menu main-menu-click-classic">
            <nav class=renax-menu-helper-class>
                <ul>

                    <li class="nav-item menu-item menu-item-type-post_type menu-item-object-page"><a
                            href="{{ route('frontend.index', ['page' => 'welcome', 'setting_id' => session()->get('setting_id')]) }}"
                            class="nav-link nav-color">{{ convert_locale('welcome') }}</a></li>


                    @if (
                        !empty(standartpages('haqqmzda', 'typewithdomain')) &&
                            isset(standartpages('haqqmzda', 'typewithdomain')->id) &&
                            !empty(standartpages('haqqmzda', 'typewithdomain')->id))
                        <li class="nav-item menu-item menu-item-type-post_type menu-item-object-page">
                            <a href="{{ route('frontend.show', ['page' => 'standartpages', 'setting_id' => session()->get('setting_id'), 'slug' => standartpages('haqqmzda', 'typewithdomain')->slugs[app()->getLocale() . '_slug']]) }}"
                                class="nav-link nav-color">{{ standartpages('haqqmzda', 'typewithdomain')->name[app()->getLocale() . '_name'] }}</a>
                        </li>
                    @endif

                    <li class="nav-item menu-item menu-item-type-post_type menu-item-object-page">
                        <a class="nav-link nav-color"
                            href="{{ route('frontend.index', ['page' => 'blogs', 'setting_id' => session()->get('setting_id')]) }}">{{ convert_locale('blogs') }}</a>
                    </li>

                    <li class="nav-item menu-item menu-item-type-post_type menu-item-object-page">
                        <a class="nav-link nav-color"
                            href="{{ route('frontend.index', ['page' => 'products', 'setting_id' => session()->get('setting_id')]) }}">@lang('additional.routename.product_cars')</a>
                    </li>

                    <li class="nav-item menu-item menu-item-type-post_type menu-item-object-page">
                        <a class="nav-link nav-color"
                            href="{{ route('frontend.index', ['page' => 'services', 'setting_id' => session()->get('setting_id')]) }}">{{ convert_locale('services') }}</a>
                    </li>

                    <li
                        class="nav-item dropdown  menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children">
                        <a class="nav-link nav-color">{{ strtoupper(app()->getLocale()) }} </a>
                        <ul class=sub-menu-bn>
                            @foreach ($setting->langs as $lang)
                                @if ($lang != app()->getLocale())
                                    <li class="menu-item menu-item-type-post_type menu-item-object-page"><a
                                            href="{{ LaravelLocalization::getLocalizedURL($lang, null, [], true) }}">{{ strtoupper($lang) }}</a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
@elseif($setting && $setting->domain == 'paradiseevents.az')
    <div class="ring" id="loader">
        <div class="ring">
            <div class="ring">
                <div class="ring"></div>
            </div>
        </div>
    </div>
    <!-- overlay -->
    <div class="et-overlay group">
        <div
            class="opacity-0 pointer-events-none group-[.active]:opacity-100 group-[.active]:pointer-events-auto transition ease-linear duration-300  bg-etBlack/80 fixed inset-0 z-[60]">
        </div>
    </div>
    <!-- overlay -->
    <!-- sidebar -->
    <div class="et-sidebar group">
        <div
            class=" group-[.active]:translate-x-0 translate-x-[100%] transition-transform ease-linear duration-300 fixed right-0 w-full max-w-[25%] xl:max-w-[30%] lg:max-w-[40%] md:max-w-[50%] sm:max-w-[60%] xxs:max-w-full bg-[#18377e] h-full z-[100] overflow-auto p-[50px] lg:p-[30px] space-y-[40px]">
            <!-- heading -->
            <div class="et-sidebar-heading">
                <div class="logo flex justify-between items-center">
                    @if (
                        !empty($setting) &&
                            !empty($setting->logos) &&
                            isset($setting->logos['logo_white']) &&
                            !empty($setting->logos['logo_white']))
                        <a
                            href="{{ route('frontend.index', ['page' => 'welcome', 'setting_id' => session()->get('setting_id')]) }}"><img
                                src="{{ getImageUrl($setting->logos['logo_white'], 'images') }}" style="height:60px"
                                alt="{{ $setting->name[app()->getLocale() . '_name'] }}"></a>
                    @endif

                    <button type="button"
                        class="et-sidebar-close-btn border border-white/50 w-[45px] aspect-square shrink-0 text-white text-[22px] rounded-full hover:text-etBlue hover:bg-white"><i
                            class="fa-solid fa-xmark"></i></button>
                </div>
            </div>

            <!-- mobile menu -->
            <div class="et-header-nav-in-mobile"></div>
        </div>
    </div>

    <!-- HEADER SECTION START -->
    <header
        class="et-header to-be-fixed py-[30px] xxs:py-[20px] fixed top-0 w-full px-[155px] xxxl:px-[100px] xxl:px-[40px] xs:px-[20px] z-50">
        <div class="flex justify-between items-center">
            @if (
                !empty($setting) &&
                    !empty($setting->logos) &&
                    isset($setting->logos['logo_white']) &&
                    !empty($setting->logos['logo_white']))
                <!-- logo -->
                <div class="logo shrink-0">
                    <a
                        href="{{ route('frontend.index', ['page' => 'welcome', 'setting_id' => session()->get('setting_id')]) }}">
                        <img style="height:60px" src="{{ getImageUrl($setting->logos['logo_white'], 'images') }}"
                            alt="{{ $setting->name[app()->getLocale() . '_name'] }}">
                    </a>
                </div>
            @endif

            <div class="et-header-right flex items-center gap-[60px] xl:gap-[30px]">
                <div
                    class="to-go-to-sidebar-in-mobile flex md:flex-col md:items-start items-center gap-[100px] xl:gap-[30px] md:gap-y-[15px]">
                    <!-- nav -->
                    <ul
                        class="et-header-nav flex md:flex-col gap-x-[43px] xl:gap-x-[33px] font-kanit text-[17px] font-normal">
                        <li><a
                                href="{{ route('frontend.index', ['page' => 'welcome', 'setting_id' => session()->get('setting_id')]) }}">{{ convert_locale('welcome') }}</a>
                        </li>
                        @if (
                            !empty(standartpages(session()->get('setting_id'), 'setting_id')) &&
                                count(standartpages(session()->get('setting_id'), 'setting_id')) > 0)
                            @foreach (standartpages(session()->get('setting_id'), 'setting_id') as $page)
                                <li><a
                                        href="{{ route('frontend.show', ['page' => 'standartpages', 'setting_id' => session()->get('setting_id'), 'slug' => $page->slugs[app()->getLocale() . '_slug']]) }}">{{ $page->name[app()->getLocale() . '_name'] }}</a>
                                </li>
                            @endforeach
                        @endif
                        <li><a
                                href="{{ route('frontend.index', ['page' => 'products', 'setting_id' => session()->get('setting_id')]) }}">@lang('additional.routename.products_events')</a>
                        </li>
                        <li><a href="{{ route('frontend.contactus') }}">{{ convert_locale('contactus') }}</a></li>
                        <li class="has-sub-menu relative">
                            <a role="button">{{ strtoupper(app()->getLocale()) }}</a>

                            <ul class="et-header-submenu">
                                @foreach ($setting->langs as $lang)
                                    @if ($lang != app()->getLocale())
                                        <li>
                                            <a
                                                href="{{ LaravelLocalization::getLocalizedURL($lang, null, [], true) }}">{{ strtoupper($lang) }}</a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </li>

                    </ul>

                    <!-- button -->
                    <a href="{{ route('frontend.index', ['page' => 'products']) }}"
                        class="et-btn bg-white flex items-center justify-center gap-x-[15px] h-[50px] px-[15px] text-etBlue font-medium text-[17px] rounded-full group">
                        <span class="icon">
                            <svg width="27" height="16" viewBox="0 0 27 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M8.02101 0H0.844661C0.378197 0 0 0.378144 0 0.844662V5.12625C0 5.59277 0.378197 5.97091 0.844661 5.97091C1.96347 5.97091 2.8737 6.88114 2.8737 8C2.8737 9.11886 1.96347 10.029 0.844661 10.029C0.378197 10.029 0 10.4071 0 10.8736V15.1553C0 15.6218 0.378197 15.9999 0.844661 15.9999H8.02101V0Z"
                                    class="fill-etBlue group-hover:fill-white transition" />
                                <path
                                    d="M26.0001 5.97091C26.4665 5.97091 26.8447 5.59277 26.8447 5.12625V0.844662C26.8447 0.378144 26.4665 0 26.0001 0H9.71094V16H26.0001C26.4665 16 26.8447 15.6219 26.8447 15.1553V10.8737C26.8447 10.4072 26.4665 10.029 26.0001 10.029C24.8813 10.029 23.971 9.11886 23.971 8C23.971 6.88114 24.8813 5.97091 26.0001 5.97091Z"
                                    class="fill-etBlue group-hover:fill-white transition" />
                            </svg>
                        </span>
                        @lang('additional.fields.get_tickets')</a>
                </div>

                <!-- mobile menu button -->
                <button type="button"
                    class="et-mobile-menu-open-btn hidden md:inline-block bg-etBlue rounded-full w-[50px] aspect-square text-white text-[18px] hover:bg-etBlue"><i
                        class="fa-solid fa-bars"></i></button>
            </div>
        </div>
    </header>
    <!-- HEADER SECTION END -->
@endif
