<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\CursoExtrainstitucional;
use App\Models\CursoInstitucional;
use App\Models\RelacionCurso;
use App\Models\TipoCurso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CursoController extends Controller
{
    public function index()
    {
        $relacionCursos = RelacionCurso::where('estado', 1)->get();
        $cursosInstitucionales = CursoInstitucional::where('estado', 1)
            ->where('id_user', Auth::user()->id)
            ->get();
        $cursosExtrainstitucionales = CursoExtrainstitucional::where('estado', 1)
            ->where('id_user', Auth::user()->id)
            ->get();
        return view('users.cursos', compact('relacionCursos', 'cursosInstitucionales', 'cursosExtrainstitucionales'));
    }

    public function storeCursoInstitucional(Request $request)
    {
        $this->validate($request, [
            "anio" => 'required',
            "nombre" => 'required',
        ]);

        try {
            CursoInstitucional::create([
                "id_user" => Auth::user()->id,
                "anio" => $request->anio,
                "nombre" => $request->nombre,
            ]);
        } catch (\Exception $exception) {
            return $exception;
        }

        return redirect()->route('cursos');
    }

    public function storeCursoExtrainstitucional(Request $request)
    {
        $this->validate($request, [
            "anio" => 'required',
            "id_relacion_curso" => 'required',
        ]);

        try {
            CursoExtrainstitucional::create([
                "id_user" => Auth::user()->id,
                "anio" => $request->anio,
                "id_relacion_curso" => $request->id_relacion_curso,
            ]);
        } catch (\Exception $exception) {
            return $exception;
        }

        return redirect()->route('cursos');
    }

    public function updateCursoInstitucional(Request $request)
    {
        $this->validate($request, [
            "anio" => 'required',
            "nombre" => 'required',
        ]);

        try {
            CursoInstitucional::where('id', $request->id)
                ->update([
                    'anio' => $request->anio,
                    'nombre' => $request->nombre
                ]);
        } catch (\Exception $exception) {
            return $exception;
        }
        return redirect()->route('cursos');
    }

    public function updateCursoExtrainstitucional(Request $request)
    {
        $this->validate($request, [
            "anio" => 'required',
            "id_relacion_curso" => 'required',
        ]);

        try {
            CursoExtrainstitucional::where('id', $request->id)
                ->update([
                    'anio' => $request->anio,
                    'id_relacion_curso' => $request->id_relacion_curso
                ]);
        } catch (\Exception $exception) {
            return $exception;
        }
        return redirect()->route('cursos');
    }

    public function deleteCursoInstitucional(Request $request)
    {
        try {
            CursoInstitucional::where('id', $request->id)
                ->update([
                    'estado' => 0
                ]);
        } catch (\Exception $exception) {
            return $exception;
        }
        return response()->json(['status' => 200, 'msg' => 'Eliminación Exitoso']);
    }

    public function deleteCursoExtrainstitucional(Request $request)
    {
        try {
            CursoExtrainstitucional::where('id', $request->id)
                ->update([
                    'estado' => 0
                ]);
        } catch (\Exception $exception) {
            return $exception;
        }
        return response()->json(['status' => 200, 'msg' => 'Eliminación Exitoso']);
    }
}
