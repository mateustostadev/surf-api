<?php

namespace App\Http\Controllers;

use App\Models\Surfista;
use Illuminate\Http\Request;

class SurfistaController extends Controller
{
    public function inserirSurfista(Request $request)
    {
        $request->validate([
            'nome' => 'required|string',
            'país' => 'required|string',
        ]);

        $surfista = Surfista::create([
            'nome' => $request->input('nome'),
            'país' => $request->input('país'),
        ]);

        return response()->json([
            'message' => 'Surfista cadastrado com sucesso.',
            'surfista' => [
                'id' => $surfista->id,
                'nome' => $surfista->nome,
                'país' => $surfista->país,
            ],
        ], 201);
    }

    public function obterSurfistas()
    {
        $surfistas = Surfista::all();
        return response()->json($surfistas);
    }
}