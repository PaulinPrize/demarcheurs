<?php

namespace App\Repositories;

use App\Models\Message;

class MessageRepository
{
    /**
     * Create a message.
     *
     * @param Array $data
     */
    public function create($data)
    {
        return Message::create($data);
    }

    // Compter les messages à modérer
    public function count()
    {
        return Message::count();
    }

    // Récupérer tous les messages en attente
    public function all($nbr)
    {
        return Message::latest()->paginate($nbr);
    }

    //Récupérer le logement qui correspond à un message
    public function getLogement($message)
    {
        return $message->logement()->firstOrFail();
    }

    // Supprimer le message
    public function delete($message)
    {
        $message->delete();
    }

    public function getById($id)
{
    return Message::findOrFail($id);
}
}
