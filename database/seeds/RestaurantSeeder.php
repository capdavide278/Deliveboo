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
                'address'           => 'via Duomo 3, Milano',
                'rest_email'        => 'da.Gino@email.com',
                'rest_phonenumber'  => '55523456788',
            ],
            [
                'user_id'           => 2,
                'name_restaurant'   => 'McDonalds',
                'image'             => 'https://images.pexels.com/photos/3714786/pexels-photo-3714786.jpeg?auto=compress&cs=tinysrgb&w=1600',
                'address'           => 'via Napoleone 123, Milano',
                'rest_email'        => 'mcDonalds@email.com',
                'rest_phonenumber'  => '55523456789',
            ],

            [
                'user_id'           => 3,
                'name_restaurant'   => 'Burger King',
                'image'             => 'https://images.pexels.com/photos/11587655/pexels-photo-11587655.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
                'address'           => 'via Dante 4, Milano',
                'rest_email'        => 'burgerKing@email.com',
                'rest_phonenumber'  => '35523456790',
            ],
            [
                'user_id'           => 4,
                'name_restaurant'   => 'Old Wild West',
                'image'             => 'https://images.pexels.com/photos/1633578/pexels-photo-1633578.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
                'address'           => 'Piazza Vittorio 34, Milano',
                'rest_email'        => 'oldWest4@email.com',
                'rest_phonenumber'  => '4523456791',
            ],
            [
                'user_id'           => 5,
                'name_restaurant'   => 'La lanterna',
                'image'             => 'https://images.pexels.com/photos/941861/pexels-photo-941861.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
                'address'           => 'Via Garibaldi 12, Milano',
                'rest_email'        => 'lanterna@email.com',
                'rest_phonenumber'  => '55523456791',
            ],
            [
                'user_id'           => 6,
                'name_restaurant'   => 'I binari',
                'image'             => 'https://images.pexels.com/photos/1741285/pexels-photo-1741285.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
                'address'           => 'Via pavese 124, Milano',
                'rest_email'        => 'binari@email.com',
                'rest_phonenumber'  => '555234545491',
            ],
            [
                'user_id'           => 7,
                'name_restaurant'   => 'Wine Bar',
                'image'             => 'https://images.pexels.com/photos/1058277/pexels-photo-1058277.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
                'address'           => 'Via Alighieri 34, Milano',
                'rest_email'        => 'winebar@email.com',
                'rest_phonenumber'  => '1235234545491',
            ],
            [
                'user_id'           => 8,
                'name_restaurant'   => 'Il caminetto',
                'image'             => 'https://images.pexels.com/photos/2253643/pexels-photo-2253643.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
                'address'           => 'Via dei Platani 32, Milano',
                'rest_email'        => 'ilCaminetto@email.com',
                'rest_phonenumber'  => '455234345491',
            ],
            [
                'user_id'           => 9,
                'name_restaurant'   => 'Locanda dei Furfanti',
                'image'             => 'https://images.pexels.com/photos/260922/pexels-photo-260922.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
                'address'           => 'Corso Venezia 3, Milano',
                'rest_email'        => 'furfanti@email.com',
                'rest_phonenumber'  => '553255445491',
            ],
        ];

        foreach ($restaurants as $restaurant) {
            Restaurant::create($restaurant);
        }
    }
}
