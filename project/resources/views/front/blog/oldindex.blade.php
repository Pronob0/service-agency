@extends(theme() . 'layout')

@section('content')
    <!-- breadcrumb-area -->
    <section class="breadcrumb-area breadcrumb-bg" data-background="{{getPhoto($gs->breadcumb)}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-content">
                        <h2 class="title">{{__('Blog List')}}</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('front.index')}}">{{__('Home')}}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{__('Blog List')}}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb-area-end -->

    <!-- blog-area -->
    <section class="inner-blog-area pt-120 pb-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8">
                    <div class="row">
                        @forelse ($blogs as $blog)
                        <div class="col-lg-6 col-md-6">
                            <div class="blog-post-item">
                                <div class="blog-post-thumb">
                                    <a href="{{ route('front.blog.details', $blog->slug) }}"><img src="{{ getPhoto($blog->photo) }}" alt=""></a>
                                </div>
                                <div class="blog-post-content">
                                    <a href="{{ route('front.blog.details', $blog->slug) }}" class="tag">{{ $blog->category->name }}</a>
                                    <div class="blog-meta">
                                        <ul class="list-wrap">
                                            <li><i class="far fa-user"></i> By <a href="blog-details.html">@lang('Admin')</a></li>
                                            <li><i class="fas fa-calendar-alt"></i>{{ dateFormat($blog->created_at) }}</li>
                                        </ul>
                                    </div>
                                    <h2 class="title"><a href="{{ route('front.blog.details', $blog->slug) }}">{{ $blog->title }}</a>
                                    </h2>
                                    <a href="{{ route('front.blog.details', $blog->slug) }}" class="link-btn">@lang('Read More')<i class="fas fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        @empty
                            <div class="col-lg-12 border p-3">
                                <div class="text-center">
                                    <h2 class="title">@lang('No Blog Found')</h2>
                                </div>
                            </div>
                        @endforelse
                        
                    </div>
                    <div class="pagination-wrap mt-30">
                        {{ $blogs->links('front.blog.paginate') }}
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-10">
                    <aside class="blog-sidebar">
                        <div class="blog-widget">
                            <div class="sidebar-search">
                                <h4 class="widget-title">@lang('Search')</h4>
                                <form action="{{ route('front.blog') }}">
                                    <input id="search" name="search" type="text" placeholder="Search">
                                    <button type="submit"><i class="fas fa-search"></i></button>
                                </form>
                            </div>
                        </div>
                        <div class="blog-widget">
                            <h4 class="widget-title">@lang('Categories')</h4>
                            <div class="categories-list">
                                <ul class="list-wrap">
                                    @foreach ($categories as $category)
                                    <li><a href="{{ route('front.blog') . '?category=' . $category->slug }}">{{ $category->name }} <span>({{ $category->blogs->count() }})</span></a></li>
                                    @endforeach
                                   
                                </ul>
                            </div>
                        </div>
                        <div class="blog-widget">
                            <h4 class="widget-title">@lang('Recent News')</h4>
                            <div class="rc-post-wrap">
                                @foreach (DB::table('blogs')->orderBy('id', 'desc')->take(3)->get() as $rblog)
                                <div class="rc-post-item">
                                    <div class="rc-post-thumb">
                                        <a href="{{ route('front.blog.details', $blog->slug) }}"><img src="{{  getPhoto($rblog->photo)  }}" alt=""></a>
                                    </div>
                                    <div class="rc-post-content">
                                        <h5 class="title"><a href="{{ route('front.blog.details', $blog->slug) }}">{{  $blog->title }} </a></h5>
                                        <span><i class="fas fa-calendar-alt"></i>{{ dateFormat($blog->created_at) }}</span>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="blog-widget">
                            <h4 class="widget-title">@lang('Popular Tags')</h4>
                            <div class="tag-list-wrap">
                                <ul class="list-wrap">
                                   
                                    @foreach ($tags as $tag=>$value)
                                    @if(!empty($tag))
                                    <li><a href="{{  route('front.blog') . '?tag=' . $value  }}">{{ $value }}</a></li>
                                    @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                       
                    </aside>
                </div>
            </div>
        </div>
    </section>
    <!-- blog-area-end -->
@endsection
