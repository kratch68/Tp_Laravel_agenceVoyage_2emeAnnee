<!-- 
    Tp: BonVoyage Laravel
    But: Page Html permettant la modification d'un Voyage
    Auteur: Cabellic Gwenael
    Date: 07/12/2020
--> 
@extends('template')
@section('titre')
   Modifier Voyage
@endsection
@section('contenu')
    <form method="POST" action="/voyage/enregistrer" style="width: 25rem; margin:auto;">  
    <h1>Modifier Voyage</h1>
        {{ csrf_field() }}  
        <input name="id" type="hidden" value="{{ $unVoyage->id }}" />

            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <label class="font-weight-bold">Nom du Voyage :</label>
                    </div>
                    <div class="col">
                        <input name="nomVoyage" type="text"  placeholder="nom Voyage" value="{{ $unVoyage->nomVoyage }}" /> 
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <label class="font-weight-bold">Date de depart :</label>
                    </div>
                    <div class="col">
                        <input name="dateDebut" type="date" placeholder="Date de Depart" value="{{ $unVoyage->dateDebut }}" />
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <label class="font-weight-bold">Nombre de jours :</label>
                    </div>
                    <div class="col">
                        <input name="duree" type="number" placeholder="nombre de jours" value="{{ $unVoyage->duree}}" />
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <label class="font-weight-bold">Ville :</label>
                    </div>
                    <div class="col">
                        <input name="ville" type="text" placeholder="Ville" value="{{$unVoyage->ville }}" /> 
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <label class="font-weight-bold">Prix :</label>
                    </div>
                    <div class="col">
                        <input name="prix" type="number" placeholder="Prix" value="{{ $unVoyage->prix }}" /> 
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <label class="font-weight-bold">Departement :</label>
                    </div>
                    <div class="col">
                        <select class="form-control form-control-lg" name="departement_id">
                            @foreach($departements as $departement)
                                @if($departement->id == $unVoyage->departement_id)
                                <option value="{{$departement->id}}" selected>{{$departement->nomDepartement}}</option>
                                @else
                                <option value="{{$departement->id}}">{{$departement->nomDepartement}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <label class="font-weight-bold">Categorie :</label>
                    </div>
                    <div class="col">
                        <select class="form-control form-control-lg" name="categorie_id">
                            @foreach($categories as $categorie)
                                @if($categorie->id == $unVoyage->categorie_id)
                                <option value="{{$categorie->id}}" selected>{{$categorie->categorie}}</option>
                                @else
                                <option value="{{$categorie->id}}">{{$categorie->categorie}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        <button type="submit" class='btn btn-success'>Modifier</button>  
    </form>  
@endsection