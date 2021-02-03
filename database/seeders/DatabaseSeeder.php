<?php

namespace Database\Seeders;

use App\Models\ModuleType;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//         \App\Models\User::factory(10)->create();
        ModuleType::create(['title'=>'module']);
        ModuleType::create(['title'=>'project']);

    }
}
