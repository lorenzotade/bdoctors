<?php

use App\Message;
use App\User;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
       for ($i = 0; $i < 10; $i++) {
            $new_message = new Message();
            $new_message->user_id = User::inRandomOrder()->first()->id;
            $new_message->name = $faker->firstName();
            $new_message->object = $faker->words(3, true);
            $new_message->email = $faker->email();
            $new_message->content = $faker->paragraph(3);
            $new_message->save();
        }
    }
}
