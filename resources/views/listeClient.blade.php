<!-- 
    Tp: BonVoyage Laravel
    But: Page Html permettant d'afficher la liste des clients
    Auteur: Cabellic Gwenael
    Date: 07/12/2020
--> 
@extends('template')
@section('titre')
   la liste des clients
@endsection
@section('contenu')
    <div style='display: flex; justify-content:space-between;'>
        <h1>Liste des Clients :</h1>
        <div style='display: flex; align-items: center;'>
            <p>Ajouter un Client: <p>
            <a class="btn btn-primary" href="./client/ajouterClient" role="button">Ajouter</a>
        </div>
    </div>
    <div>
    <table class="table table-dark">
        <thead>
            <tr>
            <th scope="col">Prenom</th>
            <th scope="col">Nom</th>
            <th scope="col">Adresse</th>
            <th scope="col">ville</th>
            <th scope="col">CP</th>
            <th scope="col">telephone</th>
            <th scope="col">courriel</th>
            <th scope="col">genre</th>
            <th scope="col">province</th>
            <th scope="col">Contact</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($tousLesClients as $unClient)
            <tr>
            <td>{{$unClient->prenom}}</td>
            <td>{{$unClient->nom}}</td>
            <td>{{$unClient->adresse}}</td>
            <td>{{$unClient->ville}}</td>
            <td>{{$unClient->CP}}</td>
            <td>{{$unClient->telephone}}</td>
            <td>{{$unClient->courriel}}</td>
            <td>{{$unClient->genre}}</td>
            <td>{{$unClient->province}}</td>
            <td>{{$unClient->premierContact}}</td>
            <td><a title='Details' class='btn btn-warning' href="./client/detail/{{$unClient->id}}">Achat</a></td>
            <td><a title='Modifier' class='btn btn-success' href="./client/modifier/{{$unClient->id}}">Modifier</a></td>
            <td><a title='Supprimer' class='btn btn-danger' href="./client/supprimer/{{$unClient->id}}">Supprimer</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
@endsection