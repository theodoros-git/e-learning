@extends('templates.dashboard.admin.layout')



@section('title')
	Add Sequence
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
                Ajouter une séquence - LearningApp</div>

                <div class="card-body">

                    
                    <form action="{{ route('admin_seq_add_form') }}" method="POST" 
                    class="text-center border border-light " >
                        @csrf
                    
                        <div class="row mb-4">

                                    <div class="col" style="text-align: left;">
                                        
                                        <label class="form-label" for="seq_name">Désignation de la séquence</label>

                                        <div style="margin-bottom: 10px;"></div>

                                        <input type="text" id="seq_name" name="seq_name" class="form-control @error('seq_name') is-invalid @enderror" value="{{ old('seq_name') }}" />

                                        @error('seq_name')

                                            <div class="alert alert-danger">{{ $message }}</div>

                                        @enderror
                                        
                                    </div>

                                    <div class="col" style="text-align: left;">
                                    
                                        <label class="form-label" for="seq_sa">SA de la séquence</label>

                                        <div style="margin-bottom: 10px;"></div>

                                        <select class="select @error('seq_sa') is-invalid @enderror" id="seq_sa" name="seq_sa">

                                          <option value="">--Veuillez choisir la SA de la séquence--</option>
                                          @foreach ($sas as $sa)
                                            <option value="{{ $sa->id }}">{{ $sa->designation }}</option>
                                          @endforeach
                                          
                                        </select>

                                        @error('seq_sa')

                                            <div class="alert alert-danger">{{ $message }}</div>

                                        @enderror
                                        
                                    </div>
      
                        </div>

                        

                        


                        <button class="btn btn-info my-4 "  
                            type="submit">Valider</button>

                    </form>
                        
                </div>

                <div class="card-footer text-muted text-center">
                    <p style="color: #1a2649;">Admin - Cours - Ajouter une séquence</p>
                    
               
                </div>

            </div>

        </div>

        <div class="col-md-4"></div>
		
	</div>
	
</div>
@stop