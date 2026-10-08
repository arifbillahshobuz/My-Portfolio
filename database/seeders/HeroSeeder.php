<?php

namespace Database\Seeders;

use App\Models\Hero;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class HeroSeeder extends Seeder
{
    public function run(): void
    {
        Hero::create([
            'title' => 'Softower Developer',
            'sub_title' => 'I am Arif Billah Shobuz',
            'description' => 'I am Md. Arif Billah Shobuz, a passionate PHP Laravel Developer with hands-on experience in building web applications, eCommerce platforms, and dynamic websites. With a Diploma in Computer Science & Technology from Kushtia Polytechnic Institute and professional training from Kodeeo Limited, Ostad, and Webcoder-IT, I have honed my skills in Laravel, Git, Blade templates, JWT authentication, and project deployment',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
