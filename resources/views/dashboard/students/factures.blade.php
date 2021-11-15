@extends('templates.dashboard.students.layout')

@section('title')
	Mes factures
@stop

@section('content')
	<div class="row mt-40">
	<div class="col-md-3"></div>
    <div class="col-lg-9 col-md-9">
        <div class="card ">
            <div class="card-header mb-4 d-flex justify-content-between">
                <h4 class="card-title align-self-center">Les transactions effectuées </h4>
                
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table tablesorter " id="datatable" cellspacing="0" width="100%">
                        <thead class=" text-primary">
                            <tr>
                                <th>
                                    Nom d'utilisateur
                                </th>
                                <th>
                                    Montant payé
                                </th>
                                <th>
                                    Moyen de paiement
                                </th>
                                <th>
                                    Pays
                                </th>

                                <th>
                                    Id de transaction
                                </th>
                                
                                <th>
                                    Date de la transaction
                                </th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transactions as $transaction)
                            <tr>
                                <td>
                                    {{ $transaction->fullname }} 
                                </td>
                                <td>
                                    {{ $transaction->montant_paye }}
                                    
                                </td>
                                <td>
                                    {{ $transaction->moyen_de_paiement }}
                                </td>
                                <td>
                                    {{ $transaction->pays }}
                                </td>
                                

                                <td >
                                    {{ $transaction->transaction_id }}
                                </td>
                                <td >
                                    {{ $transaction->created_at }}
                                </td>

                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@stop