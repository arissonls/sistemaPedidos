<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PedidosModel extends Model
{
    use HasFactory;
    
    protected $table="orders";
    protected $fillable = ['id_client','dt_expected','rating','paid','dt_payment','status'];

    public function clientes(){
        return $this->hasMany(ClientesModel::class);
    }
}
