<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class ActivitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('activities')->insert([
            [   'capacity' => 20,
                'companyid' => 2,
                'description' => 'Excursión a la cumbre, descubrimiento en Gran Canaria',
                'duration' => 3,
                'image' => null,
                'name' => 'Excursión a la cumbre',
                'price' => 2.0,
                'start' => Carbon::create('2021','01','01'),
                'type' => 'Senderismo',
                
                
                
            ],
           [
                'capacity' => 1000,
                'companyid' => 2,
                'description' => 'Concierto del reggaetonero Bad Bunny (GC Arena)',
                'duration' => 4,
                'image' => null,
                'name' => 'Concierto Bad Bunny',
                'price' => 0.5,
                'start' => Carbon::create('2020','07','08'),
                'type' => 'Música',
            ],
            
        ]);
    }
}
