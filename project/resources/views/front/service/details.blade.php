@extends(theme() . '.layout')

@section('content')
    <!-- breadcrumb-area -->
    <!-- breadcrumb-area -->
    <section class="breadcrumb-area breadcrumb-bg" data-background="{{ getPhoto($gs->breadcumb) }}">
        <div class="breadcrumb-shape" data-background="{{ asset('assets/shape/breadcrumb_shape.png') }}"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-content">
                        <h2 class="title">@lang('Service Details')</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('front.index') }}">@lang('Home')</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $service->title }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb-area-end -->
    <!-- services-details-area -->
    <section class="services-details-area pt-120 pb-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8">
                    <div class="services-details-wrap">
                        <div class="services-details-thumb">
                        <img class="w-100" src="{{ getPhoto($service->photo) }}" alt="">
                    </div>
                    <div class="services-details-content">
                        <h2 class="title">{{ $service->title }}</h2>
                        <p> @php
                            echo  $service->description 
                        @endphp</p>
                        <div class="services-process-wrap">
                            <div class="row justify-content-center">
                                <div class="col-lg-6 col-md-8">
                                    <div class="services-process-img">
                                        <img src="{{ getPhoto($service->service_quality_photo) }}" alt="">
                                        <img src="{{ getPhoto($service->service_quality_before_photo) }}" alt="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="benefits-content">
                                        <h2 class="title">@lang('Our Service Benefits')</h2>
                                        <p>{{ $service->sort_text }}</p>
                                        <ul class="list-wrap">
                                            @php
                                                $attribute = explode(',', $service->attribute);
                                            @endphp
                                            @foreach ($attribute as $item)
                                            <li><i class="fas fa-check-circle"></i>{{ $item }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                <div class="col-xl-4 col-lg-6">
                    <aside class="services-sidebar">
                        <div class="services-widget">
                            <h4 class="widget-title">@lang('Our All Service')</h4>
                            <div class="our-services-list">
                                <ul class="list-wrap">
                                    @foreach ($services as $sservice)
                                    <li><a href="{{ route('front.service.details', $sservice->slug) }}">{{ $sservice->title }}<i class="fas fa-arrow-right"></i></a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="services-widget widget-bg" data-background="assets/img/services/sw_bg.jpg">
                            <h4 class="widget-title">@lang('Get a free quote')</h4>
                            <form action="{{ route('front.gettuch.submit') }}" method="POST" class="sidebar-form">
                                @csrf
                                <div class="form-grp">
                                    <input id="name" type="text" name="name" placeholder="{{ __('Your Name') }}" required>
                                </div>
                                <div class="form-grp">
                                    <input id="email" type="email" name="email" placeholder="{{ __('Your Email Address') }}" required>
                                </div>
                                <div class="form-grp">
                                    <input id="phone" type="text" name="phone" placeholder="{{ __('Your Phone') }}" required>
                                    
                                </div>
                                <div class="form-grp">
                                    <textarea id="message" name="message" placeholder="{{ __('Your Message') }}"></textarea>
                                </div>
                                <input type="hidden" name="service_id" value="{{ $service->id }}">
                                <button type="submit" class="btn btn-two">@lang('Contact Us')</button>
                            </form>
                        </div>
                        <div class="services-widget">
                            <h4 class="widget-title">@lang('Our Service FAQs')</h4>
                            <div class="our-services-list">
                                @if ($service->faqs->count() > 0)
                                    <div class="services-process-content">
                                        <div class="accordion" id="accordionExample">
                                            @foreach ($service->faqs as $faq)
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="heading{{ $loop->index }}">
                                                        <button class="accordion-button {{ $loop->first ? '' : 'collapsed' }}" type="button"
                                                            data-bs-toggle="collapse"
                                                            data-bs-target="#collapse{{ $loop->index }}" aria-expanded="true"
                                                            aria-controls="collapse{{ $loop->index }}">
                                                            {{ $faq->title }}
                                                        </button>
                                                    </h2>
                                                    <div id="collapse{{ $loop->index }}"
                                                        class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}"
                                                        aria-labelledby="heading{{ $loop->index }}"
                                                        data-bs-parent="#accordionExample">
                                                        <div class="accordion-body">
                                                            <p>
                                                                {{ $faq->content }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>
    <!-- services-details-area-end -->
    <!-- brand-area -->
    <div class="inner-brand-area inner-brand-two pb-120">
        <div class="container">
            <div class="row brand-active-three">
                @foreach ($brands as $item)
                    <div class="col-12">
                        <div class="brand-item">
                            <img src="{{ getPhoto($item->photo) }}" alt="">
                        </div>
                    </div>    
                @endforeach
            </div>
        </div>
    </div>
    <!-- brand-area-end -->
    <!-- services-details-area-end -->
@endsection
