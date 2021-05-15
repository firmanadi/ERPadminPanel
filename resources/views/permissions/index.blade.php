@section('contents')
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-notebook icon-gradient bg-mixed-hopes">
                        </i>
                    </div>
                    <div>Permissions
                        <div class="page-title-subheading">
                            This is a list of your <code>Permissions</code>, you can manage by clicking on action buttons in this table.
                            <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                                <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Permissions</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="page-title-actions">
                    <a class="btn btn-primary" href="{{route('permissions.create')}}">Create Permission</a>
                </div>
            </div>
        </div>
        @include('flash::message')
        <div class="main-card mb-3 card">
            <div class="card-body">
                @include('permissions.table')
            </div>
        </div>
    </div>
    <!-- /.content -->

@endsection

