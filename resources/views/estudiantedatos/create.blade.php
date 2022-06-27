@extends('layouts.app')

    @section('content')

    <div class="card shadow-sm">
        <div class="card-header">
            <h3 class="card-title">Registro Estudiantes</h3>
            <div class="card-toolbar">
                <a href="{{route('estudiantedatos.index')}}" type="button" class="btn btn-sm btn-primary">Regresar</a>
            </div>
        </div>
        <div class="card-body card-scroll h-800px">

            <form action="{{route('estudiantedatos.store')}}" method="POST" novalidate>

                @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-10 ">
                                    <label for="exampleFormControlInput1" class="required form-label">CEDULA</label>
                                    <input type="txtCedula" name="cedula" class="form-control form-control-solid @error('cedula') is-invalid @enderror" value="{{old('cedula')}}" placeholder="Numero de Identidad"/>
                                    @error('cedula')
                                        <span class="invalid-feedback">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-10 ">
                                    <label for="exampleFormControlInput1" class="required form-label">NOMBRES</label>
                                    <input type="txtNombres" name="nombres" class="form-control form-control-solid @error('nombres') is-invalid @enderror" value="{{old('nombres')}}" placeholder="NOMBRES"/>
                                    @error('nombres')
                                        <span class="invalid-feedback">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-10">
                                    <label for="exampleFormControlInput1" class="required form-label">APELLIDO PATERNO</label>
                                    <input type="txtApellidoPaterno" name="primer_apellido"  class="form-control form-control-solid @error('primer_apellido') is-invalid @enderror" value="{{old('primer_apellido')}}" placeholder="APELLIDO PATERNO"/>
                                    @error('primer_apellido')
                                        <span class="invalid-feedback">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">

                            <div class="mb-10">
                                <label for="exampleFormControlInput1" class="required form-label">APELLIDO MATERNO  </label>
                                <input type="txtApeliidoMaterno" name="segundo_apellido"  class="form-control form-control-solid @error('segundo_apellido') is-invalid @enderror" value="{{old('segundo_apellido')}}" placeholder="APELLIDO MATERNO"/>
                                @error('segundo_apellido')
                                    <span class="invalid-feedback">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-10 ">
                                    <label for="exampleFormControlInput1" class="required form-label">TEL-HABITCION</label>
                                    <input type="txtNumeroLocal" name="tel_hab" class="form-control form-control-solid @error('tel_hab') is-invalid @enderror" value="{{old('tel_hab')}}" placeholder="NUMERO LOCAL"/>
                                    @error('tel_hab')
                                        <span class="invalid-feedback">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-10">
                                    <label for="exampleFormControlInput1" class="required form-label">TEL-MOVIL</label>
                                    <input type="txtNumeroMovil" name="tel_cel" class="form-control form-control-solid @error('tel_cel') is-invalid @enderror" value="{{old('tel_cel')}}" placeholder="NUMERO MOVIL"/>
                                    @error('tel_cel')
                                        <span class="invalid-feedback">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-10">
                                    <label for="exampleFormControlInput1" class="required form-label">CIUDAD</label>
                                    <input type="txtCiudad" name="ciudad" class="form-control form-control-solid @error('ciudad') is-invalid @enderror" value="{{old('ciudad')}}" placeholder="CIUDAD"/>
                                    @error('ciudad')
                                        <span class="invalid-feedback">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-4">
                                <div class="mb-10">
                                    <label for="exampleFormControlInput1" class="required form-label">DIRECCION</label>
                                    <input type="txtDireccion" name="direccion" class="form-control form-control-solid @error('direccion') is-invalid @enderror" value="{{old('direccion')}}" placeholder="DIRECCION ACTUAL"/>
                                    @error('direccion')
                                        <span class="invalid-feedback">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-10">
                                    <label for="exampleFormControlInput1" class="required form-label">LUGAR NACIMIENTO</label>
                                    <input type="txtLugarNac" name="lugar_nac" class="form-control form-control-solid @error('lugar_nac') is-invalid @enderror" value="{{old('lugar_nac')}}" placeholder="LUGAR NACIMIENTO"/>
                                    @error('lugar_nac')
                                        <span class="invalid-feedback">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-10">
                                    <label for="exampleFormControlInput1" class="required form-label">CORREO</label>
                                    <input type="email" name="email" class="form-control form-control-solid @error('email') is-invalid @enderror" value="{{old('email')}}" placeholder="CORREO ELECTRONICO"/>
                                    @error('email')
                                        <span class="invalid-feedback">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="div-lista" style="display: flex; padding: 15px; gap:20px;">

                            <select id="lista" class="form-select form-select-transparent @error('carrera') is-invalid @enderror" value="{{old('carrera')}} " name="carrera" aria-label="CARRERA">
                                <option>CARRERA</option>
                                    @foreach ($carreras as $val)
                                    <option value="{{$val->id}} ">{{$val->code." - ".$val->name}}</option>
                                    @endforeach

                                </select>
                                @error('carrera')
                                    <span class="invalid-feedback">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror

                            <select id="lista" class="form-select form-select-transparent " name="nucleo" aria-label="NUCLEO">
                                <option>NUCLEO</option>
                                <option value="LARA">LARA</option>
                                <option value="CHUAO">CHUAO</option>
                                <option value="PORTUGUESA">PORTUGUESA</option>
                            </select>

                            <select id="lista" class="form-select form-select-transparent" name="discapacidad" aria-label="Select example">
                                <option>DISCAPACIDAD</option>
                                <option value="COGNITIVA1">COGNITIVA</option>
                                <option value="MOTORA">MOTORA</option>
                                <option value="AUDITIVA">AUDITIVA</option>
                                <option value="VISUAL">VISUAL</option>
                                <option value="SIN DISCAPACIDAD">SIN DISCAPACIDAD</option>
                                <option value="OTRA ESPECIFIQUE EN OBSERVACIONES">OTRA (ESPECIFIQUE EN OBSERVACIONES)</option>

                            </select>

                        </div>

                        <div class="div-lista" style="display: flex; padding: 15px; gap:20px;">



                                <select id="lista" class="form-select form-select-transparent" name="edo_civil" aria-label="Select example">
                                    <option>ESTADO CIVIL</option>
                                    <option value="SOLTERO/A">SOLTERO/A</option>
                                    <option value="CASADO/A">CASADO/A</option>
                                    <option value="VIUDO/A">VIUDO/A</option>
                                    <option value="DIVORCIADO/A">DIVORCIADO/A</option>
                                    <option value="CONCUBINO/A">CONCUBINO/A</option>

                                </select>

                            <select id="lista" class="form-select form-select-transparent" name="condicion" aria-label="Select example">
                                <option>CONDICION</option>
                                <option value="MILITAR">MILITAR</option>
                                <option value="CIVIL">CIVIL</option>
                                <option value="MILICIA">MILICIA</option>
                                <option value="RESERVA ACTIVA">RESERVA ACTIVA</option>

                            </select>

                            <select id="lista" class="form-select form-select-transparent" name="sexo" aria-label="Select example">
                                <option>SEXO</option>
                                <option value="Masculino">Masculino</option>
                                <option value="Femenino">Femenino</option>

                            </select>

                        </div>


                        <div class="div-lista fe_nac" style="display: flex; padding: 15px; gap:20px;">



                            <select id="lista" class="form-select form-select-transparent" name="etnia" aria-label="Select example">
                                <option>ETNIA</option>
                                <option value="YANOMAMI">YANOMAMI</option>
                                <option value="AKAWAYO">AKAWAYO</option>
                                <option value="WAYUU">WAYÚU</option>
                                <option value="PUME">PUMÉ</option>
                                <option value="OTROS GRUPOS">OTROS GRUPOS</option>

                            </select>

                            <select id="lista" class="form-select form-select-transparent" name="pais" aria-label="Select example">
                                <option>PÀIS</option>
                                <option value="VENEUZUELA">VENEUZUELA</option>
                                <option value="EEUU">EEUU</option>

                            </select>


                            <select id="lista" class="form-select form-select-transparent " name="sanguineo"  aria-label="Select example">
                                <option>SANGUINEO</option>
                                <option value="O+">O+</option>
                                <option value="O-">O-</option>
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>

                            </select>

                        </div>


                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-10">
                                    <label for="exampleFormControlInput1" class="required form-label">FECHA NACIMIENTO</label>
                                    <input type="date" name="fe_nac" class="form-control form-control-solid @error('fe_nac') is-invalid @enderror" value="{{old('fe_nac')}}" placeholder="FECHA NACIMIENTO"/>
                                    @error('fe_nac')
                                        <span class="invalid-feedback">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-10">
                                    <label for="exampleFormControlInput1" class="required form-label">FECHA INGRESO</label>
                                    <input type="date" name="fe_ingreso" class="form-control form-control-solid @error('fe_ingreso') is-invalid @enderror" value="{{old('fe_ingreso')}}" placeholder="FECHA INGRESO"/>
                                    @error('fe_ingreso')
                                        <span class="invalid-feedback">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-10">
                                    <label for="exampleFormControlInput1" class="required form-label">INICIO PROGRAMA</label>
                                    <input type="date" name="inicio_programa" class="form-control form-control-solid @error('inicio_programa') is-invalid @enderror" value="{{old('inicio_programa')}}" placeholder="INICIO PROGRAMA"/>
                                    @error('inicio_programa')
                                        <span class="invalid-feedback">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>


                        <button type="submit" class="btn btn-success gu" style="left: 40%; align-items: center; position: relative;">Guardar Datos</button>
            </form>

        </div>

    </div>

    @endsection
