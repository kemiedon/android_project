@extends('backend/_layouts/master')

@section('document_title')
{{ Lang::get('app.name') }} {{ Lang::get('app.cms') }}
@stop

@section('page_header')
{{ Lang::get('app.home') }}
@stop

@section('content')
{{ Lang::get('app.message.welcome') }}
@endsection