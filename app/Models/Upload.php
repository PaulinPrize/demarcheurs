<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    protected $table = 'uploads';

    protected $fillable = [
    	'filename', 'original_name', 'index', 'logement_id',
    ];
}
