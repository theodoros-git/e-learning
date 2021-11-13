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

			    <source src="/media/cc0-videos/flower.webm"
			            type="video/webm">

			    <source src="/media/cc0-videos/flower.mp4"
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
		            	Les polygones
		      	</div>
		      	<div class="col-6 text-end">
                	                			
	                <a href="" class="text-info"><i class="fa fa-download" aria-hidden="true"></i>Télécharger les documents utiles liés à l'activité</a>
	                    	
              	</div>
			</div>


			<div class="row mr-16 ml-4 mt-2">
				<div class="col-12 text-info">
		            knswdjjd
		      	</div>
		      	
			</div>
		</div>
	</div>
</div>

@stop
