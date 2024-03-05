<?php

namespace App\Http\Controllers;
use App\Http\Requests\CategorieCreateRequest;
use App\Http\Requests\CategorieUpdateRequest;
use App\Repositories\CategorieRepository;
use Illuminate\Http\Request;
use App\Models\Category;

class CategorieController extends Controller
{
    protected $categorieRepository;
    protected $nbrPerPage = 25;

    public function __construct(CategorieRepository $categorieRepository)
    {
        $this->middleware('auth');
        $this->categorieRepository = $categorieRepository;  
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->categorieRepository->getPaginate($this->nbrPerPage);
        $links = $categories->render();
        return view('categorie/toutes-les-categories', compact('categories', 'links'));   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categorie/ajouter');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategorieCreateRequest $request)
    {
        $categorie = $this->categorieRepository->store($request->all());
        return redirect('categorie/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categorie = $this->categorieRepository->getById($id);
        return view('categorie/afficher',  compact('categorie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categorie = $this->categorieRepository->getById($id);
        return view('categorie/modifier',  compact('categorie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategorieUpdateRequest $request, Category $categorie)
    {
        $categorie = $this->categorieRepository->getById($categorie);
        $this->categorieRepository->update($id, $request->all());
        return redirect('categorie/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   

    public function destroy(Request $request, Category $categorie)
    {
        $this->categorieRepository->delete($categorie);
        $request->session()->flash('status', "L'annonce a bien été supprimée.");
        return response()->json();
    }
}
