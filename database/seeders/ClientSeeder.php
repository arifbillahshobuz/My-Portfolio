<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $clients = [
            [
                'name' => 'Mamun',
                'company' => 'Mamun',
                'logo' => null,
                'website' => 'https://inetworkbd.com/',
                'status' => 'done',
            ],
            [
                'name' => 'Pervi',
                'company' => 'Pervi',
                'logo' => null,
                'website' => null,
                'status' => 'done',
            ],
            [
                'name' => 'Shahi',
                'company' => 'Shahi',
                'logo' => null,
                'website' => 'https://careerlybd.org/',
                'status' => 'done',
            ],
            [
                'name' => 'Aanik',
                'company' => 'Aanik',
                'logo' => null,
                'website' => null,
                'status' => 'done',
            ],
        ];

        foreach ($clients as $client) {
            Client::create($client);
        }
    }
}
