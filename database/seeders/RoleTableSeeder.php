<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Role::insert([
            [
                "name"=>"Admin",
                "slug"=>Str::slug("Admin"),
            ],
            [
                "name"=>"Agent",
                "slug"=>Str::slug("Agent"),
            ],
            [
                "name"=>"Client",
                "slug"=>Str::slug("Client"),
            ],
        ]);
    }
}
