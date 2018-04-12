<?php

use Illuminate\Database\Seeder;

class CustomerSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'first_name' => 'Jenny','last_name' => 'Road', 'address' => 'Rude Street', 'phone' => '091231234', 'email'=>'jenrod@rode.com'],
            ['id' => 2, 'first_name' => 'Larry','last_name' => 'Lechon', 'address' => 'Old Street', 'phone' => '091209090', 'email'=>'Larry@old.com'],
            ['id' => 3, 'first_name' => 'Shanti','last_name' => 'Dope', 'address' => 'Nadarang Street', 'phone' => '098989898', 'email'=>'ashanti@dope.com'],
            ['id' => 4, 'first_name' => 'Benin','last_name' => 'Ben', 'address' => 'Kathang Home', 'phone' => '095423512', 'email'=>'isip@sinta.com'],
            ['id' => 5, 'first_name' => 'Huling','last_name' => 'El Bimbo', 'address' => 'Eraser Headway', 'phone' => '098534952', 'email'=>'head@erase.com'],


        ];

        foreach ($items as $item) {
            \App\Customer::create($item);
        }
    }
}