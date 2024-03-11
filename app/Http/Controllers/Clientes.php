<?php

namespace App\Http\Controllers;

use App\Models\ClientesModel;
use Illuminate\Http\Request;

class Clientes extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $clientes = ClientesModel::all();
        return view("cliente.index",compact('clientes'));
    }

    public function create(){
        return view('cliente.cadastro');
    }

    public function store(Request $request){
        $valid_form = $this->validate($request,[
            "name"=>"required",
            "cellphone" => "required",
            "estate" =>"required",
            "city" => "required",
            "district" => "required",
            "streat" => "required",
            "house" => "required"
        ]);
        if($valid_form){
            $insert = $request->all();
            $insert['cellphone'] = preg_replace('/\D/','', $insert['cellphone']);
            $insert['zip_code'] = preg_replace('/\D/','', $insert['zip_code']);
            ClientesModel::create($insert);
            return redirect("clientes/")->with("success","Cliente cadastrado com sucesso!");
        }else{
            return redirect()->back()->with("error","Não foi possível cadastar o cliente!");
        }
    }

    public function show($id){
        $cliente = ClientesModel::findOrFail($id);
        return view("cliente.editar",compact("cliente"));
    }

    public function update(Request $request, $id){
        $cliente = ClientesModel::findOrFail($id);

        $valid_form = $this->validate($request,[
            "name"=>"required",
            "cellphone" => "required",
            "estate" =>"required",
            "city" => "required",
            "district" => "required",
            "streat" => "required",
            "house" => "required"
        ]);
        if($valid_form){
            $insert = $request->all();
            $cliente->name = $insert['name'];
            $cliente->estate = $insert['estate'];
            $cliente->city = $insert['city'];
            $cliente->district = $insert['district'];
            $cliente->streat = $insert['streat'];
            $cliente->birth = $insert['birth'];
            $cliente->email = $insert['email'];
            $cliente->house = $insert['house'];
            $cliente->cellphone = preg_replace('/\D/','', $insert['cellphone']);
            $cliente->zip_code = preg_replace('/\D/','', $insert['zip_code']);
            $cliente->save();
            return redirect()->back()->with("success","Alteração realizada");
        }else{
            return redirect()->back()->with("error","Não foi possível salvar as alterações!");
        }
    }

    public function destroy($id){
        $cliente=ClientesModel::findOrFail($id);
        $cliente->delete();
        return redirect("clientes")->with("success","Cliente removido!");
    }

}
