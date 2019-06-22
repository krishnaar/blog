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
                        <h4 class="card-title">Add New Category</h4>
                    </div>
                </div>
                <div class="card-body ">
                    {!! Form::open( [ 'route' => 'admin.category.store', 'method' => 'post', 'enctype' => 'multipart/form-data' ] ) !!}
                        @include('admin.category.form')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection

@push('js')

@endpush
