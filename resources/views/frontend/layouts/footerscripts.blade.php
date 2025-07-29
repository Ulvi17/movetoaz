@if ($setting && $setting->domain == env('APP_DOMAIN'))
    <!-- Jquery Library File -->
    <script src="{{ asset('movetoaz/js/jquery-3.7.1.min.js') }}"></script>
    <!-- Bootstrap js file -->
    <script src="{{ asset('movetoaz/js/bootstrap.min.js') }}"></script>
    <!-- Validator js file -->
    <script src="{{ asset('movetoaz/js/validator.min.js') }}"></script>
    <!-- SlickNav js file -->
    <script src="{{ asset('movetoaz/js/jquery.slicknav.js') }}"></script>
    <!-- Swiper js file -->
    <script src="{{ asset('movetoaz/js/swiper-bundle.min.js') }}"></script>
    <!-- Counter js file -->
    <script src="{{ asset('movetoaz/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('movetoaz/js/jquery.counterup.min.js') }}"></script>
    <!-- Magnific js file -->
    <script src="{{ asset('movetoaz/js/jquery.magnific-popup.min.js') }}"></script>
    <!-- SmoothScroll -->
    <script src="{{ asset('movetoaz/js/SmoothScroll.js') }}"></script>
    <!-- Parallax js -->
    <script src="{{ asset('movetoaz/js/parallaxie.js') }}"></script>
    <!-- MagicCursor js file -->
    <script src="{{ asset('movetoaz/js/gsap.min.js') }}"></script>
    <script src="{{ asset('movetoaz/js/magiccursor.js') }}"></script>
    <!-- Text Effect js file -->
    <script src="{{ asset('movetoaz/js/SplitText.js') }}"></script>
    <script src="{{ asset('movetoaz/js/ScrollTrigger.min.js') }}"></script>
    <!-- YTPlayer js File -->
    <script src="{{ asset('movetoaz/js/jquery.mb.YTPlayer.min.js') }}"></script>
    <!-- Wow js file -->
    <script src="{{ asset('movetoaz/js/wow.min.js') }}"></script>
    <!-- Main Custom js file -->
    <script src="{{ asset('movetoaz/js/function.js') }}"></script>

    <!-- Bagira AI Voice Assistant JavaScript -->
    <script type="module">
      import Vapi from "https://esm.sh/@vapi-ai/web";
      import { createClient } from "https://cdn.jsdelivr.net/npm/@supabase/supabase-js/+esm";

      /* ---------- config ---------- */
      const VAPI_PUBLIC_KEY = "58f89212-0e94-4123-8f9e-3bc0dde56fe0";
      const ASSISTANT_ID    = "e679e228-ba48-47d6-a2f9-e1c5683b7ed3";
      const SUPABASE_URL    = "https://wirwojaiknnvtpzaxzjv.supabase.co";
      const SUPABASE_ANON   = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6IndpcndvamFpa25udnRwemF4emp2Iiwicm9sZSI6ImFub24iLCJpYXQiOjE3NTA5NjE3ODcsImV4cCI6MjA2NjUzNzc4N30.XyhklppW2bvJQ7qFv4SWaDaGK_M_YoGFAiOIFo2tW1c";
      const CHANNEL         = "bagheera:new-call";
      const TRIGGER_PHRASE  = "please type your phone number below to confirm.";
      const FORM_ENDPOINT   = "https://primary-w2wb-edtechstudio.up.railway.app/webhook/toolCallmovetoaz";

      /* ---------- DOM ---------- */
      const btn         = document.getElementById('vapi-button');
      const label       = btn.querySelector('.vapi-btn-label');
      const icon        = btn.querySelector('.vapi-icon');
      const modal       = document.getElementById('bagiraFormModal');
      const form        = document.getElementById('bagiraForm');
      const callIdInput = document.getElementById('callIdInput');
      const submitBtn   = document.getElementById('bagiraSubmitBtn');

      const vapi = new Vapi(VAPI_PUBLIC_KEY);
      const sb   = createClient(SUPABASE_URL, SUPABASE_ANON);

      /* ---------- helpers ---------- */
      const openModal  = () => { modal.style.display = 'flex'; monitorSubmitState(); };
      const closeModal = () => { modal.style.display = 'none'; };
      const setBtnState = (state) => {
        btn.classList.toggle('loading', state==='loading');
        btn.classList.toggle('active',  state==='active');
        btn.style.animationPlayState = (state==='active' || state==='loading') ? 'paused' : 'running';
        icon.style.opacity   = state==='active' ? 1 : 0;
        icon.style.transform = state==='active' ? 'scale(1)' : 'scale(0)';
        label.style.display  = state==='active' ? 'none' : 'inline';
      };
      const monitorSubmitState = () => { submitBtn.disabled = !callIdInput.value; };

      /* ---------- Supabase Realtime ---------- */
      sb.channel(CHANNEL)
        .on('broadcast', { event: 'call-created' }, ({ payload }) => {
          callIdInput.value = payload.callId; monitorSubmitState();
          console.log('🔔 callId via RT:', payload.callId);
        })
        .subscribe(s => { if (s==='SUBSCRIBED') console.log('✅ Supabase listener active'); });

      /* ---------- Vapi events ---------- */
      vapi.on('call-start', (call) => {
        setBtnState('active');
        if (call && (call.id || call.callId)) { callIdInput.value = call.id || call.callId; monitorSubmitState(); }
      });
      vapi.on('call-end', () => setBtnState('idle'));
      vapi.on('error',    () => setBtnState('idle'));

      vapi.on('message', (msg) => {
        if (msg.type==='transcript' && msg.role==='assistant' && msg.transcriptType==='final' && msg.transcript?.toLowerCase().includes(TRIGGER_PHRASE)) {
          openModal();
        }
      });

      /* ---------- Button click ---------- */
      btn.addEventListener('click', () => {
        if (btn.classList.contains('loading')) return; // ignore double-clicks
        if (btn.classList.contains('active')) { setBtnState('loading'); vapi.stop(); return; }
        setBtnState('loading');
        vapi.start(ASSISTANT_ID).catch((err) => { console.error(err); setBtnState('idle'); });
      });

      /* ---------- Form submit ---------- */
      form.addEventListener('submit', async (e) => {
        e.preventDefault();
        if (!callIdInput.value) { alert('Call ID not captured. Please try again.'); return; }
        submitBtn.disabled = true; submitBtn.textContent = 'Sending…';
        try {
          await fetch(FORM_ENDPOINT, { method:'POST', body:new FormData(form), mode:'no-cors' });
          alert('Thank you! We have received your info.'); form.reset(); callIdInput.value=''; closeModal();
        } catch (err) {
          console.error('Submit error', err); alert('Sending failed. Please try again later.');
        } finally {
          submitBtn.textContent='Submit'; monitorSubmitState();
        }
      });

      /* Close modal on outside click */
      window.addEventListener('click', (e) => { if (e.target===modal) closeModal(); });
    </script>
