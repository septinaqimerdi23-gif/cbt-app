<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::updateOrCreate(
            ['email' => 'septinaqimerdi23@gmail.com'],
            [
                'name' => 'Septina Surbakti',
                'username' => 'skylast',
                'is_staff' => true,
                'password' => Hash::make('septi123')
            ]
        );

        
        $this->call([
            SubjectQuestionSeeder::class,
            ExamResultSeeder::class,
        ]);
    }
}
