<?php

use Illuminate\Database\Seeder;

class RoomSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'room_number' => 'C411', 'floor' => '4', 'status' => 'Available', 'room_types_id' => 1,],
            ['id' => 2, 'room_number' => 'F2341', 'floor' => '2', 'status' => 'Available', 'room_types_id' => 2,],

        ];

        foreach ($items as $item) {
            \App\Room::create($item);
        }
    }
}
