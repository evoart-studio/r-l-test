<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FiltersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Filter::factory()->count(20)->create();
    }
}
