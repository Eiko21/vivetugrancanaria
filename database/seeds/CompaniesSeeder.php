<?php

use Illuminate\Database\Seeder;

class CompaniesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    DB::table('companies')->insert([
           [
                'companyid' => 2,
                'name' => 'empresaprueba',
                'description' => 'Empresa dedicada a actividades para adolescentes',
                'contact' => '928889988',
                'logo' => null,
            ],
            [
                'companyid'=> 4,
                'name' => 'empresaprueba2',
                'description' => 'Empresa dedicada a todo tipo de actividades',
                'contact' => '828997766',
                'logo' => null,
            ],
            
        ]);
        //
    }
}
