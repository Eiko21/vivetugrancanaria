<?php

use Illuminate\Database\Seeder;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tickets')->insert([
            [
                'price' => 10.50,
                'quantity' => 1,
                'clientid' => 1,
                'activityid' => 1
            ]
        ]);
    }
}
