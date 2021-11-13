@extends('templates.dashboard.students.layout')


@section('title')
	Mon profil
@stop

@section('content')
<div class="row mt-40">
	<div class="col-md-3"></div>
    <div class="col-lg-9 col-md-9">
        <div class="card ">
            <div class="card-header mb-4 d-flex justify-content-between">
                <h4 class="card-title align-self-center">Informations sur l'utilisateur </h4>
                
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table tablesorter " id="datatable" cellspacing="0" width="100%">
                        <thead class=" text-primary">
                            <tr>
                                <th>
                                    Nom & Prénoms
                                </th>
                                <th>
                                    Pseudo
                                </th>
                                <th>
                                    Niveau
                                </th>
                                <th>
                                    Sexe
                                </th>

                                <th>
                                    École fréquentée
                                </th>
                                
                                <th>
                                    Date de création du compte
                                </th>

                                <th>
                                    E-mail ou Téléphone
                                </th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            
                            <tr>
                                <td>
                                    {{ $student->fullname }} 
                                </td>
                                <td>
                                    {{ $student->username }}
                                    
                                </td>
                                <td>
                                    {{ $student->level }}
                                </td>
                                <td>
                                	@if ($student->gender == "F")
                                    	Féminin
                                    @else
                                    	Masculin
                                    @endif
                                </td>
                                

                                <td >
                                    {{ $student->school }}
                                </td>
                                <td >
                                    {{ $student->created_at }}
                                </td>

                                <td >
                                    {{ $student->email }}
                                </td>

                                
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mt-24">
	<div class="col-md-3"></div>
    <div class="col-lg-9 col-md-9">
        <div class="card ">
            <div class="card-header mb-4 d-flex justify-content-between">
                <h4 class="card-title align-self-center">Informations sur votre abonnement </h4>
                
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table tablesorter " id="datatable" cellspacing="0" width="100%">
                        <thead class=" text-primary">
                            <tr>
                                <th>
                                    Date de début de l'abonnement
                                </th>
                                <th>
                                    Date de fin de l'abonnement
                                </th>
                                <th>
                                    Statut de l'abonnement
                                </th>                             
                                
                            </tr>
                        </thead>
                        <tbody>
                            
                            <tr>
                                <td>
                                    {{ $student->abonnement_date_start }} 
                                </td>
                                <td>
                                    {{ $student->abonnement_date_end }}
                                    
                                </td>
                                <td>
                                	@if ( $student->abonnement_is_active == true )
                                    	<div class="alert alert-success">Actif</div> 
                                    @else
                                    	<div class="alert alert-danger">Inactif</div>
                                    @endif
                                </td>
                                
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@stop