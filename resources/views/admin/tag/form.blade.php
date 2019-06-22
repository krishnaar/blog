<div class="form-group">
    <label for="name" class="bmd-label-floating">Tag Name</label>
    {!! Form::text( 'name', null, [ 'class' => 'form-control empty', 'autocomplete' => 'off', 'required' => true ] ) !!}
    {{-- {!! Form::errorMsg('name') !!} --}}
</div>
<div class="card-footer ">
    <button type="submit" class="btn btn-fill btn-rose">Submit</button>
</div>