<?php

namespace Database\Seeders;
use \App\Models\Pacijent;

use Illuminate\Database\Seeder;

class PacijentSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Pacijent::factory()->count(10)->create();
    }
}
