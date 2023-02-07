<?php

namespace Database\Seeders;

use App\Models\Grado;
use Illuminate\Database\Seeder;

class GradoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Grado::create([
            "descripcion" => "GNRL. PNP"
        ]);

        Grado::create([
            "descripcion" => "CRNL. PNP"
        ]);

        Grado::create([
            "descripcion" => "CMDTE. PNP"
        ]);

        Grado::create([
            "descripcion" => "MAY. PNP"
        ]);

        Grado::create([
            "descripcion" => "CAP. PNP"
        ]);

        Grado::create([
            "descripcion" => "TNTE. PNP"
        ]);

        Grado::create([
            "descripcion" => "ALFZ. PNP"
        ]);

        Grado::create([
            "descripcion" => "SS. PNP"
        ]);

        Grado::create([
            "descripcion" => "SB. PNP"
        ]);

        Grado::create([
            "descripcion" => "ST1. PNP"
        ]);

        Grado::create([
            "descripcion" => "ST2. PNP"
        ]);
        Grado::create([
            "descripcion" => "ST3. PNP"
        ]);
        Grado::create([
            "descripcion" => "S1. PNP"
        ]);
        Grado::create([
            "descripcion" => "S2. PNP"
        ]);
        Grado::create([
            "descripcion" => "S3. PNP"
        ]);

    }
}
