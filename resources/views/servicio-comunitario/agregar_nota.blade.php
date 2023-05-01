@extends('layouts.app')
@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/sweetalert2.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('m2/assets/plugins/global/plugins.bundle.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/js/notify/bootstrap-notify.min.js') }}">
@endpush
@section('content')

    <div id="kt_app_content_container" class="app-container  container-xxl ">
        <div id="view_alert_error"></div>

        <input type="hidden" id="id_grupo_hide" value="{{$grupo->id}}">
        <!--begin::Navbar-->
        <div class="card mb-5 mb-xxl-8">
            <div class="card-header border-0 pt-5">
                <!--begin::Title-->
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bold fs-3 mb-1">Proyecto: {{$grupo->nombre_proyecto}}</span>

                </h3>
                <!--end::Title-->

            </div>
            <div class="card-body pt-9 pb-0">
                <!--begin::Details-->
                <div class="d-flex flex-wrap flex-sm-nowrap">
                    <!--begin: Pic-->
                    <div class="me-7 mb-4">
                        <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                            <img src="{{ asset('icon_profesor.png') }}" alt="image">

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
                                    <a href="#" class="text-gray-900 text-hover-primary fs-2 fw-bold me-1">CI: {{$profesor->cedula}} | {{$profesor->nombre}} {{$profesor->primer_apellido}} {{$profesor->segundo_apellido}}</a>

                                </div>
                                <!--end::Name-->

                                <!--begin::Info-->
                                <div class="d-flex flex-wrap fw-semibold fs-6 mb-4 pe-2">
                                    <a href="#"
                                        class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                                        <!--begin::Svg Icon | path: icons/duotune/communication/com006.svg-->
                                        <span class="svg-icon svg-icon-4 me-1"><svg width="18" height="18"
                                                viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path opacity="0.3"
                                                    d="M16.5 9C16.5 13.125 13.125 16.5 9 16.5C4.875 16.5 1.5 13.125 1.5 9C1.5 4.875 4.875 1.5 9 1.5C13.125 1.5 16.5 4.875 16.5 9Z"
                                                    fill="currentColor"></path>
                                                <path
                                                    d="M9 16.5C10.95 16.5 12.75 15.75 14.025 14.55C13.425 12.675 11.4 11.25 9 11.25C6.6 11.25 4.57499 12.675 3.97499 14.55C5.24999 15.75 7.05 16.5 9 16.5Z"
                                                    fill="currentColor"></path>
                                                <rect x="7" y="6" width="4" height="4"
                                                    rx="2" fill="currentColor"></rect>
                                            </svg>
                                        </span>
                                        {{$profesor->especialidad}}
                                    </a>

                                    <a href="#"
                                        class="d-flex align-items-center text-gray-400 text-hover-primary mb-2">
                                        <!--begin::Svg Icon | path: icons/duotune/communication/com011.svg-->
                                        <span class="svg-icon svg-icon-4 me-1"><svg width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path opacity="0.3"
                                                    d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19Z"
                                                    fill="currentColor"></path>
                                                <path
                                                    d="M21 5H2.99999C2.69999 5 2.49999 5.10005 2.29999 5.30005L11.2 13.3C11.7 13.7 12.4 13.7 12.8 13.3L21.7 5.30005C21.5 5.10005 21.3 5 21 5Z"
                                                    fill="currentColor"></path>
                                            </svg>
                                        </span>
                                        {{$profesor->email}}
                                    </a>
                                </div>
                                <!--end::Info-->
                            </div>
                            <!--end::User-->

                            {{-- <!--begin::Actions-->
                            <div class="d-flex my-4">
                                <a href="#" class="btn btn-sm btn-light me-2" id="kt_user_follow_button">
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr012.svg-->
                                    <span class="svg-icon svg-icon-3 d-none"><svg width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.3"
                                                d="M10 18C9.7 18 9.5 17.9 9.3 17.7L2.3 10.7C1.9 10.3 1.9 9.7 2.3 9.3C2.7 8.9 3.29999 8.9 3.69999 9.3L10.7 16.3C11.1 16.7 11.1 17.3 10.7 17.7C10.5 17.9 10.3 18 10 18Z"
                                                fill="currentColor"></path>
                                            <path
                                                d="M10 18C9.7 18 9.5 17.9 9.3 17.7C8.9 17.3 8.9 16.7 9.3 16.3L20.3 5.3C20.7 4.9 21.3 4.9 21.7 5.3C22.1 5.7 22.1 6.30002 21.7 6.70002L10.7 17.7C10.5 17.9 10.3 18 10 18Z"
                                                fill="currentColor"></path>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                    <!--begin::Indicator label-->
                                    <span class="indicator-label">
                                        Follow</span>
                                    <!--end::Indicator label-->

                                    <!--begin::Indicator progress-->
                                    <span class="indicator-progress">
                                        Please wait... <span
                                            class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                    </span>
                                    <!--end::Indicator progress-->
                                </a>


                                <!--begin::Menu-->
                                <div class="me-0">
                                    <button class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary"
                                        data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                        <i class="bi bi-three-dots fs-3"></i>
                                    </button>

                                    <!--begin::Menu 3-->
                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-3"
                                        data-kt-menu="true">
                                        <!--begin::Heading-->
                                        <div class="menu-item px-3">
                                            <div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">
                                                Payments
                                            </div>
                                        </div>
                                        <!--end::Heading-->

                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3">
                                                Hola
                                            </a>
                                        </div>
                                        <!--end::Menu item-->

                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link flex-stack px-3">
                                                Create Payment

                                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                                    aria-label="Specify a target name for future usage and reference"
                                                    data-bs-original-title="Specify a target name for future usage and reference"
                                                    data-kt-initialized="1"></i>
                                            </a>
                                        </div>
                                        <!--end::Menu item-->

                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3">
                                                Generate Bill
                                            </a>
                                        </div>
                                        <!--end::Menu item-->

                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3" data-kt-menu-trigger="hover"
                                            data-kt-menu-placement="right-end">
                                            <a href="#" class="menu-link px-3">
                                                <span class="menu-title">Subscription</span>
                                                <span class="menu-arrow"></span>
                                            </a>

                                            <!--begin::Menu sub-->
                                            <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3">
                                                        Plans
                                                    </a>
                                                </div>
                                                <!--end::Menu item-->

                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3">
                                                        Billing
                                                    </a>
                                                </div>
                                                <!--end::Menu item-->

                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3">
                                                        Statements
                                                    </a>
                                                </div>
                                                <!--end::Menu item-->

                                                <!--begin::Menu separator-->
                                                <div class="separator my-2"></div>
                                                <!--end::Menu separator-->

                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <div class="menu-content px-3">
                                                        <!--begin::Switch-->
                                                        <label
                                                            class="form-check form-switch form-check-custom form-check-solid">
                                                            <!--begin::Input-->
                                                            <input class="form-check-input w-30px h-20px" type="checkbox"
                                                                value="1" checked="checked" name="notifications">
                                                            <!--end::Input-->

                                                            <!--end::Label-->
                                                            <span class="form-check-label text-muted fs-6">
                                                                Recuring
                                                            </span>
                                                            <!--end::Label-->
                                                        </label>
                                                        <!--end::Switch-->
                                                    </div>
                                                </div>
                                                <!--end::Menu item-->
                                            </div>
                                            <!--end::Menu sub-->
                                        </div>
                                        <!--end::Menu item-->

                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3 my-1">
                                            <a href="#" class="menu-link px-3">
                                                Settings
                                            </a>
                                        </div>
                                        <!--end::Menu item-->
                                    </div>
                                    <!--end::Menu 3-->
                                </div>
                                <!--end::Menu-->
                            </div>
                            <!--end::Actions--> --}}
                        </div>
                        <!--end::Title-->

                        <!--begin::Stats-->
                        <div class="d-flex flex-wrap flex-stack">
                            <!--begin::Wrapper-->
                            <div class="d-flex flex-column flex-grow-1 pe-8">
                                <!--begin::Stats-->
                                <div class="d-flex flex-wrap">
                                    <!--begin::Stat-->
                                    <div
                                        class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                        <!--begin::Number-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
                                            <span class="svg-icon svg-icon-3 svg-icon-success me-2"><svg width="24"
                                                    height="24" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <rect opacity="0.5" x="13" y="6" width="13"
                                                        height="2" rx="1" transform="rotate(90 13 6)"
                                                        fill="currentColor"></rect>
                                                    <path
                                                        d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
                                                        fill="currentColor"></path>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                            <div class="fs-2 fw-bold counted" data-kt-countup="true"
                                                data-kt-countup-value="4500" data-kt-countup-prefix="$"
                                                data-kt-initialized="1">{{$grupo->total_studiante}}</div>
                                        </div>
                                        <!--end::Number-->

                                        <!--begin::Label-->
                                        <div class="fw-semibold fs-6 text-gray-400">Estudiante</div>
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Stat-->


                                </div>
                                <!--end::Stats-->
                            </div>
                            <!--end::Wrapper-->


                        </div>
                        <!--end::Stats-->
                    </div>
                    <!--end::Info-->
                </div>
                <!--end::Details-->

                <!--begin::Navs-->
                <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold">
                    <!--begin::Nav item-->
                    <li class="nav-item mt-2">
                        <a class="nav-link text-active-primary ms-0 me-10 py-5 active"
                            href="#">
                            Lista De Estudiantes </a>
                    </li>
                    <!--end::Nav item-->

                </ul>
                <!--begin::Navs-->
            </div>
        </div>
        <!--end::Navbar-->
        <!--begin::Row-->
        <div class="row g-5 g-xxl-8">
            @foreach ($estudiantes as $val_student)
            <!--begin::Col-->
            <div class="col-xl-6 ">

                <!--begin::Feeds Widget 2-->
                <div id="card_all_studen{{$val_student->id}}" class="card mb-5 mb-xxl-8 ">
                    <!--begin::Alert-->
                    <div class="alert alert-primary d-flex align-items-center p-5 alert_not" id="aler_notas{{$val_student->id}}">
                        <!--begin::Icon-->
                        <span class="svg-icon svg-icon-2hx svg-icon-primary me-3"><i class="fa-solid fa-thumbs-up"></i></span>
                        <!--end::Icon-->

                        <!--begin::Wrapper-->
                        <div class="d-flex flex-column">
                            <!--begin::Title-->
                            <h4 class="mb-1 text-dark">!Exelente</h4>
                            <!--end::Title-->
                            <!--begin::Content-->
                            <span id="text_aler_nota{{$val_student->id}}"></span>
                            <!--end::Content-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Alert-->
                    <!--begin::Body-->
                    <div class="card-body pb-0">
                        <!--begin::Header-->
                        <div class="d-flex align-items-center mb-5">
                            <!--begin::User-->
                            <div class="d-flex align-items-center flex-grow-1">
                                <!--begin::Avatar-->
                                <div class="symbol symbol-60px me-5">
                                    <img src="{{ asset('logo_estudiantes.jpg') }}" alt="">
                                </div>
                                <!--end::Avatar-->
                                <!--begin::Info-->
                                <div class="d-flex flex-column">
                                    <a href="#" class="text-gray-900 text-hover-primary fs-6 fw-bold">CI: {{$val_student->cedula}} <br> {{$val_student->nombres}} {{$val_student->primer_apellido}} {{$val_student->segundo_apellido}}</a>

                                    <span class="text-gray-400 fw-bold">Carrera: {{$val_student->nombre_carrera}} </span>
                                </div>
                                <!--end::Info-->
                            </div>
                            <!--end::User-->

                            <!--begin::Menu-->
                            <div class="my-0">
                                {{-- <button type="button"
                                    class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary"
                                    data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen024.svg-->
                                    <span class="svg-icon svg-icon-2"><svg xmlns="http://www.w3.org/2000/svg"
                                            width="24px" height="24px" viewBox="0 0 24 24">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="5" y="5" width="5" height="5"
                                                    rx="1" fill="currentColor"></rect>
                                                <rect x="14" y="5" width="5" height="5"
                                                    rx="1" fill="currentColor" opacity="0.3"></rect>
                                                <rect x="5" y="14" width="5" height="5"
                                                    rx="1" fill="currentColor" opacity="0.3"></rect>
                                                <rect x="14" y="14" width="5" height="5"
                                                    rx="1" fill="currentColor" opacity="0.3"></rect>
                                            </g>
                                        </svg></span>
                                    <!--end::Svg Icon-->
                                </button> --}}

                                <!--begin::Menu 2-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px"
                                    data-kt-menu="true">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <div class="menu-content fs-6 text-dark fw-bold px-3 py-4">Quick Actions</div>
                                    </div>
                                    <!--end::Menu item-->

                                    <!--begin::Menu separator-->
                                    <div class="separator mb-3 opacity-75"></div>
                                    <!--end::Menu separator-->

                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3">
                                            New Ticket
                                        </a>
                                    </div>
                                    <!--end::Menu item-->

                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3">
                                            New Customer
                                        </a>
                                    </div>
                                    <!--end::Menu item-->


                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3">
                                            New Contact
                                        </a>
                                    </div>
                                    <!--end::Menu item-->

                                    <!--begin::Menu separator-->
                                    <div class="separator mt-3 opacity-75"></div>
                                    <!--end::Menu separator-->


                                </div>
                                <!--end::Menu 2-->
                            </div>
                            <!--end::Menu-->
                        </div>
                        <!--end::Header-->
                        <p class="text-gray-800 fw-normal mb-5 h3 text_observacion{{$val_student->id}}">@if ($val_student->observaciones==null) Pendiente...  @else {{$val_student->observaciones}}   @endif
                        </p>
                        <!--begin::Post-->
                        <div class="mb-5">
                            <!--begin::Toolbar-->
                            <div class="d-flex align-items-center mb-5">
                                <a href="#"
                                    class="btn btn-sm btn-light btn-color-muted btn-active-light-success px-4 py-2 me-4" style="font-size: 1vw">
                                    <!--begin::Svg Icon | path: icons/duotune/communication/com012.svg-->
                                    <span class="svg-icon svg-icon-3">
                                        Calificación Final:
                                    </span>
                                    <!--end::Svg Icon-->
                                    <span class="nom_nota{{$val_student->id}}">@if ($val_student->nota_eno==null) 0 @else {{$val_student->nota_eno}}   @endif </span>
                                </a>

                                <a href="javascript:void(0);" onclick="vaciar_nota({{$val_student->id}})" class="btn btn-sm btn-light btn-color-muted btn-active-light-danger px-4 py-2" title="Vaciar Nota">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen030.svg-->
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
                                    Vaciar Nota
                                </a>

                            </div>
                            <!--end::Toolbar-->

                        </div>
                        <!--end::Post-->

                        <!--begin::Separator-->
                        <div class="separator mb-4"></div>
                        <!--end::Separator-->

                        <!--begin::Reply input-->
                        <div class="position-relative mb-8">
                            <div class="mb-3">
                                <label for="nota_student" class="form-label">Nota</label>
                                <input type="number" id="nota_student{{$val_student->id}}" class="form-control" id="nota_student" aria-describedby="emailHelp">
                                {{-- <div id="emailHelp" class="form-text text-danger">We'll never share your email with anyone else.</div> --}}
                              </div>
                              <div class="mb-6">
                                <label for="observacion" class="form-label">Observación</label>
                                <input type="text" id="observacion{{$val_student->id}}" class="form-control" id="observacion">
                              </div>

                              <div class=" top-0 end-0 me-n5">
                                <button onclick="save_nota({{$val_student->id}})" class=" mb-3 btn btn-primary  text-center" id="kt_widget_2_load_more_btn">
                                    <span class="indicator-label">
                                        <i class="fa-solid fa-plus"></i> Guardar Cambios
                                    </span>
                                    <span class="indicator-progress">
                                        Espere... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                    </span>
                                </button>
                            </div>
                        </div>

                        <!--edit::Reply input-->
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Feeds Widget 2-->
            </div>
            <!--end::Col-->
            @endforeach



        </div>
        <!--end::Row-->
         <!--begin::Separator-->
         <div class="separator mb-4"></div>
         <!--end::Separator-->
         <!--begin::Feeds widget 4, 5 load more-->
         <button class="btn btn-primary w-100 text-center" onclick="Save_all_nota()" id="kt_widget_5_load_more_btn">
            <span class="indicator-label">
                Guardar Notas
            </span>
            <span class="indicator-progress">
                Loading... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
            </span>
        </button>
        <!--end::Feeds widget 4, 5 load more-->


    </div>

    @push('scripts')
        <script src="{{ asset('assets/js/sweet-alert/sweetalert.min.js') }}"></script>
        <script src="{{ asset('assets/js/notify/bootstrap-notify.min.js') }}"></script>
        <script src="{{ asset('m2/assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>

        <script src="{{ asset('js/axios.min.js') }}"></script>
        <script src="{{ asset('m2/assets/plugins/global/plugins.bundle.js') }}"></script>
        <script>

            function Save_all_nota() {
                const data = {
                    id_grupo: $('#id_grupo_hide').val()
                }

                console.log(data);

                const sendGetRequest = async () => {
                    try {
                        const resp = await axios.post(base_url()+"/servicio-comunitario/faseone/store_value_nota",data)
                        .catch(function(error) {
                            console.log(error);
                            $("#load").hide();
                        });;
                        console.log(resp.data);
                        if (resp.data.resp) {
                            url = "{{route('serviciocomunitario.listfaseone')}}";
                            $(location).attr('href',url);
                        }else{
                            console.log(resp.data.data);
                            let n =0;
                            for(const [key, value] of Object.entries(resp.data.data)){
                                console.log("value")
                                console.log(value.id)
                                $('#card_all_studen'+value.id).addClass('b-danger');
                                n++;
                            }

                            let alert = `
                            <!--begin::Alert-->
                                <div class="alert alert-dismissible hidd bg-light-danger d-flex flex-column flex-sm-row p-5 mb-10" data-bs-dismiss="alert">
                                    <!--begin::Icon-->
                                    <i class="ki-duotone ki-notification-bing fs-2hx text-danger me-4 mb-5 mb-sm-0"><img src="{{ asset('icon_error.png') }}" alt=""></i>
                                    <!--end::Icon-->

                                    <!--begin::Wrapper-->
                                    <div class="d-flex flex-column pe-0 pe-sm-10">
                                        <!--begin::Title-->
                                        <h4 class="fw-semibold">Error</h4>
                                        <!--end::Title-->

                                        <!--begin::Content-->
                                        <span>Te faltan <b>${n}</b> Estudiantes por evaluar, debes asignarle la calificación final y su observación</span>
                                        <!--end::Content-->
                                    </div>
                                    <!--end::Wrapper-->

                                    <!--begin::Close-->
                                    <button type="button" class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto" data-bs-dismiss="alert">
                                        <i class="ki-duotone ki-cross fs-1 text-primary"><img class="w-icon" src="{{ asset('icon_cerrar.png') }}" alt=""></i>
                                    </button>
                                    <!--end::Close-->
                                </div>
                                <!--end::Alert-->`;
                            $('#view_alert_error').append(alert);
                            // messeg("Error, falta por evaluar estudiantes", 'success');
                            // for (let i = 1; i < resp.data.data.length; i++) {
                            //     console.log(resp.data.data);
                            //     $('#card_all_studen'+resp.data.data[i].id).addClass('b-danger');
                            // }
                        }


                    } catch (err) {
                        // Handle Error Here
                        console.log(err);
                    }
                };
                sendGetRequest();
            }

            function vaciar_nota(id) {
                const data = {
                    id,
                    observacion:null,
                    nota:null,
                    fase:1
                }
                process_data_nota(data);
                $('.text_observacion'+data.id).text("Pendiente..");
                $('.nom_nota'+data.id).text(0);
            }
            function save_nota(id,id_estudent = 0) {


               const data = {
                    id,
                    observacion:$('#observacion'+id).val(),
                    nota:$('#nota_student'+id).val(),
                    fase:1
                }

                if (data.observacion=="") {
                    $('#observacion'+id).addClass('is-invalid');
                }else{
                    $('#observacion'+id).removeClass('is-invalid');
                }

                if (data.nota=="") {
                    $('#nota_student'+id).addClass('is-invalid');
                }else{
                    if (data.nota < 0 || data.nota > 20) {
                        $('#nota_student'+id).addClass('is-invalid');
                        return false;
                    }else{

                        $('#nota_student'+id).removeClass('is-invalid');
                    }
                }

                if (data.observacion==""||data.nota=="") {
                    return false;
                }
                console.log(data);
                process_data_nota(data);
                $('.text_observacion'+data.id).text(data.observacion);
                $('.nom_nota'+data.id).text(data.nota);


            }

            function process_data_nota(data) {
                const sendGetRequest = async () => {
                    try {
                            const resp = await axios.put(base_url()+"/servicio-comunitario/faseone/add-nota",data);
                            console.log(resp.data);
                            if (resp.data.status==200) {
                                $('#aler_notas'+data.id).addClass('d-flex');
                                $('#aler_notas'+data.id).show();
                                $('#text_aler_nota'+data.id).text(resp.data.success);

                                let i=0;
                                const h = setInterval(function () {
                                i++
                                $('#aler_notas'+data.id).removeClass('d-flex');
                                $('#aler_notas'+data.id).hide(100);
                                if (i=1) {
                                    clearInterval(h);
                                    }
                                }, 6000);
                            }

                        } catch (err) {
                            // Handle Error Here
                        }
                    };
                    sendGetRequest();
            }


            $(document).ready(function() {
                // $('#kt_file_manager_new_folder').hide();
                $("#selet_code").select2({
                    dropdownParent: $("#kt_modal_new_target"),
                    // placeholder:"hhhhh"
                });
                $('.alert_not').removeClass('d-flex');
                $('.alert_not').hide();
                list_temp_student();
            });




            $('#btn_add_student').on('click', (e) => {
                const data = {
                    id_estudiante: $('#id_estudiante_select').val(),
                    id_grupo: $('#id_grupo_hiden').val()
                }
                if (data.id_estudiante == "") {
                    $('#id_estudiante_select').addClass('is-invalid');
                } else {
                    $('#id_estudiante_select').removeClass('is-invalid');
                }
                if (data.id_estudiante == "") {
                    return false;
                }
                console.log("Hola");
                const sendPostRequest = async () => {
                    try {
                        const resp = await axios.post(base_url() +
                            "/servicio-comunitario/faseone/estudent/edit", data);
                        console.log(resp.data);
                        if (resp.data.status == 200) {
                            messeg(resp.data.message, 'success');
                            list_temp_student();
                        } else {
                            messeg(resp.data.message, 'danger');
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
                        const resp = await axios.get(base_url() +
                            "/servicio-comunitario/faseone/estudent/list_student/" + id_grupo);

                        var table = "";
                        console.log(resp.data);
                        if (resp.data == "") {
                            table += ' <tr class="iten">';
                            table +=
                                '<td colspan="4" class="text-center"> <h3 class="text-muted">Sin Información</h3>  </td> ';
                            table += ' </tr>';
                        } else {
                            // console.log(resp.data);
                            for (let i = 0; i < resp.data.length; i++) {

                                table += ' <tr class="iten">';

                                table += '<td>' + resp.data[i].cedula + '</td>'
                                table += `
                            <td>

                                <a href="#"  target="_blank" class="text-gray-800 text-hover-primary">${resp.data[i].nombres} ${resp.data[i].primer_apellido} ${resp.data[i].segundo_apellido}</a>
                            </td> `;
                                table += `<td class="text-end">
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

                                table += ' </tr>';
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

            $('#select_estudiente').on('change', (e) => {
                let id_estudiante = $('#select_estudiente').val();
                console.log(id_estudiante);
                $('#id_estudiantes').val(id_estudiante)
                get_files_ing_system(id_estudiante, "");
                console.log("hola");
            });


            $('#btn_add_files_expedientes').on('click', (e) => {
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
                }).done(function(res) {
                    msg = JSON.parse(res)
                    console.log(msg);
                    if (msg.status == 200) {
                        $('#description').val("");
                        $('#name').val("");
                        $('#file').val(null);
                        get_files_ing_system($('#id_estudiantes').val());
                        // $('.modal_file').modal('hide');
                        $('#kt_modal_new_target_cancel').click();
                        messeg(msg.success, 'success');
                        $('#file').removeClass('is-invalid');
                        $('#error-file').text("")
                    } else {
                        if (msg.campo == 'file') {
                            $('#file').addClass('is-invalid');
                            $('#error-file').text("Debes seleccionar un archivo")
                            messeg("Debes seleccionar un archivo", 'danger');
                        } else {
                            $('#file').removeClass('is-invalid');

                            $('#error-file').text("")
                        }


                        if (msg.campo == 'code') {
                            $('#code').addClass('is-invalid');
                            $('#error-code').text("El codigo del archivo ya existe")
                            messeg("El codigo ya existe", 'danger');
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

            $('#btn-guardar-all-files-ing-sistema').on('click', (e) => {
                //  console.log("holasss");
                const data = {
                    id_grupo: $('#id_grupo_hiden').val(),
                    profesor: $('#select_profesor').val(),
                    nombre_proyecto: $('#nombre_proyecto').val(),
                }
                console.log(data);
                const sendPostRequest = async () => {
                    try {
                        const resp = await axios.post(base_url() + "/servicio-comunitario/faseone/update",
                        data);
                        console.log(resp.data);
                        if (resp.data.status == 200) {
                            // list_temp_student();
                            console.log("Hola");
                            url = "{{ route('serviciocomunitario.listfaseone') }}";
                            $(location).attr('href', url);
                            messeg(resp.data.message, 'success');
                        } else {
                            messeg(resp.data.message, 'danger');
                        }


                    } catch (err) {
                        // Handle Error Here
                    }
                };
                sendPostRequest();
            });

            function get_files_ing_system(id, num = "") {
                var valor = (num == "") ? 1 : num;
                const sendGetRequest = async () => {
                    try {
                        const resp = await axios.get("/expedientes/sistemas/" + id + "/get_files_ing_sistemas?page=" +
                            valor);
                        console.log(resp.data);
                        var table = "";

                        if (resp.data.data == "") {
                            table += ' <tr class="iten">';
                            table +=
                                '<td colspan="4" class="text-center"> <h3 class="text-muted">Sin Archivos</h3>  </td> ';
                            table += ' </tr>';
                        } else {
                            for (let i = 0; i < resp.data.data.length; i++) {


                                table += ' <tr class="iten">';



                                table += '<td>' + resp.data.data[i].code + '</td>'
                                table += `
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
                                table += `<td class="text-end">
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

                                table += ' </tr>';

                            }

                            $("#view_vacio_files_operacion").hide();
                        }

                        var x = "";
                        for (let d = 0; d < resp.data.links.length; d++) {
                            var r = resp.data.current_page - 1;
                            if (resp.data.links[d].url == null) {
                                x +=
                                '<li class="page-item previous disabled"><a class="page-link page-endorsement-ope page-link-endorsement-previous-ope" href="javascript:void(0)" data-page="1" >Atras</a></li>';
                                break;
                            } else {
                                x += '<li class="page-item "><a class="page-link page-endorsement-ope page-link-endorsement-previous-ope" href="javascript:void(0)" data-page="' +
                                    r + '" >Atras</a></li>';
                                break;
                            }
                        }
                        for (let j = 1; j <= resp.data.last_page; j++) {
                            if (resp.data.current_page == j) {
                                x += '<li class="page-item active"><a class="page-link" href="javascript:void(0)">' +
                                    j + '<span class="sr-only">(current)</span></a></li>';
                            } else {
                                x += '<li class="page-item  page-link-endorsements-ope page-endorsement-ope-' + j +
                                    '"><a data-page="' + j +
                                    '" class="page-link page-endorsement-ope" href="javascript:void(0)">' + j +
                                    '</a></li>';

                            }

                        }
                        var s = resp.data.current_page + 1;

                        if (resp.data.current_page >= resp.data.last_page) {
                            x +=
                            '<li class="page-item next disabled"><a data-page="" class="page-link page-endorsement-ope page-link-endorsement-next-ope" href="javascript:void(0)">Siguiente</a></li>';

                        } else {
                            x += '<li class="page-item next "><a data-page="' + s +
                                '" class="page-link page-endorsement-ope page-link-endorsement-next-ope" href="javascript:void(0)">Siguiente</a></li>';
                        }
                        $(".page-iten-operacion_file").html(x);
                        $("#total_registros_files_operacion").text(resp.data.total);
                        // $("#list_files_ing_sistemas").html(table);



                        $('.page-endorsement-ope').on('click', function() {
                            const page = $(this).data('page')
                            console.log(page);
                            console.log(resp.data.last_page);
                            $('.page-link-endorsements-ope').removeClass('active')
                            $('.page-endorsement-ope-' + page).addClass('active')

                            if ((page - 1) < 1) {
                                $('.page-link-endorsement-previous-ope').data('page', 1)
                                $('.page-link-endorsement-next-ope').data('page', 2)
                            } else if ((page + 1) <= resp.data.last_page) {
                                $('.page-link-endorsement-next-ope').data('page', page + 1)
                                $('.page-link-endorsement-previous-ope').data('page', page - 1)
                            } else if ((page + 1) > resp.data.last_page) {
                                $('.page-link-endorsement-next-ope').data('page', resp.data.last_page)
                                $('.page-link-endorsement-previous-ope').data('page', resp.data.last_page - 1)
                            }
                            get_files_ing_system(id, page);

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
                                    const resp = await axios.delete(base_url() +
                                        "/servicio-comunitario/delete_student/" + id_estudiante);
                                    console.log(resp);
                                    if (resp.data.status == 200) {
                                        list_temp_student();
                                        messeg(resp.data.message, 'success');
                                    }

                                } catch (err) {
                                    // Handle Error Here
                                }
                            };
                            sendGetRequest();
                        }
                    })

            }

            function messeg(m, t) {
                if (t == "success") {
                    $.notify(
                        '<i class="fa fa-bell-o"></i><strong>Excelente</strong> ' + m +
                        "", {
                            type: t,
                            allow_dismiss: true,
                            delay: 2000,
                            showProgressbar: false,
                            timer: 300,
                        }
                    );
                    return false;
                }else{
                    $.notify(
                        '<i class="fa fa-bell-o"></i><strong>!Hoops¡</strong> ' + m +
                        "", {
                            type: t,
                            allow_dismiss: true,
                            delay: 2000,
                            showProgressbar: false,
                            timer: 300,
                        }
                    );
                }

            }
        </script>
    @endpush
@endsection
