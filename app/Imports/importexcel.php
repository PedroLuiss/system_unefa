<?php

namespace App\Imports;

use App\Models\carrera;
use App\Models\estudiantes;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Validation\Rule;


class importexcel implements ToModel, WithHeadingRow, WithBatchInserts, WithChunkReading, WithValidation
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
   
    protected function formatDateExcel($date) { 
        if ('double' === gettype($date)) {
            $date = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($date);

            return $date->format('n/j/Y');
        }

        return $date;
    }

    public function model(array $row)
    {
        $names_all = explode(" ", $row['estudiante']);
        $data_carre = explode(" ", $row['cod_carrera']);
        $turno = $data_carre[count($data_carre)-1];

        return new Estudiantes([
            'cedula' => $row['cedula'],
            'nombres' => isset($names_all[0])?$names_all[0]." ".$names_all[1]:null,
            'primer_apellido'=>  isset($names_all[2])?$names_all[2]:null,
            'segundo_apellido'=> isset($names_all[3])?$names_all[3]:null,
            'carreras_id'=>  $this->carreras_data[$row['carrera']],
            'fe_ingreso'=>$this->formatDateExcel($row['fe_ingreso']),
            'inicio_programa'=>$this->formatDateExcel($row['inicio_programa']),
            'sexo'=>$row['sexo'],
            'sanguineo'=>$row['sanguineo'],
            'edo_civil'=>$row['edo_civil'],
            'condicion'=>$row['condicion'],
            'nucleo'=>$row['nucleo'],
            'etnia'=>$row['etnia'],
            'discapacidad'=>$row['discapacida'],
            'pais'=>$row['pais'],
            'fe_nac'=>$this->formatDateExcel($row['fe_nac']),
            'lugar_nac'=>$row['lugar_nac'],
            'ciudad'=>$row['ciudad'],
            'direccion'=>$row['direccion'],
            'tel_hab'=>$row['tel_hab'],
            'tel_cel'=>$row['tel_cel'],
            'email'=>$row['correo'],
            'turno'=>$turno
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
                'required',
                Rule::unique('estudiantes','email'),
                Rule::unique('estudiantes','cedula'),
            ],
            '*.estudiante' => [
                'required'
            ]
        ];
    }
}
