<!-- about-area -->
<section class="about-area pt-120 pb-90">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-7 col-lg-6 order-0 order-lg-2">
                <div class="about-img-wrap">
                    <img src="{{ getPhoto($about->photo) }}" alt="" class="wow fadeInRight" data-wow-delay=".4s">
                    <img src="{{ getPhoto($about->second_photo) }}" alt="" class="wow fadeInRight" data-wow-delay=".2s">
                    <div class="about-experiences-wrap">
                        <div class="experiences-item">
                            <div class="icon">
                                <img src="{{ asset('assets/icon/about1.png') }}" alt="">
                            </div>
                            <div class="content">
                                <h6 class="title">We have more than {{ $about->experience }} years of experiences</h6>
                            </div>
                        </div>
                        <div class="experiences-item">
                            <div class="icon">
                                <img src="{{ asset('assets/icon/about2.png') }}" alt="">
                            </div>
                            <div class="content">
                                <h6 class="title">@lang('We use professional and experienced person')</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-5 col-lg-6">
                <div class="about-content">
                    <div class="section-title mb-25 tg-heading-subheading animation-style3">
                        <span class="sub-title tg-element-title">{{ $about->header_title }}</span>
                        <h2 class="title tg-element-title">{{ $about->title }}</h2>
                    </div>
                    <p>
                        @php
                            echo $about->description;
                        @endphp
                    </p>
                    <div class="about-list">
                        <ul class="list-wrap">
                            @php
                                $lists = explode(',', $about->experiencelist);
                            @endphp
                            @foreach ($lists as $item)
                            <li><i class="fas fa-check"></i>{{ $item }}</li>
                            @endforeach
                            
                            
                        </ul>
                    </div>
                    <a href="{{ route('front.about') }}" class="btn">@lang('Learn More')</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- about-area-end -->