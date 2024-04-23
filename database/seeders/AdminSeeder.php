<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admins = [
            [
                'name' => 'Thom Carson',
                'login' => 'admin',
                'password' => '$2y$10$uNX7wrUI5z1ocwmm2E/iB.MpDe9TyB1LDnK.YeYj8ian/03w80Ipi'
            ],
        ];

        Admin::create($admins[0]);
    }
}
