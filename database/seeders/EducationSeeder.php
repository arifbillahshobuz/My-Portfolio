<?php

namespace Database\Seeders;

use App\Models\Education;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class EducationSeeder extends Seeder
{
    public function run(): void
    {
        $educations = [
            [
                'institution' => 'Dhaka International University',
                'degree' => 'B.Sc',
                'field_of_study' => 'Computer Science and Engineering (CSE)',
                'start_date' => '2023-01-01',
                'end_date' => null,
                'location' => 'Dhaka, Bangladesh',
                'image' => null,
                'description' => 'B.Sc in Computer Science and Engineering (CSE). CGPA: 3.10/4.00. Currently studying.',
                'status' => 'active',
            ],
            [
                'institution' => 'Kushtia Polytechnic Institute',
                'degree' => 'Diploma in Engineering',
                'field_of_study' => 'Computer Science & Technology',
                'start_date' => '2019-01-01',
                'end_date' => '2024-12-31',
                'location' => 'Kushtia, Bangladesh',
                'image' => null,
                'description' => 'Diploma in Engineering in Computer Science & Technology. CGPA: 3.49/4.00.',
                'status' => 'active',
            ],
            [
                'institution' => 'hosenabad technical school and college',
                'degree' => 'SSC',
                'field_of_study' => 'Electronics',
                'start_date' => '2015-01-01',
                'end_date' => '2017-12-31',
                'location' => 'hosenabad,dhaka',
                'image' => null,
                'description' => 'Secondary School Certificate. CGPA: 4.68/5.00.',
                'status' => 'active',
            ],
            [
                'institution' => 'Pragpur Secondary School',
                'degree' => 'JSC',
                'field_of_study' => 'General',
                'start_date' => '2014-01-01',
                'end_date' => '2014-12-31',
                'location' => 'Pragpur, Daulatpur, Kushtia',
                'image' => null,
                'description' => 'Junior School Certificate (JSC). GPA: 4.50/5.00.',
                'status' => 'active',
            ],
        ];

        foreach ($educations as $education) {
            Education::updateOrCreate(
                [
                    'institution' => $education['institution'],
                    'degree' => $education['degree'],
                ],
                $education
            );
        }
    }
}
