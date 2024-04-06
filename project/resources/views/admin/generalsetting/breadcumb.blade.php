@extends('layouts.admin')
@section('breadcrumb')
    <section class="section">
        <div class="section-header">
            <h1>@lang('Banner')</h1>
        </div>
    </section>
@endsection
@section('title')
    @lang('Site Breadcumb')
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h6 class="text-primary"> @lang('breadcumb')</h6>
                </div>
                <div class="card-body">
                    <form id="" action="{{ route('admin.gs.update') }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="text-center">
                            <label class="text-center" for="">@lang('Breadcumb Banner')</label>
                            <div class="form-group d-flex justify-content-center">
                                <div id="image-preview"class="image-preview image-preview_alt"
                                    style="background-image:url({{ getPhoto($gs->breadcumb) }});width: 800px;background-size:cover">
                                    <label for="image-upload" id="image-label">@lang('Choose File')</label>
                                    <input type="file" name="breadcumb" id="image-upload" />
                                </div>
                            </div>
                        </div>

                        <div class="text-center">
                            <label class="text-center" for="">@lang('Footer Banner')</label>
                            <div class="form-group d-flex justify-content-center">
                                <div id="image-preview2"class="image-preview image-preview_alt"
                                    style="background-image:url({{ getPhoto($gs->footer_bg) }});width: 800px;background-size:cover">
                                    <label for="image-upload2" id="image-label2">@lang('Choose File')</label>
                                    <input type="file" name="footer_bg" id="image-upload2" />
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <div class="col-sm-12 text-center">
                                <button type="submit" class="btn btn-primary btn-block">{{ __('Update') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </div>
@endsection

@push('script')
    <script>
        'use strict';
        $.uploadPreview({
            input_field: "#image-upload", // Default: .image-upload
            preview_box: "#image-preview", // Default: .image-preview
            label_field: "#image-label", // Default: .image-label
            label_default: "{{ __('Choose File') }}", // Default: Choose File
            label_selected: "{{ __('Update Image') }}", // Default: Change File
            no_label: false, // Default: false
            success_callback: null // Default: null
        });

        $.uploadPreview({
            input_field: "#image-upload2", // Default: .image-upload
            preview_box: "#image-preview2", // Default: .image-preview
            label_field: "#image-label2", // Default: .image-label
            label_default: "{{ __('Choose File') }}", // Default: Choose File
            label_selected: "{{ __('Update Image') }}", // Default: Change File
            no_label: false, // Default: false
            success_callback: null // Default: null
        });
    </script>
@endpush
