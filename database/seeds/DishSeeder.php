<?php

use App\Models\Dish;
use App\Models\Restaurant;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class DishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run(Faker $faker)
    {
        $dishes=[
            [
                'restaurant_id' => 1,
                'name' => 'Lasagne al forno',
                'image' => 'https://images.pexels.com/photos/5864352/pexels-photo-5864352.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
                'description' => 'Buonissima',
                'price' => 12,
                'is_visible' => '1',
            ],
            [
                'restaurant_id' => 1,
                'name' => 'Pizza Margherita',
                'image' => 'https://images.pexels.com/photos/2147491/pexels-photo-2147491.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
                'description' => 'Ottima pizza con pomodoro e mozzarella',
                'price' => 10,
                'is_visible' => '1',
            ],
            [
                'restaurant_id' => '1',
                'name' => 'Porchetta',
                'image' => 'https://images.pexels.com/photos/10710971/pexels-photo-10710971.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
                'description' => 'Ottimo secondo piatto',
                'price' => 10,
                'is_visible' => '0',
            ],
            [
                'restaurant_id' => 2,
                'name' => 'Hamburger',
                'image' => 'https://images.pexels.com/photos/1639557/pexels-photo-1639557.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
                'description' => 'Golosissimo',
                'price' => 10,
                'is_visible' => '1',
            ],
            [
                'restaurant_id' => 2,
                'name' => 'Coca cola',
                'image' => 'https://images.pexels.com/photos/2983100/pexels-photo-2983100.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
                'description' => 'In bottiglia',
                'price' => 4,
                'is_visible' => '0',
            ],
            [
                'restaurant_id' => 2,
                'name' => 'Patatine Fritte',
                'image' => 'https://images.pexels.com/photos/2741461/pexels-photo-2741461.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
                'description' => 'Super',
                'price' => 5,
                'is_visible' => '1',
            ],
            [
                'restaurant_id' => 3,
                'name' => 'Hamburger',
                'image' => 'https://images.pexels.com/photos/1639557/pexels-photo-1639557.jpeg?auto=compress&cs=tinysrgb&w=1360&h=750&dpr=1',
                'description' => 'Golosissimo',
                'price' => 10,
                'is_visible' => '0',
            ],
            [
                'restaurant_id' => 3,
                'name' => 'Coca cola',
                'image' => 'https://images.pexels.com/photos/2983100/pexels-photo-2983100.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
                'description' => 'In bottiglia',
                'price' => 4,
                'is_visible' => '1',
            ],
            [
                'restaurant_id' => 3,
                'name' => 'Patatine Fritte',
                'image' => 'https://images.pexels.com/photos/2741461/pexels-photo-2741461.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
                'description' => 'Super',
                'price' => 5,
                'is_visible' => '1',
            ],
            [
                'restaurant_id' => 3,
                'name' => 'Nachos',
                'image' => 'https://images.pexels.com/photos/1108775/pexels-photo-1108775.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
                'description' => 'Super buoni',
                'price' => 12,
                'is_visible' => '0',
            ],
            [
                'restaurant_id' => 4,
                'name' => 'Patatine Fritte',
                'image' => 'https://images.pexels.com/photos/2741461/pexels-photo-2741461.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
                'description' => 'Super',
                'price' => 5,
                'is_visible' => '1',
            ],
            [
                'restaurant_id' => 4,
                'name' => 'Hot-dog',
                'image' => 'https://images.pexels.com/photos/3023479/pexels-photo-3023479.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
                'description' => 'Fantastico',
                'price' => 8,
                'is_visible' => '1',
            ],
            [
                'restaurant_id' => 4,
                'name' => 'Nachos',
                'image' => 'https://images.pexels.com/photos/1108775/pexels-photo-1108775.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
                'description' => 'Super buoni',
                'price' => 12,
                'is_visible' => '0',
            ],
            [
                'restaurant_id' => 3,
                'name' => 'Pizza Margherita',
                'image' => 'https://images.pexels.com/photos/2147491/pexels-photo-2147491.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
                'description' => 'Ottima pizza con pomodoro e mozzarella',
                'price' => 10,
                'is_visible' => '1',
            ],
             [
                'restaurant_id' => 5,
                'name' => 'Lasagne al forno',
                'image' => 'https://images.pexels.com/photos/5864352/pexels-photo-5864352.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
                'description' => 'Buonissima',
                'price' => 12,
                'is_visible' => '1',
            ],
            [
                'restaurant_id' => 5,
                'name' => 'Pizza Margherita',
                'image' => 'https://images.pexels.com/photos/2147491/pexels-photo-2147491.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
                'description' => 'Ottima pizza con pomodoro e mozzarella',
                'price' => 10,
                'is_visible' => '1',
            ],
            [
                'restaurant_id' => 5,
                'name' => 'Porchetta',
                'image' => 'https://images.pexels.com/photos/10710971/pexels-photo-10710971.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
                'description' => 'Ottimo secondo piatto',
                'price' => 10,
                'is_visible' => '0',
            ],
            [
                'restaurant_id' => 6,
                'name' => 'Lasagne al forno',
                'image' => 'https://images.pexels.com/photos/5864352/pexels-photo-5864352.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
                'description' => 'Buonissima',
                'price' => 12,
                'is_visible' => '1',
            ],
            [
                'restaurant_id' => 6,
                'name' => 'Pizza Margherita',
                'image' => 'https://images.pexels.com/photos/2147491/pexels-photo-2147491.jpeg?auto=compress&cs=tinysrgb&w=1260&h=760&dpr=1',
                'description' => 'Ottima pizza con pomodoro e mozzarella',
                'price' => 10,
                'is_visible' => '1',
            ],
            [
                'restaurant_id' => 6,
                'name' => 'Porchetta',
                'image' => 'https://images.pexels.com/photos/10710971/pexels-photo-10710971.jpeg?auto=compress&cs=tinysrgb&w=1260&h=760&dpr=1',
                'description' => 'Ottimo secondo piatto',
                'price' => 10,
                'is_visible' => '0',
            ],
            [
                'restaurant_id' => 7,
                'name' => 'Hot-dog',
                'image' => 'https://images.pexels.com/photos/3023479/pexels-photo-3023479.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
                'description' => 'Fantastico',
                'price' => 8,
                'is_visible' => '1',
            ],
            [
                'restaurant_id' => 7,
                'name' => 'Nachos',
                'image' => 'https://images.pexels.com/photos/1108775/pexels-photo-1108775.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
                'description' => 'Super buoni',
                'price' => 12,
                'is_visible' => '1',
            ],
            [
                'restaurant_id' => 8,
                'name' => 'Risotto rosso con frutti di mare',
                'image' => 'https://images.pexels.com/photos/11776360/pexels-photo-11776360.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
                'description' => 'Ricetta ideata da Chef Giovanni',
                'price' => 25,
                'is_visible' => '1',
            ],
            [
                'restaurant_id' => 8,
                'name' => 'Spaghetti al profumo di mare',
                'image' => 'https://images.pexels.com/photos/725997/pexels-photo-725997.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
                'description' => 'Ricetta ideata da Chef Luca ',
                'price' => 22,
                'is_visible' => '1',
            ],
            [
                'restaurant_id' => 8,
                'name' => 'Lasagna',
                'image' => 'https://images.pexels.com/photos/5949884/pexels-photo-5949884.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
                'description' => 'Solo ingredienti di prima scelta+',
                'price' => 18,
                'is_visible' => '0',
            ],
            [
                'restaurant_id' => 9,
                'name' => 'Porchetta',
                'image' => 'https://images.pexels.com/photos/10710971/pexels-photo-10710971.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
                'description' => 'Ottimo secondo piatto',
                'price' => 10,
                'is_visible' => '1',
            ],
            [
                'restaurant_id' => 9,
                'name' => 'Patatine Fritte',
                'image' => 'https://images.pexels.com/photos/2741461/pexels-photo-2741461.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
                'description' => 'Super',
                'price' => 5,
                'is_visible' => '1',
            ],
            [
                'restaurant_id' => 9,
                'name' => 'Hamburger',
                'image' => 'https://images.pexels.com/photos/1639557/pexels-photo-1639557.jpeg?auto=compress&cs=tinysrgb&w=1360&h=750&dpr=1',
                'description' => 'Golosissimo',
                'price' => 10,
                'is_visible' => '1',
            ],

        ];

        foreach ($dishes as $dish) {
            Dish::create($dish);
        }
        // $restaurant_ids = Restaurant::all()->pluck('id');


        // for($i=0; $i<10; $i++){
        //     $dish = new Dish;
        //     $dish->is_visible = $faker->numberBetween(0,1);
        //     $dish->restaurant_id = $faker->randomElement($restaurant_ids);
        //     $dish->name= $faker->name();
        //     $dish->description= $faker->paragraph();
        //     $dish->price= $faker->randomFloat(2,1,50); //randomFloat(decimal, minAbs, maxAbs)
        //     $dish->save();
        //     //missing $boolean because why???
        // }
    }
}
