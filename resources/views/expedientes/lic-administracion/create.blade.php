@extends('layouts.app')
@push('css')
    <style>

    </style>
@endpush
@section('content')
    <div class="card">
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder text-dark">Creación De Expedientes - Lic. Administración</span>
                <span class="text-muted mt-1 fw-bold fs-7">Los campos son requerido</span>
            </h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="mb-10" data-select2-id="select2-data-100-kjmd">
                        <label for="" class="form-label">Selecciona El Estudiante</label>
                        <!--begin::Default example-->
                        <div class="input-group flex-nowrap">
                            <span class="input-group-text">
                                <i class="bi bi-bookmarks-fill fs-4"></i>
                            </span>
                            <div class="flex-grow-1" data-select2-id="select2-data-99-jk2x">
                                <select class="form-select rounded-start-0" data-control="select2"
                                    data-placeholder="Seleccionar estudiante" id="select_estudiente">
                                    <option></option>
                                    @foreach ($estudiantes as $value)
                                        <option value="{{$value->id}}">V-{{$value->cedula}} - {{$value->nombres." ".$value->primer_apellido." ".$value->segundo_apellido}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!--end::Default example-->
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div id="box-all-file-ing-sistem" style="display: none;" class="card card-flush">
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
                    <a href="{{route('expedientes.administracion.index')}}" id="btn-guardar-all-files-ing-sistema" class="btn btn-success" style="left: 40%; align-items: center; position: relative;">Guardar</a>
                </div>
            </div>
        </div>
    </div>
@include('expedientes.ing-sistema.form-add-file')

    @push('scripts')

    <script src="{{ asset('assets/js/notify/bootstrap-notify.min.js') }}"></script>
        <script src="{{asset('js/axios.min.js')}}"></script>
        <script>
        $(document).ready(function(){
        $('#kt_file_manager_new_folder').hide();
        $("#selet_code").select2({
            dropdownParent: $("#kt_modal_new_target"),
            // placeholder:"hhhhh"
        });
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
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><path opacity="0.3" d="M10 4H21C21.6 4 22 4.4 22 5V7H10V4Z" fill="currentColor"></path>
                                     <path
                                                    d="M9.2 3H3C2.4 3 2 3.4 2 4V19C2 19.6 2.4 20 3 20H21C21.6 20 22 19.6 22 19V7C22 6.4 21.6 6 21 6H12L10.4 3.60001C10.2 3.20001 9.7 3 9.2 3Z"
                                                    fill="currentColor"></path>
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
        </script>
                {{-- <script src="/metronic8/demo1/assets/plugins/global/plugins.bundle.js"></script>
                <script src="/metronic8/demo1/assets/js/scripts.bundle.js"></script>
                <!--end::Global Javascript Bundle-->
                <!--begin::Page Vendors Javascript(used by this page)-->
                <script src="/metronic8/demo1/assets/plugins/custom/datatables/datatables.bundle.js"></script>
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
                <script src="/m2/assets/js/custom/utilities/modals/users-search.js"></script> --}}
    @endpush
@endsection
