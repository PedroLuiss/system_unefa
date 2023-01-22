<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfesoresSeeder extends Seeder
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
                'cedula'     => 12343568,
                'nombres'    => 'Eduar',
                'primer_apellido'    => 'Pereira',
                'segundo_apellido'    => 'Rojas',
                'especialidad'    =>'Ingenieria Sistema',

            ],[
                'cedula'     => 26846596,
                'nombres'    => 'Jose',
                'primer_apellido'    => 'guzman',
                'segundo_apellido'    => 'Peña',
                'especialidad'    =>'Ingenieria Sistema',

            ],[
                'cedula'     => 4234563,
                'nombres'    => 'Edecio',
                'primer_apellido'    => 'Freitez',
                'segundo_apellido'    => 'Mendoza',
                'especialidad'    =>'Ingenieria Electrica',

            ]
        ];
        DB::table('profesores')->insert($data);
    }
}
