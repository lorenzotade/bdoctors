<?php

use App\Sponsorship;
use Illuminate\Database\Seeder;

class SponsorshipsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $sponsorships = [
            [
                'name' => 'bronze',
                'duration' => 24,
                'price' => '2.99'
            ],
            [
                'name' => 'silver',
                'duration' => 72,
                'price' => '5.99'
            ],
            [
                'name' => 'gold',
                'duration' => 144,
                'price' => '9.99'
            ]
        ];

        foreach ($sponsorships as $sponsorship) {
            $new_sponsorship = new Sponsorship();
            $new_sponsorship->name = $sponsorship['name'];
            $new_sponsorship->duration = $sponsorship['duration'];
            $new_sponsorship->price = $sponsorship['price'];
            $new_sponsorship->save();
        }
    }
}
