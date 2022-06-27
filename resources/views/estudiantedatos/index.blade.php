@extends('layouts.app')

@section('content')
@if (session('mensaje'))
<div class="alert alert-success">
    <strong>{{ session('mensaje') }}</strong>
</div>
@endif
<div >
    <div class="card shadow-sm">

        <div class="card-header pt-8">
            <div class="card-title">
                <!--begin::Search-->
                <div class="d-flex align-items-center position-relative my-1">
                    <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                    <span class="svg-icon svg-icon-1 position-absolute ms-6">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1"
                                transform="rotate(45 17.0365 15.1223)" fill="currentColor"></rect>
                            <path
                                d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                fill="currentColor"></path>
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                    <input type="text" data-kt-filemanager-table-filter="search"
                        class="form-control form-control-solid w-500px ps-15" placeholder="Buscar por Cedula">
                </div>
                <!--end::Search-->
            </div>

            <div class="buttton-register" style="text-align:end;">

                <a href="{{route('estudiantedatos.create')}}" class="btn btn-primary" ><span class="svg-icon svg-icon-1"><svg><!--begin::Svg Icon | path: assets/media/icons/duotune/communication/com013.svg-->
                    <span class="svg-icon svg-icon-muted svg-icon-2hx"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M6.28548 15.0861C7.34369 13.1814 9.35142 12 11.5304 12H12.4696C14.6486 12 16.6563 13.1814 17.7145 15.0861L19.3493 18.0287C20.0899 19.3618 19.1259 21 17.601 21H6.39903C4.87406 21 3.91012 19.3618 4.65071 18.0287L6.28548 15.0861Z" fill="currentColor"/>
                    <rect opacity="0.3" x="8" y="3" width="8" height="8" rx="4" fill="currentColor"/>
                    </svg></span>
                    <!--end::Svg Icon--></svg></span>Registro
                </a>

                <a href="{{route('home')}}" type="button" class="btn btn-sm btn-primary">Ir al Home</a>

            </div>

            <div class="table-responsive">
                <table class="table table-striped gy-7 gs-7">
                    <thead>
                        <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                            <th class="min-w-200px">EDITAR</th>
                            <th class="min-w-200px">CEDULA</th>
                            <th class="min-w-200px">NOMBRES</th>
                            <th class="min-w-200px">APELLIDO PATERNO</th>
                            <th class="min-w-200px">APELLIDO MATERNO</th>
                            <th class="min-w-200px">FE_INGRESO</th>
                            <th class="min-w-200px">INICIO_PROGRAMA</th>
                            <th class="min-w-200px">SEXO</th>
                            <th class="min-w-200px">SANGUINEO</th>
                            <th class="min-w-200px">EDO_CIVIL</th>
                            <th class="min-w-200px">CONDICION</th>
                            <th class="min-w-200px">NUCLEO</th>
                            <th class="min-w-200px">ETNIA</th>
                            <th class="min-w-200px">DISCAPACIDAD</th>
                            <th class="min-w-200px">PAIS</th>
                            <th class="min-w-200px">FEC_NAC</th>
                            <th class="min-w-200px">LUGAR_NAC</th>
                            <th class="min-w-200px">CIUDAD</th>
                            <th class="min-w-200px">DIRECCION</th>
                            <th class="min-w-200px">TEL_HAB</th>
                            <th class="min-w-200px">TEL_CEL</th>
                            <th class="min-w-200px">CORREO</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($estu as $estus)
                        <tr>
                            <td >
                               <a href="{{route('estudiantedatos.edit')}}">
                                    <span  class="svg-icon svg-icon-2x svg-icon-primary me-4" s>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none"><path opacity="0.3" d="M10 4H21C21.6 4 22 4.4 22 5V7H10V4Z" fill="currentColor"></path>
                                            <path
                                                        d="M9.2 3H3C2.4 3 2 3.4 2 4V19C2 19.6 2.4 20 3 20H21C21.6 20 22 19.6 22 19V7C22 6.4 21.6 6 21 6H12L10.4 3.60001C10.2 3.20001 9.7 3 9.2 3Z"
                                                        fill="currentColor">
                                            </path>
                                    </svg>
                                    </span>
                                  </a>
                            </td>

                            <td>{{$estus->cedula}}</td>
                            <td>{{$estus->nombres}}</td>
                            <td>{{$estus->primer_apellido}}</td>
                            <td>{{$estus->segundo_apellido}}</td>
                            <td>{{$estus->fe_ingreso}}</td>
                            <td>{{$estus->inicio_programa}}</td>
                            <td>{{$estus->sexo}}</td>
                            <td>{{$estus->sanguineo}}</td>
                            <td>{{$estus->edo_civil}}</td>
                            <td>{{$estus->condicion}}</td>
                            <td>{{$estus->nucleo}}</td>
                            <td>{{$estus->etnia}}</td>
                            <td>{{$estus->discapacidad}}</td>
                            <td>{{$estus->pais}}</td>
                            <td>{{$estus->fe_nac}}</td>
                            <td>{{$estus->lugar_nac}}</td>
                            <td>{{$estus->ciudad}}</td>
                            <td>{{$estus->direccion}}</td>
                            <td>{{$estus->tel_hab}}</td>
                            <td>{{$estus->tel_cel}}</td>
                            <td>{{$estus->email}}</td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

</div>
@push('scripts')
<script>var hostUrl = "/m2/assets/";</script>
<script src="/m2/assets/plugins/global/plugins.bundle.js"></script>
<script src="/m2/assets/js/scripts.bundle.js"></script>
<!--end::Global Javascript Bundle-->
<!--begin::Page Vendors Javascript(used by this page)-->
<script src="/m2/assets/plugins/custom/datatables/datatables.bundle.js"></script>
<!--end::Page Vendors Javascript-->
<!--begin::Page Custom Javascript(used by this page)-->
<script src="/m2/assets/js/custom/apps/user-management/users/list/table.js"></script>
{{-- <script src="https://preview.keenthemes.com/metronic8/demo1/assets/plugins/custom/datatables/datatables.bundle.js"></script> --}}
<script src="/m2/assets/js/custom/apps/user-management/users/list/add.js"></script>
<script src="/m2/assets/js/widgets.bundle.js"></script>
<script src="/m2/assets/js/custom/widgets.js"></script>
<script src="/m2/assets/js/custom/apps/chat/chat.js"></script>
<script src="/m2/assets/js/custom/intro.js"></script>
@endpush
@endsection
