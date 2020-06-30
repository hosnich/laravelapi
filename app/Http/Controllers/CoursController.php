<?php

namespace App\Http\Controllers;

use App\cours;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Facade\FlareClient\Stacktrace\File;


class CoursController extends Controller
{

    /**
     * afficher tous les cours
     */
    function index()
    {
        $Cours= cours::all();
        return $Cours;
    }



    private $file;

    /*
    ajouter un cours
    */

    protected function store(Request $data)
    {
        $filename=$data->file('fichier')->getClientOriginalName();
        $path = $data->file('fichier')->storeAs('\fichier\cours',$filename);
        $Result = DB::insert('insert into cours (nomCours,descCours,fichier) values (?,?,?)', [ $data->nom,$data->desc,$filename]);
        $Cours= cours::all();
        return $Cours;
    }
    
    /*
    *
    supprimer un cours
    */

    public function delete($id)
    {
        DB::delete('delete from Cours where id = ?', [$id]);
        
        $fichier=DB::select('select fichier from Cours where id = ?', [$id]);
        
        Storage::delete('storage/app/fichier/cours/'.var_dump($fichier));
    }

    /*
    afficher un cours pour le modifier
        **/
    public function edit($id)
    {
        $Cours= cours::find($id);
        
        return view('ModifierCours')->with('Cours',$Cours);
    }

    /*
    mise a jour d'un cours
    */
    public function update(Request $request)
    {
        $cours = Cours::find($request["id"]);
        //.....
    }
}
