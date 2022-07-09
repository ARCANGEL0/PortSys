<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Movimentacoes;
use Illuminate\Http\Request;
Use Exception;

class MovimentacoesController extends Controller
{
    public function index() {

     $conteiners =  DB::table('conteiners')->get();
        $movimentacoes = DB::table('movimentacoes')->get();
       
    $distinctConteiners = DB::table('movimentacoes')->distinct()->get(['Conteiner']);
    $distinctTipos = DB::table('movimentacoes')->distinct()->get(['Tipo_Movimentacao']);

        return view('movimentacoes', compact(('distinctConteiners'),('conteiners'),('movimentacoes'),('distinctTipos')));
  
       }

    public function cadastrar(Request $req) 
    {



			$mov = new Movimentacoes;
			$mov->Tipo_Movimentacao=$req->regTipo;
			$mov->Data_Inicio=$req->regInicio;
			$mov->Data_Fim=$req->regDataFim;
			$mov->Conteiner=$req->regMovCont;

        try{
			$mov->save();
			return redirect()->back()->with('success','Movimentação registrada!');
        }   

        catch(Exception $e)
        {
            return redirect()->back()->with('error',$e);

        }
    }


    public function editar(Request $req,$id) 
    {



            $mov =Movimentacoes::find($id);
            $mov->Conteiner=$req->editMovCont;
            $mov->Tipo_Movimentacao=$req->editTipo;
            $mov->Data_Inicio=$req->editInicio;
            $mov->Data_Fim=$req->editFim;

        try{
            $mov->save();
            return redirect()->back()->with('edit','Movimentação alterada!');
        }   
        catch(Exception $e)
        {
            return redirect()->back()->with('error',$e);

        }
    }

    public function deletar(Request $req,$id) 
    {


            $mov = Movimentacoes::find($id);
        try{
            $mov->delete();
            return redirect()->back()->with('deletado','Contêiner deletado!');
        }
        catch(Exception $e)
        {
            return redirect()->back()->with('error',$e);

        }

    }



}
