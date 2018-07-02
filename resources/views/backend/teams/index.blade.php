@extends('backend/_layouts/master', [
	'total_rows' => Lang::get('backend/teams.total_rows', [
		'total_rows' => $total_rows,
	])
])

@section('document_title')
{{ Lang::get('backend/teams.crud.title') }}
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
<!-- // mv_go_up_end -->

<a href="{{ route('admin.teams.create') }}" class="btn btn-primary btn-sm">
    <i class="fa fa-star fa-fw"></i> {{ Lang::get('app.button.create', ['crud_title' => str_singular(Lang::get('backend/teams.crud.title'))]) }}
</a>
@stop

@section('content')
<div class="table-responsive">
    <table class="table table-striped">
        <tr>

            <!-- // mv_view_th_start -->
<th>{{ Lang::get('backend/teams.label.picture') }}</th><th>{{ Lang::get('backend/teams.label.name') }}</th><th>{{ Lang::get('backend/teams.label.subject') }}</th><th>{{ Lang::get('backend/teams.label.score') }}</th><!-- // mv_view_th_end -->

            <th width="10%">{{ Lang::get('app.label.actions') }}</th>
        </tr>

        @forelse ($team as $team)
        <tr>

            <!-- // mv_view_td_start -->
            <td><img src="{{ asset('uploads/team/') }}/{{ $team->picture }}" alt="" width="150"></td>
                        <td>{{ $team->name }}</td>
                        <td>{{ $team->subject }}</td>
                        <td>{{ $team->score }}</td>
            <!-- // mv_view_td_end -->

            <td nowrap="nowrap">
                <!-- // mv_view_action_start -->

                <!-- // mv_go_down_start -->
                <a type="button" class="btn btn-default btn-sm" href = "{{ route('admin.milestone.index', [$team->id]) }}">
                    {{ Lang::get('backend/milestone.crud.title') }}
                </a>
               
                <a type="button" class="btn btn-default btn-sm" href="{{ route('admin.teams.edit', [$team->id]) }}">
                    <i class="fa fa-edit" aria-hidden="true"></i> {{ Lang::get('app.button.edit') }}
                </a>

                <form action="{{ route('admin.teams.destroy', [$team->id]) }}" method="post" style="display: inline;">
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