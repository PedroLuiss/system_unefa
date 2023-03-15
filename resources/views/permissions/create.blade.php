@extends('layouts.app')

@section('content')
    @push('css')
        <link rel="stylesheet" type="text/css"
            href="https://preview.keenthemes.com/metronic8/demo1/assets/plugins/custom/datatables/datatables.bundle.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/sweetalert2.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('m2/assets/plugins/global/plugins.bundle.css') }}">
    @endpush
    @if (session('mensaje'))
        <div class="alert alert-success">
            <strong>{{ session('mensaje') }}</strong>
        </div>
    @endif
    <div>
        <div class="card ">
            <!--begin::Body-->
            <div class="card-body p-lg-17">
                <!--begin::Row-->
                <div class="row mb-3">
                    <!--begin::Col-->
                    <div class="col-md-12 pe-lg-10">
                        <!--begin::Form-->
                        <form method="POST" action="{{ route('permissions.store') }}" class="form mb-15 fv-plugins-bootstrap5 fv-plugins-framework" method="post"
                            id="kt_contact_form">
                            @csrf
                            <h1 class="fw-bold text-dark mb-9">Crear Permiso</h1>

                            <!--begin::Input group-->
                            <div class="row mb-5">
                                <!--begin::Col-->
                                <div class="col-md-12 fv-row fv-plugins-icon-container mb-5">
                                    <!--begin::Label-->
                                    <label class="fs-5 fw-semibold mb-2">Nombre del permiso</label>
                                    <!--end::Label-->

                                    <!--begin::Input-->
                                    <input type="text" class="form-control form-control-solid  @if ($errors->has('name')) is-invalid  @endif" value="{{ old('name') }}" placeholder="Ingresar Nombre Del Permiso.."
                                        name="name">
                                    <!--end::Input-->
                                    @if ($errors->has('name'))
                                        <div class="fv-plugins-message-container invalid-feedback">{{ $errors->first('name') }}</div>
                                    @endif

                                </div>
                                <!--end::Col-->


                            <!--begin::Submit-->
                            <button type="submit" class="btn btn-primary mt-5" id="kt_contact_submit_button">

                                <!--begin::Indicator label-->
                                <span class="indicator-label">
                                    Guardar</span>
                                <!--end::Indicator label-->

                                <!--begin::Indicator progress-->
                                <span class="indicator-progress">
                                    Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                </span>
                                <!--end::Indicator progress-->
                            </button>
                            <!--end::Submit-->
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Col-->


                </div>
                <!--end::Row-->
            </div>
            <!--end::Body-->
        </div>
    </div>
    @push('scripts')
        <script src="{{ asset('assets/js/sweet-alert/sweetalert.min.js') }}"></script>
        <script src="{{ asset('assets/js/notify/bootstrap-notify.min.js') }}"></script>
        <script src="/m2/assets/plugins/custom/datatables/datatables.bundle.js"></script>

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
