@extends(theme() . 'layout')

@section('content')
    <!-- breadcrumb-area -->
    <section class="breadcrumb-area breadcrumb-bg" data-background="{{ getPhoto($gs->breadcumb) }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-content">
                        <h2 class="title">@lang('Team Details')</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('front.index') }}">@lang('Home')</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $team->name }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb-area-end -->

    <!-- team-details-area -->
    <section class="team-details-area pt-120 pb-120">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="team-details-thumb">
                        <img src="{{ getPhoto($team->photo) }}" alt="">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="team-details-info">
                        <div class="info-content-top">
                            <h3 class="title">{{ $team->name }}</h3>
                            <span>{{ $team->designation }}</span>
                        </div>
                        <ul class="list-wrap team-info">
                            @if ($team->website)
                            <li><span><i class="fas fa-globe"></i>@lang('Website'):</span>{{ $team->website }}</li>
                            @endif
                            <li><span><i class="fas fa-envelope"></i>@lang('E-mail'):</span>{{ $team->email }}</li>
                            <li><span><i class="fas fa-phone-alt"></i>@lang('Phone'):</span>{{ $team->phone }}</li>
                            <li><span><i class="fas fa-map-marker-alt"></i>@lang('Location'):</span>{{ $team->address }}</li>
                        </ul>
                        <div class="team-details-social">
                            <h6 class="title">@lang('Follow Me'):</h6>
                            <ul class="list-wrap">
                                @if ($team->facebook)
                                <li><a href="{ $team->facebook }}"><i class="fab fa-facebook-f"></i></a></li>
                                @endif
                                @if ($team->twitter)
                                <li><a href="{{ $team->twitter }}"><i class="fab fa-twitter"></i></a></li>
                                @endif
                                @if ($team->linkedin)
                                <li><a href="{{ $team->linkedin }}"><i class="fab fa-linkedin-in"></i></a></li>
                                @endif
                                @if ($team->instagram)
                                <li><a href="{{ $team->instagram }}"><i class="fab fa-instagram"></i></a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="team-details-content">
                        <h3 class="title">@lang('Personal Experience and Skills')</h3>
                        <p class="info-one">
                            @php
                            echo $team->bio;
                            @endphp
                        </p>
                        
                        <div class="progress-wrap">
                            
                            @if ($team->progress)
                                @foreach (json_decode($team->progress) as $title => $progress)
                                <div class="progress-item">
                                    <h5 class="title">{{ $title }}</h5>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: {{ $progress }}%;" aria-valuenow="{{ $progress }}" aria-valuemin="0" aria-valuemax="100"></div>
                                        @if ($progress > 40)
                                            <span>{{ $progress }}%</span>
                                        @endif
                                    </div>
                                </div>
                                @endforeach
                            @endif
                            
                        </div>
                        
                    </div>
                </div>

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
            </div>
        </div>
    </section>
    <!-- team-details-area-end -->
@endsection
