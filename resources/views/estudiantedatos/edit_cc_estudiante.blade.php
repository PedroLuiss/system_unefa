@extends('layouts.app')

    @section('content')

    <div class="card shadow-sm">

        <div class="card-body card-scroll h-800px">

            <form action="{{route('estudiantedatos.update')}}" method="POST" novalidate>
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-5">
                            <label for="exampleFormControlInput1" class="required form-label">ESTUDIANTE C.C</label>
                            <select id="lista"
                                class="form-select form-select-transparent @error('estudiantes_id') is-invalid @enderror"
                                value="{{ old('estudiantes_id') }} " name="estudiantes_id">
                                <option>SELECCIONAR</option>
                                @foreach ($cc_estudiante as $val)
                                    <option  @if ($val->id==$estudent->estudiantes_id) selected  @endif value="{{ $val->id }} ">{{ $val->cedula . '-' . $val->nombres }}</option>
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
                            <select id="lista" class="form-select form-select-transparent" name="turno"
                                aria-label="Select example">
                                <option>SELECCIONAR</option>
                                <option @if ($val->id==$estudent->estudiantes_id) selected  @endif  value="DIURNO">DIURNO</option>
                                <option @if ($val->id==$estudent->estudiantes_id) selected  @endif value="NOCTURNO">NOCTURNO</option>

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


                        <button type="submit" class="btn btn-success gu" style="left: 40%; align-items: center; position: relative;">Actualizar Datos</button>
            </form>

        </div>

    </div>

    @endsection
