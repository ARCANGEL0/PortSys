<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Conteiners;
use Yajra\Datatables\Datatables;
use Exception;

class ConteinerController extends Controller
{


	 public function index()
    {

 $conteiners =  DB::table('conteiners')->get();
       
$clientes = DB::table('conteiners')->distinct()->get(['Cliente']);
$tipos = DB::table('conteiners')->distinct()->get(['Tipo']);
$categorias = DB::table('conteiners')->distinct()->get(['Categoria']);
$statuss = DB::table('conteiners')->distinct()->get(['Status']);

        return view('conteiners', compact(
        	('clientes'),('statuss'),('tipos'),('categorias'),
        	('conteiners')));
  
       }



    


public function cadastrar(Request $req)
{


			$conteiner = new Conteiners;
			$conteiner->Cliente=$req->regCliente;
			$conteiner->Conteiner=$req->regConteiner;
			$conteiner->Tipo=$req->regTipo;
			$conteiner->Status=$req->regStatus;
			$conteiner->Categoria=$req->regCategoria;
		try{
			$conteiner->save();
			return redirect()->back()->with('success','Contêiner registrado!');
		}
		catch(Exception $e)
		{
			return redirect()->back()->with('error',$e);

		}

}

public function editar(Request $req, $id)
{

		
			$conteiner = Conteiners::find($id);
			$conteiner->Cliente=$req->editCliente;
			$conteiner->Conteiner=$req->editConteiner;
			$conteiner->Tipo=$req->editTipo;
			$conteiner->Status=$req->editStatus;
			$conteiner->Categoria=$req->editCategoria;
		try{
			$conteiner->save();
			return redirect()->back()->with('edit','Contêiner alterado!');
		}

		catch(Exception $e)
		{
			return redirect()->back()->with('error',$e);

		}
}

public function deletar(Request $req, $id)
{




			$conteiner = Conteiners::find($id);
		try{
			$conteiner->delete();
			return redirect()->back()->with('deletado','Contêiner deletado!');


		}
		catch(Exception $e)
		{
			return redirect()->back()->with('error',$e);

		}

}


}
