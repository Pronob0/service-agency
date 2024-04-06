@extends(theme() . 'layout')

@section('content')


<!-- Start Page Title Section -->
<div class="page-title-area item-bg1">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="page-title-content">
                    <h2>Blog Grid</h2>
                    <ul>
                        <li><a href="{{route('front.index')}}">Home</a>
                        </li>
                        <li>Blog Grid</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Page Title Section -->

<!-- Start Blog Section -->
<section class="blog-section section-padding">
    <div class="container">
        <div class="row">

            @forelse ($blogs as $blog)
            <div class="col-lg-4 col-md-6">
                <div class="blog-single-item">
                    <div class="blog-image">
                        <a href="{{ route('front.blog.details', $blog->slug) }}">
                            <img src="{{ getPhoto($blog->photo) }}" alt="image">
                        </a>
                    </div>
                    <div class="blog-description">
                        <ul class="blog-info">
                            <li>
                                <a href="#"><i class="bi bi-person-circle"></i> Admin</a>
                            </li>
                            <li>
                                <a href="#"><i class="bi bi-calendar-check"></i>{{ dateFormat($blog->created_at) }}</a>
                            </li>
                        </ul>
                        <div class="blog-text">
                            <h3>
                                <a href="{{ route('front.blog.details', $blog->slug) }}">
                                    {{ $blog->title }}
                                </a>
                            </h3>
                            <p>
                                @php
                                    echo substr($blog->details, 0, 100);
                                @endphp
                            </p>
                            <div class="blog-btn"> <a href="{{ route('front.blog.details', $blog->slug) }}" class="read-more"><i class="bi bi-arrow-right-short"></i> Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            
            <div class="col-lg-12 col-md-12">
                <div class="pagination-area"> <a href="#" class="prev page-numbers"><i class="fas fa-angle-left"></i></a>
                    <a href="#" class="page-numbers">1</a>
                    <span class="page-numbers current" aria-current="page">2</span>
                    <a href="#" class="page-numbers">3</a>
                    <a href="#" class="page-numbers">4</a>
                    <a href="#" class="next page-numbers"><i class="fas fa-angle-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Blog Section -->
    
@endsection
