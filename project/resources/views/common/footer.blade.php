<!-- Start Footer & Subscribe Section -->
<section class="footer-subscribe-wrapper">
    <!-- Start Subscribe Section -->
    <div class="subscribe-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div class="subscribe-content">
                        <h2>@lang('Sign Up Our Newsletter')</h2>
                        <p>@lang('We Offer An Informative Monthly Technology Newsletter - Check It Out.')</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">

                    <form action="{{ route('front.subscriber.submit') }}" method="POST">
                        @csrf
                        <input type="email" class="input-newsletter" name="email" placeholder="Enter Your Email" required autocomplete="off">
                        <button type="submit">@lang('Subscribe Now')</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
    <!-- End Subscribe Section -->
    <!-- Start Footer Section -->
    <div class="footer-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <a class="footer-logo" href="{{ route('front.index') }}">
                           
                            <img src="{{ getPhoto($gs->footer_logo) }}" class="white-logo" alt="logo">
                        </a>
                        <p>@lang('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco consectetur laboris.')</p>
                        <ul class="footer-social">
                            @foreach (DB::table('social_links')->get() as $social)
                            <li><a href="{{ $social->link }}"><i class="{{ $social->icon }}"></i></a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <div class="footer-heading">
                            <h3>@lang('Our Services')</h3>
                        </div>
                        <ul class="footer-quick-links">
                            @foreach (DB::table('services')->whereStatus(1)->orderby('id', 'desc')->take(5)->get() as $service)
                            <li><a href="{{ route('front.service.details', $service->slug) }}">{{ $service->title }}</a>
                            </li>
                        @endforeach
                           
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <div class="footer-heading">
                            <h3>@lang('Useful Links')</h3>
                        </div>
                        <ul class="footer-quick-links">
                            <li><a href="{{ route('front.index') }}">@lang('Home')</a></li>
                            <li><a href="{{ route('front.service') }}">@lang('Services')</a></li>
                            <li><a href="{{ route('front.project') }}">@lang('Projects')</a></li>
                            <li><a href="{{ route('front.blog') }}">@lang('Blog')</a></li>
                            <li><a href="{{ route('front.contact') }}">@lang('Contacts')</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <div class="footer-heading">
                            <h3>@lang('Contact Info')</h3>
                        </div>
                        <div class="footer-info-contact">
                            <i class="flaticon-phone-call"></i>
                            <h3>@lang('Phone')</h3>
                            
                            <span><a href="tel:{{ $gs->phone }}">{{ $gs->phone }}</a></span>
                        </div>
                        <div class="footer-info-contact">
                            <i class="flaticon-envelope"></i>
                            <h3>@lang('Email')</h3>
                            <span><a href="mailto:{{ $gs->email }}">{{ $gs->email }}</a></span>
                        </div>
                        <div class="footer-info-contact">
                            <i class="flaticon-placeholder"></i>
                            <h3>@lang('Address')</h3>
                            <span>{{ $gs->address }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer Section -->
</section>

<!-- Start Copy Right Section -->
<div class="copyright-area">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6">
                <p><i class="far fa-copyright"></i>{{ $gs->copyright_text }}</p>
            </div>
            <div class="col-lg-6 col-md-6">
                <ul>
                    @foreach (DB::table('pages')->get() as $page)
                    <li><a href="{{ route('front.page', $page->slug) }}">{{ $page->title }}</a></li>
                     @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End Copy Right Section -->

<!-- Start Go Top Section -->
<div class="go-top">
    <i class="fas fa-chevron-up"></i>
    <i class="fas fa-chevron-up"></i>
</div>

@if (isset($visited))
    @if ($gs->is_cookie == 1)
        <div id="addremove" class="cookie-bar-wrap show p-3">
            <div class="container d-flex justify-content-center">
                <div class="col-xl-10 col-lg-12">
                    <div class="row justify-content-center">
                        <div class="cookie-bar d-flex justify-content-between">
                            <div class="cookie-bar-text">
                                {{ $gs->cookie_text }}
                            </div>
                            <div class="cookie-bar-action">
                                <button class="btn btn-primary btn-accept">
                                    {{ $gs->cookie_btn_text }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endif
