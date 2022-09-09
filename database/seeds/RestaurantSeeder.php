<?php

use App\Models\Restaurant;
use Illuminate\Database\Seeder;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $restaurants = [
            [
                'user_id'           => 1,
                'name_restaurant'   => 'RistoPizza1',
                'address'           => 'vianumero1',
                'rest_email'        => 'risto1@email.com',
                'rest_phonenumber'  => '55523456788',
            ],
            [
                'user_id'           => 2,
                'name_restaurant'   => 'RistoPizza2',
                'address'           => 'vianumero2',
                'rest_email'        => 'risto2@email.com',
                'rest_phonenumber'  => '55523456789',
            ],

            [
                'user_id'           => 3,
                'name_restaurant'   => 'RistoPizza3',
                'address'           => 'vianumero3',
                'rest_email'        => 'risto3@email.com',
                'rest_phonenumber'  => '55523456790',
            ],
            [
                'user_id'           => 4,
                'name_restaurant'   => 'RistoPizza4',
                'address'           => 'vianumero4',
                'rest_email'        => 'risto4@email.com',
                'rest_phonenumber'  => '55523456791',
            ],
        ];

        foreach ($restaurants as $restaurant) {
            Restaurant::create($restaurant);
        }
    }
}
