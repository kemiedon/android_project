@extends('backend/_layouts/master')

@section('document_title')
{{ Lang::get('backend/blog_articles.crud.title') }}
@stop

@section('head')
@stop

@section('page_header')
{{ Lang::get('backend/blog_articles.crud.title') }}
@stop

@section('breadcrumb')
<!-- // mv_breadcrumb_start -->
<li>{{ Lang::get('backend/blog_articles.crud.title') }}</li><!-- // mv_breadcrumb_end -->
@stop
@section('utility')
<!-- // mv_go_up_start -->
<a href="{{ route('admin.blog_articles.index') }}" class="btn btn-default btn-sm">
    <i class="fa fa-reply"></i> {{ Lang::get('app.button.go_up', ['crud_title' => Lang::get('backend/blog_articles.crud.title')]) }}
</a>
<!-- // mv_go_up_end -->
@stop
@section('content')
<form method="post" enctype="multipart/form-data" action="{{ route('admin.blog_articles.store') }}" class="form-horizontal" role="form">
    {{ csrf_field() }}
    <!-- // mv_view_create_start -->
    @include('backend/_layouts/forms/hidden', [
        'name'          => "blog_category_id",
        'label'         => Lang::get('backend/blog_articles.label.blog_category_id'),
        'value'         => old("blog_category_id"),
        'desc'          => Lang::get('backend/blog_articles.desc.blog_category_id'),
    ])
        @include('backend/_layouts/forms/datepicker', [
        'name'          => "published_date",
        'label'         => Lang::get('backend/blog_articles.label.published_date'),
        'value'         => old("published_date"),
        'desc'          => Lang::get('backend/blog_articles.desc.published_date'),
        'date_format'   => 'yy-mm-dd',
    ])
    @include('backend/_layouts/forms/picture', [
        'name'          => "picture",
        'label'         => Lang::get('backend/blog_articles.label.picture'),
        'delete_box'    => NULL,
        'upload_path'   => asset('uploads/blog_articles'),
        'value'         => NULL,
        'desc'          => Lang::get('backend/blog_articles.desc.picture'),
    ])
      @include('backend/_layouts/forms/text', [
        'name'          => "tw_name",
        'label'         => Lang::get('backend/blog_articles.label.tw_name'),
        'value'         => old("tw_name"),
        'desc'          => Lang::get('backend/blog_articles.desc.tw_name'),
    ])
    @include('backend/_layouts/forms/textarea', [
        'name'          => "tw_intro",
        'required'      => '',
        'error_message' => '',
        'rows'          => 20,
        'min_length'    => 3,
        'label'         => Lang::get('backend/blog_articles.label.tw_intro'),
        'value'         => old("tw_intro"),
        'desc'          => Lang::get('backend/blog_articles.desc.tw_intro'),
    ])
        @include('backend/_layouts/forms/tinymce', [
        'name'          => "tw_description",
        'label'         => Lang::get('backend/blog_articles.label.tw_description'),
        'required'      => '',
        'error_message' => '',
        'value'         => old("tw_description"),
        'desc'          => Lang::get('backend/blog_articles.desc.tw_description'),
        'height'        => 360,
        'rows'          => 20,
        'min_length'    => 5,
    ])
        @include('backend/_layouts/forms/text', [
        'name'          => "link",
        'label'         => Lang::get('backend/blog_articles.label.link'),
        'value'         => old("link"),
        'desc'          => Lang::get('backend/blog_articles.desc.link'),
    ])
        @include('backend/_layouts/forms/checkbox', [
        'name'          => 'tags',
        'label'         => Lang::get('backend/blog_articles.label.tags'),
        'value'         => old('tags'),
        'desc'          => Lang::get('backend/blog_articles.desc.tags'),
        'data_provider' => $tags ,
    ])
    <!-- // mv_view_create_end -->

    @include('backend/_layouts/forms/submit_cancel', [
        'submit_value' => Lang::get('app.button.submit'),
        'cancel_value' => Lang::get('app.button.cancel'),
        'cancel_url'   => url('/'),
    ])

</form>
@endsection