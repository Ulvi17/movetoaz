@if ($setting->domain == env('APP_DOMAIN'))
    <!-- Hero Section Start -->
    <div class="hero hero-video p-relative position-relative">
        <!-- Video Start -->
        <div class="hero-bg-video">
            <!-- Selfhosted Video Start -->
            <!-- <video autoplay muted loop id="myVideo"><source src="images/hero-bg-video.mp4" type="video/mp4"></video> -->
            <video autoplay muted loop id="myVideo">
                <source
                    src="{{ getImageUrl(sliders(session()->get('setting_id'), 'setting_id')->first()->image_or_video, 'images') }}"
                    type="video/mp4">
            </video>

            <!-- Selfhosted Video End -->

            <!-- Youtube Video Start -->
            <!-- <div id="herovideo" class="player" data-property="{videoURL:'74DWwSxsVSs',containment:'.hero-video', showControls:false, autoPlay:true, loop:true, vol:0, mute:false, startAt:0,  stopAt:296, opacity:1, addRaster:true, quality:'large', optimizeDisplay:true}"></div> -->
            <!-- Youtube Video End -->
        </div>
        <!-- Video End -->
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-11">
                    <!-- Hero Content Start -->
                    <div class="hero-content">
                        <!-- Section Title Start -->
                        <div class="section-title dark-section">
                            <h3 class="wow fadeInUp">
                                {{ sliders(session()->get('setting_id'), 'setting_id')->first()->name[app()->getLocale() . '_name'] }}
                            </h3>
                            <div class="py-5 my-5"></div>
                            {{-- <h1 class="text-anime-style-2" data-cursor="-opaque">
                                {!! sliders(session()->get('setting_id'),'setting_id')->first()->description[app()->getLocale() . '_description'] !!}
                            </h1> --}}
                        </div>
                        <!-- Section Title End -->

                        {{-- <!-- Hero Button Start -->
                        <div class="hero-btn wow fadeInUp" data-wow-delay="0.25s">
                            <a href="https://html.awaikenthemes.com/inclub/contact.html" class="btn-default">get a free
                                tour</a>
                        </div>
                        <!-- Hero Button End --> --}}
                    </div>
                    <!-- Hero Content End -->
                </div>

                <div class="col-lg-12">
                    <!-- Hero Social Media Start -->
                    <div class="hero-social-media">
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
                        </ul>
                        <h3>{{ convert_locale('follow_us') }}</h3>
                    </div>
                    <!-- Hero Social Media End -->
                </div>
            </div>
        </div>

        <div class="scrollblockslider">
            <a href="/why-do-you-need-to-invest-in-azerbaijan?page=standartpages" class="sides left_scrollblockslider">
                <span>Why Azerbaijan?</span>
            </a>
            <a href="/why-should-you-choose-us?page=standartpages" class="sides right_scrollblockslider">
                <span>Legislation of Azerbaijan</span>

            </a>
        </div>
    </div>
    <!-- Hero Section End -->



@endif
