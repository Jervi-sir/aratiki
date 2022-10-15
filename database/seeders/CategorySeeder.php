<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'music event',
            'code_name' => 'music_event',
        ]);
        DB::table('categories')->insert([
            'name' => 'art event',
            'code_name' => 'art_event',
        ]);
        DB::table('categories')->insert([
            'name' => 'computer event',
            'code_name' => 'computer_event',
        ]);
    }
}
