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
                    
                    
                    
                    <form action="{{ route('admin_signup_form') }}" method="POST" 
                    class="text-center border border-light " >
                        @csrf
                    
                        <div class="row mb-4">

                                    <div class="col" style="text-align: left;">
                                        
                                        <label class="form-label" for="username">Nom d'utilisateur Admin</label>

                                        <div style="margin-bottom: 10px;"></div>

                                        <input type="text" id="username" name="username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}" />

                                        @error('username')

                                            <div class="alert alert-danger">{{ $message }}</div>

                                        @enderror
                                        
                                    </div>
      
                        </div>

                        <div class="row mb-4">

                                <div class="col" style="text-align: left;">
                                    
                                    <label class="form-label" for="password_admin">Mot de passe</label>

                                    <div style="margin-bottom: 10px;"></div>

                                    <input type="password" id="password_admin" name="password_admin" class="form-control @error('password_admin') is-invalid @enderror" value="{{ old('password_admin') }}" />

                                    @error('password_admin')

                                        <div class="alert alert-danger">{{ $message }}</div>

                                    @enderror
                                    
                                </div>
      
                        </div>

                        <div class="row mb-4">

                                <div class="col" style="text-align: left;">
                                    
                                    <label class="form-label" for="password_confirmation">Confirmez le mot de passe</label>

                                    <div style="margin-bottom: 10px;"></div>

                                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" />

                                    @error('password_confirmation')

                                        <div class="alert alert-danger">{{ $message }}</div>

                                    @enderror
                                    
                                </div>
      
                        </div>


                        <button class="btn btn-info my-4 "  
                            type="submit">Valider</button>

                    </form>
                        
                </div>

                <div class="card-footer text-muted text-center">
                    <p style="color: #1a2649;">Admin - Inscription</p>
                    
               
                </div>

            </div>

        </div>

        <div class="col-md-4"></div>

    </div>

</div>

@stop