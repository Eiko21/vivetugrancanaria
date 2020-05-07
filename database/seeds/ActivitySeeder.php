<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('activities')->insert([
            [
                'name' => 'Excursión a Teror',
                'type' => 'Senderismo',
                'description' => 'Caminata a Teror desde Santa Brígida',
                'price' => 10.50,
                'capacity' => 100,
                'start' => Carbon::createFromFormat('d-m-Y\TH:i','30-05-2020T09:00'),
                'duration' => 18000,
                'companyid' => 2
            ]
        ]);
    }
}
