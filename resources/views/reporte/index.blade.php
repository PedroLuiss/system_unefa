
@extends('layouts.app')

@section('content')
@if (session('mensaje'))
<div class="alert alert-danger">
    <strong>{{ session('mensaje') }}</strong>
</div>
@endif
{{-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables.css') }}"> --}}
<link rel="stylesheet" type="text/css" href="https://preview.keenthemes.com/metronic8/demo1/assets/plugins/custom/datatables/datatables.bundle.css">
<div class="post d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    <div id="kt_content_container" class="container-xxl">
                    <!--begin::Card-->
                    <div class="card mb-6">
                        <!--begin::Card body-->
                        <div class="card-body p-9 text-center">
                            <!--begin::Heading-->
                            <div class="fs-2hx fw-bolder">Generar Reportes SC-4</div>
                            <div class="fs-4 fw-bold text-gray-400 mb-7">Genera el reporte sc-4 por periodo</div>
                            <!--end::Heading-->
                            <div class="row">
                                <div class="col-md-12">

                                    <form action="{{route('reporte.exportar_cs4')}}" method="POST" id="form_send_report">
                                        @csrf
                                        {{-- <input type="hidden" name="periodo" value="1-2023"> --}}
                                        <div class="row">
                                            <div class="col-md-9">

                                            <!--begin::Input group-->
                                            <div class="input-group ">
                                                <span class="input-group-text" id="basic-addon2">
                                                    Periodo:
                                                </span>
                                                <select class="form-select" name="periodo" id="periodo" aria-label="Select example">
                                                    <option value="1-2023" >1-2023</option>
                                                    <option value="2-2023" >2-2023</option>

                                                    <option value="1-2024"  >1-2024</option>
                                                    <option value="2-2024" >2-2024</option>

                                                    <option value="1-2025" >1-2025</option>
                                                    <option value="2-2025" >2-2025</option>

                                                    <option value="1-2026" >1-2026</option>
                                                    <option value="2-2026" >2-2026</option>

                                                    <option value="1-2027" >1-2027</option>
                                                    <option value="2-2027" >2-2027</option>

                                                    <option value="1-2028" >1-2028</option>
                                                    <option value="2-2028" >2-2028</option>

                                                    <option value="1-2029" >1-2029</option>
                                                    <option value="2-2029" >2-2029</option>

                                                    <option value="1-2030" >1-2030</option>
                                                    <option value="2-2030" >2-2030</option>

                                                    <option value="1-2031" >1-2031</option>
                                                    <option value="2-2031" >2-2031</option>

                                                    <option value="1-2032" >1-2032</option>
                                                    <option value="2-2032" >2-2032</option>

                                                    <option value="1-2033" >1-2033</option>
                                                    <option value="2-2033" >2-2033</option>

                                                    <option value="1-2034" >1-2034</option>
                                                    <option value="2-2034" >2-2034</option>

                                                    <option value="1-2035" >1-2035</option>
                                                    <option value="2-2035" >2-2035</option>

                                                    <option value="1-2036" >1-2036</option>
                                                    <option value="2-2036" >2-2036</option>

                                                    <option value="1-2037" >1-2037</option>
                                                    <option value="2-2037" >2-2037</option>

                                                    <option value="1-2038" >1-2038</option>
                                                    <option value="2-2038" >2-2038</option>
                                                </select>

                                            </div>
                                            <!--end::Input group-->
                                            </div>
                                            <div class="col-md-3 text-end">
                                                <a href="#" id="btn_send_report" class="btn btn-sm btn-light-success fw-bolder ms-2 fs-5 py-1 px-3">
                                                    <div class="symbol symbol-30px me-4">
                                                        <span class="symbol-label text-success bg-light-success">
                                                            <!--begin::Svg Icon | path: icons/duotune/graphs/gra001.svg-->
                                                            <span class="svg-icon svg-icon-2 svg-icon-success">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                    <path opacity="0.3" d="M14 3V21H10V3C10 2.4 10.4 2 11 2H13C13.6 2 14 2.4 14 3ZM7 14H5C4.4 14 4 14.4 4 15V21H8V15C8 14.4 7.6 14 7 14Z" fill="currentColor"></path>
                                                                    <path d="M21 20H20V8C20 7.4 19.6 7 19 7H17C16.4 7 16 7.4 16 8V20H3C2.4 20 2 20.4 2 21C2 21.6 2.4 22 3 22H21C21.6 22 22 21.6 22 21C22 20.4 21.6 20 21 20Z" fill="currentColor"></path>
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->
                                                        </span>
                                                    </div>
                                                    Descargar Reporte</a>
                                            </div>
                                        </div>

                                    </form>


                                </div>
                            </div>
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card-->
                <!--begin::Card-->
                <div class="card mb-6">
                    <!--begin::Card body-->
                    <div class="card-body p-9 text-center">
                        <!--begin::Heading-->
                        <div class="fs-2hx fw-bolder">Generar Reportes Estudiantes Evaluados</div>
                        <div class="fs-4 fw-bold text-gray-400 mb-7">Genera el reporte de estudantes por periodo</div>
                        <!--end::Heading-->
                        <div class="row">
                            <div class="col-md-12">

                                <form action="{{route('reporte.exportar_csc')}}"  method="POST" id="form_send_report_student">
                                    @csrf
                                    {{-- <input type="hidden" name="periodo" value="1-2023"> --}}
                                    <div class="row">
                                        <div class="col-md-4">

                                        <!--begin::Input group-->
                                        <div class="input-group ">
                                            <span class="input-group-text" id="basic-addon2">
                                                Periodo:
                                            </span>
                                            <select class="form-select" name="periodo" id="periodo" aria-label="Select example">
                                                <option value="1-2023" >1-2023</option>
                                                <option value="2-2023" >2-2023</option>

                                                <option value="1-2024"  >1-2024</option>
                                                <option value="2-2024" >2-2024</option>

                                                <option value="1-2025" >1-2025</option>
                                                <option value="2-2025" >2-2025</option>

                                                <option value="1-2026" >1-2026</option>
                                                <option value="2-2026" >2-2026</option>

                                                <option value="1-2027" >1-2027</option>
                                                <option value="2-2027" >2-2027</option>

                                                <option value="1-2028" >1-2028</option>
                                                <option value="2-2028" >2-2028</option>

                                                <option value="1-2029" >1-2029</option>
                                                <option value="2-2029" >2-2029</option>

                                                <option value="1-2030" >1-2030</option>
                                                <option value="2-2030" >2-2030</option>

                                                <option value="1-2031" >1-2031</option>
                                                <option value="2-2031" >2-2031</option>

                                                <option value="1-2032" >1-2032</option>
                                                <option value="2-2032" >2-2032</option>

                                                <option value="1-2033" >1-2033</option>
                                                <option value="2-2033" >2-2033</option>

                                                <option value="1-2034" >1-2034</option>
                                                <option value="2-2034" >2-2034</option>

                                                <option value="1-2035" >1-2035</option>
                                                <option value="2-2035" >2-2035</option>

                                                <option value="1-2036" >1-2036</option>
                                                <option value="2-2036" >2-2036</option>

                                                <option value="1-2037" >1-2037</option>
                                                <option value="2-2037" >2-2037</option>

                                                <option value="1-2038" >1-2038</option>
                                                <option value="2-2038" >2-2038</option>
                                            </select>

                                        </div>
                                        <!--end::Input group-->
                                        </div>
                                        <div class="col-md-5">
                                            <div class="input-group ">
                                                <span class="input-group-text" id="basic-addon2">
                                                    Fase:
                                                </span>
                                                <select name="fase" class="form-select" aria-label="Default select example">
                                                    <option value="1">TALLER DE SERVICIO COMUNITARIO (Fase Nº1)</option>
                                                    <option value="2">PROYECTO DE SERVICIO COMUNITARIO (Fase Nº2)</option>
                                                    <option value="0">Las Dos Fase</option>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="col-md-3 text-end">
                                            <a href="#" id="btn_send_report_estudent" class="btn btn-sm btn-light-success fw-bolder ms-2 fs-5 py-1 px-3">
                                                <div class="symbol symbol-30px me-4">
                                                    <span class="symbol-label text-success bg-light-success">
                                                        <!--begin::Svg Icon | path: icons/duotune/graphs/gra001.svg-->
                                                        <span class="svg-icon svg-icon-2 svg-icon-success">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                <path opacity="0.3" d="M14 3V21H10V3C10 2.4 10.4 2 11 2H13C13.6 2 14 2.4 14 3ZM7 14H5C4.4 14 4 14.4 4 15V21H8V15C8 14.4 7.6 14 7 14Z" fill="currentColor"></path>
                                                                <path d="M21 20H20V8C20 7.4 19.6 7 19 7H17C16.4 7 16 7.4 16 8V20H3C2.4 20 2 20.4 2 21C2 21.6 2.4 22 3 22H21C21.6 22 22 21.6 22 21C22 20.4 21.6 20 21 20Z" fill="currentColor"></path>
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                    </span>
                                                </div>
                                                Descargar Reporte</a>
                                        </div>
                                    </div>

                                </form>


                            </div>
                        </div>
                    </div>
                    <!--end::Card body-->
                </div>


                <div class="card mb-6">
                    <!--begin::Card body-->
                    <div class="card-body p-9 text-center">
                        <!--begin::Heading-->
                        <div class="fs-2hx fw-bolder">CONSTANCIA DE CULMINACIÓN
                            DE SERVICIO COMUNITARIO
                            </div>
                        <div class="fs-4 fw-bold text-gray-400 mb-7">Genera las constancia de culminación en pdf</div>
                        <!--end::Heading-->
                        <div class="row">
                            <div class="col-md-12">

                                <form action="{{route('reporte.exportar_culminacion')}}"  method="POST" id="form_send_report_student_culmiunacion">
                                    @csrf
                                    {{-- <input type="hidden" name="periodo" value="1-2023"> --}}
                                    <div class="row">
                                        <div class="col-md-9">

                                        <!--begin::Input group-->
                                        <div class="input-group ">
                                            <span class="input-group-text" id="basic-addon2">
                                                CEDULA:
                                            </span>
                                            <input type="text" id="cedula" name="cedula" class="form-control campo-numeros @error('cedula') is-invalid @enderror" placeholder="Cedula del estudiante"/>

                                        </div>
                                        @error('cedula')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <!--end::Input group-->
                                        </div>

                                        <div class="col-md-3 text-end">
                                            <a href="#" id="btn_send_report_estudent_contancia" class="btn btn-sm btn-light-success fw-bolder ms-2 fs-5 py-1 px-3">
                                                <div class="symbol symbol-30px me-4">
                                                    <span class="symbol-label text-success bg-light-success">
                                                        <!--begin::Svg Icon | path: icons/duotune/graphs/gra001.svg-->
                                                        <span class="svg-icon svg-icon-2 svg-icon-success">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                <path opacity="0.3" d="M14 3V21H10V3C10 2.4 10.4 2 11 2H13C13.6 2 14 2.4 14 3ZM7 14H5C4.4 14 4 14.4 4 15V21H8V15C8 14.4 7.6 14 7 14Z" fill="currentColor"></path>
                                                                <path d="M21 20H20V8C20 7.4 19.6 7 19 7H17C16.4 7 16 7.4 16 8V20H3C2.4 20 2 20.4 2 21C2 21.6 2.4 22 3 22H21C21.6 22 22 21.6 22 21C22 20.4 21.6 20 21 20Z" fill="currentColor"></path>
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                    </span>
                                                </div>
                                                Descargar Reporte</a>
                                        </div>
                                    </div>

                                </form>


                            </div>
                        </div>
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->
           {{-- <div class="table-responsive">
                <table class="table table-striped gy-7 gs-7">
                    <thead>
                        <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                            <th class="min-w-200px">CEDULA</th>
                            <th class="min-w-200px">NOMBRES</th>
                            <th class="min-w-200px">FASE</th>
                            <th class="min-w-200px">NOTA</th>
                            <th class="min-w-200px">OBSERVACION</th>


                        </tr>
                    </thead>
                    <tbody>


                    </tbody>
                </table>
            </div> --}}




    <!--end::Container-->

</div>


@push('scripts')
<script src="{{ asset('assets/js/sweet-alert/sweetalert.min.js') }}"></script>
<script src="{{ asset('assets/js/notify/bootstrap-notify.min.js') }}"></script>
<script src="{{ asset('m2/assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>

<script src="{{ asset('js/axios.min.js') }}"></script>
<script src="{{ asset('m2/assets/plugins/global/plugins.bundle.js') }}"></script>
    {{-- <script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script> --}}
<script>
// $('#kt_table_users').dataTable( {
//         "language": {
//             "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
//         },
//             "order": [[ 1, 'asc' ]],
//             dom: 'Bfrtip',
//             buttons: [
//                 'copy', 'csv', 'excel', 'pdf', 'print'
//             ]
//         } );

$('#btn_send_report').on('click',(e)=>{
    console.log("Hola");

    $('#form_send_report').submit();
});

$('#btn_send_report_estudent').on('click',(e)=>{
    console.log("Hola");

    $('#form_send_report_student').submit();
});

$('#btn_send_report_estudent_contancia').on('click',(e)=>{
    console.log("Hola");

    $('#form_send_report_student_culmiunacion').submit();
});


// Función para permitir solo números en un campo de entrada
function soloNumeros(e) {
  // Obtener el código de la tecla presionada
  var key = e.keyCode;

  // Permitir solo números del 0 al 9, la tecla de retroceso y la tecla de borrar
  if ((key >= 48 && key <= 57) || key == 8 || key == 46) {
    // Permitir la entrada
    return true;
  } else {
    // Bloquear la entrada
    return false;
  }
}

// Agregar el evento "keypress" al campo de entrada
$(".campo-numeros").keypress(soloNumeros);
</script>

@endpush
@endsection
