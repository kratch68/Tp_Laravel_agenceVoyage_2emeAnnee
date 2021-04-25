<!-- 
    Tp: BonVoyage Laravel
    But: Page Html permettant de gerer les paiements
    Auteur: Cabellic Gwenael
    Date: 07/12/2020
--> 
@extends('template')
@section('titre')
   Client
@endsection
@section('contenu')
<div style='display: flex; justify-content:space-between;'>
        <h1>Les voyages de : </h1>
    </div>
    <div>
    @foreach ($voyagePaniers as $unVoyagePanier)
    <div class="card" style="width: 40rem; margin:auto; margin-top: 25px; background: #ebecee; align-content:flex-end;">
        <div class="card-body" style="display : flex; padding:0%; justify-content:space-between;">
            <div>
                <h5 class="card-title">{{$unVoyagePanier->nomVoyage}}</h5>
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <p class="card-text font-weight-bold">Date de depart :</p>
                                <p class="card-text font-weight-bold">Nombres de jours :</p>
                                <p class="card-text font-weight-bold">Prix :</p>
                            </div>
                            <div class="col-md-auto">
                                <p class="card-text">{{$unVoyagePanier->dateDebut}}</p>
                                <p class="card-text">{{$unVoyagePanier->duree}}</p>
                                <p class="card-text">{{$unVoyagePanier->prix}} $</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div>
            </div>
            <form method="POST" action="/panier/ajouter">
                        {{ csrf_field() }} 
                            <input name="voyage_id" 
                                type="text"
                                value="{{$unVoyagePanier->id}}" 
                            /> 
                            <input name="user_id"
                                type="texte"
                                value="{{ Auth::user()->id }}" 
                            />
                            <input name="montant"
                                type="number"
                                value="{{ old('montantPaiement') }}" 
                            />
                            <button class="btn btn-success" style="width: 125px; height:50px;" type="submit">Payer</button>
                        </form>
        </div>
    </div>
    @endforeach
@endsection