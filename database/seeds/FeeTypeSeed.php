<?php

use Illuminate\Database\Seeder;

class FeeTypeSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'name' => 'Excess Head', 'price' => '600',],
            ['id' => 2, 'name' => 'Extra Bed', 'price' => '100',],

        ];

        foreach ($items as $item) {
            \App\FeeType::create($item);
        }
    }
}
