@extends('layouts.backend.app')

@section('title', 'Tag')

@push('css')

@endpush

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header card-header-rose card-header-text">
                    <div class="card-text">
                        <h4 class="card-title">Edit Tag</h4>
                    </div>
                </div>
                <div class="card-body ">
                    
                    {!! Form::model($tag, ['route'=>['admin.tag.update', $tag->id], 'method' => 'put', 'autocomplete'=>'off') !!}
                        @include('admin.tag.form')
                    {!! Form::close() !!}
                    
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection

@push('js')

@endpush
