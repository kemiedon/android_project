<div class="panel panel-default">
    <div class="panel-heading">

        <h2>@yield('page_header')</h2>

        @if (!empty($total_rows))
        <span class="pull-right badge" draggable="true">{{ $total_rows }}</span>
        @endif

    </div>

    <div class="panel-body">
        @include ('backend/_layouts/parts/breadcrumbs') @if(Session::get('message'))
        <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
        @endif

        <div id="Utility" style="margin-bottom: 20px;">
            @yield ('utility')
        </div>
        @yield ('content')
    </div>

</div>

