@extends('backend/_layouts/master', [
	'total_rows' => Lang::get('backend/news_categories.total_rows', [
		'total_rows' => $total_rows,
	])
])

@section('document_title')
{{ Lang::get('backend/news_categories.crud.title') }}
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

<a href="{{ route('admin.news_categories.create') }}" class="btn btn-primary btn-sm">
    <i class="fa fa-star fa-fw"></i> {{ Lang::get('app.button.create', ['crud_title' => str_singular(Lang::get('backend/news_categories.crud.title'))]) }}
</a>
@stop

@section('content')
<div class="table-responsive">
    <table class="table table-striped">
        <tr>

            <!-- // mv_view_th_start -->
            <th>{{ Lang::get('backend/news_categories.label.picture') }}</th>
            <th>{{ Lang::get('backend/news_categories.label.name') }}</th>
            <!-- // mv_view_th_end -->

            <th width="10%">{{ Lang::get('app.label.actions') }}</th>
        </tr>

        @forelse ($news_categories as $news_category)
        <tr>

            <!-- // mv_view_td_start -->

            <!-- // mv_view_index_picture_start -->
            <td><img src="{{ asset('uploads/news_categories/') }}/{{ $news_category->picture }}" alt="" width="150"></td>
            <!-- // mv_view_index_picture_end -->

            <!-- // mv_view_index_text_start -->
            <td>{{ $news_category->name }}</td>
            <!-- // mv_view_index_text_end -->

            <!-- // mv_view_td_end -->

            <td nowrap="nowrap">
                <!-- // mv_view_action_start -->

                <!-- // mv_go_down_start -->
                <a type="button" class="btn btn-default btn-sm" href="">
                    {{ Lang::get('backend/news.crud.title') }}
                </a>
                <!-- // mv_go_down_end -->
                <!-- // mv_up_down_start -->
                @if ($news_category->order != $smallest_order)
                <a type="button" class="btn btn-default btn-sm" href="{{ route('admin.news_categories.move_up', [$news_category->id]) }}">
                    <i class="fa fa-arrow-up" aria-hidden="true"></i> {{ Lang::get('app.button.move_up') }}
                </a>
                @else
                <span type="button" class="btn btn-default btn-sm" disabled>
                    <i class="fa fa-arrow-up" aria-hidden="true"></i> {{ Lang::get('app.button.move_up') }}
                </span>
                @endif

                @if ($news_category->order != $biggest_order)
                <a type="button" class="btn btn-default btn-sm" href="{{route('admin.news_categories.move_down', [$news_category->id])}}">
                    <i class="fa fa-arrow-down" aria-hidden="true"></i> {{ Lang::get('app.button.move_down') }}
                </a>
                @else
                <span type="button" class="btn btn-default btn-sm" disabled>
                        <i class="fa fa-arrow-down" aria-hidden="true"></i> {{ Lang::get('app.button.move_down') }}
                </span>
                @endif
                <!-- // mv_up_down_end -->
                <a type="button" class="btn btn-default btn-sm" href="{{ route('admin.news_categories.edit', [$news_category->id]) }}">
                    <i class="fa fa-edit" aria-hidden="true"></i> {{ Lang::get('app.button.edit') }}
                </a>

                <form action="{{ route('admin.news_categories.destroy', [$news_category->id]) }}" method="post" style="display: inline;">
                    <input name="_method" type="hidden" value="DELETE">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="submit" class="btn btn-default btn-sm" onclick="return confirm('{{ Lang::get('app.message.confirm.destroy') }}')"><i class="fa fa-remove" aria-hidden="true"></i> {{ Lang::get('app.button.delete') }}</button>
                </form>
                <!-- // mv_view_action_end -->

            </td>
        </tr>
        @empty
        <tfoot>
            <tr>
                <td colspan="100">尚無資料</td>
            </tr>
        </tfoot>
        @endforelse
    </table>
</div>
@endsection