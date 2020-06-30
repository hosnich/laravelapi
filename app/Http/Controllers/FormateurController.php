<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use DB;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class FormateurController extends Controller
{
    /*
    afficher tous les formateurs
    */
    function index()
    {
        $User = User::all()->where('role','Formateur');
        return $User;
    }


    /*
    afficher le profile de formateur
    */
    public function show($id)
    {
        $user = user::find($id);
        return $user;    
    }



    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nom' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'dateNais' => ['required', 'date', 'max:255'],
            'cin' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => [ 'string', 'max:255'],
        ]);
    }

    
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function store(Request $request)
    {
        
        $id=$request["id"];
        $nom=$request['nom'];
        $prenom=$request['prenom'];
        $cin=$request['cin'];
        $dateNais=$request['dateNais'];
        $adresse=$request['adresse'];
        $email=$request['email'];
        $password=$request['password'];
        $role="Formateur";

        $user = DB::insert('insert into users (name,prenom, dateNais , cin, email , adresse, password,role ) values(?,?,?,?,?,?,?,?)' , [ $nom , $prenom , $dateNais , $cin , $email ,$adresse , $password ,$role ]);


        $User = User::all()->where('role','Formateur');
        return $User;

    }

    /* 
    afficher le formulaire pour modifier un formateur
    */
    public function edit($id)
    {
        $user=User::find($id);
        return $user;
    }
    
     /*
    mettre a jour un formateur
    */
    public function Update(Request $request)
    {    
        $id=$request["id"];
        $nom=$request['nom'];
        $prenom=$request['prenom'];
        $cin=$request['cin'];
        $dateNais=$request['dateNais'];
        $adresse=$request['adresse'];
        $email=$request['email'];
        $password=$request['password'];

        
        $user = DB::update('update users set name = ? , prenom= ? , dateNais = ? , cin= ? , email = ? , adresse=? , password = ? where id = ?' , [ $nom , $prenom , $dateNais , $cin , $email ,$adresse , $password , $id ]);
    
        return $request;
    }

    /*
    supprimer un formateur
    */
    public function delete($id)
    {
        $user=User::find($id);
        $user->delete();
    }    

}

