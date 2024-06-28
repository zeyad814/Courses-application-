<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\Region::factory(10)->create();
        \App\Models\User::factory(10)->create();
        \App\Models\Admin::factory(10)->create();
        \App\Models\Major::factory(10)->create();
        \App\Models\SubMajor::factory(10)->create();
        \App\Models\SubSubMajor::factory(10)->create();
        \App\Models\instructor::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
