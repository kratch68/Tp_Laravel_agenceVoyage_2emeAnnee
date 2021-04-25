<!-- 
    Tp: BonVoyage Laravel
    But: Page Html permettant de gerer le panier
    Auteur: Cabellic Gwenael
    Date: 07/12/2020
--> 
@extends('template')
@section('titre')
   Le panier
@endsection
@section('contenu')
<header style='height: 60px; background: #199AF0;'>
    <h1>Le panier </h1>
</header>
<body style="background: #EAF3FC;">
    <div style="display:flex; flex-wrap:wrap;">
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
                                <p class="card-text font-weight-bold">Ville :</p>
                                <p class="card-text font-weight-bold">Categorie :</p>
                            </div>
                            <div class="col-md-auto">
                                <p class="card-text">{{$unVoyagePanier->dateDebut}}</p>
                                <p class="card-text">{{$unVoyagePanier->duree}}</p>
                                <p class="card-text">{{$unVoyagePanier->ville}}</p>
                                <p class="card-text">{{$unVoyagePanier->categorie}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <a title='Payer' class='btn btn-success' href="/panier/paiment/{{$unVoyagePanier->id}}/{{Auth::user()->id}}">Reserver</a>
                    <a title='Supprimer' class='btn btn-danger' href="/panier/supprimerVoyage/{{$unVoyagePanier->id}}/{{Auth::user()->id}}">Supprimer</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</body>
@endsection