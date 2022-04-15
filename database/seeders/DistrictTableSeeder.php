<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DistrictTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('districts')->insert([
            [
                'province_id'=>7,
                'name'=>'Kanchanpur',
                'slug'=>Str::slug('Kanchanpur'),
                'created_by'=>1,
            ],
            [
                'province_id'=>7,
                'name'=>'Kailali',
                'slug'=>Str::slug('Kailali'),
                'created_by'=>1,
            ],
            
        ]);
    }
}
