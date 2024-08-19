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
            'cols' => 1,
            'active_id' => '1'
        ]);
        Label::create([
            'vname' => 'State ',
            'cols' => 2,
            'active_id' => '1'
        ]);
        Label::create([
            'vname' => 'PinCode ',
            'cols' => 1,
            'active_id' => '1'
        ]);
        Label::create([
            'vname' => 'Country ',
            'cols' => 1,
            'active_id' => '1'
        ]);
        Label::create([
            'vname' => 'HsnCode ',
            'cols' => 2,
            'active_id' => '1'
        ]);
        Label::create([
            'vname' => 'Colour ',
            'cols' => 1,
            'active_id' => '1'
        ]);
        Label::create([
            'vname' => 'Size ',
            'cols' => 1,
            'active_id' => '1'
        ]);
        Label::create([
            'vname' => 'Bank ',
            'cols' => 1,
            'active_id' => '1'
        ]);
        Label::create([
            'vname' => 'Ledger ',
            'cols' => 1,
            'active_id' => '1'
        ]);
        Label::create([
            'vname' => 'Transport ',
            'cols' => 2,
            'active_id' => '1'
        ]);
        Label::create([
            'vname' => 'Department ',
            'cols' => 1,
            'active_id' => '1'
        ]);
        Label::create([
            'vname' => 'Dispatch ',
            'cols' => 1,
            'active_id' => '1'
        ]);
        Label::create([
            'vname' => 'Receipt Type ',
            'cols' => 1,
            'active_id' => '1'
        ]);
    }
}
