@extends('layouts.app')
@push('styles_custom')
    <link href="{{ asset('assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endpush
@section('titulo', 'Mis cursos')
@section('subtitulo1', 'Mis cursos')
@section('subtitulo2', 'registro')
@section('content')
    <div class="container-fluid">

        <div class="page-content-wrapper">

            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="p-4">
                                <button class="btn btn-success" data-bs-toggle="modal"
                                        data-bs-target="#modalAgregarCursoInstitucional"><i class="fa fa-plus-circle"></i> Registrar Curso Institucional
                                </button>
                            </div>
                            <div class="p-4">
                                <h4 class="header-title">Mis Cursos Institucionales</h4>

                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Año</th>
                                            <th>Nombre del curso</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @forelse($cursosInstitucionales as $cursoInstitucional)
                                            <tr>
                                                <td scope="row">{{ $i++ }}</td>
                                                <td>{{ $cursoInstitucional->anio }}</td>
                                                <td>{{ $cursoInstitucional->nombre }}</td>
                                                <td>
                                                    <a class="btn btn-outline-secondary btn-sm editar-curso-institucional" data-id="{{ $cursoInstitucional->id }}" title="Editar Curso">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                    <a event.preventDefault(); class="btn btn-outline-secondary btn-sm edit" title="Elimiar Curso" onclick="event.preventDefault(); modalEliminarCursoInstitucional({{ $cursoInstitucional->id }})">
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
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="p-4">
                                <button class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#modalAgregarCursoExtrainstitucional"><i class="fa fa-plus-circle"></i> Registrar Curso Extrainstitucional
                                </button>
                            </div>
                            <div class="p-4">
                                <h4 class="header-title">Mis Cursos Extrainstitucionales</h4>

                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Año</th>
                                            <th>Nombre del curso</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @forelse($cursosExtrainstitucionales as $cursoExtra)
                                            <tr>
                                                <td scope="row">{{ $i++ }}</td>
                                                <td>{{ $cursoExtra->anio }}</td>
                                                <td>{{ $cursoExtra->nombreCurso->descripcion }}</td>
                                                <td>
                                                    <a class="btn btn-outline-secondary btn-sm editar-curso-extra"
                                                       data-id="{{ $cursoExtra->id }}"
                                                       data-id-relacion-curso="{{ $cursoExtra->id_relacion_curso }}"
                                                       title="Editar Curso">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                    <a event.preventDefault();
                                                       class="btn btn-outline-secondary btn-sm edit"
                                                       title="Elimiar Curso"
                                                       onclick="event.preventDefault(); modalEliminarCursoExtra({{ $cursoExtra->id }})">
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

    </div>

    <div id="modalAgregarCursoInstitucional" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">Registrar Curso Institucional</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                    </button>
                </div>
                <form action="{{ route('curso.store-curso-institucional') }}" method="post">
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
                                    <label for="nombre" class="form-label">Nombre del Curso</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre"
                                           placeholder="Nombre del curso" required>
                                    <div class="valid-feedback">
                                        Looks good!
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
    <div id="modalEditarCursoInstitucional" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">Editar Curso Institucional</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                    </button>
                </div>
                <form action="{{ route('curso.update-curso-institucional') }}" method="post">
                    @csrf
                    <input type="hidden" name="id" id="id_curso_institucional">
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="curso_institucional_anio_edit" class="form-label">Año</label>
                                    <input type="text" class="form-control" id="curso_institucional_anio_edit" name="anio"
                                           placeholder="Año" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="curso_institucional_nombre_edit" class="form-label">Nombre del Curso</label>
                                    <input type="text" class="form-control" id="curso_institucional_nombre_edit" name="nombre"
                                           placeholder="Nombre del curso" required>
                                    <div class="valid-feedback">
                                        Looks good!
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

    <div id="modalAgregarCursoExtrainstitucional" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content ">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">Registrar Curso Extrainstitucional</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                    </button>
                </div>
                <form action="{{ route('curso.store-curso-extrainstitucional') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="curso_extra_anio" class="form-label">Año</label>
                                    <input type="text" class="form-control" id="curso_extra_anio" name="anio"
                                           placeholder="Año" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="curso_extra_id_relacion_curso" class="form-label">Nombre del Curso</label>
                                    <select name="id_relacion_curso" id="curso_extra_id_relacion_curso" class="form-control">
                                        <option selected disabled value="">Seleccione...</option>
                                        @foreach($relacionCursos as $curso)
                                            <option value="{{ $curso->id }}">{{ $curso->descripcion }}</option>
                                        @endforeach
                                    </select>
                                    <div class="valid-feedback">
                                        Looks good!
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
    <div id="modalEditarCursoExtrainstitucional" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">Editar Curso Extrainstitucional</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                    </button>
                </div>
                <form action="{{ route('curso.update-curso-extrainstitucional') }}" method="post">
                    @csrf
                    <input type="hidden" name="id" id="id_curso_extra">
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="curso_extra_anio_edit" class="form-label">Año</label>
                                    <input type="text" class="form-control" id="curso_extra_anio_edit" name="anio"
                                           placeholder="Año" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="curso_extra_id_relacion_curso_edit" class="form-label">Nombre del Curso</label>
                                    <select name="id_relacion_curso" id="curso_extra_id_relacion_curso_edit" class="form-control">
                                        <option selected disabled value="">Seleccione...</option>
                                        @foreach($relacionCursos as $curso)
                                            <option value="{{ $curso->id }}">{{ $curso->descripcion }}</option>
                                        @endforeach
                                    </select>
                                    <div class="valid-feedback">
                                        Looks good!
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
            const _editarCursoInstitucional = $('.editar-curso-institucional')
            const _modalEditarCursoInstitucional = $('#modalEditarCursoInstitucional')
            const _inputCursoInstitucionalAnioEdit = $('#curso_institucional_anio_edit')
            const _inputCursoInstitucionalNombreEdit = $('#curso_institucional_nombre_edit')
            const _inputCursoInstitucionalIdCursoEdit = $('#id_curso_institucional')

            const _editarCursoExtra = $('.editar-curso-extra')
            const _modalEditarCursoExtra = $('#modalEditarCursoExtrainstitucional')
            const _inputCursoExtraAnioEdit = $('#curso_extra_anio_edit')
            const _inputCursoExtraIdCursoEdit = $('#id_curso_extra')

            _editarCursoInstitucional.on('click', function () {
                let idCurso = $(this).data('id')
                let celda = this.parentNode.parentNode.children;
                _modalEditarCursoInstitucional.modal('show')
                _inputCursoInstitucionalAnioEdit.val(celda[1].innerHTML)
                _inputCursoInstitucionalNombreEdit.val(celda[2].innerHTML)
                _inputCursoInstitucionalIdCursoEdit.val(idCurso)
            })

            _editarCursoExtra.on('click', function () {
                let idCurso = $(this).data('id')
                let celda = this.parentNode.parentNode.children;
                let idRelacionCurso = $(this).data('id-relacion-curso')
                _modalEditarCursoExtra.modal('show')
                _inputCursoExtraAnioEdit.val(celda[1].innerHTML)
                _inputCursoExtraIdCursoEdit.val(idCurso)
                $("#curso_extra_id_relacion_curso_edit option[value='"+idRelacionCurso +"']").attr('selected', 'selected');
            })

        })


        function modalEliminarCursoInstitucional(id_curso) {
            Swal.fire({
                title: "Atención?",
                text: "Estas a punto de eliminar el curso seleccionado. ¿Desea continuar?",
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
                        window.axios.post(`${URL_BASE}/mi-curso-institucional/eliminar`, { id: id_curso})
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

        function modalEliminarCursoExtra(id_curso) {
            Swal.fire({
                title: "Atención?",
                text: "Estas a punto de eliminar el curso seleccionado. ¿Desea continuar?",
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
                        window.axios.post(`${URL_BASE}/mi-curso-extrainstitucional/eliminar`, { id: id_curso})
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
