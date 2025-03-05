<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create admin user
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'bio' => 'System administrator with full access privileges.',
            'profile_picture' => 'https://randomuser.me/api/portraits/men/1.jpg',
            'is_admin' => true,
        ]);

        // Create regular users
        User::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => Hash::make('password'),
            'bio' => 'Tech enthusiast and avid blogger.',
            'profile_picture' => 'https://randomuser.me/api/portraits/men/2.jpg',
            'twitter' => 'johndoe',
            'linkedin' => 'johndoe',
        ]);

        User::create([
            'name' => 'Jane Smith',
            'email' => 'jane@example.com',
            'password' => Hash::make('password'),
            'bio' => 'Content writer specializing in travel and lifestyle topics.',
            'profile_picture' => 'https://randomuser.me/api/portraits/women/2.jpg',
            'instagram' => 'janesmith',
            'facebook' => 'janesmith',
        ]);

        // Create several test users
        User::factory(5)->create();
    }
}
