<?php

namespace Aaran\Common\Database\Seeders;

use Aaran\Common\Models\Label;
use Illuminate\Database\Seeder;

class S101_LabelSeeder extends Seeder
{
    public static function run(): void
    {
        Label::create([
            'vname' => 'City ',
            'active_id' => '1'
        ]);
        Label::create([
            'vname' => 'State ',
            'active_id' => '1'
        ]);
        Label::create([
            'vname' => 'PinCode ',
            'active_id' => '1'
        ]);
        Label::create([
            'vname' => 'Country ',
            'active_id' => '1'
        ]);
        Label::create([
            'vname' => 'HsnCode ',
            'active_id' => '1'
        ]);
        Label::create([
            'vname' => 'Colour ',
            'active_id' => '1'
        ]);
        Label::create([
            'vname' => 'Size ',
            'active_id' => '1'
        ]);
        Label::create([
            'vname' => 'Bank ',
            'active_id' => '1'
        ]);
        Label::create([
            'vname' => 'Ledger ',
            'active_id' => '1'
        ]);
        Label::create([
            'vname' => 'Transport ',
            'active_id' => '1'
        ]);
        Label::create([
            'vname' => 'Department ',
            'active_id' => '1'
        ]);
        Label::create([
            'vname' => 'Dispatch ',
            'active_id' => '1'
        ]);
    }
}
