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


@section('content')


<form method="post" enctype="multipart/form-data" action="{{ route('admin.news_categories.update', [$news_category->id]) }}" class="form-horizontal" role="form">
    {{ csrf_field() }}
    {{ method_field('PUT') }}

    <!-- // mv_view_edit_start -->

    <!-- // mv_view_form_radio_start -->
    @include('backend/_layouts/forms/radio', [
        'name'          => 'check',
        'label'         => Lang::get('backend/news_categories.label.check'),
        'value'         => old('check') ?: $news_category->check,
        'desc'          => Lang::get('backend/news_categories.desc.check'),
        'data_provider' => [1 => '是', 0 => '否' ] ,
    ])
    <!-- // mv_view_form_radio_end -->

    <!-- // mv_view_form_select_start -->
    @include('backend/_layouts/forms/select', [
        'name'          => 'category',
        'label'         => Lang::get('backend/news_categories.label.category'),
        'value'         => old('category') ?: $news_category->category,
        'desc'          => Lang::get('backend/news_categories.desc.category'),
        'data_provider' => [1 => '公告',2 => '活動',3 => '優惠'],
    ])
    <!-- // mv_view_form_select_end -->

    <!-- // mv_view_form_text_start -->
    @include('backend/_layouts/forms/text', [
        'name'          => 'name',
        'label'         => Lang::get('backend/news_categories.label.name'),
        'value'         => old('name') ?: $news_category->name,
        'desc'          => Lang::get('backend/news_categories.desc.name'),
    ])
    <!-- // mv_view_form_text_end -->

    <!-- // mv_view_form_datepicker_start -->
    @include('backend/_layouts/forms/datepicker', [
        'name'          => 'published_at',
        'label'         => Lang::get('backend/news_categories.label.published_at'),
        'value'         => old('published_at') ?: $news_category->published_at,
        'desc'          => Lang::get('backend/news_categories.desc.published_at'),
        'date_format'   => 'yy-mm-dd',
    ])
    <!-- // mv_view_form_datepicker_end -->

    <!-- // mv_view_form_picture_start -->
    @include('backend/_layouts/forms/picture', [
        'name'          => 'picture',
        'label'         => Lang::get('backend/news_categories.label.picture'),
        'delete_box'    => NULL,
        'upload_path'   => NULL,
        'value'         => asset('uploads/news_categories/'.$picture = old('picture') ?: $news_category->picture),
        'desc'          => Lang::get('backend/news_categories.desc.picture'),
    ])
    <!-- // mv_view_form_picture_end -->

    <!-- // mv_view_form_tinymce_start -->
    @include('backend/_layouts/forms/tinymce', [
        'name'          => 'description',
        'label'         => Lang::get('backend/news_categories.label.description'),
        'required'      => '',
        'error_message' => '',
        'value'         => old('description') ?: $news_category->description,
        'desc'          => Lang::get('backend/news_categories.desc.description'),
        'height'        => 360,
        'rows'          => 20,
        'min_length'    => 5,
    ])
    <!-- // mv_view_form_tinymce_end -->

    <!-- // mv_view_edit_end -->

    @include('backend/_layouts/forms/submit_cancel', [
        'submit_value' => Lang::get('app.button.submit'),
        'cancel_value' => Lang::get('app.button.cancel'),
        'cancel_url'   => url('/'),
    ])

</form>
@endsection