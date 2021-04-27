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
         \App\Models\Tray::factory(10)->create();
         \App\Models\Cell::factory(10)->create();
         \App\Models\Plant::factory(10)->create();

    }
}
