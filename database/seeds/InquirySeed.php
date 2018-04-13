<?php

use Illuminate\Database\Seeder;

class InquirySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            // ['id' => 1, 'time_from' => '2018-04-13 3:23', 'time_to' => '2018-04-14 3:23', 'customer_id' => '1', 'room_id' => '1'],
            // ['id' => 2, 'time_from' => '2018-04-13 3:23', 'time_to' => '2018-04-15 3:23', 'customer_id' => '2', 'room_id' => '2'],

        ];

        foreach ($items as $item) {
            \App\Inquiry::create($item);
        }
    }
}
