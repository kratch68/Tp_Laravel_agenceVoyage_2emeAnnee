<!-- 
    Tp: BonVoyage Laravel
    But: Page Html permettant d'afficher la liste des achats des Clients Coter Admin
    Auteur: Cabellic Gwenael
    Date: 07/12/2020
--> 
@extends('template')
@section('titre')
   Details Client
@endsection
@section('contenu')
    <div style='display: flex; justify-content:space-between;'>
        <h1>Les Achats :</h1>
    </div>
    <div>
    <table class="table table-dark">
        <thead>
            <tr>
            <th scope="col">Nom Voyage</th>
            <th scope="col">Date Depart</th>
            <th scope="col">Nbrs Jours</th>
            <th scope="col">Ville</th>
            <th scope="col">Categorie</th>
            <th scope="col">Prix</th>
            <th scope="col">Date Paiment</th>
            <th scope="col">Montant</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($tousLesVoyagesClient as $unVoyageClient)
            <tr>
            <td>{{$unVoyageClient->nomVoyage}}</td>
            <td>{{$unVoyageClient->dateDebut}}</td>
            <td>{{$unVoyageClient->duree}}</td>
            <td>{{$unVoyageClient->ville}}</td>
            <td>{{$unVoyageClient->categorie}}</td>
            <td>{{$unVoyageClient->prix}}</td>
            <td>{{$unVoyageClient->datePaiement}}</td>
            <td>{{$unVoyageClient->montantPaiement}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
@endsection