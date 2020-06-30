<?php

namespace App\Http\Controllers;

use App\Emploi;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Storage;
use Facade\FlareClient\Stacktrace\File;
use Illuminate\Support\Facades\Validator;


class EmploiController extends Controller
{
    function index()
    {
        $Emploi= Emploi::all();
        return $Emploi;
    }

    private $file;

    

    protected function store(Request $data)
    {
        $filename=$data->file('emploi')->getClientOriginalName();
        $path = $data->file('emploi')->storeAs('\fichier\emplois',$filename);
        $Result = DB::insert('insert into emplois (idFormation,classe,emploi) values (?,?,?)', [ $data->idFormation,$data->classe,$filename]);
        $Emploi= Emploi::all();
        return $Emploi;
    }
    
    public function delete($id)
    {
        Emploi::destroy($id);
        
        $fichier=DB::select('select emploi from emplois where id = ?', [$id]);
        
        Storage::delete('storage/app/fichier/emplois/'.var_dump($fichier));
        
        $Emploi= Emploi::all();
        
    }

    public function edit($id)
    {
        $Emploi= Emploi::find($id);
        return $Emploi;
    }

    public function update(Request $request)
    {
        $Emploi = Emploi::find($request->id);
    
        // $user->nom = $request->nom;
        // $user->prenom = $request->prenom;
        // $user->DateNais = $request->DateNais;
        // $user->cin = $request->cin;
        // $user->email = $request->email;
       
        // $user->save();

    }
}
