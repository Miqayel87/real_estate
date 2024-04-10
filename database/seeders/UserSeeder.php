<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'username' => 'john_doe',
                'name' => 'John Doe',
                'email' => 'john@example.com',
                'password' => bcrypt('password123'),
                'title' => 'Mr.',
                'phone' => '1234567890',
                'about' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            ],
            [
                'username' => 'jane_smith',
                'name' => 'Jane Smith',
                'email' => 'jane@example.com',
                'password' => bcrypt('password456'),
                'title' => 'Ms.',
                'phone' => '0987654321',
                'about' => 'Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            ],
            [
                'username' => 'sam_jackson',
                'name' => 'Sam Jackson',
                'email' => 'sam@example.com',
                'password' => bcrypt('password789'),
                'title' => 'Dr.',
                'phone' => '555444333',
                'about' => 'Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae.',
            ],
            [
                'username' => 'emma_watson',
                'name' => 'Emma Watson',
                'email' => 'emma@example.com',
                'password' => bcrypt('password123'),
                'title' => 'Ms.',
                'phone' => '9876543210',
                'about' => 'Quisque ut nulla at erat aliquet mollis non id libero.',
            ],
            [
                'username' => 'michael_smith',
                'name' => 'Michael Smith',
                'email' => 'michael@example.com',
                'password' => bcrypt('password456'),
                'title' => 'Mr.',
                'phone' => '1231231234',
                'about' => 'Fusce in ex semper, eleifend tellus vitae, malesuada magna.',
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
