<?php

namespace App\Http\Controllers;

use App\Models\circonscription;
use App\Models\parlements;
use App\Models\province;
use App\Models\sigle;
use App\Models\utilisateur;
use App\Models\fonction;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ParlementaireController extends Controller
{
    public function index(Request $request)
    {
        $province = province::all();
        $circonscription = circonscription::all();
        $sigle = sigle::all();
        $sexe = utilisateur::distinct()->get('sexe');
        //$resultfomction = parlements::paginate(10);
        $resultfomction = DB::table('utilisateurs')->
        join('fonctions', 'utilisateurs.fonction_id', '=', 'fonctions.fonction_id')-> //vrai
        join('circonscriptions', 'utilisateurs.circons_id', '=', 'circonscriptions.circons_id')->
        join('provinces', 'utilisateurs.province_id', '=', 'provinces.province_id')->
        join('sigles', 'utilisateurs.sigle_id', '=', 'sigles.sigle_id')->
        where('fonctions.fonction_id', 1)->
        paginate(10);
        return view('pages.index', compact('resultfomction', 'province', 'sigle', 'sexe'));
    }
    public function fetchprovince(Request $request){
       $donnees['circons'] = DB::table('circonscriptions')->
        join('provinces', 'circonscriptions.province_id', '=', 'provinces.province_id')->
        where('nom_prov', $request->nom_prov)->

        get('circonscriptions.nom_circons','provinces.nom_prov');
        return response()->json($donnees);
    }
    public function recherchernom(){
        $province = province::all();
        $circonscription = circonscription::all();
        $sigle = sigle::all();
        $sexe = utilisateur::distinct()->get('sexe');
        $nom = $_GET['nom'];
        $resultfomction = DB::table('utilisateurs')->
        join('fonctions', 'utilisateurs.fonction_id', '=', 'fonctions.fonction_id')-> //vrai
        join('circonscriptions', 'utilisateurs.circons_id', '=', 'circonscriptions.circons_id')->
        join('provinces', 'circonscriptions.province_id', '=', 'provinces.province_id')->
        join('sigles', 'utilisateurs.sigle_id', '=', 'sigles.sigle_id')->
        where('fonctions.fonction_id', 1)->
        where('utilisateurs.nom_uti','LIKE', '%'.$nom.'%')->paginate(10);
        return view('pages.index', compact('resultfomction', 'province', 'sigle', 'sexe'));
    }
    public function rechercher(Request $request){

        $province = province::all();
        $circonscription = circonscription::all();
        $sigle = sigle::all();
        $sexe = utilisateur::distinct()->get('sexe');
        //Quatre champs
        if($request->province != 0 AND $request->circonscription != 0  AND $request->sigle != 0 AND $request->sexe != 0){
            $resultfomction = DB::table('utilisateurs')->
            join('fonctions', 'utilisateurs.fonction_id', '=', 'fonctions.fonction_id')-> //vrai
            join('circonscriptions', 'utilisateurs.circons_id', '=', 'circonscriptions.circons_id')->
            join('provinces', 'utilisateurs.province_id', '=', 'provinces.province_id')->
            join('sigles', 'utilisateurs.sigle_id', '=', 'sigles.sigle_id')->
           /* join('fonctions', 'utilisateurs.fonction_id', '=', 'fonctions.fonction_id')-> //vrai
            join('circonscriptions', 'utilisateurs.circons_id', '=', 'circonscriptions.circons_id')->
            join('provinces', 'circonscriptions.province_id', '=', 'provinces.province_id')->
            join('sigles', 'utilisateurs.sigle_id', '=', 'sigles.sigle_id')->*/
            where('fonctions.fonction_id', 1)->
            where('provinces.nom_prov', '=', $request->province)->
            where('circonscriptions.nom_circons', '=', $request->circonscription)->
            where('sigles.nom_sigle', '=', $request->sigle)->
            where('utilisateurs.sexe', '=', $request->sexe)->paginate(10);
            return view('pages.index', compact('resultfomction', 'province', 'circonscription', 'sigle', 'sexe'));
        }
        // Deux champs
        if($request->province !=0 AND $request->circonscription){

            $resultfomction = DB::table('utilisateurs')->
            join('circonscriptions', 'utilisateurs.circons_id', '=', 'circonscriptions.circons_id')->
            join('fonctions', 'utilisateurs.fonction_id', '=', 'fonctions.fonction_id')-> //vrai
            join('provinces', 'utilisateurs.province_id', '=', 'provinces.province_id')->
            join('sigles', 'utilisateurs.sigle_id', '=', 'sigles.sigle_id')->
            //where('fonctions.fonction_id', 1)->
            //join('provinces', 'provinces.province_id', '=', 'circonscriptions.circons_id')->
            /*join('fonctions', 'utilisateurs.fonction_id', '=', 'fonctions.fonction_id')-> //vrai
            join('circonscriptions', 'utilisateurs.circons_id', '=', 'circonscriptions.circons_id')->
            join('provinces', 'utilisateurs.province_id', '=', 'provinces.province_id')->
            join('sigles', 'utilisateurs.sigle_id', '=', 'sigles.sigle_id')->
            join('provinces', 'circonscriptions.province_id','=' ,'provinces.province_id')->*/
            where('provinces.nom_prov', '=', $request->province)->
            where('circonscriptions.nom_circons', '=', $request->circonscription)->
            paginate(10);
            return view('pages.index', compact('resultfomction', 'province', 'sigle', 'sexe'));
        }
        //Trois champs
        if( $request->province != 0  AND $request->sigle != 0  AND $request->sexe != 0){
            $resultfomction = DB::table('utilisateurs')->
            join('fonctions', 'utilisateurs.fonction_id', '=', 'fonctions.fonction_id')-> //vrai
            join('circonscriptions', 'utilisateurs.circons_id', '=', 'circonscriptions.circons_id')->
            join('provinces', 'circonscriptions.province_id', '=', 'provinces.province_id')->
            join('sigles', 'utilisateurs.sigle_id', '=', 'sigles.sigle_id')->
             where('fonctions.fonction_id', 1)->
            where('provinces.nom_prov', '=', $request->province)->
            where('sigles.nom_sigle', '=', $request->sigle)->
            where('utilisateurs.sexe', '=', $request->sexe)->paginate(10);
            return view('pages.index', compact('resultfomction', 'province', 'circonscription', 'sigle', 'sexe'));
        }
        //Trois avec circonscription
        if( $request->circonscription != 0  AND $request->sigle != 0  AND $request->sexe != 0){
            $resultfomction = DB::table('utilisateurs')->
            join('fonctions', 'utilisateurs.fonction_id', '=', 'fonctions.fonction_id')-> //vrai
            join('circonscriptions', 'utilisateurs.circons_id', '=', 'circonscriptions.circons_id')->
            join('provinces', 'circonscriptions.province_id', '=', 'provinces.province_id')->
            join('sigles', 'utilisateurs.sigle_id', '=', 'sigles.sigle_id')->
             where('fonctions.fonction_id', 1)->
            where('circonscriptions.circons_id', '=', $request->circonscription)->
            where('sigles.sigle_id', '=', $request->sigle)->
            where('utilisateurs.sexe', '=', $request->sexe)->paginate(10);
            return view('pages.index', compact('resultfomction', 'province', 'circonscription', 'sigle', 'sexe'));
        }
        //
        if( $request->sigle != 0  AND $request->sexe != 0){
            $resultfomction = DB::table('utilisateurs')->
            join('circonscriptions', 'utilisateurs.circons_id', '=', 'circonscriptions.circons_id')->
            join('sigles', 'utilisateurs.sigle_id','=' ,'sigles.sigle_id')->
            join('fonctions', 'fonctions.fonction_id','=' ,'fonctions.fonction_id')->
            join('provinces', 'utilisateurs.province_id', '=', 'provinces.province_id')->
            where('sigles.nom_sigle', '=', $request->sigle)->
            where('utilisateurs.sexe', '=', $request->sexe)->
            paginate(10);
            return view('pages.index', compact('resultfomction', 'province', 'sigle', 'sexe'));
        }
        //
        if($request->province != 0){
            $resultfomction = DB::table('utilisateurs')->
            join('fonctions', 'utilisateurs.fonction_id', '=', 'fonctions.fonction_id')-> //vrai
            join('circonscriptions', 'utilisateurs.circons_id', '=', 'circonscriptions.circons_id')->
            join('provinces', 'provinces.province_id', '=', 'circonscriptions.province_id')->
            join('sigles', 'utilisateurs.sigle_id', '=', 'sigles.sigle_id')->
             where('fonctions.fonction_id', 1)->
            where('provinces.nom_prov', '=', $request->province)->paginate(10);
            return view('pages.index', compact('resultfomction', 'province', 'sigle', 'sexe'));
        }
        if($request->circonscription != 0){
            $resultfomction = DB::table('utilisateurs')->
            join('fonctions', 'utilisateurs.uti_id', '=', 'fonctions.uti_id')-> //vrai
            join('circonscriptions', 'utilisateurs.uti_id', '=', 'circonscriptions.uti_id')->
            join('provinces', 'circonscriptions.province_id', '=', 'provinces.province_id')->
            join('sigles', 'circonscriptions.circons_id', '=', 'sigles.id_circonsription')->
            where('circonscriptions.nom_circons', '=', $request->circonscription)->paginate(10);
            return view('pages.index', compact('resultfomction', 'province', 'sigle', 'sexe'));

        }
        if($request->sigle != 0){
            $resultfomction = DB::table('utilisateurs')->
            join('fonctions', 'utilisateurs.fonction_id', '=', 'fonctions.fonction_id')-> //vrai
            join('circonscriptions', 'utilisateurs.circons_id', '=', 'circonscriptions.circons_id')->
            join('provinces', 'circonscriptions.province_id', '=', 'provinces.province_id')->
            join('sigles', 'utilisateurs.sigle_id', '=', 'sigles.sigle_id')->
             where('fonctions.fonction_id', 1)->
            where('sigles.nom_sigle', '=', $request->sigle)->paginate(10);
            return view('pages.index', compact('resultfomction', 'province', 'sigle', 'sexe'));
        }
        //
        if($request->sexe != 0){
            $resultfomction = DB::table('utilisateurs')->
            join('fonctions', 'utilisateurs.fonction_id', '=', 'fonctions.fonction_id')-> //vrai
            join('circonscriptions', 'utilisateurs.circons_id', '=', 'circonscriptions.circons_id')->
            join('provinces', 'circonscriptions.province_id', '=', 'provinces.province_id')->
            join('sigles', 'utilisateurs.sigle_id', '=', 'sigles.sigle_id')->
             where('fonctions.fonction_id', 1)->
            where('sexe', '=', $request->sexe)
            ->paginate(10);
            return view('pages.index', compact('resultfomction', 'province', 'sigle', 'sexe'));
        }
        //
        $resultfomction = DB::table('utilisateurs')->
        join('fonctions', 'utilisateurs.fonction_id', '=', 'fonctions.fonction_id')-> //vrai
            join('circonscriptions', 'utilisateurs.circons_id', '=', 'circonscriptions.circons_id')->
            join('provinces', 'circonscriptions.province_id', '=', 'provinces.province_id')->
            join('sigles', 'utilisateurs.sigle_id', '=', 'sigles.sigle_id')->
             where('fonctions.fonction_id', 1)->paginate(10);
        return view('pages.index', compact('resultfomction', 'province', 'sigle', 'sexe'));
    }
}
