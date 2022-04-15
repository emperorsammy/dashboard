<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvinceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('provinces')->insert([
            ['number'=>1, 'created_by'=>1],
            ['number'=>2, 'created_by'=>1],
            ['number'=>3, 'created_by'=>1],
            ['number'=>4, 'created_by'=>1],
            ['number'=>5, 'created_by'=>1],
            ['number'=>6, 'created_by'=>1],
            ['number'=>7, 'created_by'=>1]
        ]);
    }
}
