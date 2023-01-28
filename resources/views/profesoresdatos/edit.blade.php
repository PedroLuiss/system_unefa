@extends('layouts.app')

    @section('content')

    <div class="card shadow-sm">

        <div class="card-body card-scroll h-800px">

            <form action="{{route('profesoresdatos.update')}}" method="POST" novalidate>
                @method('PUT')
                @csrf
                        <div class="row">
                            <input type="hidden" name="id" value="{{$profe_ed->id}}">

                            <div class="col-md-6">
                                <div class="mb-10 ">
                                    <label for="exampleFormControlInput1" class="required form-label">CEDULA</label>
                                    <input type="txtCedula" name="cedula" class="form-control form-control-solid @error('cedula') is-invalid @enderror" value="{{$profe_ed->cedula}}" placeholder="Numero de Identidad"/>
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
                                    <input type="txtNombres" name="nombres" class="form-control form-control-solid @error('nombres') is-invalid @enderror" value="{{$profe_ed->nombre}}" placeholder="NOMBRE"/>
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
                                    <input type="txtApellidoPaterno" name="primer_apellido"  class="form-control form-control-solid @error('primer_apellido') is-invalid @enderror" value="{{$profe_ed->primer_apellido}}" placeholder="APELLIDO PATERNO"/>
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
                                <input type="txtApeliidoMaterno" name="segundo_apellido"  class="form-control form-control-solid @error('segundo_apellido') is-invalid @enderror" value="{{$profe_ed->segundo_apellido}}" placeholder="APELLIDO MATERNO"/>
                                @error('segundo_apellido')
                                    <span class="invalid-feedback">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-10 ">
                                    <label for="exampleFormControlInput1" class="required form-label">ESPECIALIDAD</label>
                                    <input type="txtEspecialidad" name="especialidad" class="form-control form-control-solid @error('especialidad') is-invalid @enderror" value="{{$profe_ed->especialidad}}" placeholder="Especialidad"/>
                                    @error('tel_hab')
                                        <span class="invalid-feedback">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="mb-10 ">
                                    <label for="exampleFormControlInput1" class="required form-label">EMAIL</label>
                                    <input type="txtEspecialidad" name="email" class="form-control form-control-solid @error('email') is-invalid @enderror" value="{{$profe_ed->email}}" placeholder="Email"/>
                                    @error('email')
                                        <span class="invalid-feedback">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>
                              </div>

                        </div>


                        </div>


                        <button type="submit" class="btn btn-success gu" style="width: 30vw;position: relative;left: 18vw;margin-bottom: 1vw;">Actualizar Datos</button>
            </form>

        </div>

    </div>

    @endsection
