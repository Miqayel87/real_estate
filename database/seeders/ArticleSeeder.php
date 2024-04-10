<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $articles = [
            [
                'name' => 'Article 1',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            ],
            [
                'name' => 'Article 2',
                'content' => 'Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            ],
            [
                'name' => 'Article 3',
                'content' => 'In a world filled with challenges and uncertainties, the power of positive thinking can often be overlooked.',
            ],
        ];

        DB::table('articles')->insert($articles);
    }
}
