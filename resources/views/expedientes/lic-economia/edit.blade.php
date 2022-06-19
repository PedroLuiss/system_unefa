@extends('layouts.app')
@push('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/sweetalert2.css')}}">
@endpush
@section('content')

    <div class="card">
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder text-dark">Creación De Expedientes - Lic. Economía</span>
                <span class="text-muted mt-1 fw-bold fs-7">Los campos son requerido</span>
            </h3>
        </div>
        <div class="card-body">
            <div class="card mb-6">
                <div class="card-body pt-9 pb-0">
                    <!--begin::Details-->
                    <div class="d-flex flex-wrap flex-sm-nowrap">
                        <!--begin: Pic-->
                        <div class="me-7 mb-4">
                            <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                                <img src="/estudios.png" alt="image">
                                <div class="position-absolute translate-middle bottom-0 start-100 mb-6 bg-success rounded-circle border border-4 border-white h-20px w-20px"></div>
                            </div>
                        </div>
                        <!--end::Pic-->
                        <!--begin::Info-->
                        <div class="flex-grow-1">
                            <!--begin::Title-->
                            <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                                <!--begin::User-->
                                <div class="d-flex flex-column">
                                    <!--begin::Name-->
                                    <div class="d-flex align-items-center mb-2">
                                        <a href="#" class="text-gray-900 text-hover-primary fs-2 fw-bolder me-1">{{$expedie[0]->nombres." ".$expedie[0]->primer_apellido." ".$expedie[0]->segundo_apellido}}</a>
                                        <a href="#">
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen026.svg-->
                                            <span class="svg-icon svg-icon-1 svg-icon-primary">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
                                                    <path d="M10.0813 3.7242C10.8849 2.16438 13.1151 2.16438 13.9187 3.7242V3.7242C14.4016 4.66147 15.4909 5.1127 16.4951 4.79139V4.79139C18.1663 4.25668 19.7433 5.83365 19.2086 7.50485V7.50485C18.8873 8.50905 19.3385 9.59842 20.2758 10.0813V10.0813C21.8356 10.8849 21.8356 13.1151 20.2758 13.9187V13.9187C19.3385 14.4016 18.8873 15.491 19.2086 16.4951V16.4951C19.7433 18.1663 18.1663 19.7433 16.4951 19.2086V19.2086C15.491 18.8873 14.4016 19.3385 13.9187 20.2758V20.2758C13.1151 21.8356 10.8849 21.8356 10.0813 20.2758V20.2758C9.59842 19.3385 8.50905 18.8873 7.50485 19.2086V19.2086C5.83365 19.7433 4.25668 18.1663 4.79139 16.4951V16.4951C5.1127 15.491 4.66147 14.4016 3.7242 13.9187V13.9187C2.16438 13.1151 2.16438 10.8849 3.7242 10.0813V10.0813C4.66147 9.59842 5.1127 8.50905 4.79139 7.50485V7.50485C4.25668 5.83365 5.83365 4.25668 7.50485 4.79139V4.79139C8.50905 5.1127 9.59842 4.66147 10.0813 3.7242V3.7242Z" fill="#00A3FF"></path>
                                                    <path class="permanent" d="M14.8563 9.1903C15.0606 8.94984 15.3771 8.9385 15.6175 9.14289C15.858 9.34728 15.8229 9.66433 15.6185 9.9048L11.863 14.6558C11.6554 14.9001 11.2876 14.9258 11.048 14.7128L8.47656 12.4271C8.24068 12.2174 8.21944 11.8563 8.42911 11.6204C8.63877 11.3845 8.99996 11.3633 9.23583 11.5729L11.3706 13.4705L14.8563 9.1903Z" fill="white"></path>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </a>
                                    </div>
                                    <!--end::Name-->
                                    <!--begin::Info-->
                                    <div class="d-flex flex-wrap fw-bold fs-6 mb-4 pe-2">
                                        <a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                                        <!--begin::Svg Icon | path: icons/duotune/communication/com006.svg-->
                                        <span class="svg-icon svg-icon-4 me-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path opacity="0.3" d="M22 12C22 17.5 17.5 22 12 22C6.5 22 2 17.5 2 12C2 6.5 6.5 2 12 2C17.5 2 22 6.5 22 12ZM12 7C10.3 7 9 8.3 9 10C9 11.7 10.3 13 12 13C13.7 13 15 11.7 15 10C15 8.3 13.7 7 12 7Z" fill="currentColor"></path>
                                                <path d="M12 22C14.6 22 17 21 18.7 19.4C17.9 16.9 15.2 15 12 15C8.8 15 6.09999 16.9 5.29999 19.4C6.99999 21 9.4 22 12 22Z" fill="currentColor"></path>
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->{{$expedie[0]->tel_cel}}</a>
                                        <a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                                        <!--begin::Svg Icon | path: icons/duotune/general/gen018.svg-->
                                        <span class="svg-icon svg-icon-4 me-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path opacity="0.3" d="M18.0624 15.3453L13.1624 20.7453C12.5624 21.4453 11.5624 21.4453 10.9624 20.7453L6.06242 15.3453C4.56242 13.6453 3.76242 11.4453 4.06242 8.94534C4.56242 5.34534 7.46242 2.44534 11.0624 2.04534C15.8624 1.54534 19.9624 5.24534 19.9624 9.94534C20.0624 12.0453 19.2624 13.9453 18.0624 15.3453Z" fill="currentColor"></path>
                                                <path d="M12.0624 13.0453C13.7193 13.0453 15.0624 11.7022 15.0624 10.0453C15.0624 8.38849 13.7193 7.04535 12.0624 7.04535C10.4056 7.04535 9.06241 8.38849 9.06241 10.0453C9.06241 11.7022 10.4056 13.0453 12.0624 13.0453Z" fill="currentColor"></path>
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->{{$expedie[0]->pais.", ".$expedie[0]->ciudad}}</a>
                                        <a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary mb-2">
                                        <!--begin::Svg Icon | path: icons/duotune/communication/com011.svg-->
                                        <span class="svg-icon svg-icon-4 me-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path opacity="0.3" d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19Z" fill="currentColor"></path>
                                                <path d="M21 5H2.99999C2.69999 5 2.49999 5.10005 2.29999 5.30005L11.2 13.3C11.7 13.7 12.4 13.7 12.8 13.3L21.7 5.30005C21.5 5.10005 21.3 5 21 5Z" fill="currentColor"></path>
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->{{$expedie[0]->email}}</a>
                                    </div>
                                    <!--end::Info-->
                                </div>
                                <!--end::User-->
                                <!--begin::Actions-->
                                <div class="d-flex my-4">
                                    <a href="#" class="btn btn-sm btn-light me-2" id="kt_user_follow_button">
                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr012.svg-->
                                        <span class="svg-icon svg-icon-3 d-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path opacity="0.3" d="M10 18C9.7 18 9.5 17.9 9.3 17.7L2.3 10.7C1.9 10.3 1.9 9.7 2.3 9.3C2.7 8.9 3.29999 8.9 3.69999 9.3L10.7 16.3C11.1 16.7 11.1 17.3 10.7 17.7C10.5 17.9 10.3 18 10 18Z" fill="currentColor"></path>
                                                <path d="M10 18C9.7 18 9.5 17.9 9.3 17.7C8.9 17.3 8.9 16.7 9.3 16.3L20.3 5.3C20.7 4.9 21.3 4.9 21.7 5.3C22.1 5.7 22.1 6.30002 21.7 6.70002L10.7 17.7C10.5 17.9 10.3 18 10 18Z" fill="currentColor"></path>
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                        <!--begin::Indicator-->
                                        <span class="indicator-label">Follow</span>
                                        <span class="indicator-progress">Please wait...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                        <!--end::Indicator-->
                                    </a>

                                </div>
                                <!--end::Actions-->
                            </div>
                            <!--end::Title-->
                            <!--begin::Stats-->
                            <div class="d-flex flex-wrap flex-stack">
                                <!--begin::Wrapper-->
                                <div class="d-flex flex-column flex-grow-1 pe-8">
                                    <!--begin::Stats-->
                                    <div class="d-flex flex-wrap">
                                        <!--begin::Stat-->
                                        <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                            <!--begin::Number-->
                                            <div class="d-flex align-items-center">
                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
                                                <span class="svg-icon svg-icon-3 svg-icon-success me-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                        <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="currentColor"></rect>
                                                        <path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="currentColor"></path>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                                <div class="fs-2 fw-bolder counted" data-kt-countup="true" data-kt-countup-value="4500" data-kt-countup-prefix="$">{{$all_perio}}</div>
                                            </div>
                                            <!--end::Number-->
                                            <!--begin::Label-->
                                            {{-- <div class="fw-bold fs-6 text-gray-400">Earnings</div> --}}
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Stat-->


                                    </div>
                                    <!--end::Stats-->
                                </div>
                                <!--end::Wrapper-->
                                <!--begin::Progress-->
                                <div class="d-flex align-items-center w-200px w-sm-300px flex-column mt-3">
                                    <div class="d-flex justify-content-between w-100 mt-auto mb-2">
                                        <span class="fw-bold fs-6 text-gray-400">Proceso de archivos</span>
                                        <span class="fw-bolder fs-6">{{$expedie[0]->progres}}%</span>
                                    </div>
                                    <div class="h-5px mx-3 w-100 bg-light mb-3">
                                        <div class="bg-success rounded h-5px" role="progressbar" style="width: {{$expedie[0]->progres}}%;" aria-valuenow="{{$expedie[0]->progres}}" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <!--end::Progress-->
                            </div>
                            <!--end::Stats-->
                        </div>
                        <!--end::Info-->
                    </div>
                    <!--end::Details-->

                </div>
            </div>
        </div>
    </div>
    <div id="box-all-file-ing-sistem"  class="card card-flush">
        <!--begin::Card header-->
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
                        class="form-control form-control-solid w-500px ps-15" placeholder="Buscar por código">
                </div>
                <!--end::Search-->
            </div>
            <!--begin::Card toolbar-->
            <div class="card-toolbar">
                <!--begin::Toolbar-->
                <div class="d-flex justify-content-end" data-kt-filemanager-table-toolbar="base">
                    <!--begin::Export-->
                    <button data-bs-toggle="modal" data-bs-target="#kt_modal_new_target" type="button" class="btn btn-light-primary me-3" id="kt_file_manager_new_folder">
                        <!--begin::Svg Icon | path: icons/duotune/files/fil013.svg-->
                        <span class="svg-icon svg-icon-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path opacity="0.3" d="M10 4H21C21.6 4 22 4.4 22 5V7H10V4Z" fill="currentColor"></path>
                                <path
                                    d="M10.4 3.60001L12 6H21C21.6 6 22 6.4 22 7V19C22 19.6 21.6 20 21 20H3C2.4 20 2 19.6 2 19V4C2 3.4 2.4 3 3 3H9.20001C9.70001 3 10.2 3.20001 10.4 3.60001ZM16 11.6L12.7 8.29999C12.3 7.89999 11.7 7.89999 11.3 8.29999L8 11.6H11V17C11 17.6 11.4 18 12 18C12.6 18 13 17.6 13 17V11.6H16Z"
                                    fill="currentColor"></path>
                                <path opacity="0.3" d="M11 11.6V17C11 17.6 11.4 18 12 18C12.6 18 13 17.6 13 17V11.6H11Z"
                                    fill="currentColor"></path>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->Subir Archivos
                    </button>
                    <!--end::Export-->
                </div>
                <!--end::Toolbar-->

            </div>
            <!--end::Card toolbar-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body">
            <!--begin::Table-->
            <div id="kt_file_manager_list_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                <input type="hidden" name="id_estudiante" id="id_estudiante" value="{{$expedie[0]->estudiantes_id}}">
                <div class="table-responsive">
                    <div class="dataTables_scroll">
                        <div class="dataTables_scrollHead"
                            style="overflow: hidden; position: relative; border: 0px; width: 100%;">
                            <div class="dataTables_scrollHeadInner"
                                style="box-sizing: content-box; width: 1201.52px; padding-right: 0px;">
                                <table data-kt-filemanager-table="folders"
                                    class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer"
                                    style="margin-left: 0px; width: 1201.52px;">
                                    <thead>
                                        <!--begin::Table row-->
                                        <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                            <th class="w-10px pe-2 sorting_disabled" rowspan="1" colspan="1"
                                                style="width: 29.2383px;">
                                                <div
                                                    class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                                    <input class="form-check-input" type="checkbox" data-kt-check="true"
                                                        data-kt-check-target="#kt_file_manager_list .form-check-input"
                                                        value="1">
                                                </div>
                                            </th>
                                            <th class="min-w-250px sorting_disabled" rowspan="1" colspan="1"
                                                style="width: 80.3125px;">Código</th>
                                            <th class="min-w-10px sorting_disabled" rowspan="1" colspan="1"
                                                style="width: 306px;">Nombre del archivo</th>

                                            <th class="w-125px sorting_disabled" rowspan="1" colspan="1"
                                                style="width: 124.883px;"></th>
                                        </tr>
                                        <!--end::Table row-->
                                    </thead>
                                </table>
                            </div>
                        </div>
                        <div class="dataTables_scrollBody"
                            style="position: relative; overflow: auto; max-height: 700px; width: 100%;">
                            <table id="kt_file_manager_list" data-kt-filemanager-table="folders"
                                class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer"
                                style="width: 100%;">


                                <!--end::Table head-->
                                <!--begin::Table body -->
                                <tbody class="fw-bold text-gray-600" id="list_files_ing_sistemas" >

                                </tbody>
                                <!--end::Table body-->
                            </table>
                        </div>

                    </div>

                </div>
                <div class="row border-to-grey pt-3">
                    <div class="col-9 col-md-8 ">
                        <span  class="text-muted px-2" id="total_registros_files_operacion"></span><small>Regístros</small>

                    </div>
                    <div class="col-4 col-md-4">
                      <div id="option-pagination" class="info-block">
                        <nav aria-label="...">
                          <ul class="pagination pagination-primary page-iten-operacion_file ">

                          </ul>
                        </nav>
                      </div>
                    </div>

                  </div>
                <div class="row">
                    <div
                        class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start">
                    </div>
                    <div class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end">
                    </div>
                </div>
            </div>
            <!--end::Table-->
        </div>
        <!--end::Card body-->
        <div class="card-footer">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{route('expedientes.administracion.index')}}" id="btn-guardar-all-files-ing-sistema" class="btn btn-success">Ir a lista</a>
                </div>
            </div>
        </div>
    </div>
