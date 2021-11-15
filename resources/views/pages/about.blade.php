@extends('templates.base')


@section('title')
  Qui sommes-nous?
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
          <li class="breadcrumb-item"><a href="{% url 'home:index' %}" style="font-size: 13px;">Accueil</a></li>
          <li class="breadcrumb-item active" > <span style="font-size: 13px;">À propos de Learning-App</span></li>
        </ol>
    </nav>
    

</div>

<div class="container mt-20 mb-8" >

    <div class="row">

        <div class="col-md-1"></div>

        <div class="col-md-6">
            <h1 style="font-size: 30px; font-weight: bolder; color: #1a2649;" id="achanger">À propos de  Learning-App</h1>
            <br><br>
            <p style="" id="achanger">Avancer ensemble demande de la confiance. Découvrez ici qui nous sommes et ce pour quoi nous oeuvrons.</p>
            <br><br>
            
        </div>

    </div>


    <div class="container">

        <div class="row">

            <div class="col-md-1"></div>

            <div class="col-md-10">
                <h1 style="font-size: 30px; font-weight: bolder; color: #1a2649;" id="achanger">Qui sommes-nous?</h1>
                <br>
                <p style="text-align: justify;"></p>
                
            </div>

        </div>



        <div class="row mt-12">

            <div class="col-md-1"></div>

            <div class="col-md-10">

                <div class="row">

                    <div class="col-md-4">
                        <h1 style="font-size: 20px; font-weight: bold; 
                        color: #1a2649; margin-bottom: 15px;
                        font-family: Verdana, Geneva, Tahoma, sans-serif;" id="achanger">Notre vision</h1>
                        
                        <p style="text-align: left">Chaque enfant a sa place dans une famille et grandit dans un climat d’affection, de respect et de sécurité.</p>
                        
                    </div>
        
        
                    <div class="col-md-4">
                        <h1 style="font-size: 20px; font-weight: bold;
                        color: #1a2649; margin-bottom: 15px;
                        font-family: Verdana, Geneva, Tahoma, sans-serif;
                        ;" id="achanger">Notre mission</h1>
                        
                        <p style="text-align: left;">Nous donnons une famille aux enfants en difficulté,
                         les aidons à bâtir leur propre avenir et participons au développement des communautés locales.</p>
                        
                    </div>
        
        
                    <div class="col-md-4">
                        <h1 style="font-size: 20px; font-weight: bold; 
                        color: #1a2649; margin-bottom: 15px; 
                        font-family: Verdana, Geneva, Tahoma, sans-serif;" id="achanger">Nos valeurs</h1>
                        
                        <p style="text-align: justify;">
                            <ul>

                                <li> <span> COURAGE :</span> Nous agissons.</li>
                                <li><span>ENGAGEMENT :</span> Nous tenons nos promesses.</li>
                                <li><span>CONFIANCE :</span> Nous croyons en chacun de nous.</li>
                                <li><span>RESPONSABILITE :</span> Nous sommes des partenaires fiables.</li>
                                
                            </ul>
                        </p>
                        
                    </div>

                </div>

            </div>
            

        </div>


        </div>
    
    </div>


</div>


@stop