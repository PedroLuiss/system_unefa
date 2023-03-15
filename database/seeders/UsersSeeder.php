<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user = User::create([
            'name'     => 'Admin',
            'email'    => 'admin@gmail.com',
            'cedula'    => '4151265461',
            'password' => bcrypt('admin123'),
        ]);

        $user->assignRole('Admin');
    }
}
