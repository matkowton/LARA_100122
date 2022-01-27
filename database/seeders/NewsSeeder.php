<?php

namespace Database\Seeders;

use Faker\Generator;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Generator $generator)
    {

        \DB::table('news')
            ->insert([
                'title' => $generator->text(50),
                'content' => $generator->text(),
                'source' => $generator->url(),
                'publish_date' => $generator->dateTime(),
                'category_id' => 1
            ]);
    }
}
