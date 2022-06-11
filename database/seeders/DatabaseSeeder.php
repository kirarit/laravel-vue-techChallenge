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
        $this->call([
            UserSeed::class,
            CustomerSeed::class,
            OrderSeed::class,
            FleetSeed::class,           
            CustomerOrderSeed::class,
        ]);
    }
}
