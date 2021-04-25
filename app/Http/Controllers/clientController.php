<?php
/* 
    Tp: BonVoyage Laravel
    But: Permet de stocker les fonctions lie au client
    Auteur: Cabellic Gwenael
    Date: 07/12/2020
*/

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class clientController extends Controller
{
    //Function permettant d'afficher la liste des clients
    public function afficher()
    {
        $tousLesClients = DB::table('client')
            ->join('province', 'client.province_id', '=', 'province.id')
            ->join('premiercontact', 'client.premierContact_id', '=', 'premiercontact.id')
            ->select('client.*', 'province.province', 'premiercontact.premierContact')
            ->orderBy('prenom', 'asc')
            ->get();
        if(Auth::user()->role=='admin')
        {
            return view('listeClient')->with('tousLesClients',$tousLesClients);
        }
        else
        {
            return view('erreurAcces');
        }
        
    }

    //Function permettant de retourner la view des achats du client
    public function detailClient($idClient)
    {
        $unClient = Client::find($idClient);
        $toutesLesVentes = $unClient->ObtenirSesVentes;

        $tousLesVoyagesClient = Client::find($idClient)
            ->join('vente', 'client.id', '=', 'vente.client_id')
            ->join('voyage', 'vente.voyage_id', '=', 'voyage.id')
            ->join('paiement', 'vente.id', '=', 'paiement.vente_id')
            ->join('categorie', 'voyage.categorie_id', '=', 'categorie.id')
            ->select('vente.*', 'client.nom', 'client.prenom', 'voyage.*', 'categorie.categorie', 'paiement.datePaiement', 'paiement.montantPaiement')
            ->where('client_id', $idClient)
            ->get();
        if(Auth::user()->role=='admin')
        {
            return view('detailClient')->with('tousLesVoyagesClient',$tousLesVoyagesClient);
        }
        else
        {
          return view('erreurAcces');
        }
    }

    //function permettant de retourner la view permettant l'ajout d'un client
    public function ajouter()
    {
        $provinces = DB::table('province')->select('*')->get();
        $premierContacts = DB::table('premiercontact')->select('*')->get();
        if(Auth::user()->role=='admin')
        {
            return view('ajouterClient')->with('provinces', $provinces)
                                        ->with('premierContacts', $premierContacts);
        }
        else
        {
          return view('erreurAcces');
        }
    }

    //Fonction permettant de retourner la view permettant de modifier un client avec ses informations
    public function modifier($idClient)
    {
        $unClient = Client::find($idClient);
        $provinces = DB::table('province')->select('*')->get();
        $premierContacts = DB::table('premiercontact')->select('*')->get();
        if(Auth::user()->role=='admin')
        {
            return view('modifierClient')->with('unClient', $unClient)
                                        ->with('provinces', $provinces)
                                        ->with('premierContacts', $premierContacts);
        }
        else
        {
            return view('erreurAcces');
        }
    }

    //Fonction permettant l'ajout ou la modification d'un client
    public function enregistrer (Request $request)
    {
        $dataValide = $request->validate
        ([
            'prenom' => ['required', 'min:3', 'max:20' ],
            'nom' => ['required', 'min:3', 'max:200' ],
            'adresse' => ['required', 'min:3', 'max:200' ],
            'ville' => ['required', 'min:3', 'max:200' ],
            'CP' => ['required', 'min:3', 'max:8' ],
            'telephone' => ['required', 'min:10', 'max:13' ],
            'courriel' => ['required', 'min:10', 'max:200' ]
        ]);
        $unClient = Client::firstOrNew(['prenom'=>$request->input('prenom')]);
        $unClient->prenom = $request->input('prenom');
        $unClient->nom = $request->input('nom');
        $unClient->adresse = $request->input('adresse');
        $unClient->ville = $request->input('ville');
        $unClient->CP = $request->input('CP');
        $unClient->telephone = $request->input('telephone');
        $unClient->courriel = $request->input('courriel');
        $unClient->genre = $request->genre;
        $unClient->province_id = $request->province_id;
        $unClient->premierContact_id = $request->premierContact_id;
        $unClient->save();
        return redirect()->route('client.afficher')->with('message','Client enregistrer avec succès');
        
    }

    //Function permettant de supprimer un client de la database
    public function supprimer($idClient)
    {
        $idVentes = DB::table('vente')->where('vente.client_id', $idClient)->get();
        if($idVentes->count() > 0)
        {
            return redirect()->route('client.afficher')->with('message','Impossible de supprimé le client');
        }
        $unUser = DB::table('users')->select('*')->where('users.client_id', $idClient)->delete();
        $unClient = Client::find($idClient)->delete();
        if(Auth::user()->role=='admin')
        {
            return redirect()->route('client.afficher')->with('message','Client supprimé avec succès');
        }
        else
        {
            return view('erreurAcces');
        }
    }
}
