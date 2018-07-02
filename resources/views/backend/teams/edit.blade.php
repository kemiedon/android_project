@extends('backend/_layouts/master')

@section('document_title')
{{ Lang::get('backend/teams.crud.title') }}
@stop

@section('head')
@stop

@section('page_header')
{{ Lang::get('backend/teams.crud.title') }}
@stop

@section('breadcrumb')
<!-- // mv_breadcrumb_start -->
<li>{{ Lang::get('backend/teams.crud.title') }}</li><!-- // mv_breadcrumb_end -->
@stop
@section('utility')
<!-- // mv_go_up_start -->
<a href="{{ route('admin.teams.index') }}" class="btn btn-default btn-sm">
    <i class="fa fa-reply"></i> {{ Lang::get('app.button.go_up', ['crud_title' => Lang::get('backend/teams.crud.title')]) }}
</a>
<!-- // mv_go_up_end -->
@stop

@section('content')


<form method="post" enctype="multipart/form-data" action="{{ route('admin.teams.update', [$team->id]) }}" class="form-horizontal" role="form">
    {{ csrf_field() }}
    {{ method_field('PUT') }}

    <!-- // mv_view_edit_start -->
    @include('backend/_layouts/forms/picture', [
        'name'          => "picture",
        'label'         => Lang::get('backend/teams.label.picture'),
        'delete_box'    => NULL,
        'upload_path'   => NULL,
        'value'         => asset('uploads/team/'.$picture = old("picture") ?: $team->picture),
        'desc'          => Lang::get('backend/teams.desc.picture'),
    ])
        @include('backend/_layouts/forms/text', [
        'name'          => "name",
        'label'         => Lang::get('backend/teams.label.name'),
        'value'         => old("name") ?: $team->name,
        'desc'          => Lang::get('backend/teams.desc.name'),
    ])
        @include('backend/_layouts/forms/text', [
        'name'          => "subject",
        'label'         => Lang::get('backend/teams.label.subject'),
        'value'         => old("subject") ?: $team->subject,
        'desc'          => Lang::get('backend/teams.desc.subject'),
    ])
        @include('backend/_layouts/forms/tinymce', [
        'name'          => "description",
        'label'         => Lang::get('backend/teams.label.description'),
        'required'      => '',
        'error_message' => '',
        'value'         => old("description") ?: $team->description,
        'desc'          => Lang::get('backend/teams.desc.description'),
        'height'        => 360,
        'rows'          => 20,
        'min_length'    => 5,
    ])
    @if(Auth::user()->name == 'webmaster')
        @include('backend/_layouts/forms/text', [
        'name'          => "score",
        'label'         => Lang::get('backend/teams.label.score'),
        'value'         => old("score") ?: $team->score,
        'desc'          => Lang::get('backend/teams.desc.score'),
    ])
    @endif
    <!-- // mv_view_edit_end -->

    <input type="hidden" name="created_at" placeholder="" value="{{ date('Y/m/d H:i:s') }}">
    @include('backend/_layouts/forms/submit_cancel', [
        'submit_value' => Lang::get('app.button.submit'),
        'cancel_value' => Lang::get('app.button.cancel'),
        'cancel_url'   => url('/'),
    ])

</form>
@endsection