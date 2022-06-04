<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class apartamento extends Model
{
    use HasFactory;
    public function morador()
    {
        return $this->hasMany(morador::class);
    }

    protected $fillable = [
        'metros_quadrados', 'numero_quartos'
    ];


}


