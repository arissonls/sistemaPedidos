<?php

namespace App\Http\Controllers;

use App\Models\ClientesModel;
use App\Models\PedidosModel;
use App\Models\ProdutosModel;
use Illuminate\Http\Request;

class Pedidos extends Controller
{
    //
    public function index(){
        $pedidos = PedidosModel::all();
        return view("pedido.index", compact("pedidos"));
    }

    public function create(){
        $produtos = ProdutosModel::all();
        $clientes = ClientesModel::all();
        return view("pedido.cadastro",compact('produtos','clientes'));
    }
    
    public function store(Request $request){
        
    }

    public function show($id){
    
    }

    public function edit($id){
    
    }

    public function update(Request $request, $id){
    
    }

    public function destroy($id){
    
    }
}
