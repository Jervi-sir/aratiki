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
            'type' => 'music',
        ]);
        DB::table('categories')->insert([
            'name' => 'art event',
            'type' => 'art',
        ]);
        DB::table('categories')->insert([
            'name' => 'computer event',
            'type' => 'computer',
        ]);
    }
}
