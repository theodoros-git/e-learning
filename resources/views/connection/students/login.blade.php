@extends('templates.base')


@section('title')
  Connection - Élèves
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
                Je me connecte à mon compte Learning-App</div>

                <div class="card-body">


                    <div class="text-center"> <i class="fas fa-user-astronaut fa-3x my-5 "></i></div>
                    
                    <form action="" method="POST" 
                    class="text-center border border-light " >
                        @csrf
                    
                        <div class="row mb-4">

                                    <div class="col" style="text-align: left;">
                                        
                                        <label class="form-label" for="username">Entrez votre nom d'utilisateur</label>

                                        <div style="margin-bottom: 10px;"></div>

                                        <input type="text" id="username" name="username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}" />

                                        @error('username')

                                            <div class="alert alert-danger">{{ $message }}</div>

                                        @enderror
                                        
                                    </div>
      
                        </div>

                        <div class="row mb-4">

                                <div class="col" style="text-align: left;">
                                    
                                    <label class="form-label" for="password">Entrez votre mot de passe</label>

                                    <div style="margin-bottom: 10px;"></div>

                                    <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" />

                                    @error('password')

                                        <div class="alert alert-danger">{{ $message }}</div>

                                    @enderror
                                    
                                </div>
      
                        </div>

                        <button class="btn btn-info my-4 "  
                            type="submit">Se connecter</button>

                    </form>
                        
                </div>

                <div class="card-footer text-muted text-center">
                    <p style="color: #1a2649;">Si vous n'êtes pas encore inscrit,  
                        <a href="{{ route('signup') }}" style="color: #229ddc;"
                         class="me-4 ">Cliquez ici</a></p>
                    
               
                </div>

            </div>

        </div>

        <div class="col-md-4"></div>

    </div>

</div>

@stop