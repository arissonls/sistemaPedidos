<?php

namespace App\Http\Controllers;

use App\Models\ClientesModel;
use App\Models\PedidosItensModel;
use App\Models\PedidosModel;
use App\Models\ProdutosModel;
use Illuminate\Http\Request;

class   Pedidos extends Controller
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
        // Validação dos dados
        $validated = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'dt_expected' => 'required|date',
            'status' => 'required|string',
            'paid' => 'required|string',
            'items' => 'required|array',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.qtd' => 'required|integer|min:1',
            'items.*.unit_rating' => 'required|numeric',
        ]);

        $pedido = PedidosModel::create([
            'client_id' => $validated['client_id'],
            'dt_expected' => $validated['dt_expected'],
            'status' => $validated['status'],
            'paid' => $validated['paid'],
            'dt_payment' => now(), // ou outro valor dependendo da lógica
        ]);

        foreach ($validated['items'] as $item) {
            PedidosItensModel::create([
                'order_id' => $pedido->id,
                'product_id' => $item['product_id'],
                'qtd' => $item['qtd'],
                'unit_rating' => $item['unit_rating'],
                'ful_rating' => $item['unit_rating'] * $item['qtd'], // Total do item
                'discount' => 0, // Adapte conforme necessário
            ]);
        }

        return redirect()->route('orders.index')->with('success', 'Pedido criado com sucesso!');
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
