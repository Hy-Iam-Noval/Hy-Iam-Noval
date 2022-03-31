<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
        \App\Models\User::create([
            'name'=>'cashier',
            'email'=>'kasir@gmail.com',
            'password'=>bcrypt('213'),
            'position'=>'cashier'
        ]);
        \App\Models\User::create([
            'name'=>'owner',
            'email'=>'owner@gmail.com',
            'password'=>bcrypt('213'),
            'position'=>'owner'
        ]);
       \App\Models\Order::factory(10)->create();
        \App\Models\Laundry::factory(1)->create();
    }
}
