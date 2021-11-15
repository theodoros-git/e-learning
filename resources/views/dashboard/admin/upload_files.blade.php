@extends('templates.dashboard.admin.layout')



@section('title')
	Upload files for activity
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
                Uploader des fichiers - LearningApp</div>

                <div class="card-body">

                    
                    <form action="{{ route('admin_upload_files_form') }}" method="POST" 
                    class="text-center border border-light " enctype="multipart/form-data">
                        @csrf
                    
                        
                        <div class="row mb-4" style="text-align: left;">
                        
                            <label class="form-label" for="activity">Choisissez l'activité</label>

                            <div style="margin-bottom: 10px;"></div>

                            <select class="select @error('activity') is-invalid @enderror" id="activity" name="activity">

                              <option value="">--Veuillez choisir l'activité--</option>
                              @foreach ($activities as $activity)
                                <option value="{{ $activity->id }}">{{ $activity->designation }}</option>
                              @endforeach
                              
                            </select>

                            @error('activity')

                                <div class="alert alert-danger">{{ $message }}</div>

                            @enderror
                            
                        </div>

                        <div class="row mb-4">

                                <div class="col" style="text-align: left;">
                                    
                                    <label class="form-label" for="files">Uploader les fichiers associés</label>

                                    <div style="margin-bottom: 10px;"></div>

                                    <input type="file" id="files" name="files[]" class="form-control @error('files') is-invalid @enderror" multiple />

                                    @error('files')

                                        <div class="alert alert-danger">{{ $message }}</div>

                                    @enderror
                                    
                                </div>
  
                        </div>

                        

                        


                        <button class="btn btn-info my-4 "  
                            type="submit">Valider</button>

                    </form>
                        
                </div>

                <div class="card-footer text-muted text-center">
                    <p style="color: #1a2649;">Admin - Cours - Uploader des fichiers</p>
                    
               
                </div>

            </div>

        </div>

        <div class="col-md-4"></div>
		
	</div>
	
</div>
@stop