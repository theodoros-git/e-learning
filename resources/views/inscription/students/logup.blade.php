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