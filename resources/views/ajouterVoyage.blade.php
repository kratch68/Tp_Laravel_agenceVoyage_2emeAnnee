<!-- 
    Tp: BonVoyage Laravel
    But: Page Html permettant d'ajouter un Voyage Coter Admin
    Auteur: Cabellic Gwenael
    Date: 07/12/2020
--> 
@extends('template')
@section('titre')
  Ajouter un Voyage
@endsection
@section('contenu')
    <form method="POST" action="/voyage/enregistrer" style="width: 25rem; margin:auto;">  
    <h1>Ajouter Voyage</h1>
        {{ csrf_field() }}  
        <div class="form-group">
            <div class="row">
                <div class="col">
                    <label class="font-weight-bold">Nom du Voyage :</label>
                </div>
                <div class="col">
                    <input name="nomVoyage" type="text" placeholder="nom Voyage" value="{{ old('nomVoyage') }}" />
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col">
                    <label class="font-weight-bold">Date de depart :</label>
                </div>
                <div class="col">
                    <input name="dateDebut" type="date" placeholder="Date de Depart" value="{{ old('dateDebut') }}" />
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col">
                    <label class="font-weight-bold">Nombre de jours :</label>
                </div>
                <div class="col">
                    <input name="duree" type="number" placeholder="nombre de jours" value="{{ old('duree') }}" />
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col">
                    <label class="font-weight-bold">Ville :</label>
                </div>
                <div class="col">
                    <input name="ville" type="text" placeholder="Ville" value="{{ old('ville') }}" />
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col">
                    <label class="font-weight-bold">Prix :</label>
                </div>
                <div class="col">
                    <input name="prix" type="number" placeholder="Prix" value="{{ old('prix') }}" />
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
                            <option value="{{$departement->id}}">{{$departement->nomDepartement}}</option>
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
                            <option value="{{$categorie->id}}">{{$categorie->categorie}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <button type="submit" class='btn btn-success'>Ajouter</button>  
    </form>  
@endsection