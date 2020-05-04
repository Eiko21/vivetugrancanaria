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
                'city' => 'Las Palmas de Gran Canaria',
            ],
            [
                'name' => 'empresaprueba',
                'email' => 'empresaprueba@gmail.com',
                'password' => bcrypt('empresa'),
                'role' => 'empresa',
                'city' => 'Las Palmas de Gran Canaria',
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
