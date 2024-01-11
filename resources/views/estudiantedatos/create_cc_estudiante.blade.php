@extends('layouts.app')
@push('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/sweetalert2.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('m2/assets/plugins/global/plugins.bundle.css')}}">
@endpush
@section('content')
    <div class="card shadow-sm">
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder text-dark">Formulario de registro de Servicio Comunitario</span>
                <span class="text-muted mt-1 fw-bold fs-7">Todos los campos son obligatorios.</span>
            </h3>
        </div>

        <div class="card-body card-scroll h-800px">

            <form action="{{ route('estudiantedatos.store_cc_estudiante') }}" method="POST" novalidate>

                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-5">
                            <label for="exampleFormControlInput1" class="required form-label">ESTUDIANTE C.C</label>
                            {{-- <select id="lista" data-control="select2"
                                class="select2 form-select form-select-transparent @error('estudiantes_id') is-invalid @enderror"
                                value="{{ old('estudiantes_id') }} " name="estudiantes_id">
                                <option>SELECCIONAR</option>
                                @foreach ($cc_estudiante as $val)
                                    <option value="{{ $val->id }} ">{{ $val->cedula . '-' . $val->nombres }}</option>
                                @endforeach

                            </select> --}}
                            <select class="form-select  rounded-start-0  @error('estudiantes_id') is-invalid @enderror"  name="estudiantes_id" data-control="select2"
                                data-placeholder="Seleccionar Estudiantes" id="lista" >
                                <option></option>
                                @foreach ($cc_estudiante as $val)
                                    <option value="{{ $val->id }} ">{{ $val->cedula . '-' . $val->nombres }}</option>
                                @endforeach
                            </select>
                            @error('estudiantes_id')
                                <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-5">
                            <label for="exampleFormControlInput1" class="required form-label">TURNO D/N</label>
                            {{-- <select id="lista" class="form-select form-select-transparent" name="turno"
                                aria-label="Select example">
                                <option>SELECCIONAR</option>
                                <option value="DIURNO">DIURNO</option>
                                <option value="NOCTURNO">NOCTURNO</option>

                            </select> --}}
                            <select class="form-select  rounded-start-0 @error('estudiantes_id') is-invalid @enderror"  name="turno" data-control="select2"
                                data-placeholder="TURNO D/N " id="lista_turno" >
                                <option>SELECCIONAR</option>
                                <option value="DIURNO">DIURNO</option>
                                <option value="NOCTURNO">NOCTURNO</option>
                            </select>
                            @error('turno')
                                <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>



                </div>

                <div class="row">

                    <div class="col-md-6">
                        <div class="mb-5">
                            <label for="exampleFormControlInput1" class="required form-label">SEMESTRES 1/8</label>
                            <input type="txtSemestre" name="semestre"
                                class="form-control form-control-solid @error('semestre') is-invalid @enderror"
                                value="{{ old('semestre') }}" placeholder="SEMESTRE 1/8" />
                            @error('semestre')
                                <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-5">
                            <label for="exampleFormControlInput1" class="required form-label">SECCION</label>
                            <input type="txtSeccion" name="seccion"
                                class="form-control form-control-solid @error('seccion') is-invalid @enderror"
                                value="{{ old('seccion') }}" placeholder="SECCION" />
                            @error('seccion')
                                <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                </div>





                <button type="submit" class="btn btn-success gu mt-10"
                    style="left: 40%; align-items: center; position: relative;">Guardar Datos</button>
            </form>

        </div>

    </div>
@endsection
<script src="{{ asset('assets/js/sweet-alert/sweetalert.min.js') }}"></script>
<script src="{{ asset('assets/js/notify/bootstrap-notify.min.js') }}"></script>
<script src=""></script>

<script src="{{ asset('js/axios.min.js') }}"></script>
<script src="{{ asset('m2/assets/plugins/global/plugins.bundle.js') }}"></script>
