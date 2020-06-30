<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use DB;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Console\Input\Input;

class ApprenantController extends Controller
{

    /*
    afficher le profile d'apprenant
    */
    public function show($id)
    {
        $user = user::find($id);
        return $user->get();
    }


    /*
    afficher tous les apprenants
    */
    function index()
    {
        $User = User::all()->where('role','Apprenant');
        return $User->get();
    }

    /*
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
        
        // User::create([
        //     'name' => $data['nom'],
        //     'prenom' => $data['prenom'],
        //     'dateNais' => $data['dateNais'],
        //     'cin' => $data['cin'],
        //     'role' => 'Apprenant',
        //     'email' => $data['email'],
        //     'adresse' => $data['adresse'],
        //     'password' => $data['password'],
        // ]);

        
        $nom=$request['nom'];
        $prenom=$request['prenom'];
        $cin=$request['cin'];
        $dateNais=$request['dateNais'];
        $adresse=$request['adresse'];
        $email=$request['email'];
        $password=$request['password'];
        $role="Apprenant";

        $user = DB::insert('insert into users (name,prenom, dateNais , cin, email , adresse, password,role ) values(?,?,?,?,?,?,?,?)' , [ $nom , $prenom , $dateNais , $cin , $email ,$adresse , $password ,$role ]);


        $User = User::all()->where('role','Apprenant');
        return $User;
    }


    /* 
    afficher le formulaire pour modifier un apprenant
    */
    public function edit($id)
    {
        $user=User::find($id);
        return $user->get;
        // return view('profile')->with('user',User::find($id));
    }

    /*
    mettre a jour un apprenant
    */
    public function Update(Request $request)
    {

        // $reqdata = $request->all(); 

        //  $user= User::where('id',$request->id)->update($reqdata);
      
        // $user=User::find($request['id']);
        
        $id=$request["id"];
        $nom=$request['nom'];
        $prenom=$request['prenom'];
        $cin=$request['cin'];
        $dateNais=$request['dateNais'];
        $adresse=$request['adresse'];
        $email=$request['email'];
        $password=$request['password'];


        // $user=DB::table('Users')
        // ->where('id', $request->get('id'))
        // ->update(['name' => $request->get('nom')],
        //          ['prenom' => $request->get('prenom')]);
        // return $user;


        $user = DB::update('update users set name = ? , prenom= ? , dateNais = ? , cin= ? , email = ? , adresse=? , password = ? where id = ?' , [ $nom , $prenom , $dateNais , $cin , $email ,$adresse , $password , $id ]);
        

        // $this->validate($request,[
        //     'nom' => 'required',
        //     'prenom' => 'required',
        //     'dateNais' => 'required',
        //     'cin' => 'required',
        //     'email' => 'required|email',
        //     'password' => '',
        // ]);
      
        
        // $user->name = $request->nom;
        // $user->prenom = $request->prenom;
        // $user->dateNais = $request->dateNais;
        // $user->cin = $request->cin;
        // $user->email = $request->email;
    

        // if ($request ->has('password'))
        //     {
        //         $user->password = $request->Hash::make($request['password']);
        //     }
        
        // $user->save();

        return $request;
        
    }

//     public function save()
// {
//     $user = new User(Input::all());

//     $user->save();
// }


    /*
    supprimer un apprenant
    */
    public function destroy($id)
    {
        $user=User::find($id);
        $user->delete();
            // return redirect('ListApprenant')->with('success','Apprenant supprimer');
    }
}
