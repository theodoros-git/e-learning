@extends('templates.dashboard.students.layout')


@section('title')
	Séquences
@stop


@section('content')
<div class="container mt-48 ml-8">

	@if ( $number == 1 )
		<div class="row">

			<div class="col-md-5"></div>

			@foreach ($sequences as $sequence)
				<div class="col-md-4">

		            <div class=" bg-image hover-overlay shadow-1-strong rounded-5 ripple mb-4" data-mdb-ripple-color="light"
		              style="height: 300px;">
		                <img src="https://mdbootstrap.com/img/new/slides/041.jpg" class="img-fluid" />
		                <a href="{{ route('students_activies_view', [$sequence->id]) }}">
		                  <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
		                </a>
		            </div>
		  
		              <!-- Article data -->
		            <div class="card">
		                <div class="row mb-3 card-body">
		                  	<div class="col-6">
			                    <a href="{{ route('students_activies_view', [$sequence->id]) }}" class="text-info">
			                      <i class="fas fa-align-left"></i>
			                      {{ $sequence->designation }}
			                    </a>
		                  	</div>
		    
		                  	<div class="col-6 text-end">
		                    	<u> </u>
		                  	</div>
		                
		                  	<h5 style="color: #229ddc; font-size: 20px;"></h5>
		  
		                	<hr />
		              	</div>
		                
		            </div>

		        </div>
		    @endforeach

	        <div class="col-md-3"></div>

		</div>
	@elseif ($number == 2)

		<div class="row">

			<div class="col-md-3"></div>

			<div class="col-md-8">

				<div class="row">

					@foreach ($sequences as $sequence)
						<div class="col-md-5 mr-16">

				            <div class=" bg-image hover-overlay shadow-1-strong rounded-5 ripple mb-4" data-mdb-ripple-color="light"
				              style="height: 300px;">
				                <img src="https://mdbootstrap.com/img/new/slides/041.jpg" class="img-fluid" />
				                <a href="{{ route('students_activies_view', [$sequence->id]) }}">
				                  <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
				                </a>
				            </div>
				  
				              <!-- Article data -->
				            <div class="card">
				                <div class="row mb-3 card-body">
				                  	<div class="col-6">
					                    <a href="{{ route('students_activies_view', [$sequence->id]) }}" class="text-info">
					                      <i class="fas fa-align-left"></i>
					                      {{ $sequence->designation }}
					                    </a>
				                  	</div>
				    
				                  	<div class="col-6 text-end">
				                    	<u> </u>
				                  	</div>
				                
				                  	<h5 style="color: #229ddc; font-size: 20px;"></h5>
				  
				                	<hr />
				              	</div>
				                
				            </div>

				        </div>

				    @endforeach

				</div>
			</div>
	
	        <div class="col-md-2"></div>

		</div>

	@elseif ($number == 3)

		<div class="row ">

			<div class="col-md-3"></div>

			<div class="col-md-8">

				<div class="row">

					@foreach ($sequences as $sequence)
						<div class="col-md-5 mr-16 mb-4">

				            <div class=" bg-image hover-overlay shadow-1-strong rounded-5 ripple mb-4" data-mdb-ripple-color="light"
				              style="height: 300px;">
				                <img src="https://mdbootstrap.com/img/new/slides/041.jpg" class="img-fluid" />
				                <a href="{{ route('students_activies_view', [$sequence->id]) }}">
				                  <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
				                </a>
				            </div>
				  
				              <!-- Article data -->
				            <div class="card">
				                <div class="row mb-3 card-body">
				                  	<div class="col-6">
					                    <a href="{{ route('students_activies_view', [$sequence->id]) }}" class="text-info">
					                      <i class="fas fa-align-left"></i>
					                      {{ $sequence->designation }}
					                    </a>
				                  	</div>
				    
				                  	<div class="col-6 text-end">
				                    	<u> </u>
				                  	</div>
				                
				                  	<h5 style="color: #229ddc; font-size: 20px;"></h5>
				  
				                	<hr />
				              	</div>
				                
				            </div>

				        </div>
				    @endforeach
					
				</div>
			</div>

		</div>

	@else

		<div class="row ">

			<div class="col-md-3"></div>

			<div class="col-md-8">

				<div class="row">

					@foreach ($sequences as $sequence)
						<div class="col-md-5 mr-16 mb-4">

				            <div class=" bg-image hover-overlay shadow-1-strong rounded-5 ripple mb-4" data-mdb-ripple-color="light"
				              style="height: 300px;">
				                <img src="https://mdbootstrap.com/img/new/slides/041.jpg" class="img-fluid" />
				                <a href="{{ route('students_activies_view', [$sequence->id]) }}">
				                  <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
				                </a>
				            </div>
				  
				              <!-- Article data -->
				            <div class="card">
				                <div class="row mb-3 card-body">
				                  	<div class="col-6">
					                    <a href="{{ route('students_activies_view', [$sequence->id]) }}" class="text-info">
					                      <i class="fas fa-align-left"></i>
					                      {{ $sequence->designation }}
					                    </a>
				                  	</div>
				    
				                  	<div class="col-6 text-end">
				                    	<u> </u>
				                  	</div>
				                
				                  	<h5 style="color: #229ddc; font-size: 20px;"></h5>
				  
				                	<hr />
				              	</div>
				                
				            </div>

				        </div>
				    @endforeach
					
				</div>
			</div>

		</div>

	@endif


	
</div>
@stop