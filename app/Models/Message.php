<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'texte', 
        'email', 
        'logement_id',
    ];

    public function logement()
    {
        return $this->belongsTo(Logement::class);
    }
}
