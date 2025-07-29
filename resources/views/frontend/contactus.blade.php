@extends('frontend.layouts.app')
@section('title', $title)
@section('bodyclass',
    'page-template-default page page-id-511 wp-embed-responsive theme-renax woocommerce-js
    version-dark renax-v-1.1.1 rn-empty-preloader-ac-color rn-empty-progress-bar-color rn-empty-social-border-color
    rn-empty-menu-active-color rn-empty-footer-li-color rn-empty-footer-a-color elementor-default elementor-kit-3
    elementor-page elementor-page-511 e--ua-blink e--ua-edge e--ua-mac e--ua-webkit')
@section('content')
    @if ($setting->domain == env('APP_DOMAIN'))
        @include('frontend.parts.breadcump', ['title' => $title])
        {{-- Page Contact Starts --}}
        <div class="page-contact-us">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <!-- Contact Info Item Start -->
                        <div class="contact-info-item wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                            <div class="icon-box">
                                <img src="{{ asset('movetoaz/images/icon-location.svg') }}" alt="">
                            </div>
                            <div class="contact-info-content">
                                <h3>{{ convert_locale('address') }}</h3>
                                @if (
                                    !empty(settings(session()->get('setting_id'), 'setting_id')->address) &&
                                        isset(settings(session()->get('setting_id'), 'setting_id')->address[app()->getLocale() . '_address']) &&
                                        !empty(settings(session()->get('setting_id'), 'setting_id')->address[app()->getLocale() . '_address']))
                                    <p>{{ settings(session()->get('setting_id'), 'setting_id')->address[app()->getLocale() . '_address'] }}
                                    </p>
                                @endif
                            </div>
                        </div>
                        <!-- Contact Info Item End -->
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <!-- Contact Info Item Start -->
                        <div class="contact-info-item wow fadeInUp" data-wow-delay="0.25s"
                            style="visibility: visible; animation-delay: 0.25s; animation-name: fadeInUp;">
                            <div class="icon-box">
                                <img src="{{ asset('movetoaz/images/icon-phone.svg') }}" alt="">
                            </div>
                            <div class="contact-info-content">
                                <h3>{{ convert_locale('call_and_whatsapp') }}</h3>
                                @if (
                                    !empty(settings(session()->get('setting_id'), 'setting_id')->social_media) &&
                                        isset(settings(session()->get('setting_id'), 'setting_id')->social_media['mobile']) &&
                                        !empty(settings(session()->get('setting_id'), 'setting_id')->social_media['mobile']))
                                    <p><a
                                            href="tel:{{ settings(session()->get('setting_id'), 'setting_id')->social_media['mobile'] }}">
                                            <img src="{{ asset('movetoaz/images/icon-phone.svg') }}" height="20"
                                                alt=""> &nbsp;
                                            {{ settings(session()->get('setting_id'), 'setting_id')->social_media['mobile'] }}</a>
                                    </p>
                                @endif
                                @if (
                                    !empty(settings(session()->get('setting_id'), 'setting_id')->social_media) &&
                                        isset(settings(session()->get('setting_id'), 'setting_id')->social_media['whatsapp']) &&
                                        !empty(settings(session()->get('setting_id'), 'setting_id')->social_media['whatsapp']))
                                    <p><a
                                            href="{{ settings(session()->get('setting_id'), 'setting_id')->social_media['whatsapp'] }}">
                                            <img height="20"
                                                src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/6b/WhatsApp.svg/2044px-WhatsApp.svg.png"
                                                alt="">&nbsp;
                                            +{{ explode_from_data(settings(session()->get('setting_id'), 'setting_id')->social_media['whatsapp'], '/', 3) }}</a>
                                    </p>
                                @endif
                            </div>
                        </div>
                        <!-- Contact Info Item End -->
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <!-- Contact Info Item Start -->
                        <div class="contact-info-item wow fadeInUp" data-wow-delay="0.5s"
                            style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;">
                            <div class="icon-box">
                                <img src="{{ asset('movetoaz/images/icon-email.svg') }}" alt="">
                            </div>
                            <div class="contact-info-content">
                                <h3>{{ convert_locale('email') }}</h3>
                                @if (
                                    !empty(settings(session()->get('setting_id'), 'setting_id')->social_media) &&
                                        isset(settings(session()->get('setting_id'), 'setting_id')->social_media['email']) &&
                                        !empty(settings(session()->get('setting_id'), 'setting_id')->social_media['email']))
                                    <p><a
                                            href="mailto:{{ settings(session()->get('setting_id'), 'setting_id')->social_media['email'] }}">{{ settings(session()->get('setting_id'), 'setting_id')->social_media['email'] }}</a>
                                    </p>
                                @endif
                            </div>
                        </div>
                        <!-- Contact Info Item End -->
                    </div>
                </div>
            </div>
        </div>
        {{-- Page Contacts End --}}
        {{-- Contact Form Starts --}}
        @include('frontend.parts.contactus', ['with_choises' => false])
        {{-- Contact Form End --}}
        @if (
            !empty(settings(session()->get('setting_id'), 'setting_id')->social_media) &&
                isset(settings(session()->get('setting_id'), 'setting_id')->social_media['maps_google']) &&
                !empty(settings(session()->get('setting_id'), 'setting_id')->social_media['maps_google']))
            {{-- Google Map Starts --}}
            <div class="google-map">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Google Map Start -->
                            <div class="google-map-iframe">
                                <iframe
                                    src="{{ settings(session()->get('setting_id'), 'setting_id')->social_media['maps_google'] }}"
                                    allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                            <!-- Google Map End -->
                        </div>
                    </div>
                </div>
            </div>
            {{-- Google Map Ends --}}
        @endif
    @elseif($setting->domain == 'chinamotorsaz.com')
        @include('frontend.parts.breadcump', [
            'setting' => $setting,
            'title' => $title,
        ])

        <section class="rx-full-width" style="display:flex;flex-direction:column;">
            <div data-elementor-type="wp-page" data-elementor-id="511" class="elementor elementor-511"
                style="display:flex;flex-direction:column;">

                <div class="elementor-element elementor-element-8125262 e-flex e-con-boxed e-con e-parent e-lazyloaded"
                    data-id="8125262" data-element_type="container"
                    data-settings="{&quot;background_background&quot;:&quot;classic&quot;}"
                    style="display:flex;flex-direction:row;">
                    <div class="e-con-inner" style="display:flex;flex-direction:row;width:100%;">
                        @if (
                            !empty(settings(session()->get('setting_id'), 'setting_id')->social_media) &&
                                isset(settings(session()->get('setting_id'), 'setting_id')->social_media['email']) &&
                                !empty(settings(session()->get('setting_id'), 'setting_id')->social_media['email']))
                            <div class="elementor-element elementor-element-012671d e-con-full e-flex e-con e-child"
                                data-id="012671d" data-element_type="container" style="width:33%;">
                                <div class="elementor-element elementor-element-8e09281 elementor-widget elementor-widget-renax-contact"
                                    data-id="8e09281" data-element_type="widget" data-widget_type="renax-contact.default">
                                    <div class="elementor-widget-container">
                                        <div class="contact-box">
                                            <div class="clear ">
                                                <div class="item  ">
                                                    <a href="mailto:{{ settings(session()->get('setting_id'), 'setting_id')->social_media['email'] }}"
                                                        target="_self" rel="noopener noreferrer">
                                                        <span class="icon omfi-envelope"></span>
                                                        <h5 class="rx-info-box-title">{{ convert_locale('email') }}</h5>
                                                        <p>
                                                            {{ settings(session()->get('setting_id'), 'setting_id')->social_media['email'] }}
                                                        </p>
                                                        <i class="numb omfi-envelope"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if (
                            !empty(settings(session()->get('setting_id'), 'setting_id')->address) &&
                                isset(settings(session()->get('setting_id'), 'setting_id')->address[app()->getLocale() . '_address']) &&
                                !empty(settings(session()->get('setting_id'), 'setting_id')->address[app()->getLocale() . '_address']))
                            <div class="elementor-element elementor-element-219ca55 e-con-full e-flex e-con e-child"
                                data-id="219ca55" data-element_type="container" style="width:33%;">
                                <div class="elementor-element elementor-element-a5db2a1 elementor-widget elementor-widget-renax-contact"
                                    data-id="a5db2a1" data-element_type="widget" data-widget_type="renax-contact.default">
                                    <div class="elementor-widget-container">
                                        <div class="contact-box">
                                            <div class="clear ">
                                                <div class="item  ">
                                                    <a href="javascript:void(0)" target="_blank" rel="noopener noreferrer">
                                                        <span class="icon omfi-location"></span>
                                                        <h5 class="rx-info-box-title">{{ convert_locale('address') }}</h5>
                                                        <p>
                                                            {{ settings(session()->get('setting_id'), 'setting_id')->address[app()->getLocale() . '_address'] }}
                                                        </p>
                                                        <i class="numb omfi-location"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if (
                            !empty(settings(session()->get('setting_id'), 'setting_id')->social_media) &&
                                isset(settings(session()->get('setting_id'), 'setting_id')->social_media['phone']) &&
                                !empty(settings(session()->get('setting_id'), 'setting_id')->social_media['phone']))
                            <div class="elementor-element elementor-element-975a761 e-con-full e-flex e-con e-child"
                                data-id="975a761" data-element_type="container" style="width:33%;">
                                <div class="elementor-element elementor-element-33490e1 elementor-widget elementor-widget-renax-contact"
                                    data-id="33490e1" data-element_type="widget" data-widget_type="renax-contact.default">
                                    <div class="elementor-widget-container">
                                        <div class="contact-box">
                                            <div class="clear ">
                                                <div class="item active ">
                                                    <a href="mailto:{{ settings(session()->get('setting_id'), 'setting_id')->social_media['phone'] }}"
                                                        target="_self" rel="noopener noreferrer">
                                                        <span class="icon omfi-phone"></span>
                                                        <h5 class="rx-info-box-title">{{ convert_locale('phone_number') }}
                                                        </h5>
                                                        <p>
                                                            {{ settings(session()->get('setting_id'), 'setting_id')->social_media['phone'] }}
                                                        </p>
                                                        <i class="numb omfi-phone"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>


                <div class="elementor-element elementor-element-42efd84 e-flex e-con-boxed e-con e-parent e-lazyloaded"
                    style="display:flex;flex-direction:column;" data-id="42efd84" data-element_type="container"
                    data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                    <div class="e-con-inner" style="display:flex;flex-direction:row;width:100%;">
                        <div class="elementor-element elementor-element-e691f5e e-con-full e-flex e-con e-child"
                            data-id="e691f5e" data-element_type="container" style="width:60%;">
                            <div class="elementor-element elementor-element-1d58297 elementor-widget elementor-widget-renax-simple-title"
                                data-id="1d58297" data-element_type="widget"
                                data-widget_type="renax-simple-title.default">
                                <div class="elementor-widget-container">
                                    <div class="clear text-center ">
                                        <div class="rx-simple-title white">{{ convert_locale('contactus') }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="elementor-element elementor-element-0b6dade elementor-widget elementor-widget-renax-form"
                                data-id="0b6dade" data-element_type="widget" data-widget_type="renax-form.default">
                                <div class="elementor-widget-container">
                                    <div class="clear contact">
                                        <div class="clearfix contact__form vc_template">
                                            <div class="wpcf7 js" id="wpcf7-f1252-p511-o1" lang="en-US"
                                                dir="ltr">
                                                <div class="screen-reader-response">
                                                    <p role="status" aria-live="polite" aria-atomic="true"></p>
                                                    <ul></ul>
                                                </div>
                                                <form
                                                    action="{{ route('frontend.contactus', ['setting_id' => $setting->id]) }}"
                                                    method="post" aria-label="Contact form">
                                                    @csrf
                                                    <input type="hidden" name="setting_id"
                                                        value="{{ $setting->id }}" />

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <p><span class="wpcf7-form-control-wrap"
                                                                    data-name="name"><input size="40"
                                                                        maxlength="400"
                                                                        class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required"
                                                                        autocomplete="name" aria-required="true" required
                                                                        aria-invalid="false"
                                                                        placeholder="{{ convert_locale('name') }}*"
                                                                        value="" type="text"
                                                                        name="name"></span></p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p><span class="wpcf7-form-control-wrap"
                                                                    data-name="email"><input size="40"
                                                                        maxlength="400"
                                                                        class="wpcf7-form-control wpcf7-email wpcf7-validates-as-required wpcf7-text wpcf7-validates-as-email"
                                                                        autocomplete="email" aria-required="true" required
                                                                        aria-invalid="false"
                                                                        placeholder="{{ convert_locale('email') }}*"
                                                                        value="" type="email"
                                                                        name="email"></span></p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p><span class="wpcf7-form-control-wrap"
                                                                    data-name="number-214"><input size="40"
                                                                        maxlength="400"
                                                                        class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required"
                                                                        aria-required="true" aria-invalid="false" required
                                                                        placeholder="{{ convert_locale('phone_number') }}*"
                                                                        value="" type="text"
                                                                        name="number-214"></span></p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p><span class="wpcf7-form-control-wrap"
                                                                    data-name="subject"><input size="40"
                                                                        maxlength="400"
                                                                        class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required"
                                                                        aria-required="true" aria-invalid="false" required
                                                                        placeholder="{{ convert_locale('subject') }}*"
                                                                        value="" type="text"
                                                                        name="subject"></span></p>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <p><span class="wpcf7-form-control-wrap" data-name="message">
                                                                    <textarea cols="40" rows="10" maxlength="2000" class="wpcf7-form-control wpcf7-textarea" required
                                                                        aria-required="true" placeholder="{{ convert_locale('message') }}*" aria-invalid="false" name="message"></textarea>
                                                                </span><br></p>
                                                            <div class="wpcf7-form-control has-spinner wpcf7-submit">
                                                                <button
                                                                    class="booking-button mt-15 cursor-pointer">{{ convert_locale('submit') }}</button>
                                                            </div><span class="wpcf7-spinner"></span>
                                                            <p></p>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="elementor-element elementor-element-b65859e e-con-full e-flex e-con e-child"
                            data-id="b65859e" data-element_type="container" style="width:40%;">
                            <div class="elementor-element elementor-element-eddb802 elementor-widget elementor-widget-renax-map h-100"
                                data-id="eddb802" data-element_type="widget" data-widget_type="renax-map.default">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3763.526042162749!2d49.8225142765233!3d40.37972385788992!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40307d9815cc39db%3A0xf08fa6e51f1595c1!2sHind%20Hospital!5e1!3m2!1str!2saz!4v1725873728893!5m2!1str!2saz"
                                    style="border:0;width:100%;height:100%;" allowfullscreen="" loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    @elseif($setting->domain == 'paradiseevents.az')
        @include('frontend.parts.breadcump', [
            'setting' => $setting,
            'title' => $title,
        ])

        <!-- CONTACT SECTION START -->
        <div class="py-[120px] xl:py-[80px] md:py-[60px]">
            <div class="container mx-auto max-w-[1200px] px-[12px] xl:max-w-full">
                <div class="grid grid-cols-2 md:grid-cols-1 gap-[60px] xl:gap-[40px] items-center">
                    <!-- left side contact infos -->
                    <div>
                        <div class="bg-etBlue p-[40px] sm:p-[30px] space-y-[24px] text-[16px]">
                            <!-- single contact info -->

                            @if (
                                !empty(settings(session()->get('setting_id'), 'setting_id')->social_media) &&
                                    isset(settings(session()->get('setting_id'), 'setting_id')->social_media['phone']) &&
                                    !empty(settings(session()->get('setting_id'), 'setting_id')->social_media['phone']))
                                <div
                                    class="flex flex-wrap items-center gap-[20px] pb-[20px] text-white border-b border-white/30 last:border-0 last:pb-0">
                                    <span
                                        class="icon shrink-0 border border-dashed border-white rounded-full h-[62px] w-[62px] flex items-center justify-center">
                                        <img src="{{ asset('frontend/events/assets/img/call-msg.svg') }}" alt="icon">
                                    </span>

                                    <div class="txt">
                                        <span class="font-light">{{ convert_locale('phone_number') }}</span>
                                        <h4 class="font-semibold text-[24px]"><a
                                                href="tel:{{ settings(session()->get('setting_id'), 'setting_id')->social_media['phone'] }}">{{ settings(session()->get('setting_id'), 'setting_id')->social_media['phone'] }}</a>
                                        </h4>
                                    </div>
                                </div>
                            @endif


                            @if (
                                !empty(settings(session()->get('setting_id'), 'setting_id')->social_media) &&
                                    isset(settings(session()->get('setting_id'), 'setting_id')->social_media['email']) &&
                                    !empty(settings(session()->get('setting_id'), 'setting_id')->social_media['email']))
                                <div
                                    class="flex flex-wrap items-center gap-[20px] pb-[20px] text-white border-b border-white/30 last:border-0 last:pb-0">
                                    <span
                                        class="icon shrink-0 border border-dashed border-white rounded-full h-[62px] w-[62px] flex items-center justify-center">
                                        <img src="{{ asset('frontend/events/assets/img/mail.svg') }}" alt="icon">
                                    </span>

                                    <div class="txt">
                                        <span class="font-light">{{ convert_locale('email') }}</span>
                                        <h4 class="font-semibold text-[24px]"><a
                                                href="mailto:{{ settings(session()->get('setting_id'), 'setting_id')->social_media['email'] }}">{{ settings(session()->get('setting_id'), 'setting_id')->social_media['email'] }}</a>
                                        </h4>
                                    </div>
                                </div>
                            @endif

                            @if (
                                !empty(settings(session()->get('setting_id'), 'setting_id')->address) &&
                                    isset(settings(session()->get('setting_id'), 'setting_id')->address[app()->getLocale() . '_address']) &&
                                    !empty(settings(session()->get('setting_id'), 'setting_id')->address[app()->getLocale() . '_address']))
                                <div
                                    class="flex flex-wrap items-center gap-[20px] pb-[20px] text-white border-b border-white/30 last:border-0 last:pb-0">
                                    <span
                                        class="icon shrink-0 border border-dashed border-white rounded-full h-[62px] w-[62px] flex items-center justify-center">
                                        <img src="{{ asset('frontend/events/assets/img/location-dot-circle.svg') }}"
                                            alt="icon">
                                    </span>

                                    <div class="txt">
                                        <span class="font-light">{{ convert_locale('address') }}</span>
                                        <h4 class="font-semibold text-[18px]">
                                            {{ settings(session()->get('setting_id'), 'setting_id')->address[app()->getLocale() . '_address'] }}
                                        </h4>
                                    </div>
                                </div>
                            @endif

                        </div>

                        <!-- video cover -->
                        {{-- <div class="relative">
                            <img src="assets/img/contact-video-cover.jpg" alt="video cover" class="w-full">
                            <a href="https://youtu.be/6KmuL6RcdNA?si=s1RJZZwk6XcqZAwX" data-fslightbox
                                class="video-btn-shadow w-[58px] aspect-square rounded-full bg-white text-[18px] text-etBlue flex items-center justify-center absolute top-[50%] left-[50%] -translate-y-[50%] -translate-x-[50%]">
                                <i class="fa-solid fa-play"></i>
                            </a>
                        </div> --}}
                    </div>

                    <!-- right side contact form -->
                    <div>
                        <h2
                            class="text-[40px] md:text-[35px] sm:text-[30px] xxs:text-[28px] font-medium text-etBlack mb-[7px]">
                            {{ convert_locale('needhelp') }}</h2>

                        <form class="grid grid-cols-2 xxs:grid-cols-1 gap-[30px] xs:gap-[20px] text-[16px]"
                            action="{{ route('frontend.contactus', ['setting_id' => $setting->id]) }}" method="post"
                            aria-label="Contact form">
                            @csrf
                            <input type="hidden" name="setting_id" value="{{ $setting->id }}" />

                            <div>
                                <label for="et-contact-name"
                                    class="font-lato font-semibold text-etBlack block mb-[12px]">{{ convert_locale('name') }}*</label>
                                <input type="text" name="name" id="et-contact-name"
                                    placeholder="{{ convert_locale('name') }}"
                                    class="border border-[#ECECEC] h-[55px] px-[20px] xs:px-[15px] rounded-[4px] w-full focus:outline-none">
                            </div>
                            <div>
                                <label for="et-contact-email"
                                    class="font-lato font-semibold text-etBlack block mb-[12px]">{{ convert_locale('email') }}</label>
                                <input type="email" name="email" id="et-contact-email"
                                    placeholder="{{ convert_locale('email') }}"
                                    class="border border-[#ECECEC] h-[55px] px-[20px] xs:px-[15px] rounded-[4px] w-full focus:outline-none">
                            </div>
                            <div class="col-span-2 xxs:col-span-1">
                                <label for="et-contact-message"
                                    class="font-lato font-semibold text-etBlack block mb-[12px]">{{ convert_locale('message') }}*</label>
                                <textarea name="message" id="et-contact-message" placeholder="{{ convert_locale('message') }}"
                                    class="border border-[#ECECEC] h-[145px] p-[20px] rounded-[4px] w-full focus:outline-none"></textarea>
                            </div>
                            <div>
                                <button type="submit"
                                    class="bg-etBlue h-[55px] px-[24px] rounded-[10px] text-[16px] font-medium text-white hover:bg-etBlack">{{ convert_locale('submit') }}
                                    <span class="icon pl-[10px]"><i
                                            class="fa-solid fa-arrow-right-long"></i></span></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- CONTACT SECTION END -->

    @endif

@endsection
