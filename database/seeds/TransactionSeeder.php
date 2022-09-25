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


         for($i=0; $i<50; $i++){
             $transaction = new Transaction;
             $transaction->restaurant_id = $faker->randomElement($restaurant_ids);
             $transaction->name= $faker->name();
             $transaction->lastname= $faker->lastname();
             $transaction->date= $faker->dateTimeThisYear();
             $transaction->email= $faker->email();
             $transaction->phonenumber= $faker->numberBetween(1111111111, 9999999999);
             $transaction->address= $faker->address();
             $transaction->total= $faker->randomFloat(2,1,50); //randomFloat(decimal, minAbs, maxAbs)
             $transaction->save();
         }
    }
}
