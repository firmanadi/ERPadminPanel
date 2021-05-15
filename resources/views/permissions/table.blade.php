@section('styles')
    @include('layouts.datatables_css')
@endsection

<livewire:permissions-table exportable model="App\Models\Permission" />

@section('scripts')
    <script
        src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous"></script>
    @include('layouts.datatables_js')

    <script>
    </script>
@endsection