<?php

namespace App\Http\Controllers;

use App\Models\ClientesModel;
use Illuminate\Http\Request;

class Clientes extends Controller
{
    //

    public function __construct()
    {
        
    }

    public function index(){
        return view("cliente.index",["clientes"=> ClientesModel::all()]);
    }

    public function store(Request $request){
        $valid_form = $this->validate($request,[
            "name"=>"required",
            "cellphone" => "required",
            "estate" =>"required",
            "city" => "required",
            "distrit" => "required",
            "streat" => "required",
            "house" => "required"
        ]);
        if($valid_form){
            ClientesModel::create($request->all());
            return redirect("clientes/")->with("success","Cliente cadastrado com sucesso!");
        }else{
            return redirect()->back()->with("error","Não foi possível cadastar o usuário!");
        }
    }

    public function show($id){
        $cliente = ClientesModel::findOrFail($id);
        
    }

    public function edit($id){

    }

    public function update(Request $request, $id){

    }

    public function destroy($id){

    }

}
