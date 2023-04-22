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
                'code'    => '1326D',
                'name'    => 'Ingeniería Sistemas - Diurno',
                'num_plan_estudio'    => 44,
            ],[
                'code'    => '1322D',
                'name'    => 'Ingenieria Electrica - Diurno',
                 'num_plan_estudio'    => 1,
            ],[
                'code'    => '1320D',
                'name'    => 'Ingenieria Agronomia - Diurno',
                 'num_plan_estudio'    => 35,
            ],[
                'code'    => '1309D',
                'name'    => 'Licenciado/a Administracion - Diurno',
                 'num_plan_estudio'    => 15,
            ],[
                'code'    => '1303D',
                'name'    => 'TSU ENFERMERIA',
                 'num_plan_estudio'    => 3,
            ],[
                'code'    => '1310D',
                'name'    => 'Licenciado/a Economia - Diurno',
                 'num_plan_estudio'    => 17,
            ],[
                'code'    => '1326N',
                'name'    => 'Ingeniería Sistemas - Nocturno',
                'num_plan_estudio'    => 45,
            ],[
                'code'    => '1322N',
                'name'    => 'Ingenieria Electrica - Nocturno',
                 'num_plan_estudio'    => 2,
            ],[
                'code'    => '1309N',
                'name'    => 'Licenciado/a Administracion - Nocturno',
                 'num_plan_estudio'    => 16,
            ],[
                'code'    => '1310N',
                'name'    => 'Licenciado/a Economia - Nocturno',
                 'num_plan_estudio'    => 18,
            ]
        ];
        DB::table('carreras')->insert($data);
    }
}
