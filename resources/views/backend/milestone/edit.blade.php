@extends('backend/_layouts/master')

@section('document_title')
{{ Lang::get('backend/milestone.crud.title') }}
@stop

@section('head')
@stop

@section('page_header')
{{ Lang::get('backend/milestone.crud.title') }}
@stop

@section('breadcrumb')
<!-- // mv_breadcrumb_start -->
<li><a href="{{ route('admin.team.index') }}" >{{ Lang::get('backend/team.crud.title') }}</a></li>
<li>{{ $team->subject }}</li><!-- // mv_breadcrumb_end -->
@stop
@section('utility')
<!-- // mv_go_up_start -->
<a href="{{ route('admin.milestone.index', [$team->id]) }}" class="btn btn-default btn-sm">
    <i class="fa fa-reply"></i> {{ Lang::get('app.button.go_up', ['crud_title' => Lang::get('backend/milestone.crud.title')]) }}
</a>
<!-- // mv_go_up_end -->
@stop

@section('content')


<form method="post" enctype="multipart/form-data" action="{{ route('admin.milestone.update', [$team->id, $milestone->id]) }}" class="form-horizontal" role="form">
    {{ csrf_field() }}
    {{ method_field('PUT') }}

    <!-- // mv_view_edit_start -->
    @include('backend/_layouts/forms/text', [
        'name'          => "name",
        'label'         => Lang::get('backend/milestone.label.name'),
        'value'         => old("name") ?: $milestone->name,
        'desc'          => Lang::get('backend/milestone.desc.name'),
    ])
    <!-- // mv_view_edit_end -->

    <input type="hidden" name="created_at" placeholder="" value="{{ date('Y/m/d H:i:s') }}">
    @include('backend/_layouts/forms/submit_cancel', [
        'submit_value' => Lang::get('app.button.submit'),
        'cancel_value' => Lang::get('app.button.cancel'),
        'cancel_url'   => url('/'),
    ])

</form>
@endsection