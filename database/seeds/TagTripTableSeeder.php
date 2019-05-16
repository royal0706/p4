<?php

use Illuminate\Database\Seeder;
use App\Trip;
use App\Tag;

class TagTripTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $trips =[
            'London, United Kingdom' => ['Europe', 'United Kingdom', 'Long Weekend'],
            'Tokyo, Japan' => ['Asia', 'Japan', 'Luxury'],
            'Buenos Aires, Argentina' => ['South America', 'Argentina', 'Budget']
        ];

        foreach ($trips as $destination => $tags) {

            # First get the ytip
            $trip = Trip::where('destination', 'like', $destination)->first();

            # Now loop through each tag for this book, adding the pivot
            foreach ($tags as $tagName) {
                $tag = Tag::where('name', 'LIKE', $tagName)->first();

                # Connect this tag to this book
                $trip->tags()->save($tag);
            }
        }
    }
}
