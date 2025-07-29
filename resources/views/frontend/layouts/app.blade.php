<!Doctype html>
<html lang="{{ app()->getLocale() }}-{{ strtoupper(app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1" />
    <link rel="profile" href="https://gmpg.org/xfn/11" />
    <meta name="format-detection" content="telephone=no">
    <title>@yield('title')@if($setting && isset($setting->name[app()->getLocale() . '_name'])) | {{ $setting->name[app()->getLocale() . '_name'] }}@endif</title>
    <meta name="robots" content="max-image-preview:large" />
    <link rel="dns-prefetch" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="canonical" href="{{ url()->current() }}" />
    <link rel="shortlink" href="{{ url()->current() }}" />
    <meta name="generator" content="Globalmart Group" />
    <meta name="author" content="Globalmart Group" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    @include('frontend.layouts.headerscripts', ['setting' => $setting])
    @stack('css')
</head>

<body
    @if ($setting && $setting->domain == env('APP_DOMAIN')) class="@yield('bodyclass','')"
    @elseif($setting && $setting->domain == 'chinamotorsaz.com') id="body" class="@yield('bodyclass','page-template-default page page-id-656 wp-embed-responsive theme-renax woocommerce-no-js version-light renax-v-1.1.1 rn-empty-preloader-ac-color rn-empty-progress-bar-color rn-empty-social-border-color rn-empty-menu-active-color rn-empty-footer-li-color rn-empty-footer-a-color elementor-default elementor-kit-7 elementor-page elementor-page-656')"
    @elseif($setting && $setting->domain == 'paradiseevents.az')
        class="paradise_body" @endif>

    @include('frontend.layouts.header', ['setting' => $setting])
    @yield('content')

    @include('frontend.layouts.footer', ['setting' => $setting])
    @include('frontend.layouts.footerscripts', ['setting' => $setting])

    @if ($setting && $setting->domain == env('APP_DOMAIN'))
        <!-- Bagira AI Voice Assistant Elements -->
        <button id="vapi-button" aria-label="Start voice assistant">
          <span class="vapi-btn-label">AI consultant<br>24/7</span>
          <i class="fas fa-phone-slash vapi-icon"></i>
        </button>

        <div id="bagiraFormModal" class="modal-overlay" role="dialog" aria-modal="true">
          <div class="modal-content">
            <div class="modal-header-title">Confirm your booking</div>
            <form id="bagiraForm">
              <input type="hidden" id="callIdInput" name="callId">
              <input type="text"  id="nameInput"  name="name"  required placeholder="Name">
              <input type="tel"   id="phoneInput" name="phone" required placeholder="Phone (+xxx)">
              <input type="email" id="emailInput" name="email" required placeholder="you@example.com">
              <button type="submit" id="bagiraSubmitBtn" disabled>Submit</button>
            </form>
          </div>
        </div>
    @endif

    @stack('js')
</body>

</html>
