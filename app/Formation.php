<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    protected $fillable = [
        'id' ,'nomFormation', 'descriptionFormation', 'dureeFormation', 'prixFormation'
        ];
}
