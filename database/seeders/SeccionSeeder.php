<?php

namespace Database\Seeders;

use App\Models\Seccion;
use Illuminate\Database\Seeder;

class SeccionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DEPARTAMENTO DE GESTION DE LA INFORMACION
        Seccion::create([
            "nombre" => "Sec.Sistema de Información",
            "id_division" => 1,
            "id_departamento" => 1
        ]);

        Seccion::create([
            "nombre" => "Sec. Protección de Datos ",
            "id_division" => 1,
            "id_departamento" => 1
        ]);

        Seccion::create([
            "nombre" => "Sec. Gobierno de Datos",
            "id_division" => 1,
            "id_departamento" => 1
        ]);

        Seccion::create([
            "nombre" => "Sec. Reportes de Información",
            "id_division" => 1,
            "id_departamento" => 1
        ]);

        Seccion::create([
            "nombre" => "Sec. Investigación, Desarrollo e Innovación",
            "id_division" => 1,
            "id_departamento" => 1
        ]);

        // DEPARTAMENTO DE TECNOLOGIAS, INFORMACION Y COMUNICACIONES

        Seccion::create([
            "nombre" => "Sec. Reparación y Mantenimiento",
            "id_division" => 1,
            "id_departamento" => 2
        ]);

        Seccion::create([
            "nombre" => "Sec. Redes y Comunicaciones",
            "id_division" => 1,
            "id_departamento" => 2
        ]);

        Seccion::create([
            "nombre" => "Sec. Monitoreo y Vigilancia de Sistemas",
            "id_division" => 1,
            "id_departamento" => 2
        ]);


        // DEPARTAMENTO DE INTEROPERABILIDAD Y SOPORTE TECNICO

        Seccion::create([
            "nombre" => "Sec. de Coordinación",
            "id_division" => 1,
            "id_departamento" => 3
        ]);

        Seccion::create([
            "nombre" => "Sec. de Control de calidad de datos",
            "id_division" => 1,
            "id_departamento" => 3
        ]);


        // DEPARTAMENTO DE CIBERINTELIGENCIA

        Seccion::create([
            "nombre" => "Sec. de Supervición de la Seguridad Digital",
            "id_division" => 1,
            "id_departamento" => 4
        ]);

        Seccion::create([
            "nombre" => "Sec. de Ciberseguridad",
            "id_division" => 1,
            "id_departamento" => 4
        ]);

        // DEPARTAMENTO DE TRANSFORMACIÓN DIGITAL

        Seccion::create([
            "nombre" => "Sec. de Implementación Tecnológica",
            "id_division" => 1,
            "id_departamento" => 5
        ]);

        Seccion::create([
            "nombre" => "Sec. de Gobierno Digital",
            "id_division" => 1,
            "id_departamento" => 5
        ]);


    }
}
