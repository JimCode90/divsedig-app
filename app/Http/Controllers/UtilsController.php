<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use App\Models\Seccion;
use Illuminate\Http\Request;

class UtilsController extends Controller
{
    public function getDepartamentos(Request $request)
    {
        $departamentos = Departamento::where('id_division', $request->id_division)->get();
        return response()->json($departamentos);
    }

    public function getSecciones(Request $request)
    {
        $secciones = Seccion::where('id_departamento', $request->id_departamento)->get();
        return response()->json($secciones);
    }
}
