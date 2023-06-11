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


            <div class="buttton-register" style="text-align:end;">

                <a href="{{route('profesoresdatos.create')}}" class="btn btn-sm btn-primary" ><span class="svg-icon svg-icon-1"><svg><!--begin::Svg Icon | path: assets/media/icons/duotune/communication/com013.svg-->
                    <span class="svg-icon svg-icon-muted svg-icon-2hx"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M6.28548 15.0861C7.34369 13.1814 9.35142 12 11.5304 12H12.4696C14.6486 12 16.6563 13.1814 17.7145 15.0861L19.3493 18.0287C20.0899 19.3618 19.1259 21 17.601 21H6.39903C4.87406 21 3.91012 19.3618 4.65071 18.0287L6.28548 15.0861Z" fill="currentColor"/>
                    <rect opacity="0.3" x="8" y="3" width="8" height="8" rx="4" fill="currentColor"/>
                    </svg></span>
                    <!--end::Svg Icon--></svg></span>Registro
                </a>

            </div>

            <div class="table-responsive">
                <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer" id="kt_table_users">
                    <thead>
                        <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                            <th class="min-w-200px">EDITAR</th>
                            <th class="min-w-200px">CEDULA</th>
                            <th class="min-w-200px">NOMBRES</th>
                            <th class="min-w-200px">APELLIDO PATERNO</th>
                            <th class="min-w-200px">APELLIDO MATERNO</th>
                            <th class="min-w-200px">ESPECIALIDAD</th>

                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($profe_all as $profe_alls)
                        <tr>
                            <td >
                                <a href="{{route('profesoresdatos.edit',$profe_alls->id)}}">
                                    <button  class="btn btn-success btn-xs" >Editar  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                      </svg>
                                    </button>
                                </a>
                            </td>

                            <td>{{$profe_alls->cedula}}</td>
                            <td>{{$profe_alls->nombre}}</td>
                            <td>{{$profe_alls->primer_apellido}}</td>
                            <td>{{$profe_alls->segundo_apellido}}</td>
                            <td>{{$profe_alls->especialidad}}</td>


                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

</div>
</div>
</div>

@push('scripts')
<script src="{{ asset('assets/js/sweet-alert/sweetalert.min.js') }}"></script>
<script src="{{ asset('assets/js/notify/bootstrap-notify.min.js') }}"></script>

<script src="{{ asset('js/axios.min.js') }}"></script>
<script>
            $('#kt_table_users').dataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
                },
                "order": [
                    [1, 'asc']
                ],
                dom: 'Bfrtip',
                buttons: [
                    // 'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
</script>
@endpush
@endsection
