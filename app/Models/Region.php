<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
	protected $fillable = [
    	'name', 'slug', 'code',
    ];

    public function logements(){
        return $this->hasMany(Logement::class);
    }
}
