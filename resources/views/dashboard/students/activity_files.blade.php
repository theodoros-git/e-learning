@extends('templates.dashboard.students.layout')



@section('title')
	Activité - Vidéo
@stop

@section('content')
<div class="container">

	<div class="row mt-40">

		<div class="col-md-4"></div>
		<div class="col-md-6">
			<div class="card">
				<div class="card-header text-info">
					Les fichers à télécharger
				</div>
				<div class="card-body">
					@foreach ($activity as $activite)
						<b>{{ $compte++ }}:</b> {{ $activite->url}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="{{ route('students_download', [$activite->url]) }}" class="text-info"> Cliquez ici pour télécharger </a> <hr>
					@endforeach
				</div>
				<div class="card-footer">
					Merci pour votre attention!!
				</div>
			</div>
		</div>
	</div>

	
</div>

@stop
