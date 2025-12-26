<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = User::factory()->count(5)->create();


        Post::factory()->count(100)->create([
            'user_id' => fn() => $users->random()->id,
        ]);

        $this->command->info('✅ Created 5 users and 100 posts successfully!');
    }
}
