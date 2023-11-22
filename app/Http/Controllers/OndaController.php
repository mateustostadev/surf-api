<?php

namespace App\Http\Controllers;

use App\Models\Onda;
use Illuminate\Http\Request;

class OndaController extends Controller
{
    public function cadastrarOnda(Request $request)
    {
        $request->validate([
            'bateria' => 'required|exists:baterias,id',
            'surfista' => 'required|exists:surfistas,numero',
        ]);

        $onda = Onda::create([
            'bateria' => $request->input('bateria'),
            'surfista' => $request->input('surfista'),
        ]);

        return response()->json([
            'message' => 'Onda cadastrada com sucesso.',
            'onda' => $onda,
        ], 201);
    }
}