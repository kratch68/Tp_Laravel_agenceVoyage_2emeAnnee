<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Panier;

class panierController extends Controller
{
    //function permettant de retourner la view panier
    public function panier($idClient)
    {
        $voyagePaniers = Panier::where('users_id',$idClient)
            ->join('voyage', 'panier.voyage_id', '=', 'voyage.id')
            ->join('categorie', 'voyage.categorie_id', '=', 'categorie.id')
            ->select( 'panier.id', 'voyage.nomVoyage','voyage.duree','voyage.dateDebut','voyage.ville', 'categorie.categorie')
            ->get();
      return view('panier')->with('voyagePaniers', $voyagePaniers);
    }

    //function permettant d'ajouter un voyage dans le panier
    public function ajouterPanier(Request $request)
    {
        $unVoyagePanier = new Panier;
        $unVoyagePanier->users_id = $request->user_id;
        $unVoyagePanier->voyage_id = $request->voyage_id;
        $unVoyagePanier->save();
        return redirect()->route('voyage.BonVoyage')->with('message','Voyage ajouter au panier');
    }

    //function permettant de supprimer un vouage du panier
    public function supprimerVoyage($idPanier, $idUser)
    {
        $unVoyage = Panier::find($idPanier);
        $unVoyage->delete();
        return redirect()->route('panier.panier',[$idUser])->with('message','Voyage supprimer du panier');
    }

    //Function permettant de retourner la view des paiements
    public function paimentAfficher($idPanier, $idUser)
    {
        $voyagePaniers = Panier::find($idPanier)
            ->join('voyage', 'panier.voyage_id', '=', 'voyage.id')
            ->join('categorie', 'voyage.categorie_id', '=', 'categorie.id')
            ->select('voyage.id', 'voyage.nomVoyage','voyage.dateDebut','voyage.duree','voyage.prix')
            ->where('panier.id', $idPanier)
            ->get();
      return view('paiment')->with('voyagePaniers', $voyagePaniers);
    }
}
