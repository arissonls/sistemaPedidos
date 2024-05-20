<?php

namespace App\Http\Controllers;

use App\Models\ProdutosModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Produtos extends Controller
{
    //
    public function index(){
        $produtos = ProdutosModel::all();
        return view("produto.index",compact("produtos"));
    }

    public function create(){
        return view("produto.cadastro");
    }
    
    public function store(Request $request){
        $valid_form = $this->validate($request,[
            'name' => "required",
            'price' => "required"
        ]);
        $path = null;
        if($request->file("slug")){
            $path = $request->file("slug") -> store('public/images');
        }
        $preco = preg_replace( '/[^0-9\,\+\-eE]+|(?<!\d)\,(?!\d)/','',$request->price);
        if($valid_form){
            ProdutosModel::create([
                'name' => $request->name,
                'description' => $request->description,
                'slug' => $path,
                'price' => str_replace(',','.',$preco),
                'status' => 'A'
            ]);
            return redirect("produtos/")->with("success","Produto cadastrado !");
        }else{
            return redirect()->back()->with("error","Não foi possível cadastrar o produto!");
        }
    }

    public function show($id){
        $produto=ProdutosModel::find($id);
        return view("produto.editar",compact("produto"));
    }

    public function update(Request $request, $id){
        $produto = ProdutosModel::find($id);

        $valid_form = $this->validate($request,[
            "name"=> "required",
            "price" => "required"
        ]);
        $path = null;
        if($request->file("slug")){
            Storage::delete($produto->slug);
            $path = $request->file("slug")->store("public/images");
        }

        if($valid_form){
            $produto->name = $request->name;
            $produto->slug = ($path??$produto->slug);
            $produto->description = $request->description;
            $produto->price = str_replace(',','.',$request->price);
            $produto->save();

            return redirect("produtos/")->with("success","Alteração realizada!");
        }else{
            return redirect()->back()->with("error","Não foi possivel salvar as alterações");
        }
    }

    public function destroy($id){
        $produto = ProdutosModel::findOrFail($id);
        $produto->delete();
        return redirect("produtos")->with("success",'Produto removido!');
    }

}
