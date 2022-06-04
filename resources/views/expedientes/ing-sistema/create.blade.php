@extends('layouts.app')
@push('css')
    <style>

    </style>
@endpush
@section('content')
    <div class="card">
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder text-dark">Creación De Expedientes - Ingenieria De Sistemas</span>
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
                                    data-placeholder="Seleccionar estudiante">
                                    <option></option>
                                    <option value="1">v-1554545211 - Pedro rojas</option>
                                    <option value="2">Nancy palma</option>
                                    <option value="3">Bonifacio</option>>
                                </select>
                            </div>
                        </div>
                        <!--end::Default example-->
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="card card-flush">
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
                        class="form-control form-control-solid w-500px ps-15" placeholder="Search Files &amp; Folders">
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
                        <!--end::Svg Icon-->New Folder
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
                                <!--begin::Table body-->
                                <tbody class="fw-bold text-gray-600">
                                    <tr class="odd">
                                        <td>
                                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                                <input class="form-check-input" type="checkbox" value="1">
                                            </div>
                                        </td>
                                        <td>
                                         wweewew
                                        </td>
                                        <td>   <span class="svg-icon svg-icon-2x svg-icon-primary me-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <path opacity="0.3" d="M10 4H21C21.6 4 22 4.4 22 5V7H10V4Z"
                                                    fill="currentColor"></path>
                                                <path
                                                    d="M9.2 3H3C2.4 3 2 3.4 2 4V19C2 19.6 2.4 20 3 20H21C21.6 20 22 19.6 22 19V7C22 6.4 21.6 6 21 6H12L10.4 3.60001C10.2 3.20001 9.7 3 9.2 3Z"
                                                    fill="currentColor"></path>
                                            </svg>
                                        </span><a href="?page=apps/file-manager/blank"
                                            class="text-gray-800 text-hover-primary">bgbiughk</a>
                                        </td>
                                        <td data-kt-filemanager-table="action_dropdown" class="text-end">
                                            <div class="d-flex justify-content-end">

                                                <!--begin::More-->
                                                <div class="ms-2">
                                                    <button type="button"
                                                        class="btn btn-sm btn-icon btn-light btn-active-light-primary"
                                                        data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                                        <!--begin::Svg Icon | path: icons/duotune/general/gen052.svg-->
                                                        <span class="svg-icon svg-icon-5 m-0">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                                viewBox="0 0 24 24" fill="none">
                                                                <rect x="10" y="10" width="4" height="4" rx="2"
                                                                    fill="currentColor"></rect>
                                                                <rect x="17" y="10" width="4" height="4" rx="2"
                                                                    fill="currentColor"></rect>
                                                                <rect x="3" y="10" width="4" height="4" rx="2"
                                                                    fill="currentColor"></rect>
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                    </button>
                                                    <!--begin::Menu-->
                                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-150px py-4"
                                                        data-kt-menu="true">
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <a href="#" class="menu-link px-3">Download File</a>
                                                        </div>
                                                        <!--end::Menu item-->
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <a href="#" class="menu-link px-3"
                                                                data-kt-filemanager-table="rename">Rename</a>
                                                        </div>
                                                        <!--end::Menu item-->
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <a href="#" class="menu-link px-3"
                                                                data-kt-filemanager-table-filter="move_row"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#kt_modal_move_to_folder">Move to folder</a>
                                                        </div>
                                                        <!--end::Menu item-->
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <a href="#" class="menu-link text-danger px-3"
                                                                data-kt-filemanager-table-filter="delete_row">Delete</a>
                                                        </div>
                                                        <!--end::Menu item-->
                                                    </div>
                                                    <!--end::Menu-->
                                                </div>
                                                <!--end::More-->
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                                <!--end::Table body-->
                            </table>
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
                    <a href="#" class="btn btn-success">Ir al listado</a>
                </div>
            </div>
        </div>
    </div>
@include('expedientes.ing-sistema.form-add-file')

    @push('scripts')
        <script src="/metronic8/demo1/assets/plugins/global/plugins.bundle.js"></script>
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
        <script src="/m2/assets/js/custom/utilities/modals/users-search.js"></script>
        <script>

        </script>
    @endpush
@endsection
