<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReporteController extends Controller
{
    public function index()
    {
        $departamentos = Departamento::where('id_division', Auth::user()->id_division)->get();
        return view('jefatura.reportes', compact('departamentos'));
    }

    public function getEfectivos()
    {
        $data = User::where('id_division', Auth::user()->id_division)
            ->where('estado', 1)
            ->with([
                "grado",
                "departamento",
                "seccion"
            ])
            ->get();
        return response()->json($data);
    }

    public function filtrarEfectivos(Request $request)
    {
        $data = User::where('id_departamento', 'like', '%'.$request->id_departamento.'%')
            ->where('id_seccion', 'like', '%'.$request->id_seccion.'%')
            ->where('estado', 1)
            ->with([
                "grado",
                "departamento",
                "seccion"
            ])
            ->get();
        return response()->json($data);
    }

    public function descargarPDF(Request $request)
    {
        $efectivo = User::where('id', $request->id)->first();
        $pdf = PDF::loadView('pdf.reporte-usuario', compact('efectivo'));

        return $pdf->setPaper('a4', '')
            ->stream( 'mipdf.pdf');

    }
}
