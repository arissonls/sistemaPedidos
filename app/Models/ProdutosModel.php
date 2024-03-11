<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProdutosModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "products";
    protected $fillable = ['name','slug','description','price','status'] ;

    protected $date = ['deleted_at'];
}
