@extends('layouts.app')
@push('styles_custom')
    <!-- DataTables -->
    <link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet"
          type="text/css"/>

    <!-- Responsive datatable examples -->
    <link href="{{ asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}"
          rel="stylesheet" type="text/css"/>
@endpush
@section('titulo', 'Reportes')
@section('subtitulo1', 'Reportes')
@section('subtitulo2', 'Bandeja')
@section('content')
    <div class="container-fluid">

        <div class="page-content-wrapper">

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="p-4">
                                <div class="col-lg-12">
                                    <div class="text-center">
                                        <h4 class="alert-heading font-size-18">
                                            Bienvenido {{ Auth::user()->grado->descripcion }} {{ Auth::user()->nombres }} {{ Auth::user()->apellidos }}</h4>
                                        <p>
                                            A continuación se le mostrará todo el persona perteneciente a su División
                                        </p>
                                    </div>
                                </div>
                                <div class="row mb-5">
                                    <div class="col-lg-4 ">

                                        <label for="departamento">Departamento</label>
                                        <select name="departamento" id="departamento" class="form-control">
                                            <option selected value="">Seleccione...</option>
                                            @foreach($departamentos as $dep)
                                                <option value="{{ $dep->id }}">{{ $dep->nombre }}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                    <div class="col-lg-4">

                                        <label for="seccion">Sección</label>
                                        <select name="seccion" id="seccion" class="form-control">
                                            <option selected value="">Seleccione...</option>
                                        </select>

                                    </div>
                                    <div class="col-lg-4">
                                        <label></label>
                                        <button id="filtrar-efectivos" class="btn btn-success w-100">Filtrar</button>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <table id="list-efectivos" class="table table-bordered dt-responsive nowrap"
                                           style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Departamento</th>
                                            <th>Sección</th>
                                            <th>Efectivo Policial</th>
                                            <th></th>
                                        </tr>
                                        </thead>


                                        <tbody>
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
@endsection
@push('script_custom')
    <script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
    <script>
        $(function () {
            const _departamento = $('#departamento')
            const _seccion = $('#seccion')
            const _filtrarEfectivos = $('#filtrar-efectivos')
            let templateSeccion = ''

            getEfectivos()

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


            _filtrarEfectivos.on('click', function (e) {
                let dep = _departamento.val()
                let secc = _seccion.val()

                window.axios.post(`{{ config('app.url') }}/filtrar-efectivos`, {
                    id_departamento: dep,
                    id_seccion: secc
                }).then(resp => {
                    console.log(resp)
                    let data = resp.data
                    console.log(data)
                    mostrarDatatable(data)
                })
            })
        })

        function getEfectivos() {
            window.axios.get(`{{ config('app.url') }}/get-efectivos`)
                .then((res) => {
                    let data = res.data
                    console.log(data)
                    mostrarDatatable(data)
                })
        }

        function mostrarDatatable(data = []) {
            let table = $('#list-efectivos')
            var dt_basic = table.DataTable({
                data: data,
                destroy: true,
                columns: [
                    {data: 'id'},
                    {data: 'departamento.nombre'},
                    {data: 'seccion.nombre'},
                    {
                        data: 'id',
                        render: function (data, type, row, meta) {
                            return `<p>${row.grado.descripcion} ${row.nombres} ${row.apellidos}</p>`
                        }
                    },
                    {
                        data: 'id',
                        render: function (data, type, row, meta) {
                            return `<a href="${URL_BASE}/reporte-efectivo/${row.id}" target="_blank"><i class="fa fa-download"></i></a>`
                        }
                    },
                ]
            })
        }

        async function getSecciones(id_dep){
            return await window.axios.get(`${URL_BASE}/get-secciones/${id_dep}`)
        }
    </script>
@endpush
