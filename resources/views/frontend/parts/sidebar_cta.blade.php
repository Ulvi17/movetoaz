<div class="sidebar-cta-box wow fadeInUp" data-wow-delay="0.25s"
    style="visibility: visible; animation-delay: 0.25s; animation-name: fadeInUp;">
    <!-- Sidebar CTA Header Start -->
    <div class="cta-client-images">

        @foreach (teams(session()->get('setting_id'), 'setting_id') as $team)
            @if (!empty($team->image))
                <div class="cta-client-img">
                    <figure class="image-anime">
                        <img src="{{ getImageUrl($team->image, 'images') }}" height="45" width="42"
                            alt="{{ $team->name[app()->getLocale() . '_name'] }}">
                    </figure>
                </div>
            @endif
        @endforeach
    </div>
    <!-- Sidebar CTA Header End -->

    <!-- Sidebar CTA Body Start -->
    <div class="sidebar-cta-body">
        <h3>{{ convert_locale('still_have_question') }}</h3>
        <p>{!! convert_locale('we_are_help_you_to_answer_any_question') !!}</p>
    </div>
    <!-- Sidebar CTA Body End -->
    @php
        $settingId = session('setting_id');
        $settings = settings($settingId, 'setting_id');
        $social = $settings->social_media ?? [];
    @endphp

    <div class="sidebar-cta-footer">
        <ul>
            {{-- Mobil --}}
            @if (!empty($social['mobile']))
                <li>
                    <img src="{{ asset('movetoaz/images/icon-phone-accent.svg') }}" alt="">
                    <a href="tel:{{ $social['mobile'] }}">
                        {{ $social['mobile'] }}
                    </a>
                </li>
            @endif

            {{-- WhatsApp --}}
            @if (!empty($social['whatsapp']))
                <li>
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/6b/WhatsApp.svg/2044px-WhatsApp.svg.png"
                        alt="">
                    <a href="{{ $social['whatsapp'] }}">
                        +{{ explode_from_data($social['whatsapp'], '/', 3) }}
                    </a>
                </li>
            @endif

            {{-- Email --}}
            @if (!empty($social['email']))
                <li>
                    <img src="{{ asset('movetoaz/images/icon-email-accent.svg') }}" alt="">
                    <a href="mailto:{{ $social['email'] }}">
                        {{ $social['email'] }}
                    </a>
                </li>
            @endif
        </ul>
    </div>
</div>
