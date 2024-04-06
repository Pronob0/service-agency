@extends('layouts.admin')

@section('title')
   @lang('Service Categories')
@endsection

@section('breadcrumb')
 <section class="section">
    <div class="section-header">
        <h1>@lang('Service Categories')</h1>
    </div>
</section>
@endsection

@section('content')


<div class="row">
   <div class="col-lg-12">
      <div class="card mb-4">
         <div class="card-header d-flex justify-content-end">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add">
               <i class="fas fa-plus"></i> @lang('Add New')
             </button>

         </div>
         <div class="table-responsive p-3">
            <table class="table table-striped">
               <tr>
                   <th>@lang('Name')</th>
                   <th>@lang('Slug')</th>
                   <th>@lang('Status')</th>
                   <th class="text-right">@lang('Action')</th>
               </tr>
               @forelse ($categories as $item)
                   <tr>

                        <td data-label="@lang('Name')">
                          {{$item->name}}
                        </td>
                        <td data-label="@lang('Slug')">
                          {{$item->slug}}
                        </td>
                      
                        <td data-label="@lang('Status')">
                           @if ($item->status == 1)
                           <span class="badge badge-success"> @lang('Active') </span>
                           @else
                           <span class="badge badge-warning"> @lang('Inactive') </span>
                           @endif
                        </td>
                        <td data-label="@lang('Action')" class="text-right">
                           <a href="javascript:void()" class="btn btn-primary approve btn-sm edit mb-1" data-route="{{route('admin.service.category.update',$item->id)}}" data-item="{{$item}}" data-photo="{{ getPhoto($item->image) }}" data-toggle="tooltip" title="@lang('Edit')"><i class="fas fa-edit"></i></a>
                           <a href="javascript:void(0)" class="btn btn-danger btn-sm remove mb-1" data-id="{{$item->id}}"  data-toggle="tooltip" title="@lang('Remove')"><i class="fas fa-trash"></i></a>
                        </td>
                   </tr>
                @empty

                   <tr>
                       <td class="text-center" colspan="100%">@lang('No Data Found')</td>
                   </tr>

               @endforelse
           </table>
         </div>
      </div>
   </div>
</div>

<!-- Modal -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <form action="{{route('admin.service.category.store')}}" method="POST" enctype="multipart/form-data">
         @csrf
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title">@lang('Add new category')</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                  </button>
            </div>
            <div class="modal-body">

               <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                  <label for="">@lang('Category Image')</label>
                  <div class="form-group d-flex justify-content-center">
                      <div id="image-preview" class="image-preview image-preview_alt"
                          style="background-image:url();">
                          <label for="image-upload" id="image-label">@lang('Choose File')</label>
                          <input type="file" name="image" id="image-upload" />
                      </div>
                  </div>
              </div>

               <div class="form-group">
                  <label>@lang('Name')</label>
                  <input class="form-control" type="text" name="name">
               </div>

               <div class="form-group">
                  <label>@lang('Status')</label>
                  <select name="status" class="form-control">
                     <option value="1">@lang('Active')</option>
                     <option value="0">@lang('Inactive')</option>
                  </select>
               </div>


            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-dark" data-dismiss="modal">@lang('Close')</button>
               <button type="submit" class="btn btn-primary">@lang('Submit')</button>
            </div>
         </div>
      </form>
   </div>
</div>

<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <form action="" method="POST" enctype="multipart/form-data">
         @csrf
         @method('PUT')
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title">@lang('Edit category')</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                  </button>
            </div>
            <div class="modal-body">


               <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                  <label for="">@lang('Category Image')</label>
                  <div class="form-group d-flex justify-content-center">
                      <div id="image-preview2" class="image-preview image-preview_alt"
                          style="background-image:url();">
                          <label for="image-upload2" id="image-label2">@lang('Choose File')</label>
                          <input type="file" data-asset={{ asset('assets/images/') }} name="image" id="image-upload2" />
                      </div>
                  </div>
              </div>


               <div class="form-group">
                  <label>@lang('Name')</label>
                  <input class="form-control" type="text" name="name">
               </div>
               <div class="form-group">
                  <label>@lang('Status')</label>
                  <select name="status" class="form-control">
                     <option value="1">@lang('Active')</option>
                     <option value="0">@lang('Inactive')</option>
                  </select>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-dark" data-dismiss="modal">@lang('Close')</button>
               <button type="submit" class="btn btn-primary">@lang('Submit')</button>
            </div>
         </div>
      </form>
   </div>
</div>


<!-- Modal -->
<div class="modal fade" id="removeMod" tabindex="-1" role="dialog">
   <div class="modal-dialog" role="document">
      <form action="{{route('admin.service.category.destroy')}}" method="POST">
         @method('DELETE')
         @csrf
         <input type="hidden" name="id">
         <div class="modal-content">
            <div class="modal-body">
               <h5>@lang('Are you sure to remove?')</h5>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-dark" data-dismiss="modal">@lang('Close')</button>
               <button type="submit" class="btn btn-danger">@lang('Confirm')</button>
            </div>
         </div>
      </form>
   </div>
</div>

@endsection

@push('script')
    <script>
       'use strict';
       $('.edit').on('click',function () { 
          var data = $(this).data('item')
          var photo = $(this).data('photo')
          $('#edit').find('input[name=name]').val(data.name)
          $('#edit').find('select[name=status]').val(data.status)
          $('#image-preview2').css('background-image','url('+photo+')')
          $('#edit').find('form').attr('action',$(this).data('route'))
          $('#edit').modal('show')
       })

       $('.remove').on('click',function () { 
         $('#removeMod').find('input[name=id]').val($(this).data('id'))
         $('#removeMod').modal('show')
       })

      
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

