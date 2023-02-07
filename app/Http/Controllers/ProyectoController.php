<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProyectoController extends Controller
{
    public function index()
    {
        $proyectos = Proyecto::where('estado', 1)
            ->where('id_user', Auth::user()->id)
            ->get();
        return view('users.proyectos', compact('proyectos'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            "anio" => 'required',
            "titulo" => 'required',
            "descripcion" => 'required',
            "status_project" => 'required',
        ]);
        try {
            Proyecto::create([
                "id_user" => Auth::user()->id,
                "anio" => $request->anio,
                "titulo" => $request->titulo,
                "descripcion" => $request->descripcion,
                "status" => $request->status_project
            ]);
        } catch (\Exception $exception) {
            return $exception;
        }

        return redirect()->route('proyectos');
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            "anio" => 'required',
            "titulo" => 'required',
            "descripcion" => 'required',
            "status_project" => 'required',
        ]);

        try {
            Proyecto::where('id', $request->id)
                ->update([
                    'anio' => $request->anio,
                    'titulo' => $request->titulo,
                    'descripcion' => $request->descripcion,
                    'status' => $request->status_project,
                ]);
        } catch (\Exception $exception) {
            return $exception;
        }
        return redirect()->route('proyectos');
    }


    public function delete(Request $request)
    {
        try {
            Proyecto::where('id', $request->id)
                ->update([
                    'estado' => 0
                ]);
        } catch (\Exception $exception) {
            return $exception;
        }
        return response()->json(['status' => 200, 'msg' => 'Eliminación Exitoso']);
    }
}
