@extends('templates.dashboard.admin.layout')



@section('title')
	Modify classe
@stop

@section('content')
<div class="container-fluid mt-48">

	<div class="row">

		<div class="col-md-4"></div>

        <div class="col-md-4">

            <div class="card ">

                <div class="card-header text-center" style="font-weight: bolder; font-size: 20px; color: #1a2649;">
                Modifier une classe - LearningApp</div>

                <div class="card-body">

                    @foreach ($classes as $category)
					 
	                    <form action="{{ route('admin_classe_modify_form', [$category->id]) }}" method="POST" 
	                    class="text-center border border-light " >
	                        @csrf
	                    
	                        <div class="row mb-4">

	                                    <div class="col-6" >
	             
	                                        <div style="margin-bottom: 10px;"></div>

	                                        <input type="text" id="classe" name="classe" class="form-control" value="{{ $category->designation }}" disabled="disabled" />
	                                    </div>

	                                    <div class="col-6" >
	                                        
	                                        

	                                        <div style="margin-bottom: 10px;"></div>

	                                        <input type="text" id="class" name="class" class="form-control @error('class') is-invalid @enderror" value="{{ old('class') }}" />

	                                        @error('class')

	                                            <div class="alert alert-danger">{{ $message }}</div>

	                                        @enderror
	                                        
	                                    </div>

	                                    <div class="col" >

	                                    	<div style="margin-bottom: 10px;"></div>

	                                    	<button class="btn btn-info  "  
	                            			type="submit" name="{{ $category->designation }}" value="{{ $category->designation }}">Valider</button>

	                           			</div>
	      
	                        </div>

	                        

	                    </form>
                    @endforeach
                        
                </div>

                <div class="card-footer text-muted text-center">
                    <p style="color: #1a2649;">Admin - Classes - Modifier une classe</p>
                    
               
                </div>

            </div>

        </div>

        <div class="col-md-4"></div>
		
	</div>
	
</div>

@stop