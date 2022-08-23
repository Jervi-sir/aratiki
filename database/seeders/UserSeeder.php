<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'role_id' => Role::where('name', 'admin')->first()->id,
            'name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('password'),
            'details' => null
        ]);

        DB::table('users')->insert([
            'role_id' => Role::where('name', 'advertiser')->first()->id,
            'name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('password'),
            'details' => null
        ]);

        DB::table('users')->insert([
            'role_id' => Role::where('name', 'client')->first()->id,
            'name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('password'),
            'details' => null
        ]);

        DB::table('users')->insert([
            'role_id' => Role::where('name', 'client')->first()->id,
            'name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('password'),
            'details' => null
        ]);
    }
}
