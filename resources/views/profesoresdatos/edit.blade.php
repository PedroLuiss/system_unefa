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

                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-10">
                                    <label for="exampleFormControlInput1" class="required form-label">INDIQUE SI ES ADMINISTRATIVO Ó DOCENTE </label>
                                    <select class="form-select  form-select-solid @error('tipo_perfil') is-invalid @enderror" onchange="change_input(this)" name="tipo_perfil" id="tipo_perfil" aria-label="Select example">
                                        <option value="">Seleccione el tipo</option>
                                        <option  value="DOCENTE" @if ($profe_ed->tipo_perfil == "DOCENTE")  selected @else @endif>DOCENTE</option>
                                        <option value="ADMINISTRATIVO" @if ($profe_ed->tipo_perfil == "ADMINISTRATIVO")  selected @else @endif>ADMINISTRATIVO</option>
                                    </select>
                                    @error('tipo_perfil')
                                        <span class="invalid-feedback">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12" @if ($profe_ed->tipo_perfil == "ADMINISTRATIVO")  @else  style="display: none"  @endif  id="box_administrativo">
                                <div class="mb-10">
                                    <label for="exampleFormControlInput1" class="required form-label">INGRESE LA UNIDAD A LA QUE PERTENECE</label>
                                    <input type="text" name="tipo_perfil_unidad_admi" id="tipo_perfil_unidad_admi" value="{{$profe_ed->tipo_perfil_unidad_admi}}" class="form-control form-control-solid @error('tipo_perfil_unidad_admi') is-invalid @enderror" value="{{old('tipo_perfil_unidad_admi')}}" placeholder="Nombre de la unidad en la que pertenece"/>

                                    @error('tipo_perfil_unidad_admi')
                                        <span class="invalid-feedback">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12" @if ($profe_ed->tipo_perfil == "DOCENTE")  @else  style="display: none"  @endif id="box_docente">
                                <div class="mb-10">
                                    <label for="exampleFormControlInput1" class="required form-label">INDIQUE LA CATEGORÌA </label>
                                    <select class="form-select  form-select-solid @error('tipo_perfil_unidad_doce') is-invalid @enderror" name="tipo_perfil_unidad_doce" id="tipo_perfil_unidad_doce" aria-label="Select example">
                                        <option value="">Seleccione LA CATEGORIA</option>
                                        <option value="TV"  @if ($profe_ed->tipo_perfil_unidad_doce == "TV") selected @endif >TV</option>
                                        <option value="MT" @if ($profe_ed->tipo_perfil_unidad_doce == "MT") selected @endif >MT</option>
                                        <option value="TC" @if ($profe_ed->tipo_perfil_unidad_doce == "TC") selected @endif >TC</option>
                                        <option value="TC" @if ($profe_ed->tipo_perfil_unidad_doce == "TC") selected @endif >TC</option>
                                    </select>
                                    @error('tipo_perfil_unidad_doce')
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


   @push('scripts')

   <script>

        function change_input(params) {
            console.log(params);
            if ($(params).val() == "DOCENTE") {
                $('#box_administrativo').hide();
                $('#box_docente').show();
            }else{
                $('#box_administrativo').show();
                $('#box_docente').hide();
            }
        }

   </script>
   @endpush
