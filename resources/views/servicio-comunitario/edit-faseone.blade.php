@extends('layouts.app')
@push('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/sweetalert2.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('m2/assets/plugins/global/plugins.bundle.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/js/notify/bootstrap-notify.min.js')}}">

@endpush
@section('content')
    <div class="card">
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder text-dark">Servicio Comunitario - Edición De Grupo </span>
                <span class="text-muted mt-1 fw-bold fs-7">Los campos son requerido</span>
            </h3>
        </div>
        <div class="card-body pb-0">
            <div class="row">
                <div class="col-12 col-md-12">
                    <input type="hidden" value="{{$grupo->id}}" id="id_grupo_hiden">
                    <div class="mb-5" data-select2-id="select2-data-100-kjmd">
                        <label for="" class="form-label">Selecciona El Profesor</label>
                        <!--begin::Default example-->
                        <div class="input-group flex-nowrap">
                            <span class="input-group-text">
                                <i class="bi bi-bookmarks-fill fs-4"></i>
                            </span>
                            <div class="flex-grow-1" data-select2-id="select2-data-99-jk2x">
                                <select class="form-select rounded-start-0 " data-control="select2"
                                    data-placeholder="Seleccionar Profesor" id="select_profesor">
                                    <option></option>
                                    @foreach ($profesor as $value)
                                        <option  @if ($grupo->profesore_id == $value->id) selected    @endif value="{{$value->id}}">V-{{$value->cedula}} - {{$value->nombres." ".$value->primer_apellido." ".$value->segundo_apellido}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!--end::Default example-->
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-5">
                        <label for="exampleFormControlInput1" class="required form-label">Nombre Del Proyecto</label>
                        <div class="input-group flex-nowrap">
                            <span class="input-group-text">
                                {{-- <i class="bi bi-bookmarks-fill fs-4"></i> --}}
                                <i class="fa-solid fa-layer-group fs-4"></i>

                            </span>
                            <div class="flex-grow-1" data-select2-id="select2-data-99-jk2x">
                                <input type="email" class="form-control " id="nombre_proyecto" value="{{$grupo->nombre_proyecto}}" placeholder="Ingresar el nombre del proyecto"/>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div id="box-all-file-ing-sistem"  class="">
                <!--begin::Card header-->
                <div class="card-header pt-0 px-0 ">
                    <div class="card-title">
                        <div class="mb-10" data-select2-id="select2-data-100-kjmd">
                            <label for="" class="form-label">Selecciona El Estudiante</label>
                            <!--begin::Default example-->
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text">
                                    <i class="bi bi-bookmarks-fill fs-4"></i>
                                </span>
                                <div class="flex-grow-1 " data-select2-id="select2-data-99-jk2x">
                                    <select class="form-select rounded-start-0 w-600px " data-control="select2"
                                        data-placeholder="Seleccionar Estudiante" id="id_estudiante_select">
                                        <option></option>
                                        @foreach ($estudiantes as $value)
                                            <option value="{{$value->id}}">{{$value->cedula}} - {{$value->nombres." ".$value->primer_apellido." ".$value->segundo_apellido}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!--end::Default example-->
                        </div>
                    </div>
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">
                        <!--begin::Toolbar-->
                        <div class="d-flex justify-content-end" data-kt-filemanager-table-toolbar="base">
                            <!--begin::Export-->
                            <button  type="button" class="btn btn-light-primary me-3" id="btn_add_student">
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
                                <!--end::Svg Icon-->
                                Agregar
                            </button>
                            <!--end::Export-->
                        </div>
                        <!--end::Toolbar-->

                    </div>
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body px-1">

                    <!--begin::Table-->
                    <div id="kt_file_manager_list_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="table-responsive">
                            <div class="dataTables_scroll">
                                <span class="card-label fw-bold text-dark">Lista De Estudiantes</span>
                                <div class="dataTables_scrollHead"
                                    style="overflow: hidden; position: relative; border: 0px; width: 100%;">
                                    <div class="dataTables_scrollHeadInner"
                                        style="box-sizing: content-box; width: 100%; padding-right: 0px;">
                                        <table data-kt-filemanager-table="folders"
                                            class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer"
                                            style="margin-left: 0px; width: 100%;">
                                            <thead>
                                                <!--begin::Table row-->
                                                <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">

                                                    <th class="min-w-250px sorting_disabled"
                                                        style="width: 80.3125px;">Cedula</th>
                                                    <th class="min-w-10px sorting_disabled"
                                                        style="width: 306px;">Estudiante</th>

                                                    <th class="sorting_disabled"
                                                       ></th>
                                                </tr>
                                                <!--end::Table row-->
                                            </thead>
                                            <tbody class="fw-bold text-gray-600 list_files_ing_sistemas" id="list_files_ing_sistemas" >
                                                {{-- <tr class="iten">
                                                    <td>213213231</td>
                                                    <td>asdsaddas</td>
                                                    <td class="text-end">
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
                                                    </td>
                                                </tr> --}}
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="row border-to-grey pt-3">
                            <div class="col-9 col-md-8 ">
                                <span  class="text-muted px-2" id="total_registros_files_operacion"></span><small>Regístros</small>

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
                            <a href="javascript:void(0);" id="btn-guardar-all-files-ing-sistema" class="btn btn-success" style="left: 40%; align-items: center; position: relative;">Editar Grupo</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script src="{{asset('assets/js/sweet-alert/sweetalert.min.js')}}"></script>
    <script src="{{ asset('assets/js/notify/bootstrap-notify.min.js') }}"></script>
                    {{-- <script src="/m2/assets/plugins/global/plugins.bundle.js"></script> --}}
                {{-- <script src="/m2/assets/js/scripts.bundle.js"></script> --}}
                <!--end::Global Javascript Bundle-->
                <!--begin::Page Vendors Javascript(used by this page)-->
                <script src="/m2/assets/plugins/custom/datatables/datatables.bundle.js"></script>
                <!--end::Page Vendors Javascript-->
                <!--begin::Page Custom Javascript(used by this page)-->
                {{-- <script src="/m2/assets/js/custom/apps/user-management/users/list/table.js"></script>
                <script src="/m2/assets/js/custom/apps/user-management/users/list/export-users.js"></script>
                <script src="/m2/assets/js/custom/apps/user-management/users/list/add.js"></script>
                <script src="/m2/assets/js/widgets.bundle.js"></script>
                <script src="/m2/assets/js/custom/widgets.js"></script>
                <script src="/m2/assets/js/custom/apps/chat/chat.js"></script>
                <script src="/m2/assets/js/custom/intro.js"></script>
                <script src="/m2/assets/js/custom/utilities/modals/upgrade-plan.js"></script>
                <script src="/m2/assets/js/custom/utilities/modals/create-app.js"></script>
                <script src="/m2/assets/js/custom/utilities/modals/users-search.js"></script> --}}
        <script src="{{asset('js/axios.min.js')}}"></script>
        <script src="{{asset('m2/assets/plugins/global/plugins.bundle.js')}}"></script>
        <script>
        $(document).ready(function(){
        // $('#kt_file_manager_new_folder').hide();
        $("#selet_code").select2({
            dropdownParent: $("#kt_modal_new_target"),
            // placeholder:"hhhhh"
        });
            list_temp_student();
        });

function messeg(m,t) {
    if (t=="success") {
        $.notify(
            '<i class="fa fa-bell-o"></i><strong>Excelente</strong> ' +m+
                "",
            {
                type: t,
                allow_dismiss: true,
                delay: 2000,
                showProgressbar: false,
                timer: 300,
            }
        );
        return false;
    }
    $.notify(
        '<i class="fa fa-bell-o"></i><strong>!Hoops¡</strong> ' +m+
            "",
        {
            type: t,
            allow_dismiss: true,
            delay: 2000,
            showProgressbar: false,
            timer: 300,
        }
    );
}


        $('#btn_add_student').on('click',(e)=>{
            const data = {
                id_estudiante:$('#id_estudiante_select').val(),
                id_grupo:$('#id_grupo_hiden').val()
            }
            if(data.id_estudiante==""){
                $('#id_estudiante_select').addClass('is-invalid');
            }else{
                $('#id_estudiante_select').removeClass('is-invalid');
            }
            if(data.id_estudiante==""){
                return false;
            }
            console.log("Hola");
            const sendPostRequest = async () => {
                try {
                    const resp = await axios.post(base_url()+"/servicio-comunitario/faseone/estudent/edit",data);
                    console.log(resp.data);
                    if (resp.data.status == 200) {
                        messeg(resp.data.message,'success');
                        list_temp_student();
                    }else{
                        messeg(resp.data.message,'danger');
                    }


                } catch (err) {
                    // Handle Error Here
                }
            };
            sendPostRequest();
        });

        function list_temp_student() {
            let id_grupo = $('#id_grupo_hiden').val();
            const sendGetRequest = async () => {
                try {
                    const resp = await axios.get(base_url()+"/servicio-comunitario/faseone/estudent/list_student/"+id_grupo);

                    var table = "";
                    console.log(resp.data);
                    if (resp.data=="") {
                            table+=' <tr class="iten">';
                            table+='<td colspan="4" class="text-center"> <h3 class="text-muted">Sin Información</h3>  </td> ';
                            table+=' </tr>';
                    }else{
                        // console.log(resp.data);
                        for (let i = 0; i < resp.data.length; i++) {

                            table+=' <tr class="iten">';

                            table+='<td>'+resp.data[i].cedula+'</td>'
                            table+=`
                            <td>

                                <a href="#"  target="_blank" class="text-gray-800 text-hover-primary">${resp.data[i].nombres} ${resp.data[i].primer_apellido} ${resp.data[i].segundo_apellido}</a>
                            </td> `;
                            table+=`<td class="text-end">
                                <div class="d-flex justify-content-end flex-shrink-0">

                                    <a href="javascript:void(0)" onclick="delet_file(${resp.data[i].estudiantes_id});" title="Eliminar Estudiante" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
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
                    }
                    console.log("Hola");
                    $(".list_files_ing_sistemas").html(table);
                } catch (err) {
                    // Handle Error Here
                }
            };
            sendGetRequest();
        }

        $('#select_estudiente').on('change',(e)=>{
                let id_estudiante = $('#select_estudiente').val();
                console.log(id_estudiante);
                $('#id_estudiantes').val(id_estudiante)
                get_files_ing_system(id_estudiante,"");
                console.log("hola");
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
                    messeg(msg.success,'success');
                    $('#file').removeClass('is-invalid');
                    $('#error-file').text("")
                }else{
                    if (msg.campo=='file') {
                        $('#file').addClass('is-invalid');
                        $('#error-file').text("Debes seleccionar un archivo")
                        messeg("Debes seleccionar un archivo",'danger');
                    }else{
                        $('#file').removeClass('is-invalid');

                        $('#error-file').text("")
                    }


                    if (msg.campo=='code') {
                        $('#code').addClass('is-invalid');
                        $('#error-code').text("El codigo del archivo ya existe")
                        messeg("El codigo ya existe",'danger');
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
                //  console.log("holasss");
                 const data = {
                    id_grupo: $('#id_grupo_hiden').val(),
                    profesor: $('#select_profesor').val(),
                    nombre_proyecto: $('#nombre_proyecto').val(),
                 }
                 console.log(data);
                 const sendPostRequest = async () => {
                try {
                        const resp = await axios.post(base_url()+"/servicio-comunitario/faseone/update",data);
                        console.log(resp.data);
                        if (resp.data.status == 200) {
                            // list_temp_student();
                            console.log("Hola");
                            url = "{{route('serviciocomunitario.listfaseone')}}";
                            $(location).attr('href',url);
                            messeg(resp.data.message,'success');
                        }else{
                            messeg(resp.data.message,'danger');
                        }


                    } catch (err) {
                        // Handle Error Here
                    }
                };
                sendPostRequest();
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

									<a href="javascript:void(0)" onclick="delet_file(${resp.data[i].id},${resp.data.data[i].estudiantes_id});" title="Eliminar archivo" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
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
                        // $("#list_files_ing_sistemas").html(table);



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

            function delet_file(id_estudiante) {
                console.log(id_estudiante);
                        swal({
                            title: "Estas seguro?",
                                        text: "Deseas eliminar el estudiante?",
                                        icon: "warning",
                                        buttons: true,
                                        dangerMode: true,
                                    })
                                    .then((willDelete) => {
                                        if (willDelete) {
                                            const sendGetRequest = async () => {
                                                try {
                                                    const resp = await axios.delete(base_url()+"/servicio-comunitario/delete_student/"+id_estudiante);
                                                    console.log(resp);
                                                    if (resp.data.status==200) {
                                                        list_temp_student();
                                                        messeg(resp.data.message,'success');
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

    @endpush
@endsection
