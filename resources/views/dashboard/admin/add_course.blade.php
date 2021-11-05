@extends('templates.dashboard.admin.layout')



@section('title')
	Add course
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
                Ajouter un cours - LearningApp</div>

                <div class="card-body">

                    
                    <form action="{{ route('admin_course_add_form') }}" method="POST" 
                    class="text-center border border-light " >
                        @csrf
                    
                        <div class="row mb-4">

                                    <div class="col" style="text-align: left;">
                                        
                                        <label class="form-label" for="course_name">Désignation du cours</label>

                                        <div style="margin-bottom: 10px;"></div>

                                        <input type="text" id="course_name" name="course_name" class="form-control @error('course_name') is-invalid @enderror" value="{{ old('course_name') }}" />

                                        @error('course_name')

                                            <div class="alert alert-danger">{{ $message }}</div>

                                        @enderror
                                        
                                    </div>

                                    <div class="col" style="text-align: left;">
                                    
                                        <label class="form-label" for="course_category">Catégorie de cours</label>

                                        <div style="margin-bottom: 10px;"></div>

                                        <select class="select @error('course_category') is-invalid @enderror" id="course_category" name="course_category">

                                          <option value="">--Veuillez choisir la catégorie de cours--</option>
                                          @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->designation }}</option>
                                          @endforeach
                                          
                                        </select>

                                        @error('course_category')

                                            <div class="alert alert-danger">{{ $message }}</div>

                                        @enderror
                                        
                                    </div>
      
                        </div>

                        

                        


                        <button class="btn btn-info my-4 "  
                            type="submit">Valider</button>

                    </form>
                        
                </div>

                <div class="card-footer text-muted text-center">
                    <p style="color: #1a2649;">Admin - Cours - Ajouter un cours</p>
                    
               
                </div>

            </div>

        </div>

        <div class="col-md-4"></div>
		
	</div>
	
</div>
@stop