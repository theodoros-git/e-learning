@extends('templates.dashboard.admin.layout')



@section('title')
	Add category course
@stop


@section('content')
<div class="container-fluid mt-48">

	<div class="row">

		<div class="col-md-4"></div>

        <div class="col-md-4">

            <div class="card ">

                <div class="card-header text-center" style="font-weight: bolder; font-size: 20px; color: #1a2649;">
                Ajouter une catégorie - LearningApp</div>

                <div class="card-body">

                    
                    <form action="{{ route('admin_category_add_form') }}" method="POST" 
                    class="text-center border border-light " >
                        @csrf
                    
                        <div class="row mb-4">

                                    <div class="col" style="text-align: left;">
                                        
                                        <label class="form-label" for="category_course">Entrez la désignation de la catégorie de cours</label>

                                        <div style="margin-bottom: 10px;"></div>

                                        <input type="text" id="category_course" name="category_course" class="form-control @error('category_course') is-invalid @enderror" value="{{ old('category_course') }}" />

                                        @error('category_course')

                                            <div class="alert alert-danger">{{ $message }}</div>

                                        @enderror
                                        
                                    </div>
      
                        </div>

                        

                        


                        <button class="btn btn-info my-4 "  
                            type="submit">Valider</button>

                    </form>
                        
                </div>

                <div class="card-footer text-muted text-center">
                    <p style="color: #1a2649;">Admin - Catégorie - Ajouter une catégorie</p>
                    
               
                </div>

            </div>

        </div>

        <div class="col-md-4"></div>
		
	</div>
	
</div>
@stop