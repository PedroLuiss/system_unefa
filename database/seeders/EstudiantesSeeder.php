<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstudiantesSeeder extends Seeder
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
                'cedula'     => 29851361,
                'nombres'    => 'Pedro Luis',
                'primer_apellido'    => 'Rodiguez',
                'segundo_apellido'    => 'Rojas',
                'carreras_id'    =>1,
                'fe_ingreso'    => '2016-01-05',
                'inicio_programa'    => '1997-12-28',
                'sexo'    => 'Masculino',
                'sanguineo'    => 'O+',
                'edo_civil'    => 'Soltero',
                'condicion'    => 'En buenas condiciones',
                'etnia'    => 'Desconocidad',
                'discapacidad'    => 'Sin discapacidad',
                'pais'    => 'Venezuela',
                'fe_nac'    => '1997-12-28',
                'lugar_nac'    => 'Turen',
                'ciudad'    => 'Portugueza',
                'direccion'    => 'Desconocido',
                'tel_hab'    => 'Desconocido',
                'tel_cel'    => '0412-0421765',
                'email'    => 'Peluisrodriguez2@gmail.com',
            ],[
                'cedula'     => 29834361,
                'nombres'    => 'Bonifacio Comemato',
                'primer_apellido'    => 'Rocio',
                'segundo_apellido'    => 'Galatan',
                'carreras_id'    =>1,
                'fe_ingreso'    => '2016-01-05',
                'inicio_programa'    => '1997-12-28',
                'sexo'    => 'Masculino',
                'sanguineo'    => 'O+',
                'edo_civil'    => 'Soltero',
                'condicion'    => 'En buenas condiciones',
                'etnia'    => 'Desconocidad',
                'discapacidad'    => 'Sin discapacidad',
                'pais'    => 'Venezuela',
                'fe_nac'    => '1997-12-28',
                'lugar_nac'    => 'Turen',
                'ciudad'    => 'Portugueza',
                'direccion'    => 'Desconocido',
                'tel_hab'    => 'Desconocido',
                'tel_cel'    => '0412-0421765',
                'email'    => 'Bonifacio@gmail.com',
            ]
        ];
        DB::table('estudiantes')->insert($data);
    }
}
