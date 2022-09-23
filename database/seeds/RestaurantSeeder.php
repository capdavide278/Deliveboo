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
                'name_restaurant'   => 'Da Gino',
                'image'             => 'https://images.pexels.com/photos/8471703/pexels-photo-8471703.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260',
                'address'           => 'via Duomo',
                'rest_email'        => 'risto1@email.com',
                'rest_phonenumber'  => '55523456788',
            ],
            [
                'user_id'           => 2,
                'name_restaurant'   => 'McDonalds',
                'image'             => 'https://images.pexels.com/photos/3714786/pexels-photo-3714786.jpeg?auto=compress&cs=tinysrgb&w=1600',
                'address'           => 'via Napoleone',
                'rest_email'        => 'risto2@email.com',
                'rest_phonenumber'  => '55523456789',
            ],

            [
                'user_id'           => 3,
                'name_restaurant'   => 'Burger King',
                'image'             => 'https://images.pexels.com/photos/11587655/pexels-photo-11587655.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
                'address'           => 'via Dante',
                'rest_email'        => 'risto3@email.com',
                'rest_phonenumber'  => '55523456790',
            ],
            [
                'user_id'           => 4,
                'name_restaurant'   => 'Old Wild West',
                'image'             => 'https://images.pexels.com/photos/1633578/pexels-photo-1633578.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
                'address'           => 'Piazza Vittorio',
                'rest_email'        => 'risto4@email.com',
                'rest_phonenumber'  => '55523456791',
            ],
        ];

        foreach ($restaurants as $restaurant) {
            Restaurant::create($restaurant);
        }
    }
}
