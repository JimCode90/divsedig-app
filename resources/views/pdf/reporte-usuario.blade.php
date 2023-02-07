<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF - PRE-EMPLEO</title>
    <link rel="stylesheet" href="{{ asset('vendors/dist/bootstrap-5.0.2-dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/dist/css/style-pdf.css') }}">
</head>

<body>
<header>
    <p class="confidencial text-center"><strong>Confidencial</strong></p>
    <table class="text-center">
        <tr>
            <td class="cabecera-td" style="padding-left: 5px; padding-right: 5px;" rowspan="3" scope="row">
                <img src="{{ asset('assets/images/pnp.png') }}" width="50px" height="60px" alt="">
            </td>
            <td class="cabecera-td" style="padding-left: 50px; padding-right: 50px;" rowspan="2" colspan="2">
                {{ strtoupper(Auth::user()->division->nombre) }}
            </td>
            <td class="cabecera-td" style="padding-left: 30px; padding-right: 30px; font-size: 14px" colspan="2">
                Vigencia:<br>
                {{ \Carbon\Carbon::now()->format('Y') }}
            </td>
        </tr>
        <tr>
            <td class="cabecera-td" colspan="2" style="font-size: 10px">Fecha:<br> {{ \Carbon\Carbon::now() }}</td>
        </tr>
        <tr>
            <td class="cabecera-td" style="padding-left: 50px; padding-right: 50px;" colspan="2">
                {{ strtoupper(Auth::user()->departamento->nombre) }}
            </td>
            <td class="cabecera-td" style="padding-left: 30px; padding-right: 30px;" colspan="2">
                <script type="text/php">
                        if (isset($pdf)) {
                    $pdf-> page_script('
                    $font = $fontMetrics->get_font("Arial, Helvetica, sans-serif", "normal"); $pdf->text(476, 120, "Página $PAGE_NUM de $PAGE_COUNT", $font, 10);
                    ');
                    }

                </script>
            </td>
        </tr>
    </table>
</header>

<footer>
    <p class="parrafo-footer">La información contenida en este documento, deben
        mantenerse bajo reserva y absoluta confidencialidad, prevaleciendo los derechos fundamentales de las personas. DIRIN - PNP</p>
    <p class="confidencial text-center"><strong>Confidencial</strong></p>
</footer>

<main id="top-wsp">
    <div class="border rounded-3">
        <div class="row p-1">
            <div class="text-center">
                <h5 class="p-1 border-bottom rounded-3">Datos Generales del Efectivo Policial</h5>
            </div>
            <div class="row">
                <div class="col-12">
                    <b>Nombres:</b> {{ strtoupper($efectivo->grado->descripcion)  }} {{ strtoupper($efectivo->nombres)  }} {{ strtoupper($efectivo->apellidos)  }}
                </div>
                <div class="col-12">
                    <b>Nro CIP:</b> {{ $efectivo->perfil->cip }}
                </div>
                <div class="col-12">
                    <b>Nro DNI:</b> {{ $efectivo->perfil->dni }}
                </div>
                <div class="col-12">
                    <b>Nro Tel. Fijo:</b> {{ $efectivo->perfil->tel_fijo }}
                </div>

                <div class="col-12">
                    <b>Nro Tel. Cell:</b> {{ $efectivo->perfil->tel_cell }}
                </div>
                <div class="col-12">
                    <b>Dirección:</b> {{ $efectivo->perfil->direccion }}
                </div>
                <div class="col-12">
                    <b>Correo Institucional:</b> {{ $efectivo->email }}
                </div>
            </div>
        </div>
    </div>

    <div class="border rounded-3 mt-2">
        <div class="row p-1">
            <div class="text-center">
                <h5 class="p-1 border-bottom rounded-3">Cursos Institucionales</h5>
            </div>
            @forelse($efectivo->cursosInstitucionales as $ci)
                <ul>
                    <li>{{ $ci->nombre }}</li>
                </ul>
            @empty

            @endforelse
        </div>
    </div>

    <div class="border rounded-3 mt-2">
        <div class="row p-1">
            <div class="text-center">
                <h5 class="p-1 border-bottom rounded-3">Cursos ExtraInstitucionales</h5>
            </div>
            @forelse($efectivo->cursosExtrainstitucionales as $ce)
                <ul>
                    <li>{{ $ce->nombreCurso->descripcion }}</li>
                </ul>
            @empty

            @endforelse
        </div>
    </div>

    <div class="border rounded-3 mt-2">
        <div class="row p-1">
            <div class="text-center">
                <h5 class="p-1 border-bottom rounded-3">Proyectos</h5>
            </div>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Año</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Estado</th>
                </tr>
                </thead>
                <tbody>
                @php
                    $i = 1;
                @endphp
                @forelse($efectivo->proyectos as $proyecto)
                    <tr>
                        <th scope="row">{{ $i++ }}</th>
                        <td>{{ $proyecto->anio }}</td>
                        <td>{{ $proyecto->titulo }}</td>
                        <td>
                            @if($proyecto->status == 1)
                                <p>Pendiente</p>
                            @elseif($proyecto->status == 2)
                                <p>En proceso</p>
                            @elseif($proyecto->status == 3)
                                <p>Finalizado</p>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">Sin Registros</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
</main>

<script type="text/php">
    if (isset($pdf)) {
       $pdf-> page_script('
         $font = $fontMetrics->get_font("Arial, Helvetica, sans-serif", "normal"); $pdf->text(500, 120, "Página $PAGE_NUM de $PAGE_COUNT", $font, 8);
         ');
    }

</script>

</body>

</html>
