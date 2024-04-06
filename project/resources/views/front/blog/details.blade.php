@extends(theme(). 'layout')

@section('content')
     <!-- breadcrumb-area -->
     <section class="breadcrumb-area breadcrumb-bg" data-background="{{getPhoto($gs->breadcumb)}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-content">
                        <h2 class="title">{{__('Blog Details')}}</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('front.index')}}">{{__('Home')}}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{$blog->title}}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb-area-end -->

   <!-- blog-details-area -->
   <section class="blog-details-area pt-120 pb-120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-8">
                <div class="blog-details-wrap">
                    <div class="blog-details-thumb">
                        <img class="w-100" src="{{getPhoto($blog->photo)}}" alt="">
                    </div>
                    <div class="blog-details-content mb-3">
                        <div class="blog-meta">
                            <ul class="list-wrap">
                                <li><i class="far fa-user"></i> By <a href="javascript:;">Admin</a></li>
                                <li><i class="fas fa-calendar-alt"></i>{{dateFormat($blog->created_at)}}</li>
                                
                                <li><i class="far fa-eye"></i>{{ $blog->views }} @lang('VIEWS')</li>
                            </ul>
                        </div>
                        <h2 class="title">{{$blog->title}}</h2>
                        <p>@php
                                    echo $blog->description
                                @endphp</p>

                        
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in a our some form, by injected humour, or randomised words which don't look even slightly believable. If you are going our as to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle the of text. All the Lorem Ipsum generators on the Internet tend.</p>
                        <div class="blog-details-bottom">
                            <div class="row align-items-center">
                                <div class="col-lg-8">
                                    <div class="post-tags">
                                        <h5 class="title">Tag:</h5>
                                        <ul class="list-wrap">
                                            @foreach (explode(',', $blog->tags ) as $item)
                                            <li><a href="{{  route('front.blog') . '?tag=' . $item  }}">#{{ $item }}</a></li>
                                                
                                            @endforeach
                                            
                                        
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="">
                                        <h5 class="title">Share:</h5>
                                        <ul class="list-wrap a2a_kit a2a_kit_size_32 a2a_default_style">
                                            <li><a class="a2a_dd" href="https://www.addtoany.com/share"></a></li>
                                            <li><a class="a2a_button_facebook"></a></li>
                                            <li><a class="a2a_button_twitter"></a></li>
                                            <li><a class="a2a_button_email"></a></li>
                                        </ul>
                                        <script async src="https://static.addtoany.com/menu/page.js"></script>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if($gs->is_disqus == 1)
                    <div class="comments-wrap">
                        <div class="comments">
                            <div id="disqus_thread">
                               <script>
                                  (function() {
                                  var d = document, s = d.createElement('script');
                                  s.src = 'https://{{ $gs->disqus }}.disqus.com/embed.js';
                                  s.setAttribute('data-timestamp', +new Date());
                                  (d.head || d.body).appendChild(s);
                                  })();
                               </script>
                               <noscript>{{ __('Please enable JavaScript to view the') }} <a href="https://disqus.com/?ref_noscript">{{ __('comments powered by Disqus.') }}</a></noscript>
                            </div>
                         </div>
                    </div>
                    @endif
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
<!-- blog-details-area-end -->
@endsection
