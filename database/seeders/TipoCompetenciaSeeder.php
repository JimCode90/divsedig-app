<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TipoCompetenciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoCompetenciaSeeder::create([
            "descripcion" => "Desarrollador de Sitios Web"
        ]);

        TipoCompetenciaSeeder::create([
            "descripcion" => "Desarrollador de Aplicaciones Web"
        ]);

        TipoCompetenciaSeeder::create([
            "descripcion" => "Desarrollador de Aplicaciones Movil"
        ]);
    }
}
