<?php

namespace Database\Seeders;

use App\Models\Departamento;
use Illuminate\Database\Seeder;

class DepartamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Departamento::create([
            "nombre" => "Departamento de Gestión de la Información",
            "id_division" => 1
        ]);

        Departamento::create([
            "nombre" => "Departamento de Tecnología de Información y Comunicaciones",
            "id_division" => 1
        ]);

        Departamento::create([
            "nombre" => "Departamento de Interoperabilidad y Soporte Técnico",
            "id_division" => 1
        ]);

        Departamento::create([
            "nombre" => "Departamento de Ciberinteligencia",
            "id_division" => 1
        ]);
        Departamento::create([
            "nombre" => "Departamento de Transformación Dígital",
            "id_division" => 1
        ]);
    }
}
