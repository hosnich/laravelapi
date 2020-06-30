<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApprenantFormation extends Model
{
    protected $fillable = [
        'id' ,'idApprenant', 'idFormation', 'dateInscris'        ];
}
