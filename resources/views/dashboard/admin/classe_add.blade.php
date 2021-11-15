@extends('templates.dashboard.admin.layout')



@section('title')
	Add Class
@stop

@section('stylesheets')

    <style>
    
        select {

            height: 38px;
            font-size: .9rem;
            padding: 2px 5px;
            border-radius: 2px;
        }


    </style>

@stop


@section('content')
<div class="container-fluid mt-48">

	<div class="row">

		<div class="col-md-4"></div>

        <div class="col-md-4">

            <div class="card ">

                <div class="card-header text-center" style="font-weight: bolder; font-size: 20px; color: #1a2649;">
                Ajouter une classe - LearningApp</div>

                <div class="card-body">

                    
                    <form action="{{ route('admin_classe_add_form') }}" method="POST" 
                    class="text-center border border-light " >
                        @csrf
                    
                        <div class="row mb-4">

                                    <div class="col" style="text-align: left;">
                                        
                                        <label class="form-label" for="classe_name">Désignation de la classe</label>

                                        <div style="margin-bottom: 10px;"></div>

                                        <input type="text" id="classe_name" name="classe_name" class="form-control @error('classe_name') is-invalid @enderror" value="{{ old('classe_name') }}" />

                                        @error('classe_name')

                                            <div class="alert alert-danger">{{ $message }}</div>

                                        @enderror
                                        
                                    </div>

      
                        </div>

                        

                        


                        <button class="btn btn-info my-4 "  
                            type="submit">Valider</button>

                    </form>
                        
                </div>

                <div class="card-footer text-muted text-center">
                    <p style="color: #1a2649;">Admin - Classe - Ajouter une classe</p>
                    
               
                </div>

            </div>

        </div>

        <div class="col-md-4"></div>
		
	</div>
	
</div>
@stop