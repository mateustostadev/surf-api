<?php

namespace App\Http\Controllers;

use App\Models\Bateria;
use Illuminate\Http\Request;
use App\Models\Nota;

class BateriaController extends Controller
{
    public function criarBateria(Request $request)
{
    $request->validate([
        'surfista1' => 'required|exists:surfistas,numero',
        'surfista2' => 'required|exists:surfistas,numero',
    ]);

    $bateria = Bateria::create([
        'surfista1' => $request->input('surfista1'),
        'surfista2' => $request->input('surfista2'),
    ]);

    return response()->json([
        'message' => 'Bateria cadastrada com sucesso.',
        'bateria' => [
            'id' => $bateria->id,
            'surfista1_numero' => $bateria->surfista1,
            'surfista2_numero' => $bateria->surfista2,
        ],
    ], 201);
}   

public function obterVencedorBateria($id)
{
    $bateria = Bateria::findOrFail($id);

    // Obtenha as notas de cada surfista na bateria
    $notasSurfista1 = Nota::whereHas('onda', function ($query) use ($bateria) {
        $query->where('bateria', $bateria->id)->where('surfista', $bateria->surfista1);
    })->get();

    $notasSurfista2 = Nota::whereHas('onda', function ($query) use ($bateria) {
        $query->where('bateria', $bateria->id)->where('surfista', $bateria->surfista2);
    })->get();

    // Calcule as notas finais e parciais para cada surfista
    $infoSurfista1 = $this->calcularNotas($notasSurfista1, $bateria->surfista1);
    $infoSurfista2 = $this->calcularNotas($notasSurfista2, $bateria->surfista2);

    // Determine o vencedor com base na soma das duas maiores notas finais
    if ($infoSurfista1['soma_notas_finais_maiores'] > $infoSurfista2['soma_notas_finais_maiores']) {
        $vencedor = $bateria->surfista1;
    } elseif ($infoSurfista1['soma_notas_finais_maiores'] < $infoSurfista2['soma_notas_finais_maiores']) {
        $vencedor = $bateria->surfista2;
    } else {
        $vencedor = null; // Empate
    }

    return response()->json([
        'vencedor' => $vencedor,
        'participantes' => [
            [
                'info' => $infoSurfista1,
            ],
            [
                'info' => $infoSurfista2,
            ],
        ],
    ], 200);
}
private function calcularNotas($notas, $surfistaId)
{
    // Calcule as notas finais e parciais para cada surfista
    $notasFinais = $notas->map(function ($nota) {
        $notaFinal = ($nota->notaParcial1 + $nota->notaParcial2 + $nota->notaParcial3) / 3;
        return [
            'nota_final' => $notaFinal,
        ];
    });

    // Ordene as notas finais em ordem decrescente e pegue as duas maiores
    $duasMaioresNotas = $notasFinais->sortByDesc('nota_final')->take(2);

    // Calcule a soma das duas maiores notas finais
    $somaNotasFinais = $duasMaioresNotas->sum('nota_final');

    return [
        'surfista_id' => $surfistaId,
        'notas_finais' => $notasFinais->toArray(),
        'soma_notas_finais_maiores' => $somaNotasFinais,
    ];
}



}
