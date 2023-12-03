@extends('layouts.app')
@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/sweetalert2.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('m2/assets/plugins/global/plugins.bundle.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/js/notify/bootstrap-notify.min.js') }}">
@endpush
@section('content')
    <div id="kt_app_content_container" class="app-container  container-xxl ">
        <input type="hidden" id="id_grupo_hide" value="{{ $grupo->id }}">
        <!--begin::Navbar-->
        <div class="card mb-5 mb-xxl-8">
            <div class="card-header border-0 pt-5">
                <!--begin::Title-->
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bold fs-3 mb-1">Nombre Del Proyecto: <b>{{ $grupo->nombre_proyecto }}</b></span>

                </h3>
                <!--end::Title-->

            </div>
            <div class="card-body pt-9 pb-0">
                <!--begin::Details-->
                <div class="d-flex flex-wrap flex-sm-nowrap">
                    <!--begin: Pic-->
                    <div class="me-7 mb-4">
                        <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                            <img src="@if ($profesor->foto == null){{ asset('icon_profesor.png') }}@else{{ asset($profesor->foto) }}@endif" alt="image">

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
                                    <a href="#" class="text-gray-900 text-hover-primary fs-2 fw-bold me-1">CI:
                                        {{ $profesor->cedula }} | {{ $profesor->nombre }} {{ $profesor->primer_apellido }}
                                        {{ $profesor->segundo_apellido }}</a>

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
                                        {{ $profesor->especialidad }}
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
                                        {{ $profesor->email }}
                                    </a>
                                </div>
                                <!--end::Info-->
                            </div>
                            <!--end::User-->

                            <!--begin::Actions-->
                            <div class="d-flex my-4">




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
                                                data-kt-initialized="1">{{ $grupo->total_studiante }}</div>
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
                    <li class="nav-item mt-2 " data-id="1" onclick="menu_progress(this)">
                        <a class="nav-link text-active-primary ms-0 me-10 py-5 active menu_list_estudiante"
                            href="javascript:void(0);">
                            Lista De Estudiantes </a>
                    </li>
                    <!--end::Nav item-->
                    <!--begin::Nav item-->
                    <li class="nav-item mt-2 " data-id="2" onclick="menu_progress(this)">
                        <a class="nav-link text-active-primary ms-0 me-10 py-5  menu_list_file"
                            href="javascript:void(0);">
                            Lista De Archivos </a>
                    </li>
                    <!--end::Nav item-->

                    <!--begin::Nav item-->
                    <li class="nav-item mt-2 " data-id="3" onclick="menu_progress(this)">
                        <a class="nav-link text-active-primary ms-0 me-10 py-5  menu_info_project"
                            href="javascript:void(0);">
                            Información Del Proyecto </a>
                    </li>
                    <!--end::Nav item-->

                </ul>
                <!--begin::Navs-->
            </div>
        </div>
        <!--end::Navbar-->

        <div class="list_student">
            <div class="d-flex flex-wrap flex-stack mb-6">
                <!--begin::Title-->
                <h3 class="fw-bold my-2">
                    Lista De Estudiantes
                    <span class="fs-6 text-gray-400 fw-semibold ms-1"></span>
                </h3>
                <!--end::Title-->

                {{-- <!--begin::Controls-->
                <div class="d-flex my-2">
                    <!--begin::Search-->
                    <div class="d-flex align-items-center position-relative me-4">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                        <span class="svg-icon svg-icon-3 position-absolute ms-3"><svg width="24" height="24"
                                viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2"
                                    rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor"></rect>
                                <path
                                    d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                    fill="currentColor"></path>
                            </svg>
                        </span>
                        <!--end::Svg Icon--> <input type="text" id="kt_filter_search"
                            class="form-control form-control-sm border-body bg-body w-150px ps-10" placeholder="Search">
                    </div>
                    <!--end::Search-->

                    <a href="#" class="btn btn-primary btn-sm">
                        File Manager
                    </a>
                </div>
                <!--end::Controls--> --}}
            </div>
            <!--begin::Row-->
            <div class="row g-5 g-xxl-8">
                @foreach ($estudiantes as $val_student)
                    <!--begin::Col-->
                    <div class="col-xl-6 ">

                        <!--begin::Feeds Widget 2-->
                        <div id="card_all_studen{{ $val_student->id }}" class="card card-bordered mb-5 mb-xxl-8 ">
                            @if ($val_student->nota_two<10)
                            <div class="card-header ribbon ribbon-end">
                                <div class="ribbon-label bg-danger">REPROBO</div>
                                <div class="card-title">Estudiante</div>

                            </div>
                            @else
                            <div class="card-header ribbon ribbon-end">
                                <div class="ribbon-label bg-success">APROBO</div>
                                <div class="card-title">Estudiante</div>

                            </div>
                            @endif


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
                                            <a href="#" class="text-gray-900 text-hover-primary fs-6 fw-bold">CI:
                                                {{ $val_student->cedula }} <br> {{ $val_student->nombres }}
                                                {{ $val_student->primer_apellido }}
                                                {{ $val_student->segundo_apellido }}</a>

                                            <span class="text-gray-400 fw-bold">Carrera:
                                                {{ $val_student->nombre_carrera }} </span>
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
                                                <div class="menu-content fs-6 text-dark fw-bold px-3 py-4">Quick Actions
                                                </div>
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
                                <div class="timeline-label mb-4">
                                    <!--begin::Item-->
                                    <div class="timeline-item">
                                        <!--begin::Label-->
                                        <div class="timeline-label fw-bold text-gray-800 fs-6">TALLER DE SERVICIO </div>
                                        <!--end::Label-->

                                        <!--begin::Badge-->
                                        <div class="timeline-badge">
                                            <i class="fa fa-genderless @if ($val_student->nota_eno < 10) text-danger @else text-success  @endif    fs-1"></i>
                                        </div>
                                        <!--end::Badge-->

                                        <!--begin::Text-->
                                        <div class="fw-mormal timeline-content text-muted ps-3">
                                            {{ $val_student->observaciones }}, Nota: {{ $val_student->nota_eno }}
                                        </div>
                                        <!--end::Text-->
                                    </div>
                                    <!--end::Item-->

                                    <!--begin::Item-->
                                    <div class="timeline-item">
                                        <!--begin::Label-->
                                        <div class="timeline-label fw-bold text-gray-800 fs-6">PROYECTO DE SERVICIO COMUNITARIO</div>
                                        <!--end::Label-->

                                        <!--begin::Badge-->
                                        <div class="timeline-badge">
                                            <i class="fa fa-genderless  @if ($val_student->nota_two < 10) text-danger @else text-success  @endif  fs-1"></i>
                                        </div>
                                        <!--end::Badge-->

                                        <!--begin::Content-->
                                        <div class="timeline-content d-flex">
                                            <span id="time_line_info" class="fw-bold text-gray-800 ps-3">
                                                <span class="text_observacion{{ $val_student->id }}">
                                                    @if ($val_student->observaciones_2 == null)
                                                        Pendiente...
                                                    @else
                                                        {{ $val_student->observaciones_2 }}
                                                    @endif
                                                </span>
                                            , Nota:
                                                <span class="nom_nota{{ $val_student->id }}">
                                                    @if ($val_student->nota_two == null)
                                                        0
                                                    @else
                                                        {{ $val_student->nota_two }}
                                                    @endif
                                                </span>

                                        </span>
                                        </div>
                                        <!--end::Content-->
                                    </div>
                                    <!--end::Item-->


                                </div>
                                <!--begin::Post-->
                                <div class="mb-5">
                                    <!--begin::Toolbar-->
                                    <div class="d-flex align-items-center mb-5">




                                    </div>
                                    <!--end::Toolbar-->

                                </div>
                                <!--end::Post-->

                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Feeds Widget 2-->
                    </div>
                    <!--end::Col-->
                @endforeach



            </div>
            <!--end::Row-->

        </div>

        <div class="list_file" style="display: none">
            <div class="d-flex flex-wrap flex-stack mb-6">
                <!--begin::Title-->
                <h3 class="fw-bold my-2">
                    Lista De Archivos Cargados
                    <span class="fs-6 text-gray-400 fw-semibold ms-1"><span class="nom_files"></span> Archivos</span>
                </h3>
                <!--end::Title-->

                <!--begin::Controls-->
                <div class="d-flex my-2">
                    <!--begin::Search-->
                    <div class="d-flex align-items-center position-relative me-4">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                        <span class="svg-icon svg-icon-3 position-absolute ms-3"><svg width="24" height="24"
                                viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2"
                                    rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor"></rect>
                                <path
                                    d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                    fill="currentColor"></path>
                            </svg>
                        </span>
                        <!--end::Svg Icon--> <input type="text" id="kt_filter_search"
                            class="form-control form-control-sm border-body bg-body w-150px ps-10" placeholder="Search">
                    </div>
                    <!--end::Search-->

                    <a href="#" class="btn btn-primary btn-sm">
                        File Manager
                    </a>
                </div>
                <!--end::Controls-->
            </div>

            <div class="row g-6 g-xl-9 mb-6 mb-xl-9" id="list_files_fase_one_views">


                <!--begin::Col-->
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <!--begin::Card-->
                    <div class="card h-100 ">
                        <!--begin::Card body-->
                        <div class="card-body d-flex justify-content-center text-center flex-column p-8">
                            <!--begin::Name-->
                            <a href="/metronic8/demo1/../demo1/apps/file-manager/files.html"
                                class="text-gray-800 text-hover-primary d-flex flex-column">
                                <!--begin::Image-->
                                <div class="symbol symbol-60px mb-5">
                                    <img src="{{asset('/m2/assets/media/svg/files/doc.svg')}}" class="theme-light-show"
                                        alt="">
                                </div>
                                <!--end::Image-->

                                <!--begin::Title-->
                                <div class="fs-5 fw-bold mb-2">
                                    Product Logo </div>
                                <!--end::Title-->
                            </a>
                            <!--end::Name-->

                            <!--begin::Description-->
                            <div class="fs-7 fw-semibold text-gray-400">
                                5 days ago </div>
                            <!--end::Description-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card-->
                </div>
                <!--end::Col-->






            </div>
        </div>

        <div class="view_info_project" style="display: none">


            <div class="card">
                <div class="card-header mt-4 border-0">
                    <h1 class=" w-100 mb-0">INFORMACIÓN DEL PROYECTO </h1>
                </div>
                <div class="card-body pt-0">
                    <div class="row">
                        {{-- <div class="col-12 col-md-12">
                            <input type="hidden" value="{{$grupo->id}}" id="id_grupo_hiden">
                            <div class="mb-5" data-select2-id="select2-data-100-kjmd">
                                <label for="" class="form-label">Selecciona El Profesor (TUTOR)</label>
                                <!--begin::Default example-->
                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text">
                                        <i class="bi bi-bookmarks-fill fs-4"></i>
                                    </span>
                                    <div class="flex-grow-1" data-select2-id="select2-data-99-jk2x">
                                        <select class="form-select rounded-start-0 " data-control="select2"
                                            data-placeholder="Seleccionar Profesor" id="select_profesor">
                                            <option></option>
                                            @foreach ($profesor_all as $value)
                                                <option  @if ($grupo->profesore_id == $value->id) selected    @endif value="{{$value->id}}">V-{{$value->cedula}} - {{$value->nombres." ".$value->primer_apellido." ".$value->segundo_apellido}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <!--end::Default example-->
                            </div>
                        </div> --}}
                        <div class="col-md-12">
                            <div class="mb-5">
                                <label for="exampleFormControlInput1" class="required form-label">Nombre Del Proyecto</label>
                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text">
                                        {{-- <i class="bi bi-bookmarks-fill fs-4"></i> --}}
                                        <i class="fa-solid fa-layer-group fs-4"></i>

                                    </span>
                                    <div class="flex-grow-1" data-select2-id="select2-data-99-jk2x">
                                        <input type="email" class="form-control " disabled id="nombre_proyecto" value="{{$grupo->nombre_proyecto}}" placeholder="Ingresar el nombre del proyecto"/>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-12">
                            <div class="mb-5" data-select2-id="select2-data-100-kjmd">
                                <label for="" class="form-label required">Selecciona La Carrera</label>
                                <!--begin::Default example-->
                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text">
                                        <i class="bi bi-bookmarks-fill fs-4"></i>
                                    </span>
                                    <div class="flex-grow-1" data-select2-id="select2-data-99-jk2x">
                                        <select class="form-select rounded-start-0" disabled data-control="select2"
                                            data-placeholder="Seleccionar carrera" id="select_carrera">
                                            <option></option>
                                            @foreach ($carrera as $value)
                                                <option  @if ($grupo->carrera_id == $value->id) selected   @endif value="{{$value->id}}"><b>CÓDIGO:</b> {{$value->code}} | CARRERA: {{$value->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <!--end::Default example-->
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="mb-5">
                                <label for="exampleFormControlInput1" class="required form-label">Nombre De La Comunidad y/o Institución</label>
                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text">
                                        {{-- <i class="bi bi-bookmarks-fill fs-4"></i> --}}
                                        <i class="fa-solid fa-layer-group fs-4"></i>

                                    </span>
                                    <div class="flex-grow-1" data-select2-id="select2-data-99-jk2x">
                                        <input type="email" class="form-control " disabled id="nombre_comunidad" value="{{$grupo->nombre_comunidad}}" placeholder="Ingresar Nombre De La Comunidad y/o Institución"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="direccion_comunidad" class="form-label">Dirección de la comunidad</label>
                                <textarea class="form-control" disabled id="direccion_comunidad" placeholder="Ingrese la Direccion de la comindad" rows="3">{{$grupo->direccion_comunidad}}</textarea>
                              </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-5">
                                <label for="nomb_tutor_comunitario" class="required form-label">Nombre Del Tutor Comunitario</label>
                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text">
                                        {{-- <i class="bi bi-bookmarks-fill fs-4"></i> --}}
                                        <i class="fa-solid fa-layer-group fs-4"></i>

                                    </span>
                                    <div class="flex-grow-1" data-select2-id="select2-data-99-jk2x">
                                        <input type="text" disabled class="form-control " value="{{$grupo->nombre_tutor_comunitario}}" id="nomb_tutor_comunitario" placeholder="Ingresar el Nombre Del Tutor Comunitario"/>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-5">
                                <label for="cedula_tutor_comunitario" class="required form-label">Cédula Del Tutor Comunitario</label>
                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text">
                                        {{-- <i class="bi bi-bookmarks-fill fs-4"></i> --}}
                                        <i class="fa-solid fa-layer-group fs-4"></i>


                                    </span>
                                    <div class="flex-grow-1" data-select2-id="select2-data-99-jk2x">
                                        <input type="text" disabled class="form-control " value="{{$grupo->cedula_tutor_comunitario}}" id="cedula_tutor_comunitario" placeholder="Ingresar el Cédula Del Tutor Comunitario"/>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-5">
                                <label for="telefono_tutor_comunitario" class="required form-label">Telefono Del Tutor Comunitario</label>
                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text">
                                        {{-- <i class="bi bi-bookmarks-fill fs-4"></i> --}}
                                        <i class="fa-solid fa-layer-group fs-4"></i>
                                    </span>
                                    <div class="flex-grow-1" data-select2-id="select2-data-99-jk2x">
                                        <input type="number" disabled class="form-control " value="{{$grupo->telefono_tutor_comunitario}}" id="telefono_tutor_comunitario" placeholder="Ingresar el Telefono Del Tutor Comunitario"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-5">
                                <label for="cant_beneficiados" class="required form-label">Cantidad De Beneficiados</label>
                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text">
                                        {{-- <i class="bi bi-bookmarks-fill fs-4"></i> --}}
                                        <i class="fa-solid fa-layer-group fs-4"></i>
                                    </span>
                                    <div class="flex-grow-1" data-select2-id="select2-data-99-jk2x">
                                        <input type="number" disabled class="form-control " value="{{$grupo->cant_beneficiados}}" id="cant_beneficiados" placeholder="Ingresar la Cantidad De Beneficiados"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-5">
                                <label for="vinculacion_project" class="required form-label">Vinculación Del Proyecto Con Los Planes, Programas y/o Proyectos Establecido Por El Ejecutivo Nacional</label>
                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text">
                                        {{-- <i class="bi bi-bookmarks-fill fs-4"></i> --}}
                                        <i class="fa-solid fa-layer-group fs-4"></i>
                                    </span>
                                    <div class="flex-grow-1" data-select2-id="select2-data-99-jk2x">
                                        <input type="text" disabled class="form-control " value="{{$grupo->vinc_project_planes_prog}}" id="vinculacion_project" placeholder="Ingresar la Cantidad De Beneficiados"/>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="mb-5">
                                <label for="select_area_accion" class="required form-label">Indeque El Área De Accion Del Proyecto</label>
                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text">
                                        {{-- <i class="bi bi-bookmarks-fill fs-4"></i> --}}
                                        <i class="fa-solid fa-layer-group fs-4"></i>
                                    </span>
                                    <div class="flex-grow-1" data-select2-id="select2-data-99-jk2x">
                                        <select class="form-select" disabled id="select_area_accion" aria-label="Select example">
                                            <option>Seleccione El Área</option>
                                            <option @if ($grupo->area_accion_project == "AMBIENTAL") selected   @endif value="AMBIENTAL">AMBIENTAL</option>
                                            <option @if ($grupo->area_accion_project == "SOCIOPRODUCTIVO") selected   @endif  value="SOCIOPRODUCTIVO,">SOCIOPRODUCTIVO</option>
                                            <option @if ($grupo->area_accion_project == "TECNOLOGICO") selected   @endif  value="TECNOLOGICO">TECNOLOGICO</option>
                                            <option @if ($grupo->area_accion_project == "SOCIAL") selected   @endif  value="SOCIAL">SOCIAL</option>
                                            <option @if ($grupo->area_accion_project == "EDUCATIVO") selected   @endif  value="EDUCATIVO">EDUCATIVO</option>
                                            <option @if ($grupo->area_accion_project == "SOCIO-COMUNITARIO") selected   @endif  value="SOCIO-COMUNITARIO">SOCIO-COMUNITARIO</option>
                                            <option @if ($grupo->area_accion_project == "ENTRE OTROS") selected   @endif  value=" ENTRE OTROS"> ENTRE OTROS</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header border-0">
                    <h1 class="w-100 mb-0">CANTIDAD DE ACTIVIDADES REALIZADAS EN EL MARCO DE LOS PROYECTOS </h1>
                </div>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-6 col-md-3">
                            <div class="mb-5" data-select2-id="select2-data-100-kjmd">
                                <div class="form-check form-check-custom form-check-solid form-check-lg">
                                    <input  disabled class="form-check-input" type="checkbox" @if ($grupo->foros)   checked @endif  value="" id="foro_check"/>
                                    <label class="form-check-label" for="foro_check">
                                        FOROS
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-3">
                            <div class="mb-5" data-select2-id="select2-data-100-kjmd">
                                <div class="form-check form-check-custom form-check-solid form-check-lg">
                                    <input disabled class="form-check-input" type="checkbox" @if ($grupo->charlas)   checked @endif  value="" id="charlas_check"/>
                                    <label class="form-check-label" for="charlas_check">
                                        CHARLAS
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-3">
                            <div class="mb-5" data-select2-id="select2-data-100-kjmd">
                                <div class="form-check form-check-custom form-check-solid form-check-lg">
                                    <input disabled class="form-check-input" type="checkbox" @if ($grupo->jornadas)   checked @endif  value="" id="jornadas_check"/>
                                    <label class="form-check-label" for="jornadas_check">
                                        JORNADAS
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-3">
                            <div class="mb-5" data-select2-id="select2-data-100-kjmd">
                                <div class="form-check form-check-custom form-check-solid form-check-lg">
                                    <input disabled class="form-check-input" type="checkbox" @if ($grupo->talleres)   checked @endif  value="" id="talleres_check"/>
                                    <label class="form-check-label" for="talleres_check">
                                        TALLERES
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-3">
                            <div class="mb-5" data-select2-id="select2-data-100-kjmd">
                                <div class="form-check form-check-custom form-check-solid form-check-lg">
                                    <input disabled class="form-check-input" type="checkbox" @if ($grupo->campanas)   checked @endif  value="" id="campana_check"/>
                                    <label class="form-check-label" for="campana_check">
                                        CAMPAÑAS
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-3">
                            <div class="mb-5" data-select2-id="select2-data-100-kjmd">
                                <div class="form-check form-check-custom form-check-solid form-check-lg">
                                    <input disabled class="form-check-input" type="checkbox"  @if ($grupo->reunion_misiones)   checked @endif value="" id="reunion_misiones_check"/>
                                    <label class="form-check-label" for="reunion_misiones_check">
                                        REUNIÓN CON MISIONES
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-3">
                            <div class="mb-5" data-select2-id="select2-data-100-kjmd">
                                <div class="form-check form-check-custom form-check-solid form-check-lg">
                                    <input disabled class="form-check-input" type="checkbox" @if ($grupo->ferias)   checked @endif  value="" id="ferias_check"/>
                                    <label class="form-check-label" for="ferias_check">
                                        FERIAS
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-3">
                            <div class="mb-5" data-select2-id="select2-data-100-kjmd">
                                <div class="form-check form-check-custom form-check-solid form-check-lg">
                                    <input disabled class="form-check-input" type="checkbox" @if ($grupo->alianzas_estrategicas)   checked @endif  value="" id="alianzas_estrategicas_check"/>
                                    <label class="form-check-label" for="alianzas_estrategicas_check">
                                        ALIANZAS ESTRATÉGICAS
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>


        </div>


    </div>

    @push('scripts')
        <script src="{{ asset('assets/js/sweet-alert/sweetalert.min.js') }}"></script>
        <script src="{{ asset('assets/js/notify/bootstrap-notify.min.js') }}"></script>
        <script src="/m2/assets/plugins/custom/datatables/datatables.bundle.js"></script>

        <script src="{{ asset('js/axios.min.js') }}"></script>
        <script src="{{ asset('m2/assets/plugins/global/plugins.bundle.js') }}"></script>
        <script>
            function menu_progress(obj) {
                let id = parseInt($(obj).attr('data-id'));
                console.log(id);
                switch (id) {
                    case 1:
                        $('.list_student').show(100);
                        $('.list_file').hide(100);
                        $('.view_info_project').hide(100);

                        $('.menu_list_estudiante').addClass('active');
                        $('.menu_list_file').removeClass('active');
                        $('.menu_info_project').removeClass('active');

                        break;
                    case 2:
                        $('.list_student').hide(100);
                        $('.list_file').show(100);
                        $('.view_info_project').hide(100);

                        $('.menu_list_estudiante').removeClass('active');
                        $('.menu_list_file').addClass('active');
                        $('.menu_info_project').removeClass('active');

                        break;
                    case 3:
                        $('.list_student').hide(100);
                        $('.list_file').hide(100);
                        $('.view_info_project').show(100);

                        $('.menu_list_estudiante').removeClass('active');
                        $('.menu_list_file').removeClass('active');
                        $('.menu_info_project').addClass('active');


                        break;

                    default:
                        break;
                }
            }
            function Save_all_nota() {
                const data = {
                    id_grupo: $('#id_grupo_hide').val()
                }

                console.log(data);

                const sendGetRequest = async () => {
                    try {
                        const resp = await axios.post(base_url() + "/servicio-comunitario/faseone/store_value_nota",
                                data)
                            .catch(function(error) {
                                console.log(error);
                                $("#load").hide();
                            });;
                        console.log(resp.data);
                        if (resp.data.resp) {
                            url = "{{ route('serviciocomunitario.listfaseone') }}";
                            $(location).attr('href', url);
                        } else {
                            for (let i = 1; i < resp.data.data.length; i++) {
                                console.log(resp.data.data);
                                $('#card_all_studen' + resp.data.data[i].id).addClass('b-danger');
                            }
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
                    observacion: null,
                    nota: null,
                }
                process_data_nota(data);
                $('.text_observacion' + data.id).text("Pendiente..");
                $('.nom_nota' + data.id).text(0);
            }

            function save_nota(id) {


                const data = {
                    id,
                    observacion: $('#observacion' + id).val(),
                    nota: $('#nota_student' + id).val(),
                }

                if (data.observacion == "") {
                    $('#observacion' + id).addClass('is-invalid');
                } else {
                    $('#observacion' + id).removeClass('is-invalid');
                }

                if (data.nota == "") {
                    $('#nota_student' + id).addClass('is-invalid');
                } else {
                    if (data.nota < 0 || data.nota > 20) {
                        $('#nota_student' + id).addClass('is-invalid');
                        return false;
                    } else {

                        $('#nota_student' + id).removeClass('is-invalid');
                    }
                }

                if (data.observacion == "" || data.nota == "") {
                    return false;
                }
                console.log(data);
                process_data_nota(data);
                $('.text_observacion' + data.id).text(data.observacion);
                $('.nom_nota' + data.id).text(data.nota);


            }

            function process_data_nota(data) {
                const sendGetRequest = async () => {
                    try {
                        const resp = await axios.put(base_url() + "/servicio-comunitario/faseone/add-nota", data);
                        console.log(resp.data);
                        if (resp.data.status == 200) {
                            $('#aler_notas' + data.id).addClass('d-flex');
                            $('#aler_notas' + data.id).show();
                            $('#text_aler_nota' + data.id).text(resp.data.success);

                            let i = 0;
                            const h = setInterval(function() {
                                i++
                                $('#aler_notas' + data.id).removeClass('d-flex');
                                $('#aler_notas' + data.id).hide(100);
                                if (i = 1) {
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

                list_files($('#id_grupo_hide').val());

            });

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
                }
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
                            let g = 0;
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

                                table += '<div class="col-md-6 col-lg-4 col-xl-3">';
                                table += ' <div class="card h-100 border">';
                                table += ' <div class="card-body d-flex justify-content-center text-center flex-column p-8">';
                                table += '<a href="'+base_url()+resp.data[i].url+'"  target="_blank" class="text-gray-800 text-hover-primary d-flex flex-column">';
                                table += ' <div class="symbol symbol-60px mb-5">';
                                table += ' <img src="{{asset("/m2/assets/media/svg/files/doc.svg")}}" class="theme-light-show" alt="">';
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
                            $('.nom_files').text(g);
                        }
                        $('#list_files_fase_one_views').html(table);
                    } catch (err) {
                        // Handle Error Here
                    }
                };
                sendGetRequest();
            }


        </script>
    @endpush
@endsection
