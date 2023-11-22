<?php

namespace App\Http\Controllers;

use App\Models\Nota;
use Illuminate\Http\Request;

class NotaController extends Controller
{
    public function cadastrarNota(Request $request)
    {
        $request->validate([
            'onda' => 'required|exists:ondas,id',
            'notaParcial1' => 'required|numeric',
            'notaParcial2' => 'required|numeric',
            'notaParcial3' => 'required|numeric',
        ]);

        $nota = Nota::create([
            'onda' => $request->input('onda'),
            'notaParcial1' => $request->input('notaParcial1'),
            'notaParcial2' => $request->input('notaParcial2'),
            'notaParcial3' => $request->input('notaParcial3'),
        ]);

        return response()->json([
            'message' => 'Notas cadastradas com sucesso.',
        ], 201);
    }
}   