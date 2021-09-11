<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FilterGroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\FilterGroup::factory()->count(4)->create();
    }
}
