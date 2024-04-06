@extends('layouts.admin')
@section('title')
    @lang('Edit About Section')
@endsection

@section('breadcrumb')
    <section class="section">
        <div class="section-header d-flex justify-content-between">
            <h1>@lang('Edit About Section')</h1>
        </div>
    </section>
@endsection
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-body">

                    <form action="{{ route('admin.about.update') }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf

                        <div class="row">

                            <div class="col-6  text-center">
                                <label for="">@lang('First Photo')</label>
                                <div class="form-group d-flex justify-content-center">
                                    <div id="image-preview" class="image-preview image-preview_alt"
                                        style="background-image:url({{ getPhoto($about->photo) }});">
                                        <label for="image-upload" id="image-label">@lang('Choose File')</label>
                                        <input type="file" name="photo" id="image-upload" />
                                    </div>
                                </div>
                            </div>

                            <div class="col-6  text-center">
                                <label for="">@lang('Second Photo')</label>
                                <div class="form-group d-flex justify-content-center">
                                    <div id="image-preview2" class="image-preview image-preview_alt"
                                        style="background-image:url({{ getPhoto($about->second_photo) }});">
                                        <label for="image-upload2" id="image-label2">@lang('Choose File')</label>
                                        <input type="file" name="second_photo" id="image-upload2" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>@lang('Header Title')</label>
                            <input class="form-control" type="text" name="header_title"
                                value="{{ $about->header_title }}">
                        </div>
                        <div class="form-group">
                            <label>@lang('Title')</label>
                            <input class="form-control" type="text" name="title" value="{{ $about->title }}">
                        </div>
                        <div class="form-group">
                            <label>@lang('Experience')</label>
                            <input class="form-control" type="number" name="experience" value="{{ $about->experience }}">
                        </div>

                        <div class="form-group">
                            <label>@lang('Phone Number')</label>
                            <input class="form-control" type="text" name="number" value="{{ $about->number }}">
                        </div>
                        <div class="form-group">
                            <label>@lang('Description')</label>
                            <textarea name="description" class="form-control" rows="4">{{ $about->description }}</textarea>
                        </div>
                        
                            <div class="form-group">
                                <label>@lang('Experience List')</label>
                                <div class="d-flex">
                                <input id="title" name="experiencelist[]" type="text" class="form-control" placeholder="Type Here" >
                                <p id="list-add" class="btn btn-primary mx-2"><i class="fas fa-plus-circle "></i></p>

                                </div>
                            </div>

                            <div class="extra" id="experience">
                                @foreach ($experiencelist as $item)
                                    <div class="d-flex">
                                        <input id="title" name="experiencelist[]" type="text" class="form-control"
                                            placeholder="Type Here" value="{{ $item }}" required>
                                        <p class="remove_field btn btn-secondary  mx-2"><i
                                                class="fas fa-minus-circle text-danger"></i></p>
                                    </div>
                                @endforeach

                            </div>
                        






                        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--Row-->
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


        $(document).ready(function() {
            var max_fields = 10;
            var wrapper = $("#experience");
            var add_button = $("#list-add");

            var x = 1;
            $(add_button).click(function(e) {
                e.preventDefault();
                if (x < max_fields) {
                    x++;
                    $(wrapper).append(
                        '<div class="d-flex"><input id="title" name="experiencelist[]" type="text" class="form-control" placeholder="Type Here" required ><p  class="remove_field btn btn-secondary  mx-2"><i class="fas fa-minus-circle text-danger"></i></p></div>'
                    );
                }
            });

            $(wrapper).on("click", ".remove_field", function(e) {
                e.preventDefault();
                $(this).parent('div').remove();
                x--;
            });
        });



    </script>
@endpush
