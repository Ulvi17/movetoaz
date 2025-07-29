@extends('frontend.layouts.app')
@section('title', $title)
@section('content')
    @if ($setting->domain == env('APP_DOMAIN'))
        @include('frontend.parts.breadcump', ['title' => $title])
        <!-- Our Faq Section Start -->
        <div class="our-faqs">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <!-- Our Faq Content Start -->
                        <div class="our-faqs-content">
                           
                            <!-- FAQ Accordion Start -->
                            <div class="faq-accordion" id="accordion">
                                @foreach (faqs(session()->get('setting_id'), 'setting_id') as $key => $faq)
                                    <!-- FAQ Item Start -->
                                    <div class="accordion-item wow fadeInUp">
                                        <h2 class="accordion-header" id="heading1">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapse{{ $key }}"
                                                aria-expanded="{{ $key == 0 ? true : false }}"
                                                aria-controls="collapse{{ $key }}">
                                                {{ $faq->name[app()->getLocale() . '_name'] }}
                                            </button>
                                        </h2>
                                        <div id="collapse{{ $key }}"
                                            class="accordion-collapse collapse {{ $key == 0 ? 'show' : '' }}"
                                            aria-labelledby="heading1" data-bs-parent="#accordion">
                                            <div class="accordion-body">
                                                <p>{!! $faq->description[app()->getLocale() . '_description'] !!}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- FAQ Item End -->
                                @endforeach


                            </div>
                            <!-- FAQ Accordion End -->
                        </div>
                        <!-- Our Faq Content End -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Our Faq Section End -->

    @endif
@endsection
