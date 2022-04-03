<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Let's truncate our existing records to start from scratch.
        Comment::truncate();

        $faker = \Faker\Factory::create();

        // And now, let's create a few Comments in our database:
        for ($i = 0; $i < 20; $i++) {
            Comment::create([
                'article_id' => rand(1, 20),
                'subject' => $faker->sentence,
                'body' => $faker->paragraph(2),
            ]);
        }
    }
}