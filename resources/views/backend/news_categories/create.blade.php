@extends('backend/_layouts/master')

@section('document_title')
{{ Lang::get('backend/news_categories.crud.title') }}
@stop

@section('head')
@stop

@section('page_header')
{{ Lang::get('backend/news_categories.crud.title') }}
@stop

@section('breadcrumb')
<!-- // mv_breadcrumb_start -->
<li>{{ Lang::get('backend/news_categories.crud.title') }}</li>
<!-- // mv_breadcrumb_end -->
@stop
@section('utility')
<!-- // mv_go_up_start -->
<a href="{{ url('/') }}" class="btn btn-default btn-sm">
    <i class="fa fa-reply"></i> {{ Lang::get('app.button.go_up', ['crud_title' => Lang::get('backend/news_categories.crud.title')]) }}
</a>
<!-- // mv_go_up_end -->
@stop
@section('content')
<form method="post" enctype="multipart/form-data" action="{{ route('admin.news_categories.store') }}" class="form-horizontal" role="form">
    {{ csrf_field() }}
    <!-- // mv_view_create_start -->

    <!-- // mv_view_form_radio_start -->
    @include('backend/_layouts/forms/radio', [
        'name'          => "name",
        'label'         => Lang::get('backend/news_categories.label.name'),
        'value'         => old("name"),
        'desc'          => Lang::get('backend/news_categories.desc.name'),
        'data_provider' => [1 => '是', 0 => '否' ] ,
    ])
    <!-- // mv_view_form_radio_end -->

    <!-- // mv_view_form_select_start -->
    @include('backend/_layouts/forms/select', [
        'name'          => "name",
        'label'         => Lang::get('backend/news_categories.label.name'),
        'value'         => old("name"),
        'desc'          => Lang::get('backend/news_categories.desc.name'),
        'data_provider' => [1 => '公告',2 => '活動',3 => '優惠'],
    ])
    <!-- // mv_view_form_select_end -->

    <!-- // mv_view_form_text_start -->
    @include('backend/_layouts/forms/text', [
        'name'          => "name",
        'label'         => Lang::get('backend/news_categories.label.name'),
        'value'         => old("name"),
        'desc'          => Lang::get('backend/news_categories.desc.name'),
    ])
    <!-- // mv_view_form_text_end -->
    <!-- // mv_view_form_hidden_start -->
    @include('backend/_layouts/forms/hidden', [
        'name'          => "name",
        'label'         => Lang::get('backend/news_categories.label.name'),
        'value'         => old("name"),
        'desc'          => Lang::get('backend/news_categories.desc.name'),
    ])
    <!-- // mv_view_form_hidden_end -->
    <!-- // mv_view_form_datepicker_start -->
    @include('backend/_layouts/forms/datepicker', [
        'name'          => "name",
        'label'         => Lang::get('backend/news_categories.label.name'),
        'value'         => old("name"),
        'desc'          => Lang::get('backend/news_categories.desc.name'),
        'date_format'   => 'yy-mm-dd',
    ])
    <!-- // mv_view_form_datepicker_end -->

    <!-- // mv_view_form_picture_start -->
    @include('backend/_layouts/forms/picture', [
        'name'          => "name",
        'label'         => Lang::get('backend/news_categories.label.name'),
        'delete_box'    => NULL,
        'upload_path'   => NULL,
        'value'         => NULL,
        'desc'          => Lang::get('backend/news_categories.desc.name'),
    ])
    <!-- // mv_view_form_picture_end -->
    <!-- // mv_view_form_textarea_start -->
    @include('backend/_layouts/forms/textarea', [
			'name'          => "name",
			'label'         => Lang::get('backend/news_categories.label.name'),
			'required'      => '',
			'error_message' => '',
			'value'         => old("name"),
			'desc'          => Lang::get('backend/news_categories.desc.name'),
			'rows'          => 20,
			'min_length'    => 5,
		])
    <!-- // mv_view_form_textarea_end -->
    <!-- // mv_view_form_tinymce_start -->
    @include('backend/_layouts/forms/tinymce', [
        'name'          => "description",
        'label'         => Lang::get('backend/news_categories.label.description'),
        'required'      => '',
        'error_message' => '',
        'value'         => old("description"),
        'desc'          => Lang::get('backend/news_categories.desc.description'),
        'height'        => 360,
        'rows'          => 20,
        'min_length'    => 5,
    ])
    <!-- // mv_view_form_tinymce_end -->

    <!-- // mv_view_create_end -->

    @include('backend/_layouts/forms/submit_cancel', [
        'submit_value' => Lang::get('app.button.submit'),
        'cancel_value' => Lang::get('app.button.cancel'),
        'cancel_url'   => url('/'),
    ])

</form>
@endsection