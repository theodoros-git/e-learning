@extends('templates.base')


@section('title')
  Admin
@stop

@section('stylesheets')

    <style>
    
        @media only screen and (max-width: 800px) {
            #nos {
                display: none;
            }
        }

        span{
            color: #229ddc;
        }


    </style>

@stop

@section('javascripts')

@stop

@section('content')

<div class="container-fluid mt-52 mb-12">

    <div class="row">

        <div class="col-md-4"></div>

        <div class="col-md-4">

            <div class="card ">

                <div class="card-header text-center" style="font-weight: bolder; font-size: 20px; color: #1a2649;">
                Administration - LearningApp</div>

                <div class="card-body">

                     
                    <p class="card-text text-danger text-center mb-4 mt-2"><strong>
                        
                           {{ $message ?? '' }} 
                        
                    </strong></p>

                    @if(session()->has('confirmation'))
                        <div class="alert alert-info">
                            {{ session()->get('confirmation') }}
                        </div>
                    @endif
                    
                    
                    
                    <form action="{{ route('admin_signup_confirmation_form') }}" method="POST" 
                    class="text-center border border-light " >
                        @csrf
                    
                        <div class="row mb-4">

                                    <div class="col" style="text-align: left;">
                                        
                                        <label class="form-label" for="admin_confirmation">Entrez le code de confirmation</label>

                                        <div style="margin-bottom: 10px;"></div>

                                        <input type="text" id="admin_confirmation" name="admin_confirmation" class="form-control @error('admin_confirmation') is-invalid @enderror" value="{{ old('admin_confirmation') }}" />

                                        @error('admin_confirmation')

                                            <div class="alert alert-danger">{{ $message }}</div>

                                        @enderror
                                        
                                    </div>
      
                        </div>

                        

                        


                        <button class="btn btn-info my-4 "  
                            type="submit">Confirmez</button>

                    </form>
                        
                </div>

                <div class="card-footer text-muted text-center">
                    <p style="color: #1a2649;">Admin - Inscription - Confirmation</p>
                    
               
                </div>

            </div>

        </div>

        <div class="col-md-4"></div>

    </div>

</div>

@stop