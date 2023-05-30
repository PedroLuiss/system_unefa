<?php

namespace App\Exports;

use App\Models\User;
use App\Models\Estudiantes;
use App\Models\GrupoSC;
use App\Models\GrupoSCEstudiante;
use Illuminate\Contracts\View\View;;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class ExportCS4 implements FromView, ShouldAutoSize,WithDrawings,WithStyles
{
    public $reques;

    function __construct(String $reques) {
        $this->reques= $reques;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view():View
    {
        // if($this->fase == 1){
            $data=[];
            $all_array_data=[];

            $array_request = explode('-',$this->reques);
            if ($array_request[0] == 1) {
                $data = GrupoSC::select('grupo_s_c_s.id','grupo_s_c_s.status','grupo_s_c_s.status','grupo_s_c_s.estado','grupo_s_c_s.direccion_comunidad','grupo_s_c_s.alianzas_estrategicas',
                'grupo_s_c_s.ferias','grupo_s_c_s.reunion_misiones','grupo_s_c_s.total_studiante','grupo_s_c_s.campanas','grupo_s_c_s.talleres','grupo_s_c_s.jornadas','grupo_s_c_s.charlas',
                'grupo_s_c_s.foros','grupo_s_c_s.cant_beneficiados','grupo_s_c_s.area_accion_project','grupo_s_c_s.vinc_project_planes_prog','grupo_s_c_s.telefono_tutor_comunitario',
                'grupo_s_c_s.cedula_tutor_comunitario','grupo_s_c_s.nombre_tutor_comunitario','grupo_s_c_s.nombre_comunidad','grupo_s_c_s.nombre_proyecto','profesores.id as id_profesor'
                ,'profesores.cedula','profesores.nombre','profesores.email',
                 'profesores.primer_apellido','profesores.segundo_apellido','profesores.especialidad','carreras.name as nombre_carrera','carreras.code as codigo_carrera','grupo_s_c_s.estado',
                 'grupo_s_c_s.total_studiante','grupo_s_c_s.status','grupo_s_c_s.created_at')
                 ->join('profesores', 'profesores.id','=', 'grupo_s_c_s.profesore_id')
                 ->join('carreras', 'carreras.id','=', 'grupo_s_c_s.carrera_id')
                 ->where('grupo_s_c_s.status','=',2)->where('grupo_s_c_s.estado','=',1)
                 ->whereYear('grupo_s_c_s.created_at', $array_request[1])
                 ->whereMonth('grupo_s_c_s.created_at','>=' , '01')
                 ->whereMonth('grupo_s_c_s.created_at','<=', '06')->get();



             }else{
                 $data = GrupoSC::select('grupo_s_c_s.id','grupo_s_c_s.status','grupo_s_c_s.status','grupo_s_c_s.estado','grupo_s_c_s.direccion_comunidad','grupo_s_c_s.alianzas_estrategicas',
                 'grupo_s_c_s.ferias','grupo_s_c_s.reunion_misiones','grupo_s_c_s.total_studiante','grupo_s_c_s.campanas','grupo_s_c_s.talleres','grupo_s_c_s.jornadas','grupo_s_c_s.charlas',
                 'grupo_s_c_s.foros','grupo_s_c_s.cant_beneficiados','grupo_s_c_s.area_accion_project','grupo_s_c_s.vinc_project_planes_prog','grupo_s_c_s.telefono_tutor_comunitario',
                 'grupo_s_c_s.cedula_tutor_comunitario','grupo_s_c_s.nombre_tutor_comunitario','grupo_s_c_s.nombre_comunidad','grupo_s_c_s.nombre_proyecto','profesores.id as id_profesor'
                 ,'profesores.cedula','profesores.nombre','profesores.email',
                  'profesores.primer_apellido','profesores.segundo_apellido','profesores.especialidad','carreras.name as nombre_carrera','carreras.code as codigo_carrera','grupo_s_c_s.estado',
                  'grupo_s_c_s.total_studiante','grupo_s_c_s.status','grupo_s_c_s.created_at')
                 ->join('profesores', 'profesores.id','=', 'grupo_s_c_s.profesore_id')
                 ->join('carreras', 'carreras.id','=', 'grupo_s_c_s.carrera_id')
                 ->where('grupo_s_c_s.status','=',2)->where('grupo_s_c_s.estado','=',1)
                 ->whereYear('grupo_s_c_s.created_at', $array_request[1])
                 ->whereMonth('grupo_s_c_s.created_at','>=' , '06')
                 ->whereMonth('grupo_s_c_s.created_at','<=', '12')->get();
             }


             foreach ($data as $key => $val) {
                $studen_all = GrupoSCEstudiante::select('*')
                ->join('estudiantecomunitarios', 'estudiantecomunitarios.estudiantes_id','=', 'grupo_s_c_estudiantes.estudiantes_id')
                ->join('estudiantes', 'estudiantes.id','=', 'grupo_s_c_estudiantes.estudiantes_id')
                ->join('carreras', 'carreras.id','=', 'estudiantes.carreras_id')
                ->where('grupo_s_c_estudiantes.grupo_s_c_id',$val->id)
                ->where('grupo_s_c_estudiantes.reprobo',0)->get();
                $all_array_data[$val->id] = $studen_all;
             }
            //  dd($data);
            return view('reporte.export-cs4',[
                'data' => $data,
                'student_array'=>$all_array_data
            ]);

        // }else{
            // $data = Estudiantes::select('estudiantes.id','estudiantes.cedula','estudiantes.fe_ingreso as periodo','estudiantecomunitarios.semestre',
            // 'estudiantecomunitarios.fase as fase_asignatura','carreras.name as nombre_carrera','carreras.num_plan_estudio','grupo_s_c_estudiantes.nota_eno as calificacion_fase_1',
            // 'grupo_s_c_estudiantes.nota_two as calificacion_fase_2','grupo_s_c_estudiantes.observaciones as observacion_fase1','grupo_s_c_estudiantes.observaciones_2 as observacion_fase2',
            // 'grupo_s_c_s.created_at as fecha_acta_grupo')
            // ->join('carreras', 'carreras.id','=', 'estudiantes.carreras_id')
            // ->join('estudiantecomunitarios', 'estudiantecomunitarios.estudiantes_id','=', 'estudiantes.id')
            // ->join('grupo_s_c_estudiantes', 'grupo_s_c_estudiantes.estudiantes_id','=', 'estudiantes.id')
            // ->join('grupo_s_c_s', 'grupo_s_c_s.id','=', 'grupo_s_c_estudiantes.grupo_s_c_id')
            // ->where('estudiantecomunitarios.fase',3)->get();

            // return view('reporte.exportexcel',[
            //     'data' => $data,
            //     'fase'=>$this->fase

            // ]);
        // }

    }

    public function drawings()
    {
        $drawing = new Drawing();
        $drawing->setName('Logo');
        $drawing->setDescription('This is my logo');
        $drawing->setPath(public_path('/logo_armada.jpg'));
        $drawing->setHeight(90);
        $drawing->setCoordinates('B1');

        $drawing2 = new Drawing();
        $drawing2->setName('Other image');
        $drawing2->setDescription('This is a second image');
        $drawing2->setPath(public_path('/logo_unefa.png'));
        $drawing2->setHeight(90);
        $drawing2->setCoordinates('AF1');

        return [$drawing, $drawing2];

    }

    public function styles(Worksheet $sheet)
    {
        return [

            // Styling a specific cell by coordinate.
            // 'B11' => ['font' => ['italic' => true],'display'=>['flex'=>true],'align-items'=>['center'=>true]],

        ];
    }
}

