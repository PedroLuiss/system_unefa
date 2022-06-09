@extends('layouts.app')

    @section('content')

    <div class="card shadow-sm">
        <div class="card-header">
            <h3 class="card-title">Registro Estudiantes</h3>
            <div class="card-toolbar">
                <button type="button" class="btn btn-sm btn-light">
                    Action
                </button>
            </div>
        </div>
        <div class="card-body card-scroll h-400px">

            <form action="{{route('estudiantedatos.store')}}" method="POST" >

                @csrf
                        <div style="display: flex; ">

                            <div class="mb-10 ">
                                <label for="exampleFormControlInput1" class="required form-label">CEDULA</label>
                                <input type="txtCedula" name="cedula" class="form-control form-control-solid" placeholder="Numero de Identidad"/>
                            </div>

                            <div class="mb-10 ">
                                <label for="exampleFormControlInput1" class="required form-label">NOMBRES</label>
                                <input type="txtNombres" name="nombres" class="form-control form-control-solid" placeholder="NOMBRES"/>
                            </div>
                            <div class="mb-10">
                                <label for="exampleFormControlInput1" class="required form-label">APELLIDO PATERNO</label>
                                <input type="txtApellidoPaterno" name="primer_apellido"  class="form-control form-control-solid" placeholder="APELLIDO PATERNO"/>
                            </div>

                            <div class="mb-10">
                                <label for="exampleFormControlInput1" class="required form-label">APELLIDO MATERNO  </label>
                                <input type="txtApeliidoMaterno" name="segundo_apellido"  class="form-control form-control-solid" placeholder="APELLIDO MATERNO"/>
                            </div>
                            <select class="form-select form-select-transparent" name="carrera" aria-label="NUCLEO">
                                <option>CARRERAS</option>
                                    @foreach ($carreras as $val)
                                    <option value="{{$val->id}}">{{$val->code." ".$val->name}}</option>
                                    @endforeach
                            </select>

                        </div>

                        <div style="display: flex; ">

                            <div class="mb-10 ">
                                <label for="exampleFormControlInput1" class="required form-label">TEL-HABITCION</label>
                                <input type="txtNumeroLocal" name="tel_hab" class="form-control form-control-solid" placeholder="NUMERO LOCAL"/>
                            </div>

                            <div class="mb-10">
                                <label for="exampleFormControlInput1" class="required form-label">TEL-MOVIL</label>
                                <input type="txtNumeroMovil" name="tel_cel" class="form-control form-control-solid" placeholder="NUMERO MOVIL"/>
                            </div>

                            <div class="mb-10">
                                <label for="exampleFormControlInput1" class="required form-label">CIUDAD</label>
                                <input type="txtCiudad" name="ciudad" class="form-control form-control-solid" placeholder="CIUDAD"/>
                            </div>

                        </div>

                        <div style="display: flex; ">


                            <div class="mb-10">
                                <label for="exampleFormControlInput1" class="required form-label">DIRECCION</label>
                                <input type="txtDireccion" name="direccion" class="form-control form-control-solid" placeholder="DIRECCION ACTUAL"/>
                            </div>

                            <div class="mb-10">
                                <label for="exampleFormControlInput1" class="required form-label">LUGAR NACIMIENTO</label>
                                <input type="txtLugarNac" name="lugar_nac" class="form-control form-control-solid" placeholder="LUGAR NACIMIENTO"/>
                            </div>

                        </div>

                        <div class="div" style="display: flex; padding: 10px;">

                                <select class="form-select form-select-transparent" name="nucleo" aria-label="NUCLEO">
                                    <option>NUCLEO</option>
                                    <option value="LARA">LARA</option>
                                    <option value="CHUAO">CHUAO</option>
                                    <option value="PORTUGUESA">PORTUGUESA</option>
                                </select>

                                <select class="form-select form-select-transparent" name="edo_civil" aria-label="Select example">
                                    <option>ESTADO CIVIL</option>
                                    <option value="SOLTERO/A">SOLTERO/A</option>
                                    <option value="CASADO/A">CASADO/A</option>
                                    <option value="VIUDO/A">VIUDO/A</option>
                                    <option value="DIVORCIADO/A">DIVORCIADO/A</option>
                                    <option value="CONCUBINO/A">CONCUBINO/A</option>

                                </select>

                            <select class="form-select form-select-transparent" name="condicion" aria-label="Select example">
                                <option>CONDICION</option>
                                <option value="MILITAR">MILITAR</option>
                                <option value="CIVIL">CIVIL</option>
                                <option value="MILICIA">MILICIA</option>
                                <option value="RESERVA ACTIVA">RESERVA ACTIVA</option>

                            </select>

                            <select class="form-select form-select-transparent" name="sexo" aria-label="Select example">
                                <option>SEXO</option>
                                <option value="Masculino">Masculino</option>
                                <option value="Femenino">Femenino</option>

                            </select>

                        </div>


                        <div class="div" style="display: flex; padding: 10px;">



                            <select class="form-select form-select-transparent" name="etnia" aria-label="Select example">
                                <option>ETNIA</option>
                                <option value="YANOMAMI">YANOMAMI</option>
                                <option value="AKAWAYO">AKAWAYO</option>
                                <option value="WAYUU">WAYÚU</option>
                                <option value="PUME">PUMÉ</option>
                                <option value="OTROS GRUPOS">OTROS GRUPOS</option>

                            </select>

                            <select class="form-select form-select-transparent" name="discapacidad" aria-label="Select example">
                                <option>DISCAPACIDAD</option>
                                <option value="COGNITIVA1">COGNITIVA</option>
                                <option value="MOTORA">MOTORA</option>
                                <option value="AUDITIVA">AUDITIVA</option>
                                <option value="VISUAL">VISUAL</option>
                                <option value="SIN DISCAPACIDAD">SIN DISCAPACIDAD</option>
                                <option value="OTRA ESPECIFIQUE EN OBSERVACIONES">OTRA (ESPECIFIQUE EN OBSERVACIONES)</option>

                            </select>

                            <select class="form-select form-select-transparent" name="pais" aria-label="Select example">
                                <option>PÀIS</option>
                                <option value="VENEUZUELA">VENEUZUELA</option>
                                <option value="EEUU">EEUU</option>

                            </select>


                            <select class="form-select form-select-transparent " name="sanguineo"  aria-label="Select example">
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


                        <div class="div" style="display: flex; padding:10px;">

                            <div class="mb-10">
                                <label for="exampleFormControlInput1" class="required form-label">FECHA NACIMIENTO</label>
                                <input type="date" name="fe_nac" class="form-control form-control-solid" placeholder="FECHA NACIMIENTO"/>
                            </div>

                            <div class="mb-10">
                                <label for="exampleFormControlInput1" class="required form-label">FECHA INGRESO</label>
                                <input type="date" name="fe_ingreso" class="form-control form-control-solid" placeholder="FECHA INGRESO"/>
                            </div>

                            <div class="mb-10">
                                <label for="exampleFormControlInput1" class="required form-label">INICIO PROGRAMA</label>
                                <input type="date" name="inicio_programa" class="form-control form-control-solid" placeholder="INICIO PROGRAMA"/>
                            </div>

                            <div class="mb-10">
                                <label for="exampleFormControlInput1" class="required form-label">CORREO</label>
                                <input type="email" name="email" class="form-control form-control-solid" placeholder="CORREO ELECTRONICO"/>
                            </div>




                        </div>


                        <button type="submit" class="btn btn-primary"> GUARDAR </button>
            </form>

    </div>
        <div class="card-footer">
            UNEFA

        </div>
    </div>

    @endsection
