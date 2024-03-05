<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Logement;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index(){
    	// Afficher les logements actifs
    	$logements = Logement::select()->where('active', 1)->get();
    	/* Afficher le rôle de l'utilisateur connecté
    	$user = Auth::user();
    	$rol = $user->roles->implode('name', ',');*/
    	//dd($rol);
    	return view('home', compact('logements'));
    }
}