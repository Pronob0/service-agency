@extends(theme() . 'layout')

@section('content')
    <!-- breadcrumb-area -->
    <section class="breadcrumb-area breadcrumb-bg" data-background="{{getPhoto($gs->breadcumb)}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-content">
                        <h2 class="title">@lang('Team')</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('front.index')}}">@lang('Home')</a></li>
                                <li class="breadcrumb-item active" aria-current="page">@lang('Team')</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb-area-end -->

   <!-- team-area -->
   <section class="team-area pt-115 pb-90">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title text-center mb-60">
                    <span class="sub-title">@lang('Professional Team')</span>
                    <h2 class="title">@lang('Professional Team Member')</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            @foreach ($teams as $team)
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-10">
                <div class="team-item">
                    <div class="team-thumb">
                        <a href="{{route('front.team.details',$team->slug)}}"><img src="{{getPhoto($team->photo)}}" alt=""></a>
                        <div class="team-social">
                            <ul class="list-wrap">
                                @if ($team->facebook)
                                    <li><a href="{{ $team->facebook }}"><i class="fab fa-facebook-f"></i></a></li>
                                @endif
                                @if ($team->twitter)
                                    <li><a href="{{ $team->twitter }}"><i class="fab fa-linkedin-in"></i></a></li>
                                @endif
                                @if ($team->linkedin)
                                    <li><a href="{{ $team->linkedin }}"><i class="fab fa-twitter"></i></a></li>
                                @endif
                                @if ($team->instagram)
                                    <li><a href="{{ $team->instagram }}"><i class="fab fa-instagram"></i></a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                    <div class="team-content">
                        <h2 class="title"><a href="{{route('front.team.details',$team->slug)}}">{{$team->name}}</a></h2>
                        <span>{{$team->designation}}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- team-area-end -->
@endsection
