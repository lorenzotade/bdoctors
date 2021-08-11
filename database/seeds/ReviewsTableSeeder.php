<?php

use App\Review;
use App\User;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Auth;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 10; $i++) {
            $new_review = new Review();
            $new_review->user_id = User::inRandomOrder()->first()->id;
            $new_review->name = $faker->firstName();
            $new_review->title = $faker->words(3, true);
            $new_review->content = $faker->paragraph(3);
            $new_review->vote = $faker->numberBetween(3, 5);
            $new_review->save();
        }
    }
}
