<?php

namespace Database\Seeders;

use App\Models\LessonTag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LessonTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // factory(LessonTag::class, 500)->create();
        LessonTag::factory()->count(500)->create();
    }
}
