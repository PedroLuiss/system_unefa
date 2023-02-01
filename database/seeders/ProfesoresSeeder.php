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
                'nombre'    => 'Eduar',
                'primer_apellido'    => 'Pereira',
                'email'    => 'Pereira@gmail.com',
                'segundo_apellido'    => 'Rojas',
                'especialidad'    =>'Ingenieria Sistema',
                'email'    =>'1@gmail.com',

            ],[
                'cedula'     => 26846596,
                'nombre'    => 'Jose',
                'email'    => 'Jose@gmail.com',
                'primer_apellido'    => 'guzman',
                'segundo_apellido'    => 'Peña',
                'especialidad'    =>'Ingenieria Sistema',
                'email'    =>'1@gmail.com',

            ],[
                'cedula'     => 4234563,
                'nombre'    => 'Edecio',
                'email'    => 'Edecio@gmail.com',
                'primer_apellido'    => 'Freitez',
                'segundo_apellido'    => 'Mendoza',
                'especialidad'    =>'Ingenieria Electrica',
                'email'    =>'1@gmail.com',

            ]
        ];
        DB::table('profesores')->insert($data);
    }
}
