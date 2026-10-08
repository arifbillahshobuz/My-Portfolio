<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // First seed users and base tables
        $this->call([
            UserSeeder::class,
            // ServiceSeeder::class,
            // ProjectSeeder::class,
            // ExperienceSeeder::class,
            // EducationSeeder::class,
            // SkillSeeder::class,
            // TestimonialSeeder::class,
            // BlogSeeder::class,
            // ContactSeeder::class,
            // HeroSeeder::class,
        ]);
    }
}