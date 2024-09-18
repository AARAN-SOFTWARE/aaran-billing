<?php

namespace Aaran\Master\Database\Seeders;

use Aaran\Master\Models\Product;
use Illuminate\Database\Seeder;

class S203_ProductSeeder extends Seeder
{
    public static function run(): void
    {
        Product::create([
            'vname' => 'Wheat',
            'producttype_id' => '64',
            'hsncode_id' => '97',
            'unit_id' => '69',
            'gstpercent_id' => '72',
            'initial_quantity' => 0,
            'initial_price' => 0,
            'active_id' => '1',
            'user_id' => '1',
            'company_id' => '1',
        ]);
    }
}
