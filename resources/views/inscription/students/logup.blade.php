@extends('templates.base')


@section('title')
  Inscription - Élèves
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

        select {

            height: 38px;
            font-size: .9rem;
            padding: 2px 5px;
            border-radius: 2px;
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
                Je m'inscris à Learning-App</div>

                <div class="card-body">
                    
                    <form action="{{ route('logup_form') }}" method="POST" 
                    class="text-center border border-light mt-10" >
                        @csrf

                        
                        <div class="row mb-4">

                                <div class="col" style="text-align: left;">

                                    <label class="form-label" for="nom">Noms</label>

                                    <div style="margin-bottom: 10px;"></div>

                                    <input type="text" id="nom" name="nom" class="form-control @error('nom') is-invalid @enderror" value="{{ old('nom') }}" />

                                    @error('nom')

                                        <div class="alert alert-danger">{{ $message }}</div>

                                    @enderror
                                    
                                </div>

                                <div class="col" style="text-align: left;">
                                    
                                    <label class="form-label" for="prenom">Prénoms</label>

                                    <div style="margin-bottom: 10px;"></div>
                                    
                                    <input type="text" id="prenom" name="prenom" class="form-control @error('prenom') is-invalid @enderror" value="{{ old('prenom') }}" />

                                    @error('prenom')

                                        <div class="alert alert-danger">{{ $message }}</div>

                                    @enderror
                                </div>

                        </div>


                        <div class="row mb-4">

                                <div class="col" style="text-align: left;">
                                    
                                    <label class="form-label" for="ecole">École fréquentée</label>

                                    <div style="margin-bottom: 10px;"></div>

                                    <input type="text" id="ecole" name="ecole" class="form-control @error('ecole') is-invalid @enderror" value="{{ old('ecole') }}" />

                                    @error('ecole')

                                        <div class="alert alert-danger">{{ $message }}</div>

                                    @enderror
                                    
                                </div>

                                <div class="col" style="text-align: left;">
                                    
                                    <label class="form-label" for="niveau">Niveau</label>

                                    <div style="margin-bottom: 10px;"></div>

                                    <select class="select @error('niveau') is-invalid @enderror" id="niveau" name="niveau">

                                      <option value="">--Veuillez choisir votre niveau--</option>
                                      <option value="troisieme">3ème</option>
                                      <option value="terminales">Terminales</option>
                                      
                                    </select>

                                    @error('niveau')

                                        <div class="alert alert-danger">{{ $message }}</div>

                                    @enderror
                                    
                                </div>

                        </div>

                        



                        <div class="row mb-4">

                                <div class="col" style="text-align: left;">
                                    
                                    <label class="form-label" for="email_tel">Email ou Téléphone</label>

                                    <div style="margin-bottom: 10px;"></div>

                                    <input type="text" id="email_tel" name="email_tel" class="form-control @error('email_tel') is-invalid @enderror" value="{{ old('email_tel') }}" />

                                    @error('email_tel')

                                        <div class="alert alert-danger">{{ $message }}</div>

                                    @enderror
                                    
                                </div>

                                <div class="col" style="text-align: left;">
                                    
                                    <label class="form-label" for="sexe">Sexe</label>

                                    <div style="margin-bottom: 10px;"></div>

                                    <select class="select @error('sexe') is-invalid @enderror" id="sexe" name="sexe">

                                      <option value="">--Veuillez choisir votre sexe--</option>
                                      <option value="M">Masculin</option>
                                      <option value="F">Féminin</option>
                                      
                                    </select>

                                    @error('sexe')

                                        <div class="alert alert-danger">{{ $message }}</div>

                                    @enderror
                                    
                                </div>

                        </div>


                        <div class="row mb-4">

                                <div class="col" style="text-align: left;">
                                    
                                    <label class="form-label" for="username">Choisissez un nom d'utilisateur</label>

                                    <div style="margin-bottom: 10px;"></div>

                                    <input type="text" id="username" name="username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}" />

                                    @error('username')

                                        <div class="alert alert-danger">{{ $message }}</div>

                                    @enderror
                                    
                                </div>
  
                        </div>


                        <div class="row mb-4">

                                <div class="col" style="text-align: left;">
                                    
                                    <label class="form-label" for="password">Mot de passe</label>

                                    <div style="margin-bottom: 10px;"></div>

                                    <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" />

                                    @error('password')

                                        <div class="alert alert-danger">{{ $message }}</div>

                                    @enderror
                                    
                                </div>

                                <div class="col" style="text-align: left;">
                                    
                                    <label class="form-label" for="confirm_password">Confirmer le mot de passe</label>

                                    <div style="margin-bottom: 10px;"></div>

                                    <input type="password" id="confirm_password" name="confirm_password" class="form-control @error('confirm_password') is-invalid @enderror"  />

                                    @error('confirm_password')

                                        <div class="alert alert-danger">{{ $message }}</div>

                                    @enderror
                                    
                                </div>

                        </div>

                        <div class="form-check d-flex justify-content-center mb-4">
                            <input
                              class="form-check-input me-2"
                              type="checkbox"
                              value=""
                              id="terms_conditions"
                              checked
                            />
                            <label class="form-check-label" for="terms_conditions">
                              J'accepte les conditions d'utilisations
                            </label>
                        </div>


                        <button class="btn btn-info my-4 "  
                            type="submit">S'inscrire</button>

                    </form>
                    

                    
                </div>

                <div class="card-footer text-muted text-center">

                    <p style="color: #1a2649;">Si vous êtes déjà inscrit,  
                        <a href="{{ route('signin') }}" style="color: #229ddc;"
                         class="me-4 ">Cliquez ici</a></p>
               
                </div>

            </div>

        </div>

        <div class="col-md-4"></div>

    </div>

</div>

@stop