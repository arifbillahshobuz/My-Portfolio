<?php

namespace Database\Seeders;

use App\Models\Experience;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ExperienceSeeder extends Seeder
{
    public function run(): void
    {
        $experiences = [
            [
                'company' => 'NIBIZ SOFT',
                'designation' => 'Software Developer',
                'owner' => null,
                'start_job' => '2026-02-01',
                'end_job' => '2026-07-31',
                'location' => 'Dhaka, Bangladesh',
                'image' => null,
                'message' => 'Engineering backend architectures and robust RESTful APIs using Laravel, PHP, and MySQL. Designing relational database schemas, optimizing Eloquent ORM queries, and handling migrations. Integrated secure third-party services and payment gateways through RESTful APIs.',
            ],

            [
                'company' => 'R2ait',
                'designation' => 'PHP Laravel Developer (Backend Developer)',
                'owner' => 'Razib Sir',
                'start_job' => '2025-08-01',
                'end_job' => '2026-01-31',
                'location' => 'Banasree, Rampura, Dhaka 1212',
                'image' => null,
                'message' => 'Built and maintained scalable web applications using Laravel and PHP. Configured and deployed applications on Hostinger servers. Collaborated with Flutter developers through GitHub while following clean coding and version-control practices.',
            ],

            [
                'company' => 'DevTechMasters',
                'designation' => 'PHP Laravel Developer (Remote job)',
                'owner' => null,
                'start_job' => '2024-01-01',
                'end_job' => '2024-12-31',
                'location' => 'Home',
                'image' => null,
                'message' => 'Integrating modern frontend components using React.js and Tailwind CSS for seamless data flow. Applied Laravel and PHP best practices to produce clean, maintainable and efficient code. Contributed to feature implementation, bug resolution, troubleshooting, and continuous product enhancement.',
            ],

            [
                'company' => 'Codeeo Limited',
                'designation' => 'PHP Laravel (Paid Intern)',
                'owner' => null,
                'start_job' => '2023-08-01',
                'end_job' => '2023-12-31',
                'location' => 'Nikunja 2, Khilkhet, Dhaka-1229',
                'image' => null,
                'message' => 'Implemented REST APIs and payment gateway integrations with OAuth/JWT-based authentication. Configured and deployed applications on Hostinger servers.',
            ],
        ];

        foreach ($experiences as $experience) {
            Experience::create($experience);
        }
    }
}
