<div class="input-group">
    <div class="input-group-prepend">
        <span class="input-group-text">Name:</span>
    </div>
    {!! Form::text('name', $role->name, ['class' => 'form-control','disabled' => true]) !!}
</div>
<br>
<div class="input-group">
    <div class="input-group-prepend">
        <span class="input-group-text">Guard Name:</span>
    </div>
    {!! Form::text('guard_name', $role->guard_name, ['class' => 'form-control','disabled' => true]) !!}
</div>
<br>
<div class="card-body"><h5 class="card-title">Roles</h5>
    <div class="position-relative form-group">
        <div>
            @foreach ($role->permissions as $key => $permission)
                <div class="custom-checkbox custom-control custom-control-inline">
                    {!! Form::checkbox('permissions[]',   $permission->id, @$role->permissions, ['class' => 'custom-control-input','id' => 'exampleCustomInline'.$key,'disabled' => true] ) !!}
                    <label class="custom-control-label" for="exampleCustomInline{{$key}}">
                        {{ucfirst($permission->name)}}
                    </label>
                </div>
            @endforeach
        </div>
    </div>
</div>
<br>
<!-- Submit Field -->
<div class="input-group flex-end">
    <div class="input-group-prepend">
        <a href="{!! route('roles.index') !!}" class="btn btn-light">Back</a>
    </div>
</div>
