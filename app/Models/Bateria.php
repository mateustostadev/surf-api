<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bateria extends Model
{
    use HasFactory;

    protected $fillable = ['surfista1', 'surfista2'];

    // Relacionamento com a tabela Onda
    public function ondas()
    {
        return $this->hasMany(Onda::class, 'bateria', 'id');
    }

    // Método para obter o vencedor da bateria
    public function obterVencedor()
    {
        // Implemente a lógica para determinar o vencedor da bateria
        // Retorna o Surfista vencedor
        return $this->ondas->sortByDesc('calcularMedia')->first()->surfista;
    }

    // Outros métodos ou lógica podem ser adicionados conforme necessário
}
