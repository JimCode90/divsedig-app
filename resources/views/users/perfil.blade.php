@extends('layouts.app')
@push('styles_custom')
    <link href="{{ asset('assets/libs/dropzone/min/dropzone.min.css') }}" rel="stylesheet" type="text/css" />
@endpush
@section('titulo', 'Perfil')
@section('subtitulo1', 'Perfil')
@section('subtitulo2', 'registro')
@section('content')
    <div class="container-fluid">
        <div class="page-content-wrapper">

            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Foto</h4>
                            <p class="card-title-desc">
                                Cargar tu foto actual
                            </p>

                            <div>
                                <form action="#" class="dropzone">
                                    <div class="fallback">
                                        <input name="file" type="file" multiple="multiple">
                                    </div>
                                    <div class="dz-message needsclick">
                                        <div class="mb-3">
                                            <i class="display-4 text-muted mdi mdi-cloud-upload-outline"></i>
                                        </div>

                                        <h4>Arrastra tu foto aquí para registrarlo</h4>
                                    </div>
                                </form>
                            </div>

                            <div class="text-center mt-4">
                                <button type="button" class="btn btn-primary waves-effect waves-light">Send Files</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="p-4">
                                <h4 class="header-title">Datos personales</h4>

                                <form action="{{ route('perfil.store') }}" method="post" class="needs-validation" novalidate>
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="division" class="form-label">División</label>
                                                <select class="form-select" id="division" name="division" required>
                                                    <option selected value="">Seleccione...</option>
                                                    @foreach($divisiones as $division)
                                                        <option
                                                            value="{{ $division->id }}"
                                                            {{ $division->id == Auth::user()->id_division ? 'selected' : '' }}
                                                        >{{ $division->nombre }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <div class="invalid-feedback">
                                                    Please select a valid state.
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="departamento" class="form-label">Departamento</label>
                                                <select class="form-select" id="departamento" name="departamento" required>
                                                    <option selected value="">Seleccione...</option>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Please select a valid state.
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="seccion" class="form-label">Sección</label>
                                                <select class="form-select" id="seccion" name="seccion" required>
                                                    <option selected value="">Seleccione...</option>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Please select a valid state.
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="grado" class="form-label">Grado</label>
                                                <select class="form-select" id="grado" name="grado" required>
                                                    <option value="">Seleccione...</option>
                                                    @foreach($grados as $grado)
                                                        <option
                                                            value="{{ $grado->id }}"
                                                            {{ $grado->id == Auth::user()->id_grado ? 'selected' : '' }}
                                                        >{{ $grado->descripcion }}</option>
                                                    @endforeach
                                                </select>
                                                <div class="invalid-feedback">
                                                    Please select a valid state.
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="nombres" class="form-label">Nombres</label>
                                                <input type="text" class="form-control" id="nombres" name="nombres"
                                                       placeholder="Nombres" value="{{ Auth::user()->nombres }}" required>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="apellidos" class="form-label">Apellidos</label>
                                                <input type="text" class="form-control" id="apellidos" name="apellidos"
                                                       placeholder="Apellidos" value="{{ Auth::user()->apellidos }}" required>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="dni" class="form-label">Nro. DNI</label>
                                                <input type="text" class="form-control" id="dni" name="dni" value="{{ Auth::user()->perfil->dni }}"
                                                       placeholder="Nro. DNI" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid city.
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="cip" class="form-label">Nro. CIP</label>
                                                <input type="text" class="form-control" id="cip" name="cip" value="{{ Auth::user()->perfil->cip }}"
                                                       placeholder="Nro. CIP" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid zip.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="tel_fijo" class="form-label">Nro. Telefóno (fijo) * opcional</label>
                                                <input type="text" class="form-control" id="tel_fijo" name="tel_fijo" value="{{ Auth::user()->perfil->tel_fijo }}" placeholder="Nro. teléfono fijo" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid zip.
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="tel_cell" class="form-label">Nro. Telefóno (Celular)</label>
                                                <input type="text" class="form-control" id="tel_cell" name="tel_cell" value="{{ Auth::user()->perfil->tel_cell }}"
                                                       placeholder="Nro. teléfono celular" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid zip.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="direccion" class="form-label">Dirección</label>
                                                <input type="text" class="form-control" id="direccion" name="direccion" value="{{ Auth::user()->perfil->direccion }}"
                                                       placeholder="Dirección" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid zip.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="email" class="form-label">Correo Institucional</label>
                                                <input type="text" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}"
                                                       placeholder="Correo Institucional" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid zip.
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <h4 class="header-title">Competencias</h4>
                                    <div>
                                        <button class="btn btn-primary" type="submit">Registrar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>


    </div> <!-- container-fluid -->
