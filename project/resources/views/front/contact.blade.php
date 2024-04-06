@extends(theme() . '.layout')
@section('content')
    <!-- breadcrumb-area -->
    <section class="breadcrumb-area breadcrumb-bg" data-background="{{ getPhoto($gs->breadcumb) }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-content">
                        <h2 class="title">@lang('Contact Page')</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('front.index') }}">@lang('Home')</a></li>
                                <li class="breadcrumb-item active" aria-current="page">@lang('Contact Page')</li>
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
                <div class="col-xl-6 col-lg-10">
                    <div class="contact-form-wrap" data-background="{{ getPhoto($contact->photo) }}">
                        <h2 class="title">{{ $contact->title }}</h2>
                        <p>@lang('Send us a message and we will respond as soon as possible')</p>
                        <form action="{{ route('front.contact.submit') }}" class="contact-form" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-grp">
                                        <input id="firstName" name="name" type="text" placeholder="{{ __('First Name') }}*">
                                        @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-grp">
                                        <input id="lastName" name="lastname" type="text" placeholder="{{ __('Last Name') }}*">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-grp">
                                        <input id="email" type="email" name="email" placeholder="{{ __('Email Address') }}*">
                                        @error('email')
                                                <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-grp">
                                        <input name="phone" id="phone" type="text" placeholder="{{ __('Phone Number') }}*">
                                        @error('phone')
                                                <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-grp">
                                <input id="subject" name="subject" type="text" placeholder="{{ __('Subject') }}">
                                @error('subject')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
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
                <div class="col-xl-6 col-lg-10">
                    <div class="contact-info-wrap">
                        <h2 class="title">@lang('Need Any Help?')</h2>
                        <p>@lang('Call us or message and we will respond as soon as possible')</p>
                        <ul class="list-wrap">
                            <li class="w-50">
                                <div class="contact-info-item">
                                    <div class="icon">
                                        <i class="fas fa-phone-alt"></i>
                                    </div>
                                    <div class="content">
                                        <a href="tel:{{ $contact->phone1 }}">{{ $contact->phone1 }}</a>
                                        @if ($contact->phone2)
                                    <a href="tel:{{ $contact->phone2 }}">{{ $contact->phone2 }}</a>
                                @endif
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="contact-info-item">
                                    <div class="icon">
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                    <div class="content">
                                        <a href="mailto:{{ $contact->email1 }}">{{ $contact->email1 }}</a>
                                        @if ($contact->email2)
                                            <a href="mailto:{{ $contact->email2 }}">{{ $contact->email2 }}</a>
                                        @endif
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="contact-info-item">
                                    <div class="icon">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </div>
                                    <div class="content">
                                        <p>{{ $contact->address }}</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <!-- contact-map -->
                    @if ($contact->map_link)
                        <div id="contact-map">
                            <iframe src="{{ $contact->map_link }}" allowfullscreen loading="lazy"></iframe>
                        </div>
                    @endif
                    <!-- contact-map-end -->

                </div>
            </div>
        </div>
    </section>
    <!-- contact-area-end -->
    
@endsection
