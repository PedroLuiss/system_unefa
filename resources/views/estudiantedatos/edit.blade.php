@extends('layouts.app')

    @section('content')

    <div class="card shadow-sm">
        <div class="card-header">
            <h3 class="card-title">Actualizacion Datos Estudiantes</h3>
            <div class="card-toolbar">
                <a href="{{route('home')}}" type="button" class="btn btn-sm btn-primary">Regresar</a>
            </div>
        </div>
        <div class="card-body card-scroll h-800px">

            <form action="{{route('estudiantedatos.update')}}" method="POST" novalidate>
                @method('PUT')
                @csrf
                        <div class="row">
                            <input type="hidden" name="id" value="{{$data['estudent']->id}}">

                            <div class="col-md-6">
                                <div class="mb-10 ">
                                    <label for="exampleFormControlInput1" class="required form-label">CEDULA</label>
                                    <input type="txtCedula" name="cedula" class="form-control form-control-solid @error('cedula') is-invalid @enderror" value="{{$data['estudent']->cedula}}" placeholder="Numero de Identidad"/>
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
                                    <input type="txtNombres" name="nombres" class="form-control form-control-solid @error('nombres') is-invalid @enderror" value="{{$data['estudent']->nombres}}" placeholder="NOMBRES"/>
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
                                    <input type="txtApellidoPaterno" name="primer_apellido"  class="form-control form-control-solid @error('primer_apellido') is-invalid @enderror" value="{{$data['estudent']->primer_apellido}}" placeholder="APELLIDO PATERNO"/>
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
                                <input type="txtApeliidoMaterno" name="segundo_apellido"  class="form-control form-control-solid @error('segundo_apellido') is-invalid @enderror" value="{{$data['estudent']->segundo_apellido}}" placeholder="APELLIDO MATERNO"/>
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
                                    <input type="txtNumeroLocal" name="tel_hab" class="form-control form-control-solid @error('tel_hab') is-invalid @enderror" value="{{$data['estudent']->tel_hab}}" placeholder="NUMERO LOCAL"/>
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
                                    <input type="txtNumeroMovil" name="tel_cel" class="form-control form-control-solid @error('tel_cel') is-invalid @enderror" value="{{$data['estudent']->tel_cel}}" placeholder="NUMERO MOVIL"/>
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
                                    <input type="txtCiudad" name="ciudad" class="form-control form-control-solid @error('ciudad') is-invalid @enderror" value="{{$data['estudent']->ciudad}}" placeholder="CIUDAD"/>
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
                                    <input type="txtDireccion" name="direccion" class="form-control form-control-solid @error('direccion') is-invalid @enderror" value="{{$data['estudent']->direccion}}" placeholder="DIRECCION ACTUAL"/>
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
                                    <input type="txtLugarNac" name="lugar_nac" class="form-control form-control-solid @error('lugar_nac') is-invalid @enderror" value="{{$data['estudent']->lugar_nac}}" placeholder="LUGAR NACIMIENTO"/>
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
                                    <input type="email" name="email" class="form-control form-control-solid @error('email') is-invalid @enderror" value="{{$data['estudent']->email}}" placeholder="CORREO ELECTRONICO"/>
                                    @error('email')
                                        <span class="invalid-feedback">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="div-lista" style="display: flex; padding: 15px; gap:20px;">

                            <select id="lista" class="form-select form-select-transparent @error('carrera') is-invalid @enderror"  name="carrera" aria-label="CARRERA">
                                <option>CARRERA</option>
                                    @foreach ($data['all_carreras'] as $val)

                                    <option value="{{$val->id}} "  @if ($data['estudent']->carreras_id==$val->id) selected  @endif>{{$val->code." - ".$val->name}}</option>
                                    @endforeach

                                </select>
                                @error('carrera')
                                    <span class="invalid-feedback">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror

                            <select id="lista" class="form-select form-select-transparent " name="nucleo" aria-label="NUCLEO">
                                <option>NUCLEO</option>
                                <option @if ($data['estudent']->nucleo=="LARA") selected  @endif value="LARA">LARA</option>
                                <option @if ($data['estudent']->nucleo=="CHUAO") selected  @endif value="CHUAO">CHUAO</option>
                                <option @if ($data['estudent']->nucleo=="PORTUGUESA") selected  @endif value="PORTUGUESA">PORTUGUESA</option>
                            </select>

                            <select id="lista" class="form-select form-select-transparent" name="discapacidad" aria-label="Select example">
                                <option>DISCAPACIDAD</option>
                                <option @if ($data['estudent']->discapacidad=="COGNITIVA1") selected  @endif  value="COGNITIVA1">COGNITIVA</option>
                                <option @if ($data['estudent']->discapacidad=="MOTORA") selected  @endif  value="MOTORA">MOTORA</option>
                                <option @if ($data['estudent']->discapacidad=="AUDITIVA") selected  @endif  value="AUDITIVA">AUDITIVA</option>
                                <option @if ($data['estudent']->discapacidad=="VISUAL") selected  @endif  value="VISUAL">VISUAL</option>
                                <option @if ($data['estudent']->discapacidad=="SIN DISCAPACIDAD") selected  @endif  value="SIN DISCAPACIDAD">SIN DISCAPACIDAD</option>
                                <option @if ($data['estudent']->discapacidad=="OTRA ESPECIFIQUE EN OBSERVACIONES") selected  @endif  value="OTRA ESPECIFIQUE EN OBSERVACIONES">OTRA (ESPECIFIQUE EN OBSERVACIONES)</option>

                            </select>

                        </div>

                        <div class="div-lista" style="display: flex; padding: 15px; gap:20px;">



                                <select id="lista" class="form-select form-select-transparent" name="edo_civil" aria-label="Select example">
                                    <option>ESTADO CIVIL</option>
                                    <option @if ($data['estudent']->edo_civil=="SOLTERO/A") selected  @endif value="SOLTERO/A">SOLTERO/A</option>
                                    <option @if ($data['estudent']->edo_civil=="CASADO/A") selected  @endif value="CASADO/A">CASADO/A</option>
                                    <option @if ($data['estudent']->edo_civil=="VIUDO/A") selected  @endif value="VIUDO/A">VIUDO/A</option>
                                    <option @if ($data['estudent']->edo_civil=="DIVORCIADO/A") selected  @endif value="DIVORCIADO/A">DIVORCIADO/A</option>
                                    <option @if ($data['estudent']->edo_civil=="CONCUBINO/A") selected  @endif value="CONCUBINO/A">CONCUBINO/A</option>

                                </select>

                            <select id="lista" class="form-select form-select-transparent" name="condicion" aria-label="Select example">
                                <option>CONDICION</option>
                                <option  @if ($data['estudent']->condicion=="MILITAR") selected  @endif value="MILITAR">MILITAR</option>
                                <option  @if ($data['estudent']->condicion=="CIVIL") selected  @endif value="CIVIL">CIVIL</option>
                                <option  @if ($data['estudent']->condicion=="MILICIA") selected  @endif value="MILICIA">MILICIA</option>
                                <option  @if ($data['estudent']->condicion=="RESERVA ACTIVA") selected  @endif value="RESERVA ACTIVA">RESERVA ACTIVA</option>

                            </select>

                            <select id="lista" class="form-select form-select-transparent" name="sexo" aria-label="Select example">
                                <option>SEXO</option>
                                <option  @if ($data['estudent']->sexo=="Masculino") selected  @endif value="Masculino">Masculino</option>
                                <option  @if ($data['estudent']->sexo=="Femenino") selected  @endif value="Femenino">Femenino</option>

                            </select>

                        </div>


                        <div class="div-lista fe_nac" style="display: flex; padding: 15px; gap:20px;">



                            <select id="lista" class="form-select form-select-transparent" name="etnia" aria-label="Select example">
                                <option>ETNIA</option>
                                <option  @if ($data['estudent']->etnia=="YANOMAMI") selected  @endif value="YANOMAMI">YANOMAMI</option>
                                <option  @if ($data['estudent']->etnia=="AKAWAYO") selected  @endif value="AKAWAYO">AKAWAYO</option>
                                <option @if ($data['estudent']->etnia=="WAYUU") selected  @endif  value="WAYUU">WAYÚU</option>
                                <option @if ($data['estudent']->etnia=="PUME") selected  @endif  value="PUME">PUMÉ</option>
                                <option @if ($data['estudent']->etnia=="OTROS GRUPOS") selected  @endif  value="OTROS GRUPOS">OTROS GRUPOS</option>

                            </select>

                            <select id="lista" class="form-select form-select-transparent" name="pais" aria-label="Select example">
                                <option>PÀIS</option>
                                <option  @if ($data['estudent']->pais=="VENEUZUELA") selected  @endif value="VENEUZUELA">VENEUZUELA</option>
                                <option @if ($data['estudent']->pais=="EEUU") selected  @endif  value="EEUU">EEUU</option>

                            </select>


                            <select id="lista" class="form-select form-select-transparent " name="sanguineo"  aria-label="Select example">
                                <option>SANGUINEO</option>
                                <option @if ($data['estudent']->sanguineo=="O+") selected  @endif  value="O+">O+</option>
                                <option  @if ($data['estudent']->sanguineo=="O-") selected  @endif value="O-">O-</option>
                                <option  @if ($data['estudent']->sanguineo=="A+") selected  @endif value="A+">A+</option>
                                <option  @if ($data['estudent']->sanguineo=="A-") selected  @endif value="A-">A-</option>
                                <option @if ($data['estudent']->sanguineo=="B+") selected  @endif  value="B+">B+</option>
                                <option @if ($data['estudent']->sanguineo=="B-") selected  @endif  value="B-">B-</option>
                                <option  @if ($data['estudent']->sanguineo=="AB+") selected  @endif value="AB+">AB+</option>
                                <option  @if ($data['estudent']->sanguineo=="AB-") selected  @endif value="AB-">AB-</option>

                            </select>

                        </div>


                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-10">
                                    <label for="exampleFormControlInput1" class="required form-label">FECHA NACIMIENTO</label>
                                    <input type="date" name="fe_nac" class="form-control form-control-solid @error('fe_nac') is-invalid @enderror" value="{{$data['estudent']->fe_nac}}" placeholder="FECHA NACIMIENTO"/>
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
                                <input type="date" name="fe_ingreso" class="form-control form-control-solid @error('fe_ingreso') is-invalid @enderror" value="{{$data['estudent']->fe_ingreso}}" placeholder="FECHA INGRESO"/>
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
                                    <input type="date" name="inicio_programa" class="form-control form-control-solid @error('inicio_programa') is-invalid @enderror" value="{{$data['estudent']->inicio_programa}}" placeholder="INICIO PROGRAMA"/>
                                    @error('inicio_programa')
                                        <span class="invalid-feedback">
                                            <strong>{{$message}}</strong>
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
