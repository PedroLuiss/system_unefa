@extends('layouts.app')

@section('content')

    <div class="card mb-5 mb-xl-10">
        <!--begin::Card header-->
        <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
            data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
            <!--begin::Card title-->
            <div class="card-title m-0">
                <h3 class="fw-bold m-0">Crear Profesor

                </h3>
            </div>
            <!--end::Card title-->
        </div>
        <!--begin::Card header-->

        <!--begin::Content-->
        <div id="kt_account_settings_profile_details" class="collapse show">
            <!--begin::Form-->
            <form action="{{ route('profesoresdatos.store') }}" novalidate enctype="multipart/form-data" method="POST"  id="kt_account_profile_details_form"  class="form fv-plugins-bootstrap5 fv-plugins-framework"
                novalidate="novalidate">
                @csrf
                <!--begin::Card body-->
                <div class="card-body border-top p-9">
                    <!--begin::Input group-->
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-2 col-form-label fw-semibold fs-6">Foto</label>
                        <!--end::Label-->

                        <!--begin::Col-->
                        <div class="col-lg-8">
                            <!--begin::Image input-->
                            <div class="image-input image-input-outline image-input-empty" data-kt-image-input="true"
                                style="background-image: url('{{ asset('m2/assets/media/avatars/blank.png') }}');
                                @error('foto')
                                border: 1px solid red;
                                @enderror">
                                <!--begin::Preview existing avatar-->
                                <div class="image-input-wrapper w-125px h-125px" style="background-image: none;"></div>
                                <!--end::Preview existing avatar-->

                                <!--begin::Label-->
                                <label
                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                    aria-label="Change avatar" data-bs-original-title="Change avatar"
                                    data-kt-initialized="1">
                                    <i class="ki-duotone ki-pencil fs-7"><span class="path1"></span><span
                                            class="path2"></span></i>
                                    <!--begin::Inputs-->
                                    <input type="file" name="foto" accept=".png, .jpg, .jpeg">
                                    <input type="hidden" name="avatar_remove" value="1">
                                    <!--end::Inputs-->
                                </label>
                                <!--end::Label-->

                                <!--begin::Cancel-->
                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                    aria-label="Cancel avatar" data-bs-original-title="Cancel avatar"
                                    data-kt-initialized="1">
                                    <i class="ki-duotone ki-cross fs-2"><span class="path1"></span><span
                                            class="path2"></span></i> </span>
                                <!--end::Cancel-->

                                <!--begin::Remove-->
                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                    aria-label="Remove avatar" data-bs-original-title="Remove avatar"
                                    data-kt-initialized="1">
                                    <i class="ki-duotone ki-cross fs-2"><span class="path1"></span><span
                                            class="path2"></span></i> </span>
                                <!--end::Remove-->
                            </div>
                            <!--end::Image input-->

                            <!--begin::Hint-->
                            <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                            @error('foto')
                                <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <!--end::Hint-->
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-10 ">
                                <label for="exampleFormControlInput1" class="required form-label">CEDULA</label>
                                <input type="txtCedula" name="cedula"
                                    class="form-control form-control-solid @error('cedula') is-invalid @enderror"
                                    value="{{ old('cedula') }}" placeholder="Numero de Identidad" />
                                @error('cedula')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-10 ">
                                <label for="exampleFormControlInput1" class="required form-label">NOMBRES</label>
                                <input type="txtNombres" name="nombres"
                                    class="form-control form-control-solid @error('nombres') is-invalid @enderror"
                                    value="{{ old('nombres') }}" placeholder="NOMBRES" />
                                @error('nombres')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-10">
                                <label for="exampleFormControlInput1" class="required form-label">APELLIDO PATERNO</label>
                                <input type="txtApellidoPaterno" name="primer_apellido"
                                    class="form-control form-control-solid @error('primer_apellido') is-invalid @enderror"
                                    value="{{ old('primer_apellido') }}" placeholder="APELLIDO PATERNO" />
                                @error('primer_apellido')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">

                            <div class="mb-10">
                                <label for="exampleFormControlInput1" class="required form-label">APELLIDO MATERNO </label>
                                <input type="txtApeliidoMaterno" name="segundo_apellido"
                                    class="form-control form-control-solid @error('segundo_apellido') is-invalid @enderror"
                                    value="{{ old('segundo_apellido') }}" placeholder="APELLIDO MATERNO" />
                                @error('segundo_apellido')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                        </div>

                        <div class="col-md-6">
                            <div class="mb-10">
                                <label for="exampleFormControlInput1" class="required form-label">ESPECIALIDAD</label>
                                <input type="txtEspecialidad" name="especialidad"
                                    class="form-control form-control-solid @error('especialidad') is-invalid @enderror"
                                    value="{{ old('especialidad') }}" placeholder="Especialidad" />
                                @error('especialidad')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-10">
                                <label for="exampleFormControlInput1" class="required form-label">EMAIL</label>
                                <input type="txtEspecialidad" name="email"
                                    class="form-control form-control-solid @error('email') is-invalid @enderror"
                                    value="{{ old('email') }}" placeholder="email" />
                                @error('email')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-10">
                                <label for="exampleFormControlInput1" class="required form-label">INDIQUE SI ES ADMINISTRATIVO Ó
                                    DOCENTE </label>
                                <select class="form-select  form-select-solid @error('tipo_perfil') is-invalid @enderror"
                                    onchange="change_input(this)" name="tipo_perfil" id="tipo_perfil"
                                    aria-label="Select example">
                                    <option value="">Seleccione el tipo</option>
                                    <option value="DOCENTE">DOCENTE</option>
                                    <option value="ADMINISTRATIVO">ADMINISTRATIVO</option>
                                </select>
                                @error('tipo_perfil')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-10">
                                <label for="exampleFormControlInput1" class="required form-label">TELEFONO </label>
                                <input type="txtApeliidoMaterno" name="telefono"
                                    class="form-control form-control-solid @error('telefono') is-invalid @enderror"
                                    value="{{ old('telefono') }}" placeholder="TELEFONO" />
                                @error('telefono')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12" style="display: none" id="box_administrativo">
                            <div class="mb-10">
                                <label for="exampleFormControlInput1" class="required form-label">INGRESE LA UNIDAD A LA QUE
                                    PERTENECE</label>
                                <input type="text" name="tipo_perfil_unidad_admi" id="tipo_perfil_unidad_admi"
                                    class="form-control form-control-solid @error('tipo_perfil_unidad_admi') is-invalid @enderror"
                                    value="{{ old('tipo_perfil_unidad_admi') }}"
                                    placeholder="Nombre de la unidad en la que pertenece" />

                                @error('tipo_perfil_unidad_admi')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12" style="display: none" id="box_docente">
                            <div class="mb-10">
                                <label for="exampleFormControlInput1" class="required form-label">INDIQUE LA CATEGORÌA </label>
                                <select
                                    class="form-select  form-select-solid @error('tipo_perfil_unidad_doce') is-invalid @enderror"
                                    name="tipo_perfil_unidad_doce" id="tipo_perfil_unidad_doce" aria-label="Select example">
                                    <option value="">Seleccione LA CATEGORIA</option>
                                    <option value="TV">TV</option>
                                    <option value="MT">MT</option>
                                    <option value="TC">TC</option>
                                    <option value="DE">DE</option>
                                </select>
                                @error('tipo_perfil_unidad_doce')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!--end::Input group-->
                </div>
                <!--end::Card body-->

                <!--begin::Actions-->
                <div class="card-footer d-flex justify-content-end py-6 px-9">
                    <a type="reset" class="btn btn-light btn-active-light-primary me-2" href="{{route('profesoresdatos.index')}}">Cancelar</a>
                    <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">Guarder Cambios</button>

                </div>
                <!--end::Actions-->
                <input type="hidden">
            </form>
            <!--end::Form-->
        </div>
        <!--end::Content-->
    </div>

@endsection

@push('scripts')
    <script>
        function change_input(params) {
            console.log(params);
            if ($(params).val() == "DOCENTE") {
                $('#box_administrativo').hide();
                $('#box_docente').show();
            } else {
                $('#box_administrativo').show();
                $('#box_docente').hide();
            }
        }
    </script>
@endpush
