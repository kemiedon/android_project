@extends('backend/_layouts/master')

@section('document_title')
{{ Lang::get('backend/tags.crud.title') }}
@stop

@section('head')
@stop

@section('page_header')
{{ Lang::get('backend/tags.crud.title') }}
@stop

@section('breadcrumb')
<!-- // mv_breadcrumb_start -->
<li>{{ Lang::get('backend/tags.crud.title') }}</li><!-- // mv_breadcrumb_end -->
@stop
@section('utility')
<!-- // mv_go_up_start -->
<a href="{{ route('admin.tags.index') }}" class="btn btn-default btn-sm">
    <i class="fa fa-reply"></i> {{ Lang::get('app.button.go_up', ['crud_title' => Lang::get('backend/tags.crud.title')]) }}
</a>
<!-- // mv_go_up_end -->
@stop
@section('content')
<form method="post" enctype="multipart/form-data" action="{{ route('admin.tags.store') }}" class="form-horizontal" role="form">
    {{ csrf_field() }}
    <!-- // mv_view_create_start -->
    @include('backend/_layouts/forms/text', [
        'name'          => "tw_category",
        'label'         => Lang::get('backend/tags.label.tw_category'),
        'value'         => old("tw_category"),
        'desc'          => Lang::get('backend/tags.desc.tw_category'),
    ])
    <!-- // mv_view_create_end -->

    @include('backend/_layouts/forms/submit_cancel', [
        'submit_value' => Lang::get('app.button.submit'),
        'cancel_value' => Lang::get('app.button.cancel'),
        'cancel_url'   => url()->previous(),
    ])

</form>
@endsection