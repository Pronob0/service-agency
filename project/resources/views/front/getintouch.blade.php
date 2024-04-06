@extends(theme() . '.layout')
@section('content')
    <!-- breadcrumb-area -->
    <section class="breadcrumb-area breadcrumb-bg" data-background="{{ getPhoto($gs->breadcumb) }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-content">
                        <h2 class="title">@lang('Get in Touch')</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('front.index') }}">@lang('Home')</a></li>
                                <li class="breadcrumb-item active" aria-current="page">@lang('Get in Touch')</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb-area-end -->

    <!-- contact-area -->
    <section class="contact-area pt-120 pb-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-10 col-lg-10">
                    <div class="contact-form-wrap" data-background="assets/img/images/contact_form_bg.jpg">
                        <h2 class="title">@lang('Get in Touch')</h2>
                        <form action="{{ route('front.gettuch.submit') }}" class="contact-form" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-grp">
                                        <input id="firstName" name="name" type="text" placeholder="{{ __('Your Name') }}*">
                                        @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-grp">
                                        <input id="email" name="email" type="email" placeholder="{{ __('Email address') }}*">
                                        @error('email')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-grp">
                                        <input id="phone" name="phone" type="text" placeholder="{{ __('Phone number') }}*">
                                        @error('phone')
                                                <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-grp">
                                        <select name="service_id" class="form-select py-3">
                                            <option value="">@lang('Select Service')</option>
                                            @foreach (DB::table('services')->whereStatus(1)->get() as $cservice)
                                                <option value="{{ $cservice->id }}">{{ $cservice->title }}</option>
                                            @endforeach
                                        </select>
                                        @error('subject')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-grp">
                                <textarea id="message" name="message" placeholder="{{ __('Your Message here') }}"></textarea>
                                @error('message')
                                        <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <button class="btn" type="submit">@lang('Send Message')</button>
                        </form>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
    <!-- contact-area-end -->

@endsection
