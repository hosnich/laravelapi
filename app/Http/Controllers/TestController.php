<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Integer;
use Reponses;
use Symfony\Component\Console\Input\Input;

class TestController extends Controller
{

    public function AjoutTest(Request $data)
    {
        $Result = DB::insert('insert into tests (idFormation,nomTest,nombreQuestion) values (?,?,?)', [1,$data->nom,$data->nombreQuestion]);
        return view('AjoutTest')->with('nombreQuestion',$data->nombreQuestion);
        
    }

    public function AjoutQuestion(Request $data)
    {
        if( is_Null($data->Juste) ) {
            $reponseJuste= 'false';
        } else {
           $reponseJuste= 'true';
        }
        $InsererQuestion = DB::insert('insert into questions (idTest,question) values (?,?)', [1,$data->question]);
        $InsererReponse = DB::insert('insert into reponses (idQuestion,reponse,reponseJuste) values (?,?,?)', [1,$data->reponse,$reponseJuste]);  
    }

    function getTest($id)
    {
        $Test= DB::select('select * from tests where idFormation=? ',[$id]);
        // $idTest=$Test['idTest'];
        $Question = DB::select('select * from questions where idTest = ?', [$id]);
        foreach ($Question as $Quest ){
            for( $i=1; $i<3 ; $i++)
            {

            $Reponse = DB::select('select * from reponses where idQuestion = ?', [$i]);

            }
        }
        return [$Test,$Question,$Reponse];
    }
    
}
