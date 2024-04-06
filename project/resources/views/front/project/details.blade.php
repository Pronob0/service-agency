@extends(theme() . '.layout')

@section('content')
    <!-- breadcrumb-area -->
    <section class="breadcrumb-area breadcrumb-bg" data-background="{{ getPhoto($gs->breadcumb) }}">
        <div class="breadcrumb-shape" data-background="{{ asset('assets/shape/breadcrumb_shape.png') }}"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-content">
                        <h2 class="title">@lang('Project Details')</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('front.index') }}">@lang('Home')</a></li>
                                <li class="breadcrumb-item active" aria-current="page">@lang('Project Details')</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb-area-end -->

    <!-- project-details-area -->
    <section class="project-details-area pt-120 pb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="project-details-wrap">
                        <div class="project-details-thumb services-details-thumb">
                            <img class="w-100" src="{{ getPhoto($project->photo) }}" alt="">
                        </div>
                        <div class="project-details-content">
                            <h2 class="title">{{ $project->title }}</h2>
                            <p class="info-one"> @php
                                echo $project->details
                            @endphp</p>
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <aside class="project-sidebar">
                        <div class="project-widget">
                            <h4 class="widget-title">@lang('Project Details')</h4>
                            <div class="project-info-list">
                                <ul class="list-wrap">
                                    <li><span>@lang('Start Date') :</span> {{ dateFormat($project->date) }}</li>
                                    <li><span>@lang('End Date') :</span> {{ dateFormat($project->end_date) }}</li>
                                    <li><span>@lang('Clients') :</span> {{ $project->client }}</li>
                                    <li><span>@lang('Website') :</span> {{ $project->website }}</li>
                                    <li><span>@lang('Category') :</span> {{ $project->category->name }}</li>
                                </ul>
                            </div>
                        </div>
                        <div class="project-widget">
                            <h4 class="widget-title">@lang('Need Your Help?')</h4>
                            <div class="project-contact">
                                <ul class="list-wrap">
                                    <li><i class="fas fa-phone-alt"></i>{{ $project->phone }}</li>
                                    <li><i class="fas fa-envelope"></i>{{ $project->email }}</li>
                                    <li><i class="fas fa-map-marker-alt"></i>{{ $project->address }}</li>
                                    <div class="list d-flex mt-3">
                                        @if ($project->facebook)
                                            <li><a href="{{ $project->facebook }}"><i class="fab fa-facebook-f"></i></a></li>
                                        @endif
                                        @if ($project->twitter)
                                            <li><a href="{{ $project->twitter }}"><i class="fab fa-twitter"></i></a></li>
                                        @endif
                                        @if ($project->linkedin)
                                            <li><a href="{{ $project->linkedin }}"><i class="fab fa-linkedin-in"></i></a></li>
                                        @endif
                                        @if ($project->instagram)
                                            <li><a href="{{ $project->instagram }}"><i class="fab fa-instagram"></i></a></li>
                                        @endif

                                    </div>
                                </ul>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>
    <!-- project-details-area-end -->
@endsection
