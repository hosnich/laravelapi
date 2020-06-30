<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cours extends Model
{
    protected $fillable = [
        'id' ,'nomCours', 'descCours','fichier'
        ];
}
