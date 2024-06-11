<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TablasController extends Controller
{
    public function UnNumero(int $numero)
    {
        $multiplos = [];

        for ($i = 1; $i <= 10; $i++)
        {
            $multiplo = $numero * $i;
            $multiplos[] = "$numero x $i = $multiplo";
        }

        //return view('tablas', ['numero' => $numero, 'multiplos' => $multiplos]);
        return response()->json(["tabla del $numero" => $multiplos], 200);
    }

    public function DosNumeros(int $numero1, int $numero2 = null)
    {
        $numero2 = $numero2 ?? $numero1;
    
        $tablas = [];
        do {
            $multiplos = [];
            for ($i = 1; $i <= 10; $i++) {
                $multiplo = $numero1 * $i;
                $multiplos[] = "$numero1 x $i = $multiplo";
            }
            $tablas[] = ["tabla" => "Tabla del numero $numero1", "multiplos" => $multiplos];
            $numero1++;
        } while ($numero1 <= $numero2);
    
        return view('tablas', ['tablas' => $tablas, 'numero' => $numero1 - 1]);
        //return response()->json(["tablas de multiplicar" => $tablas], 200);
    }

    
    
}
