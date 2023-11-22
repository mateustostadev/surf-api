<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surfista extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'país'];

    // Relacionamento com a tabela Bateria (como surfista1 ou surfista2)
    public function baterias()
    {
        return $this->hasMany(Bateria::class, 'surfista1', 'id')
            ->orWhere('surfista2', $this->id);
    }

    // Outros métodos ou lógica podem ser adicionados conforme necessário
}