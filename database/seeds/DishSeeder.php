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
        $restaurant_ids = Restaurant::all()->pluck('id');


        for($i=0; $i<10; $i++){
            $dish = new Dish;
            $dish->is_visible = $faker->numberBetween(0,1);
            $dish->restaurant_id = $faker->randomElement($restaurant_ids);
            $dish->name= $faker->name();
            $dish->description= $faker->paragraph();
            $dish->price= $faker->randomFloat(2,1,50); //randomFloat(decimal, minAbs, maxAbs)
            $dish->save();
            //missing $boolean because why???
        }
    }
}
