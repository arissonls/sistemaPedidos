<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClientesModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "clients";
    protected $fillable = [
        'id_usuario','birth',
        'cellphone','estate',
        'city','distrit',
        'streat','house'
    ];

    protected $dates = ['deleted_at'];
    
}
