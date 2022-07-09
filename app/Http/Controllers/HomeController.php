<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
            $conteiners =  DB::table('conteiners')->get();
        $movimentacoes = DB::table('movimentacoes')->get();
        $clientes = DB::table('conteiners')->distinct()->get(['Cliente']);
           
            
        return view('dashboard', compact(('conteiners'),('movimentacoes'),('clientes')));
    }
}
