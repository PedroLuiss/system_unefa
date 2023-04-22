<?php

namespace App\Imports;

use App\Models\estudiantes;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\withHeadingRow;


class importexcel implements ToModel, withHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new estudiantes([
            
        'cedula'          => $row['cedula'],
        'nombres'         => $row['estudiante'],
       
        'nucleo' => $row['nucleo'],
        'cod_carrera'     => $row['cod_carrera'],
        'carrera'      => $row['carrera'],
        'fe_ingreso' => $row['fe_ingreso'],
        'inicio_programa'            => $row['inicio_programa'],
        'sexo'       => $row['sexo'],
        'sanguineo'       => $row['sanguineo'],
        'edo_civil'       => $row['edo_civil'],
        'condicion'          => $row['condicion'],
        'etnia'           => $row['etnia'],
        'discapacidad'    => $row['discapacida'],
        'pais'            => $row['pais'],
        'fe_nac'          => $row['fe_nac'],
        'lugar_nac'       => $row['lugar_nac'],
        'ciudad'          => $row['ciudad'],
        'direccion'       => $row['direccion'],
        'tel_hab'         => $row['tel_hab'],
        'tel_cel'         => $row['tel_cel'],
        'email'           => $row['correo']
        ]);
    }
}
