@extends('templates.dashboard.admin.layout')



@section('title')
	Add Learning Situation
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
                Ajouter une situation d'apprentissage - LearningApp</div>

                <div class="card-body">

                    
                    <form action="{{ route('admin_sa_add_form') }}" method="POST" 
                    class="text-center border border-light " >
                        @csrf
                    
                        <div class="row mb-4">

                                    <div class="col" style="text-align: left;">
                                        
                                        <label class="form-label" for="sa_name">Désignation de la SA</label>

                                        <div style="margin-bottom: 10px;"></div>

                                        <input type="text" id="sa_name" name="sa_name" class="form-control @error('sa_name') is-invalid @enderror" value="{{ old('sa_name') }}" />

                                        @error('sa_name')

                                            <div class="alert alert-danger">{{ $message }}</div>

                                        @enderror
                                        
                                    </div>

                                    <div class="col" style="text-align: left;">
                                    
                                        <label class="form-label" for="sa_course">Cours de la SA</label>

                                        <div style="margin-bottom: 10px;"></div>

                                        <select class="select @error('sa_course') is-invalid @enderror" id="sa_course" name="sa_course">

                                          <option value="">--Veuillez choisir le cours de la SA--</option>
                                          @foreach ($courses as $course)
                                            <option value="{{ $course->id }}">{{ $course->designation }}</option>
                                          @endforeach
                                          
                                        </select>

                                        @error('sa_course')

                                            <div class="alert alert-danger">{{ $message }}</div>

                                        @enderror
                                        
                                    </div>
      
                        </div>

                        

                        


                        <button class="btn btn-info my-4 "  
                            type="submit">Valider</button>

                    </form>
                        
                </div>

                <div class="card-footer text-muted text-center">
                    <p style="color: #1a2649;">Admin - Cours - Ajouter une SA</p>
                    
               
                </div>

            </div>

        </div>

        <div class="col-md-4"></div>
		
	</div>
	
</div>
@stop