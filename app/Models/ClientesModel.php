<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientesModel extends Model
{
    protected $table = "clients";
    protected $fillable = [
        'id_usuario','birth',
        'cellphone','estate',
        'city','distrit',
        'streat','house'
    ];
    
}
