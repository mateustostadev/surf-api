<?php

namespace App\Http\Controllers;

use App\Models\Nota;
use Illuminate\Http\Request;
use App\Models\Onda;

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

        $onda = Onda::findOrFail($request->input('onda'));

        return response()->json([
            'message' => 'Notas cadastradas com sucesso.',
            'onda_id' => $onda->id,
            'notaParcial1' => $nota->notaParcial1,
            'notaParcial2' => $nota->notaParcial2,
            'notaParcial3' => $nota->notaParcial3,
        ], 201);
    }
}
