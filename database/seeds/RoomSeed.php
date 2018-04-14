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
            // Couple Room
            ['room_number' => 'Couple Room 101', 'floor' => '1', 'status' => 'Available', 'room_types_id' => 1,],
            ['room_number' => 'Couple Room 102', 'floor' => '1', 'status' => 'Available', 'room_types_id' => 1,],
            ['room_number' => 'Couple Room 103', 'floor' => '1', 'status' => 'Available', 'room_types_id' => 1,],
            ['room_number' => 'Couple Room 104', 'floor' => '1', 'status' => 'Available', 'room_types_id' => 1,],
            ['room_number' => 'Couple Room 105', 'floor' => '1', 'status' => 'Available', 'room_types_id' => 1,],
            // Family Room
            ['room_number' => 'Family Room 106', 'floor' => '1', 'status' => 'Available', 'room_types_id' => 2,],
            ['room_number' => 'Family Room 107', 'floor' => '1', 'status' => 'Available', 'room_types_id' => 2,],
            ['room_number' => 'Family Room 108', 'floor' => '1', 'status' => 'Available', 'room_types_id' => 2,],
            ['room_number' => 'Family Room 109', 'floor' => '1', 'status' => 'Available', 'room_types_id' => 2,],
            ['room_number' => 'Family Room 201', 'floor' => '1', 'status' => 'Available', 'room_types_id' => 2,],
            ['room_number' => 'Family Room 202', 'floor' => '1', 'status' => 'Available', 'room_types_id' => 2,],
            // Premiere Family
            ['room_number' => 'Premiere Family Room 203', 'floor' => '2', 'status' => 'Available', 'room_types_id' => 3,],
            ['room_number' => 'Premiere Family Room 204', 'floor' => '2', 'status' => 'Available', 'room_types_id' => 3,],
            ['room_number' => 'Premiere Family Room 205', 'floor' => '2', 'status' => 'Available', 'room_types_id' => 3,],
            // Quad Room
            ['room_number' => 'Quad Room 206', 'floor' => '2', 'status' => 'Available', 'room_types_id' => 4,],
            ['room_number' => 'Quad Room 207', 'floor' => '2', 'status' => 'Available', 'room_types_id' => 4,],
            ['room_number' => 'Quad Room 208', 'floor' => '2', 'status' => 'Available', 'room_types_id' => 4,],
            ['room_number' => 'Quad Room 209', 'floor' => '2', 'status' => 'Available', 'room_types_id' => 4,],

        ];

        foreach ($items as $item) {
            \App\Room::create($item);
        }
    }
}
