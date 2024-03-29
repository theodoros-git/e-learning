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

        <div class="col-md-2">
            
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
                          <th scope="row">{{ $nom ?? ''}}</th>
                          <td>{{ $ecole ?? '' }}</td>
                          <td>{{ $niveau ?? '' }}</td>
                        </tr>
                        
                      </tbody>
                    </table>

                    <table class="table mt-10">
                      <thead>
                        <tr>
                          <th scope="col"><strong>Nom d'utilisateur</strong></th>
                          <th scope="col"><strong>Sexe</strong></th>
                          <th scope="col"><strong>Email ou Téléphone</strong></th>
                        </tr>
                      </thead>
                      <tbody>
                        
                        <tr class="table-success">
                          <th scope="row">{{ $username ?? '' }}</th>
                          <td>{{ $sexe ?? '' }}</td>
                          <td>{{ $email_tel ?? '' }}</td>
                        </tr>
                        
                      </tbody>
                    </table>
                    

                    
                </div>

                <div class="card-footer text-muted text-center">
                    <form action="{{ route('logup_confirmation') }}" method="POST">

                        @csrf
                        <div class="text-center"> <button onclick="addToast()" class="btn btn-info my-4" type="submit">Je confirme</button></div>
                    </form>


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

            </div>
        </div>



        
        </div>

        <div class="col-md-4"></div>

    </div>

</div>

@stop


