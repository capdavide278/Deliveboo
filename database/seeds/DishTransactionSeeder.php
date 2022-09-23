<?php

use App\Models\Dish;
use App\Models\Transaction;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class DishTransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        // $dishes = Dish::all();
        // $transaction = Transaction::all()->pluck('id');
        // $nTransaction = count($transaction);

        // foreach ($dishes as $dish) {
        //     $dishTransaction = $faker->randomElements($transaction, rand(0, $nTransaction));
        //     foreach ($dishTransaction as $transID) {
        //         $dish->transaction()->attach($transID);
        //     }
        // }
    }
}
