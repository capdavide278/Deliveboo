<?php

use App\Models\Category;
use App\Models\Restaurant;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;


class CategoryRestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run(Faker $faker)
    {
        $restaurants = Restaurant::all();
        $category = Category::all()->pluck('id');
        $nCategory = count($category);

        foreach ($restaurants as $restaurant) {
            $restaurantCategory = $faker->randomElements($category, rand(0, $nCategory));
            foreach ($restaurantCategory as $catId) {
                $restaurant->category()->attach($catId);
            }
        }
    }

}
