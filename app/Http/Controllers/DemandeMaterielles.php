<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
use Illuminate\Support\Facades\Auth;
use App\demandeMaterielle;


class DemandeMaterielles extends Controller
{   

    /**
     * afficher tous les demandes de reservation de materielle
     */
    protected function index(Request $data)
    {
        $DemandeMaterielle=demandeMaterielle::all();
        return $DemandeMaterielle;
    }


    /* creer un demande de reservation de materielle 
    */
    protected function store(Request $data)
    {
        
        $idFormateur=Auth::user()->id;
        $Materielle='';
        $DemandeMaterielle = 
        DB::insert('insert into Demande_Materielles (idFormateur,idFormation,materielles) values (?, ?,?)', [$idFormateur,$data->idFormation,$Materielle]);
        return $DemandeMaterielle;
    }

    

    

}
