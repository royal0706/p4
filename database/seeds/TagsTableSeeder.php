<?php

use Illuminate\Database\Seeder;
use App\Tag;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = ['Europe', 'Asia', 'South America', 'North America', 'United Kingdom', 'France', 'China', 'Argentina', 'United States', 'Japan', 'Budget', 'Luxury', 'Long Weekend', 'Extended Stay' ];

        foreach ($tags as $tagName) {
            $tag = new Tag();
            $tag->name = $tagName;
            $tag->save();
        }
    }
}
