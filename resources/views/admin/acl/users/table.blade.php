@section('css')
    @include('admin.acl.layouts.datatables_css')
@endsection

{!! $dataTable->table(['width' => '100%']) !!}

@section('scripts')
    @include('admin.acl.layouts.datatables_js')
    {!! $dataTable->scripts() !!}
@endsection
