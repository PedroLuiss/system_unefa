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
        <div class="card-body card-scroll h-300px">
                <div style="display: flex; ">

                    <div class="mb-10 ">
                        <label for="exampleFormControlInput1" class="required form-label">Cedula</label>
                        <input type="email" class="form-control form-control-solid" placeholder="Numero de Identidad"/>
                    </div>

                    <div class="mb-10 ">
                        <label for="exampleFormControlInput1" class="required form-label">Nombres</label>
                        <input type="email" class="form-control form-control-solid" placeholder="Nombres"/>
                    </div>
                    <div class="mb-10">
                        <label for="exampleFormControlInput1" class="required form-label">Apellidos</label>
                        <input type="email" class="form-control form-control-solid" placeholder="Apellidos"/>
                    </div>
                    <div class="mb-10">
                        <label for="exampleFormControlInput1" class="required form-label">x</label>
                        <input type="email" class="form-control form-control-solid" placeholder="Example input"/>
                    </div>

                </div>

                <div class="div" style="display: flex; padding: 5px;">

                        <select class="form-select form-select-transparent" aria-label="NUCLEO">
                            <option>NUCLEO</option>
                            <option value="1">LARA</option>
                            <option value="2">CHUAO</option>
                            <option value="3">PORTUGUESA</option>
                        </select>

                        <select class="form-select form-select-transparent" aria-label="Select example">
                            <option>CODIGO CARRERA</option>
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

                </div>


                <div class="div" style="display: flex; padding: 5px;">

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

            </div>
        </div>

        <div class="div" style="display: flex;">

            <div class="mb-0">
                <label class="form-label">Example</label>
                <input class="form-control form-control-solid" placeholder="Pick date rage" id="kt_daterangepicker_3"/>
            </div>

        </div>

        <div class="card-footer">
            UNEFA
        </div>
    </div>

    <script>
            $("#kt_daterangepicker_3").daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                minYear: 1901,
                maxYear: parseInt(moment().format("YYYY"),10)
            }, function(start, end, label) {
                var years = moment().diff(start, "years");
                alert("You are " + years + " years old!");
            }
        );
    </script>

    @endsection
