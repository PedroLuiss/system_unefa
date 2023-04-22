<?php

namespace App\Imports;

use App\Models\carrera;
use App\Models\Estudiantes;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class EstudiateServicioImport implements ToModel, WithHeadingRow, WithBatchInserts, WithChunkReading, WithValidation
{

    private $carreras_data;

    public function __construct()
    {
        $this->carreras_data = carrera::pluck('id', 'code');
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        $names_all = explode(" ", $row['estudiante']);
        $fe_ingr_ar = explode("-", $row['fe_ingreso']);

        $r = date($row['fe_ingreso']);
        return new Estudiantes([
            'cedula' => $row['cedula'],
            'nombres' => isset($names_all[0])?$names_all[0]." ".$names_all[1]:null,
            'primer_apellido'=>  isset($names_all[2])?$names_all[2]:null,
            'segundo_apellido'=> isset($names_all[3])?$names_all[3]:null,
            'carreras_id'=>  $this->carreras_data[$row['carrera']],
            'fe_ingreso'=>$fe_ingr_ar[0],
            'inicio_programa'=>date('Y-m-d',$row['inicio_programa']),
            'sexo'=>$row['sexo'],
            'sanguineo'=>$row['sanguineo'],
            'edo_civil'=>$row['edo_civil'],
            'condicion'=>$row['condicion'],
            'nucleo'=>$row['nucleo'],
            'etnia'=>$row['etnia'],
            'discapacidad'=>$row['discapacida'],
            'pais'=>$row['pais'],
            'fe_nac'=>date('Y-m-d',$row['fe_nac']),
            'lugar_nac'=>$row['lugar_nac'],
            'ciudad'=>$row['ciudad'],
            'direccion'=>$row['direccion'],
            'tel_hab'=>$row['tel_hab'],
            'tel_cel'=>$row['tel_cel'],
            'email'=>$row['correo'],
        ]);
    }

    public function batchSize(): int
    {
        return 4000;
    }

    public function chunkSize(): int
    {
        return 4000;
    }

    public function rules(): array
    {
        return [
            '*.cedula' => [
                'required'
            ],
            // '*.precio' => [
            //     'numeric',
            //     'required'
            // ]
        ];
    }
}
