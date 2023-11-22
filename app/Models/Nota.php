<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    use HasFactory;

    protected $fillable = ['onda', 'notaParcial1', 'notaParcial2', 'notaParcial3'];

    // Relacionamento com a tabela Onda
    public function onda()
    {
        return $this->belongsTo(Onda::class, 'onda', 'id');
    }

}
