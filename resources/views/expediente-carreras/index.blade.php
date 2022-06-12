@extends('layouts.app')

@section('content')
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
                            <div class="fs-2hx fw-bolder">Unefa - Núcleo lara</div>
                            <div class="fs-4 fw-bold text-gray-400 mb-7">Descargar la data de todas las carreras aquí</div>
                            <!--end::Heading-->
                            <div class="row">
                                <div class="col-md-12">

                                    <a href="#" class="btn btn-sm btn-light-success fw-bolder ms-2 fs-5 py-1 px-3">
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
                                        Descargar Data</a>
                                </div>
                            </div>
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card-->

        <!--begin::Row-->
        <div class="row g-6 g-xl-9">

            <!--begin::Col-->
            <div class="col-md-6 col-xl-4">
                <!--begin::Card-->
                <div class="card border-hover-primary">

                    <!--begin:: Card body-->
                    <div class="card-body p-9">
                        <!--begin::Name-->
                        <div class="fs-3 fw-bolder text-dark">Ingeniería de sistemas</div>
                        <!--end::Name-->
                        <!--begin::Description-->
                        <p class="text-gray-400 fw-bold fs-5 mt-1 mb-7">Código: 2613</p>
                        <!--end::Description-->
                        <!--begin::Info-->


                    </div>
                    <!--end:: Card body-->
                </div>
                <!--end::Card-->
                <div class="card-footer">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <a href="#" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss-="click" title="Descarga la data completa de la carrera Ingenieria de sistemas, se descargara un archivo .zip" class="btn btn-sm btn-flex btn-light btn-active-primary fw-bolder" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->
                                <i class="fa-solid fa-cloud-arrow-down"></i>
                                <!--end::Svg Icon-->Descargar Data</a>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Col-->
        </div>
        <!--end::Row-->


    </div>
    <!--end::Container-->

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
</script>

@endpush
@endsection
