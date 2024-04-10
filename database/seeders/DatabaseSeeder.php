<?php

namespace Database\Seeders;

use App\Http\Requests\UserRequest;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(FeatureSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(TypeSeeder::class);
        $this->call(PropertySeeder::class);
        $this->call(PropertyFeatureSeeder::class);
        $this->call(ArticleSeeder::class);
    }
}
