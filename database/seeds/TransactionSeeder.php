<?php

use App\Models\Restaurant;
use App\Models\Transaction;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $restaurant_ids = Restaurant::all()->pluck('id');

        $transactions = [
            [
                'name'          => 'VAndrea',
                'lastname'      => 'Neri',
                'restaurant_id' => $faker->randomElement($restaurant_ids),
                'address'       => 'via GiovanniDaProcida',
                'email'         => 'vandreavp@email.com',
                'phonenumber'   => '55545678910',
                'total'         => 120.00,
            ],
            [
                'name'          => 'VGiorgia',
                'lastname'      => 'Bianchi',
                'restaurant_id' => $faker->randomElement($restaurant_ids),
                'address'       => 'via GiovanniDaCrocida',
                'email'         => 'vgiorgiavp@email.com',
                'phonenumber'   => '44445678910',
                'total'         => 71.00,
            ],
            [
                'name'          => 'VDavide',
                'lastname'      => 'Rossi',
                'restaurant_id' => $faker->randomElement($restaurant_ids),
                'address'       => 'via GiovanniDaVrocida',
                'email'         => 'vdavidevp@email.com',
                'phonenumber'   => '52245678910',
                'total'         => 61.00,
            ],
        ];

        foreach ($transactions as $transaction) {
            Transaction::create($transaction);
        }

    }
}
