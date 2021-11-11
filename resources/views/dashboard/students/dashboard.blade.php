@extends('templates.dashboard.students.layout')



@section('title')
	Welcome
@stop

@section('content')
	<div class="container">

	<div class="row">

		<div class="col-md-4"></div>
		<div class="col-md-4"></div>
		<div class="col-md-4">
			@if(session()->has('abonnementsuccess'))
			    <div class="alert alert-success">
			        {{ session()->get('abonnementsuccess') }}
			    </div>
			@endif
		</div>
	</div>


</div>
@stop
