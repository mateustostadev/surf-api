<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Onda extends Model
{
    use HasFactory;

    protected $fillable = ['bateria', 'surfista'];

    // Relacionamento com a tabela Nota
    public function notas()
    {
        return $this->hasOne(Nota::class, 'onda', 'id');
    }

    public function bateria()
{
    return $this->belongsTo(Bateria::class, 'bateria_id');
}

    // Método para calcular a média das notas desta onda
    public function calcularMedia()
    {
        $nota = $this->notas;
        return ($nota->notaParcial1 + $nota->notaParcial2 + $nota->notaParcial3) / 3;
    }

}
