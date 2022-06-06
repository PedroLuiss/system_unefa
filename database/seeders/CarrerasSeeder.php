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
                'name'     => 'Ingeniería Sistemas',
            ]
        ];
        DB::table('carreras')->insert($data);
    }
}
