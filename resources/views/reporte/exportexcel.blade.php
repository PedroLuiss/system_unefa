<table>
    <thead style="">

        <tr>
            <th>Cédula</th>
            <th>Período Académico</th>
            <th>Período de Formación </th>
            <th>Asignatura </th>
            <th>Numero plan de Estudios </th>
            <th>Calificación Final </th>
            <th>Condición Asignatura </th>
            <th>Fecha de Acta </th>
            <th>Observación </th>
            <th>CONDICION ESTUDIANTE</th>
        </tr>

    </thead>
    <tbody>
        @foreach ($data as $val)
            @php

                $fechaComoEntero = strtotime($val->periodo);
                $m = date('m', $fechaComoEntero);
                $y = date('Y', $fechaComoEntero);

                $periodo = $m >= 06 ? '2-' . $y : '1-' . $y;

                $periodo = $m >= 06 ? '2-' . $y : '1-' . $y;
            @endphp
            <tr>
                <td>{{ $val->cedula }}</td>
                <td>{{ $periodo }}</td>
                <td>Semestre:{{ $val->semestre }}</td>
                <td>
                    @if ($val->fase_asignatura == 2)
                        Taller: TAI-01
                    @else
                        Proyecto: PRO-01
                    @endif
                </td>
                <td>{{ $val->num_plan_estudio }}:{{ $val->nombre_carrera }}</td>
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
                <td>{{$val->fecha_acta_grupo->translatedFormat(' d/m/Y ');}}</td>
                <td>
                    @if ($val->fase_asignatura == 2)
                        {{ $val->observacion_fase1 }}
                    @else
                        {{ $val->observacion_fase2 }}
                    @endif
                </td>
                <td>REGULAR</td>
            </tr>
        @endforeach
    </tbody>
</table>