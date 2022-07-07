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
                'inicio_programa'    => '2016-01-24',
                'sexo'    => 'MASCULINO',
                'sanguineo'    => 'O+',
                'edo_civil'    => 'SOLTERO',
                'condicion'    => 'CIVIL',
                'nucleo'    => 'LARA',
                'etnia'    => 'OTROS GRUPOS',
                'discapacidad'    => 'SIN DISCAPACIDAD',
                'pais'    => 'VENEZUELA',
                'fe_nac'    => '1997-12-28',
                'lugar_nac'    => 'TUREN',
                'ciudad'    => 'PORTUGUEZA',
                'direccion'    => 'La ruezga sur',
                'tel_hab'    => '02519288938',
                'tel_cel'    => '0412-0421765',
                'email'    => 'Peluisrodriguez2@gmail.com',
            ],[
                'cedula'     => 26846596,
                'nombres'    => 'Glomarys Alexandra',
                'primer_apellido'    => 'Guedez',
                'segundo_apellido'    => 'Peña',
                'carreras_id'    =>1,
                'fe_ingreso'    => '2016-01-05',
                'inicio_programa'    => '2016-05-24',
                'sexo'    => 'FEMENINO',
                'sanguineo'    => 'O+',
                'edo_civil'    => 'SOLTERO',
                'condicion'    => 'CIVIL',
                'nucleo'    => 'LARA',
                'etnia'    => 'OTROS GRUPOS',
                'discapacidad'    => 'SIN DISCAPACIDAD',
                'pais'    => 'VENEZUELA',
                'fe_nac'    => '1998-07-16',
                'lugar_nac'    => 'HOSPITAL CENTRAL ESTADO LARA',
                'ciudad'    => 'BARQUISIMETO',
                'direccion'    => 'la nueva lucha',
                'tel_hab'    => '02514439001',
                'tel_cel'    => '0412-5360016',
                'email'    => 'glomarysguedez.la@gmail.com',
            ],[
                'cedula'     => 26399566,
                'nombres'    => 'Yixon Smith',
                'primer_apellido'    => 'Montes',
                'segundo_apellido'    => 'Mendoza',
                'carreras_id'    =>1,
                'fe_ingreso'    => '2015-09-24',
                'inicio_programa'    => '2015-09-28',
                'sexo'    => 'MASCULINO',
                'sanguineo'    => 'O+',
                'edo_civil'    => 'SOLTERO',
                'condicion'    => 'CIVIL',
                'nucleo'    => 'LARA',
                'etnia'    => 'OTROS GRUPOS',
                'discapacidad'    => 'SIN DISCAPACIDAD',
                'pais'    => 'VENEZUELA',
                'fe_nac'    => '1998-02-24',
                'lugar_nac'    => 'HOSPITAL CENTRAL ESTADO LARA',
                'ciudad'    => 'BARQUISIMETO',
                'direccion'    => 'Los cerrajones',
                'tel_hab'    => '02514437323',
                'tel_cel'    => '0426-3583821',
                'email'    => 'yixon2011@gmail.com',
            ]
        ];
        DB::table('estudiantes')->insert($data);
    }
}
