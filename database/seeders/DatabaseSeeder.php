<?php

namespace Database\Seeders;

use Aaran\Common\Database\Seeders\S101_LabelSeeder;
use Aaran\Common\Database\Seeders\S102_CommonSeeder;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        S03_UserSeeder::run();

        S101_LabelSeeder::run();
        S102_CommonSeeder::run();
    }
}
