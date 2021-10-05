@extends('templates.base')


@section('title')
  Contactez-nous
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

<div class="container mt-36" >

    <nav aria-label="breadcrumb" style="margin-left: 40px;" id="nos">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('index') }}" style="font-size: 13px;">Accueil</a></li>
          <li class="breadcrumb-item active"> <span style="font-size: 13px; color: #229ddc;">Contactez-nous</span></li>
        </ol>
    </nav>
    

</div>

<div class="container mt-16" >
    <div class="row">

        <div class="col-md-1"></div>

        <div class="col-md-6">
            <h1 style="font-size: 30px; font-weight: bolder; color: #1a2649;" id="achanger">Contactez Learning-App</h1>
            <br><br>
            <p style="" id="achanger">Vous avez une question, une remarque ou une idée ? Contactez-nous !</p>
            <br><br>
            <p style="" id="achanger">Vous souhaitez nous faire parvenir des idées d'innovation à notre application ? Veuillez nous écrire ou nous contactez. </p>
            <br><br>
        </div>

    </div>

    <div class="container" >

        <div class="row">

            <div class="col-md-1"></div>

            

            <div class="col-md-6" style="margin-left: px;">
                <div class="card ">

                    <div class="card-header mt-4" style="font-weight: bolder; padding-bottom: 13px; padding-top:; font-size: 20px; color: #1a2649;">
                    Contactez-nous</div>

                    <div class="card-body">
                      
                      <p class="card-text" style="text-align: justify;">
                        Notre équipe est à votre disposition pour répondre à toutes vos questions. Envoyez-nous un
                        message via le formulaire ci-dessous et nous vous recontacterons dès que possible.
                      </p>
                      <br>

                      
                        <form class="text-center border border-light " action="{{ route('contact_form') }}" method="POST">
                            @csrf

                            <div class="row mb-4">

                                <div class="col" style="text-align: left;">

                                    <label class="form-label" for="nom">Noms & Prénoms</label>

                                    <div style="margin-bottom: 10px;"></div>

                                    <input type="text" id="nom" name="nom" class="form-control @error('nom') is-invalid @enderror" value="{{ old('nom') }}" />

                                    @error('nom')

                                        <div class="alert alert-danger">{{ $message }}</div>

                                    @enderror

                                </div>



                                <div class="col" style="text-align: left;">

                                    <label class="form-label" for="email">Email</label>
                                    
                                    <div style="margin-bottom: 10px;"></div>

                                    <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" />

                                    @error('email')

                                        <div class="alert alert-danger">{{ $message }}</div>

                                    @enderror
                                    
                                </div>

                            </div>


                            <div class="mb-4" style="text-align: left;">

                                
                                <label class="form-label" for="objet">Objet</label>
                                    
                                <div style="margin-bottom: 10px;"></div>

                                <input type="text" id="objet" name="objet" class="form-control @error('objet') is-invalid @enderror" value="{{ old('objet') }}" />

                                @error('objet')

                                    <div class="alert alert-danger">{{ $message }}</div>

                                @enderror
                                

                            </div>
                            
                            <div class="mb-4" style="text-align: left;">

                                <label class="form-label" for="message">Votre message</label>

                                <div style="margin-bottom: 10px;"></div>

                                <textarea class="form-control @error('message') is-invalid @enderror" id="message" rows="4" name="message" value="{{ old('message') }}"></textarea>


                                @error('message')

                                    <div class="alert alert-danger">{{ $message }}</div>

                                @enderror
                                

                            </div>
                            

                            <button class="btn btn-info my-4 " style="background-color: #229ddc;" type="submit">Envoyer</button>

                            

                        </form>
                        
                      
                    </div>

                    
                </div>
            </div>

            <div class="col-md-3" style="">

                <div class="card ">

                    <div class="card-header" style="font-weight: bolder; font-size: 20px; color: #1a2649;">
                    Vous préférez nous parler de vive voix ?</div>

                    <div class="card-body">
                      
                      <p class="card-text" style="text-align: justify;">
                        Nous sommes disponibles par téléphone tous les jours entre 8h et 22h
                        au numéro +229 97 22 79 87 et par e-mail via <a style="color: #229ddc; text-decoration: underline;" href="malto:kossitheodore@gmail.com"> 
                        kossitheodore@gmail.com </a>
                      </p>
                      <br>

                      
                      <br>

                      
                      
                    </div>

                    <div class="card-footer text-muted text-center">

                        <a style="color: #229ddc; text-decoration: underline;" href="" class="me-4 ">
                        <i class="fab fa-facebook-f"></i>
                        </a>

                        <a style="color: #229ddc; text-decoration: underline;" href="" class="me-4 ">
                            <i class="fab fa-twitter"></i>
                        </a>
                        
                        <a style="color: #229ddc; text-decoration: underline;" href="" class="me-4 ">
                            <i class="fab fa-instagram"></i>
                        </a>

                        <a style="color: #229ddc; text-decoration: underline;" href="" class="me-4 ">
                            <i class="fab fa-linkedin"></i>
                        </a>
                    </div>
                </div>

            </div>

        </div>

    </div>

