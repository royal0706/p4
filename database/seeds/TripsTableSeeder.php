<?php

use Illuminate\Database\Seeder;
use App\Trip;

class TripsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $trips = [
            ['London, United Kingdom', 'Emma M.', 'The Arch London', 'Barrafina', 'Borough Market', 'https://upload.wikimedia.org/wikipedia/commons/f/f0/Tower_of_London_White_Tower.jpg'],
            ['Paris, France', 'Emma M.', 'Hotel Fabric', 'Breizh Cafe Le Marais', 'Musee d\'Orsay', 'https://upload.wikimedia.org/wikipedia/commons/e/e4/Notre_dame-paris-view.jpg'],
            ['Shanghai, China', 'James L.', 'The Ritz-Carlton Shanghai, Pudong', 'Hakkasan', 'Oriental Pearl Tower', 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/32/Pudong_Shanghai_November_2017_HDR_panorama.jpg/280px-Pudong_Shanghai_November_2017_HDR_panorama.jpg'],
            ['Tokyo, Japan', 'Charlotte R.', 'Family Inn Saiko', 'Ichiran, Shibuya', 'Shinjuku Gyoen National Garden', 'https://upload.wikimedia.org/wikipedia/commons/thumb/0/0c/Akihabara_Night.jpg/220px-Akihabara_Night.jpg'],
            ['Buenos Aires, Argentina', 'Noah A.', 'Casa Calma Hotel', 'La Pecora Nera', 'Teatro Colon', 'https://upload.wikimedia.org/wikipedia/commons/a/a3/Colon-interior-escenario-TM.jpg'],
            ['New York City, United States', 'Olivia P.', 'YOTEL New York', 'Piccola Cucina Osteria', 'The Metropolitan Museum of Art', 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/c0/1_times_square_night_2013.jpg/220px-1_times_square_night_2013.jpg'],
        ];

        $count = count($trips);

        foreach ($trips as $key => $tripData) {
            $trip = new trip();

            $trip->created_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $trip->updated_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $trip->destination = $tripData[0];
            $trip->traveler = $tripData[1];
            $trip->hotel = $tripData[2];
            $trip->meal = $tripData[3];
            $trip->attraction = $tripData[4];
            $trip->photo_url = $tripData[5];

            $trip->save();
            $count--;
        }
    }
}
