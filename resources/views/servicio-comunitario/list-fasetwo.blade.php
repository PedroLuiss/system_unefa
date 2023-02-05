@extends('layouts.app')

@section('content')
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables.css') }}"> --}}

    @push('css')
        <link rel="stylesheet" type="text/css"
            href="https://preview.keenthemes.com/metronic8/demo1/assets/plugins/custom/datatables/datatables.bundle.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/sweetalert2.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('m2/assets/plugins/global/plugins.bundle.css') }}">

    @endpush
    <div class="card">

        <!--begin::Card header-->
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder text-dark">Lista De Grupos - Fase Nº2</span>
                <span class="text-muted mt-1 fw-bold fs-7">Aqui se mostrara el listado de los grupos de que vienen de la fase 1.</span>
            </h3>
        </div>
        {{-- <div class="card-header border-0 pt-6">

            <!--begin::Card toolbar-->
            <div class="card-toolbar" data-select2-id="select2-data-133-a0zo">
                <!--begin::Toolbar-->
                <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base"
                    data-select2-id="select2-data-132-co2t">
                    <!--begin::Filter-->


                    <!--begin::Add user-->
                    <a href="{{ route('faseone.create') }}" class="btn btn-primary">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                        <span class="svg-icon svg-icon-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2"
                                    rx="1" transform="rotate(-90 11.364 20.364)" fill="currentColor"></rect>
                                <rect x="4.36396" y="11.364" width="16" height="2" rx="1"
                                    fill="currentColor"></rect>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->Crear Grupo
                    </a>
                    <!--end::Add user-->
                </div>

            </div>
            <!--end::Card toolbar-->
        </div>
        <!--end::Card header--> --}}
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

                                <th class="min-w-125px sorting" tabindex="0" aria-controls="" rowspan="1"
                                    colspan="1" aria-label="User: activate to sort column ascending"
                                    style="width: 228.406px;">Profesor/a</th>
                                <th class="min-w-125px sorting" tabindex="0" aria-controls="" rowspan="1"
                                    colspan="1" aria-label="Role: activate to sort column ascending"
                                    style="width: 126.141px;">Cédula</th>
                                <th class="min-w-125px sorting" tabindex="0" aria-controls="" rowspan="1"
                                    colspan="1" aria-label="Last login: activate to sort column ascending"
                                    style="width: 126.141px;">Nombre Proyecto</th>
                                <th class="min-w-125px sorting" tabindex="0" aria-controls="" rowspan="1"
                                    colspan="1" aria-label="Last login: activate to sort column ascending"
                                    style="width: 126.141px;">Total</th>
                                <th class="min-w-125px sorting" tabindex="0" aria-controls="" rowspan="1"
                                    colspan="1" aria-label="Joined Date: activate to sort column ascending"
                                    style="width: 163.422px;">Estado</th>
                                <th class="min-w-125px sorting" tabindex="0" aria-controls="" rowspan="1"
                                    colspan="1" aria-label="Joined Date: activate to sort column ascending"
                                    style="width: 163.422px;">Fecha Inicio</th>
                                <th class="text-center min-w-100px sorting_disabled" rowspan="1" colspan="1"
                                    aria-label="Actions" style="width: 101px;">Actions</th>
                            </tr>
                            <!--end::Table row-->
                        </thead>
                        <tbody class="text-gray-600 fw-bold">
                            @foreach ($data as $value)
                                <tr class="odd" id="iten{{ $value->id }}">

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
                                            <a href="#"
                                                class="text-gray-800 text-hover-primary mb-1">{{ $value->nombre }}
                                                {{ $value->segundo_apellido }} {{ $value->primer_apellido }}</a>
                                            <span>{{ $value->email }} </span>
                                        </div>
                                        <!--begin::User details-->
                                    </td>
                                    <!--end::User=-->
                                    <!--begin::Role=-->
                                    <td>{{ $value->cedula }} </td>
                                    <!--end::Role=-->

                                    <!--begin::Two step=-->
                                    <td>
                                        <p>{{ $value->nombre_proyecto }} </p>
                                    </td>
                                    <!--end::Two step=-->
                                    <!--begin::Two step=-->
                                    <td>
                                        <div class="badge badge-light-info fw-bolder" style="font-size: 1vw;">Total
                                            Estudiante: {{ $value->total_studiante }}</div>
                                    </td>
                                    <!--end::Two step=-->
                                    <!--begin::Joined-->
                                    <td>
                                        @if (!$value->estado)
                                            <div style="font-size: 1vw;" class="badge badge-light-danger fw-bolder">
                                                Pindiente</div>
                                        @else
                                            <div style="font-size: 1vw;" class="badge badge-light-success fw-bolder">Finalizado</div>
                                        @endif
                                    </td>
                                    <!--begin::Joined-->
                                     <!--begin::Joined-->
                                     <td>
                                        <div  class="badge badge-light-info fw-bolder">
                                            {{$value->created_at->translatedFormat(' d/m/Y ');}}</div>
                                    </td>
                                    <!--begin::Joined-->
                                    <!--begin::Action=-->
                                    <td class="text-end">
                                        @if (!$value->estado)
                                            <button class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary"
                                                data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                                <i class="bi bi-three-dots fs-3"></i>
                                            </button>
                                            <a href="javascript:void(0);" onclick="finalizar(this)"
                                                    data-id="{{ $value->id }}" title="Finalizar Fase"
                                                    class="btn btn-icon btn-bg-light btn-active-color-info btn-sm me-1">
                                                    <!--begin::Svg Icon | path: icons/duotune/general/gen019.svg-->
                                                    <span class="svg-icon svg-icon-3">
                                                        <i class="fa-solid fa-check"></i>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                </a>
                                        @else
                                        <a href="{{ route('faseone.views', $value->id) }}"
                                            data-id="{{ $value->id }}" title="Ver Grupo"
                                            class="btn btn-icon btn-bg-light btn-active-color-info btn-sm me-1">
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen019.svg-->
                                            <span class="svg-icon svg-icon-3">
                                                <i class="fa-sharp fa-solid fa-eye"></i>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </a>
                                        @endif

                                        <!--begin::Menu 3-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-3"
                                            data-kt-menu="true">
                                            <!--begin::Heading-->
                                            <div class="menu-item px-3">
                                                <div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">
                                                    Menú
                                                </div>
                                            </div>
                                            <!--end::Heading-->

                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a  href="{{ route('fasetwo.edit', $value->id) }}" class="menu-link px-3">
                                                    Editar Grupo
                                                </a>
                                            </div>
                                            <!--end::Menu item-->

                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="{{ route('faseone.add_nota_faseone', $value->id) }}"  class="menu-link flex-stack px-3">
                                                    Evaluar Estudiante

                                                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                                        aria-label="Aqui podras asignar las nota para cada estudiante"
                                                        data-bs-original-title="Aqui podras asignar las nota para cada estudiante"
                                                        data-kt-initialized="1"></i>
                                                </a>
                                            </div>
                                            <!--end::Menu item-->

                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#"   data-bs-toggle="modal" data-bs-target="#kt_modal_new_target" id="kt_file_manager_new_folder"  data-id="{{$value->id}}" onclick="prepare_data(this)" class="menu-link px-3">
                                                    Cargar Archivo
                                                </a>
                                            </div>
                                            <!--end::Menu item-->

                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3 my-1">
                                                <a href="#" onclick="delet_grupo(this)"
                                                data-id="{{ $value->id }}" class="menu-link px-3">
                                                    Eliminar Grupo
                                                </a>
                                            </div>
                                            <!--end::Menu item-->
                                        </div>
                                        <!--end::Menu 3-->
                                        @if ($value->status == 1)

                                        {{-- <a href="{{ route('faseone.add_nota_faseone', $value->id) }}" title="Agregar Nota" class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M13.0021 10.9128V3.01281C13.0021 2.41281 13.5021 1.91281 14.1021 2.01281C16.1021 2.21281 17.9021 3.11284 19.3021 4.61284C20.7021 6.01284 21.6021 7.91285 21.9021 9.81285C22.0021 10.4129 21.5021 10.9128 20.9021 10.9128H13.0021Z" fill="currentColor"></path>
                                                <path opacity="0.3" d="M11.0021 13.7128V4.91283C11.0021 4.31283 10.5021 3.81283 9.90208 3.91283C5.40208 4.51283 1.90209 8.41284 2.00209 13.1128C2.10209 18.0128 6.40208 22.0128 11.3021 21.9128C13.1021 21.8128 14.7021 21.3128 16.0021 20.4128C16.5021 20.1128 16.6021 19.3128 16.1021 18.9128L11.0021 13.7128Z" fill="currentColor"></path>
                                                <path opacity="0.3" d="M21.9021 14.0128C21.7021 15.6128 21.1021 17.1128 20.1021 18.4128C19.7021 18.9128 19.0021 18.9128 18.6021 18.5128L13.0021 12.9128H20.9021C21.5021 12.9128 22.0021 13.4128 21.9021 14.0128Z" fill="currentColor"></path>
                                            </svg>
                                        </a> --}}
                                        {{-- <a href="{{ route('faseone.edit', $value->id) }}" title="editar"
                                            class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                            <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                            <span class="svg-icon svg-icon-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <path opacity="0.3"
                                                        d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z"
                                                        fill="currentColor"></path>
                                                    <path
                                                        d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z"
                                                        fill="currentColor"></path>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </a> --}}
                                        {{-- <a href="" title="Cargar Archivo"
                                            class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1"
                                            data-bs-toggle="modal" data-bs-target="#kt_modal_new_target"
                                            id="kt_file_manager_new_folder" data-id="{{$value->id}}" onclick="prepare_data(this)">
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen019.svg-->
                                            <span class="svg-icon svg-icon-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <path
                                                        d="M17.5 11H6.5C4 11 2 9 2 6.5C2 4 4 2 6.5 2H17.5C20 2 22 4 22 6.5C22 9 20 11 17.5 11ZM15 6.5C15 7.9 16.1 9 17.5 9C18.9 9 20 7.9 20 6.5C20 5.1 18.9 4 17.5 4C16.1 4 15 5.1 15 6.5Z"
                                                        fill="currentColor"></path>
                                                    <path opacity="0.3"
                                                        d="M17.5 22H6.5C4 22 2 20 2 17.5C2 15 4 13 6.5 13H17.5C20 13 22 15 22 17.5C22 20 20 22 17.5 22ZM4 17.5C4 18.9 5.1 20 6.5 20C7.9 20 9 18.9 9 17.5C9 16.1 7.9 15 6.5 15C5.1 15 4 16.1 4 17.5Z"
                                                        fill="currentColor"></path>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </a> --}}
                                        {{-- <a href="javascript:void(0);" onclick="delet_grupo(this)"
                                            data-id="{{ $value->id }}" title="Eliminar Grupo"
                                            class="btn btn-icon btn-bg-light btn-active-color-danger btn-sm me-1">
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen019.svg-->
                                            <span class="svg-icon svg-icon-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <path
                                                        d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z"
                                                        fill="currentColor"></path>
                                                    <path opacity="0.5"
                                                        d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z"
                                                        fill="currentColor"></path>
                                                    <path opacity="0.5"
                                                        d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z"
                                                        fill="currentColor"></path>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </a> --}}
                                        @else

                                        @endif


                                    </td>
                                    <!--end::Action=-->
                                </tr>
                            @endforeach
                        </tbody>
                        <!--end::Table body-->
                    </table>
                </div>
            </div>
            <!--end::Table-->
        </div>
        <!--end::Card body-->
        @include('servicio-comunitario.cargar_file_faseone')
    </div>
    @push('scripts')
         <script src="{{ asset('assets/js/sweet-alert/sweetalert.min.js') }}"></script>
        <script src="{{ asset('assets/js/notify/bootstrap-notify.min.js') }}"></script>
        <script src="/m2/assets/plugins/custom/datatables/datatables.bundle.js"></script>

        <script src="{{ asset('js/axios.min.js') }}"></script>


        {{-- <script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script> --}}
        <script>
            function prepare_data(obj) {
                let id = $(obj).attr('data-id');
                $('#id_grupo_form_file').val(id);
                $('#id_fase').val(1);
                list_files(id);
            }
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
            function finalizar(obj) {
                let id = $(obj).attr('data-id');
                console.log(id);
                const data = {
                    id:id
                }
                swal({
                    title: "Estas seguro?",
                    text: "Deseas Finalizar El Grupo?",
                    icon: "info",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        console.log("Hola");
                        const sendGetRequest = async () => {
                            try {
                                const resp = await axios.put(base_url() +
                                    "/servicio-comunitario/faseone/finalizar",  data);
                                console.log(resp.data);
                                if (resp.data.status == 200) {
                                    messeg(resp.data.success, 'success');
                                    location.reload();
                                } else {
                                    messeg(resp.data.success, 'danger');
                                    swal({
                                            title: "¡ADVERTENCIA!",
                                            text:resp.data.success,
                                            icon: "error",
                                            buttons:{
                                                cancel: "Cerrar",

                                            },
                                            dangerMode: false,
                                        }).then((willDelete) => {

                                            })
                                }

                            } catch (err) {
                                // Handle Error Here
                            }
                        };
                        sendGetRequest();
                    }
                })
            }
            function delet_grupo(obj) {
                let id = $(obj).attr('data-id');
                console.log(id);
                swal({
                    title: "Estas seguro?",
                    text: "Deseas eliminar el Grupo?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        console.log("Hola");
                        const sendGetRequest = async () => {
                            try {
                                const resp = await axios.delete(base_url() +
                                    "/servicio-comunitario/delet_grupo/" + Number.parseInt(id));
                                // console.log(resp);
                                if (resp.data.status == 200) {
                                    $('#iten' + id).remove();
                                    messeg(resp.data.message, 'success');
                                } else {
                                    messeg(resp.data.message, 'danger');
                                }

                            } catch (err) {
                                // Handle Error Here
                            }
                        };
                        sendGetRequest();
                    }
                })
            }

            $('#btn_add_files_expedientes').on('click', (e) => {
                e.preventDefault();
                console.log("Hola");

                var url = document.getElementById('url_add_file_faseone');
                var formData = new FormData(document.getElementById("form-file-faseone"));
                $('#btn_loader').addClass('fa fa-spin fa-spinner');
                $.ajax({
                    url: url.value,
                    type: "post",
                    dataType: "html",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false
                }).done(function(res) {
                    msg = JSON.parse(res)
                    console.log(msg);
                    if (msg.status == 200) {
                        $('#description').val("");
                        $('#name').val("");
                        $('#file').val(null);
                        list_files($('#id_fase').val());
                        // $('.modal_file').modal('hide');
                        $('#kt_modal_new_target_cancel').click();
                        messeg(msg.success, 'success');
                        $('#file').removeClass('is-invalid');
                        $('#error-file').text("");
                    } else {
                        if (msg.campo == 'file') {
                            $('#file').addClass('is-invalid');
                            $('#error-file').text("Debes seleccionar un archivo")
                            messeg("Debes seleccionar un archivo", 'danger');
                        } else {
                            $('#file').removeClass('is-invalid');

                            $('#error-file').text("")
                        }

                        $('#msg_file').text(msg.error);
                        $('#btn_loader').removeClass('fa fa-spin fa-spinner');
                    }
                    $('#btn_loader').removeClass('fa fa-spin fa-spinner');
                }).fail(function(res) {
                    console.log(res)
                });

            });

            function list_files(id) {
                $('#modaldemo3').modal('show');
                console.log(id);
                const sendGetRequest = async () => {
                    try {
                        const resp = await axios.get(base_url()+"/servicio-comunitario/faseone/get_files/"+id);

                        var table = "";
                        console.log(resp.data);
                        if (resp.data=="") {
                            $('#file-contend').addClass('bg-grei-p');
                            table +='<div class="col-md-12"><h5 class="text-muted text-center">Sin Archivo</h5></div>';
                        }else{
                            $('#file-contend').removeClass('bg-grei-p');
                            // console.log(resp.data);
                            let g = 1;
                            for (let i = 0; i < resp.data.length; i++) {
                                const meses = ['enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre'];
                                // Creamos array con los días de la semana
                                const dias_semana = ['Domingo', 'Lunes', 'martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'];
                                // Creamos el objeto fecha instanciándolo con la clase Date
                                const fecha = new Date(resp.data[i].created_at);
                                // Construimos el formato de salida
                                 let  dia = dias_semana[fecha.getDay()] + ', ' + fecha.getDate() + ' de ' + meses[fecha.getMonth()] + ' de ' + fecha.getUTCFullYear();
                                // table += '<div  class="col-3 my-3 px-0 text-center col-md-1">';
                                // table += '<span   onmouseout="btn_delete_show(false,'+i+')" onmouseover="btn_delete_show(true,'+i+')" title="'+resp.data[i].name+'" class="files-view"><span  id="btn-delete-file'+i+'" class="btn-file-delete ocult-btn" onclick="delet_file_compras('+resp.data[i].id+');" ><i class="fa fa-times"></i></span><i onclick="showFile('+resp.data[i].id+')" class="'+ex+'"></i></span>';
                                // table += ' </div>';

                                table += '<div class="col-md-6 ">';
                                table += ' <div class="card h-100 border">';
                                table += ' <div class="card-body d-flex justify-content-center text-center flex-column p-8">';
                                table += '<a href="'+base_url()+resp.data[i].url+'"  target="_blank" class="text-gray-800 text-hover-primary d-flex flex-column">';
                                table += ' <div class="symbol symbol-60px mb-5">';
                                table += ' <img src="/m2/assets/media/svg/files/doc.svg" class="theme-light-show" alt="">';
                                table += ' </div>';
                                table += '<div class="fs-5 fw-bold mb-2">'+resp.data[i].nombre+'</div>';
                                table += ' </a>';
                                table += '<div class="fs-7 fw-semibold text-gray-400">'+dia+'</div>';
                                table += `</div>`;
                                table += '  </div>';
                                table += ' </div>';
                                table += '</div>'
                                g++;
                            }
                        }
                        $('#list_files_fase_one').html(table);
                    } catch (err) {
                        // Handle Error Here
                    }
                };
                sendGetRequest();
            }
        </script>
    @endpush
@endsection
