<?php

namespace App\Policies;

use App\Models\ {User, Logement};
use Illuminate\Auth\Access\HandlesAuthorization;

/*
    On sait qu’on a des annonces valides, qui ont été modérées par un administrateur et des non valides. il ne faudrait pas qu’un petit malin change l’identifiant dans l’url pour aller lire une annonce pas encore valide. On va donc mettre en place une autorisation pour accéder à une annonce : si elle est valide pas de souci, si elle ne l’est pas on laisse l’accès uniquement à celui qui l’a créée et qui a un compte et aussi aux administrateurs.
*/

class LogementPolicy
{
    use HandlesAuthorization;

    // Avec la méthode before on prévoit d’autoriser les administrateurs de façon systématique. 
    
    public function before(User $user)
    {
        if($user->admin) {    
            return true;
        }
    }

    /* Avec la méthode show on autorise le visiteur, connecté ou pas, à accéder si l’annonce est valide ou si le visiteur connecté est l’auteur de l’annonce.
    */

    public function show(?User $user, Logement $logement)
    {
        if($user && $user->id == $logement->user_id) {
            return true;
        }
        return $logement->active;
    }

    public function manage(User $user, Logement $logement)
    {
        return $user->id == $logement->user_id;
    }
    
    /**
     * Determine whether the user can view any logements.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the logement.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Logement  $logement
     * @return mixed
     */
    public function view(User $user, Logement $logement)
    {
        //
    }

    /**
     * Determine whether the user can create logements.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the logement.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Logement  $logement
     * @return mixed
     */
    public function update(User $user, Logement $logement)
    {
        //
    }

    /**
     * Determine whether the user can delete the logement.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Logement  $logement
     * @return mixed
     */
    public function delete(User $user, Logement $logement)
    {
        //
    }

    /**
     * Determine whether the user can restore the logement.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Logement  $logement
     * @return mixed
     */
    public function restore(User $user, Logement $logement)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the logement.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Logement  $logement
     * @return mixed
     */
    public function forceDelete(User $user, Logement $logement)
    {
        //
    }
}
