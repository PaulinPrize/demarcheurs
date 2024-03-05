<?php

namespace App\Repositories;

use App\Models\Logement;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
  
class LogementRepository
{
    protected $logement;
    
    public function __construct(Logement $logement)
    {
        $this->logement = $logement;
    }

    /**
     * Search.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function search($request)
    {
        $logements = Logement::query();

        if($request->region != 0) {
            $logements = Logement::whereHas('region', function ($query) use ($request) {
                $query->where('regions.id', $request->region);
            });
        }

        if($request->category != 0) {
            $logements->whereHas('category', function ($query) use ($request) {
                $query->where('categories.id', $request->category);
            });
        }

        return $logements->with('category', 'photos')  
            ->whereActive(true)
            ->latest()
            ->paginate(6);
    }  

    // Récupérer les photos associées au logement publié 
    public function getPhotos($logement)
    {
        return $logement->photos()->get();
    }  

    // Créer un logement
    public function create($data)
    {
        return Logement::create($data);
    }  

    public function getById($id)
    {
        return Logement::findOrFail($id);
    }

    // Compter des logements non actifs
    public function noActiveCount($logements = null)
    {
        if($logements) {
            return $logements->where('active', false)->count();
        }
        return Logement::where('active', false)->count();
    }

    // Compter des logements obsolètes    
    public function obsoleteCount($logements = null)  
    {
        if($logements) {
            return $logements->where('active', true)->where('limit', '<', Carbon::now())->count();
        }
        return Logement::where('limit', '<', Carbon::now())->count();
    }

    // Récupérer les logements non actifs paginés classés par date
    public function noActive($nbr)
    {
        return Logement::whereActive(false)->latest()->paginate($nbr);
    }

    // Fonction permettant d'approver un logement
    public function approve($logement)
    {
        $logement->active = true;
        $logement->save();
    }

    // Fonction permettant de refuser un logement
    public function delete($logement)
    {
        $logement->delete();
    }

    // Méthode permettant de renvoyer les annonces obsolètes paginées
    public function obsolete($nbr)
    {
        return Logement::where('limit', '<', Carbon::now())->latest('limit')->paginate($nbr);
    }

    // Méthode permettant de rajouter une semaine à l’annonce
    public function addWeek($logement)
    {
        $limit = Carbon::create($logement->limit);
        $limit->addWeek();
        $logement->limit = $limit;
        $logement->save();
        return $limit;
    }

    public function getPaginate($n)
    {
        return $this->logement->paginate($n);
    }

    // Connaître le nombre d'annonces actives
    public function activeCount($logements)
    {
        return $logements->where('active', true)->where('limit', '>=', Carbon::now())->count();
    }

    // Aller chercher les annonces de l'utilisateur
    public function getByUser($user)
    {
        return $user->logements()->get();
    }

    // Récupérer les annonces actives paginées pour l'utilisateur en cours
    public function active($user, $nbr)
    {
        return $user->logements()->whereActive(true)->where('limit', '>=', Carbon::now())->paginate($nbr);
    }

    

}
