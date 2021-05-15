<div class="input-group">
    <div class="input-group-prepend">
        <span class="input-group-text">Name:</span>
    </div>
    {!! Form::text('name', $permission->name, ['class' => 'form-control','disabled' => true]) !!}
</div>
<br>
<div class="input-group">
    <div class="input-group-prepend">
        <span class="input-group-text">Guard Name:</span>
    </div>
    {!! Form::text('guard_name', $permission->guard_name, ['class' => 'form-control','disabled' => true]) !!}
</div>
<br>

<!-- Submit Field -->
<div class="input-group flex-end">
    <div class="input-group-prepend">
        <a href="{!! route('permissions.index') !!}" class="btn btn-light">Back</a>
    </div>
</div>
