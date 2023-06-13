<?php

namespace App\Http\Controllers;

use App\Models\circonscription;
use App\Models\parlements;
use App\Models\province;
use App\Models\utilisateur;
use App\Models\sigle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProvinceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
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
        where('fonctions.fonction_id', 2)->
        paginate(10);
        return view('pages.depute', compact('resultfomction', 'province', 'sigle', 'sexe'));
    }
    public function rechercherdepute(){
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
        where('fonctions.fonction_id', 2)->
        where('utilisateurs.nom_uti','LIKE', '%'.$nom.'%')->paginate(10);
        return view('pages.depute', compact('resultfomction', 'province', 'sigle', 'sexe'));
    }



















      //La fonction de recherche
      public function rechercherdeputess(Request $request){
        $fonction = parlements::distinct()->get('fonction');
        $province = parlements::distinct()->get('province');
        $circonscription = parlements::distinct()->get('circonscription');
        $sigle = parlements::distinct()->get('sigle');
        $sexe = parlements::distinct()->get('sexe');
        $provinceselect = province::all();
        $circonsselect = circonscription::all();

        // Quand on valide tous les champs Fonction Province Circonscription
        if($request->fonction != 0 AND $request->province != 0  AND $request->circonscription != 0  AND $request->sigle != 0  AND $request->sexe != 0){
            $resultfomction = parlements::where('fonction', '=', $request->fonction)->
            where('province', '=', $request->province)->
            where('circonscription', '=', $request->circonscription)->
            where('sigle', '=', $request->sigle)->
            where('sexe', '=', $request->sexe)->paginate(10);;
            return view('pages.depute', compact('resultfomction', 'fonction', 'province', 'circonscription', 'sigle', 'sexe'));
        }
        // Quand on valide les 4 champs Province Circonscription Sigle et Sexe
        if( $request->province != 0  AND $request->circonscription != 0  AND $request->sigle != 0  AND $request->sexe != 0){
            $resultfomction = parlements:: where('province', '=', $request->province)->
            where('circonscription', '=', $request->circonscription)->
            where('sigle', '=', $request->sigle)->
            where('sexe', '=', $request->sexe)->
            paginate(10);
            return view('pages.depute', compact('resultfomction', 'fonction', 'province', 'circonscription', 'sigle', 'sexe'));
        }
        // Quand on valide 3 champs Circonscription Sigle et Sexe
        if( $request->circonscription != 0  AND $request->sigle != 0  AND $request->sexe != 0){
            $resultfomction = parlements::where('circonscription', '=', $request->circonscription)->
            where('sigle', '=', $request->sigle)->
            where('sexe', '=', $request->sexe)->paginate(10);

            return view('pages.depute', compact('resultfomction', 'fonction', 'province', 'circonscription', 'sigle', 'sexe'));
        }

        if( $request->sigle != 0  AND $request->sexe != 0){
            $resultfomction = parlements::where('sigle', '=', $request->sigle)->
            where('sexe', '=', $request->sexe)->
            paginate(10);
            return view('pages.depute', compact('resultfomction', 'fonction', 'province', 'circonscription', 'sigle', 'sexe'));
        }

        if($request->province != 0 AND $request->fonction != 0){
            $resultfomction = parlements::where('fonction', '=', $request->fonction)->
            where('province', '=', $request->province)->paginate(10);
            return view('pages.depute', compact('resultfomction', 'fonction', 'province', 'circonscription', 'sigle', 'sexe'));
        }

        if($request->fonction != 0){
            $resultfomction = parlements::where('fonction', '=', $request->fonction)->paginate(10);
            return view('pages.depute', compact('resultfomction', 'fonction', 'province', 'circonscription', 'sigle', 'sexe', 'provinceselect', 'circonsselect'));
        }
        if($request->province != 0){
            $resultfomction = parlements::where('province', '=', $request->province)->paginate(10);
            return view('pages.depute', compact('resultfomction', 'fonction', 'province', 'circonscription', 'sigle', 'sexe'));


        }
        if($request->circonscription != 0){
            $resultfomction = parlements::where('circonscription', '=', $request->circonscription)->paginate(10);
            return view('pages.depute', compact('resultfomction', 'fonction', 'province', 'circonscription', 'sigle', 'sexe'));

        }
        if($request->sigle != 0){
            $resultfomction = parlements::where('sigle', '=', $request->sigle)->paginate(10);
            return view('pages.depute', compact('resultfomction', 'fonction', 'province', 'circonscription', 'sigle', 'sexe'));

        }
        if($request->sexe != 0){
            $resultfomction = parlements::where('sexe', '=', $request->sexe)->paginate(10);
            return view('pages.index', compact('resultfomction', 'fonction', 'province', 'circonscription', 'sigle', 'sexe'));

        }


        $resultfomction = parlements::where('fonction', '=', $request->fonction)->paginate(10);
        return view('pages.depute', compact('resultfomction', 'fonction', 'province', 'circonscription', 'sigle', 'sexe','provinceselect'));


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(province $province)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(province $province)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, province $province)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(province $province)
    {
        //
    }
}
