@extends('templates.dashboard.students.layout')



@section('title')
	Activité - Vidéo
@stop

@section('content')
<div class="container">

	<div class="row mt-40">

		<div class="col-md-3"></div>
		<div class="col-md-9">
			<video controls width="880">

			    <source src="/uploads/{{ $activity->url }}"
			            type="video/mp4">

			    

			    Sorry, your browser doesn't support embedded videos.
			</video>
		</div>
	</div>

	<div class="row mt-12">

		<div class="col-md-3"></div>	
		
		<div class="col-md-9">

			<div class="row mr-16 ml-4">
				<div class="col-6 text-info">			                    
		              <i class="fas fa-align-left"></i>
		            	{{ $activity->designation }}
		      	</div>
		      	<div class="col-6 text-end">
                	                			
	                <a href="{{ route('students_activity_files', [$activity->id]) }}" class="text-info"><i class="fa fa-download" aria-hidden="true"></i>Télécharger les documents utiles liés à l'activité</a>
	                    	
              	</div>
			</div>


			<div class="row mr-16 ml-4 mt-2">
				<div class="col-md-12 ">
		            <div class="card">
		            	<div class="card-header text-info">
		            		Description
		            	</div>
		            	<div class="card-body">
		            		@if ( !empty($activity->description) )
		            			<p style="text-align: justify;"> {{ $activity->description }}</p>
		            		@else
		            			<p style="text-align: center;"> Pas de description pour cette vidéo...</p>
		            		@endif
		            	</div>
		            	<div class="card-footer text-center">
		            		Merci pour votre attention!!
		            	</div>
		            </div>

		      	</div>
		      	
			</div>
		</div>
	</div>
</div>

@stop
