<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Course;
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

        $user = User::factory()->create([
            'name' => 'Test Student',
            'email' => 'student@gmail.com',
            'password' => 'student',
            'role' => 'student'
        ]);

        $user = User::factory()->create([
            'name' => 'Test Professor',
            'email' => 'professor@gmail.com',
            'password' => 'professor',
            'role' => 'professor'
        ]);

        $user = User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => 'admin',
            'role' => 'admin'
        ]);

        Course::factory(6)->create([
            'user_id' => $user->id
        ]);

    }
}
