<?php

namespace Database\Seeders;

use App\Models\MailType;
use App\Models\ModuleType;
use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
        MailType::create(['title'=>'in']);
        MailType::create(['title'=>'out']);

        User::create([
            'name'=>'admin',
            'role'=>1,
            'email'=>'admin@admin',
            'password'=>Hash::make('admin'),
            'current_team_id'=>1,
        ]);

        Team::create([
           'user_id'=>1,
           'name'=>'admin',
           'personal_team'=>1
        ]);

    }
}
