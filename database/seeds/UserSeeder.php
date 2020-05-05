<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'clienteprueba',
                'email' => 'clienteprueba@gmail.com',
                'password' => bcrypt('cliente'),
                'role' => 'cliente',
                'city' => 'Guía',
            ],
            [
                'name' => 'empresaprueba',
                'email' => 'empresaprueba@gmail.com',
                'password' => bcrypt('empresa'),
                'role' => 'empresa',
                'city' => 'Gáldar',
            ],
            [
                'name' => 'empresaprueba2',
                'email' => 'empresaprueba2@gmail.com',
                'password' => bcrypt('empresa2'),
                'role' => 'empresa',
                'city' => 'Moya',
            ],
            [
                'name' => 'administrador',
                'email' => 'admin@vivetugrancanaria.com',
                'password' => bcrypt('admin'),
                'role' => 'admin',
                'city' => 'Las Palmas de Gran Canaria',
            ]
        ]);
    }
}
