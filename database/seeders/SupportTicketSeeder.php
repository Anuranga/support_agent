<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker;
use Carbon\Carbon;

class SupportTicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1,10) as $index)
        {
            App\Models\SupportTicket::create([ 
                'name' => $faker->name,
                'problem_description' =>  $faker->realText($maxNbChars = 200, $indexSize = 2),
                'email' => $faker->unique()->safeEmail,
                'phone_number' => '077'.$faker->numberBetween($min = 0000000, $max = 9999999),
            ]);
        }
    }
}
