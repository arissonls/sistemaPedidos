<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PedidosItensModel extends Model
{
    use HasFactory;

    protected $table = "orders_itens";
    protected $fillable = ["id_order",'id_product','qtd','unit_rating', 'ful_rating','discount'];

    
}
