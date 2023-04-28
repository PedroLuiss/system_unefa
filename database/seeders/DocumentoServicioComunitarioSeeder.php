<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DocumentoServicioComunitarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'documento'    => 'CARPETA MARRON CON GANCHO TAMAÑO OFICIO CON ETIQUETA IDENTIFICADA DEL GRUPO DEL ANTEPROYECTO.',
                'fase'    => 1,
            ],[
                'documento'    => 'CARTA DE COMPROMISO DE LOS ESTUDIANTES.',
                'fase'    => 1,
            ],[
                'documento'    => 'PLANILLA DE INSCRIPCIÓN AL SERVICIO COMUNITARIO. (SC1)',
                'fase'    => 1,
            ],[
                'documento'    => 'CARTA DE ACEPTACI N DEL TUTOR ACAO MICO. (SCI-A).',
                'fase'    => 1,
            ],[
                'documento'    => 'CARTA DE ACEPTACION DEL TUTOR COMUNITARIO PARA LA PRESTACIÓN DE SERVICIO COMUNITARIO DEL ESTUDIANTE UNEFISTA (SCI-B).',
                'fase'    => 1,
            ],[
                'documento'    => 'CARTA DE POSTULACION.',
                'fase'    => 1,
            ],[
                'documento'    => 'DATOS DE LA TITUCION/ COMUNIDAD.',
                'fase'    => 1,
            ],[
                'documento'    => 'PLANILLA DE DATOS PERSONALES (CADA ESTUDIANTES DEL GRUPO).',
                'fase'    => 1,
            ],[
                'documento'    => 'FOTOCOPIA DE LA CÉDULA DE IDENTIDAD. (CADA ESTUDIANTES DEL GRUPO).',
                'fase'    => 1,
            ],[
                'documento'    => 'FOTOCOPIA DE LA PLANILLA DE INSCRIPCION GENERADA POR EL SICEU. CADA ESTUDIANTES DEL GRUPO).',
                'fase'    => 1,
            ],[
                'documento'    => 'RECORD ACADÉMICO. (CADA ESTUDIANTES DEL GRUPO).',
                'fase'    => 1,
            ],[
                'documento'    => '1er DIAGNOSTICO DE LA COMUNIDAD.',
                'fase'    => 1,
            ],[
                'documento'    => 'CONTRAPORTADA DEL ANTEPROYECTO.',
                'fase'    => 1,
            ],[
                'documento'    => 'PORTADA DEL ANTEPROYECTO.',
                'fase'    => 1,
            ],[
                'documento'    => 'NDICE.',
                'fase'    => 1,
            ],[
                'documento'    => 'PLANTEAMIENTO DEL PROBLEMA.',
                'fase'    => 1,
            ],[
                'documento'    => 'JUSTIFICACIÓN.',
                'fase'    => 1,
            ],[
                'documento'    => 'OBJETIVO GENERAL.',
                'fase'    => 1,
            ],[
                'documento'    => 'OBJETIVO ESPECIFICOS.',
                'fase'    => 1,
            ],[
                'documento'    => 'METAS.',
                'fase'    => 1,
            ],[
                'documento'    => 'COBERTURA GEOGRAFICA Y POBLACIÓN.',
                'fase'    => 1,
            ],[
                'documento'    => 'RESEÑA HISTORICA.',
                'fase'    => 1,
            ],[
                'documento'    => 'CUADRO DE ACTIVIDADES. ',
                'fase'    => 1,
            ],[
                'documento'    => 'RECURSOS. ',
                'fase'    => 1,
            ],[
                'documento'    => 'TIEMPOS.',
                'fase'    => 1,
            ],[
                'documento'    => 'DIAGRAMA DE GANTT. FIRMADA Y SELLADA POR LA COMUNIDAD/INSTITUCON.',
                'fase'    => 1,
            ],[
                'documento'    => 'DIAGNOSTICO DE LA COMUNIDAD. (1er DIAGNOSTICO DE LA COMUNIDAD). ',
                'fase'    => 1,
            ],[
                'documento'    => 'ARBOL DEL PROBLEMA.',
                'fase'    => 1,
            ],[
                'documento'    => 'ARBOL DEL OBJETIVOS.',
                'fase'    => 1,
            ],[
                'documento'    => 'CONTROL DE ASISTENCIA A TUTORIAS.',
                'fase'    => 1,
            ],[
                'documento'    => 'SINOPSIS DEL ANTEPROYECTO DEL SERVICIO COMUNITARIO.',
                'fase'    => 1,
            ],[
                'documento'    => 'CERTIFICADO DE REVISIÓN DEL ANTEPROYECTO FÍSICO (FIRMADO POR 32 EL TUTOR ACADÉMICO .',
                'fase'    => 1,
            ],[
                'documento'    => 'ACTA DE CONSIGNACION MENSUAL DE CONTROL DE ASISTENCIA Y EVALUACIÓN DE RENDIMIENTO (SC.2) MES DE _',
                'fase'    => 2,
            ],[
                'documento'    => 'PLANILLA DE CONTROL DE ASISTENCIA AL SERVICIO COMUNITARIO (SC.3) MES DE _',
                'fase'    => 2,
            ],[
                'documento'    => 'PLANILLA DE EVALUACIÓN MENSUAL DE RENDIMIENTO (SC.4) MES DE _ ',
                'fase'    => 2,
            ],[
                'documento'    => 'ACTA DE CONSIGNACIÓN MENSUAL DE CONTROL DE ASISTENCIA Y EVALUACION DE RENDIMIENTO (SC.2) MES DE _',
                'fase'    => 2,
            ],[
                'documento'    => 'PLANILLA DE CONTROL DE ASISTENCIA AL SERVICIO COMUNITARIO (SC.3) MES DE _',
                'fase'    => 2,
            ],[
                'documento'    => 'PLANILLA DE EVALUACION MENSUAL DE RENDIMIENTO (SC.4) MES DE _',
                'fase'    => 2,
            ],[
                'documento'    => 'ACTA DE CONSIGNACIÓN MENSUAL DE CONTROL DE ASISTENCIA Y EVALUACION DE RENDIMIENTO (SC.2) MES DE _',
                'fase'    => 2,
            ],[
                'documento'    => 'PLANILLA DE CONTROL DE ASISTENCIA AL SERVICIO COMUNITARIO (SC.3) MES DE _',
                'fase'    => 2,
            ],[
                'documento'    => 'PLANILLA DE EVALUACIÓN MENSUAL DE RENDIMIENTO (SC.4) MES DE _',
                'fase'    => 2,
            ],[
                'documento'    => 'ACTA DE CULMINACIÓN DE SERVICIO COMUNITARIO (SC.5) (consta de 4 páginas) ',
                'fase'    => 2,
            ],[
                'documento'    => 'PLANILLA DE ACTA DE CULMINACIÓN DEL SERVICIO COMUNITARIO (SC.6) (consta de 2 páginas)',
                'fase'    => 2,
            ],[
                'documento'    => 'CERTIFICADO DE REVISIÓN DE PROYECTO FINAL DIGITAL (FIRMADO POR EL TUTOR ACADÉMICO)',
                'fase'    => 2,
            ],[
                'documento'    => 'DESCRIPCION DE LAS ACTIVIDADES EJECUTADAS.',
                'fase'    => 2,
            ],[
                'documento'    => 'POBLACIÓN BENEFICIARIA.',
                'fase'    => 2,
            ],[
                'documento'    => 'IMPACTO GENERADO EN LA COMUNIDAD.',
                'fase'    => 2,
            ],[
                'documento'    => 'APORTES DEL PROYECTO.',
                'fase'    => 2,
            ],[
                'documento'    => 'MEMORIA FOTOGRAFICA DEL PROYECTO.',
                'fase'    => 2,
            ],[
                'documento'    => 'CONCLUSIONES Y RECOMENDACIONES.',
                'fase'    => 2,
            ],[
                'documento'    => 'BIBLIOGRAFIA.',
                'fase'    => 2,
            ],[
                'documento'    => 'ANEXOS.',
                'fase'    => 2,
            ],[
                'documento'    => 'RESUMEN DEL PROYECTO FINAL DE SERVICIO COMUNITARIO.',
                'fase'    => 2,
            ],[
                'documento'    => 'PROYECTO EN FORMATO DIGITAL (CD) (Caratula Rotulada).',
                'fase'    => 2,
            ]
        ];
        DB::table('documento_servicio_comunitarios')->insert($data);
    }
}
