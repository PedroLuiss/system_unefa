@extends('layouts.app')

@section('content')
{{-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables.css') }}"> --}}
<link rel="stylesheet" type="text/css" href="https://preview.keenthemes.com/metronic8/demo1/assets/plugins/custom/datatables/datatables.bundle.css">
<div class="card">

    <!--begin::Card header-->
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bolder text-dark">Lista De Grupos - Fase Nº1</span>
            <span class="text-muted mt-1 fw-bold fs-7">Aqui se mostrara el listado de los grupos creados actualmente.</span>
        </h3>
    </div>
    <div class="card-header border-0 pt-6">

        <!--begin::Card toolbar-->
        <div class="card-toolbar" data-select2-id="select2-data-133-a0zo">
            <!--begin::Toolbar-->
            <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base" data-select2-id="select2-data-132-co2t">
                <!--begin::Filter-->


                <!--begin::Add user-->
                <a href="{{route('faseone.create')}}" class="btn btn-primary" >
                <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                <span class="svg-icon svg-icon-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="currentColor"></rect>
                        <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="currentColor"></rect>
                    </svg>
                </span>
                <!--end::Svg Icon-->Crear Grupo</a>
                <!--end::Add user-->
            </div>

        </div>
        <!--end::Card toolbar-->
    </div>
    <!--end::Card header-->
    <!--begin::Card body-->
    <div class="card-body py-4">
        <!--begin::Table-->
        <div id="kt_table_users_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
            <div class="table-responsive">
                <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer" id="kt_table_users">
            <!--begin::Table head-->
            <thead>
                <!--begin::Table row-->
                <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                    <th class="w-10px pe-2 sorting_disabled" rowspan="1" colspan="1" aria-label=" " style="width: 29.25px;">
                        <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                            <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target=" .form-check-input" value="1">
                        </div>
                    </th>
                    <th class="min-w-125px sorting" tabindex="0" aria-controls="" rowspan="1" colspan="1" aria-label="User: activate to sort column ascending" style="width: 228.406px;">Profesor/a</th>
                    <th class="min-w-125px sorting" tabindex="0" aria-controls="" rowspan="1" colspan="1" aria-label="Role: activate to sort column ascending" style="width: 126.141px;">Cédula</th>
                    <th class="min-w-125px sorting" tabindex="0" aria-controls="" rowspan="1" colspan="1" aria-label="Last login: activate to sort column ascending" style="width: 126.141px;">Total De Estudiantes</th>
                    <th class="min-w-125px sorting" tabindex="0" aria-controls="" rowspan="1" colspan="1" aria-label="Joined Date: activate to sort column ascending" style="width: 163.422px;">Estado</th>
                    <th class="text-center min-w-100px sorting_disabled" rowspan="1" colspan="1" aria-label="Actions" style="width: 101px;">Actions</th>
                </tr>
                <!--end::Table row-->
            </thead>
            <tbody class="text-gray-600 fw-bold">
                @foreach ($data as $value )
                <tr class="odd">
                    <!--begin::Checkbox-->
                    <td>
                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                            <input class="form-check-input" type="checkbox" value="1">
                        </div>
                    </td>
                    <!--end::Checkbox-->
                    <!--begin::User=-->
                    <td class="d-flex align-items-center">
                        <!--begin:: Avatar -->
                        <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                            <a href="#">
                                <div class="symbol-label fs-3 bg-light-danger text-danger">P</div>
                            </a>
                        </div>
                        <!--end::Avatar-->
                        <!--begin::User details-->
                        <div class="d-flex flex-column">
                            <a href="#" class="text-gray-800 text-hover-primary mb-1">{{$value->nombre}} {{$value->segundo_apellido}} {{$value->primer_apellido}}</a>
                            <span>{{$value->email}} </span>
                        </div>
                        <!--begin::User details-->
                    </td>
                    <!--end::User=-->
                    <!--begin::Role=-->
                    <td >{{$value->cedula}} </td>
                    <!--end::Role=-->

                    <!--begin::Two step=-->
                    <td>
                        <div class="badge badge-light-success fw-bolder" style="font-size: 1vw;">{{$value->total_studiante}}</div>
                    </td>
                    <!--end::Two step=-->
                    <!--begin::Joined-->
                    <td>
                        @if ($value->estado == 0)
                            <div style="font-size: 1vw;" class="badge badge-light-danger fw-bolder">Pindiente</div>
                        @else
                            <div class="badge badge-light-success fw-bolder">Finalizado</div>
                        @endif
                    </td>
                    <!--begin::Joined-->
                    <!--begin::Action=-->
                    <td class="text-end">
                        <a href="{{route('faseone.edit',$value->id)}}" title="editar" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                            <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                            <span class="svg-icon svg-icon-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor"></path>
                                    <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor"></path>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </a>
                        <a href="" title="Empaqutar sus archivo en un Zip" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen019.svg-->
                            <span class="svg-icon svg-icon-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M17.5 11H6.5C4 11 2 9 2 6.5C2 4 4 2 6.5 2H17.5C20 2 22 4 22 6.5C22 9 20 11 17.5 11ZM15 6.5C15 7.9 16.1 9 17.5 9C18.9 9 20 7.9 20 6.5C20 5.1 18.9 4 17.5 4C16.1 4 15 5.1 15 6.5Z" fill="currentColor"></path>
                                    <path opacity="0.3" d="M17.5 22H6.5C4 22 2 20 2 17.5C2 15 4 13 6.5 13H17.5C20 13 22 15 22 17.5C22 20 20 22 17.5 22ZM4 17.5C4 18.9 5.1 20 6.5 20C7.9 20 9 18.9 9 17.5C9 16.1 7.9 15 6.5 15C5.1 15 4 16.1 4 17.5Z" fill="currentColor"></path>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </a>

                    </td>
                    <!--end::Action=-->
                </tr>
                @endforeach
            </tbody>
            <!--end::Table body-->
        </table></div>
    </div>
        <!--end::Table-->
    </div>
    <!--end::Card body-->
</div>
@push('scripts')
{{-- <script>var hostUrl = "/m2/assets/";</script> --}}
<script src="/m2/assets/plugins/global/plugins.bundle.js"></script>
<script src="/m2/assets/js/scripts.bundle.js"></script>
<!--end::Global Javascript Bundle-->
<!--begin::Page Vendors Javascript(used by this page)-->
<script src="/m2/assets/plugins/custom/datatables/datatables.bundle.js"></script>
<!--end::Page Vendors Javascript-->
<!--begin::Page Custom Javascript(used by this page)-->
{{-- <script src="/m2/assets/js/custom/apps/user-management/users/list/table.js"></script> --}}
{{-- <script src="https://preview.keenthemes.com/metronic8/demo1/assets/plugins/custom/datatables/datatables.bundle.js"></script> --}}
<script src="/m2/assets/js/custom/apps/user-management/users/list/add.js"></script>
<script src="/m2/assets/js/widgets.bundle.js"></script>
{{-- <script src="/m2/assets/js/custom/widgets.js"></script> --}}
<script src="/m2/assets/js/custom/apps/chat/chat.js"></script>
<script src="/m2/assets/js/custom/intro.js"></script>

    {{-- <script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script> --}}
<script>
$('#kt_table_users').dataTable( {
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
        },
            "order": [[ 1, 'asc' ]],
            dom: 'Bfrtip',
            buttons: [
                // 'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        } );
</script>

@endpush
@endsection
