@extends(theme() . '.layout')


@section('content')
    <!-- breadcrumb-area -->
    <section class="breadcrumb-area breadcrumb-bg" data-background="{{getPhoto($gs->breadcumb)}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-content">
                        <h2 class="title">@lang('Projects List')</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('front.index')}}">@lang('Home')</a></li>
                                <li class="breadcrumb-item active" aria-current="page">@lang('Projects List')</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb-area-end -->

    <!-- project-area -->
    <section class="inner-project-area pt-115 pb-90">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title text-center mb-60">
                        <span class="sub-title">@lang('Our Projects')</span>
                        <h2 class="title">@lang('Our Latest Projects')</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                @foreach ($projects as $project)
                <div class="col-lg-4 col-md-6 col-sm-10">
                    <div class="project-item-two">
                        <div class="project-thumb-two">
                            <a href="{{ route('front.project.details', $project->slug) }}"><img src="{{ getPhoto($project->photo) }}" alt=""></a>
                        </div>
                        <div class="project-content-two">
                            <span>@lang('Product Design')</span>
                            <h2 class="title"><a href="{{ route('front.project.details', $project->slug) }}">{{ $project->title }}</a></h2>
                            <a href="{{ route('front.project.details', $project->slug) }}" class="link-btn"><i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- project-area-end -->
@endsection
