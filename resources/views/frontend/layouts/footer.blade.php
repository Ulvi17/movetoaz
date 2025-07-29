@if ($setting && $setting->domain == env('APP_DOMAIN'))
    <!-- Main Footer Section Start -->
    <footer class="main-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Footer Content Start -->
                    <div class="footer-content">
                        <!-- Footer Logo Start -->
                        <div class="footer-logo">
                            <img @if (
                                !empty(settings(session()->get('setting_id'), 'setting_id')->logos) &&
                                    isset(settings(session()->get('setting_id'), 'setting_id')->logos['logo_white']) &&
                                    !empty(settings(session()->get('setting_id'), 'setting_id')->logos['logo_white'])) src="{{ getImageUrl(settings(session()->get('setting_id'), 'setting_id')->logos['logo_white'], 'images') }}" @else 
                                    @if (
                                        !empty(settings(session()->get('setting_id'), 'setting_id')->logos) &&
                                            isset(settings(session()->get('setting_id'), 'setting_id')->logos['logo']) &&
                                            !empty(settings(session()->get('setting_id'), 'setting_id')->logos['logo'])) src="{{ getImageUrl(settings(session()->get('setting_id'), 'setting_id')->logos['logo'], 'images') }}" @endif
                                @endif
                            @if (
                                !empty(settings(session()->get('setting_id'), 'setting_id')->name) &&
                                    isset(settings(session()->get('setting_id'), 'setting_id')->name[app()->getLocale() . '_name']) &&
                                    !empty(settings(session()->get('setting_id'), 'setting_id')->name[app()->getLocale() . '_name'])) alt="mailto:{{ settings(session()->get('setting_id'), 'setting_id')->name[app()->getLocale() . '_name'] }}" @endif>
                        </div>
                        <!-- Footer Logo End -->

                        <!-- Footer Contact Info Start -->
                        <div class="footer-contact-info">
                            @if (
                                !empty(settings(session()->get('setting_id'), 'setting_id')->social_media) &&
                                    isset(settings(session()->get('setting_id'), 'setting_id')->social_media['email']) &&
                                    !empty(settings(session()->get('setting_id'), 'setting_id')->social_media['email']))
                                <a class="mb-2"
                                    href="mailto:{{ settings(session()->get('setting_id'), 'setting_id')->social_media['email'] }}"><img
                                        src="{{ asset('movetoaz/images/icon-email-white.png') }}" height="20"
                                        alt="">&nbsp;{{ settings(session()->get('setting_id'), 'setting_id')->social_media['email'] }}</a>
                                &nbsp;&nbsp;
                            @endif
                            @if (
                                !empty(settings(session()->get('setting_id'), 'setting_id')->social_media) &&
                                    isset(settings(session()->get('setting_id'), 'setting_id')->social_media['phone']) &&
                                    !empty(settings(session()->get('setting_id'), 'setting_id')->social_media['phone']))
                                <a class="mb-2"
                                    href="tel:{{ settings(session()->get('setting_id'), 'setting_id')->social_media['phone'] }}"><img
                                        src="{{ asset('movetoaz/images/icon-white-phone.svg') }}" height="20"
                                        alt="">&nbsp;{{ settings(session()->get('setting_id'), 'setting_id')->social_media['phone'] }}</a>
                                &nbsp;&nbsp;
                            @endif
                            @if (
                                !empty(settings(session()->get('setting_id'), 'setting_id')->social_media) &&
                                    isset(settings(session()->get('setting_id'), 'setting_id')->social_media['whatsapp']) &&
                                    !empty(settings(session()->get('setting_id'), 'setting_id')->social_media['whatsapp']))
                                <!-- Header Contact Box Start -->
                                <a
                                    href="{{ settings(session()->get('setting_id'), 'setting_id')->social_media['whatsapp'] }}"><img
                                        height="20"
                                        src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/6b/WhatsApp.svg/2044px-WhatsApp.svg.png"
                                        alt="">&nbsp;
                                    +{{ explode_from_data(settings(session()->get('setting_id'), 'setting_id')->social_media['whatsapp'], '/', 3) }}</a>
                                &nbsp;&nbsp;
                                <!-- Header Contact Box End -->
                            @endif
                            @if (
                                !empty(settings(session()->get('setting_id'), 'setting_id')->social_media) &&
                                    isset(settings(session()->get('setting_id'), 'setting_id')->social_media['mobile']) &&
                                    !empty(settings(session()->get('setting_id'), 'setting_id')->social_media['mobile']))
                                <a class="mb-2"
                                    href="tel:{{ settings(session()->get('setting_id'), 'setting_id')->social_media['mobile'] }}">
                                    <img src="{{ asset('movetoaz/images/icon-white-phone.svg') }}" height="20"
                                        alt="">&nbsp;
                                    {{ settings(session()->get('setting_id'), 'setting_id')->social_media['mobile'] }}</a>
                                &nbsp;&nbsp;
                            @endif
                            @if (
                                !empty(settings(session()->get('setting_id'), 'setting_id')->address) &&
                                    isset(settings(session()->get('setting_id'), 'setting_id')->address[app()->getLocale() . '_address']) &&
                                    !empty(settings(session()->get('setting_id'), 'setting_id')->address[app()->getLocale() . '_address']))
                                <p><img src="{{ asset('movetoaz/images/icon-location.svg') }}" height="30"
                                        alt="">&nbsp;
                                    {{ settings(session()->get('setting_id'), 'setting_id')->address[app()->getLocale() . '_address'] }}
                                </p>
                            @endif
                        </div>
                        <!-- Footer Contact Info End -->

                        <!-- Footer Social Icon Start -->
                        <div class="footer-social-icon">
                            <ul>
                                @if (
                                    !empty(settings(session()->get('setting_id'), 'setting_id')->social_media) &&
                                        isset(settings(session()->get('setting_id'), 'setting_id')->social_media['instagram']) &&
                                        !empty(settings(session()->get('setting_id'), 'setting_id')->social_media['instagram']))
                                    <li><a
                                            href="{{ settings(session()->get('setting_id'), 'setting_id')->social_media['instagram'] }}"><i
                                                class="fa-brands fa-instagram"></i></a></li>
                                @endif
                                @if (
                                    !empty(settings(session()->get('setting_id'), 'setting_id')->social_media) &&
                                        isset(settings(session()->get('setting_id'), 'setting_id')->social_media['facebook']) &&
                                        !empty(settings(session()->get('setting_id'), 'setting_id')->social_media['facebook']))
                                    <li><a
                                            href="{{ settings(session()->get('setting_id'), 'setting_id')->social_media['facebook'] }}"><i
                                                class="fa-brands fa-facebook-f"></i></a></li>
                                @endif
                                @if (
                                    !empty(settings(session()->get('setting_id'), 'setting_id')->social_media) &&
                                        isset(settings(session()->get('setting_id'), 'setting_id')->social_media['tiktok']) &&
                                        !empty(settings(session()->get('setting_id'), 'setting_id')->social_media['tiktok']))
                                    <li><a
                                            href="{{ settings(session()->get('setting_id'), 'setting_id')->social_media['tiktok'] }}"><i
                                                class="fa-brands fa-tiktok"></i></a></li>
                                @endif
                                @if (
                                    !empty(settings(session()->get('setting_id'), 'setting_id')->social_media) &&
                                        isset(settings(session()->get('setting_id'), 'setting_id')->social_media['linkedin']) &&
                                        !empty(settings(session()->get('setting_id'), 'setting_id')->social_media['linkedin']))
                                    <li><a
                                            href="{{ settings(session()->get('setting_id'), 'setting_id')->social_media['linkedin'] }}"><i
                                                class="fa-brands fa-linkedin"></i></a></li>
                                @endif
                            </ul>
                        </div>
                        <!-- Footer Social Icon End -->

                        <!-- Footer Link List Start -->
                        <div class="footer-link-list">
                            <!-- Footer Links Start -->
                            <div class="footer-links">
                                <ul>
                                    @foreach (standartpages(session()->get('setting_id'), 'setting_id')->take(3) as $page)
                                        <li><a
                                                href="{{ route('frontend.show', ['slug' => $page->slugs[app()->getLocale() . '_slug'], 'page' => 'standartpages']) }}">{{ $page->name[app()->getLocale() . '_name'] }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <!-- Footer Links End -->

                            <!-- Footer Links Start -->
                            <div class="footer-links">
                                <ul>
                                    <li><a
                                            href="{{ route('frontend.index', ['page' => 'services']) }}">{{ convert_locale('services') }}</a>
                                    </li>
                                    <li><a
                                            href="{{ route('frontend.contactus', ['page' => 'services']) }}">{{ convert_locale('contactus') }}</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- Footer Links End -->
                        </div>
                        <!-- Footer Link List End -->
                    </div>
                    <!-- Footer Content End -->

                    <!-- Footer Copyright Text Start -->
                    <div class="footer-copyright-text">
                        <p>Copyright © {{ date('Y') }} {{ convert_locale('all_right_reserved') }}</p>
                        <p>{!! convert_locale('product_of_expertsm') !!}</p>
                    </div>
                    <!-- Footer Copyright Text End -->
                </div>
            </div>
        </div>
    </footer>
    <!-- Main Footer Section End -->
@elseif($setting && $setting->domain == 'chinamotorsaz.com')
    <footer class="footer clearfix">
        <div class=container>
            <div class=first-footer>
                <div class=row>
                    <div class=col-md-12>
                        <div class="links dark footer-contact-links">
                            <div class=footer-contact-links-wrapper>
                                @if (
                                    !empty(settings(session()->get('setting_id'), 'setting_id')->social_media) &&
                                        isset(settings(session()->get('setting_id'), 'setting_id')->social_media['phone']) &&
                                        !empty(settings(session()->get('setting_id'), 'setting_id')->social_media['phone']))
                                    <div class=footer-contact-link-wrapper>
                                        <div class="image-wrapper footer-contact-link-icon">
                                            <div class=icon-footer> <i class="fa fa-phone"></i></div>
                                        </div>
                                        <div class=footer-contact-link-content>
                                            <h6>{{ convert_locale('call') }}</h6>
                                            <p><a
                                                    href="tel:{{ settings(session()->get('setting_id'), 'setting_id')->social_media['phone'] }}">{{ settings(session()->get('setting_id'), 'setting_id')->social_media['phone'] }}</a>
                                            </p>
                                        </div>
                                    </div>
                                @endif

                                <div class=footer-contact-links-divider></div>
                                @if (
                                    !empty(settings(session()->get('setting_id'), 'setting_id')->social_media) &&
                                        isset(settings(session()->get('setting_id'), 'setting_id')->social_media['email']) &&
                                        !empty(settings(session()->get('setting_id'), 'setting_id')->social_media['email']))
                                    <div class=footer-contact-link-wrapper>
                                        <div class="image-wrapper footer-contact-link-icon">
                                            <div class=icon-footer> <i class="fa fa-envelope"></i></div>
                                        </div>
                                        <div class=footer-contact-link-content>
                                            <h6>@lang('additional.fields.sendemail')</h6>

                                            <p><a
                                                    href="mailto:{{ settings(session()->get('setting_id'), 'setting_id')->social_media['email'] }}">{{ settings(session()->get('setting_id'), 'setting_id')->social_media['email'] }}</a>
                                            </p>
                                        </div>
                                    </div>
                                @endif
                                <div class=footer-contact-links-divider></div>
                                @if (
                                    !empty(settings(session()->get('setting_id'), 'setting_id')->address) &&
                                        isset(settings(session()->get('setting_id'), 'setting_id')->address[app()->getLocale() . '_address']) &&
                                        !empty(settings(session()->get('setting_id'), 'setting_id')->address[app()->getLocale() . '_address']))
                                    <div class="footer-contact-link-wrapper">
                                        <div class="image-wrapper footer-contact-link-icon">
                                            <div class="icon-footer">
                                                <i class="omfi-location"></i>
                                            </div>
                                        </div>
                                        <div class="footer-contact-link-content">
                                            <h6>{{ convert_locale('address') }}</h6>
                                            <p>
                                                <a @if (
                                                    !empty(settings(session()->get('setting_id'), 'setting_id')->social_media) &&
                                                        isset(settings(session()->get('setting_id'), 'setting_id')->social_media['maps_google']) &&
                                                        !empty(settings(session()->get('setting_id'), 'setting_id')->social_media['maps_google'])) href="{{ settings(session()->get('setting_id'), 'setting_id')->social_media['maps_google'] }}" @else href="javascript:void(0)" @endif
                                                    target="_blank">{{ settings(session()->get('setting_id'), 'setting_id')->address[app()->getLocale() . '_address'] }}</a>
                                            </p>
                                        </div>
                                    </div>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class=second-footer>
                <div class=row>
                    <div class="col-md-6 widget-area ">
                        <div class=footer-column>
                            <div id=renax-about-widget-2 class="widget footer-widget-area clearfix renax_about_widget">
                                @if (
                                    !empty($setting) &&
                                        !empty($setting->logos) &&
                                        isset($setting->logos['logo_white']) &&
                                        !empty($setting->logos['logo_white']))
                                    <div class=footer-logo><a
                                            href="{{ route('frontend.index', ['page' => 'welcome', 'setting_id' => session()->get('setting_id')]) }}"
                                            class=img-fluid><img
                                                src="{{ getImageUrl($setting->logos['logo_white'], 'images') }}"
                                                alt="{{ $setting->name[app()->getLocale() . '_name'] }}"></a></div>
                                @endif


                                <div class=widget-text>
                                    <p>{{ strip_tags_with_whitespace($setting->description[app()->getLocale() . '_description']) }}
                                    </p>

                                    <div class=social-icons>
                                        <ul class=list-inline>
                                            @if (isset($setting->social_media['facebook']) && !empty($setting->social_media['facebook']))
                                                <li>
                                                    <a class="magnetic-item" target="_blank" rel="noopener"
                                                        href="{{ $setting->social_media['facebook'] }}">
                                                        <i class="fab fa-facebook-f"></i>
                                                    </a>
                                                </li>
                                            @endif
                                            @if (!empty($setting->social_media['twitter'] ?? null))
                                                <li><a class=magnetic-item target=_blank rel=noopener
                                                        href="{{ $setting->social_media['twitter'] }}"><i
                                                            class="fab fa-twitter"></i></a></li>
                                            @endif
                                            @if (!empty($setting->social_media['tiktok'] ?? null))
                                                <li><a class=magnetic-item target=_blank rel=noopener
                                                        href="{{ $setting->social_media['tiktok'] }}"><i
                                                            class="fab fa-tiktok"></i></a></li>
                                            @endif
                                            @if (!empty($setting->social_media['instagram'] ?? null))
                                                <li><a class=magnetic-item target=_blank rel=noopener
                                                        href="{{ $setting->social_media['instagram'] }}"><i
                                                            class="fab fa-instagram"></i></a></li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 widget-area ">
                        <div class=footer-column>
                            <div id=nav_menu-2 class="widget footer-widget-area clearfix widget_nav_menu">
                                <h3 class="widget-title">@lang('additional.fields.aboutsite')</h3>
                                <div class=menu-footer-widget-menu-container>
                                    <ul id=menu-footer-widget-menu class=menu>
                                        @foreach (standartpages(session()->get('setting_id'), 'setting_id') as $page)
                                            <li id="menu-item-750"
                                                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-750">
                                                <a
                                                    href="{{ route('frontend.show', ['slug' => $page->slugs[app()->getLocale() . '_slug'], 'page' => 'standartpages']) }}">
                                                    {{ $page->name[app()->getLocale() . '_name'] }}
                                                </a>
                                            </li>
                                        @endforeach

                                        <li id="menu-item-750"
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-750">
                                            <a
                                                href="{{ route('frontend.contactus', ['setting_id' => session()->get('setting_id')]) }}">
                                                {{ convert_locale('get_in_touch') }}
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class=bottom-footer-text>
                <div class="row copyright">
                    <div class=col-md-12>
                        <p class="mb-0 text-center">©{{ date('Y') }} <a href=https://globalmart.az>Globalmart
                                Group</a>. {{ convert_locale('all_right_reserved') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
@elseif($setting && $setting->domain == 'paradiseevents.az')
    <!-- FOOTER SECTION START -->
    <footer
        class="et-footer bg-etBlack relative z-[1] before:absolute before:-z-[1] before:inset-0 before:bg-[url('../assets/img/footer-1-bg.jpg')] before:opacity-30 before:mix-blend-overlay text-white">
        <div
            class="container mx-auto max-w-[calc(100%-37.1vw)] xxxl:max-w-[calc(100%-350px)] xl:max-w-[calc(100%-170px)] px-[12px] lg:max-w-full">

            <!-- footer top -->
            <div class="et-footer-top pt-[130px] xl:pt-[80px] pb-[60px]">
                <!-- contact infos -->
                <div
                    class="bg-etBlue py-[35px] px-[40px] xl:px-[30px] rounded-[20px] mb-[60px] overflow-hidden relative z-[1] flex lg:flex-wrap justify-between lg:justify-center xs:justify-start items-center gap-[20px] before:absolute before:-z-[1] before:inset-0 before:bg-[url('../assets/img/contact-info-bg.jpg')] before:bg-cover before:bg-no-repeat before:bg-center before:opacity-40 before:mix-blend-multiply">
                    <!-- single info -->
                    <div class="flex xxs:flex-col items-center xxs:items-start gap-[15px] xxs:gap-[10px]">
                        <!-- icon -->
                        <div
                            class="icon border border-white/15 rounded-full w-[63px] aspect-square shrink-0 flex items-center justify-center">
                            <div class="w-[40px] aspect-square bg-white rounded-full flex items-center justify-center">
                                <svg width="12" height="16" viewBox="0 0 12 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M6 0C4.40935 0.00211004 2.88445 0.634929 1.75969 1.75969C0.634929 2.88445 0.00211004 4.40935 0 6C0 10.3075 5.59 15.7025 5.8275 15.93C5.8737 15.9749 5.93558 16 6 16C6.06442 16 6.1263 15.9749 6.1725 15.93C6.41 15.7025 12 10.3075 12 6C11.9979 4.40935 11.3651 2.88445 10.2403 1.75969C9.11555 0.634929 7.59065 0.00211004 6 0ZM6 8.75C5.4561 8.75 4.92442 8.58871 4.47218 8.28654C4.01995 7.98437 3.66747 7.55488 3.45933 7.05238C3.25119 6.54988 3.19673 5.99695 3.30284 5.4635C3.40895 4.93005 3.67086 4.44005 4.05546 4.05546C4.44005 3.67086 4.93005 3.40895 5.4635 3.30284C5.99695 3.19673 6.54988 3.25119 7.05238 3.45933C7.55488 3.66747 7.98437 4.01995 8.28654 4.47218C8.58871 4.92442 8.75 5.4561 8.75 6C8.74956 6.72921 8.45969 7.42843 7.94406 7.94406C7.42843 8.45969 6.72921 8.74956 6 8.75Z"
                                        class="fill-etBlue" />
                                </svg>
                            </div>
                        </div>
                        <!-- txt -->
                        <div>
                            <span
                                class="block font-medium text-[14px]">{{ $setting->name[app()->getLocale() . '_name'] }}</span>
                            <h5 class="font-medium text-[20px]">
                                {{ $setting->address[app()->getLocale() . '_address'] }}
                            </h5>
                        </div>
                    </div>

                    @if (
                        !empty(settings(session()->get('setting_id'), 'setting_id')->social_media) &&
                            isset(settings(session()->get('setting_id'), 'setting_id')->social_media['email']) &&
                            !empty(settings(session()->get('setting_id'), 'setting_id')->social_media['email']))
                        <!-- single info -->
                        <div class="flex xxs:flex-col items-center xxs:items-start gap-[15px] xxs:gap-[10px]">
                            <!-- icon -->
                            <div
                                class="icon border border-white/15 rounded-full w-[63px] aspect-square shrink-0 flex items-center justify-center">
                                <div
                                    class="w-[40px] aspect-square bg-white rounded-full flex items-center justify-center">
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M15.8591 3.17969L11.0066 8.00091L15.8591 12.8221C15.9468 12.6388 16 12.4361 16 12.2197V3.78216C16 3.56569 15.9468 3.36303 15.8591 3.17969Z"
                                            fill="#1260FE" />
                                        <path
                                            d="M14.5937 2.375H1.40618C1.18971 2.375 0.987055 2.42822 0.803711 2.51594L7.00568 8.68666C7.55406 9.23503 8.4458 9.23503 8.99418 8.68666L15.1961 2.51594C15.0128 2.42822 14.8101 2.375 14.5937 2.375Z"
                                            fill="#1260FE" />
                                        <path
                                            d="M0.140938 3.17969C0.0532188 3.36303 0 3.56569 0 3.78216V12.2197C0 12.4361 0.0532188 12.6388 0.140938 12.8221L4.99341 8.00091L0.140938 3.17969Z"
                                            fill="#1260FE" />
                                        <path
                                            d="M10.3437 8.66211L9.65702 9.34877C8.7433 10.2625 7.25652 10.2625 6.3428 9.34877L5.65618 8.66211L0.803711 13.4833C0.987055 13.571 1.18971 13.6243 1.40618 13.6243H14.5937C14.8101 13.6243 15.0128 13.571 15.1961 13.4833L10.3437 8.66211Z"
                                            fill="#1260FE" />
                                    </svg>
                                </div>
                            </div>
                            <!-- txt -->
                            <div>
                                <span class="block font-medium text-[14px]">{{ convert_locale('email') }}</span>
                                <h5 class="font-medium text-[20px]"><a
                                        href="mailto:{{ settings(session()->get('setting_id'), 'setting_id')->social_media['email'] }}">{{ settings(session()->get('setting_id'), 'setting_id')->social_media['email'] }}</a>
                                </h5>
                            </div>
                        </div>
                    @endif

                    @if (
                        !empty(settings(session()->get('setting_id'), 'setting_id')->social_media) &&
                            isset(settings(session()->get('setting_id'), 'setting_id')->social_media['phone']) &&
                            !empty(settings(session()->get('setting_id'), 'setting_id')->social_media['phone']))
                        <!-- single info -->
                        <div class="flex xxs:flex-col items-center xxs:items-start gap-[15px] xxs:gap-[10px]">
                            <!-- icon -->
                            <div
                                class="icon border border-white/15 rounded-full w-[63px] aspect-square shrink-0 flex items-center justify-center">
                                <div
                                    class="w-[40px] aspect-square bg-white rounded-full flex items-center justify-center">
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M12.1643 10.5834C11.6416 10.0673 10.989 10.0673 10.4696 10.5834C10.0734 10.9762 9.67723 11.3691 9.28769 11.7686C9.18114 11.8785 9.09125 11.9018 8.9614 11.8286C8.70503 11.6887 8.43202 11.5755 8.18564 11.4224C7.03698 10.6999 6.07477 9.77097 5.22243 8.72552C4.79959 8.20613 4.42336 7.65011 4.16033 7.02417C4.10706 6.89765 4.11705 6.81442 4.22026 6.7112C4.61647 6.32832 5.00268 5.93544 5.39223 5.54257C5.93493 4.99654 5.93493 4.35728 5.3889 3.80792C5.07926 3.49495 4.76962 3.18865 4.45998 2.87568C4.14036 2.55605 3.82406 2.23309 3.5011 1.9168C2.97838 1.40739 2.32581 1.40739 1.80641 1.92012C1.40688 2.313 1.02399 2.71586 0.617799 3.10208C0.241571 3.45833 0.0517928 3.89449 0.0118394 4.40389C-0.0514202 5.23293 0.151676 6.01535 0.438009 6.77779C1.02399 8.35595 1.91628 9.75765 2.99836 11.0428C4.45998 12.7808 6.20462 14.1559 8.24557 15.148C9.1645 15.5942 10.1167 15.9371 11.1522 15.9937C11.8647 16.0337 12.484 15.8539 12.98 15.2979C13.3196 14.9183 13.7025 14.572 14.0621 14.2091C14.5948 13.6698 14.5982 13.0172 14.0688 12.4845C13.4362 11.8485 12.8003 11.2159 12.1643 10.5834Z"
                                            fill="#1260FE" />
                                        <path
                                            d="M11.5283 7.92979L12.7569 7.72003C12.5638 6.59135 12.0311 5.56921 11.222 4.75682C10.3663 3.90116 9.28426 3.36178 8.09232 3.19531L7.91919 4.43054C8.84145 4.56039 9.68047 4.97657 10.343 5.63913C10.969 6.26506 11.3785 7.05747 11.5283 7.92979Z"
                                            fill="#1260FE" />
                                        <path
                                            d="M13.4496 2.59031C12.0312 1.17197 10.2367 0.276344 8.25565 0L8.08252 1.23523C9.79386 1.47495 11.3454 2.25071 12.5706 3.47262C13.7326 4.63459 14.495 6.10288 14.7714 7.71766L15.9999 7.50791C15.677 5.63676 14.7947 3.93874 13.4496 2.59031Z"
                                            fill="#1260FE" />
                                    </svg>
                                </div>
                            </div>

                            <!-- txt -->
                            <div>
                                <span
                                    class="block font-medium text-[14px]">{{ convert_locale('phone_number') }}</span>
                                <h5 class="font-medium text-[20px]"><a
                                        href="tel:{{ settings(session()->get('setting_id'), 'setting_id')->social_media['phone'] }}">{{ settings(session()->get('setting_id'), 'setting_id')->social_media['phone'] }}</a>
                                </h5>
                            </div>
                        </div>
                    @endif
                </div>

                <div
                    class="flex md:flex-wrap xs:w-full gap-x-[65px] xxl:gap-x-[45px] xl:gap-[30px] gap-y-[25px] justify-between md:justify-center xxs:justify-start">
                    <!-- footer about -->
                    <div class="et-footer-about max-w-[295px] lg:max-w-none md:max-w-[300px] xs:max-w-full">
                        @if (
                            !empty($setting) &&
                                !empty($setting->logos) &&
                                isset($setting->logos['logo_white']) &&
                                !empty($setting->logos['logo_white']))
                            <a class="mb-[25px] inline-block"
                                href="{{ route('frontend.index', ['page' => 'welcome', 'setting_id' => session()->get('setting_id')]) }}">
                                <img style="height:60px;"
                                    src="{{ getImageUrl($setting->logos['logo_white'], 'images') }}"
                                    alt="{{ $setting->name[app()->getLocale() . '_name'] }}">
                            </a>
                        @endif

                        @if (
                            !empty(settings(session()->get('setting_id'))->description) &&
                                isset(settings(session()->get('setting_id'))->description[app()->getLocale() . '_description']) &&
                                !empty(settings(session()->get('setting_id'))->description[app()->getLocale() . '_description']))
                            <p class="font-light text-[#f2f2f2] text-[16px] mb-[25px]">{!! settings(session()->get('setting_id'))->description[app()->getLocale() . '_description'] !!}</p>
                        @endif

                        <!-- social media -->
                        @if (!empty(settings(session()->get('setting_id'), 'setting_id')->social_media))
                            <div
                                class="et-socials flex gap-[10px] text-[14px] *:border *:border-[#9EAACB] *:text-[#9EAACB] *:w-[40px] *:aspect-square *:shrink-0 *:inline-flex *:items-center *:justify-center *:rounded-full ">
                                @if (
                                    !empty(settings(session()->get('setting_id'), 'setting_id')->social_media) &&
                                        isset(settings(session()->get('setting_id'), 'setting_id')->social_media['facebook']) &&
                                        !empty(settings(session()->get('setting_id'), 'setting_id')->social_media['facebook']))
                                    <a href="{{ settings(session()->get('setting_id'), 'setting_id')->social_media['facebook'] }}"
                                        class="hover:text-white hover:bg-etBlue hover:border-etBlue">
                                        <i class="fa-brands fa-facebook-f"></i>
                                    </a>
                                @endif
                                @if (
                                    !empty(settings(session()->get('setting_id'), 'setting_id')->social_media) &&
                                        isset(settings(session()->get('setting_id'), 'setting_id')->social_media['instagram']) &&
                                        !empty(settings(session()->get('setting_id'), 'setting_id')->social_media['instagram']))
                                    <a href="{{ settings(session()->get('setting_id'), 'setting_id')->social_media['instagram'] }}"
                                        class="hover:text-white hover:bg-etBlue hover:border-etBlue">
                                        <i class="fa-brands fa-instagram"></i>
                                    </a>
                                @endif
                                @if (
                                    !empty(settings(session()->get('setting_id'), 'setting_id')->social_media) &&
                                        isset(settings(session()->get('setting_id'), 'setting_id')->social_media['twitter']) &&
                                        !empty(settings(session()->get('setting_id'), 'setting_id')->social_media['twitter']))
                                    <a href="{{ settings(session()->get('setting_id'), 'setting_id')->social_media['twitter'] }}"
                                        class="hover:text-white hover:bg-etBlue hover:border-etBlue">
                                        <i class="fa-brands fa-twitter"></i>
                                    </a>
                                @endif
                                @if (
                                    !empty(settings(session()->get('setting_id'), 'setting_id')->social_media) &&
                                        isset(settings(session()->get('setting_id'), 'setting_id')->social_media['linkedin']) &&
                                        !empty(settings(session()->get('setting_id'), 'setting_id')->social_media['linkedin']))
                                    <a href="{{ settings(session()->get('setting_id'), 'setting_id')->social_media['linkedin'] }}"
                                        class="hover:text-white hover:bg-etBlue hover:border-etBlue">
                                        <i class="fa-brands fa-linkedin-in"></i>
                                    </a>
                                @endif
                                @if (
                                    !empty(settings(session()->get('setting_id'), 'setting_id')->social_media) &&
                                        isset(settings(session()->get('setting_id'), 'setting_id')->social_media['tiktok']) &&
                                        !empty(settings(session()->get('setting_id'), 'setting_id')->social_media['tiktok']))
                                    <a href="{{ settings(session()->get('setting_id'), 'setting_id')->social_media['tiktok'] }}"
                                        class="hover:text-white hover:bg-etBlue hover:border-etBlue">
                                        <i class="fa-brands fa-tiktok"></i>
                                    </a>
                                @endif
                            </div>
                        @endif
                    </div>

                    <!-- widget -->
                    <div class="et-footer-widget shrink-0 xs:grow">
                        <h5 class="text-[20px] font-medium mb-[16px]">@lang('additional.fields.events') <span
                                class="text-etBlue">@lang('additional.fields.category')</span></h5>

                        @if (!empty(categories($setting->id, 'setting_id')))
                            <ul class="space-y-[17px] text-[16px] font-light text-[#f2f2f2]">
                                @foreach (categories($setting->id, 'setting_id') as $cat)
                                    <li>
                                        <a href="{{ route('frontend.index', ['page' => 'products', 'category' => $cat->slugs[app()->getLocale() . '_slug']]) }}"
                                            class="flex items-center gap-[10px] hover:text-etBlue group">
                                            <span class="icon">
                                                <svg width="12" height="16" viewBox="0 0 12 16"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M0 15.875V2.28125C0 1.51953 0.615234 0.875 1.40625 0.875H9.84375C10.6055 0.875 11.25 1.51953 11.25 2.28125V15.875L5.625 12.5938L0 15.875Z"
                                                        class="fill-transparent stroke-white group-hover:stroke-etBlue group-hover:fill-etBlue transition" />
                                                </svg>
                                            </span>
                                            <span class="txt">{{ $cat->name[app()->getLocale() . '_name'] }}</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>

                    <!-- widget -->
                    <div class="et-footer-widget shrink-0 xs:grow">
                        <h5 class="text-[20px] font-semibold mb-[16px]">@lang('additional.fields.company') <span
                                class="text-etBlue">@lang('additional.fields.aboutlower')</span></h5>
                        @if (
                            !empty(standartpages(session()->get('setting_id'), 'setting_id')) &&
                                count(standartpages(session()->get('setting_id'), 'setting_id')) > 0)
                            <ul class="space-y-[17px] text-[16px] font-light text-[#f2f2f2]">
                                @foreach (standartpages(session()->get('setting_id'), 'setting_id') as $page)
                                    <li>
                                        <a href="{{ route('frontend.show', ['slug' => standartpages(session()->get('setting_id'), 'setting_id')[0]->slugs[app()->getLocale() . '_slug'], 'page' => 'standartpages']) }}"
                                            class="flex items-center gap-[10px] hover:text-etBlue group">
                                            <span class="icon">
                                                <svg width="12" height="16" viewBox="0 0 12 16"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M0 15.875V2.28125C0 1.51953 0.615234 0.875 1.40625 0.875H9.84375C10.6055 0.875 11.25 1.51953 11.25 2.28125V15.875L5.625 12.5938L0 15.875Z"
                                                        class="fill-transparent stroke-white group-hover:stroke-etBlue group-hover:fill-etBlue transition" />
                                                </svg>
                                            </span>
                                            <span
                                                class="txt">{{ $page->name[app()->getLocale() . '_name'] }}</span>
                                        </a>
                                    </li>
                                @endforeach

                            </ul>
                        @endif
                    </div>

                    <!-- widget -->
                    <div class="et-footer-widget shrink-0 max-w-[318px] xs:max-w-full xs:grow">
                        <h5 class="text-[20px] font-semibold mb-[16px]">@lang('additional.fields.upcoming') <span
                                class="text-etBlue">@lang('additional.fields.eventslower')</span></h5>

                        @if (
                            !empty(products(session()->get('setting_id'), 'setting_id')) &&
                                count(products(session()->get('setting_id'), 'setting_id')) > 0)
                            <div class="space-y-[30px]">
                                <!-- single upcoming events -->
                                @foreach (products(session()->get('setting_id'), 'setting_id')->take(3) as $product)
                                    <div class="flex items-center gap-x-[30px] xxs:gap-x-[15px]">
                                        <div class="rounded-[15px] overflow-hidden shrink-0">
                                            <img src="{{ getImageUrl($product->images[0], 'images') }}"
                                                data-src="{{ getImageUrl($product->images[0], 'images') }}"
                                                alt="{{ $product->name[app()->getLocale() . '_name'] }}"
                                                class="w-[80px] aspect-square">
                                        </div>

                                        <div>
                                            <span
                                                class="date text-[16px] text-etGray flex items-center gap-[12px] mb-[8px]">
                                                <span class="icon">
                                                    <svg width="16" height="17" viewBox="0 0 16 17"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <g clip-path="url(#clip0_2043_1443)">
                                                            <path
                                                                d="M14.125 1.75H13.375V0.5H12.125V1.75H3.875V0.5H2.625V1.75H1.875C0.841125 1.75 0 2.59113 0 3.625V14.625C0 15.6589 0.841125 16.5 1.875 16.5H14.125C15.1589 16.5 16 15.6589 16 14.625V3.625C16 2.59113 15.1589 1.75 14.125 1.75ZM14.75 14.625C14.75 14.9696 14.4696 15.25 14.125 15.25H1.875C1.53038 15.25 1.25 14.9696 1.25 14.625V6.375H14.75V14.625ZM14.75 5.125H1.25V3.625C1.25 3.28038 1.53038 3 1.875 3H2.625V4.25H3.875V3H12.125V4.25H13.375V3H14.125C14.4696 3 14.75 3.28038 14.75 3.625V5.125Z"
                                                                fill="var(--et-blue)"></path>
                                                            <path d="M3.625 7.6875H2.375V8.9375H3.625V7.6875Z"
                                                                fill="var(--et-blue)"></path>
                                                            <path d="M6.125 7.6875H4.875V8.9375H6.125V7.6875Z"
                                                                fill="var(--et-blue)"></path>
                                                            <path d="M8.625 7.6875H7.375V8.9375H8.625V7.6875Z"
                                                                fill="var(--et-blue)"></path>
                                                            <path d="M11.125 7.6875H9.875V8.9375H11.125V7.6875Z"
                                                                fill="var(--et-blue)"></path>
                                                            <path d="M13.625 7.6875H12.375V8.9375H13.625V7.6875Z"
                                                                fill="var(--et-blue)"></path>
                                                            <path d="M3.625 10.1875H2.375V11.4375H3.625V10.1875Z"
                                                                fill="var(--et-blue)"></path>
                                                            <path d="M6.125 10.1875H4.875V11.4375H6.125V10.1875Z"
                                                                fill="var(--et-blue)"></path>
                                                            <path d="M8.625 10.1875H7.375V11.4375H8.625V10.1875Z"
                                                                fill="var(--et-blue)"></path>
                                                            <path d="M11.125 10.1875H9.875V11.4375H11.125V10.1875Z"
                                                                fill="var(--et-blue)"></path>
                                                            <path d="M3.625 12.6875H2.375V13.9375H3.625V12.6875Z"
                                                                fill="var(--et-blue)"></path>
                                                            <path d="M6.125 12.6875H4.875V13.9375H6.125V12.6875Z"
                                                                fill="var(--et-blue)"></path>
                                                            <path d="M8.625 12.6875H7.375V13.9375H8.625V12.6875Z"
                                                                fill="var(--et-blue)"></path>
                                                            <path d="M11.125 12.6875H9.875V13.9375H11.125V12.6875Z"
                                                                fill="var(--et-blue)"></path>
                                                            <path d="M13.625 10.1875H12.375V11.4375H13.625V10.1875Z"
                                                                fill="var(--et-blue)"></path>
                                                        </g>
                                                    </svg>
                                                </span>
                                                <span>{{ $product->created_at->format('d') }},
                                                    {{ $product->created_at->format('M') }} -
                                                    {{ $product->created_at->format('Y') }}</span>
                                            </span>

                                            <h6 class="font-medium text-[20px] text-white"><a
                                                    href="{{ route('frontend.show', ['slug' => $product->slugs[app()->getLocale() . '_slug'], 'page' => 'products']) }}"
                                                    class="hover:text-etBlue">{{ $product->name[app()->getLocale() . '_name'] }}</a>
                                            </h6>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- footer bottom -->
            <div class="et-footer-bottom border-t border-white/20 py-[34px]">
                <p class="font-light text-[#f2f2f2] text-center text-[16px]">©{{ date('Y') }} <a
                        href=https://globalmart.az>Globalmart
                        Group</a>. {{ convert_locale('all_right_reserved') }}</p>
            </div>
        </div>
    </footer>
    <!-- FOOTER SECTION END -->
@endif