@endsection
@push('script_custom')
    <script>
        $(function (){
            const _division = $("#division")
            const _departamento = $("#departamento")
            const _seccion = $("#seccion")

            let templateDepartamento = ''
            let templateSeccion = ''


            _division.on('change', function (e) {
                let id_division = this.value
                console.log(id_division)
                if(id_division >= 1) {
                    templateDepartamento = ''
                    templateSeccion = ''
                    _seccion.html('<option value="">Seleccione...</option>')
                    getDepartamentos(id_division)
                        .then(resp => {
                            console.log(resp)
                            if(resp.data){
                                templateDepartamento += `<option selected value="">Seleccione...</option>`
                                resp.data.forEach(dep => {
                                    templateDepartamento += `<option value="${dep.id}">${dep.nombre}</option>`
                                })

                                console.log(templateDepartamento)
                                _departamento.html(templateDepartamento)
                            }
                        })
                }else {
                    templateDepartamento = ''
                    templateSeccion = ''
                    _departamento.html('<option value="">Seleccione...</option>')
                    _seccion.html('<option value="">Seleccione...</option>')
                }
            })

            _departamento.on('change', function (e) {
                let id_departamento = this.value
                if(id_departamento >= 1) {
                    templateSeccion = ''
                    _seccion.html('<option value="">Seleccione...</option>')
                    getSecciones(id_departamento)
                        .then(resp => {
                            console.log(resp)
                            if(resp.data){
                                templateSeccion += `<option selected value="">Seleccione...</option>`
                                resp.data.forEach(secc => {
                                    templateSeccion += `<option value="${secc.id}">${secc.nombre}</option>`
                                })

                                console.log(templateSeccion)
                                _seccion.html(templateSeccion)
                            }
                        })
                }else {
                    templateSeccion = ''
                    _seccion.html('<option value="">Seleccione...</option>')
                }
            })

            cargarUnidad()

        })

        async function getDepartamentos(id_div){
            return await window.axios.get(`${URL_BASE}/get-departamentos/${id_div}`)
        }

        async function getSecciones(id_dep){
            return await window.axios.get(`${URL_BASE}/get-secciones/${id_dep}`)
        }

        function cargarUnidad(){
            let templateDepartamento = '';
            let templateSeccion = '';
            let id_division = $("#division").val();
            let id_departamento = {{ Auth::user()->id_departamento == null ? 0 : Auth::user()->id_departamento }};
            let id_seccion = {{ Auth::user()->id_seccion == null ? 0 : Auth::user()->id_seccion }};

            if(id_division > 0)
            {
                getDepartamentos(id_division)
                    .then(resp => {
                        console.log(resp)
                        if(resp.data){
                            templateDepartamento += `<option selected value="">Seleccione...</option>`
                            resp.data.forEach(dep => {
                                templateDepartamento += `<option value="${dep.id}">${dep.nombre}</option>`
                            })
                            $("#departamento").html(templateDepartamento)
                            $("#departamento option[value='"+id_departamento +"']").attr('selected', 'selected');
                        }
                    })

                getSecciones(id_departamento)
                    .then(resp => {
                        console.log(resp)
                        if(resp.data){
                            templateSeccion += `<option selected value="">Seleccione...</option>`
                            resp.data.forEach(secc => {
                                templateSeccion += `<option value="${secc.id}">${secc.nombre}</option>`
                            })
                            $("#seccion").html(templateSeccion)
                            $("#seccion option[value='"+id_seccion +"']").attr('selected', 'selected');
                        }
                    })
            }
            else
            {
                // alert("No tiene unidad")
            }
        }

    </script>
@endpush
@push('script_custom')
    <script src="{{ asset('assets/libs/dropzone/min/dropzone.min.js') }}"></script>
@endpush
