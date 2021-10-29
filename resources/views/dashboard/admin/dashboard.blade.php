@extends('templates.dashboard.admin.layout')



@section('title')
	Welcome
@stop

@section('content')

<div class="container">

	<div class="row">

		<div class="col-md-4"></div>
		<div class="col-md-4"></div>
		<div class="col-md-4">
			@if(session()->has('categoryaddsuccess'))
			    <div class="alert alert-success">
			        {{ session()->get('categoryaddsuccess') }}
			    </div>
			@endif

			@if(session()->has('categorymodifysuccess'))
			    <div class="alert alert-success">
			        {{ session()->get('categorymodifysuccess') }}
			    </div>
			@endif
			@if(session()->has('courseaddsuccess'))
			    <div class="alert alert-success">
			        {{ session()->get('courseaddsuccess') }}
			    </div>
			@endif
			
		</div>
	</div>


</div>

@stop