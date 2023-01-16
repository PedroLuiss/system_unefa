@extends('layouts.app')

    @section('content')

    <div class="card shadow-sm">

        <div class="card-body card-scroll h-800px">

            <form action="{{route('profesoresdatos.store')}}" method="POST" novalidate>

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

                            <div class="col-md-6">

                            <div class="mb-10">
                                <label for="exampleFormControlInput1" class="required form-label">ESPECIALIDAD</label>
                                <input type="txtEspecialidad" name="especialidad"  class="form-control form-control-solid @error('especialidad') is-invalid @enderror" value="{{old('especialidad')}}" placeholder="Especialidad"/>
                                @error('especialidad')
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