@include('expedientes.ing-sistema.form-add-file')

    @push('scripts')
    <script src="{{asset('assets/js/sweet-alert/sweetalert.min.js')}}"></script>
        <script src="{{asset('js/axios.min.js')}}"></script>
        <script>
        $(document).ready(function(){
        // $('#kt_file_manager_new_folder').hide();


        get_files_ing_system($('#id_estudiante').val(),"");
        $('#id_estudiantes').val({{$expedie[0]->estudiantes_id}})
        $("#selet_code").select2({
            dropdownParent: $("#kt_modal_new_target"),
            // placeholder:"hhhhh"
        });
        });
        $('#select_estudiente').on('change',(e)=>{
            $('#kt_file_manager_new_folder').show();
            $('#box-all-file-ing-sistem').show(100);
                let id_estudiante = $('#select_estudiente').val();
                console.log(id_estudiante);
                $('#id_estudiantes').val(id_estudiante)
                get_files_ing_system(id_estudiante,"");
         });


            $('#btn_add_files_expedientes').on('click',(e)=>{
                e.preventDefault();


            var url = document.getElementById('url_add_file_ing_sistema');
            var formData = new FormData(document.getElementById("form-file-expediente-ing-sistema"));
            $('#btn_loader').addClass('fa fa-spin fa-spinner');
            $.ajax({
                url: url.value,
                type: "post",
                dataType: "html",
                data: formData,
                cache: false,
                contentType: false,
                processData: false
            }).done(function(res){
                msg = JSON.parse(res)
                console.log(msg);
                if (msg.status ==200) {
                    $('#description').val("");
                    $('#name').val("");
                    $('#file').val(null);
                    get_files_ing_system($('#id_estudiantes').val());
                    // $('.modal_file').modal('hide');
                    $('#kt_modal_new_target_cancel').click();

                    $('#file').removeClass('is-invalid');
                    $('#error-file').text("")
                }else{
                    if (msg.campo=='file') {
                        $('#file').addClass('is-invalid');
                        $('#error-file').text("Debes seleccionar un archivo")
                    }else{
                        $('#file').removeClass('is-invalid');
                    $('#error-file').text("")
                    }


                    if (msg.campo=='code') {
                        $('#code').addClass('is-invalid');
                        $('#error-code').text("El codigo ya existe")
                    }else{
                        $('#file').removeClass('is-invalid');
                    $('#error-file').text("")
                    }

                    $('#msg_file').text(msg.error);
                    $('#btn_loader').removeClass('fa fa-spin fa-spinner');
                }
                $('#btn_loader').removeClass('fa fa-spin fa-spinner');
            }).fail(function(res){
                console.log(res)
            });

             });

             $('#btn-guardar-all-files-ing-sistema').on('click',(e)=>{
                 console.log("holasss");
             });

        function get_files_ing_system(id,num="") {
            var valor = (num=="")?1:num;
            const sendGetRequest = async () => {
                try {
                        const resp = await axios.get("/expedientes/sistemas/"+id+"/get_files_ing_sistemas?page="+valor);
                        console.log(resp.data);
                        var table = "";

                        if (resp.data.data=="") {
                            table+=' <tr class="iten">';
                            table+='<td colspan="4" class="text-center"> <h3 class="text-muted">Sin Archivos</h3>  </td> ';
                            table+=' </tr>';
                        }else{
                        for (let i = 0; i < resp.data.data.length; i++) {


                            table+=' <tr class="iten">';

                            table+='<td>';
                            table+='<div class="form-check form-check-sm form-check-custom form-check-solid">';
                            table+='<input class="form-check-input" type="checkbox" value="1">';
                            table+='</div>';
                            table+='</td>';

                            table+='<td>'+resp.data.data[i].code+'</td>'
                            table+=`
                            <td>
                                <span class="svg-icon svg-icon-2x svg-icon-primary me-4">
							        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
										<path opacity="0.3" d="M19 22H5C4.4 22 4 21.6 4 21V3C4 2.4 4.4 2 5 2H14L20 8V21C20 21.6 19.6 22 19 22Z" fill="currentColor"></path>
											<path d="M15 8H20L14 2V7C14 7.6 14.4 8 15 8Z" fill="currentColor"></path>
											</svg>
									</span>
                            <a href="${resp.data.data[i].file_url}"  target="_blank" class="text-gray-800 text-hover-primary">${resp.data.data[i].name}</a>
                         </td>
                            `;
                            table+=`<td class="text-end">
                                <div class="d-flex justify-content-end flex-shrink-0">

									<a href="javascript:void(0)" onclick="delet_file(${resp.data.data[i].id},${resp.data.data[i].estudiantes_id});" title="Eliminar archivo" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
										<span class="svg-icon svg-icon-3">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
												<path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor"></path>
												<path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor"></path>
												<path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor"></path>
											</svg>
										</span>
									</a>
								</div>
                            </td>`;

                            table+=' </tr>';

                        }

                            $("#view_vacio_files_operacion").hide();
                        }

                        var x="";
                            for (let d = 0; d < resp.data.links.length; d++) {
                            var r= resp.data.current_page-1;
                            if (resp.data.links[d].url==null) {
                                x+='<li class="page-item previous disabled"><a class="page-link page-endorsement-ope page-link-endorsement-previous-ope" href="javascript:void(0)" data-page="1" >Atras</a></li>';
                                break;
                            }else{
                                x+='<li class="page-item "><a class="page-link page-endorsement-ope page-link-endorsement-previous-ope" href="javascript:void(0)" data-page="'+r+'" >Atras</a></li>';
                                break;
                            }
                            }
                            for (let j = 1; j <= resp.data.last_page; j++) {
                            if (resp.data.current_page==j) {
                            x+='<li class="page-item active"><a class="page-link" href="javascript:void(0)">'+j+'<span class="sr-only">(current)</span></a></li>';
                            }else{
                            x+='<li class="page-item  page-link-endorsements-ope page-endorsement-ope-'+j+'"><a data-page="'+j+'" class="page-link page-endorsement-ope" href="javascript:void(0)">'+j+'</a></li>';

                            }

                            }
                            var s= resp.data.current_page+1;

                            if (resp.data.current_page>=resp.data.last_page) {
                            x+='<li class="page-item next disabled"><a data-page="" class="page-link page-endorsement-ope page-link-endorsement-next-ope" href="javascript:void(0)">Siguiente</a></li>';

                            }else{
                            x+='<li class="page-item next "><a data-page="'+s+'" class="page-link page-endorsement-ope page-link-endorsement-next-ope" href="javascript:void(0)">Siguiente</a></li>';
                            }
                        $(".page-iten-operacion_file").html(x);
                        $("#total_registros_files_operacion").text(resp.data.total);
                        $("#list_files_ing_sistemas").html(table);



                $('.page-endorsement-ope').on('click', function () {
                    const page = $(this).data( 'page' )
                                console.log(page);
                                console.log(resp.data.last_page);
                                $('.page-link-endorsements-ope').removeClass('active')
                                $('.page-endorsement-ope-'+page).addClass('active')

                                if((page-1) < 1 ){
                                    $('.page-link-endorsement-previous-ope').data('page', 1)
                                    $('.page-link-endorsement-next-ope').data('page', 2)
                                }else if ((page+1) <= resp.data.last_page ) {
                                    $('.page-link-endorsement-next-ope').data('page', page+1)
                                    $('.page-link-endorsement-previous-ope').data('page', page-1)
                                }else if((page+1) > resp.data.last_page ){
                                    $('.page-link-endorsement-next-ope').data('page', resp.data.last_page)
                                    $('.page-link-endorsement-previous-ope').data('page', resp.data.last_page-1)
                                }
                                get_files_ing_system(id,page);

                });


                    } catch (err) {
                        console.log(err);
                    }
                };
                sendGetRequest();
            }

            function delet_file(id,id_estudiante) {
                console.log(id);
                        swal({
                            title: "Estas seguro?",
                                        text: "Deseas eliminar el archivo?",
                                        icon: "warning",
                                        buttons: true,
                                        dangerMode: true,
                                    })
                                    .then((willDelete) => {
                                        if (willDelete) {
                                            const sendGetRequest = async () => {
                                                try {
                                                    const resp = await axios.delete("/expedientes/delete_file_ing_sistemas/"+id);
                                                    console.log(resp);
                                                    if (resp.data.status==200) {
                                                        get_files_ing_system(id_estudiante);
                                                        messeg(resp.data.success,'success');
                                                    }

                                                } catch (err) {
                                                    // Handle Error Here
                                                }
                                            };
                                            sendGetRequest();
                                        }
                                    })

            }
        </script>
                {{-- <script src="/m2/assets/plugins/global/plugins.bundle.js"></script> --}}
                <script src="/m2/assets/js/scripts.bundle.js"></script>
                <!--end::Global Javascript Bundle-->
                <!--begin::Page Vendors Javascript(used by this page)-->
                {{-- <script src="/m2/assets/plugins/custom/datatables/datatables.bundle.js"></script> --}}
                <!--end::Page Vendors Javascript-->
                <!--begin::Page Custom Javascript(used by this page)-->
                <script src="/m2/assets/js/custom/apps/user-management/users/list/table.js"></script>
                <script src="/m2/assets/js/custom/apps/user-management/users/list/export-users.js"></script>
                <script src="/m2/assets/js/custom/apps/user-management/users/list/add.js"></script>
                <script src="/m2/assets/js/widgets.bundle.js"></script>
                <script src="/m2/assets/js/custom/widgets.js"></script>
                <script src="/m2/assets/js/custom/apps/chat/chat.js"></script>
                <script src="/m2/assets/js/custom/intro.js"></script>
                <script src="/m2/assets/js/custom/utilities/modals/upgrade-plan.js"></script>
                <script src="/m2/assets/js/custom/utilities/modals/create-app.js"></script>
                <script src="/m2/assets/js/custom/utilities/modals/users-search.js"></script>
    @endpush
@endsection
