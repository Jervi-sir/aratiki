<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('templates')->insert([
            'template_name' => 'music event',
            'type' => 'default',
            'source_code' => 'default'
        ]);
        DB::table('templates')->insert([
            'template_name' => 'camping event',
            'type' => 'default',
            'source_code' => 'default'
        ]);
        DB::table('templates')->insert([
            'template_name' => 'bowling event',
            'type' => 'default',
            'source_code' => 'default'
        ]);
    }
}
