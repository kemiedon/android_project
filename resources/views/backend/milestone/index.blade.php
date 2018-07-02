@extends('backend/_layouts/master', [
	'total_rows' => Lang::get('backend/milestone.total_rows', [
		'total_rows' => $total_rows,
	])
])

@section('document_title')
{{ Lang::get('backend/milestone.crud.title') }}
@stop

@section('page_header')
{{ Lang::get('backend/milestone.crud.title') }}
@stop

@section('breadcrumb')
<!-- // mv_breadcrumb_start -->
<li><a href="{{ route('admin.teams.index') }}" >{{ Lang::get('backend/teams.crud.title') }}</a></li>
<li>{{ $team->subject }}</li><!-- // mv_breadcrumb_end -->
@stop

@section('utility')
<!-- // mv_go_up_start -->
<a href="{{ route('admin.teams.index') }}" class="btn btn-default btn-sm">
    <i class="fa fa-reply"></i> {{ Lang::get('app.button.go_up', ['crud_title' => Lang::get('backend/teams.crud.title')]) }}
</a>
<!-- // mv_go_up_end -->

<a href="{{ route('admin.milestone.create', [$team->id]) }}" class="btn btn-primary btn-sm">
    <i class="fa fa-star fa-fw"></i> {{ Lang::get('app.button.create', ['crud_title' => str_singular(Lang::get('backend/milestone.crud.title'))]) }}
</a>
@stop

@section('content')
<div class="table-responsive">
    <table class="table table-striped">
        <tr>

            <!-- // mv_view_th_start -->
<th>{{ Lang::get('backend/milestone.label.name') }}</th><!-- // mv_view_th_end -->

            <th width="10%">{{ Lang::get('app.label.actions') }}</th>
        </tr>

        @forelse ($milestone as $milestone)
        <tr>

            <!-- // mv_view_td_start -->
            <td>{{ $milestone->name }}</td>
            <!-- // mv_view_td_end -->

            <td nowrap="nowrap">
                <!-- // mv_view_action_start -->

                <!-- // mv_go_down_start -->
                <a type="button" class="btn btn-default btn-sm" href = "{{ route('admin.files.index', [$team->id, $milestone->id]) }}">
                    {{ Lang::get('backend/files.crud.title') }}
                </a>
                <!-- // mv_go_down_end -->
                <a type="button" class="btn btn-default btn-sm" href="{{ route('admin.milestone.edit', [$team->id, $milestone->id]) }}">
                    <i class="fa fa-edit" aria-hidden="true"></i> {{ Lang::get('app.button.edit') }}
                </a>

                <form action="{{ route('admin.milestone.destroy', [$team->id, $milestone->id]) }}" method="post" style="display: inline;">
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