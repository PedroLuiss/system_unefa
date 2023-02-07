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
                'name'    => 'Ingeniería Sistemas',
                'num_plan_estudio'    => 12,
            ],[
                'code'    => '2213',
                'name'    => 'Ingenieria Electrica',
                 'num_plan_estudio'    => 1,
            ],[
                'code'    => '2013',
                'name'    => 'Ingenieria Agronomia',
                 'num_plan_estudio'    => 10,
            ],[
                'code'    => '0913',
                'name'    => 'Licenciado/a Administracion',
                 'num_plan_estudio'    => 5,
            ],[
                'code'    => '0313',
                'name'    => 'TSU ENFERMERIA',
                 'num_plan_estudio'    => 25,
            ],[
                'code'    => '1013',
                'name'    => 'Licenciado/a Economia',
                 'num_plan_estudio'    => 16,
            ]
        ];
        DB::table('carreras')->insert($data);
    }
}
