<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Filter;

class FilterProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ( $i = 0; $i < 20; $i++ ) {
            DB::table('filter_product')->insert(
                [
                    'product_id' => Product::select('id')->orderByRaw("RAND()")->first()->id,
                    'filter_id' => Filter::select('id')->orderByRaw("RAND()")->first()->id,
                ]
            );
        }
    }
}
