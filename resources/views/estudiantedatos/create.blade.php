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
                <div style="display: flex; ">

                    <div class="mb-10 ">
                        <label for="exampleFormControlInput1" class="required form-label">CEDULA</label>
                        <input type="email" class="form-control form-control-solid" placeholder="Numero de Identidad"/>
                    </div>

                    <div class="mb-10 ">
                        <label for="exampleFormControlInput1" class="required form-label">NOMBRES</label>
                        <input type="email" class="form-control form-control-solid" placeholder="Nombres"/>
                    </div>
                    <div class="mb-10">
                        <label for="exampleFormControlInput1" class="required form-label">APELLIDOS</label>
                        <input type="email" class="form-control form-control-solid" placeholder="Apellidos"/>
                    </div>

                </div>

                <div style="display: flex; ">

                    <div class="mb-10 ">
                        <label for="exampleFormControlInput1" class="required form-label">TEL-HABITCION</label>
                        <input type="email" class="form-control form-control-solid" placeholder="NUMERO LOCAL"/>
                    </div>
                    <div class="mb-10">
                        <label for="exampleFormControlInput1" class="required form-label">TEL-MOVIL</label>
                        <input type="email" class="form-control form-control-solid" placeholder="NUMERO MOVIL"/>
                    </div>
                    <div class="mb-10">
                        <label for="exampleFormControlInput1" class="required form-label">DIRECCION</label>
                        <input type="email" class="form-control form-control-solid" placeholder="DIRECCION ACTUAL"/>
                    </div>

                </div>

                <div class="div" style="display: flex; padding: 10px;">

                        <select class="form-select form-select-transparent" aria-label="NUCLEO">
                            <option>NUCLEO</option>
                            <option value="1">LARA</option>
                            <option value="2">CHUAO</option>
                            <option value="3">PORTUGUESA</option>
                        </select>

                        <select class="form-select form-select-transparent" aria-label="Select example">
                            <option>COD_CARRERA</option>
                            <option value="1">1326</option>
                            <option value="2">1320</option>
                            <option value="3">1309</option>
                            <option value="3">1303</option>
                            <option value="3">1322</option>
                            <option value="3">1321</option>
                        </select>

                        <select class="form-select form-select-transparent" aria-label="Select example">
                            <option>CARRERA</option>
                            <option value="1">ING. SISTEMA</option>
                            <option value="2">ING. ELECTRICA</option>
                            <option value="3">ING. AGRONOMIA</option>
                            <option value="3">TSU ENFERMERIA</option>
                            <option value="3">LIC.ADMINISTRACION</option>
                            <option value="3">LIC.ECONOMIA</option>

                        </select>

                        <select class="form-select form-select-transparent" aria-label="Select example">
                            <option>ESTADO CIVIL</option>
                            <option value="1">SOLTERO/A</option>
                            <option value="2">CASADO/A</option>
                            <option value="3">VIUDO/A</option>
                        </select>

                        <select class="form-select form-select-transparent" aria-label="Select example">
                            <option>SANGUINEO</option>
                            <option value="1">O+</option>

                        </select>

                </div>


                <div class="div" style="display: flex; padding: 10px;">

                    <select class="form-select form-select-transparent" aria-label="Select example">
                        <option>CONDICION</option>
                        <option value="1">MILITAR</option>
                        <option value="2">CHUAO</option>
                        <option value="3">PORTUGUESA</option>
                    </select>

                    <select class="form-select form-select-transparent" aria-label="Select example">
                        <option>ETNIA</option>
                        <option value="1">iNDU</option>
                        <option value="2">NINGUNA</option>

                    </select>

                    <select class="form-select form-select-transparent" aria-label="Select example">
                        <option>DISCAPACIDAD</option>
                        <option value="1">ING. SISTEMA</option>
                        <option value="2">ING. ELECTRICA</option>
                        <option value="3">ING. AGRONOMIA</option>
                        <option value="3">TSU ENFERMERIA</option>
                        <option value="3">LIC.ADMINISTRACION</option>
                        <option value="3">LIC.ECONOMIA</option>

                    </select>

                    <select class="form-select form-select-transparent" aria-label="Select example">
                        <option>PÀIS</option>
                        <option value="1">VENEUZUELA</option>

                    </select>

                    <select class="form-select form-select-transparent" aria-label="Select example">
                        <option>CIUDAD</option>
                        <option value="1">BARQUISIMETO</option>

                    </select>

            </div>


        <div class="div" style="display: flex; padding:10px;">

            <div class="mb-10">
                <label for="exampleFormControlInput1" class="required form-label">FECHA NACIMIENTO</label>
                <input type="date" class="form-control form-control-solid" placeholder="Example input"/>
            </div>

            <div class="mb-10">
                <label for="exampleFormControlInput1" class="required form-label">FECHA INGRESO</label>
                <input type="date" class="form-control form-control-solid" placeholder="Example input"/>
            </div>

            <div class="mb-10">
                <label for="exampleFormControlInput1" class="required form-label">CORREO</label>
                <input type="email" class="form-control form-control-solid" placeholder="CORREO ELECTRONICO"/>
            </div>


        </div>
    </div>
        <div class="card-footer">
            UNEFA
        </div>
    </div>



    @endsection
