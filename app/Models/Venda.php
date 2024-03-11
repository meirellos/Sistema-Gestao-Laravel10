<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero_da_venda',
        'produto_id',
        'cliente_id',
    ];

    public function produto(){
        return $this->belongsTo(Produto::class);
    }

    public function cliente(){
        return $this->belongsTo(Cliente::class);
    }
}
