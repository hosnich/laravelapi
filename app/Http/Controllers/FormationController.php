<?php

namespace App\Http\Controllers;

use App\Formation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Formations;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Validator;


class FormationController extends Controller
{
    /*
    afficher tous les formations
    */
    public function index():UserResource
    {
        $formation = Formation::all();        
        return new UserResource($formation);
    }


    /**
     *
     * @param  array  $data
     * @return \App\Formation
     */
    protected function store(Request $data):UserResource
    {
        // $Result = Formation::create([
        //     'nomFormation' => $data->nom,
        //     'descriptionFormation' => $data->desc,
        //     'duree' => $data->duree,
        //     'prix' => $data->prix,
        // ]);
        
        DB::insert('insert into formations (nomFormation,descriptionFormation,dureeFormation,prixFormation) values (?,?,?,?)', [ $data->nom,$data->desc,$data->duree,$data->prix]);
        $Formation = Formation::all();        
        return new UserResource($Formation);
    }


    /*
    supprimer un formation
    */
    public function delete($id)
    {
        Formation::destroy($id);

    }

    /*
     afficher le formulaire pour modifier un formation
    */
    public function edit($id):UserResource
    {
        $formation= Formation::find($id);
        
        return new UserResource($formation);
    }

    public function update(Request $request):UserResource
    {
         $formation = Formation::find($request->id);
        // $this->validate($request,[
        //     'nom' => 'required',
        //     'prenom' => 'required',
        //     'DateNais' => 'required',
        //     'cin' => 'required',
        //     'email' => 'required|email',
        //     'password' => '',
        // ]);
      
        // $user->nom = $request->nom;
        // $user->prenom = $request->prenom;
        // $user->DateNais = $request->DateNais;
        // $user->cin = $request->cin;
        // $user->email = $request->email;
    
        // $user->save();
        return new UserResource($formation);

    }

}
