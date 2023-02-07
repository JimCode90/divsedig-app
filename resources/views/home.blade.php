@extends('layouts.app')
@section('titulo', 'Dashborad')
@section('subtitulo1', 'Dashborad')
@section('subtitulo2', 'Home')
@section('content')
    <div class="container-fluid">

        <div class="page-content-wrapper">

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="p-4">
                                <div class="col-lg-12">
                                    <div class="card alert alert-dismissible border mt-4 mt-lg-0 p-0 mb-0">
                                        <div class="card-header bg-soft-danger">
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">

                                            </button>
                                            <h5 class="font-size-16 text-danger my-1">Atención</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="text-center">
                                                <div class="mb-4">
                                                    <i class="mdi mdi-alert-outline display-4 text-danger"></i>
                                                </div>
                                                <h4 class="alert-heading font-size-18">Por disposición del Crnl. Jefe de la DIVSEDIG, se comunica:</h4>
                                                <p>
                                                    Todo el personal deberá de registrar los siguientes puntos:
                                                </p>
                                                <ul>
                                                    <li><span class="fw-bold">Perfil</span> (Datos personales)</li>
                                                    <li><span class="fw-bold">Cursos</span> (Todos los realizados hasta la fecha)</li>
                                                    <li><span class="fw-bold">Proyectos</span> (En los que hayan participado y/o los que se encuentren realizando a la fecha)</li>
                                                </ul>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>


    </div> <!-- container-fluid -->
</div>
@endsection
