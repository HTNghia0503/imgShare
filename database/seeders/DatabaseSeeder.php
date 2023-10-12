<?php

namespace Database\Seeders;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        DB::table('users')->insert([
            'name' => 'Trung Nghĩa',
            'email' => 'nghia@gmail.com',
            'password' => bcrypt('123456789'),
            'avatar' => 'null',
            'permission' => 0, // Type USER
            'created_at' => Carbon::now()
        ]);

        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456789'),
            'avatar' => 'null',
            'permission' => 1, // Type ADMIN
            'created_at' => Carbon::now()
        ]);
    }
}
