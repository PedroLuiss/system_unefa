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
            ],[
                'code'    => '2213',
                'name'    => 'Ingenieria Electrica',
            ],[
                'code'    => '2013',
                'name'    => 'Ingenieria Agronomia',
            ],[
                'code'    => '0913',
                'name'    => 'Licenciado/a Administracion',
            ],[
                'code'    => '0313',
                'name'    => 'TSU ENFERMERIA',
            ],[
                'code'    => '1013',
                'name'    => 'Licenciado/a Economia',
            ]
        ];
        DB::table('carreras')->insert($data);
    }
}
