<?php

namespace Database\Seeders;

use App\Models\Tray;
use Illuminate\Database\Seeder;

class TraySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tray::factory()->count(5)->create();
    }
}
