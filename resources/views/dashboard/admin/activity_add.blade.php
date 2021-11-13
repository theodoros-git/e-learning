@extends('templates.dashboard.admin.layout')



@section('title')
	Add activity
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
                Ajouter une activité - LearningApp</div>

                <div class="card-body">

                    
                    <form action="{{ route('admin_activity_add_form') }}" method="POST" 
                    class="text-center border border-light " enctype="multipart/form-data">
                        @csrf
                    
                        <div class="row mb-4">

                                    <div class="col" style="text-align: left;">
                                        
                                        <label class="form-label" for="activity_name">Désignation de l'activité</label>

                                        <div style="margin-bottom: 10px;"></div>

                                        <input type="text" id="activity_name" name="activity_name" class="form-control @error('activity_name') is-invalid @enderror" value="{{ old('activity_name') }}" />

                                        @error('activity_name')

                                            <div class="alert alert-danger">{{ $message }}</div>

                                        @enderror
                                        
                                    </div>

                                    <div class="col" style="text-align: left;">
                                    
                                        <label class="form-label" for="activity_seq">Séquence de l'activité</label>

                                        <div style="margin-bottom: 10px;"></div>

                                        <select class="select @error('activity_seq') is-invalid @enderror" id="activity_seq" name="activity_seq">

                                          <option value="">--Veuillez choisir le cours de la SA--</option>
                                          @foreach ($sequences as $sequence)
                                            <option value="{{ $sequence->id }}">{{ $sequence->designation }}</option>
                                          @endforeach
                                          
                                        </select>

                                        @error('activity_seq')

                                            <div class="alert alert-danger">{{ $message }}</div>

                                        @enderror
                                        
                                    </div>

                                    
      
                        </div>

                        <div class="row mb-4">

                                <div class="col" style="text-align: left;">
                                    
                                    <label class="form-label" for="file">Uploader la vidéo correspondante</label>

                                    <div style="margin-bottom: 10px;"></div>

                                    <input type="file" id="file" name="file" class="form-control @error('file') is-invalid @enderror" value="{{ old('file') }}" />

                                    @error('file')

                                        <div class="alert alert-danger">{{ $message }}</div>

                                    @enderror
                                    
                                </div>
  
                        </div>

                        

                        

                        


                        <button class="btn btn-info my-4 "  
                            type="submit">Valider</button>

                    </form>
                        
                </div>

                <div class="card-footer text-muted text-center">
                    <p style="color: #1a2649;">Admin - Cours - Ajouter une activité</p>
                    
               
                </div>

            </div>

        </div>

        <div class="col-md-4"></div>
		
	</div>
	
</div>
@stop