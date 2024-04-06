@extends('layouts.admin')
@section('title')
@lang('Want to work with us')
@endsection

@section('breadcrumb')
<section class="section">
    <div class="section-header  d-flex justify-content-between">
        <h1>@lang('Want to work with section')</h1>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-primary"><i class="fas fa-backward"></i>
            @lang('Back')</a>
    </div>
</section>
@endsection
@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <!-- Form Basic -->
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">{{ __('Update Want to work with Section') }}</h6>
            </div>
            <div class="card-body">

                <form action="{{ route('admin.gs.update') }}" method="POST">
                    @csrf

                    <input type="hidden" name="type" value="want_to_worksection">

                    <div class="form-group">
                        <label for="title">{{ __('Title') }}</label>
                        <input type="text" class="form-control" name="want_to_header" id="title" required
                            placeholder="{{ __('Title') }}" value="{{ $gs->want_to_header }}">
                    </div>

                    <div class="form-group">
                        <label for="sort_text">{{ __('Subtitle') }}</label>
                        <textarea id="area1" class="form-control summernote" name="want_to_sub"
                            placeholder="{{ __('Subtitle Text') }}" required>{{ $gs->want_to_sub }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                </form>
            </div>
        </div>
        <!-- Form Sizing -->
        <!-- Horizontal Form -->
    </div>
</div>
<!--Row-->
@endsection
@push('script')
<script>
    'use strict';
       
        

</script>
@endpush