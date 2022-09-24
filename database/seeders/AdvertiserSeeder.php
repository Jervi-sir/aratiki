<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdvertiserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('advertisers')->insert([
            'user_id' => User::first()->id,
            'uuid' => Str::uuid(),
            'name' => Str::random(10),
            'is_verified' => 1,
            'phone_number' => '00000000',
        ]);

        DB::table('advertisers')->insert([
            'user_id' => User::latest()->first()->id,
            'uuid' => Str::uuid(),
            'name' => Str::random(10),
            'is_verified' => 1,
            'phone_number' => '00000000',
        ]);

    }
}
