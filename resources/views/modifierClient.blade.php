<!-- 
    Tp: BonVoyage Laravel
    But: Page Html permettant la modification d'un client
    Auteur: Cabellic Gwenael
    Date: 07/12/2020
--> 
@extends('template')
@section('titre')
   Modifier Client
@endsection
@section('contenu')
    <form method="POST" action="/client/enregistrer" style="width: 25rem; margin:auto;">  
    <h1>Modifier Client :</h1>
        {{ csrf_field() }} 
        <input name="id" type="hidden" value="{{ $unClient->id }}" /> 
            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <label class="font-weight-bold">Prenom :</label>
                    </div>
                    <div class="col">
                        <input name="prenom" type="text" placeholder="Prenom" value="{{ $unClient->prenom }}" />
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <label class="font-weight-bold">Nom :</label>
                    </div>
                    <div class="col">
                        <input name="nom" type="text"  placeholder="Nom" value="{{ $unClient->nom }}" />
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <label class="font-weight-bold">Adresse :</label>
                    </div>
                    <div class="col">
                        <input name="adresse" type="text" placeholder="Adresse" value="{{$unClient->adresse }}" />
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <label class="font-weight-bold">Ville :</label>
                    </div>
                    <div class="col">
                        <input name="ville" type="text"  placeholder="Ville" value="{{ $unClient->ville }}" />
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <label class="font-weight-bold">Code Postal :</label>
                    </div>
                    <div class="col">
                        <input name="CP" type="text" placeholder="Code Postal" value="{{ $unClient->CP }}" />
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <label class="font-weight-bold">Telephone :</label>
                    </div>
                    <div class="col">
                        <input name="telephone" type="text" placeholder="Telephone" value="{{$unClient->telephone }}" />
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <label class="font-weight-bold">Courriel :</label>
                    </div>
                    <div class="col">
                        <input name="courriel" type="text" placeholder="Courriel" value="{{ $unClient->courriel }}" readonly="readonly" style="background-color: #f1f1f1;" />
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
                            <input class="form-check-input" type="radio" name="genre" id="genre" value="M" {{($unClient->genre=="M")? "checked" : "" }}>M</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="genre" id="genre" value="F" {{($unClient->genre=="F")? "checked" : "" }}>F</label>
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
                            @if($province->id == $unClient->province_id)
                                <option value="{{$province->id}}" selected>{{$province->province}}</option>
                            @else
                                <option value="{{$province->id}}">{{$province->province}}</option>
                            @endif
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
                            @if($premierContact->id == $unClient->premierContact_id)
                                <option value="{{$premierContact->id}}" selected>{{$premierContact->premierContact}}</option>
                            @else
                            <   option value="{{$premierContact->id}}">{{$premierContact->premierContact}}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        <button type="submit" class='btn btn-success'>Modifier</button>  
    </form>  
@endsection