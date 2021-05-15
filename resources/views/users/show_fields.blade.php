<div class="input-group">
    <div class="input-group-prepend">
        <span class="input-group-text">Name:</span>
    </div>
    {!! Form::text('name', $user->name, ['class' => 'form-control','disabled' => true]) !!}
</div>
<br>
<div class="input-group">
    <div class="input-group-prepend">
        <span class="input-group-text">Email:</span>
    </div>
    {!! Form::email('email', $user->email, ['class' => 'form-control','disabled' => true]) !!}
</div>
<br>
<div class="input-group">
    <div class="input-group-prepend">
        <span class="input-group-text">Email Verified At:</span>
    </div>
    {!! Form::date('email_verified_at', $user->email_verified_at, ['class' => 'form-control date','disabled' => true]) !!}
</div>
<br>
<div class="input-group">
    <div class="input-group-prepend">
        <span class="input-group-text">Password:</span>
    </div>
    {!! Form::password('password', ['class' => 'form-control','disabled' => true]) !!}
</div>
<br>
<div class="input-group">
    <div class="input-group-prepend">
        <span class="input-group-text">Remember Token:</span>
    </div>
    {!! Form::text('remember_token', $user->remember_token, ['class' => 'form-control','disabled' => true]) !!}
</div>
<br>
<div class="card-body"><h5 class="card-title">Roles</h5>
    <div class="position-relative form-group">
        <div>
            @foreach ($user->roles as $key => $role)
                <div class="custom-checkbox custom-control custom-control-inline">
                    {!! Form::checkbox('roles[]',   $role->id, !empty($user->roles) ? $user->roles : null, ['class' => 'custom-control-input','id' => 'exampleCustomInline'.$key,'disabled' => true] ) !!}
                    <label class="custom-control-label" for="exampleCustomInline{{$key}}">
                        {{ucfirst($role->name)}}
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
        <a href="{!! route('users.index') !!}" class="btn btn-light">Back</a>
    </div>
</div>
