<?php

namespace Aaran\Common\Database\Seeders;

use Aaran\Common\Models\Common;
use Illuminate\Database\Seeder;

class S102_CommonSeeder extends Seeder
{
    public static function run(): void
    {
        Common::create([
            'vname' => '-',
            'desc' => '-',
            'desc_1' => '-',
            'active_id' => '1'
        ]);
    }
}