</div>


<div class="container mt-16 mb-8"> 

    <div class="row">

        <div class="col-md-1"></div>

        <div class="col-md-5">
            <h2 style="font-size: 30px; font-weight: bolder; color: #1a2649;">Notre équipe</h2>

            <br>

            <p style="text-align: justify;">Avez-vous une question, une remarque ou une idée que vous souhaitez partager directement avec 
            l'un des membres de notre équipe ? Vous trouverez ci-dessous 
            les coordonnées de nos différents membres.</p>

        </div>

    </div>

    <div class="row mt-16">

        <div class="col-md-1"></div>

        <div class="col-md-2">
            
            <div class="card testimonial-card">

                
                <div class="card-up indigo lighten-1"></div>
            
                
                <div class="avatar mx-auto white">
                <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20%2810%29.jpg" class="rounded-circle"
                    alt="">
                </div>
            
                
                <div class="card-body">
                    <br>
                    <h4 class="card-title text-center" style="color: #1a2649;">Anna Doe</h4>
                    <hr>
                    
                    <div class="text-center"><br>
                    <p><a style="color: #229ddc; text-decoration: underline;" href="mailto:uuzergygi">eogjujyijyizjyu</a></p>
                    <p>+229 96 58 58 58</p>
                    </div>

                </div>
            
            </div>
            

        </div>


        <div class="col-md-2">
            
            <div class="card testimonial-card">

                
                <div class="card-up indigo lighten-1"></div>
            
                
                <div class="avatar mx-auto white">
                <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20%2810%29.jpg" class="rounded-circle"
                    alt="">
                </div>
            
                
                <div class="card-body">
                    <br>
                    <h4 class="card-title text-center" style="color: #1a2649;">Anna Doe</h4>
                    <hr>
                    
                    <div class="text-center"><br>
                    <p><a style="color: #229ddc; text-decoration: underline;" href="mailto:uuzergygi">eogjujyijyizjyu</a></p>
                    <p>+229 96 58 58 58</p>
                    </div>

                </div>
            
            </div>
            

        </div>



        <div class="col-md-2">
            
            <div class="card testimonial-card">

                
                <div class="card-up indigo lighten-1"></div>
            
                
                <div class="avatar mx-auto white">
                <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20%2810%29.jpg" class="rounded-circle"
                    alt="">
                </div>
            
                
                <div class="card-body">
                    <br>
                    <h4 class="card-title text-center" style="color: #1a2649;">Anna Doe</h4>
                    <hr>
                    
                    <div class="text-center"><br>
                    <p><a style="color: #229ddc; text-decoration: underline;" href="mailto:uuzergygi">eogjujyijyizjyu</a></p>
                    <p>+229 96 58 58 58</p>
                    </div>

                </div>
            
            </div>
            

        </div>



        <div class="col-md-2">
            
            <div class="card testimonial-card">

                
                <div class="card-up indigo lighten-1"></div>
            
                
                <div class="avatar mx-auto white">
                <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20%2810%29.jpg" class="rounded-circle"
                    alt="">
                </div>
            
                
                <div class="card-body">
                    <br>
                    <h4 class="card-title text-center" style="color: #1a2649;">Anna Doe</h4>
                    <hr>
                    
                    <div class="text-center"><br>
                    <p><a style="color: #229ddc; text-decoration: underline;" href="mailto:uuzergygi">eogjujyijyizjyu</a></p>
                    <p>+229 96 58 58 58</p>
                    </div>

                </div>
            
            </div>
            

        </div>



        <div class="col-md-2">
            
            <div class="card testimonial-card">

                
                <div class="card-up indigo lighten-1"></div>
            
                
                <div class="avatar mx-auto white">
                <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20%2810%29.jpg" class="rounded-circle"
                    alt="">
                </div>
            
                
                <div class="card-body">
                    <br>
                    <h4 class="card-title text-center" style="color: #1a2649;">Anna Doe</h4>
                    <hr>
                    
                    <div class="text-center"><br>
                    <p><a style="color: #229ddc; text-decoration: underline;" href="mailto:uuzergygi">eogjujyijyizjyu</a></p>
                    <p>+229 96 58 58 58</p>
                    </div>

                </div>
            
            </div>
            

        </div>

    </div>



    <div class="row mt-16">

        <div class="col-md-1"></div>

        <div class="col-md-6">
            

            <p style="text-align: justify;">Vous souhaitez rejoindre l'équipe 
            de Learning-App ? Consultez nos <a style="color: #229ddc; 
            text-decoration: underline;" href="">offres d'emploi</a> ou envoyez-nous
            votre candidature spontanée (CV + lettre de motivation) à 
            l'adresse <a style="color: #229ddc; text-decoration: underline;" href="mailto:kossitheodore@gmail.com">
                kossitheodore@gmail.com</a> Merci !</p>

        </div>

    </div>

</div>


@stop