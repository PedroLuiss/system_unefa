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
                        <form action="{{ route('users.update', $user->id) }}" method="post" class="form-horizontal"
                            id="kt_contact_form">
                            @csrf
                            @method('PUT')
                            <h1 class="fw-bold text-dark mb-9">Crear Usuario</h1>

                            <!--begin::Input group-->
                            <div class="row mb-5">
                                <!--begin::Col-->
                                <div class="col-md-6 fv-row fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="fs-5 fw-semibold mb-2">Nombres Completo</label>
                                    <!--end::Label-->

                                    <!--begin::Input-->
                                    <input type="text" class="form-control form-control-solid  @if ($errors->has('name')) is-invalid  @endif" value="{{ old('name', $user->name) }}" placeholder="Ingresar Nombre Completo.."
                                        name="name">
                                    <!--end::Input-->
                                    @if ($errors->has('name'))
                                        <div class="fv-plugins-message-container invalid-feedback">{{ $errors->first('name') }}</div>
                                    @endif

                                </div>
                                <!--end::Col-->

                                <!--begin::Col-->
                                <div class="col-md-6 fv-row fv-plugins-icon-container">
                                    <!--end::Label-->
                                    <label class="fs-5 fw-semibold mb-2">Cedula</label>
                                    <!--end::Label-->

                                    <!--end::Input-->
                                    <input type="text" class="form-control form-control-solid @if ($errors->has('cedula')) is-invalid  @endif" value="{{ old('cedula', $user->cedula) }}"  placeholder="Ingresar Cédula.."
                                        name="cedula">
                                    <!--end::Input-->
                                    @if ($errors->has('cedula'))
                                        <div class="fv-plugins-message-container invalid-feedback">{{ $errors->first('cedula') }}</div>
                                    @endif
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div class="d-flex flex-column mb-5 fv-row">
                                <!--begin::Label-->
                                <label class="fs-5 fw-semibold mb-2">Email</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input class="form-control form-control-solid @if ($errors->has('email')) is-invalid  @endif" type="email" value="{{ old('email', $user->email) }}" placeholder="Ingresar El Email.." name="email">
                                <!--end::Input-->
                                @if ($errors->has('email'))
                                    <div class="fv-plugins-message-container invalid-feedback">{{ $errors->first('email') }}</div>
                                @endif
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div class="d-flex flex-column mb-5 fv-row">
                                <!--begin::Label-->
                                <label class="fs-5 fw-semibold mb-2">Password</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input class="form-control form-control-solid @if ($errors->has('password')) is-invalid  @endif" type="password" value="{{ old('password') }}" placeholder="Ingrese la contraseña sólo en caso de modificarla" name="password">
                                <!--end::Input-->
                                @if ($errors->has('password'))
                                    <div class="fv-plugins-message-container invalid-feedback">{{ $errors->first('password') }}</div>
                                @endif
                            </div>
                            <!--end::Input group-->
                            <div class="row">
                                <label for="name" class="col-sm-2 col-form-label">Roles</label>
                                <div class="col-sm-7">
                                    <div class="form-group">
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="profile">
                                                <table class="table">
                                                    <tbody>
                                                        @foreach ($roles as $id => $role)
                                                        <tr>
                                                            <td>
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            name="roles[]"
                                                                            value="{{ $id }}" {{ $user->roles->contains($id) ? 'checked' : ''}}
                                                                        >
                                                                        <span class="form-check-sign">
                                                                            <span class="check" value=""></span>
                                                                        </span>
                                                                    </label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                {{ $role }}
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--begin::Submit-->
                            <button type="submit" class="btn btn-primary" id="kt_contact_submit_button">

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
