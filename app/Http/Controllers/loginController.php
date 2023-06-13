<?php

namespace App\Http\Controllers;

use App\Http\Requests\credentials;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class loginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       /* User::create([
            'name' => 'jonathan',
            'email' => 'jnthnkabongo@gmail.com',
            'password' => Hash::make('12345')
        ]);*/
        return view('auth.login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(credentials $request)
    {
        $credentials = $request->validated();
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended(route('index'));
        }
        return to_route('connexion')->withErrors([
            'email' => 'L\'email n\'est pas correcte'
        ])->onlyInput('email');
    }

    public function logout(){
        
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
}
