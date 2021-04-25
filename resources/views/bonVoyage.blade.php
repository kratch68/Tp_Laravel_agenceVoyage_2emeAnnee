<!-- 
    Tp: BonVoyage Laravel
    But: Page Html permettant d'Afficher les Voyages Coter Client
    Auteur: Cabellic Gwenael
    Date: 07/12/2020
--> 
@extends('template')
@section('titre')
   Bon voyage
@endsection
@section('contenu')
    <body>
        <header style='height: 60px; background: #199AF0;'>
            <div style='display: flex; justify-content:space-between; align-items: center;'>
                <h1>Tous les voyages</h1>
                <a href="./panier/{{ Auth::user()->id }}" class="btn btn-success" style='margin-right:5%;'>Panier</a>
            </div>
        </header>
        <main style="background: #EAF3FC;">
            <div style="display:flex; flex-wrap:wrap;">
                @foreach ($tousLesVoyages as $unVoyage)
                <div class="card" style="width: 40rem; margin:auto; margin-top: 25px; background: #ebecee; align-content:flex-end;">
                <div class="card-body" style="display : flex; padding:0%; justify-content:space-between;">
                    <div>
                        <h5 class="card-title">{{$unVoyage->nomVoyage}}</h5>
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                <p class="card-text font-weight-bold">Date de depart :</p>
                                <p class="card-text font-weight-bold">Nombres de jours :</p>
                                <p class="card-text font-weight-bold">Ville :</p>
                                <p class="card-text font-weight-bold">Departement :</p>
                                <p class="card-text font-weight-bold">Region :</p>
                                <p class="card-text font-weight-bold">Categorie :</p>
                                </div>
                                <div class="col-md-auto">
                                    <p class="card-text">{{$unVoyage->dateDebut}}</p>
                                    <p class="card-text">{{$unVoyage->duree}}</p>
                                    <p class="card-text">{{$unVoyage->ville}}</p>
                                    <p class="card-text">{{$unVoyage->nomDepartement}}</p>
                                    <p class="card-text">{{$unVoyage->nomRegion}}</p>
                                    <p class="card-text">{{$unVoyage->categorie}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="background: #199AF0; height:100%; width: 125px;">
                        <div style="text-align:center; height:220px; padding-top:75%">
                            <span>{{$unVoyage->prix}}</span>
                            <span>$</span>
                        </div>
                        <div>
                        <form method="POST" action="/panier/ajouter">
                        {{ csrf_field() }} 
                            <input name="voyage_id" 
                                type="hidden"
                                value="{{$unVoyage->id}}" 
                            /> 
                            <input name="user_id"
                                type="hidden"
                                value="{{ Auth::user()->id }}" 
                            />
                            <button class="btn btn-success" style="width: 125px; height:50px;" type="submit">Ajouter</button>
                        </form>
                        </div>
                    </div>
                </div>
                </div>
                @endforeach
            </div>
        </main>
    </body>
@endsection