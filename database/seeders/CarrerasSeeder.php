<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarrerasSeeder extends Seeder
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
                'code'    => '2613',
                'name'    => 'Ingeniería Sistemas - Diurno',
                'num_plan_estudio'    => 44,
            ],[
                'code'    => '2213',
                'name'    => 'Ingenieria Electrica - Diurno',
                 'num_plan_estudio'    => 1,
            ],[
                'code'    => '2013',
                'name'    => 'Ingenieria Agronomia - Diurno',
                 'num_plan_estudio'    => 35,
            ],[
                'code'    => '0913',
                'name'    => 'Licenciado/a Administracion - Diurno',
                 'num_plan_estudio'    => 15,
            ],[
                'code'    => '0313',
                'name'    => 'TSU ENFERMERIA',
                 'num_plan_estudio'    => 3,
            ],[
                'code'    => '1013',
                'name'    => 'Licenciado/a Economia - Diurno',
                 'num_plan_estudio'    => 17,
            ],[
                'code'    => '2613',
                'name'    => 'Ingeniería Sistemas - Nocturno',
                'num_plan_estudio'    => 45,
            ],[
                'code'    => '2213',
                'name'    => 'Ingenieria Electrica - Nocturno',
                 'num_plan_estudio'    => 2,
            ],[
                'code'    => '0913',
                'name'    => 'Licenciado/a Administracion - Nocturno',
                 'num_plan_estudio'    => 16,
            ],[
                'code'    => '1013',
                'name'    => 'Licenciado/a Economia - Nocturno',
                 'num_plan_estudio'    => 18,
            ]
        ];
        DB::table('carreras')->insert($data);
    }
}
