@extends('layouts.app')

@section('content')
<div >
    <div class="card shadow-sm">

        <div class="card-body card-scroll h-600px">

            <div class="buttton-register" style="text-align:end;">
                <a href="{{route('estudiantedatos.create')}}" class="btn btn-primary" ><span class="svg-icon svg-icon-1"><svg><!--begin::Svg Icon | path: assets/media/icons/duotune/communication/com013.svg-->
                    <span class="svg-icon svg-icon-muted svg-icon-2hx"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M6.28548 15.0861C7.34369 13.1814 9.35142 12 11.5304 12H12.4696C14.6486 12 16.6563 13.1814 17.7145 15.0861L19.3493 18.0287C20.0899 19.3618 19.1259 21 17.601 21H6.39903C4.87406 21 3.91012 19.3618 4.65071 18.0287L6.28548 15.0861Z" fill="currentColor"/>
                    <rect opacity="0.3" x="8" y="3" width="8" height="8" rx="4" fill="currentColor"/>
                    </svg></span>
                    <!--end::Svg Icon--></svg></span>Registro
                </a>

                <a href="#" class="btn btn-primary"><span class="svg-icon svg-icon-1"><!--begin::Svg Icon | path: assets/media/icons/duotune/communication/com014.svg-->
                    <span class="svg-icon svg-icon-muted svg-icon-2hx"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M16.0173 9H15.3945C14.2833 9 13.263 9.61425 12.7431 10.5963L12.154 11.7091C12.0645 11.8781 12.1072 12.0868 12.2559 12.2071L12.6402 12.5183C13.2631 13.0225 13.7556 13.6691 14.0764 14.4035L14.2321 14.7601C14.2957 14.9058 14.4396 15 14.5987 15H18.6747C19.7297 15 20.4057 13.8774 19.912 12.945L18.6686 10.5963C18.1487 9.61425 17.1285 9 16.0173 9Z" fill="currentColor"/>
                    <rect opacity="0.3" x="14" y="4" width="4" height="4" rx="2" fill="currentColor"/>
                    <path d="M4.65486 14.8559C5.40389 13.1224 7.11161 12 9 12C10.8884 12 12.5961 13.1224 13.3451 14.8559L14.793 18.2067C15.3636 19.5271 14.3955 21 12.9571 21H5.04292C3.60453 21 2.63644 19.5271 3.20698 18.2067L4.65486 14.8559Z" fill="currentColor"/>
                    <rect opacity="0.3" x="6" y="5" width="6" height="6" rx="3" fill="currentColor"/>
                    </svg></span>
                    <!--end::Svg Icon--></span>Editar
                </a>
            </div>

            <div class="table-responsive">
                <table class="table table-striped gy-7 gs-7">
                    <thead>
                        <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                            <th class="min-w-200px">CEDULA</th>
                            <th class="min-w-200px">NOMBRES</th>
                            <th class="min-w-200px">APELLIDO PATERNO</th>
                            <th class="min-w-200px">APELLIDO MATERNO</th>sss
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
</div>
@endsection
