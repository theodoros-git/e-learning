@extends('templates.base')


@section('title')
  Inscription - Professeurs
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
                Maintenance</div>

                <div class="card-body">
                    
                    <div class="text-center mt-8">

                        <img
                            src="/img/maintenance.png"
                            
                            height="10"
                            alt="maintenance"
                            loading="lazy"
                        />

                    </div>

                    
                </div>

                <div class="card-footer text-muted text-center">

                    
               
                </div>

            </div>

        </div>

        <div class="col-md-4"></div>

    </div>

</div>

@stop