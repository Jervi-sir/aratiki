<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\TemplateSeeder;
use Database\Seeders\AdvertiserSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $role = new RoleSeeder();
        //$user = new UserSeeder();

        //$advertiser = new AdvertiserSeeder();
        $template = new TemplateSeeder();

        $role->run();
        //$user->run();
        //$advertiser->run();
        $template->run();

    }
}
