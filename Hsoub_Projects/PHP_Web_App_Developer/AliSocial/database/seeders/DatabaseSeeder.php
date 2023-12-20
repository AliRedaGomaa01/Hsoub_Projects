<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()
            ->count(10)
            ->has(Post::factory()->count(3))
            ->create();

        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create(
            [
                'name' => 'a',
                'username' => 'a',
                'email' => 'a@a.c',
                'password' => 'test123',
                'bio' => 'aaa aaa aaa',
                'private_account' => 1,
                'image' => 'https://ui-avatars.com/api/?name=' . urlencode('a a'),
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
            ]
        );

        \App\Models\User::factory()->create(
            [
                'name' => 'b',
                'username' => 'b',
                'email' => 'b@b.c',
                'password' => 'test123',
                'bio' => 'bbb bbb bbb',
                'private_account' => 1,
                'image' => 'https://ui-avatars.com/api/?name=' . urlencode('b b'),
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
            ]
        );

        \App\Models\User::factory()->create(
            [
                'name' => 'c',
                'username' => 'c',
                'email' => 'c@c.c',
                'password' => 'test123',
                'bio' => 'ccc ccc cccc',
                'private_account' => 0,
                'image' => 'https://ui-avatars.com/api/?name=' . urlencode('c c'),
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
            ]
        );
        \App\Models\User::factory()->create(
            [
                'name' => 'd',
                'username' => 'd',
                'email' => 'd@d.c',
                'password' => 'test123',
                'bio' => 'ddd ddd ddd',
                'private_account' => 0,
                'image' => 'https://ui-avatars.com/api/?name=' . urlencode('d d'),
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
            ]
        );
    }
}
