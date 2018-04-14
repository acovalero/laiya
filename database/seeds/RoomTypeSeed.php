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
            
            ['id' => 1, 'room_type' => 'Couple Room','price' => '5000','rec_pax' => '2','max_pax' => '3'],
            ['id' => 2, 'room_type' => 'Family Room','price' => '8400','rec_pax' => '4','max_pax' => '8'],
            ['id' => 3, 'room_type' => 'Premiere Family Room','price' => '8900','rec_pax' => '4','max_pax' => '8'],
            ['id' => 4, 'room_type' => 'Quad Room','price' => '7200','rec_pax' => '4','max_pax' => '5'],

        ];

        foreach ($items as $item) {
            \App\Room_type::create($item);
        }
    }
}