@elseif($setting && $setting->domain == 'chinamotorsaz.com')
    <script>
        (function() {
            function maybePrefixUrlField() {
                const value = this.value.trim()
                if (value !== '' && value.indexOf('http') !== 0) {
                    this.value = 'http://' + value
                }
            }
            const urlFields = document.querySelectorAll('.mc4wp-form input[type="url"]')
            for (let j = 0; j < urlFields.length; j++) {
                urlFields[j].addEventListener('blur', maybePrefixUrlField)
            }
        })();
    </script>
    <script>
        const lazyloadRunObserver = () => {
            const lazyloadBackgrounds = document.querySelectorAll(`.e-con.e-parent:not(.e-lazyloaded)`);
            const lazyloadBackgroundObserver = new IntersectionObserver((entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        let lazyloadBackground = entry.target;
                        if (lazyloadBackground) {
                            lazyloadBackground.classList.add('e-lazyloaded');
                        }
                        lazyloadBackgroundObserver.unobserve(entry.target);
                    }
                });
            }, {
                rootMargin: '200px 0px 200px 0px'
            });
            lazyloadBackgrounds.forEach((lazyloadBackground) => {
                lazyloadBackgroundObserver.observe(lazyloadBackground);
            });
        };
        const events = [
            'DOMContentLoaded',
            'elementor/lazyload/observe',
        ];
        events.forEach((event) => {
            document.addEventListener(event, lazyloadRunObserver);
        });
    </script>
    <script>
        (function() {
            var c = document.body.className;
            c = c.replace(/woocommerce-no-js/, 'woocommerce-js');
            document.body.className = c;
        })();
    </script>

    <script src="{{ asset('frontend/cars/wp-content/cache/minify/1/f7c00.js') }}"></script>
    <script id="{{ asset('frontend/cars/wp-i18n-js-after') }}">
        wp.i18n.setLocaleData({
            'text direction\u0004ltr': ['ltr']
        });
    </script>
    <script src="{{ asset('frontend/cars/wp-content/cache/minify/1/7cdc6.js') }}"></script>

    <script src="{{ asset('frontend/cars/wp-content/cache/minify/1/dd5cb.js') }}"></script>
    <script id="wc-order-attribution-js-extra">
        var wc_order_attribution = {
            "params": {
                "lifetime": 1.0000000000000000818030539140313095458623138256371021270751953125e-5,
                "session": 30,
                "base64": false,
                "ajaxurl": "https:\/\/webredox.net\/demo\/wp\/renax\/wp-admin\/admin-ajax.php",
                "prefix": "wc_order_attribution_",
                "allowTracking": true
            },
            "fields": {
                "source_type": "current.typ",
                "referrer": "current_add.rf",
                "utm_campaign": "current.cmp",
                "utm_source": "current.src",
                "utm_medium": "current.mdm",
                "utm_content": "current.cnt",
                "utm_id": "current.id",
                "utm_term": "current.trm",
                "utm_source_platform": "current.plt",
                "utm_creative_format": "current.fmt",
                "utm_marketing_tactic": "current.tct",
                "session_entry": "current_add.ep",
                "session_start_time": "current_add.fd",
                "session_pages": "session.pgs",
                "session_count": "udata.vst",
                "user_agent": "udata.uag"
            }
        };
    </script>
    <script defer src="{{ asset('frontend/cars/wp-content/cache/minify/1/9f0b8.js') }}"></script>
    <script src="{{ asset('backend/assets/js/minified.js') }}"></script>
    <script src="{{ asset('backend/assets/js/minified1.js') }}"></script>
    <script src="{{ asset('backend/assets/js/minified2.js') }}"></script>
    <script src="{{ asset('backend/assets/js/minified3.js') }}"></script>
    <script src="{{ asset('backend/assets/js/minified4.js') }}"></script>
    <script src="{{ asset('backend/assets/js/minified5.js') }}"></script>
    <script src="{{ asset('backend/assets/js/minified6.js') }}"></script>
    <script id="elementor-frontend-js-before">
        /*<![CDATA[*/
        var elementorFrontendConfig = {
            "environmentMode": {
                "edit": false,
                "wpPreview": false,
                "isScriptDebug": false
            },
            "i18n": {
                "shareOnFacebook": "Share on Facebook",
                "shareOnTwitter": "Share on Twitter",
                "pinIt": "Pin it",
                "download": "Download",
                "downloadImage": "Download image",
                "fullscreen": "Fullscreen",
                "zoom": "Zoom",
                "share": "Share",
                "playVideo": "Play Video",
                "previous": "Previous",
                "next": "Next",
                "close": "Close",
                "a11yCarouselWrapperAriaLabel": "Carousel | Horizontal scrolling: Arrow Left & Right",
                "a11yCarouselPrevSlideMessage": "Previous slide",
                "a11yCarouselNextSlideMessage": "Next slide",
                "a11yCarouselFirstSlideMessage": "This is the first slide",
                "a11yCarouselLastSlideMessage": "This is the last slide",
                "a11yCarouselPaginationBulletMessage": "Go to slide"
            },
            "is_rtl": false,
            "breakpoints": {
                "xs": 0,
                "sm": 480,
                "md": 768,
                "lg": 1025,
                "xl": 1440,
                "xxl": 1600
            },
            "responsive": {
                "breakpoints": {
                    "mobile": {
                        "label": "Mobile Portrait",
                        "value": 767,
                        "default_value": 767,
                        "direction": "max",
                        "is_enabled": true
                    },
                    "mobile_extra": {
                        "label": "Mobile Landscape",
                        "value": 880,
                        "default_value": 880,
                        "direction": "max",
                        "is_enabled": false
                    },
                    "tablet": {
                        "label": "Tablet Portrait",
                        "value": 1024,
                        "default_value": 1024,
                        "direction": "max",
                        "is_enabled": true
                    },
                    "tablet_extra": {
                        "label": "Tablet Landscape",
                        "value": 1200,
                        "default_value": 1200,
                        "direction": "max",
                        "is_enabled": false
                    },
                    "laptop": {
                        "label": "Laptop",
                        "value": 1366,
                        "default_value": 1366,
                        "direction": "max",
                        "is_enabled": false
                    },
                    "widescreen": {
                        "label": "Widescreen",
                        "value": 2400,
                        "default_value": 2400,
                        "direction": "min",
                        "is_enabled": false
                    }
                }
            },
            "version": "3.23.4",
            "is_static": false,
            "experimentalFeatures": {
                "e_optimized_css_loading": true,
                "additional_custom_breakpoints": true,
                "container": true,
                "container_grid": true,
                "e_swiper_latest": true,
                "e_nested_atomic_repeaters": true,
                "e_onboarding": true,
                "home_screen": true,
                "ai-layout": true,
                "landing-pages": true,
                "e_lazyload": true
            },
            "urls": {
                "assets": "https:\/\/webredox.net\/demo\/wp\/renax\/wp-content\/plugins\/elementor\/assets\/",
                "ajaxurl": "https:\/\/webredox.net\/demo\/wp\/renax\/wp-admin\/admin-ajax.php"
            },
            "nonces": {
                "floatingButtonsClickTracking": "31e0c17558"
            },
            "swiperClass": "swiper",
            "settings": {
                "page": [],
                "editorPreferences": []
            },
            "kit": {
                "active_breakpoints": ["viewport_mobile", "viewport_tablet"],
                "lightbox_enable_counter": "yes",
                "lightbox_enable_fullscreen": "yes",
                "lightbox_enable_zoom": "yes",
                "lightbox_enable_share": "yes",
                "lightbox_title_src": "title",
                "lightbox_description_src": "description"
            },
            "post": {
                "id": 656,
                "title": "Home%20Video%20%E2%80%93%20Renax",
                "excerpt": "",
                "featuredImage": false
            }
        }; /*]]>*/
    </script>
    <script src="{{ asset('frontend/cars/wp-content/cache/minify/1/c6808.js') }}"></script>
