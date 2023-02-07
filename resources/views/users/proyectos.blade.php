@extends('layouts.app')
@push('styles_custom')
    <link href="{{ asset('assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endpush
@section('titulo', 'Mis proyectos')
@section('subtitulo1', 'Mis proyectos')
@section('subtitulo2', 'registro')
@section('content')
    <div class="container-fluid">

        <div class="page-content-wrapper">

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="p-4">
                                <button class="btn btn-success" data-bs-toggle="modal"
                                        data-bs-target="#modalAgregarProyecto"><i class="fa fa-plus-circle"></i> Registrar
                                </button>
                            </div>
                            <div class="p-4">
                                <h4 class="header-title">Mis Proyectos | Tareas | Actividades</h4>

                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Año</th>
                                            <th>Nombre</th>
                                            <th>Descripción</th>
                                            <th>Estado</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @forelse($proyectos as $proyecto)
                                            <tr>
                                                <td scope="row">{{ $i++ }}</td>
                                                <td>{{ $proyecto->anio }}</td>
                                                <td>{{ $proyecto->titulo }}</td>
                                                <td>{{ $proyecto->descripcion }}</td>
                                                <td>
                                                    @if($proyecto->status == 1)
                                                        <span class="badge bg-warning">Pendiente</span>
                                                    @elseif($proyecto->status == 2)
                                                        <span class="badge bg-success">En proceso</span>
                                                    @elseif($proyecto->status == 3)
                                                        <span class="badge bg-danger">Finalizado</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a class="btn btn-outline-secondary btn-sm editar-proyecto" data-id="{{ $proyecto->id }}"
                                                       data-status-project="{{ $proyecto->status }}" title="Editar Proyecto">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                    <a event.preventDefault(); class="btn btn-outline-secondary btn-sm edit" title="Elimiar Proyecto" onclick="event.preventDefault(); modalEliminarProyecto({{ $proyecto->id }})">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4" class="text-center">Sin registros</td>
                                            </tr>
                                        @endforelse
                                        </tbody>
                                    </table>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div> <!-- container-fluid -->
    <!-- sample modal content -->
    <div id="modalAgregarProyecto" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">Registrar proyecto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                    </button>
                </div>
                <form action="{{ route('proyecto.store') }}" method="post">
                    @csrf
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="anio" class="form-label">Año</label>
                                    <input type="text" class="form-control" id="anio" name="anio"
                                           placeholder="Año" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="titulo" class="form-label">Titulo</label>
                                    <input type="text" class="form-control" id="titulo" name="titulo"
                                           placeholder="Titulo del proyecto" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="descripcion" class="form-label">Descripción</label>
                                    <textarea name="descripcion" id="descripcion" cols="30" rows="10" class="form-control" required></textarea>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="status_project" class="form-label">Estado</label>
                                    <select class="form-select" id="status_project" name="status_project" required>
                                        <option value="">Seleccione...</option>
                                        <option value="1">Pendiente</option>
                                        <option value="2">En proceso</option>
                                        <option value="3">Finalizado</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Please select a valid state.
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Cerrar
                        </button>
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Registrar</button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    <div id="modalEditarProyecto" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">Editar Proyecto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                    </button>
                </div>
                <form action="{{ route('proyecto.update') }}" method="post">
                    @csrf
                    <input type="hidden" name="id" id="id_proyecto">
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="anio_edit" class="form-label">Año</label>
                                    <input type="text" class="form-control" id="anio_edit" name="anio"
                                           placeholder="Año" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="titulo_edit" class="form-label">Titulo</label>
                                    <input type="text" class="form-control" id="titulo_edit" name="titulo"
                                           placeholder="Titulo del proyecto" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="descripcion_edit" class="form-label">Descripción</label>
                                    <textarea name="descripcion" id="descripcion_edit" cols="30" rows="10" class="form-control" required></textarea>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="status_project_edit" class="form-label">Estado</label>
                                    <select class="form-select" id="status_project_edit" name="status_project" required>
                                        <option value="">Seleccione...</option>
                                        <option value="1">Pendiente</option>
                                        <option value="2">En proceso</option>
                                        <option value="3">Finalizado</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Please select a valid state.
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Cerrar
                        </button>
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Editar</button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
@endsection

@push('script_custom')

    <script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    <script>
        $(function () {
            const _editarProyecto = $('.editar-proyecto')
            const _modalEditarProyecto = $('#modalEditarProyecto')
            const _inputAnioEdit = $('#anio_edit')
            const _inputTituloEdit = $('#titulo_edit')
            const _inputDescripcionEdit = $('#descripcion_edit')
            const _inputIdProyectoEdit = $('#id_proyecto')

            _editarProyecto.on('click', function () {
                let idProyecto = $(this).data('id')
                let idStatusProyecto = $(this).data('status-project')
                let celda = this.parentNode.parentNode.children;
                _modalEditarProyecto.modal('show')
                _inputAnioEdit.val(celda[1].innerHTML)
                _inputTituloEdit.val(celda[2].innerHTML)
                _inputDescripcionEdit.val(celda[3].innerHTML)
                _inputIdProyectoEdit.val(idProyecto)
                $("#status_project_edit option[value='"+idStatusProyecto +"']").attr('selected', 'selected');
            })

        })


        function modalEliminarProyecto(id_proyecto) {
            Swal.fire({
                title: "Atención?",
                text: "Estas a punto de eliminar el proyecto seleccionado. ¿Desea continuar?",
                icon: "warning",
                showCancelButton: !0,
                confirmButtonColor: "#1cbb8c",
                cancelButtonColor: "#f14e4e",
                confirmButtonText: "Si, eliminar!",
                cancelButtonText: "No"
            }).then(
                function (t) {
                    console.log(t)
                    if(t.isConfirmed){
                        window.axios.post(`${URL_BASE}/mis-proyectos/eliminar`, { id: id_proyecto})
                            .then(resp => {
                                console.log(resp)
                                if(resp.data.status == 200){
                                    location.reload();
                                }
                            })
                    }
                }
            );
        }

    </script>
@endpush
