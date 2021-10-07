@extends('templates.base1')


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

        <div class="col-md-1">
            
        </div>
        <div class="col-md-7">
            
            <div class="card ">

                <div class="card-header text-center" style="font-weight: bolder; font-size: 20px; color: #1a2649;">
                Vos informations</div>

                <div class="card-body">
                    
                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col"> <strong> Noms & Prénoms </strong></th>
                          <th scope="col"><strong>École fréquentée</strong></th>
                          <th scope="col"><strong>Niveau</strong></th>
                        </tr>
                      </thead>
                      <tbody>
                        
                        <tr class="table-success">
                          <th scope="row">Success</th>
                          <td>Cell</td>
                          <td>Cell</td>
                        </tr>
                        
                      </tbody>
                    </table>

                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col"><strong>Nom d'utilisateur</strong></th>
                          <th scope="col"><strong>Sexe</strong></th>
                          <th scope="col"><strong>Email ou Téléphone</strong></th>
                        </tr>
                      </thead>
                      <tbody>
                        
                        <tr class="table-success">
                          <th scope="row">Success</th>
                          <td>Cell</td>
                          <td>Cell</td>
                        </tr>
                        
                      </tbody>
                    </table>
                    

                    
                </div>

                <div class="card-footer text-muted text-center">

                    
               
                </div>

            </div>
        </div>



        <div class="col-md-3">

            <div class="card ">

                <div class="card-header text-center" style="font-weight: bolder; font-size: 20px; color: #1a2649;">
                Je confirme mon inscription à Learning-App</div>

                <div class="card-body">
                    
                    <div class="text-center"> <button onclick="addToast()" class="btn btn-info my-4">Confirmez votre inscription</button></div>
                    <script>
                        function addToast(){
                            $.Toast("Inscription", "Inscription validée. Je vous remercie", "success", {
                                appendTo:"body",
                                has_icon:true,
                                has_close_btn:true,
                                stack: true,
                                fullscreen:false,
                                timeout:5000,
                                sticky:false,
                                has_progress:true,
                                rtl:false,
                                position_class:"toast-top-right",

                            });
                        }
                    </script>
                    

                    
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