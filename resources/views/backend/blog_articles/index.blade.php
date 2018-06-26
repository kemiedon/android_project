@extends('backend/_layouts/master', [
	'total_rows' => Lang::get('backend/blog_articles.total_rows', [
		'total_rows' => $total_rows,
	])
])

@section('document_title')
{{ Lang::get('backend/blog_articles.crud.title') }}
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
<!-- // mv_go_up_end -->

<a href="{{ route('admin.blog_articles.create') }}" class="btn btn-primary btn-sm">
    <i class="fa fa-star fa-fw"></i> {{ Lang::get('app.button.create', ['crud_title' => str_singular(Lang::get('backend/blog_articles.crud.title'))]) }}
</a>
@stop

@section('content')
<div class="table-responsive">
    <table class="table table-striped">
        <tr>

            <!-- // mv_view_th_start -->
            <th>{{ Lang::get('backend/blog_articles.label.published_date') }}</th>
            <th>{{ Lang::get('backend/blog_articles.label.picture') }}</th>
            <th>{{ Lang::get('backend/blog_articles.label.tw_name') }}</th>
            <th>{{ Lang::get('backend/blog_articles.label.tags') }}</th>
            <th width="10%">{{ Lang::get('app.label.actions') }}</th>
        </tr>

        @forelse ($blog_articles as $blog_article)
        <tr>

            <!-- // mv_view_td_start -->
            <td>{{ $blog_article->published_date }}</td>
            
            <td><img src="{{ asset('uploads/blog_articles/small/'.$blog_article->picture) }}" alt="" width="200"></td>
            <td>{{ $blog_article->tw_name }}</td>
            <td>
                @foreach($blog_article->tags  as $tag)
                    <p class="btn btn-warning btn-sm">{{$tag->tag_category->tw_category}}</p>
                @endforeach
            </td>    
            <!-- // mv_view_td_end -->

            <td nowrap="nowrap">
               
                <!-- // mv_up_down_start -->
                @if ($blog_article->order != $smallest_order)
                <a type="button" class="btn btn-default btn-sm" href="{{ route('admin.blog_articles.move_up', [$blog_article->id]) }}">
                    <i class="fa fa-arrow-up" aria-hidden="true"></i> {{ Lang::get('app.button.move_up') }}
                </a>
                @else
                <span type="button" class="btn btn-default btn-sm" disabled>
                    <i class="fa fa-arrow-up" aria-hidden="true"></i> {{ Lang::get('app.button.move_up') }}
                </span>
                @endif

                @if ($blog_article->order != $biggest_order)
                <a type="button" class="btn btn-default btn-sm" href="{{route('admin.blog_articles.move_down', [$blog_article->id])}}">
                    <i class="fa fa-arrow-down" aria-hidden="true"></i> {{ Lang::get('app.button.move_down') }}
                </a>
                @else
                <span type="button" class="btn btn-default btn-sm" disabled>
                        <i class="fa fa-arrow-down" aria-hidden="true"></i> {{ Lang::get('app.button.move_down') }}
                </span>
                @endif
                <!-- // mv_up_down_end -->
                <a type="button" class="btn btn-default btn-sm" href="{{ route('admin.blog_articles.edit', [$blog_article->id]) }}">
                    <i class="fa fa-edit" aria-hidden="true"></i> {{ Lang::get('app.button.edit') }}
                </a>

                <form action="{{ route('admin.blog_articles.destroy', [$blog_article->id]) }}" method="post" style="display: inline;">
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