<?php

namespace App\Http\Controllers;

use App\Models\circonscription;
use App\Models\parlements;
use App\Models\province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CirconscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fonction = parlements::distinct()->get('fonction');
        $province = parlements::distinct()->get('province');
        $circonscription = parlements::distinct()->get('circonscription');
        $sigle = parlements::distinct()->get('sigle');
        $sexe = parlements::distinct()->get('sexe');
        $resultfomction = parlements::whereFonction('depute provincial')->paginate(10);
        $provinceselect = province::all();
        $circonsselect = circonscription::all();
        return view('pages.depute', compact('resultfomction', 'fonction', 'province', 'circonscription', 'sigle', 'sexe', 'provinceselect','circonsselect'));
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
    public function show(circonscription $circonscription)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(circonscription $circonscription)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, circonscription $circonscription)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(circonscription $circonscription)
    {
        //
    }
}
