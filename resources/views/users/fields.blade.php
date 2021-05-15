<div class="input-group">
    <div class="input-group-prepend">
        <span class="input-group-text">Name:</span>
        <span class="input-group-text">{{ $errors->first('name') }}</span>
    </div>
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>
<br>
<div class="input-group">
    <div class="input-group-prepend">
        <span class="input-group-text">Email:</span>
        <span class="input-group-text">{{ $errors->first('email') }}</span>
    </div>
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>
<br>
<div class="input-group">
    <div class="input-group-prepend">
        <span class="input-group-text">Email Verified At:</span>
        <span class="input-group-text">{{ $errors->first('email_verified_at') }}</span>
    </div>
    {!! Form::date('email_verified_at', null, ['class' => 'form-control date']) !!}
</div>
<br>
<div class="input-group">
    <div class="input-group-prepend">
        <span class="input-group-text">Password:</span>
        <span class="input-group-text">{{ $errors->first('password') }}</span>
    </div>
    {!! Form::password('password', ['class' => 'form-control']) !!}
</div>
<br>
<div class="input-group">
    <div class="input-group-prepend">
        <span class="input-group-text">Remember Token:</span>
        <span class="input-group-text">{{ $errors->first('remember_token') }}</span>
    </div>
    {!! Form::text('remember_token', null, ['class' => 'form-control']) !!}
</div>
<br>
<div class="card-body"><h5 class="card-title">Roles</h5>
    <div class="position-relative form-group">
        <div>
            @foreach ($roles as $key => $role)
                <div class="custom-checkbox custom-control custom-control-inline">
                    {!! Form::checkbox('roles[]',   $role->id, !empty($user->roles) ? $user->roles : null, ['class' => 'custom-control-input','id' => 'exampleCustomInline'.$key] ) !!}
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
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('users.index') !!}" class="btn btn-light">Cancel</a>
    </div>
</div>

@section('scripts')
<!-- Relational Form table -->
<script>
    $(document).ready(function() {
        $('.dropify').dropify({
            messages: {
                default: 'Drag and drop file here or click',
                replace: 'Drag and drop file here or click to Replace',
                remove:  'Remove',
                error:   'Sorry, the file is too large'
            }
        });
        var editor_config = {
                path_absolute : "/",
                selector: 'textarea.my-editor2',
                height : "250",
                plugins: [
                    "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                    "searchreplace wordcount visualblocks visualchars code fullscreen",
                    "insertdatetime media nonbreaking save table contextmenu directionality",
                    "emoticons template paste textcolor colorpicker textpattern"
                ],
                menubar: false,
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
                relative_urls: false,
                file_browser_callback : function(field_name, url, type, win) {
                    var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                    var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

                    var cmsURL = editor_config.path_absolute + 'filemanager?field_name=' + field_name;
                        cmsURL = cmsURL + "&type=Files";

                    tinyMCE.activeEditor.windowManager.open({
                        file : cmsURL,
                        title : 'Filemanager',
                        width : x * 0.8,
                        height : y * 0.8,
                        resizable : "yes",
                        close_previous : "no"
                    });
                }
            }
            tinymce.init(editor_config);
    });
</script>
<!-- End Relational Form table -->
@endsection