@elseif($setting && $setting->domain == 'paradiseevents.az')
    <!-- JS FILES -->
    <script src="{{ asset('frontend/events/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/events/assets/vendor/splide/splide.min.js') }}"></script>
    <script src="{{ asset('frontend/events/assets/vendor/slim-select/slimselect.min.js') }}"></script>
    <script src="{{ asset('frontend/events/assets/vendor/fslightbox/fslightbox.js') }}"></script>
    <script src="{{ asset('frontend/events/assets/vendor/splide/splide-extension-auto-scroll.min.js') }}"></script>
    <script src="{{ asset('frontend/events/assets/vendor/lenis/lenis.min.js') }}"></script>
    <script src="{{ asset('frontend/events/assets/vendor/splittype/index.min.js') }}"></script>
    <script src="{{ asset('frontend/events/assets/vendor/gsap/gsap.min.js') }}"></script>
    <script src="{{ asset('frontend/events/assets/vendor/gsap/gsap-scroll-trigger.min.js') }}"></script>
    <script src="{{ asset('frontend/events/assets/js/main.js') }}"></script>
    <script src="{{ asset('frontend/events/assets/js/countdown.js') }}"></script>
    <script>
        window.addEventListener('load', function() {
            hideLoader()
            if (document.querySelector('body').classList.contains("paradise_body"))
                document.querySelector('body').classList.remove("paradise_body")
        })
    </script>
@endif
<script src="{{ asset('frontend/globalmart/eyvaz.js') }}" type="text/javascript"></script>
