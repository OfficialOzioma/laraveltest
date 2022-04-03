<?php

namespace Database\Seeders;

use App\Models\Likes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LikesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Let's truncate our existing records to start from scratch.
        Likes::truncate();

        $faker = \Faker\Factory::create();


        // And now, let's create a few Likess in our database:
        for ($i = 1; $i < 21; $i++) {
            // Likes::create([
            //     'article_id' => rand(1, 20),
            //     'body' => $faker->body,
            // ]);
            Likes::updateOrCreate(
                ['article_id' => $i],
                ['total_likes' => +1]
            );
        }
    }
}
