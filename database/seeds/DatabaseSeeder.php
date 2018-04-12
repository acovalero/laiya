<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $this->call(CountrySeed::class);
        $this->call(RoleSeed::class);
        $this->call(UserSeed::class);
        $this->call(RoomTypeSeed::class);
        $this->call(RoomSeed::class);
        $this->call(CustomerSeed::class);
        $this->call(FeeSeed::class);
        $this->call(InquirySeed::class);

    }
}
