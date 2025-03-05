<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Status;
use Carbon\Carbon;

class StatusesTableSeeder extends Seeder
{
    public function run()
    {
        // Clear existing statuses
        Status::truncate();

        $statuses = [
            [
                'name' => 'Web Application',
                'description' => 'Main web application and user interface',
                'status' => 'operational',
                'uptime_percentage' => 99.99,
                'last_incident_date' => null,
                'last_incident_description' => null,
                'order' => 1
            ],
            [
                'name' => 'API Services',
                'description' => 'RESTful API endpoints and services',
                'status' => 'operational',
                'uptime_percentage' => 99.98,
                'last_incident_date' => null,
                'last_incident_description' => null,
                'order' => 2
            ],
            [
                'name' => 'Database Clusters',
                'description' => 'Primary and replica database servers',
                'status' => 'operational',
                'uptime_percentage' => 99.95,
                'last_incident_date' => Carbon::parse('2023-06-15 09:45:00'),
                'last_incident_description' => 'Minor incident on June 15, 2023 (resolved)',
                'order' => 3
            ],
            [
                'name' => 'File Storage',
                'description' => 'Cloud storage for user uploads and documents',
                'status' => 'operational',
                'uptime_percentage' => 99.99,
                'last_incident_date' => null,
                'last_incident_description' => null,
                'order' => 4
            ],
            [
                'name' => 'Authentication Services',
                'description' => 'User authentication and authorization systems',
                'status' => 'operational',
                'uptime_percentage' => 100,
                'last_incident_date' => null,
                'last_incident_description' => null,
                'order' => 5
            ]
        ];

        foreach ($statuses as $status) {
            Status::create($status);
        }
    }
}
