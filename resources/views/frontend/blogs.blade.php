@extends('frontend.layouts.app')
@section('title', $title)
@section('content')
    @if ($setting->domain == env('APP_DOMAIN'))
        @include('frontend.parts.breadcump', ['setting' => $setting, 'title' => $title])
        <div class="page-blog">
            <div class="container">
                <div class="row">

                    @foreach ($data as $blog)
                        <div class="col-lg-4 col-md-6">
                            <!-- Post Item Start -->
                            <div class="post-item wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                                @if (!empty($blog->images))
                                    <!-- Post Featured Image Start-->
                                    <div class="post-featured-image">
                                        <a href="{{ route('frontend.show', ['page' => 'news', 'slug' => $blog->slugs[app()->getLocale() . '_slug'], 'setting_id' => session()->get('setting_id')]) }}"
                                            data-cursor-text="{{ convert_locale('more') }}">
                                            <figure class="image-anime">
                                                <img src="{{ getImageUrl($blog->images[0], 'images') }}"
                                                    alt="{{ $blog->name[app()->getLocale() . '_name'] }}">
                                            </figure>
                                        </a>
                                    </div>
                                    <!-- Post Featured Image End -->
                                @endif

                                <!-- Post Item Body Start -->
                                <div class="post-item-body">
                                    <!-- Post Item Content Start -->
                                    <div class="post-item-content">
                                        <h2><a
                                                href="{{ route('frontend.show', ['page' => 'news', 'slug' => $blog->slugs[app()->getLocale() . '_slug'], 'setting_id' => session()->get('setting_id')]) }}">{{ $blog->name[app()->getLocale() . '_name'] }}</a>
                                        </h2>
                                        <p>{!! mb_substr(strip_tags_with_whitespace($blog->description[app()->getLocale() . '_description']), 0, 100) !!}</p>
                                    </div>
                                    <!-- Post Item Content End -->

                                    <!-- Post Item Button Start-->
                                    <div class="post-item-btn">
                                        <a href="{{ route('frontend.show', ['page' => 'news', 'slug' => $blog->slugs[app()->getLocale() . '_slug'], 'setting_id' => session()->get('setting_id')]) }}"
                                            class="readmore-btn">{{ convert_locale('more') }} <img
                                                src="{{ getImageUrl('movetoaz/images/arrow-primary.svg') }}"
                                                alt=""></a>
                                    </div>
                                    <!-- Post Item Button End-->
                                </div>
                                <!-- Post Item Body End -->
                            </div>
                            <!-- Post Item End -->
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    @elseif($setting->domain == 'chinamotorsaz.com')
        @include('frontend.parts.breadcump', ['setting' => $setting, 'title' => $title])
        {{-- <section class="" data-scroll-index=1>
            <div class=container>
                <div class=row>
                    <div class="col-md-12 post-content"> --}}
        @if (!empty($data) && count($data) > 0)
            {{-- Blogs --}}

            <div class="elementor-element elementor-element-d8931ea e-flex e-con-boxed e-con e-parent" data-id=d8931ea
                data-element_type=container>
                <div class=e-con-inner>
                    <div class="elementor-element elementor-element-6170409 elementor-widget elementor-widget-renax-blog-grid"
                        data-id=6170409 data-element_type=widget data-widget_type=renax-blog-grid.default>
                        <div class=elementor-widget-container>
                            <div class=blog1>
                                <div class=container-after>
                                    <div class="row isotope-items-wrap-post  no-hide-last loadmore-wrapper-post "
                                        data-load-item=6 data-button-text="Load More">
                                        @if (!empty($data) && count($data) > 0)
                                            @foreach ($data as $key => $blog)
                                                <div class=" isotope-item col-lg-4  col-md-6 cars ">
                                                    <div class="item mb-45">
                                                        @if (!empty($blog->images) && isset($blog->images[0]) && !empty($blog->images[0]))
                                                            <div class="img position-re-order-blog-carousel o-hidden ">
                                                                <div class=cd-pt-ab>
                                                                    <img decoding=async
                                                                        src="{{ getImageUrl($blog->images[0], 'images') }}"
                                                                        class=rx-border-radius
                                                                        alt="{{ $blog->name[app()->getLocale() . '_name'] }}">
                                                                </div>
                                                            </div>
                                                        @endif
                                                        <div class="wrapper ">
                                                            <div class=date> <a
                                                                    href="{{ route('frontend.show', ['slug' => $blog->slugs[app()->getLocale() . '_slug'], 'page' => 'news']) }}">{{ $blog->created_at->format('d.m.Y') }}</a>
                                                            </div>
                                                            <div class=con>
                                                                <div class=category>
                                                                    @if (isset($blog->category_id) && !empty($blog->category_id))
                                                                        <a class="fa fa-folder"
                                                                            href="{{ route('frontend.show', ['slug' => $blog->slugs[app()->getLocale() . '_slug'], 'page' => 'news']) }}">
                                                                            {{ $blog->category->name[app()->getLocale() . '_name'] }}
                                                                        </a>
                                                                    @endif
                                                                </div>
                                                                <div class=text> <a
                                                                        href="{{ route('frontend.show', ['slug' => $blog->slugs[app()->getLocale() . '_slug'], 'page' => 'news']) }}">{{ $blog->name[app()->getLocale() . '_name'] }}</a>
                                                                </div> <a
                                                                    href="{{ route('frontend.show', ['slug' => $blog->slugs[app()->getLocale() . '_slug'], 'page' => 'news']) }}"
                                                                    class=icon-btn><i class="fa fa-arrow-right"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <p class="text-center text-danger">{{ convert_locale("notfound") }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Blogs --}}
        @else
            <p class="text-center text-danger">{{ convert_locale("notfound") }}</p>
        @endif
        {{--     </div>
                </div>
            </div>
        </section> --}}

        </div>
        </section>
    @elseif($setting->domain == 'paradiseevents.az')
    @endif
@endsection
