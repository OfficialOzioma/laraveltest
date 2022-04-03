<?php

namespace Database\Seeders;

use App\Models\Views;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ViewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Let's truncate our existing records to start from scratch.
        Views::truncate();

        $faker = \Faker\Factory::create();

        // And now, let's create a few Viewss in our database:
        for ($i = 1; $i < 21; $i++) {
            Views::updateOrCreate(
                ['article_id' => $i],
                ['total_views' => +1]
            );
        }
    }
}