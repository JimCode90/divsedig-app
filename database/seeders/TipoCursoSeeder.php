<?php

namespace Database\Seeders;

use App\Models\TipoCurso;
use Illuminate\Database\Seeder;

class TipoCursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoCurso::create([
            "nombre" => "Curso DIRIN"
        ]);

        TipoCurso::create([
            "nombre" => "Curso Perú Seguro"
        ]);
    }
}
