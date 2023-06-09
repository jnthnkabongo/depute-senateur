<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class index extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    /*
      public function index(Request $request)
    {
        $province = parlements::distinct()->get('province');
        $circonscription = parlements::distinct()->get('circonscription');
        $sigle = parlements::distinct()->get('sigle');
        $sexe = parlements::distinct()->get('sexe');
        //$resultfomction = parlements::paginate(10);
        $resultfomction = parlements::join('circonscriptions', 'parlements.circonscription', '=', 'circonscriptions.province_id')->paginate(10);



        return view('pages.index', compact('resultfomction', 'province', 'sigle', 'sexe'));
    }
    public function recherchernom(){

        $province = parlements::distinct()->get('province');
       // $circonscription = parlements::distinct()->get('circonscription');
        $sigle = parlements::distinct()->get('sigle');
        $sexe = parlements::distinct()->get('sexe');

        $nom = $_GET['nom'];
        $resultfomction = parlements::where('nom_prov','LIKE', '%'.$nom.'%')->paginate(10);
        return view('pages.index', compact('resultfomction', 'province', 'sigle', 'sexe'));
    }
    //La fonction de recherche
    public function rechercher(Request $request){
        $fonction = parlements::distinct()->get('fonction');
        $province = parlements::distinct()->get('province');
        $circonscription = parlements::distinct()->get('circonscription');
        $sigle = parlements::distinct()->get('sigle');
        $sexe = parlements::distinct()->get('sexe');

         //Province et Circonscription qui marche !!!
         if($request->province !=0 AND $request->circonscription){
            $resultfomction = DB::table('parlements')->
            join('circonscriptions', 'parlements.circonscription','=' ,'circonscriptions.province_id')->
            where('parlements.province', '=', $request->province)->
            where('circonscriptions.nom', '=', $request->circonscription)->
            groupBy('circonscriptions.prvince_nom', 'parlements.province','parlements.id','parlements.sigle', 'parlements.voix_liste','parlements.nom_prov','parlements.postnom', 'parlements.prenom', 'parlements.fonction','parlements.sexe', 'parlements.age','parlements.voix_candidat', 'parlements.circonscription', 'parlements.created_at', 'parlements.updated_at', 'circonscriptions.id' , 'circonscriptions.nom' , 'circonscriptions.province_id', 'circonscriptions.created_at', 'circonscriptions.updated_' )->
            paginate(10);
            return view('pages.index', compact('resultfomction', 'fonction', 'province', 'circonscription', 'sigle', 'sexe'));

        }

        // Quand on valide tous les champs Fonction Province Circonscription
        if($request->fonction != 0 AND $request->province != 0  AND $request->circonscription != 0  AND $request->sigle != 0  AND $request->sexe != 0){
            $resultfomction = DB::table('parlements')->
            join('circonscriptions', 'parlements.circonscription','=' ,'circonscriptions.province_id')->
            where('fonction', '=', $request->fonction)->
            where('province', '=', $request->province)->
            where('circonscription', '=', $request->circonscription)->
            where('sigle', '=', $request->sigle)->
            where('sexe', '=', $request->sexe)->paginate(10);
            return view('pages.index', compact('resultfomction', 'fonction', 'province', 'circonscription', 'sigle', 'sexe'));
        }
        // Quand on valide les 4 champs Province Circonscription Sigle et Sexe
        if( $request->province != 0  AND $request->circonscription != 0  AND $request->sigle != 0  AND $request->sexe != 0){
            $resultfomction = parlements:: where('province', '=', $request->province)->
            where('circonscription', '=', $request->circonscription)->
            where('sigle', '=', $request->sigle)->
            where('sexe', '=', $request->sexe)->
            paginate(10);
            return view('pages.index', compact('resultfomction', 'fonction', 'province', 'circonscription', 'sigle', 'sexe'));
        }
        // Quand on valide 3 champs Circonscription Sigle et Sexe
        if( $request->circonscription != 0  AND $request->sigle != 0  AND $request->sexe != 0){
            $resultfomction = parlements::where('circonscription', '=', $request->circonscription)->
            where('sigle', '=', $request->sigle)->
            where('sexe', '=', $request->sexe)->paginate(10);

            return view('pages.index', compact('resultfomction', 'fonction', 'province', 'circonscription', 'sigle', 'sexe'));
        }
        // Quand on valide 2 champs Sigle et Sexe
        if( $request->sigle != 0  AND $request->sexe != 0){
            $resultfomction = parlements::where('sigle', '=', $request->sigle)->
            where('sexe', '=', $request->sexe)->
            paginate(10);
            return view('pages.index', compact('resultfomction', 'fonction', 'province', 'circonscription', 'sigle', 'sexe'));
        }
        // Quand on valide deux champs Province et fonction
        if($request->province != 0 AND $request->fonction != 0){
            $resultfomction = parlements::where('fonction', '=', $request->fonction)->
            where('province', '=', $request->province)->paginate(10);
            return view('pages.index', compact('resultfomction', 'fonction', 'province', 'circonscription', 'sigle', 'sexe'));
        }



        if($request->fonction != 0){
            $resultfomction = parlements::where('fonction', '=', $request->fonction)->paginate(10);
            return view('pages.index', compact('resultfomction', 'fonction', 'province', 'circonscription', 'sigle', 'sexe', 'provinceselect', 'circonsselect'));
        }
        if($request->province != 0){
            $resultfomction = parlements::where('province', '=', $request->province)->paginate(10);
            return view('pages.index', compact('resultfomction', 'fonction', 'province', 'circonscription', 'sigle', 'sexe'));


        }
        if($request->circonscription != 0){
            $resultfomction = parlements::where('circonscription', '=', $request->circonscription)->paginate(10);
            return view('pages.index', compact('resultfomction', 'fonction', 'province', 'circonscription', 'sigle', 'sexe'));

        }
        if($request->sigle != 0){
            $resultfomction = parlements::where('sigle', '=', $request->sigle)->paginate(10);
            return view('pages.index', compact('resultfomction', 'fonction', 'province', 'circonscription', 'sigle', 'sexe'));

        }
        if($request->sexe != 0){
            $resultfomction = parlements::where('sexe', '=', $request->sexe)->paginate(10);
            return view('pages.index', compact('resultfomction', 'fonction', 'province', 'circonscription', 'sigle', 'sexe'));

        }

        $resultfomction = DB::table('parlements')->
        join('circonscriptions', 'parlements.circonscription','=' ,'circonscriptions.province_id')->paginate(10);
        return view('pages.index', compact('resultfomction', 'fonction', 'province', 'circonscription', 'sigle', 'sexe'));


    }
    public function fetchstate(Request $request){
        $data['circonscription'] = circonscription::where('province_id', $request->province_id)->get('nom','id');
        return response()->json($data);
    }

    public function fetchprovince(Request $request){
        $donnees['circons'] = circonscription::where('prvince_nom', $request->prvince_nom)->get('nom');
        return response()->json($donnees);


    }
    //Select avec Ajax
    public function select(){
        $provinceselect = province::all();
        return view('pages.index', compact('provinceselect'));
    }


    // On l'utilise plus
    public function donnees(Request $request){
        $provincefonc = $request->fonction;
        $province = $request->province;
        $circonscription = $request->circonscription;
        $sigle = $request->sigle;
        $sexe = $request->sexe;

        $parlementaires = parlements::where('fonction', '=', $provincefonc  )->orwhere('province', '=', $province)->orwhere('circonscription', '=', $circonscription)->orwhere('sigle', '=', $sigle)->orwhere('sexe', '=', $sexe)->paginate(10);
        return view('pages.index', compact('parlementaires', 'provincefonc'));

    }
    public function multiple(Request $request){
        $fonction =  $request->fonction;
        if(!$fonction == 0){
            $resultfomction = parlements::where('fonction', '=', $fonction  );
            return view('pages.index', compact('resultfomction'));

        }else{

        }
    }

    public function prendrecir(){
        $circons = parlements::get('circonscription');

        return view('pages.index', );
    }

     Show the form for creating a new resource.


    // Recherche du sigle
    public function sigle(){
        $sigle = $_GET['sigle'];
      //  $province = $_GET['province'];

        $parlementaires = parlements::where('sigle','LIKE', '%'.$sigle.'%')->paginate(10);
        return view('pages.index', compact('parlementaires'));
    }

    //Recherche circonscription
    public function circonscription(){
        $circonscription = $_GET['circonscription'];
        $parlementaires = parlements::where('circonscription', 'LIKE','%'.$circonscription.'%')->paginate(10);
        return view('pages.recherche', compact('parlementaires'));
    }
    //Filtre fonction
    public function fonction(Request $request){
        $fonction = $request->fonction;
        $sexe = $request->sexe;
        $province = $request->province;
        $sigle = $request->sigle;

        $parlementaires = parlements::where('fonction', '=', $fonction)->orwhere('sexe', '=', $sexe)->orwhere('province', '=', $province)->orwhere('sigle', '=', $sigle)->paginate(10);
        return view('pages.recherche', compact('parlementaires'));
    }

    //Filtre sexe
    public function sexe(Request $request){
        $sexe = $request->sexe;
        $circonscription = $request->circonscription;
        $province = $request->province;

        $parlementaires = parlements::where('sexe', '=', $sexe)->orwhere('circonscription', '=', $circonscription)->orwhere('province', '=', $province)->paginate(10);
        return view('pages.index', compact('parlementaires'));

    }

    //Filtre province
    public function province(Request $request){
        $province = $request->province;
        $sexe = $request->sexe;
        $fonction = $request->fonction;

        $parlementaires = parlements::where('province', '=', $province)->orWhere('sexe', '=', $sexe)->orwhere('fonction', '=', $fonction)->paginate(10);
        return view('pages.index', compact('parlementaires'));
    }

    /**   public function antenne(Request $request){
       * $antenne = $request->antenne;

        *$electeurs = Electeurs::where('antenne', '=', $antenne)->paginate(10);
        *return view('pages.index', compact('electeurs'));
    *}*/



}
