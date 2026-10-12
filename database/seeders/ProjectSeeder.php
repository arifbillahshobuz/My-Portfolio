<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $projects = [
            [
                'name' => 'I-Networkbd',
                'client_id' => 1,
                'service_id' => 10,
                'start_date' => '2025-01-01',
                'end_date' => '2025-02-15',
                'status' => 'completed',
                'sort_order' => 1,
            ],
            [
                'name' => 'The Jona Project',
                'client_id' => 2,
                'service_id' => 10,
                'start_date' => '2025-03-01',
                'end_date' => '2025-05-30',
                'status' => 'completed',
                'sort_order' => 2,
            ],
            [
                'name' => 'Careerly BD',
                'client_id' => 3,
                'service_id' => 10,
                'image' => 'network-security.jpg',
                'start_date' => '2025-06-01',
                'status' => 'running',
                'sort_order' => 3,
            ]
        ];
        foreach($projects as $project){
            Project::create($project);
        }
    }
}
