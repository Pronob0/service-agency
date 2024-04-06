 <!-- header-area -->
 <header>
    <div id="sticky-header" class="menu-area menu-area-four transparent-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="mobile-nav-toggler"><i class="fas fa-bars"></i></div>
                    <div class="menu-wrap">
                        <nav class="menu-nav">
                            <div class="logo">
                                <a href="{{ route('front.index') }}"><img src="{{ getPhoto($gs->header_logo) }}" alt="Logo"></a>
                            </div>
                            <div class="navbar-wrap main-menu d-none d-lg-flex">
                                <ul class="navigation">
                                    <li><a href="{{ route('front.index') }}">@lang('Home')</a></li>
                                    <li><a href="{{ route('front.service') }}">@lang('Services')</a></li>
                                    <li class="menu-item-has-children"><a href="#">@lang('Pages')</a>
                                        <ul class="sub-menu">
                                            @foreach (DB::table('pages')->get() as $page)
                                                <li><a href="{{ route('front.page', $page->slug) }}">{{ $page->title }}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    <li><a href="{{ route('front.team') }}">@lang('Teams')</a></li>
                                    <li><a href="{{ route('front.project') }}">@lang('Projects')</a></li>
                                    <li><a href="{{ route('front.blog') }}">@lang('Blog')</a></li>
                                    <li><a href="{{ route('front.contact') }}">@lang('Contacts')</a></li>
                                </ul>
                            </div>
                            <div class="header-action d-none d-md-block">
                                <ul class="list-wrap">
                                    <li class="header-btn"><a href="{{ route('front.getintuch') }}" class="btn btn-two">@lang('Get a Quoute')</a></li>
                                </ul>
                            </div>
                        </nav>
                    </div>

                    <!-- Mobile Menu  -->
                    <div class="mobile-menu">
                        <nav class="menu-box">
                            <div class="close-btn"><i class="fas fa-times"></i></div>
                            <div class="nav-logo">
                                <a href="{{ route('front.index') }}"><img src="{{ getPhoto($gs->header_logo) }}" alt="Logo"></a>
                            </div>
                            <div class="menu-outer">
                                
                            </div>
   
                        </nav>
                    </div>
                    <div class="menu-backdrop"></div>
                    <!-- End Mobile Menu -->

                </div>
            </div>
        </div>
    </div>
</header>
<!-- header-area-end -->