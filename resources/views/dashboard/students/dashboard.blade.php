@extends('templates.dashboard.students.layout')



@section('title')
	Welcome
@stop

@section('content')
	{{ $now['day'] }}
	{{ $student }}
@stop
