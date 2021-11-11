@extends('templates.dashboard.students.layout')

@section('javascripts')
	<script amount="5" 
        callback="{{ env('APP_STUDENT_TRANSACTION') }}/transaction_abonnement"
        data=""
        url="{{ route('index') }}"
        position="center" 
        theme="#1a2649 "
        key="{{ env('KKIAPAY_PUBLIC_KEY') }}"
        src="https://cdn.kkiapay.me/k.js"></script>
@stop

@section('title')
	Non autorisé
@stop

@section('content')
	<div class="container-fluid mt-48">

	<div class="row">

		<div class="col-md-5"></div>

        <div class="col-md-4">

            <div class="card ">

                <div class="card-header text-center" style="font-weight: bolder; font-size: 20px; color: #1a2649;">
                Abonnement - LearningApp</div>

                <div class="card-body">

                	<form>
                		@csrf
	                    <p>Cher Élève, votre abonnement est inactive pour le moment.
	                    Veuillez vous réabonnez!!</p>

	                    <div class="text-center  mt-4">
	                    	<button class="btn btn-outline-success btn-rounded kkiapay-button"> Me Réabonnez Maintenant</button>
	                    </div>
                    </form>
                    
                        
                </div>

                <div class="card-footer text-muted text-center">
                    <p style="color: #1a2649;">Student - Abonnement</p>
                    
               
                </div>

            </div>

        </div>

        <div class="col-md-4"></div>
		
	</div>
	
</div>
@stop
