@extends('layouts.app')

@section('content')
    @if (session('mensaje'))
        <div class="alert alert-success">
            <strong>{{ session('mensaje') }}</strong>
        </div>
    @endif

    <div class="card card-flush h-md-100">
        <!--begin::Header-->
        <div class="card-header pt-7">
            <!--begin::Title-->
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bold text-gray-800">Profesores</span>

                <span class="text-gray-500 mt-1 fw-semibold fs-6">Listados de profesores</span>
            </h3>
            <!--end::Title-->

            <!--begin::Toolbar-->
            <div class="card-toolbar">
                <a href="{{ route('profesoresdatos.create') }}"
                    class="btn btn-sm btn-primary">Agregar</a>
            </div>
            <!--end::Toolbar-->
        </div>
        <!--end::Header-->

        <!--begin::Body-->
        <div class="card-body pt-6">
            <!--begin::Table container-->
            <div class="table-responsive">
                <!--begin::Table-->
                <table class="table table-row-dashed align-middle gs-0 gy-3 my-0 dataTable" id="kt_table_users">
                    <!--begin::Table head-->
                    <thead>
                        <tr class="fs-7 fw-bold text-gray-500 border-bottom-0">
                            <th class="p-0 pb-3 min-w-140px text-start">NOMBRES APELLIDOS</th>
                            <th class="p-0 pb-3 min-w-120px text-center">CEDULA</th>
                            <th class="p-0 pb-3 min-w-200px text-center">ESPECIALIDAD</th>
                            {{-- <th class="p-0 pb-3 min-w-175px text-end pe-12">STATUS</th> --}}
                            <th class="p-0 pb-3 w-50px text-center">OPCIONES</th>
                        </tr>
                    </thead>
                    <!--end::Table head-->

                    <!--begin::Table body-->
                    <tbody>
                        @foreach ($profe_all as $profe_alls)

                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="symbol symbol-50px me-3">
                                        <img src="@if ($profe_alls->foto == null){{ asset('m2/assets/media/avatars/blank.png') }}@else{{ asset($profe_alls->foto) }}@endif" class=""
                                            alt="">
                                    </div>

                                    <div class="d-flex justify-content-start flex-column">
                                        <a href="#" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">{{ $profe_alls->nombre }} {{ $profe_alls->primer_apellido }} {{ $profe_alls->segundo_apellido }}</a>
                                        <span class="text-gray-500 fw-semibold d-block fs-7">{{ $profe_alls->email }}</span>
                                    </div>
                                </div>
                            </td>

                            <td class="text-center pe-0">
                                <span class="text-gray-600 fw-bold fs-6">{{ $profe_alls->cedula }}</span>
                            </td>

                            <td class="text-center pe-0">
                                <!--begin::Label-->
                                <span class="badge badge-light-success fs-base">
                                    <i class="ki-duotone ki-arrow-up fs-5 text-success ms-n1"><span
                                            class="path1"></span><span class="path2"></span></i>
                                            {{ $profe_alls->especialidad }}
                                </span>
                                <!--end::Label-->

                            </td>

                            {{-- <td class="text-end pe-12">
                                <span class="badge py-3 px-4 fs-7 badge-light-primary">In Process</span>
                            </td> --}}

                            <td class="text-center">
                                <a href="{{ route('profesoresdatos.edit', $profe_alls->id) }}"
                                    class="btn btn-sm d-flex btn-bg-light btn-active-color-primary px-3">
                                    Editar <svg
                                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                    <path
                                                        d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                    <path fill-rule="evenodd"
                                                        d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                </svg> </a>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                    <!--end::Table body-->
                </table>
            </div>
            <!--end::Table-->
        </div>
        <!--end: Card Body-->
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
