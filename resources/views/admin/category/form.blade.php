<div class="form-group">
    <label for="name" class="bmd-label-floating">Category Name</label>
    {!! Form::text( 'name', null, [ 'class' => 'form-control empty', 'autocomplete' => 'off', 'required' => true ] ) !!}
    {{-- {!! Form::errorMsg('name') !!} --}}
</div>
 <h4 class="title">Featured Image</h4>
<div class="fileinput fileinput-new text-center" data-provides="fileinput">
    <div class="fileinput-new thumbnail">
        @if (!empty($category))
            <img src="../../../storage/category/{{$category->image}}" alt="" >
        @else
            <img src="{{ asset('assets/backend') }}/img/image_placeholder.jpg" alt="...">
        @endif
    </div>
    <div class="fileinput-preview fileinput-exists thumbnail"></div>
    <div>
        <span class="btn btn-rose btn-round btn-file">
            <span class="fileinput-new">Select image</span>
            <span class="fileinput-exists">Change</span>
            <input type="file" name="image"/>
        </span>
        <a href="#pablo" class="btn btn-danger btn-round fileinput-exists"
            data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
    </div>
</div>
<div class="card-footer ">
    <button type="submit" class="btn btn-fill btn-rose">Submit</button>
</div>