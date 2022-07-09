<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Exports\exportarRelatorio;

use PDF;


class RelatorioController extends Controller
{
    

	

    public function index() {


    	 $movimentacoes =  DB::select('select conteiners.Cliente, conteiners.Categoria, movimentacoes.Conteiner, movimentacoes.Tipo_Movimentacao, movimentacoes.Data_Inicio, movimentacoes.Data_Fim from movimentacoes left outer join conteiners on (movimentacoes.Conteiner = conteiners.Conteiner);');

    	 $importacoes = DB::select('select conteiners.Cliente from movimentacoes left outer join conteiners on (movimentacoes.Conteiner = conteiners.Conteiner) where conteiners.Categoria = "Importação";');
    	$exportacoes = DB::select('select conteiners.Categoria from movimentacoes left outer join conteiners on (movimentacoes.Conteiner = conteiners.Conteiner) where conteiners.Categoria = "Exportação";');

        return view('relatorio', compact(('movimentacoes'),('importacoes'),('exportacoes'))
    );



    // $arquivo = 'relatorio'.date('_d-m-Y__H:i:s').'.csv';
    //    return Excel::download(new exportarRelatorio, $arquivo);
    }

    public function download() {
    	
    	   	 $movimentacoes =  DB::select('select conteiners.Cliente, conteiners.Categoria, movimentacoes.Conteiner, movimentacoes.Tipo_Movimentacao, movimentacoes.Data_Inicio, movimentacoes.Data_Fim from movimentacoes left outer join conteiners on (movimentacoes.Conteiner = conteiners.Conteiner);');

    	 $importacoes = DB::select('select conteiners.Cliente from movimentacoes left outer join conteiners on (movimentacoes.Conteiner = conteiners.Conteiner) where conteiners.Categoria = "Importação";');
    	$exportacoes = DB::select('select conteiners.Categoria from movimentacoes left outer join conteiners on (movimentacoes.Conteiner = conteiners.Conteiner) where conteiners.Categoria = "Exportação";');



        $pdf = PDF::loadView('relatorio', compact(('movimentacoes'),('importacoes'),('exportacoes')));
        
        return $pdf->download('relatorio'.date('_d-m-Y__H:i:s').'.pdf');
    }
}
