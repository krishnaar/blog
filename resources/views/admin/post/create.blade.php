@extends('layouts.backend.app')

@section('title', 'Post')

@push('css')
  <!-- Bootstrap Select Css -->
  <link href="{{ asset('assets/backend/plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">
@endpush

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="card ">
                <div class="card-header card-header-rose card-header-text">
                    <div class="card-text">
                        <h4 class="card-title">Post</h4>
                    </div>
                </div>
                <div class="card-body ">
                    <form method="#" action="#">
                        <div class="form-group">
                            <label for="exampleEmail" class="bmd-label-floating">Post Title</label>
                            <input type="text" class="form-control" id="exampleEmail">
                        </div>
                        <h4 class="title">Featured Image</h4>
                        <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                            <div class="fileinput-new thumbnail">
                                <img src="{{ asset('assets/backend') }}/img/image_placeholder.jpg" alt="...">
                            </div>
                            <div class="fileinput-preview fileinput-exists thumbnail"></div>
                            <div>
                                <span class="btn btn-rose btn-round btn-file">
                                    <span class="fileinput-new">Select image</span>
                                    <span class="fileinput-exists">Change</span>
                                    <input type="file" name="..." />
                                </span>
                                <a href="#pablo" class="btn btn-danger btn-round fileinput-exists"
                                    data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                            </div>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" value="" {{ !empty($post) && $post->status == true ? 'checked' : '' }}> Publish
                                <span class="form-check-sign">
                                    <span class="check"></span>
                                </span>
                            </label>
                        </div>
                    </form>
                </div>
                <div class="card-footer ">
                    <button type="submit" class="btn btn-fill btn-rose">Submit</button>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card ">
                <div class="card-header card-header-rose card-header-text">
                    <div class="card-text">
                        <h4 class="card-title">Categories and Tags</h4>
                    </div>
                </div>
                <div class="card-body ">
                    <form class="form-horizontal">
                        <div class="form-group">
                            {!! Form::select('categories[]',['' => '-- Selecy Categories --']  + $categories, !empty($post) ? $post->categories->pluck('id')->toArray() : NULL , ['class' => 'selectpicker', 'autocomplete' => 'off', 'required' => true, 'id' => 'color', 'multiple', 'data-style' => 'select-with-transition', 'title' => 'Choose Categories']) !!}
                        </div>
                        <br>
                        <div class="col-md-12">
                            <div class="row">
                                    {!! Form::select('tags[]',['' => '-- Selecy Tags --']  + $tags, !empty($post) ? $post->tags->pluck('id')->toArray() : NULL , ['class' => 'selectpicker', 'autocomplete' => 'off', 'required' => true, 'id' => 'color', 'multiple', 'data-style' => 'select-with-transition', 'title' => 'Choose Tags']) !!}
                                </div>
                            </div>
                    </form>
                </div>
                <div class="card-footer ">
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header card-header-rose card-header-text">
                    <div class="card-text">
                        <h4 class="card-title">Body</h4>
                    </div>
                </div>
                <div class="card-body ">
                    <textarea name="body" id="summernote">{{ !empty($post) ? $post->body : '' }}</textarea>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<!-- Select Plugin Js -->
<script src="{{ asset('assets/backend/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>
<!-- TinyMCE -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js"></script>

<script>
$(document).ready( function() {
    $('#summernote').summernote({
      height: 300,
    });
});
</script>
@endpush
