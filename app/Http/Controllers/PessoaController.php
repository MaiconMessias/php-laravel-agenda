<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PessoaController extends Controller
{
    public function index(){
        return view('dados');
    }

    public function enviar(Request $request){
        $pessoa = \App\Models\Pessoa::find($request->get('id'));
        if ($pessoa == null)
            $pessoa = new \App\Models\Pessoa();

        $pessoa->nome = $request->get('nome');
        $pessoa->rg = $request->get('rg');
        $pessoa->cpf = $request->get('cpf');

        $pessoa->save();

        return redirect('/lista/Nome');
    }

    public function lista($campoOrdenacao){
            
        if (\Request::query('page') == null) {
            \Session::put('campo', strtolower($campoOrdenacao));
            \Session::get('ordenacao') == 'asc' ? \Session::put('ordenacao', 'desc') : \Session::put('ordenacao', 'asc') ;

            return view('lista', array('pessoas' => \App\Models\Pessoa::orderBy( \Session::get('campo') , \Session::get('ordenacao'))->paginate(4)));
        } else     
            return view('lista', array('pessoas' => \App\Models\Pessoa::orderBy( \Session::get('campo') , \Session::get('ordenacao'))->paginate(4)));        
        
    }


    public function deletar($id){

        $pessoa = \App\Models\Pessoa::findOrFail($id);

        $pessoa->delete();

        return redirect('/lista/Nome');
    }


    public function editar($id){
        //$pessoa = new \App\Models\pessoa$pessoa();
        //$query = pessoa$pessoa::query();
        //$query->where('id', '=', $request->get('id'));

        $pessoa = \App\Models\Pessoa::findOrFail($id);

        //$pessoa = $query->nome;
        return view('editar', array('pessoa' => $pessoa));
    }

    public function paginaPrincipal(){
        //return redirect('/lista/Nome');
        return view('lista', array('pessoas' => \App\Models\Pessoa::paginate(4)));
    }

}
