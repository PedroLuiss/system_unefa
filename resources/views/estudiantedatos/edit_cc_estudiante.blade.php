@extends('layouts.app')

    @section('content')

    <div class="card shadow-sm">

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

                           
                        </div>


                        <button type="submit" class="btn btn-success gu" style="left: 40%; align-items: center; position: relative;">Actualizar Datos</button>
            </form>

        </div>

    </div>

    @endsection
