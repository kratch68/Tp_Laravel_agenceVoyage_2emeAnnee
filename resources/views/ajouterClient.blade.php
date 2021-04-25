<!-- 
    Tp: BonVoyage Laravel
    But: Page Html permettant d'ajouter un client Coter Admin
    Auteur: Cabellic Gwenael
    Date: 07/12/2020
--> 
@extends('template')
@section('titre')
  Ajouter un client
@endsection
@section('contenu')
    <form method="POST" action="/client/enregistrer" style="width: 25rem; margin:auto;">  
        <h1>Ajouter Client</h1>
        {{ csrf_field() }}  
        <div class="form-group">
            <div class="row">
                <div class="col">
                    <label class="font-weight-bold">Prenom :</label>
                </div>
                <div class="col">
                    <input name="prenom" type="text" placeholder="Prenom" value="{{ old('prenom') }}" />
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col">
                    <label class="font-weight-bold">Nom :</label>
                </div>
                <div class="col">
                    <input name="nom" type="text" placeholder="Nom"  value="{{ old('nom') }}" />
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col">
                    <label class="font-weight-bold">Adresse :</label>
                </div>
                <div class="col">
                    <input name="adresse" type="text" placeholder="Adresse" value="{{ old('adresse') }}" />
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
                    <label class="font-weight-bold">Code Postal :</label>
                </div>
                <div class="col">
                    <input name="CP" type="text" placeholder="Code Postal" value="{{ old('CP') }}" />
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col">
                    <label class="font-weight-bold">Telephone :</label>
                </div>
                <div class="col">
                    <input name="telephone" type="text" placeholder="Telephone" value="{{ old('telephone') }}" />
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col">
                    <label class="font-weight-bold">Courriel :</label>
                </div>
                <div class="col">
                    <input name="courriel" type="text" placeholder="Courriel" value="{{ old('courriel') }}" />
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col">
                    <label class="font-weight-bold">Genre :</label>
                </div>
                <div class="col">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="genre" id="genre" value="M" checked>
                        <label class="form-check-label" for="genre"> M</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="genre" id="genre" value="F">
                        <label class="form-check-label" for="genre">F</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col">
                    <label class="font-weight-bold">Province :</label>
                </div>
                <div class="col">
                    <select class="form-control form-control-lg" name="province_id">
                        @foreach($provinces as $province)
                            <option value="{{$province->id}}">{{$province->province}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col">
                    <label class="font-weight-bold">Premier Contact :</label>
                </div>
                <div class="col">
                    <select class="form-control form-control-lg" name="premierContact_id">
                        @foreach($premierContacts as $premierContact)
                            <option value="{{$premierContact->id}}">{{$premierContact->premierContact}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <button type="submit" class='btn btn-success'>Ajouter</button>  
    </form>  
@endsection