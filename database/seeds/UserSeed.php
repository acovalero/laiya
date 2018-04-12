<?php

use Illuminate\Database\Seeder;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'name' => 'Admin', 'email' => 'admin@admin.com', 'password' => '$2y$10$Y9SOOUb2O3guzgGIqHyUMe8JLaYwIcwCT6l30/YRPAzjZNZqEgcMS', 'role_id' => 1, 'remember_token' => '',],
            ['id' => 2, 'name' => 'Adrian', 'email' => 'a@y.c', 'password' => '$2y$10$Y9SOOUb2O3guzgGIqHyUMe8JLaYwIcwCT6l30/YRPAzjZNZqEgcMS', 'role_id' => 2, 'remember_token' => '',],

        ];

        foreach ($items as $item) {
            \App\User::create($item);
        }
    }
}
