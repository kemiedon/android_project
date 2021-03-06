@extends('backend/_layouts/master')

@section('document_title')
{{ Lang::get('backend/files.crud.title') }}
@stop

@section('head')
@stop

@section('page_header')
{{ Lang::get('backend/files.crud.title') }}
@stop

@section('breadcrumb')
<!-- // mv_breadcrumb_start -->
<li><a href="{{ route('admin.teams.index') }}" >{{ Lang::get('backend/teams.crud.title') }}</a></li>
<li><a href="{{ route('admin.milestone.index', [$team->id]) }}">{{ $team->subject }}</a></li>
<li>{{ $team->subject }}</li><!-- // mv_breadcrumb_end -->
@stop
@section('utility')
<!-- // mv_go_up_start -->
<a href="{{ route('admin.files.index', [$team->id, $milestone->id]) }}" class="btn btn-default btn-sm">
    <i class="fa fa-reply"></i> {{ Lang::get('app.button.go_up', ['crud_title' => Lang::get('backend/files.crud.title')]) }}
</a>
<!-- // mv_go_up_end -->
@stop
@section('content')
<form method="post" enctype="multipart/form-data" action="{{ route('admin.files.store', [$team->id, $milestone->id]) }}" class="form-horizontal" role="form">
    {{ csrf_field() }}
    <!-- // mv_view_create_start -->
    @include('backend/_layouts/forms/picture', [
        'name'          => "file",
        'label'         => Lang::get('backend/files.label.file'),
        'delete_box'    => NULL,
        'upload_path'   => asset('uploads/files')
        'value'         => NULL,
        'desc'          => Lang::get('backend/files.desc.file'),
    ])
        @include('backend/_layouts/forms/picture', [
        'name'          => "file2",
        'label'         => Lang::get('backend/files.label.file2'),
        'delete_box'    => NULL,
        'upload_path'   => asset('uploads/files')
        'value'         => NULL,
        'desc'          => Lang::get('backend/files.desc.file2'),
    ])
        @include('backend/_layouts/forms/picture', [
        'name'          => "file3",
        'label'         => Lang::get('backend/files.label.file3'),
        'delete_box'    => NULL,
        'upload_path'   => asset('uploads/files')
        'value'         => NULL,
        'desc'          => Lang::get('backend/files.desc.file3'),
    ])
    <!-- // mv_view_create_end -->

    @include('backend/_layouts/forms/submit_cancel', [
        'submit_value' => Lang::get('app.button.submit'),
        'cancel_value' => Lang::get('app.button.cancel'),
        'cancel_url'   => url('/'),
    ])

</form>
@endsection