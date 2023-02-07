<?php

namespace App\Http\Controllers;

use App\Models\Division;
use App\Models\Grado;
use App\Models\Perfil;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PerfilController extends Controller
{

    public function index()
    {
        $grados = Grado::all();
        $divisiones = Division::all();
        return view('users.perfil', compact('grados', 'divisiones'));
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            "cip" => 'required|max:8',
            "dni" => 'required|max:8',
            "division" => 'required',
            "departamento" => 'required',
            "seccion" => 'required',
            "tel_cell" => 'required',
            "direccion" => 'required',
        ]);

        try {

            DB::beginTransaction();
            Perfil::where('id_user', Auth::user()->id)->update([
                "cip" => $request->cip,
                "dni" => $request->dni,
                "tel_fijo" => $request->tel_fijo,
                "tel_cell" => $request->tel_cell,
                "direccion" => $request->direccion,
            ]);

            User::where('id', Auth::user()->id)
                ->update([
                    "id_grado" => $request->grado,
                    "nombres" => $request->nombres,
                    "apellidos" => $request->apellidos,
                    "email" => $request->email,
                    "id_division" => $request->division,
                    "id_departamento" => $request->departamento,
                    "id_seccion" => $request->seccion,
                ]);

            DB::commit();

        } catch (\Exception $exception) {
            DB::rollBack();
            return $exception;
        }

        return redirect()->route('perfil');
    }
}
