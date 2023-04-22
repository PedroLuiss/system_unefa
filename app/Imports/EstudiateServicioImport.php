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
        return new Estudiantes([
            'cedula' => $row['cedula'],
            'nombres' => isset($names_all[0])?$names_all[0]." ".$names_all[1]:null,
            'primer_apellido'=>  isset($names_all[2])?$names_all[2]:null,
            'segundo_apellido'=> isset($names_all[3])?$names_all[3]:null,
            'carreras_id'=>  $this->carreras_data[$row['carrera']],
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
