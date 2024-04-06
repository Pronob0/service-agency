@extends(theme() . '.layout')
@section('content')
    <!-- breadcrumb-area -->
    <section class="breadcrumb-area breadcrumb-bg" data-background="{{ getPhoto($gs->breadcumb) }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-content">
                        <h2 class="title">{{__('All Services')}}</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('front.index')}}">{{__('Home')}}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{__('All Services')}}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb-area-end -->

    <!-- services-area -->
    <section class="inner-services-area pt-115 pb-90">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section-title text-center mb-50">
                        <span class="sub-title">@lang('What We Do')</span>
                        <h2 class="title">@lang('Our Services Areas')</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                @forelse ($services as $service)
                <div class="col-lg-4 col-md-6 col-sm-10">
                    <div class="services-item wow fadeInUp" data-wow-delay=".2s" data-background="{{ getPhoto($service->photo) }}">
                        <div class="services-icon" style="background: none;">
                            <img src="{{ getPhoto($service->feature_icon) }}" alt="">
                        </div>
                        <div class="services-content">
                            <h2 class="title"><a href="{{ route('front.service.details', $service->slug) }}">{{ $service->title }}</a></h2>
                            <h2 class="number">0{{ $loop->iteration }}</h2>
                        </div>
                        <div class="services-overlay-content">
                            <h2 class="title"><a href="{{ route('front.service.details', $service->slug) }}">{{ $service->title }}</a></h2>
                            <p>
                                @php
                                    echo $service->sort_text;
                                @endphp
                            </p>
                            <a href="{{ route('front.service.details', $service->slug) }}" class="read-more">@lang('Read More') <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                @empty
                        <div class="col-lg-12 border p-3">
                            <div class="text-center">
                                <h2 class="title">@lang('No Service Found')</h2>
                            </div>
                        </div>
                @endforelse
                
            </div>
        </div>
    </section>
    <!-- services-area-end -->
@endsection
