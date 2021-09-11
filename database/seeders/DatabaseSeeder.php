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
        $this->call(ProductTableSeeder::class);
        $this->call(FilterGroupsTableSeeder::class);
        $this->call(FiltersTableSeeder::class);
        $this->call(FilterProductTableSeeder::class);
    }
}
