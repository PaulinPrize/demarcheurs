<?php

namespace App\Models;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Logement extends Model
{
    use Notifiable;
    
    protected $fillable = [
        'title', 
        'texte', 
        'category_id',
        'region_id', 
        'pseudo', 
        'email', 
        'limit',  
        'active',
        'user_id', 
        'prix', 
        'commission', 
        'frais_de_visite',     
    ];

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    public function photos()
    {
        return $this->hasMany(Upload::class);
    }
}
