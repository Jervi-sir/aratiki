<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payments')->insert([
            'name' => 'Cash',
            'token' => 'cash',
        ]);
        DB::table('payments')->insert([
            'name' => 'CCP (old fashion)',
            'token' => 'ccp',
        ]);
        DB::table('payments')->insert([
            'name' => 'Online Payment',
            'token' => 'online',
        ]);
    }
}
