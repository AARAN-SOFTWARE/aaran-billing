<?php

namespace Aaran\Common\Database\Seeders;

use Aaran\Common\Models\Common;
use Illuminate\Database\Seeder;

class S101_LabelSeeder extends Seeder
{
    public static function run(): void
    {
        Common::create([
            'vname' => '-',
            'active_id' => '1'
        ]);
    }
}
