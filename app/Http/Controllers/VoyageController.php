<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Voyage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class VoyageController extends Controller
{
  //Function permettant de retourner la view avec la liste des voyages coter admin
  public function afficher()
  {
      $tousLesVoyages = DB::table('voyage')
        ->join('categorie', 'voyage.categorie_id', '=', 'categorie.id')
        ->join('departement', 'voyage.departement_id', '=', 'departement.id')
        ->join('region', 'departement.region_id', '=', 'region.id')
        ->select('voyage.*', 'categorie.categorie', 'departement.nomDepartement', 'region.nomRegion')
        ->orderBy('nomVoyage', 'asc')
        ->get();
    if(Auth::user()->role=='admin')
    return view('listeVoyage')->with('tousLesVoyages',$tousLesVoyages);
    else
      {
        return view('erreurAcces');
      }
  }

  //Function permetant de retourner la view avec la liste des voyages coter client
  public function BonVoyage()
  {
      $tousLesVoyages = DB::table('voyage')
        ->join('categorie', 'voyage.categorie_id', '=', 'categorie.id')
        ->join('departement', 'voyage.departement_id', '=', 'departement.id')
        ->join('region', 'departement.region_id', '=', 'region.id')
        ->select('voyage.*', 'categorie.categorie', 'departement.nomDepartement', 'region.nomRegion')
        ->orderBy('nomVoyage', 'asc')
        ->get();
    return view('bonVoyage')->with('tousLesVoyages',$tousLesVoyages);
  }

  //Function permettant de retourner la view permttant l'ajout d'un voyage
  public function ajouter()
  {
      $departements = DB::table('departement')->select('*')->get();
      $categories = DB::table('categorie')->select('*')->get();
      if(Auth::user()->role=='admin')
      {
      return view('ajouterVoyage')->with('departements', $departements)
                                    ->with('categories', $categories);
      }
      else
      {
        return view('erreurAcces');
      }
  }

  //Function permettant de retourner la view permettant de modifier un voyage
  public function modifier($id)
    {
        $unVoyage = Voyage::find($id);
        $departements = DB::table('departement')->select('*')->get();
        $categories = DB::table('categorie')->select('*')->get();
        if(Auth::user()->role=='admin')
        {
          return view('modifierVoyage')->with('unVoyage', $unVoyage)
                                        ->with('departements', $departements)
                                        ->with('categories', $categories);
        }
        else
        {
          return view('erreurAcces');
        }
    }

  //Funcion permettant d'ajouter ou modifier un voyage
  public function enregistrer(Request $request)
  {
    $dataValide = $request->validate
    ([
        'nomVoyage' => ['required', 'min:3', 'max:50' ],
        'dateDebut' => ['required'],
        'duree' => ['required', 'min:1'],
        'ville' => ['required', 'min:3', 'max:200' ],
        'prix' => ['required']
    ]);
    $unVoyage = Voyage::firstOrNew(['nomVoyage'=>$request->input('nomVoyage')]);
    $unVoyage->nomVoyage = $request->input('nomVoyage');
    $unVoyage->dateDebut = $request->input('dateDebut');
    $unVoyage->duree = $request->input('duree');
    $unVoyage->ville = $request->input('ville');
    $unVoyage->prix = $request->input('prix');
    $unVoyage->departement_id = $request->departement_id;
    $unVoyage->categorie_id = $request->categorie_id;
    $unVoyage->save();
    if(Auth::user()->role=='admin')
      {
        return redirect()->route('voyage.afficher')->with('message','Voyage enregistrer avec succès');
      }
    else
      {
        return view('erreurAcces');
      }
  }

  //Funciton permettant de supprimer un voyage
  public function supprimer($id)
    {
      $idVentes = DB::table('vente')->where('vente.voyage_id', $id)->get();
      if($idVentes->count() > 0)
        {
          return redirect()->route('voyage.afficher')->with('message','Impossible de supprimer le voyage');
        }
      $unVoyage = Voyage::find($id)->delete();
      if(Auth::user()->role=='admin')
      {
        return redirect()->route('voyage.afficher')->with('message','voyage supprimé avec succès');
      }
      else
      {
        return view('erreurAcces');
      }
    }
}
