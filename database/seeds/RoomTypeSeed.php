<?php

use Illuminate\Database\Seeder;

class RoomTypeSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'room_type' => 'Couple','price' => '5000','rec_pax' => '2','max_pax' => '3'],
            ['id' => 2, 'room_type' => 'Family','price' => '8400','rec_pax' => '4','max_pax' => '8'],

        ];

        foreach ($items as $item) {
            \App\Room_type::create($item);
        }
    }
}
