<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class morador extends Model
{
    use HasFactory;

    public function apartamento()
    {
        return $this->belongsTo(apartamento::class);
    }

    protected $fillable = [
        'nome', 'telefone', 'email'
    ];
}

