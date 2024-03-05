<?php

namespace App\Http\Controllers;
use App\Models\ { Category, Region, Logement, Upload, User };
use Illuminate\Http\Request;
use App\Repositories\LogementRepository;
use Illuminate\Support\Str;
use App\Http\Requests\LogementCreateRequest;
use App\Notifications\LogementCreateNotification;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class LogementController extends Controller  
{
    protected $nbrPages = 25;
    protected $logementRepository;

    public function __construct(LogementRepository $logementRepository)
    {
        //$this->middleware('auth');
        $this->logementRepository = $logementRepository;  
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */   
    public function index(Request $request, $regionSlug)
    {
        // Récupérer toutes les catégories dans l'ordre alphabétique
        $categories = Category::select('name', 'id')->oldest('name')->get();
        // Récupérer toutes les régions dans l'ordre alphabétique
        $regions = Region::select('id','code','name','slug')->oldest('name')->get();
        /* 
        Ensuite si un slug est présent pour la région (ça sera le cas quand on va cliquer sur une région de la carte) on la récupère, sinon on garde le null :
        */
        $region = $regionSlug ? Region::whereSlug($regionSlug)->firstOrFail() : null;
        // Ensuite on regarde s’il y a une pagination et on renvoie le numéro de la page
        $page = $request->query('page', 0);
        return view('logement/adsvue', compact('categories', 'regions', 'region', 'page'));
    }

    public function search(Request $request)
    {
        setlocale (LC_TIME, 'fr_FR');

        $logements = $this->logementRepository->search($request);

        return view('partials.annoncesEnCours', compact('logements'));
    }

    // Fonction permettant d'afficher un logement
    public function show(Logement $logement)
    {        
        //$this->authorize('show', $logement);  
        // Appel à la fonction du repository
        $photos = $this->logementRepository->getPhotos($logement);
        return view('logement/afficher-logement', compact('logement', 'photos'));
    }

    // Fonction permettant d'afficher le formulaire de création des logements
    public function create(Request $request)
    {
        // Si on n’a pas de référence en session on en crée une (index).
        if(!$request->session()->has('index')) {
            $request->session()->put('index', Str::random(30));
        }
        // Récupérer la liste des catégories
        $categories = Category::select('name', 'id')->oldest('name')->get();
        // Récupérer la liste des régions
        $regions = Region::oldest('name')->get();
        return view('logement/ajouter', compact('categories', 'regions'));
    }

    // Fonction permettant d'enregistrer un logement
    public function store(LogementCreateRequest $request)
    {
        $logement = $this->logementRepository->create([
            'title' => $request->title,
            'texte' => $request->texte,
            'category_id' => $request->category,
            'region_id' => $request->region,
            'user_id' => auth()->check() ? auth()->id() : 0,
            'prix' => $request->prix,
            'commission' => $request->commission,
            'frais_de_visite' => $request->frais_de_visite,
            'pseudo' => auth()->check() ? auth()->user()->name :$request->pseudo,
            'email' => auth()->check() ? auth()->user()->email : $request->email,
            'limit' => Carbon::now()->addWeeks($request->limit),
        ]);
        if($request->session()->has('index')) {
            $index = $request->session()->get('index');
            Upload::whereIndex($index)->update(['logement_id' => $logement->id, 'index' => 0]);
        }
        User::find(1)->notify(new LogementCreateNotification); 
        User::find(2)->notify(new LogementCreateNotification); 
        return view('logement/confirmer-logement');
    } 

    // Fonction permettant d'afficher la liste des logements
    public function all(){
        $logements = $this->logementRepository->getPaginate($this->nbrPages); 
        $links = $logements->render();
        return view('logement/logements', compact('logements', 'links')); 
    } 

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
