<table>
    <thead style="">
        <tr>
            <th colspan="10" style="text-align: center">MINISTERIO DEL PODER POPULAR PARA LA DEFENSA</th>
        </tr>
        <tr>
            <th colspan="10" style="text-align: center">MINISTERIO DEL PODER POPULAR PARA LA EDUCACIÓN UNIVERSITARIA</th>
        </tr>
        <tr>
            <th colspan="10" style="text-align: center">UNIVERSIDAD NACIONAL EXPERIMENTAL POLITÉCNICA DE LA FUERZA ARMADA NACIONAL BOLIVARIANA</th>
        </tr>
        <tr>
            <th colspan="10" style="text-align: center">VICERRECTORADO DE INVESTIGACIÓN, DESARROLLO E INNOVACIÓN</th>
        </tr>
        <tr>
            <th colspan="10" style="text-align: center">COORDINACIÓN DE POSTGRADO Y EXTENSIÓN UNIVERSITARIA</th>
        </tr>
        <tr>
            <th colspan="10" style="text-align: center">UNIDAD DE EXTENSIÓN</th>
        </tr>
        <tr>
            <th style="text-align: center"></th>
            <th style="text-align: center"></th>
            <th style="text-align: center"></th>
            <th style="text-align: center"></th>
            <th style="text-align: center"></th>
            <th style="text-align: center"></th>
            <th style="text-align: center"></th>
            <th style="text-align: center"></th>
            <th style="text-align: center"></th>
            <th style="text-align: center"></th>
            <th style="text-align: center"></th>
        </tr>
        <tr>
            <th style="background-color: #f5f8fa;border: 1px solid black;padding: 6px; font-weight: 700">Cédula</th>
            <th style="background-color: #f5f8fa;border: 1px solid black;padding: 6px; font-weight: 700">Período Académico</th>
            <th style="background-color: #f5f8fa;border: 1px solid black;padding: 6px; font-weight: 700">Período de Formación </th>
            <th style="background-color: #f5f8fa;border: 1px solid black;padding: 6px; font-weight: 700">Asignatura </th>
            <th style="background-color: #f5f8fa;border: 1px solid black;padding: 6px; font-weight: 700">Numero plan de Estudios </th>
            <th style="background-color: #f5f8fa;border: 1px solid black;padding: 6px; font-weight: 700">Calificación Final </th>
            <th style="background-color: #f5f8fa;border: 1px solid black;padding: 6px; font-weight: 700">Condición Asignatura </th>
            <th style="background-color: #f5f8fa;border: 1px solid black;padding: 6px; font-weight: 700">Fecha de Acta </th>
            <th style="background-color: #f5f8fa;border: 1px solid black;padding: 6px; font-weight: 700">Observación </th>
            <th style="background-color: #f5f8fa;border: 1px solid black;padding: 6px; font-weight: 700">CONDICION ESTUDIANTE</th>
        </tr>

    </thead>
    <tbody>
        @isset($cant_data)
            @for ($i = 0; $i < $cant_data; $i++)
                @foreach ($data[$i] as $val)
                {{-- <tr>
                    <td>{{ $val->cedula }}</td>
                </tr> --}}

                    @php
                        $date = new DateTime($val->fecha_acta_grupo);

                        $fechaComoEntero = strtotime($val->periodo);
                        $m = date('m', $fechaComoEntero);
                        $y = date('Y', $fechaComoEntero);

                        $periodo = $m >= 06 ? '2-' . $y : '1-' . $y;

                    @endphp
                    @if ($fase_request == 0)
                        @if ($val->calificacion_fase_1!=null || $val->calificacion_fase_2 !=null)
                            @for ($g = 1; $g <=2 ; $g++)
                                @if ($g == 1)
                                    @if (!$val->calificacion_fase_1 == null)
                                    <tr>
                                        <td>{{ $val->cedula }}</td>
                                        <td>{{ $periodo }}</td>
                                        <td>{{ $val->semestre }} SEMESTRE</td>
                                        <td>
                                            TAI-01
                                        </td>
                                        <td>{{ $val->num_plan_estudio }}</td>
                                        <td>
                                            {{ $val->calificacion_fase_1 }}
                                        </td>
                                        <td>
                                            @if ($val->calificacion_fase_1>=10)
                                                APROBO
                                            @else
                                                REPROBO
                                            @endif

                                        </td>
                                        <td>{{$date->format('Y-m-d');}}</td>
                                        <td>
                                            {{ $val->observacion_fase1 }}
                                        </td>
                                        <td>REGULAR</td>
                                    </tr>
                                    @endif
                                @endif

                                @if ($g == 2)
                                    @if (!$val->calificacion_fase_2 == null)
                                    <tr>
                                        <td>{{ $val->cedula }}</td>
                                        <td>{{ $periodo }}</td>
                                        <td>{{ $val->semestre }} SEMESTRE</td>
                                        <td>
                                            PRO-01
                                        </td>
                                        <td>{{ $val->num_plan_estudio }}</td>
                                        <td>
                                            {{ $val->calificacion_fase_2 }}
                                        </td>
                                        <td>
                                            @if ($val->calificacion_fase_2>=10)
                                                APROBO
                                            @else
                                                REPROBO
                                            @endif
                                        </td>
                                        <td>{{$date->format('Y-m-d');}}</td>
                                        <td>
                                            {{ $val->observacion_fase2 }}
                                        </td>
                                        <td>REGULAR</td>
                                    </tr>
                                    @endif
                                @endif

                            @endfor
                        @endif
                    @else
                    <tr>
                        <td>{{ $val->cedula }}</td>
                        <td>{{ $periodo }}</td>
                        <td>{{ $val->semestre }} SEMESTRE</td>
                        <td>
                            @if ($val->fase_asignatura == 2)
                                TAI-01
                            @else
                                PRO-01
                            @endif
                        </td>
                        <td>{{ $val->num_plan_estudio }}</td>
                        <td>
                            @if ($val->fase_asignatura == 2)
                                {{ $val->calificacion_fase_1 }}
                            @else
                                {{ $val->calificacion_fase_2 }}
                            @endif
                        </td>
                        <td>
                            @if ($val->fase_asignatura == 2)
                                @if ($val->calificacion_fase_1>=10)
                                    APROBO
                                @else
                                    REPROBO
                                @endif
                            @else
                                @if ($val->calificacion_fase_2>=10)
                                    APROBO
                                @else
                                    REPROBO
                                @endif
                            @endif
                        </td>
                        <td>{{$date->format('Y-m-d');}}</td>
                        <td>
                            @if ($val->fase_asignatura == 2)
                                {{ $val->observacion_fase1 }}
                            @else
                                {{ $val->observacion_fase2 }}
                            @endif
                        </td>
                        <td>REGULAR</td>
                    </tr>
                    @endif

                @endforeach
            @endfor

        @endisset
    </tbody>
</table>
