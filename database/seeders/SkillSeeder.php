<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class SkillSeeder extends Seeder
{
    public function run(): void
    {
        $skills = [
            ['name' => 'PHP', 'category' => 'Languages', 'percentage' => 85, 'level' => 'Advanced', 'description' => 'Server-side programming with PHP.', 'sort_order' => 1],
            ['name' => 'JavaScript', 'category' => 'Languages', 'percentage' => 80, 'level' => 'Advanced', 'description' => 'Interactive frontend functionality and scripting.', 'sort_order' => 2],
            ['name' => 'Python', 'category' => 'Languages', 'percentage' => 60, 'level' => 'Intermediate', 'description' => 'Python programming fundamentals.', 'sort_order' => 3],
            ['name' => 'C', 'category' => 'Languages', 'percentage' => 55, 'level' => 'Intermediate', 'description' => 'C programming fundamentals.', 'sort_order' => 4],
            ['name' => 'C++', 'category' => 'Languages', 'percentage' => 55, 'level' => 'Intermediate', 'description' => 'C++ programming fundamentals.', 'sort_order' => 5],
            ['name' => 'Java', 'category' => 'Languages', 'percentage' => 55, 'level' => 'Intermediate', 'description' => 'Java programming fundamentals.', 'sort_order' => 6],
            ['name' => 'SQL', 'category' => 'Languages', 'percentage' => 75, 'level' => 'Intermediate', 'description' => 'Database queries and data manipulation.', 'sort_order' => 7],
            ['name' => 'HTML5', 'category' => 'Languages', 'percentage' => 90, 'level' => 'Advanced', 'description' => 'Semantic HTML and webpage structure.', 'sort_order' => 8],
            ['name' => 'CSS3', 'category' => 'Languages', 'percentage' => 85, 'level' => 'Advanced', 'description' => 'Responsive webpage styling and layouts.', 'sort_order' => 9],

            ['name' => 'Laravel', 'category' => 'Frameworks & Technologies', 'percentage' => 90, 'level' => 'Advanced', 'description' => 'Backend development with Laravel and PHP.', 'sort_order' => 10],
            ['name' => 'Eloquent ORM', 'category' => 'Frameworks & Technologies', 'percentage' => 85, 'level' => 'Advanced', 'description' => 'Database relationships and ORM queries.', 'sort_order' => 11],
            ['name' => 'RESTful APIs', 'category' => 'Frameworks & Technologies', 'percentage' => 85, 'level' => 'Advanced', 'description' => 'Designing and integrating RESTful APIs.', 'sort_order' => 12],
            ['name' => 'React.js', 'category' => 'Frameworks & Technologies', 'percentage' => 70, 'level' => 'Intermediate', 'description' => 'Building interactive user interfaces with React.', 'sort_order' => 13],
            ['name' => 'Next.js', 'category' => 'Frameworks & Technologies', 'percentage' => 65, 'level' => 'Intermediate', 'description' => 'React-based web application development.', 'sort_order' => 14],
            ['name' => 'Tailwind CSS', 'category' => 'Frameworks & Technologies', 'percentage' => 80, 'level' => 'Advanced', 'description' => 'Utility-first responsive styling.', 'sort_order' => 15],

            ['name' => 'MySQL', 'category' => 'Databases & DevOps', 'percentage' => 85, 'level' => 'Advanced', 'description' => 'Relational database design and management.', 'sort_order' => 16],
            ['name' => 'PostgreSQL', 'category' => 'Databases & DevOps', 'percentage' => 70, 'level' => 'Intermediate', 'description' => 'Relational database management with PostgreSQL.', 'sort_order' => 17],
            ['name' => 'MongoDB', 'category' => 'Databases & DevOps', 'percentage' => 60, 'level' => 'Intermediate', 'description' => 'NoSQL database fundamentals.', 'sort_order' => 18],
            ['name' => 'Git', 'category' => 'Databases & DevOps', 'percentage' => 80, 'level' => 'Advanced', 'description' => 'Version control and collaborative development.', 'sort_order' => 19],
            ['name' => 'GitHub', 'category' => 'Databases & DevOps', 'percentage' => 85, 'level' => 'Advanced', 'description' => 'Repository management and team collaboration.', 'sort_order' => 20],
            ['name' => 'Linux', 'category' => 'Databases & DevOps', 'percentage' => 65, 'level' => 'Intermediate', 'description' => 'Linux command line and development environment.', 'sort_order' => 21],
            ['name' => 'Apache', 'category' => 'Databases & DevOps', 'percentage' => 60, 'level' => 'Intermediate', 'description' => 'Web server configuration fundamentals.', 'sort_order' => 22],
            ['name' => 'Postman', 'category' => 'Databases & DevOps', 'percentage' => 85, 'level' => 'Advanced', 'description' => 'Testing and debugging API requests.', 'sort_order' => 23],
        ];

        foreach ($skills as $skill) {
            Skill::updateOrCreate(
                ['name' => $skill['name']],
                array_merge($skill, [
                    'icon' => null,
                    'status' => 'active',
                ])
            );
        }
    }
}
