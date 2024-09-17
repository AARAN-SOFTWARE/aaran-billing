<?php

namespace Aaran\Common\Database\Seeders;

use Aaran\Common\Models\Label;
use Illuminate\Database\Seeder;

class S101_LabelSeeder extends Seeder
{
    public static function run(): void
    {
        #1
        Label::create([
            'vname' => '-',
            'cols' => 1,
            'active_id' => '1'
        ]);

        #2
        Label::create([
            'vname' => 'City ',
            'cols' => 1,
            'active_id' => '1'
        ]);

        #3
        Label::create([
            'vname' => 'State ',
            'cols' => 2,
            'active_id' => '1'
        ]);

        #4
        Label::create([
            'vname' => 'PinCode ',
            'cols' => 1,
            'active_id' => '1'
        ]);

        #5
        Label::create([
            'vname' => 'Country ',
            'cols' => 1,
            'active_id' => '1'
        ]);

        #6
        Label::create([
            'vname' => 'HsnCode ',
            'cols' => 2,
            'active_id' => '1'
        ]);

        #7
        Label::create([
            'vname' => 'Colour ',
            'cols' => 1,
            'active_id' => '1'
        ]);

        #8
        Label::create([
            'vname' => 'Size ',
            'cols' => 1,
            'active_id' => '1'
        ]);

        #9
        Label::create([
            'vname' => 'Bank ',
            'cols' => 1,
            'active_id' => '1'
        ]);

        #10
        Label::create([
            'vname' => 'Ledger ',
            'cols' => 1,
            'active_id' => '1'
        ]);

        #11
        Label::create([
            'vname' => 'Transport ',
            'cols' => 3,
            'active_id' => '1'
        ]);

        #12
        Label::create([
            'vname' => 'Department ',
            'cols' => 1,
            'active_id' => '1'
        ]);

        #13
        Label::create([
            'vname' => 'Dispatch ',
            'cols' => 1,
            'active_id' => '1'
        ]);

        #14
        Label::create([
            'vname' => 'Receipt Type ',
            'cols' => 1,
            'active_id' => '1'
        ]);

        #15
        Label::create([
            'vname' => 'Product Type',
            'cols' => 1,
            'active_id' => '1'
        ]);

        #16
        Label::create([
            'vname' => 'Units',
            'cols' => 1,
            'active_id' => '1'
        ]);


        #17
        Label::create([
            'vname' => 'GST Percent',
            'cols' => 1,
            'active_id' => '1'
        ]);

        #18
        Label::create([
            'vname' => 'Blog Category',
            'cols' => 1,
            'active_id' => '1'
        ]);

        #19
        Label::create([
            'vname' => 'Transaction Type',
            'cols' => 1,
            'active_id' => '1'
        ]);

        #20
        Label::create([
            'vname' => 'Mode of Payment',
            'cols' => 1,
            'active_id' => '1'
        ]);

        #21
        Label::create([
            'vname' => 'AccYear',
            'cols' => 1,
            'active_id' => '1'
        ]);
    }
}
