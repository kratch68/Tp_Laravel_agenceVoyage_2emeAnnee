<!-- 
    Tp: BonVoyage Laravel
    But: Page Html permettant d'afficher la liste des Voyages
    Auteur: Cabellic Gwenael
    Date: 07/12/2020
--> 
@extends('template')
@section('titre')
   Liste des Voyages
@endsection
@section('contenu')
<div style='display: flex; justify-content:space-between;'>
        <h1>Liste des Voyages :</h1>
        <div style='display: flex; align-items: center;'>
            <p>Ajouter un Voyage: <p>
            <a class="btn btn-primary" href="./voyage/ajouterVoyage" role="button">Ajouter</a>
        </div>
    </div>
    <div>
    <table class="table table-dark">
        <thead>
            <tr>
            <th scope="col">Nom voyage</th>
            <th scope="col">Date depart</th>
            <th scope="col">Nb jours</th>
            <th scope="col">Ville</th>
            <th scope="col">Prix/$</th>
            <th scope="col">Departement</th>
            <th scope="col">Region</th>
            <th scope="col">Categorie</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($tousLesVoyages as $unVoyage)
            <tr>
            <td>{{$unVoyage->nomVoyage}}</td>
            <td>{{$unVoyage->dateDebut}}</td>
            <td>{{$unVoyage->duree}}</td>
            <td>{{$unVoyage->ville}}</td>
            <td>{{$unVoyage->prix}}</td>
            <td>{{$unVoyage->nomDepartement}}</td>
            <td>{{$unVoyage->nomRegion}}</td>
            <td>{{$unVoyage->categorie}}</td>
            <td><a title='Modifier' class='btn btn-success' href="./voyage/modifier/{{$unVoyage->id}}">Modifier</a></td>
            <td><a title='Supprimer' class='btn btn-danger' href="./voyage/supprimer/{{$unVoyage->id}}">Supprimer</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
@endsection