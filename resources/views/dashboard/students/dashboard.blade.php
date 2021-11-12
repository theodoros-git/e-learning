@extends('templates.dashboard.students.layout')

@section('jsdashcar')
<script type="text/javascript">
	var temps = {{ $secondes }};
	var timer =setInterval('CompteaRebour()',1000);
	function CompteaRebour(){

	  temps-- ;
	  j = parseInt(temps) ;
	  h = parseInt(temps/3600) ;
	  m = parseInt((temps%3600)/60) ;
	  s = parseInt((temps%3600)%60) ;
	  document.getElementById('minutes').innerHTML= (h<10 ? "0"+h : h) + '  h :  ' +
	                                                (m<10 ? "0"+m : m) + ' mn : ' +
	                                                (s<10 ? "0"+s : s) + ' s ';
	if ((s == 0 && m ==0 && h ==0)) {
	   clearInterval(timer);
	   url = "{{ route('unauthorized_students') }}"
	   Redirection(url)
	}
	}
	function Redirection(url) {
	setTimeout("window.location=url", 500)
	}
</script>
@stop

@section('title')
	Welcome
@stop

@section('content')
	<div class="container">

	<div class="row">

		<div class="col-md-4"></div>
		<div class="col-md-4">
			@if ($secondes <= 3600*24 )
				<span style="font-size: 15px;">Il vous reste comme temps</span>
				<div id="minutes" style="font-size: 15px; color: red;"></div></span>
			@else
				<div>
					<span style="font-size: 15px;">Il vous reste comme temps</span>
					<div id="minutes" style="font-size: 15px; color: green;"></div></span> 
				</div>
			@endif
		</div>
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
