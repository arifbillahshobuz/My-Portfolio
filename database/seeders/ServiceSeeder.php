<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'name' => 'Laravel Backend Development',
                'description' => 'I build scalable Laravel backend applications with clean architecture, secure authentication and efficient business logic.',
                'short_description' => 'Scalable Laravel backend applications with secure authentication and clean architecture.',
                'process' => 'Analyze requirements, design database architecture, develop business logic, implement authentication, test functionality, and deploy the application.',
                'image' => null,
                'status' => 'active',
                'sort_order' => 1,
            ],
            [
                'name' => 'REST API Development',
                'description' => 'I develop secure REST APIs for Flutter, React.js and other frontend applications.',
                'short_description' => 'Secure and scalable REST APIs for mobile and web applications.',
                'process' => 'Analyze API requirements, design endpoints, implement validation and authentication, handle responses, test endpoints, and document APIs.',
                'image' => null,
                'status' => 'active',
                'sort_order' => 2,
            ],
            [
                'name' => 'E-commerce Development',
                'description' => 'I develop complete Laravel e-commerce backends with products, carts, orders, customers and payment systems.',
                'short_description' => 'Complete Laravel e-commerce solutions with products, orders, and payments.',
                'process' => 'Design the database, develop product and inventory management, implement cart and checkout functionality, integrate payments, and test order workflows.',
                'image' => null,
                'status' => 'active',
                'sort_order' => 3,
            ],
            [
                'name' => 'Payment Gateway Integration',
                'description' => 'I integrate secure payment gateways with Laravel applications, including transactions, verification, callbacks and webhooks.',
                'short_description' => 'Secure payment gateway integration with transaction verification and webhooks.',
                'process' => 'Configure payment credentials, integrate the gateway API, implement payment initiation, verify transactions, handle callbacks and webhooks, and test payment flows.',
                'image' => null,
                'status' => 'active',
                'sort_order' => 4,
            ],
            [
                'name' => 'Database Design',
                'description' => 'I design optimized MySQL and PostgreSQL databases with scalable relationships, migrations, and efficient queries.',
                'short_description' => 'Optimized database architecture, relationships, migrations, and queries.',
                'process' => 'Analyze data requirements, design tables and relationships, define indexes and constraints, create migrations, optimize queries, and verify data integrity.',
                'image' => null,
                'status' => 'active',
                'sort_order' => 5,
            ],
            [
                'name' => 'Third-Party API Integration',
                'description' => 'I integrate third-party REST APIs with Laravel applications for secure and reliable external services.',
                'short_description' => 'Reliable third-party API integration for Laravel applications.',
                'process' => 'Review API documentation, configure credentials, implement API requests, handle responses and errors, validate data, and test integration workflows.',
                'image' => null,
                'status' => 'active',
                'sort_order' => 6,
            ],
            [
                'name' => 'Authentication & Authorization',
                'description' => 'I build secure authentication and role-based permission systems using JWT, OAuth, guards and middleware.',
                'short_description' => 'Secure authentication, authorization, and role-based access control.',
                'process' => 'Configure authentication, implement login and registration, integrate JWT or OAuth where required, define roles and permissions, protect routes, and test access control.',
                'image' => null,
                'status' => 'active',
                'sort_order' => 7,
            ],
            [
                'name' => 'Bug Fixing & Maintenance',
                'description' => 'Troubleshooting and fixing Laravel/PHP website bugs, resolving errors, improving performance, and keeping your website secure, stable, and up to date.',
                'short_description' => 'Laravel/PHP bug fixing, troubleshooting, performance optimization, and maintenance.',
                'process' => 'Identify the root cause, reproduce errors, debug application code, fix issues, optimize performance, test the changes, and verify application stability.',
                'image' => null,
                'status' => 'active',
                'sort_order' => 8,
            ],
            [
                'name' => 'Server Deployment',
                'description' => 'I deploy Laravel applications on hosting servers and configure environments, databases, Apache, storage and permissions.',
                'short_description' => 'Laravel deployment with server, database, environment, and permission configuration.',
                'process' => 'Prepare the hosting environment, configure environment variables and database connections, upload application files, configure storage and permissions, optimize production settings, and verify deployment.',
                'image' => null,
                'status' => 'active',
                'sort_order' => 9,

            ],
        ];
        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
